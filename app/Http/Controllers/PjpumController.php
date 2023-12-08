<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pum\Pumheader;
use App\Models\Pum\Pumdetail;
use App\Models\Pum\Pumfile;
use App\Models\Vendor;
use App\Models\Lokasi;
use App\Models\Menu;
use App\Models\Bod;
use App\Models\Divisi;
use App\Models\Preference;
use Illuminate\Support\Facades\Auth;
use App\Mail\Domail;
use PDF;
use Redirect;
use Carbon\Carbon;
use Mail;
use App\Models\Pum\Pjpum\Pjpumheader;
use App\Models\Pum\Pjpum\Pjpumdetail;
use App\Models\Pum\Pjpum\Pjpumfile;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\LogActivity as LogActivityModel;
// use Illuminate\Contracts\View\View;
// use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PumExport;

class PjpumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function GenerateNumber(){
        $AWAL = 'PL';
        // karna array dimulai dari 0 maka kita tambah di awal data kosong
        // bisa juga mulai dari "1"=>"I"
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $noUrutAkhir = Pjpumheader::WhereYear('created_at', Carbon::now()->year)->count();
        $no = 1;
        if($noUrutAkhir) {
            $noUrutAkhir = sprintf("PJ-PUM.%03s", abs($noUrutAkhir + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
        }
        else {
            $noUrutAkhir = sprintf("PJ-PUM.%03s", $no). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
        }
        
        return $noUrutAkhir;
    }
    
    // public function index(Request $request)
    // {
    //     $pref = Preference::first();
    //     $users = Auth::user()->userdetails()->with('menu')->get();  
	//     $menu = Menu::where('link', '/pum')->first();
    //     $crud = $users->where('menu_id', $menu->id)->first(); 
    //     $pums = Pumheader::orderBy('tanggal', 'DESC')->get();
    //     $pjpums = Pjpumheader::orderBy('tanggal', 'DESC')->get();
    //     $judul = 'PUM';
    //     $judul1 = 'PJ PUM';
    //     return view('pum.index', compact('judul','judul1','pums', 'pjpums','users','pref','crud')); 
    // }

    public function create()
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get(); 
        $now = \Carbon\Carbon::now();
        $noUrutAkhir = $this->GenerateNumber();
        // $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $bods = Bod::orderBy('name', 'ASC')->get();
        $divisis = Divisi::orderBy('name', 'ASC')->get();
        $divisi1s = Divisi::orderBy('name', 'ASC')->get();
        $pums = Pumheader::orderBy('no_pum', 'ASC')->get();
        $judul = 'Add PJ PUM';
        return view('pum.pjpum.add', compact('judul','pums', 'noUrutAkhir','lokasis','divisis','divisi1s','users','now', 'bods', 'pref')); 
    }

    public function store(Request $request)
    {
     
        $pums = new Pjpumheader();
        $pums->no_pjpum = $request->no_pjpum;
        $pums->pumheader_id = $request->pumheader_id;
        $pums->tanggal = date('Y-m-d', strtotime($request->tanggal));
        $pums->membuat = $request->membuat;
        $pums->mengetahui = $request->mengetahui;
        $pums->total = $request->total;
        $pums->save();

        if ($pums) {
            foreach ($request->deskripsi as $key => $v) {
                $data = array(
                    'pjpumheader_id'=>$pums->id,
                    'deskripsi'=>$v,
                    'jumlah'=>$request->jumlah [$key],
                );
                Pjpumdetail::insert($data);
            }
        }

        \LogActivity::addToLog($pums->no_pjpum);
        return redirect()->route('pjpum.storedetail', ['id' => $pums->id]);
        // return redirect('/pum')->with('success','data berhasil disimpan');
    } 

    public function store1(Request $request)
    {
     
        $pums = Pjpumheader::where('id', $request->id)->first();
        $pums->no_pjpum = $request->no_pjpum;
        $pums->pumheader_id = $request->pumheader_id;
        $pums->tanggal = date('Y-m-d', strtotime($request->tanggal));
        $pums->membuat = $request->membuat;
        $pums->mengetahui = $request->mengetahui;
        $pums->total = $request->total;
        $pums->save();

        $id = $request->id;
        $pumdet = $pums::with(['pjpumdetails', 'pjpumfiles'])->find($id);        
        $pumdet->update($request->toArray());
        $pumdet->pjpumdetails()->delete();
        $pumdet->pjpumfiles()->delete();

        if ($pums) {
            foreach ($request->deskripsi as $key => $v) {
                $data = array(
                    'pjpumheader_id'=>$pums->id,
                    'deskripsi'=>$v,
                    'jumlah'=>$request->jumlah [$key],
                );
                Pjpumdetail::insert($data);
            }
        }
        \LogActivity::addToLog($pums->no_pjpum);
        // return redirect()->route('pum.storedetail', ['id' => $pums->id]);
        return redirect('/pum')->with('success','data berhasil disimpan');
    } 

    public function storedetail($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $pums = Pjpumheader::with('pjpumdetails')->find($id);
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $preferences = Preference::all();
        $bods = Bod::all();
        $pumheaders = Pumheader::orderBy('no_pum', 'ASC')->get();
        // $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        // $brgs = Hargabarang::orderBy('nama_brg', 'ASC')->get();
        // $temporary = 
        $judul = 'PJ PUM';
        return view('pum.pjpum.adddetail', compact('users','judul', 'bods',  'pums', 'pumheaders','pref','preferences','lokasis'));
    
    }

    public function edit($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $judul = 'Edit PJ PUM';
        $pums = Pjpumheader::with('pjpumdetails', 'pjpumfiles')->find($id);
        $preferences = Preference::all();
        // $detail = $pums->pumdetails()->first();
        $pumheaders = Pumheader::orderBy('no_pum', 'ASC')->get();
        $divisis = Divisi::all();
        $divisi1s = Divisi::all();
        $lokasis = Lokasi::all();
        $bods = Bod::all();

        return view('pum.pjpum.edit', compact('users','judul','bods', 'pums','pumheaders', 'lokasis','divisis', 'divisi1s', 'pref', 'preferences'));
    }

    public function editdetail($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $judul = 'PJ PUM';
        $pums = Pjpumheader::with('pjpumdetails', 'pjpumfiles')->find($id);
        // $detail = $pums->pumdetails()->first();
        $divisis = Divisi::all();
        $divisi1s = Divisi::all();
        $lokasis = Lokasi::all();
        $bods = Bod::all();

        return view('pum.pjpum.editdetail', compact('users','judul','bods', 'pums', 'lokasis','divisis', 'divisi1s', 'pref'));
    }

    public function update(Request $request)
    {
        $pums = Pjpumheader::where('id','=', $request->id)->first();
        $pums->no_pjpum = $request->no_pjpum;
        $pums->pumheader_id = $request->pumheader_id;
        $pums->tanggal = date('Y-m-d', strtotime($request->tanggal));
        $pums->membuat = $request->membuat;
        $pums->mengetahui = $request->mengetahui;
        $pums->total = $request->total;  
        $pums->save();
        
        $id = $request->id;
        $pumdet = $pums::with(['pjpumdetails', 'pjpumfiles'])->find($id);        
        $pumdet->update($request->toArray());
        $pumdet->pjpumdetails()->delete();
        $pumdet->pjpumfiles()->delete();
        
        if ($pums) {
            foreach ($request->deskripsi as $key => $v) {
                $data = array(
                    'pjpumheader_id'=>$pums->id,
                    'deskripsi'=>$v,
                    'jumlah'=>$request->jumlah [$key],
                );
                Pjpumdetail::insert($data);
            }    
            if($request->hasfile('filename'))
         {
            foreach ($request->filename as $file) {
                 
                $name = $file->getClientOriginalName();
                $filename = $request->id.$name; 
                $tujuan_upload = 'data_file/pdf';
                $file->move($tujuan_upload,$filename);

                $data = array(
                    'pjpumheader_id'=>$pums->id,
                    'filename'=>$filename
                );
                Pjpumfile::insert($data);
            }
        }
        }
        \LogActivity::addToLog($pums->no_pjpum);
        return redirect()->route('pjpum.editdetail', ['id' => $pums->id]);
        // return redirect('/pum')->with('success','data berhasil disimpan');
    }

    public function updatedetail(Request $request)
    {
     
        $pums = Pjpumheader::where('id', $request->id)->first();
        $pums->no_pjpum = $request->no_pjpum;
        $pums->pumheader_id = $request->pumheader_id;
        $pums->tanggal = date('Y-m-d', strtotime($request->tanggal));
        $pums->membuat = $request->membuat;
        $pums->mengetahui = $request->mengetahui;
        $pums->total = $request->total;  
        $pums->save();

        $id = $request->id;
        $pumdet = $pums::with(['pjpumdetails', 'pjpumfiles'])->find($id);        
        $pumdet->update($request->toArray());
        $pumdet->pjpumdetails()->delete();
        $pumdet->pjpumfiles()->delete();

        if ($pums) {
            foreach ($request->deskripsi as $key => $v) {
                $data = array(
                    'pjpumheader_id'=>$pums->id,
                    'deskripsi'=>$v,
                    'jumlah'=>$request->jumlah [$key],
                );
                Pjpumdetail::insert($data);
            }
        }
        \LogActivity::addToLog($pums->no_pjpum);
        // return redirect()->route('pum.storedetail', ['id' => $pums->id]);
        return redirect('/pum')->with('success','data berhasil diperbarui');
    } 

    public function destroy($id)
    {

        $data = Pjpumheader::find($id);
        $data->pjpumdetails()->delete();
        $data->pjpumfiles()->delete();
        $data->delete($data); 
        \LogActivity::addToLog($data->no_pjpum);
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }

    public function destroyfile($id){
        $data = Pjpumfile::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->id);
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }

    public function show($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $judul = 'Show PJ PUM';
        $pums = Pjpumheader::with('pjpumdetails', 'pjpumfiles')->find($id);
        // $preferences = Preference::first();
        $detail = $pums->pjpumdetails()->first();
        $detailfile = $pums->pjpumfiles()->first();
        // $detail = Dodetail::where('doheader_id',$pums)->first();
    //    dd($pums,$detail);
        return view('pum.pjpum.show', compact('judul','detail', 'pums', 'detailfile','users','pref'));       
    }

    public function publish($id)
    {       
        $pums = Pjpumheader::with('pjpumdetails', 'pjpumfiles')->find($id);
        // dd($pums);
        $pums->is_published = !$pums->is_published;
        $pums->save();  
     
       return redirect('/pum')->with('success', 'Berhasil dipublish');
    }

    public function upload($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();      
        $pums = Pjpumheader::find($id);
        // $bods = Bod::all();
        $judul = 'Upload File PJ PUM';
        $preferences = Preference::all();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $divisis = Divisi::orderBy('detail', 'ASC')->get();
        $divisi1s = Divisi::orderBy('detail', 'ASC')->get();
        return view('pum.pjpum.upload', compact('pums','judul', 'pref','lokasis','divisis', 'divisi1s', 'users', 'preferences'));
    }
    
    public function simpanupload(Request $request){
        $pums = Pjpumheader::where('id','=', $request->id)->first();
        $pums->no_pjpum = $request->no_pjpum;
        $pums->save();
        
   
        if($request->hasfile('filename'))
        {
           foreach ($request->filename as $file) {
            // $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'PJPUM_'. date('YmdHis').".".$extension; 
            // $name = $file->getClientOriginalName();
            // $filename = $request->id.$name; 
            $tujuan_upload = 'data_file/pdf';
            $file->move($tujuan_upload,$filename);
           $data = array(
                   'pjpumheader_id'=>$pums->id,
                   'filename'=>$filename
               );
               Pjpumfile::insert($data);
           }
        }
        \LogActivity::addToLog($pums->no_pjpum);
        return redirect('/pum')->with('success', 'Data Berhasil Diperbarui');
    }

    public function cetak($id)
    {
        // $users = Auth::user()->userdetails()->get();
        $judul = 'Cetak PJ PUM';
        $judul1 = 'BERITA ACARA';
        $pums = Pjpumheader::with('pjpumdetails', 'pjpumfiles')->find($id);
        $preferences = Preference::first();
        $detail = $pums->pjpumdetails()->first();
        set_time_limit(300);
        $pdf = PDF::loadView('pum.pjpum.cetak',compact('judul','judul1','pums', 'detail', 'preferences'))->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function exportXLS() {
    
        return Excel::download(new PjpumExport, 'pum-collection.xlsx');
       
    }

    public function exportPDF(Request $request) {
        $start = date('Y-m-d',strtotime($request->start));
        $end = date('Y-m-d',strtotime($request->end));
        $pums = Pjpumheader::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
    	$pdf = PDF::loadview('pum.pjpum.exportpdf', compact('pums', 'start', 'end'))->setPaper('A4','landscape');
    	return $pdf->stream();
       
    }

}
