<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Lokasi;
use App\Models\Vendor;
use App\Models\Divisi;
use App\Models\Jenispekerjaan;
use App\Models\Jeniskontrak;
// use App\Models\Formpengadaan;
use App\Models\Preference;
// use App\Models\Pengadaan\Banego\Baadendumheader;
// use App\Models\Pengadaan\Banego\Banegopengadaanfile;
use App\Models\Pengadaan\Baadendum\Baadendumheader;
use App\Models\Pengadaan\Baadendum\Baadendumfile;
use App\Models\Pengadaan\Banego\Banegopengadaan;
use PDF;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BanegopengadaanExport;
use App\Models\LogActivity as LogActivityModel;

class BaadendumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
            $users = Auth::user()->userdetails()->with('menu')->get();   
            $menu = Menu::where('link', '/baadendum')->first();
            $crud = $users->where('menu_id', $menu->id)->first();
          //  $parent = $users->menu->where(['parentmenu' => 0])->get();
            $userbrg = Auth::user()->lokasis()->with('barang')->get();
            $pref = Preference::first();
            $ba = Baadendumheader::with('banegopengadaan')->get();
            $judul = 'BA Addendum';
            return view('pengadaan.baadendum.index', compact('judul','pref','users','userbrg','crud', 'ba')); 
    }

    public function create()
    {
        $lokasis = Lokasi::all();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        $users = Auth::user()->userdetails()->with('menu')->get();           
        // $noUrutAkhir = $this->GenerateNumber();
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $divisis = Divisi::orderBy('kode', 'ASC')->get();
        $ba = Banegopengadaan::orderBy('nomor_ba', 'ASC')->get();
        // $doks = Dokpekerjaan::orderBy('detail', 'ASC')->get();
        $judul = 'Tambah BA Addendum';
        return view('pengadaan.baadendum.add', compact('judul','users','pref','lokasis', 'vendors', 'divisis','ba')); 
    }

    public function store(Request $request)
    {
        $bas = new Baadendumheader();
        $bas->nomor_ba = $request->nomor_ba;
        $bas->banegopengadaan_id = $request->banegopengadaan_id;
        $bas->vendor_id = $request->vendor_id;
        $bas->tanggal = $request->tanggal;
        $bas->lokasi_nego = $request->lokasi_nego;
        $bas->rap = $request->rap;
        $bas->nilai_kontrak = $request->nilai_kontrak;
        $bas->jumlah = $request->jumlah;
        $bas->jumlah_nego = $request->jumlah_nego;
        $bas->ba_evaluasi = $request->ba_evaluasi;
        $bas->tgl_ba = $request->tgl_ba;
        $bas->detail = $request->detail;
        $bas->jangka_waktu = $request->jangka_waktu;       
        $bas->cara_bayar = $request->cara_bayar;
        $bas->save();
        $bas->divisis()->attach($request->divisi_id);

        \LogActivity::addToLog($bas->nomor_ba);
        return redirect('/baadendum')->with('success', 'Data Berhasil Disimpan');

    }

    public function show($id)
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/baadendum')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        // $userbrg = Auth::user()->lokasis()->with('barang')->get();
        $pref = Preference::first();
        $ba = Baadendumheader::with('banegopengadaan')->find($id);
        $divisis = Divisi::orderBy('kode', 'ASC')->get();
        // $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        $judul = 'BA Addendum ';
        return view('pengadaan.baadendum.show', compact('judul','pref','users','crud', 'ba', 'divisis')); 
    }

    public function edit($id)
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $pref = Preference::first();
         $judul = 'Edit BA Aanwizing';
         $ba = Baadendumheader::with('banegopengadaan')->find($id);
         $fps = Banegopengadaan::orderBy('nomor_ba', 'ASC')->get();
         $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        //  $vendors = Vendor::pluck('namaperusahaan', 'id')->all();    
         $divisis = Divisi::pluck('kode', 'id')->all();    
         return view('pengadaan.baadendum.edit', compact('ba', 'judul','users','pref', 'fps', 'vendors', 'divisis'));
    }

    public function update(Request $request)
    {
            $bas = Baadendumheader::where('id', $request->id)->first();
            $bas->nomor_ba = $request->nomor_ba;
            $bas->banegopengadaan_id = $request->banegopengadaan_id;
            $bas->vendor_id = $request->vendor_id;
            $bas->tanggal = $request->tanggal;
            $bas->lokasi_nego = $request->lokasi_nego;
            $bas->rap = $request->rap;
            $bas->nilai_kontrak = $request->nilai_kontrak;
            $bas->jumlah = $request->jumlah;
            $bas->jumlah_nego = $request->jumlah_nego;
            $bas->ba_evaluasi = $request->ba_evaluasi;
            $bas->tgl_ba = $request->tgl_ba;
            $bas->detail = $request->detail;
            $bas->jangka_waktu = $request->jangka_waktu;       
            $bas->cara_bayar = $request->cara_bayar;
            $bas->save();
            $bas->divisis()->sync($request->divisis);
            \LogActivity::addToLog($bas->nomor_ba);
        return redirect('/baadendum')->with('success', 'BA Addendum Berhasil diperbarui');
    }

    public function publish($id)
    {       
        $baadendums = Baadendumheader::find($id);
        $baadendums->is_published = !$baadendums->is_published;
        $baadendums->save();  
        return redirect('/baadendum');
    }

    public function destroy($id)
    {
        $data = Baadendumheader::find($id);
        $data->banegopengadaanfile()->delete();
        // $data->banegopengadaanfiles()->delete();
        $data->delete($data);
        \LogActivity::addToLog($data->nomor_ba);
        return redirect('/baadendum')->with('message', 'BA Addendum Berhasil Dihapus');
    }

    public function destroyfile($id){
        $data = Banegopengadaanfile::find($id);
        $data->delete($data);
        
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }

    public function exportXLS(Request $request) {
    
        return Excel::download(new BanegopengadaanExport, 'baadendum.xlsx');
       
    }

    public function upload($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();      
        $baadendums = Baadendumheader::find($id);
        // $bods = Bod::all();
        $judul = 'Upload File BA Nego';
        $preferences = Preference::all();
        // $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        // $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        return view('pengadaan.baadendum.upload', compact('baadendums','judul', 'pref','users', 'preferences'));
    }
    
    public function simpanupload(Request $request){
        $baadendums = Baadendumheader::where('id','=', $request->id)->first();
        $baadendums->nomor_ba = $request->nomor_ba;
        $baadendums->save();
        
   
        if($request->hasfile('filepdf'))
        {
           foreach ($request->filepdf as $file) {
            $name = $file->getClientOriginalName();
            // $filename = $request->id.$name; 
            $extension = $file->getClientOriginalExtension();
            $filename = 'BA_'. date('YmdHis').".".$extension; 
            $tujuan_upload = 'data_file/pdf';
            $file->move($tujuan_upload,$filename);
           $data = array(
                   'banegopengadaan_id'=>$baadendums->id,
                   'filepdf'=>$filename
               );
               Banegopengadaanfile::insert($data);
           }
        }
        \LogActivity::addToLog($baadendums->nomor_ba);
        return redirect('/baadendum')->with('success', 'Data Berhasil Diperbarui');
    }

    public function cetak($id)
    {
         $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/baadendum')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $userbrg = Auth::user()->lokasis()->with('barang')->get();
        $pref = Preference::find(1);
        $baadendums = Baadendumheader::with('baadendumfile', 'banegopengadaan')->find($id);
        // $vendors = Vendor::pluck('namaperusahaan', 'id')->all();    
        //  $divisis = Divisi::pluck('kode', 'id')->all();    
        $judul = 'BA Addendum';
        // $bulan = $this->tanggal_local();
        $pdf = PDF::loadView('pengadaan.baadendum.cetak',compact('judul','pref','users','userbrg','crud', 'baadendums'));
        return $pdf->stream();    
    }
}
