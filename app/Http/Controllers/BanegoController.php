<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banego;
// use App\Models\Bafile;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Lokasi;
use App\Models\Bidok;
use App\Models\Divisi;
use App\Models\Dokpekerjaan;
use App\Models\Vendor;
use App\Models\Badanusaha;
use App\Models\Preference;
use App\Models\Bafile;
use App\Models\Pengadaan\Jaminan;
use PDF;
use Carbon\Carbon;
use App\Models\LogActivity as LogActivityModel;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Illuminate\Contracts\View\View;
// use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BanegoExport;

class BanegoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/banego')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $userbrg = Auth::user()->lokasis()->with('barang')->get();
        $pref = Preference::first();
        $lok = Banego::orderBy('tanggal', 'DESC')->get();
        $divisis = Divisi::all();
        $judul = 'BA Nego';
        return view('banego.index', compact('judul','pref','users','userbrg','crud', 'lok', 'divisis')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lokasis = Lokasi::all();
        $bidoks = Bidok::all();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        $users = Auth::user()->userdetails()->with('menu')->get();           
        $noUrutAkhir = $this->GenerateNumber();
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $divisis = Divisi::all();
        $doks = Dokpekerjaan::orderBy('detail', 'ASC')->get();
        $judul = 'Tambah BA Nego';
        $jams = Jaminan::all();
        return view('banego.add', compact('judul','bidoks','users','pref','lokasis', 'vendors', 'doks', 'divisis', 'noUrutAkhir', 'jams')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->no_ba;
        $ven = Banego::where('no_ba',$name)->first();

        if ($ven) {
            return redirect()->back()->with('message', 'Data Sudah Ada');
        }
        else {
            $content = $request->cara_pembayaran;
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

            $content1 = $request->catatan;
            $dom = new \DomDocument();
            @$dom->loadHtml($content1, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
      
            $content1 = $dom->saveHTML();

            $banegos = new Banego();
            $banegos->no_ba = $request->no_ba;
            $banegos->nama_pek = $request->nama_pek;
            $banegos->nilai_rap = $request->nilai_rap;
            $banegos->lokasi_nego = $request->lokasi_nego;
            $banegos->tanggal = $request->tanggal;
            $banegos->spph = $request->spph;
            $banegos->jml_penawaran = $request->jml_penawaran;
            $banegos->start_date = $request->start_date;
            $banegos->end_date = $request->end_date;
            $banegos->jaminan_id = $request->jaminan_id;
            $banegos->spph_nego = $request->spph_nego;
            $banegos->jml_nego = $request->jml_nego;
            $banegos->pajak = $request->pajak;
            $banegos->waktu_pel = $request->waktu_pel;
            $banegos->garansi = $request->garansi;
            $banegos->asuransi = $request->asuransi;
            $banegos->masapemeliharaan = $request->masapemeliharaan;
            $banegos->tempat = $request->tempat;
            $banegos->pengirim = $request->pengirim;
            $banegos->cara_pembayaran = $content;
            $banegos->downpayment = $request->downpayment;
            $banegos->catatan = $content1;
            $banegos->nilaidp = $request->nilaidp;
            $banegos->training = $request->training;
            $banegos->vendor_id = $request->vendor_id;
            $banegos->bidok_id = $request->bidok_id;
            $banegos->save();
            $banegos->divisis()->attach($request->divisi_id);
            $banegos->dokpekerjaans()->attach($request->dokpekerjaan_id);

            \LogActivity::addToLog($banegos->no_ba);
        return redirect('/banego')->with('success', 'Banego Berhasil dibuat');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/banego')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $userbrg = Auth::user()->lokasis()->with('barang')->get();
        $pref = Preference::first();
        $lok = Banego::with('dokpekerjaans','vendor','jaminan','bidok')->find($id);
        // echo json_encode($lok);
        // return;
        $divisis = Divisi::all();
        $judul = 'BA Nego';
        return view('banego.show', compact('judul','pref','users','userbrg','crud', 'lok', 'divisis')); 
    }

    public function cetak($id)
    {
         $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/banego')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $userbrg = Auth::user()->lokasis()->with('barang')->get();
        $pref = Preference::find(1);
        $lok = Banego::with('preference', 'dokpekerjaans', 'divisis', 'bidok', 'jaminan')->find($id);
        // echo json_encode($lok);
        // return true;
        $divisis = Divisi::all();
        $judul = 'BA Nego';
        // $bulan = $this->tanggal_local();
        $pdf = PDF::loadView('banego.cetak',compact('judul','pref','users','userbrg','crud', 'lok', 'divisis'))->setPaper('a4', 'portrait');
        return $pdf->stream();    
    }

    public function upload($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();      
        $banegos = Banego::find($id);
        // $bods = Bod::all();
        $judul = 'Upload File BA Nego';
        $preferences = Preference::all();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        return view('banego.upload', compact('banegos','judul', 'pref','lokasis','vendors','users', 'preferences'));
    }
    
    public function baupload(Request $request){
        $banegos = Banego::where('id','=', $request->id)->first();
        $banegos->no_ba = $request->no_ba;
        $banegos->save();
        
   
        if($request->hasfile('filepdf'))
        {
           foreach ($request->filepdf as $file) {
            $name = $file->getClientOriginalName();
            // $filename = $request->id.$name; 
            $extension = $file->getClientOriginalExtension();
            $filename = 'BAN_'. date('YmdHis').".".$extension; 
            $tujuan_upload = 'data_file/pdf';
            $file->move($tujuan_upload,$filename);
           $data = array(
                   'banego_id'=>$banegos->id,
                   'filepdf'=>$filename
               );
               Bafile::insert($data);
           }
        }
        \LogActivity::addToLog($banegos->no_ba);
        return redirect('/banego')->with('success', 'Data Berhasil Diperbarui');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
         $judul = 'Edit Banego';
         $lok = Banego::find($id);
         $doks = Dokpekerjaan::pluck('kode', 'id')->all();    
         $divisis = Divisi::pluck('kode', 'id')->all();    
         $jams = Jaminan::all();
         $bidoks = Bidok::all();
         return view('banego.edit', compact('lok', 'judul','users','pref', 'doks', 'vendors', 'divisis', 'jams', 'bidoks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $content = $request->cara_pembayaran;
        $content1 = $request->catatan;
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

        $content1 = $request->catatan;
        $dom1 = new \DomDocument();
        @$dom1->loadHtml($content1, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom1->getElementsByTagName('imageFile');
  
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
  
        $content1 = $dom1->saveHTML();

            $banegos = Banego::where('id', $request->id)->first();
            $banegos->no_ba = $request->no_ba;
            $banegos->nama_pek = $request->nama_pek;
            $banegos->nilai_rap = $request->nilai_rap;
            $banegos->lokasi_nego = $request->lokasi_nego;
            $banegos->tanggal = $request->tanggal;
            $banegos->start_date = $request->start_date;
            $banegos->end_date = $request->end_date;
            $banegos->jaminan_id = $request->jaminan_id;
            $banegos->spph = $request->spph;
            $banegos->jml_penawaran = $request->jml_penawaran;
            $banegos->spph_nego = $request->spph_nego;
            $banegos->jml_nego = $request->jml_nego;
            $banegos->pajak = $request->pajak;
            $banegos->waktu_pel = $request->waktu_pel;
            $banegos->garansi = $request->garansi;
            $banegos->asuransi = $request->asuransi;
            $banegos->masapemeliharaan = $request->masapemeliharaan;
            $banegos->tempat = $request->tempat;
            $banegos->pengirim = $request->pengirim;
            $banegos->training = $request->training;
            $banegos->cara_pembayaran = $content;
            $banegos->catatan = $content1;
            $banegos->downpayment = $request->downpayment;
            $banegos->nilaidp = $request->nilaidp;
            $banegos->vendor_id = $request->vendor_id;
            $banegos->bidok_id = $request->bidok_id;
            $banegos->save();
            $banegos->divisis()->sync($request->divisis);
            $banegos->dokpekerjaans()->sync($request->dokpekerjaans);
            \LogActivity::addToLog($banegos->no_ba);
        return redirect('/banego')->with('success', 'Banego Berhasil diperbarui');
        // }

        // $lok = Banego::where('id', $request->id)->update([
        //     'kode' => $request->kode,
        //     'detail' => $request->detail
        // ]);

        // return redirect('/banego')->with('success', 'Banego berhasil di update');
    }

    public function publish($id)
    {       
        $banegos = Banego::find($id);
        $banegos->is_published = !$banegos->is_published;
        $banegos->save();  
        return redirect('/banego');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Banego::find($id);
 	    $data->bafiles()->delete();
        $data->delete($data);
        \LogActivity::addToLog($data->no_ba);
        return redirect('/banego')->with('message', 'Banego Berhasil Dihapus');
    }

    public function destroyfile($id){
        $data = Bafile::find($id);
        $data->delete($data);
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }

    public function exportXLS() {    
        return Excel::download(new BanegoExport, 'banego-collection.xlsx');       
    }

    public function exportPDF(Request $request) {
        $start = date('Y-m-d',strtotime($request->start));
        $end = date('Y-m-d',strtotime($request->end));
        $banegos = Banego::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
    	$pdf = PDF::loadview('banego.exportpdf', compact('banegos', 'start', 'end'))->setPaper('A4','landscape');
    	return $pdf->stream();
       
    }

    public function GenerateNumber(){
        $AWAL = 'BA';
        $AKHIR = 'APP-PL';
        $tahun = date('Y');
        // karna array dimulai dari 0 maka kita tambah di awal data kosong
        // bisa juga mulai dari "1"=>"I"
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $noUrutAkhir = Banego::WhereYear('created_at', Carbon::now()->year)->count();
        // dd($noUrutAkhir);
        $no = 1;
        if($noUrutAkhir) {
            $noUrutAkhir =  $AWAL .'.' . sprintf("%03s", abs($noUrutAkhir + 1)). '/' . $AKHIR .'/' . date('Y');
        }
        else {
            $noUrutAkhir = $AWAL .'.' . sprintf("%03s", $no). '/' .  $AKHIR .'/' . date('Y');
        }
        
        return $noUrutAkhir;
    }
}
