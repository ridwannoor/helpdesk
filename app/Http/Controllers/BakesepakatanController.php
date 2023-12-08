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
use App\Models\Vendorpengurus;
use App\Models\Jenispekerjaan;
use App\Models\Jeniskontrak;
use App\Models\LogActivity as LogActivityModel;
// use App\Models\Formpengadaan;
use App\Models\Preference;
use App\Models\Pengadaan\Bakes\Bakesepakatan;
use App\Models\Pengadaan\Bakes\Bakesepakatanfile;
use App\Models\Pengadaan\Banego\Banegopengadaan;
use PDF;
use Carbon\Carbon;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BakesepakatanExport;

class BakesepakatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
            $users = Auth::user()->userdetails()->with('menu')->get();   
            $menu = Menu::where('link', '/bakesepakatan')->first();
            $crud = $users->where('menu_id', $menu->id)->first();
          //  $parent = $users->menu->where(['parentmenu' => 0])->get();
            $userbrg = Auth::user()->lokasis()->with('barang')->get();
            $pref = Preference::first();
            $bak = Bakesepakatan::get();
            $judul = 'BA Kesepakatan';
            return view('pengadaan.bakesepakatan.index', compact('judul','pref','users','userbrg','crud', 'bak')); 
    }

    public function create()
    {
        $lokasis = Lokasi::all();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        $users = Auth::user()->userdetails()->with('menu')->get();           
        // $noUrutAkhir = $this->GenerateNumber();
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $bods = Bod::orderBy('code', 'ASC')->get();
        $vendorbods = Vendorpengurus::orderBy('nama', 'ASC')->get();
        $bak = Bakesepakatan::orderBy('nomor_bak', 'ASC')->get();
        $ba = Banegopengadaan::with('vendor')->orderBy('nomor_ba', 'ASC')->get();
        // $doks = Dokpekerjaan::orderBy('detail', 'ASC')->get();
        $judul = 'Tambah BA Kesepakatan';
        return view('pengadaan.bakesepakatan.add', compact('judul','users','pref','lokasis', 'vendorbods', 'bods','bak', 'ba')); 
    }

    public function store(Request $request)
    {
        $bak = new Bakesepakatan();
        $bak->nomor_bak = $request->nomor_bak;
        $bak->tanggal = $request->tanggal;
        $bak->banegopengadaan_id = $request->banegopengadaan_id;
        $bak->bod_id = $request->bod_id;
        // $bak->vendorbod_id = $request->vendorbod_id;
        $bak->save();
        \LogActivity::addToLog($bak->nomor_bak);
        return redirect('/bakesepakatan')->with('success', 'Data Berhasil Disimpan');

    }

    public function show($id)
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/bakesepakatan')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $pref = Preference::first();
        $ba = Bakesepakatan::with('banegopengadaan')->find($id);
        $vendorbods = Vendorpengurus::orderBy('nama', 'ASC')->get();
        $judul = 'BA Kesepakatan ';
        return view('pengadaan.bakesepakatan.show', compact('judul','pref','users','crud', 'ba', 'vendorbods')); 
    }

    public function edit($id)
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $pref = Preference::first();
         $judul = 'Edit Kesepakatan';
         $bak = Bakesepakatan::with('banegopengadaan')->find($id);
         $banegos = Banegopengadaan::orderBy('nomor_ba', 'ASC')->get();
         $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
         $bods = Bod::orderBy('code', 'ASC')->get();
        //  $vendors = Vendor::pluck('namaperusahaan', 'id')->all();    
         $divisis = Divisi::pluck('kode', 'id')->all();    
         return view('pengadaan.bakesepakatan.edit', compact('bak', 'judul','users','pref', 'banegos', 'vendors', 'divisis', 'bods'));
    }

    public function update(Request $request)
    {
            $bak = Bakesepakatan::where('id', $request->id)->first();
            $bak->nomor_bak = $request->nomor_bak;
            $bak->tanggal = $request->tanggal;
            $bak->banegopengadaan_id = $request->banegopengadaan_id;
            $bak->bod_id = $request->bod_id;
            $bak->save();
            // $bak->divisis()->sync($request->divisis);
            \LogActivity::addToLog($bak->nomor_bak);
        return redirect('/bakesepakatan')->with('success', 'BA Nego Pengadaan Berhasil diperbarui');
    }

    public function publish($id)
    {       
        $bakesepakatans = Bakesepakatan::find($id);
        $bakesepakatans->is_published = !$bakesepakatans->is_published;
        $bakesepakatans->save();  
        return redirect('/bakesepakatan');
    }

    public function destroy($id)
    {
        $data = Bakesepakatan::find($id);
        $data->bakesepakatanfile()->delete();
        $data->delete($data);
        \LogActivity::addToLog($data->nomor_bak);
        return redirect('/bakesepakatan')->with('message', 'BA Nego Pengadaan Berhasil Dihapus');
    }

    public function destroyfile($id){
        $data = Bakesepakatanfile::find($id);
        $data->delete($data);
        // \LogActivity::addToLog($data->nomor_bak);
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }

    public function exportXLS(Request $request) {
    
        return Excel::download(new BakesepakatanExport, 'bakesepakatan.xlsx');
       
    }

    public function upload($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();      
        $bakesepakatans = Bakesepakatan::find($id);
        // $bods = Bod::all();
        $judul = 'Upload File BA Kesepakatan';
        $preferences = Preference::all();
        // $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        // $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        return view('pengadaan.bakesepakatan.upload', compact('bakesepakatans','judul', 'pref','users', 'preferences'));
    }
    
    public function simpanupload(Request $request){
        $bakesepakatans = Bakesepakatan::where('id','=', $request->id)->first();
        $bakesepakatans->nomor_bak = $request->nomor_bak;
        $bakesepakatans->save();
        
   
        if($request->hasfile('filepdf'))
        {
           foreach ($request->filepdf as $file) {
            $name = $file->getClientOriginalName();
            // $filename = $request->id.$name; 
            $extension = $file->getClientOriginalExtension();
            $filename = 'BAK_'. date('YmdHis').".".$extension; 
            $tujuan_upload = 'data_file/pdf';
            $file->move($tujuan_upload,$filename);
           $data = array(
                   'bakesepakatan_id'=>$bakesepakatans->id,
                   'filepdf'=>$filename
               );
               Bakesepakatanfile::insert($data);
           }
        }
        \LogActivity::addToLog($bakesepakatans->nomor_bak);
        return redirect('/bakesepakatan')->with('success', 'Data Berhasil Diperbarui');
    }

    public function cetak($id)
    {
         $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/bakesepakatan')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $userbrg = Auth::user()->lokasis()->with('barang')->get();
        $pref = Preference::find(1);
        $ba = Bakesepakatan::with('banegopengadaan')->find($id);
        $vendorbods = Vendorpengurus::orderBy('nama', 'ASC')->get();
        // $vendors = Vendor::pluck('namaperusahaan', 'id')->all();    
        //  $divisis = Divisi::pluck('kode', 'id')->all();    
        $judul = 'BA Kesepakatan';
        // $bulan = $this->tanggal_local();
        $pdf = PDF::loadView('pengadaan.bakesepakatan.cetak',compact('judul','pref','users','userbrg','crud', 'ba', 'vendorbods'));
        return $pdf->stream();    
    }

 

}
