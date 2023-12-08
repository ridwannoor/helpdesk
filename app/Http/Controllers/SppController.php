<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Lokasi;
use App\Models\Vendor;
use App\Models\Divisi;
use App\Models\Bod;
use App\Models\Vendorbod;
use App\Models\Vendorpengurus;
use App\Models\Jenispekerjaan;
use App\Models\Jeniskontrak;
// use App\Models\Formpengadaan;
use App\Models\Preference;
use App\Models\Pengadaan\Bakes\Bakesepakatan;
use App\Models\Pengadaan\Spp\Sppheader;
use App\Models\Pengadaan\Spp\Sppfile;
use App\Models\Pengadaan\Spp\Sppdetail;
use App\Models\Pengadaan\Banego\Banegopengadaan;
use PDF;
use Carbon\Carbon;
use App\Models\LogActivity as LogActivityModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SppExport;

class SppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
            $users = Auth::user()->userdetails()->with('menu')->get();   
            $menu = Menu::where('link', '/spp')->first();
            $crud = $users->where('menu_id', $menu->id)->first();
            $userbrg = Auth::user()->lokasis()->with('barang')->get();
            $pref = Preference::first();
            $spp = Sppheader::get();
            $judul = 'Surat Penunjukkan Pemenang';
            return view('pengadaan.spp.index', compact('judul','pref','users','userbrg','crud', 'spp')); 
    }

    public function create()
    {
        $lokasis = Lokasi::all();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        $users = Auth::user()->userdetails()->with('menu')->get();           
        $pref = Preference::first();
        $divisis = Divisi::orderBy('kode', 'ASC')->get();
        $bods = Bod::orderBy('jabatan', 'ASC')->get();
        $vendorbods = Vendorpengurus::orderBy('nama', 'ASC')->get();
        $spp = Sppheader::orderBy('nomor_spp', 'ASC')->get();
        $ba = Banegopengadaan::orderBy('nomor_ba', 'ASC')->get();
        $judul = 'Tambah Surat Penunjukkan Pemenang';
        return view('pengadaan.spp.add', compact('judul','users','pref','lokasis', 'vendorbods', 'divisis','spp', 'ba', 'bods')); 
    }

    public function store(Request $request)
    {
        $spp = new Sppheader();
        $spp->nomor_spp = $request->nomor_spp;
        $spp->tanggal = $request->tanggal;        
        $spp->bidok = $request->bidok;
        $spp->bod_id = $request->bod_id;
        $spp->banegopengadaan_id = $request->banegopengadaan_id;
        $spp->save();

        foreach ($request->suratpend as $key => $v) {
            $data =Sppdetail::Insert( array(
                'sppheader_id'=>$spp->id,
                'suratpend'=>$v
            ));
        }
        \LogActivity::addToLog($spp->nomor_spp);
        return redirect('/spp')->with('success', 'Data Berhasil Disimpan');

    }

    public function show($id)
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/spp')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $pref = Preference::first();
        $spp = Sppheader::with('sppfile', 'bod', 'sppdetail')->find($id);
        $vendorbods = Vendorpengurus::orderBy('nama', 'ASC')->get();
        $judul = 'Surat Penunjukkan Pemenang ';
        return view('pengadaan.spp.show', compact('judul','pref','users','crud', 'spp', 'vendorbods')); 
    }

    public function edit($id)
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $pref = Preference::first();
         $judul = 'Edit Kesepakatan';
         $spp = Sppheader::with('sppfile')->find($id);
         $ba = Banegopengadaan::orderBy('nomor_ba', 'ASC')->get();
         $bods = Bod::orderBy('jabatan', 'ASC')->get();
         $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
         $divisis = Divisi::orderBy('kode', 'ASC')->get();
        //  $divisis = Divisi::pluck('kode', 'id')->all();    
         return view('pengadaan.spp.edit', compact('spp', 'judul','users','pref', 'vendors', 'ba', 'divisis', 'bods'));
    }

    public function update(Request $request)
    {
            $spp = Sppheader::where('id', $request->id)->first();
            $spp->nomor_spp = $request->nomor_spp;
            $spp->tanggal = $request->tanggal;           
            $spp->bidok = $request->bidok;
            $spp->bod_id = $request->bod_id;
            $spp->banegopengadaan_id = $request->banegopengadaan_id;
            $spp->save();

            $id = $request->id;
            $dodet = $spp::with('sppdetail', 'sppfile')->find($id);        
            $dodet->update($request->toArray());
            $dodet->sppdetail()->delete();
            $dodet->sppfile()->delete();

         
            foreach ($request->suratpend as $key => $v) {
                $data =Sppdetail::Insert( array(
                    'sppheader_id'=>$spp->id,
                    'suratpend'=>$v
                ));
            }
            
            \LogActivity::addToLog($spp->nomor_spp);
        return redirect('/spp')->with('success', 'Surat Penunjukkan Pemenang Pengadaan Berhasil diperbarui');
    }

    public function publish($id)
    {       
        $spp = Sppheader::find($id);
        $spp->is_published = !$spp->is_published;
        $spp->save();  
        return redirect('/spp');
    }

    public function destroy($id)
    {
        $spp = Sppheader::find($id);
        $spp->Sppfile()->delete();
        $spp->Sppdetail()->delete();
        $spp->delete($spp);
        \LogActivity::addToLog($spp->nomor_spp);
        return redirect('/spp')->with('message', 'Surat Penunjukkan Pemenang Pengadaan Berhasil Dihapus');
    }

    public function destroyfile($id){
        $data = Sppfile::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->id);
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }

    public function exportXLS(Request $request) {
    
        return Excel::download(new SPPExport, 'spp.xlsx');
       
    }

    public function upload($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $spp = Sppheader::find($id);
        $judul = 'Upload File SPP';
        $preferences = Preference::all();
        return view('pengadaan.spp.upload', compact('spp','judul', 'pref','users', 'preferences'));
    }
    
    public function simpanupload(Request $request){
        $spp = Sppheader::where('id','=', $request->id)->first();
        $spp->nomor_spp = $request->nomor_spp;
        $spp->save();
        if($request->hasfile('filepdf'))
        {
           foreach ($request->filepdf as $file) {
            // $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'SPP_'. date('YmdHis').".".$extension; 
            // $name = $file->getClientOriginalName();
            // $filename = $request->id.$name; 
            $tujuan_upload = 'data_file/pdf';
            $file->move($tujuan_upload,$filename);
           $spp = array(
                   'Sppheader_id'=>$spp->id,
                   'filepdf'=>$filename
               );
               Sppfile::insert($spp);
           }
        }
        \LogActivity::addToLog($spp->nomor_spp);
        return redirect('/spp')->with('success', 'Data Berhasil Diperbarui');
    }

    public function cetak($id)
    {
         $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/spp')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $userbrg = Auth::user()->lokasis()->with('barang')->get();
        $pref = Preference::find(1);
        $spp = Sppheader::with('sppfile', 'sppdetail')->find($id);
        $vendorbods = Vendorpengurus::orderBy('nama', 'ASC')->get();
        $judul = 'SPP';
        $pdf = PDF::loadView('pengadaan.spp.cetak',compact('judul','pref','users','userbrg','crud', 'spp', 'vendorbods'));
        return $pdf->stream();    
    }
}
