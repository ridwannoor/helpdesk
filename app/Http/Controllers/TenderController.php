<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vendorbank;
use App\Models\Vendorbod;
use App\Models\Vendor;
use App\Models\Jenisusaha;
use App\Models\Lokasi;
use App\Models\Menu;
use App\Models\Itemdetail;
use App\Models\Badanusaha;
use App\Models\Bank;
use App\Models\Category;
use App\Models\Pengadaan\Metodeevaluasi;
use App\Models\Pengadaan\Metodepengadaan;
use App\Models\Pengadaan\Tender;
use App\Models\Pengadaan\Tenderquot;
use App\Models\Pengadaan\Tendernodin;
use App\Models\Pengadaan\Tenderpenawaran;
use App\Models\Pengadaan\Tendersyarat;
use App\Models\Pengadaan\Syarattender;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Models\LogActivity as LogActivityModel;
use Session;
use App\Models\Preference;
use App\Models\Dasar;
use App\Models\Vendordoc;
use App\Models\Vendorjenis;
use App\Models\Vendorjenisdoc;
use App\Models\Vendorlisensi;
use App\Models\Vendorfasilitas;
use App\Models\Vendorsertifikat;
use App\Models\Vendorlap;
use App\Models\Vendorklasifikasi;
use App\Models\Vendorpengalaman;
use App\Models\Vendorpengurus;
use App\Models\Vendortenaga;
use App\Models\Vendortipe;
use App\Models\Currency;
use App\Models\Anggaran;
use App\Models\Divisi;
use App\Models\Jenispekerjaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VendorExport;
use App\Models\Pengadaan\Tenderdetail;
use App\Models\Pengadaan\Tenderfile;
use App\Models\Pengadaan\Statustender;
use Carbon;

class TenderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
	    $menu = Menu::where('link', '/tender')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $tenders = Tender::orderBy('created_at', 'DESC')->get();
	//dd($tenders);
        $menus = Menu::all();
        $badan = Badanusaha::all();
        $judul = 'Tender';
      
        return view('pengadaan.tender.index', compact('tenders','judul','users','pref','badan', 'crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $jnspek = Jenispekerjaan::all();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $status = Statustender::all();
        $divisis = Divisi::orderBy('kode', 'ASC')->get();
        $dasars = Dasar::all();
        $metodes = Metodepengadaan::all();
        $evaluasis = Metodeevaluasi::all();
        $anggarans = Anggaran::all();
        $judul = 'Tambah Tender';
        $vendors = Vendorklasifikasi::all();
        $syarats = Syarattender::all();
        return view('pengadaan.tender.add', compact('judul','users', 'evaluasis', 'dasars', 'metodes', 'syarats','pref', 'status', 'jnspek', 'lokasis', 'anggarans', 'vendors', 'divisis')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = $request->uraian_pek;
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

        $tenders = new Tender();
        $tenders->nomor_pr = $request->nomor_pr;
        $tenders->nama_paket = $request->nama_paket;
        $tenders->tgl_paket = $request->tgl_paket;
        $tenders->tgl_daftar = $request->tgl_daftar;
        $tenders->uraian_pek = $content;
        $tenders->lokasi_id = $request->lokasi_id;
        $tenders->anggaran_id = $request->anggaran_id;
        $tenders->divisi_id = $request->divisi_id;
        $tenders->dasar_id = $request->dasar_id;
        $tenders->statustender_id = $request->statustender_id;
        $tenders->pagu = $request->pagu;
        $tenders['catender'] = json_encode($request->catender);
        $tenders->tgl_tutup = $request->tgl_tutup;
        $tenders->lokasi_pekerjaan = $request->lokasi_pekerjaan;
        $tenders->metodepengadaan_id = $request->metodepengadaan_id;
        $tenders->metodeevaluasi_id = $request->metodeevaluasi_id;
        $tenders->catatan = $request->catatan;
        $tenders->jangka_pelaksanaan = $request->jangka_pelaksanaan;
        $tenders->jangka_pemeliharaan = $request->jangka_pemeliharaan;
        $tenders->jaminan_pelaksanaan = $request->jaminan_pelaksanaan;
        // dd($tenders);
        $tenders->save();
        $tenders->jenispekerjaans()->attach($request->jenispekerjaan_id);

        // if ($tenders) {
        //     foreach ($request->namenodin  as $key => $value) {
        //         $data = (array(
        //             'tender_id'=>$tenders->id,
        //             'namenodin'=>$value,
        //         ));     
        //         Tendernodin::Insert($data);
        //     }
        // }

        if ($tenders) {
            foreach ($request->vendorklasifikasi_id  as $key => $value) {
                $data = (array(
                    'tender_id'=>$tenders->id,
                    'vendorklasifikasi_id'=>$value,
                ));     
                Tenderdetail::Insert($data);
            }
        }

        if ($tenders) {
            foreach ($request->syarattender_id  as $key => $value) {
                $data = (array(
                    'tender_id'=>$tenders->id,
                    'syarattender_id'=>$value,
                ));     
                Tendersyarat::Insert($data);
            }
        }

        \LogActivity::addToLog($tenders->nomor_pr);
        return redirect('/tender')->with('sucess', 'tender berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $jnspek = Jenispekerjaan::all();
        $lokasis = Lokasi::all();
        $anggarans = Anggaran::all();
        $judul = 'Show Tender';
        $vendors = Vendorklasifikasi::all();
        $tenders = Tender::with('tenderdetail', 'jenispekerjaans', 'tenderpenawaran', 'tenderquot')->find($id);
        $tendsi = $tenders->tenderquot->collect('syarattender_id');
        $sorted = $tendsi->sortBy('syarattender_id');
        // dd( $sorted);
        // $tendsod = Tenderquot::with('vendor', 'tender')->find($id);
        return view('pengadaan.tender.show', compact('judul','users','pref', 'jnspek', 'lokasis', 'anggarans', 'vendors', 'tenders', 'tendsi', 'sorted')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $jnspek = Jenispekerjaan::all();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $anggarans = Anggaran::all();
        $status = Statustender::all();
        $divisis = Divisi::orderBy('kode', 'ASC')->get();
        $dasars = Dasar::all();
        $metodes = Metodepengadaan::all();
        $evaluasis = Metodeevaluasi::all();
        $judul = 'Edit Tender';
        $vendors = Vendorklasifikasi::all();
        $syarats = Syarattender::all();
        $tenders = Tender::with('tenderdetail')->find($id);
        $jenispekerjaans = Jenispekerjaan::pluck('name', 'id')->all();    
        return view('pengadaan.tender.edit', compact('judul','users','pref', 'evaluasis', 'dasars', 'metodes', 'jnspek', 'syarats', 'lokasis', 'anggarans', 'vendors', 'status', 'tenders', 'jenispekerjaans', 'divisis')); 
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
        $content = $request->uraian_pek;
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

        $tenders = Tender::where('id','=', $request->id)->first();
        $tenders->nomor_pr = $request->nomor_pr;
        $tenders->nama_paket = $request->nama_paket;
        $tenders->tgl_paket = $request->tgl_paket;
        $tenders->tgl_daftar = $request->tgl_daftar;
        $tenders->uraian_pek = $content;
        $tenders->lokasi_id = $request->lokasi_id;
        $tenders->anggaran_id = $request->anggaran_id;
        $tenders->divisi_id = $request->divisi_id;
        $tenders->dasar_id = $request->dasar_id;
        $tenders->statustender_id = $request->statustender_id;
        $tenders->pagu = $request->pagu;
        $tenders['catender'] = json_encode($request->catender);
        // $tenders->catender = array($request->catender) ;
        $tenders->tgl_tutup = $request->tgl_tutup;
        $tenders->lokasi_pekerjaan = $request->lokasi_pekerjaan;
        $tenders->metodepengadaan_id = $request->metodepengadaan_id;
        $tenders->metodeevaluasi_id = $request->metodeevaluasi_id;
        $tenders->catatan = $request->catatan;
        $tenders->jangka_pelaksanaan = $request->jangka_pelaksanaan;
        $tenders->jangka_pemeliharaan = $request->jangka_pemeliharaan;
        $tenders->jaminan_pelaksanaan = $request->jaminan_pelaksanaan;
        $tenders->save();
        $tenders->jenispekerjaans()->sync($request->jenispekerjaans);

        $id = $request->id;
        $dodet = $tenders::with(['tenderdetail'])->find($id);        
        $dodet->update($request->toArray());
        $dodet->tenderdetail()->delete();
        // $dodet->tendernodin()->delete();
        $dodet->tendersyarat()->delete();

        // if ($tenders) {
        //     foreach ($request->namenodin  as $key => $value) {
        //         $data = (array(
        //             'tender_id'=>$tenders->id,
        //             'namenodin'=>$value,
        //         ));     
        //         Tendernodin::Insert($data);
        //     }
        // }

        if ($tenders) {
            foreach ($request->vendorklasifikasi_id  as $key => $value) {
                $data = (array(
                    'tender_id'=>$tenders->id,
                    'vendorklasifikasi_id'=>$value,
                ));     
                Tenderdetail::Insert($data);
            }
        }

        if ($tenders) {
            foreach ($request->syarattender_id  as $key => $value) {
                $data = (array(
                    'tender_id'=>$tenders->id,
                    'syarattender_id'=>$value,
                ));     
                Tendersyarat::Insert($data);
            }
        }
        \LogActivity::addToLog($tenders->nomor_pr);
        return redirect('/tender')->with('sucess', 'tender berhasil dibuat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Tender::find($id);
        $data->tenderdetail()->delete();
        // $data->tendernodin()->delete();
        $data->tenderfile()->delete();
        $data->delete($data);
        \LogActivity::addToLog($data->nomor_pr);
        return redirect('/tender')->with('sukses','Data Berhasil di Hapus');
    }

    public function exportPDF($id)
    {
        $tenders = Tender::find($id);
        $pref = Preference::first();
        $tendsi = $tenders->tenderquot->collect('syarattender_id');
        $sorted = $tendsi->sortBy('syarattender_id');
        $pdf = PDF::loadview('pengadaan.tender.exportpdf', compact('tenders', 'pref', 'tendsi', 'sorted'));
    	return $pdf->stream();
    }


    public function publish($id)
    {       
        $tenders = Tender::find($id);
        $tenders->is_published = !$tenders->is_published;
        $tenders->save();  
        return redirect('/tender');
    }

    public function approval($id)
    {       
        $tenders = Tender::find($id);
        $tenders->is_approval = !$tenders->is_approval;
        // $tenders->is_published = !$tenders->is_published;
        $tenders->save();  
        return redirect('/tender');
    }

    public function uploadsimpan(Request $request){
        $tenders = Tender::where('id','=', $request->id)->first();
        $tenders->nomor_pr = $request->nomor_pr;
        $tenders->save();
        
   
        if($request->hasfile('filepdf'))
        {
           foreach ($request->filepdf as $file) {
            // $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'TEN_'. date('YmdHis').".".$extension; 
            // $name = $file->getClientOriginalName();
            // $filename = $request->id.$name; 
            $tujuan_upload = 'data_file/pdf';
            $file->move($tujuan_upload,$filename);
           $data = array(
                   'tender_id'=>$tenders->id,
                   'nama_file'=>$request->nama_file,
                   'filepdf'=>$filename
               );
               Tenderfile::insert($data);
           }
        }
        \LogActivity::addToLog($tenders->nomor_pr);
        return redirect('/tender')->with('success', 'File Berhasil Ditambahkan');
    }
    
    public function destroyfile($id){
        $data = Tenderfile::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->id);
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }

    public function qout(Request $request)
    {
        $tends = $request->tender_id ;
        $vends = $request->vendor_id ;
        $files = $request->file_pdf ;
        $syarts = $request->syarattender_id ;

        $tedner = Tenderpenawaran::where('tender_id', $tends)->where('vendor_id', $vends)->first(); 
        $tedner->dok_teknis = $request->dok_teknis ;
        $tedner->dok_administrasi = $request->dok_administrasi ;
        $tedner->dok_harga = $request->dok_harga ;
        $tedner->save();

        \LogActivity::addToLog($tedner->id);
        
        $id = $request->id;
        $brgs = Tenderquot::find($id); 
        // dd($dodet) ;
        // $dodet->update($request->toArray());
        // $dodet->delete();

        foreach ($request->syarattender_id as $key => $value) {
            // $name = $value->getClientOriginalName();
            // $filename = $request->id.$name; 
            // $tujuan_upload = 'data_file/pdf';
            // $value->move($tujuan_upload,$filename);
           
            // dd($brgs);    
            // $data = array(
            //     // 'tender_id'=>$request->tender_id [$key],
            //     // 'vendor_id'=>$request->vendor_id [$key],
            //     // 'file_pdf'=>$filename,
            //     'adaatautidak'=>$request->adaatautidak [$key],
            //     'catatan'=>$request->catatan [$key]
            // );
            $brgs = Tenderquot::where('syarattender_id', $value)->where('id', $request->id[$key])->first(); 
            $brgs['adaatautidak'] =  $request->adaatautidak [$key];
            $brgs['catatan'] =  $request->catatan[$key] ;
            $brgs->update();
        }
        // $tendsa2 = Tenderquot::where('tender_id', $tends)->where('vendor_id', $vends)->find($id); 
        // if ($tendsa2) {
        // $data =Podetail::Insert( array(
        //     'rekappo_id'=>$pos->id,
        //     'hargabarang_id'=>$v,
        //     'qty'=>$request->qty [$key],
        //     'satuan'=>$request->satuan [$key],
        //     'harga'=>$request->harga [$key]
        // ));
        // }
       
        // $tendsa2 = Tenderquot::find($id); 
        // $tendsa2->update($request->toArray());
        // dd($tendsa2);
        // $tendsa2->delete();

        // if($tendsa2)
        // {
        //     if($request->hasFile('file_pdf'))
        //     {
        //         $name = $value->getClientOriginalName();
        //         $filename = $request->id.$name; 
        //         $tujuan_upload = 'data_file/pdf';
        //         $value->move($tujuan_upload,$filename);

        //         $data =Tenderquot::Insert( array(
        //             'tender_id'=>$tendsa2->tender_id,
        //             'vendor_id'=>$tendsa2->vendor_id,
        //             'file_pdf'=>$filename,
        //             'adaatautidak'=>$request->adaatautidak [$key],
        //             'catatan'=>$request->catatan [$key]
        //         ));
            //     foreach ($request->file_pdf as $key => $valuesyarts) {
            //         $name = $value->getClientOriginalName();
            //         $filename = $request->id.$name; 
            //         $tujuan_upload = 'data_file/pdf';
            //         $value->move($tujuan_upload,$filename);

            //         $brgs = Tenderquot::where('tender_id', $tends)
            //         ->where('syarattender_id', $syarts)
            //         ->where('vendor_id', $vends)
            //         ->first(); 
            //         $brgs->adaatautidak = $value;
            //         $brgs->catatan = $request->catatan;
            //         $brgs->save();
            //         // $data = array(
            //         //     'tender_id'=>$tends,         
            //         //     'vendor_id'=>$vends,   
            //         //     'file_pdf' => $filename,
            //         //     'syarattender_id' => $request->syarattender_id [$key],
            //         //     'adaatautidak' => $request->adaatautidak [$key],  
            //         //     'catatan' => $request->catatan [$key],           
            //         // );
            //         dd($brgs);
            //         // Tenderquot::insert($data); 
            //     }
        //     }
        // }
        return redirect()->back()->with('success', 'Berhasil disimpan');

    }
}
