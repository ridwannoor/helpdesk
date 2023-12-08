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
use App\Models\Pengadaan\Spk\Spkheader;
use App\Models\Pengadaan\Spk\Spkfile;
use App\Models\Pengadaan\Banego\Banegopengadaan;
use PDF;
use Carbon\Carbon;
use App\Models\LogActivity as LogActivityModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SpkExport;

class SpkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
            $users = Auth::user()->userdetails()->with('menu')->get();   
            $menu = Menu::where('link', '/spk')->first();
            $crud = $users->where('menu_id', $menu->id)->first();
            $userbrg = Auth::user()->lokasis()->with('barang')->get();
            $pref = Preference::first();
            $spk = Spkheader::get();
            $judul = 'SPK';
            return view('pengadaan.spk.index', compact('judul','pref','users','userbrg','crud', 'spk')); 
    }

    public function create()
    {
        $lokasis = Lokasi::all();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        $users = Auth::user()->userdetails()->with('menu')->get();           
        $pref = Preference::first();
        $divisis = Divisi::orderBy('kode', 'ASC')->get();
        $vendorbods = Vendorpengurus::orderBy('nama', 'ASC')->get();
        $spk = Spkheader::orderBy('nomor_spk', 'ASC')->get();
        $ba = Bakesepakatan::orderBy('nomor_bak', 'ASC')->get();
        $judul = 'Tambah SPK';
        return view('pengadaan.spk.add', compact('judul','users','pref','lokasis', 'vendorbods', 'divisis','spk', 'ba')); 
    }

    public function store(Request $request)
    {
        $spk = new Spkheader();
        $spk->nomor_spk = $request->nomor_spk;
        $spk->tanggal = $request->tanggal;
        $spk->divisi_id = $request->divisi_id ;
        $spk->bakesepakatan_id = $request->bakesepakatan_id;
        $spk->save();
        \LogActivity::addToLog($spk->nomor_spk);
        return redirect('/spk')->with('success', 'Data Berhasil Disimpan');

    }

    public function show($id)
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/spk')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $pref = Preference::first();
        $spk = Spkheader::with('spkfile')->find($id);
        $vendorbods = Vendorpengurus::orderBy('nama', 'ASC')->get();
        $judul = 'SPK ';
        return view('pengadaan.spk.show', compact('judul','pref','users','crud', 'spk', 'vendorbods')); 
    }

    public function edit($id)
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $pref = Preference::first();
         $judul = 'Edit Kesepakatan';
         $spk = Spkheader::with('spkfile')->find($id);
         $bakes = Bakesepakatan::orderBy('nomor_bak', 'ASC')->get();
         $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
         $divisis = Divisi::orderBy('kode', 'ASC')->get();
        //  $divisis = Divisi::pluck('kode', 'id')->all();    
         return view('pengadaan.spk.edit', compact('spk', 'judul','users','pref', 'vendors', 'bakes', 'divisis'));
    }

    public function update(Request $request)
    {
            $spk = Spkheader::where('id', $request->id)->first();
            $spk->nomor_spk = $request->nomor_spk;
            $spk->tanggal = $request->tanggal;
            $spk->divisi_id = $request->divisi_id;
            $spk->bakesepakatan_id = $request->bakesepakatan_id;
            $spk->save();
            \LogActivity::addToLog($spk->nomor_spk);
        return redirect('/spk')->with('success', 'SPK Pengadaan Berhasil diperbarui');
    }

    public function publish($id)
    {       
        $spk = Spkheader::find($id);
        $spk->is_published = !$spk->is_published;
        $spk->save();  
        return redirect('/spk');
    }

    public function destroy($id)
    {
        $spk = Spkheader::find($id);
        $spk->spkfile()->delete();
        $spk->delete($spk);
        \LogActivity::addToLog($spk->nomor_spk);
        return redirect('/spk')->with('message', 'SPK Pengadaan Berhasil Dihapus');
    }

    public function destroyfile($id){
        $data = Spkfile::find($id);
        $data->delete($data);
        \LogActivity::addToLog($spk->id);
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }

    public function exportXLS(Request $request) {
    
        return Excel::download(new SpkExport, 'spk.xlsx');
       
    }

    public function upload($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $spk = Spkheader::find($id);
        $judul = 'Upload File SPK';
        $preferences = Preference::all();
        return view('pengadaan.spk.upload', compact('spk','judul', 'pref','users', 'preferences'));
    }
    
    public function simpanupload(Request $request){
        $spk = Spkheader::where('id','=', $request->id)->first();
        $spk->nomor_spk = $request->nomor_spk;
        $spk->save();
        if($request->hasfile('filepdf'))
        {
           foreach ($request->filepdf as $file) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'SPK_'. date('YmdHis').".".$extension; 
            // $name = $file->getClientOriginalName();
            // $filename = $request->id.$name; 
            $tujuan_upload = 'data_file/pdf';
            $file->move($tujuan_upload,$filename);
           $spk = array(
                   'spkheader_id'=>$spk->id,
                   'filepdf'=>$filename
               );
               Spkfile::insert($spk);
           }
        }
        \LogActivity::addToLog($spk->nomor_spk);
        return redirect('/spk')->with('success', 'Data Berhasil Diperbarui');
    }

    public function cetak($id)
    {
         $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/spk')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $userbrg = Auth::user()->lokasis()->with('barang')->get();
        $pref = Preference::find(1);
        $spk = Spkheader::with('spkfile')->find($id);
        $vendorbods = Vendorpengurus::orderBy('nama', 'ASC')->get();
        $judul = 'SPK';
        $pdf = PDF::loadView('pengadaan.spk.cetak',compact('judul','pref','users','userbrg','crud', 'spk', 'vendorbods'));
        return $pdf->stream();    
    }

}
