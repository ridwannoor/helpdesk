<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Lokasi;
use App\Models\Vendor;
use App\Models\Dasar;
use App\Models\Divisi;
use App\Models\Jenispekerjaan;
use App\Models\Jeniskontrak;
// use App\Models\Formpengadaan;
use App\Models\Preference;
use App\Models\Pengadaan\Banego\Banegopengadaan;
use App\Models\Pengadaan\Banego\Banegopengadaanfile;
use App\Models\Pengadaan\Banego\Banegodetail;
use App\Models\Pengadaan\Bapengadaan\Bapengadaan;
use App\Models\Pengadaan\Jaminan;
use App\Models\Pengadaan\Kontrak;
use PDF;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BanegopengadaanExport;
use App\Models\LogActivity as LogActivityModel;

class BanegopengadaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
            $users = Auth::user()->userdetails()->with('menu')->get();   
            $menu = Menu::where('link', '/banegopengadaan')->first();
            $crud = $users->where('menu_id', $menu->id)->first();
          //  $parent = $users->menu->where(['parentmenu' => 0])->get();
            $userbrg = Auth::user()->lokasis()->with('barang')->get();
            $pref = Preference::first();
            $ba = Banegopengadaan::with('banegodetail', 'banegopengadaanfile')->orderBy('tanggal', 'DESC')->get();
            $judul = 'BA Nego Pengadaan';
            return view('pengadaan.banegopengadaan.index', compact('judul','pref','users','userbrg','crud', 'ba')); 
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
        $dasars = Dasar::orderBy('kode', 'ASC')->get();
        $jaminans = Jaminan::orderBy('name', 'ASC')->get();
        $kontraks = Kontrak::orderBy('name', 'ASC')->get();
        $ba = Bapengadaan::orderBy('nomor_ba', 'ASC')->get();
        // $doks = Dokpekerjaan::orderBy('detail', 'ASC')->get();
        $judul = 'Tambah BA Nego Pengadaan';
        return view('pengadaan.banegopengadaan.add', compact('judul','users', 'dasars','pref','lokasis', 'vendors', 'divisis','ba', 'jaminans', 'kontraks')); 
    }

    public function store(Request $request)
    {
        $content = $request->catatan;
        $dom = new \DomDocument();
        @$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('imageFile');
  
        foreach($imageFile as $item => $image){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name= 'upload_file' . time().$item.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);
            
            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
         }
  
        $content = $dom->saveHTML();

        $bas = new Banegopengadaan();
        $bas->nomor_ba = $request->nomor_ba;     
        $bas->nilai_rap = $request->nilai_rap;
        $bas->pajak_rap = $request->pajak_rap;
        $bas->jawa_pel = $request->jawa_pel;
        $bas->jawa_pem = $request->jawa_pem;
        $bas->judul_pekerjaan = $request->judul_pekerjaan;
        $bas->spph = $request->spph;
        $bas->tgl_sph = $request->tgl_sph;
	    $bas->catatan = $content;
        $bas->jml_penawaran = $request->jml_penawaran;
        // $bas->spph_nego = $request->spph_nego;
        $bas->tanggal = $request->tanggal;
        // $bas->tgl_sph_nego = $request->tgl_sph_nego;
        $bas->lokasi_nego = $request->lokasi_nego;       
        $bas->jml_nego = $request->jml_nego;
        $bas->jaminandp = $request->jaminandp;
        $bas->jaminandp1 = $request->jaminandp1;       
        $bas->jaminandp2 = $request->jaminandp2;
        $bas->vendor_id = $request->vendor_id;
        $bas->dasar_id = $request->dasar_id;
        $bas->jaminan_id = $request->jaminan_id;       
        $bas->kontrak_id = $request->kontrak_id;
        $bas->save();
        $bas->divisis()->attach($request->divisi_id);

        foreach ($request->carabayar as $key => $v) {
            $data =Banegodetail::Insert( array(
                'banegopengadaan_id'=>$bas->id,
                'carabayar'=>$v
            ));
        }
        \LogActivity::addToLog($bas->judul_pekerjaan);
        return redirect('/banegopengadaan')->with('success', 'Data Berhasil Disimpan');

    }

    public function show($id)
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/banegopengadaan')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        // $userbrg = Auth::user()->lokasis()->with('barang')->get();
        $pref = Preference::first();
        $ba = Banegopengadaan::with('bapengadaan', 'jaminan', 'kontrak')->find($id);
        $divisis = Divisi::orderBy('kode', 'ASC')->get();
        // $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        $judul = 'BA Nego Pengadaan ';
        return view('pengadaan.banegopengadaan.show', compact('judul','pref','users','crud', 'ba', 'divisis')); 
    }

    public function edit($id)
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $pref = Preference::first();
         $judul = 'Edit BA Nego Pengadaan';
         $dasars = Dasar::orderBy('kode', 'ASC')->get();
         $jaminans = Jaminan::orderBy('name', 'ASC')->get();
         $kontraks = Kontrak::orderBy('name', 'ASC')->get();
         $ba = Banegopengadaan::with('bapengadaan')->find($id);
         $fps = Bapengadaan::orderBy('nomor_ba', 'ASC')->get();
         $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        //  $vendors = Vendor::pluck('namaperusahaan', 'id')->all();    
         $divisis = Divisi::pluck('kode', 'id')->all();    
         return view('pengadaan.banegopengadaan.edit', compact('ba', 'judul','users','pref', 'fps', 'dasars', 'vendors', 'divisis', 'jaminans', 'kontraks'));
    }

    public function update(Request $request)
    {
        $content = $request->catatan;
        $dom = new \DomDocument();
        @$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('imageFile');
  
        foreach($imageFile as $item => $image){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name= 'upload_file' . time().$item.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);
            
            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
         }
  
        $content = $dom->saveHTML();
    
        $bas = Banegopengadaan::where('id', $request->id)->first();
        $bas->nomor_ba = $request->nomor_ba;
        $bas->nilai_rap = $request->nilai_rap;
        $bas->pajak_rap = $request->pajak_rap;
        $bas->dasar_id = $request->dasar_id;
        $bas->jawa_pel = $request->jawa_pel;
        $bas->jawa_pem = $request->jawa_pem;
        $bas->vendor_id = $request->vendor_id;
        $bas->catatan = $content;
        $bas->spph = $request->spph;
        $bas->tgl_sph = $request->tgl_sph;
        $bas->judul_pekerjaan = $request->judul_pekerjaan;
        $bas->jml_penawaran = $request->jml_penawaran;
        // $bas->spph_nego = $request->spph_nego;
        $bas->tanggal = $request->tanggal;
        // $bas->tgl_sph_nego = $request->tgl_sph_nego;
        $bas->lokasi_nego = $request->lokasi_nego;  
        $bas->jml_nego = $request->jml_nego;
        $bas->jaminandp = $request->jaminandp;
        $bas->jaminandp1 = $request->jaminandp1;       
        $bas->jaminandp2 = $request->jaminandp2;
        $bas->jaminan_id = $request->jaminan_id;       
        $bas->kontrak_id = $request->kontrak_id;
        $bas->save();
        $bas->divisis()->sync($request->divisis);

        \LogActivity::addToLog($bas->judul_pekerjaan);

        $id = $request->id;
        $dodet = $bas::with('banegodetail')->find($id);        
        $dodet->update($request->toArray());
        $dodet->banegodetail()->delete();
        // $dodet->bapertanyaans()->delete();
        
            
        foreach ($request->carabayar as $key => $v) {
            $data =Banegodetail::Insert( array(
                'banegopengadaan_id'=>$bas->id,
                'carabayar'=>$v
            ));
        }
        
    return redirect('/banegopengadaan')->with('success', 'BA Nego Pengadaan Berhasil diperbarui');
    }

    public function publish($id)
    {       
        $banegopengadaans = Banegopengadaan::find($id);
        $banegopengadaans->is_published = !$banegopengadaans->is_published;
        $banegopengadaans->save();  
        return redirect('/banegopengadaan');
    }

    public function destroy($id)
    {
        $data = Banegopengadaan::find($id);
        $data->banegopengadaanfile()->delete();
        $data->banegodetail()->delete();
        $data->delete($data);
        \LogActivity::addToLog($data->judul_pekerjaan);
        return redirect('/banegopengadaan')->with('message', 'BA Nego Pengadaan Berhasil Dihapus');
    }

    public function destroyfile($id){
        $data = Banegopengadaanfile::find($id);
        $data->delete($data);
        
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }

    public function exportXLS(Request $request) {
    
        return Excel::download(new BanegopengadaanExport, 'banegopengadaan.xlsx');
       
    }

    public function upload($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();      
        $banegopengadaans = Banegopengadaan::find($id);
        // $bods = Bod::all();
        $judul = 'Upload File BA Nego';
        $preferences = Preference::all();
        // $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        // $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        return view('pengadaan.banegopengadaan.upload', compact('banegopengadaans','judul', 'pref','users', 'preferences'));
    }
    
    public function simpanupload(Request $request){
        $banegopengadaans = Banegopengadaan::where('id','=', $request->id)->first();
        $banegopengadaans->nomor_ba = $request->nomor_ba;
        // dd($banegopengadaans->nomor_ba);
        $banegopengadaans->save();
        
   
        if($request->hasfile('filepdf'))
        {
           foreach ($request->filepdf as $file) {
            // $name = $file->getClientOriginalName();
            // $filename = $request->id.$name; 
            $extension = $file->getClientOriginalExtension();
            $filename = 'BANP_'. date('YmdHis').".".$extension; 
            $tujuan_upload = 'data_file/pdf';
            $file->move($tujuan_upload,$filename);
           $data = array(
                   'banegopengadaan_id'=>$banegopengadaans->id,
                   'filepdf'=>$filename
               );
               Banegopengadaanfile::insert($data);
           }
        }
        \LogActivity::addToLog($banegopengadaans->judul_pekerjaan);
        return redirect('/banegopengadaan')->with('success', 'Data Berhasil Diperbarui');
    }

    public function cetak($id)
    {
         $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/banegopengadaan')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $userbrg = Auth::user()->lokasis()->with('barang')->get();
        $pref = Preference::find(1);
        $banegopengadaans = Banegopengadaan::with('banegopengadaanfile', 'banegodetail')->find($id);
        // $vendors = Vendor::pluck('namaperusahaan', 'id')->all();    
        //  $divisis = Divisi::pluck('kode', 'id')->all();    
        $judul = 'BA Klarifikasi & Nego';
        // $bulan = $this->tanggal_local();
        $pdf = PDF::loadView('pengadaan.banegopengadaan.cetak',compact('judul','pref','users','userbrg','crud', 'banegopengadaans'));
        return $pdf->stream();    
    }

}
