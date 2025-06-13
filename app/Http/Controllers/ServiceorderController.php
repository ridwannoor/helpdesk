<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SO\Serviceorder;
use App\Models\SO\Sodetail;
use App\Models\SO\Sofile;
use App\Models\Vendor;
use App\Models\Lokasi;
use App\Models\Menu;
use App\Models\Bod;
use App\Models\Preference;
use Illuminate\Support\Facades\Auth;
use App\Mail\Domail;
use PDF;
use Redirect;
use Carbon\Carbon;
use Mail;
use App\Models\LogActivity as LogActivityModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Illuminate\Contracts\View\View;
// use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SoExport;

class ServiceorderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function GenerateNumber(){
        $AWAL = 'IASP-PBJ';
        // karna array dimulai dari 0 maka kita tambah di awal data kosong
        // bisa juga mulai dari "1"=>"I"
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $noUrutAkhir = Serviceorder::WhereYear('created_at', Carbon::now()->year)->count();
        $no = 1;
        if($noUrutAkhir) {
            $noUrutAkhir = sprintf("SO.%03s", abs($noUrutAkhir + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
        }
        else {
            $noUrutAkhir = sprintf("SO.%03s", $no). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
        }

        return $noUrutAkhir;
    }

    public function index(Request $request)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
	    $menu = Menu::where('link', '/so')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $soes = Serviceorder::orderBy('tanggal', 'DESC')->get();
        $judul = 'Service Order';
        return view('serviceorder.index', compact('judul','soes','users','pref','crud'));
    }

    public function create()
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
        $now = \Carbon\Carbon::now();
        $noUrutAkhir = $this->GenerateNumber();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $bods = Bod::orderBy('name', 'ASC')->get();
        $judul = 'Add Service Order';
        return view('serviceorder.add', compact('judul', 'noUrutAkhir','lokasis','users','now', 'bods', 'vendors','pref'));
    }

    public function store(Request $request)
    {

        $serviceorders = new Serviceorder();
        $serviceorders->no_so = $request->no_so;
        $serviceorders->tanggal = date('Y-m-d', strtotime($request->tanggal));
        $serviceorders->nama_pek = $request->nama_pek;
        $serviceorders->lokasi_id = $request->lokasi_id;
        $serviceorders->vendor_id = $request->vendor_id;
        $serviceorders->bod_id = $request->bod_id;
        $serviceorders->preference_id = $request->preference_id;
        $serviceorders->no_kontrak = $request->no_kontrak;
        $serviceorders->start_date = date('Y-m-d', strtotime($request->start_date));
        $serviceorders->end_date = date('Y-m-d', strtotime($request->end_date));
        $serviceorders->tgl_kontrak = date('Y-m-d', strtotime($request->tgl_kontrak));
        $serviceorders->save();

        if ($serviceorders) {
            foreach ($request->deskripsi as $key => $v) {
                $data = array(
                    'serviceorder_id'=>$serviceorders->id,
                    'deskripsi'=>$v,
                    'qty'=>$request->qty [$key],
		            'satuan'=>$request->satuan [$key],
                    'serial_num'=>$request->serial_num [$key],
                    'lokasi'=>$request->lokasi [$key],
                    'catatan'=>$request->catatan [$key],
                );
                Sodetail::insert($data);
            }
        }
        \LogActivity::addToLog($serviceorders->no_so);
        return redirect('/so')->with('success','data berhasil disimpan');
    }

    public function edit($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
        $judul = 'Edit Service Order';
        $serviceorders = Serviceorder::find($id);
        $detail = $serviceorders->sodetails()->first();
        $vendor = Vendor::all();
        $lokasis = Lokasi::all();
        $bods = Bod::all();

        return view('serviceorder.edit', compact('users','judul','bods', 'serviceorders','detail','lokasis','vendor','pref'));
    }

    public function update(Request $request)
    {
        $serviceorders = Serviceorder::where('id','=', $request->id)->first();
        $serviceorders->no_so = $request->no_so;
        $serviceorders->tanggal = date('Y-m-d', strtotime($request->tanggal));
        $serviceorders->nama_pek = $request->nama_pek;
        $serviceorders->lokasi_id = $request->lokasi_id;
        $serviceorders->vendor_id = $request->vendor_id;
        $serviceorders->preference_id = $request->preference_id;
        $serviceorders->bod_id = $request->bod_id;
        $serviceorders->no_kontrak = $request->no_kontrak;
        $serviceorders->tgl_kontrak = $request->tgl_kontrak;
        $serviceorders->start_date = date('Y-m-d', strtotime($request->start_date));
        $serviceorders->end_date = date('Y-m-d', strtotime($request->end_date));
        $serviceorders->save();

        $id = $request->id;
        $sodet = $serviceorders::with(['sodetails', 'sofiles'])->find($id);
        $sodet->update($request->toArray());
        $sodet->sodetails()->delete();
        $sodet->sofiles()->delete();

        if ($serviceorders) {
            foreach ($request->deskripsi as $key => $v) {
                $data = array(
                    'serviceorder_id'=>$serviceorders->id,
                    'deskripsi'=>$v,
                    'qty'=>$request->qty [$key],
		            'satuan'=>$request->satuan [$key],
                    'serial_num'=>$request->serial_num [$key],
                    'lokasi'=>$request->lokasi [$key],
                    'catatan'=>$request->catatan [$key],
                );
                Sodetail::insert($data);
            }
            if($request->hasfile('filename'))
         {
            foreach ($request->filename as $file) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = 'SO_'. date('YmdHis').".".$extension;
                // $name = $file->getClientOriginalName();
                // $filename = $request->id.$name;
                $tujuan_upload = 'data_file/pdf';
                $file->move($tujuan_upload,$filename);

                $data = array(
                    'serviceorder_id'=>$serviceorders->id,
                    'filename'=>$filename
                );
                Sofile::insert($data);
            }
        }
        }
        \LogActivity::addToLog($serviceorders->no_so);
        return redirect('/so')->with('success','data berhasil disimpan');
    }

    public function destroy($id)
    {

        $data = Serviceorder::find($id);
        $data->sodetails()->delete();
        $data->sofiles()->delete();
        $data->delete($data);
        \LogActivity::addToLog($data->no_so);
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }

    public function destroyfile($id){
        $data = Sofile::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->id);
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }

    public function show($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
        $judul = 'Show Service Order';
        $serviceorders = Serviceorder::with(['vendor','preference', 'bod'])->find($id);
        $detail = $serviceorders->sodetails()->first();
        $detailfile = $serviceorders->sofiles()->first();
        // $detail = Dodetail::where('doheader_id',$serviceorders)->first();
    //    dd($serviceorders,$detail);
        return view('serviceorder.show', compact('judul','detail', 'serviceorders', 'detailfile','users','pref'));
    }

    public function publish($id)
    {
        $serviceorders = Serviceorder::find($id);
        // dd($serviceorders);
        $serviceorders->is_published = !$serviceorders->is_published;
        $serviceorders->save();

       return redirect('/so')->with('success', 'Berhasil dipublish');
    }

    public function upload($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $serviceorders = Serviceorder::find($id);
        // $bods = Bod::all();
        $judul = 'Upload File Service Order';
        $preferences = Preference::all();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        return view('serviceorder.upload', compact('serviceorders','judul', 'pref','lokasis','vendors','users', 'preferences'));
    }

    public function simpanupload(Request $request){
        $serviceorders = Serviceorder::where('id','=', $request->id)->first();
        $serviceorders->no_so = $request->no_so;
        $serviceorders->save();


        if($request->hasfile('filename'))
        {
           foreach ($request->filename as $file) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'SO_'. date('YmdHis').".".$extension;
            // $name = $file->getClientOriginalName();
            // $filename = $request->id.$name;
            $tujuan_upload = 'data_file/pdf';
            $file->move($tujuan_upload,$filename);
           $data = array(
                   'serviceorder_id'=>$serviceorders->id,
                   'filename'=>$filename
               );
               Sofile::insert($data);
           }
        }
        \LogActivity::addToLog($serviceorders->no_so);
        return redirect('/so')->with('success', 'Data Berhasil Diperbarui');
    }

    public function cetak($id)
    {
        // $users = Auth::user()->userdetails()->get();
        $judul = 'Cetak Service Order';
        $judul1 = 'Service Order';
        $serviceorders = Serviceorder::with(['vendor','preference'])->find($id);;
        $detail = $serviceorders->sodetails()->first();
        set_time_limit(300);
        $pdf = PDF::loadView('serviceorder.cetak',compact('judul','judul1','serviceorders', 'detail'))->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function exportXLS(Request $request) {

        return Excel::download(new SoExport, 'so-collection.xlsx');

    }

    public function exportPDF(Request $request) {
        $start = date('Y-m-d',strtotime($request->start));
        $end = date('Y-m-d',strtotime($request->end));
        $serviceorders = Serviceorder::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
    	$pdf = PDF::loadview('serviceorder.exportpdf', compact('serviceorders', 'start', 'end'))->setPaper('A4','landscape');
    	return $pdf->stream();

    }

}
