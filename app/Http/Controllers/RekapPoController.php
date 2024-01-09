<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Po\Rekappo;
use App\Models\Po\Poheader;
use App\Models\Po\Podetail;
use App\Models\Po\Potemp;
use App\Models\Po\Pofile;
use App\Models\Preference;
use App\Models\Lokasi;
use App\Models\Hargabarang;
use App\Models\Currency;
use App\Models\Hargalist;
use App\Models\Bod;
use App\Models\Menu;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Session;
use PDF;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PoExport;
use App\Models\LogActivity as LogActivityModel;
// App\Http\Controllers\PoExport

class RekapPoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function GenerateNumber(){
        $AWAL = 'APP-PBJ';
        // karna array dimulai dari 0 maka kita tambah di awal data kosong
        // bisa juga mulai dari "1"=>"I"
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $noUrutAkhir = Rekappo::WhereYear('created_at', Carbon::now()->year)->count();
        $no = 1;
        if($noUrutAkhir) {
            $noUrutAkhir = sprintf("%03s", abs($noUrutAkhir + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
        }
        else {
            $noUrutAkhir = sprintf("%03s", $no). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
        }
        
        return $noUrutAkhir;
    }

    public function index()
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();  
	    $menu = Menu::where('link', '/rekappo')->first();
        $crud = $users->where('menu_id', $menu->id)->first(); 
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $rekappos = Rekappo::orderBy('created_at', 'DESC')->with('vendor.badanusaha')->get();
        $judul = 'Rekap PO';
        return view('transaksi.rekappo.index', compact('judul', 'rekappos','users','pref','crud','lokasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $noUrutAkhir = $this->GenerateNumber(); 
        $rekappos = Rekappo::with('podetails')->get();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $preferences = Preference::all();
        $bods = Bod::all();
        $hargabarangs = Hargabarang::orderBy('nama_brg', 'ASC')->get();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        $currencys = Currency::orderBy('name', 'ASC')->get();
        // $temporary = 
        $judul = 'Rekap PO';
        return view('transaksi.rekappo.add', compact('users','judul', 'bods', 'currencys', 'noUrutAkhir', 'hargabarangs', 'rekappos','pref','preferences','lokasis','vendors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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

        $pos = Rekappo::where('id','=', $request->id)->first();
        $pos->no_po = $request->no_po;
        $pos->no_kontrak = $request->no_kontrak;
        $pos->nilai_rap = $request->nilai_rap;
        $pos->tanggal = $request->tanggal;
        $pos->start_date = $request->start_date;
        $pos->end_date = $request->end_date;
        $pos->cara_bayar = $request->cara_bayar;
        $pos->cara_bayar1 = $request->cara_bayar1;
        $pos->pajak = $request->pajak;
        $pos->pajak1 = $request->pajak1;
        $pos->asuransi = $request->asuransi;
        $pos->nama_pekerjaan = $request->nama_pekerjaan;
        $pos->vendor_id = $request->vendor_id;
        $pos->lokasi_id = $request->lokasi_id;
        $pos->currency_id = $request->currency_id;              
        $pos->preference_id = $request->preference_id;
        $pos->bod_id = $request->bod_id;   $pos->hargapabrik = $request->hargapabrik;
        $pos->deskripsi = $request->deskripsi;
        $pos->suratpenawaran = $request->suratpenawaran;
        $pos->desc_tgl = $request->desc_tgl;
        $pos->desc = $request->desc;
        $pos->diskon = $request->diskon;
        $pos->biaya_kirim = $request->biaya_kirim;
        $pos->custom = $request->custom;
        $pos->catatan = $content;
        $pos->custom1 = $request->custom1;
        $pos->custom2 = $request->custom2;
        $pos->custom3 = $request->custom3;
        $pos->totalrp = $request->totalrp;
        $pos->save();

        \LogActivity::addToLog($pos->no_po);

        $id = $request->id;
        $dodet = $pos::with(['podetails', 'pofiles'])->find($id);        
        $dodet->update($request->toArray());
        $dodet->podetails()->delete();
        $dodet->pofiles()->delete();
        
        
        if ($pos) {
            foreach ($request->hargabarang_id as $key => $v) {
                    $data =Podetail::Insert( array(
                        'rekappo_id'=>$pos->id,
                        'hargabarang_id'=>$v,
                        'qty'=>$request->qty [$key],
                        'satuan'=>$request->satuan [$key],
                        'harga'=>$request->harga [$key]
                    ));

                    $brgs = Hargabarang::where('id', $v )->first();
                    if ($brgs['qty'] == "") {
                        $brgs['qty'] =  $request->qty[$key] ;
                        $brgs['harga_lama'] =  $request->harga[$key] ;
                        $brgs['harga'] =  $request->harga[$key] ;
                        $brgs->save();
                    }
                    else {
                        $brgs['qty'] = $brgs->qty + $request->qty[$key] ;
                        $brgs['harga_lama'] =  $request->harga[$key] ;
                        $brgs['harga'] =  $request->harga[$key] ;
                        $brgs->save();
                    }
            }
        }
        return redirect('/rekappo')->with('success', 'Data Berhasil disimpan');    
       
    } 

    // public function hargabarang()
    // {
    //     $hargabarangs = Hargabarang();


    // }

    public function store1(Request $request)
    {          
        $no_po = $request->no_po;
        $ven = Rekappo::where('no_po',$no_po)->first();

        if ($ven) 
        {
           return redirect()->back()->with('message', 'No PO sudah ada');
        }
        else
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

        $pos = new Rekappo();
        $pos->no_po = $request->no_po;
        $pos->no_kontrak = $request->no_kontrak;
        $pos->nilai_rap = $request->nilai_rap;
        $pos->tanggal = $request->tanggal;
        $pos->start_date = $request->start_date;
        $pos->end_date = $request->end_date;
        $pos->cara_bayar = $request->cara_bayar;
        $pos->cara_bayar1 = $request->cara_bayar1;
        $pos->pajak = $request->pajak;
        $pos->pajak1 = $request->pajak1;
        $pos->asuransi = $request->asuransi;
        $pos->nama_pekerjaan = $request->nama_pekerjaan;
        $pos->vendor_id = $request->vendor_id;
        $pos->lokasi_id = $request->lokasi_id;      
        $pos->currency_id = $request->currency_id;       
        $pos->preference_id = $request->preference_id;
        $pos->bod_id = $request->bod_id;
        $pos->hargapabrik = $request->hargapabrik;
        $pos->deskripsi = $request->deskripsi;
        $pos->suratpenawaran = $request->suratpenawaran;
        $pos->desc_tgl = $request->desc_tgl;
        $pos->desc = $request->desc;
        $pos->diskon = $request->diskon;
        $pos->biaya_kirim = $request->biaya_kirim;
        $pos->custom = $request->custom;
        $pos->catatan = $content;
        $pos->custom1 = $request->custom1;
        $pos->custom2 = $request->custom2;
        $pos->custom3 = $request->custom3;
        $pos->totalrp = $request->totalrp;
        $pos->save();            

        \LogActivity::addToLog($pos->no_po);

        if ($pos) {
            foreach ($request->hargabarang_id  as $key => $value) {
                $data = (array(
                    'rekappo_id'=>$pos->id,
                    'hargabarang_id'=>$value,
                    'qty'=>$request->qty [$key],
                    'satuan'=>$request->satuan [$key],
                    'harga'=>$request->harga [$key]
                ));     
                Podetail::Insert($data);
            }
        }

            return redirect()->route('rekappodetail', ['id' => $pos->id]);
    }
    }      

    public function detail($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $rekappos = Rekappo::with('podetails')->find($id);
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $preferences = Preference::all();
        $bods = Bod::all();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        $brgs = Hargabarang::orderBy('nama_brg', 'ASC')->get();

        // $temporary = 
        $judul = 'Purchase Order';
        return view('transaksi.rekappo.adddetail', compact('users','judul', 'bods',  'rekappos','pref','preferences','lokasis','vendors'));
    
    }

    public function editdetail($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $rekappos = Rekappo::find($id);
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $preferences = Preference::all();
        $bods = Bod::all();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        // $temporary = 
        $judul = 'Purchase Order';
        return view('transaksi.rekappo.editdetail', compact('users','judul', 'bods', 'rekappos','pref','preferences','lokasis','vendors'));
    
    }

    public function cetak($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $rekappos = Rekappo::find($id);
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $preferences = Preference::all();
        $bods = Bod::all();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        // $temporary = 
        $judul = 'Purchase Order';
        $pdf = PDF::loadView('transaksi.rekappo.cetak', compact('users','judul', 'bods', 'rekappos','pref','preferences','lokasis','vendors'));
        return $pdf->stream();
    }

    public function kontrak($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $rekappos = Rekappo::find($id);
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $preferences = Preference::all();
        $bods = Bod::all();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        // $temporary = 
        $judul = 'Kontrak';
        $pdf = PDF::loadView('transaksi.rekappo.kontrak', compact('users','judul', 'bods', 'rekappos','pref','preferences','lokasis','vendors'));
        return $pdf->stream();
    }

    public function show($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $judul = 'Show PO';
        $judul1 = 'Purchase Order';
        $bods = Bod::all();
        $rekappos = Rekappo::with('preference', 'lokasi', 'vendor')->find($id);
        return view('transaksi.rekappo.show', compact('rekappos', 'judul', 'bods', 'judul1','users','pref'));
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
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();      
        $pos = Rekappo::find($id);
        $bods = Bod::all();
        $judul = 'Edit Rekap PO';
        $preferences = Preference::all();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $hargabarangs = Hargabarang::orderBy('nama_brg', 'ASC')->get();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        $currencys = Currency::orderBy('name', 'ASC')->get();
        return view('transaksi.rekappo.edit', compact('pos','judul', 'currencys', 'hargabarangs', 'pref','bods','lokasis','vendors','users', 'preferences'));
    }

    public function upload($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();      
        $pos = Rekappo::find($id);
        $bods = Bod::all();
        $judul = 'Upload File Rekap PO';
        $preferences = Preference::all();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        return view('transaksi.rekappo.upload', compact('pos','judul', 'pref','bods','lokasis','vendors','users', 'preferences'));
    }

    public function poupload(Request $request){
        $pos = Rekappo::where('id','=', $request->id)->first();
        $pos->no_po = $request->no_po;
        $pos->save();
        
        \LogActivity::addToLog($pos->no_po);

        if($request->hasfile('filepdf'))
        {
           foreach ($request->filepdf as $file) {
            // $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'PO_'. date('YmdHis').".".$extension; 
            // $name = $file->getClientOriginalName();
            // $filename = $request->id.$name; 
            $tujuan_upload = 'data_file/pdf';
            $file->move($tujuan_upload,$filename);
           $data = array(
                   'rekappo_id'=>$pos->id,
                   'filepdf'=>$filename
               );
               Pofile::insert($data);
           }
        }

        return redirect('/rekappo')->with('success', 'Data Berhasil Diperbarui');
    }

    public function publish($id)
    {       
        $rekapp = Rekappo::find($id);
        $rekapp->is_published = !$rekapp->is_published;
        $rekapp->save();  
        return redirect('/rekappo');
    }

    public function status($id)
    {       
        $rekapp = Rekappo::find($id);
        $rekapp->status = !$rekapp->status;
        $rekapp->save();  
        return redirect('/rekappo');
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

            $pos = Rekappo::where('id','=', $request->id)->first();
            $pos->no_po = $request->no_po;
            $pos->no_kontrak = $request->no_kontrak;
            $pos->nilai_rap = $request->nilai_rap;
            $pos->tanggal = $request->tanggal;
            $pos->start_date = $request->start_date;
            $pos->end_date = $request->end_date;
            $pos->cara_bayar = $request->cara_bayar;
            $pos->cara_bayar1 = $request->cara_bayar1;
            $pos->pajak = $request->pajak;
            $pos->pajak1 = $request->pajak1;
            $pos->asuransi = $request->asuransi;
            $pos->nama_pekerjaan = $request->nama_pekerjaan;
            $pos->vendor_id = $request->vendor_id;
            $pos->currency_id = $request->currency_id; 
            $pos->lokasi_id = $request->lokasi_id;            
            $pos->preference_id = $request->preference_id;
            $pos->bod_id = $request->bod_id;
            $pos->hargapabrik = $request->hargapabrik;
            $pos->deskripsi = $request->deskripsi;
            $pos->suratpenawaran = $request->suratpenawaran;
            $pos->desc_tgl = $request->desc_tgl;
            $pos->desc = $request->desc;
            $pos->diskon = $request->diskon;
            $pos->biaya_kirim = $request->biaya_kirim;
            $pos->custom = $request->custom;
            $pos->catatan = $content;
            $pos->custom1 = $request->custom1;
            $pos->custom2 = $request->custom2;
            $pos->custom3 = $request->custom3;
            $pos->totalrp = $request->totalrp;
            // dd($pos);
            $pos->save();
            
            $id = $request->id;
            $dodet = $pos::with(['podetails', 'pofiles'])->find($id);        
            $dodet->update($request->toArray());
            $dodet->podetails()->delete();
            $dodet->pofiles()->delete();
            
            if ($pos) {
                foreach ($request->hargabarang_id as $key => $v) {
                    $data = array(
                        'rekappo_id'=>$pos->id,
                        'hargabarang_id'=>$v,
                        'qty'=>$request->qty [$key],
                        'satuan'=>$request->satuan [$key],
                        'harga'=>$request->harga [$key]
                    );
                    Podetail::insert($data);

                    $brgs = Hargabarang::where('id', $v )->first();
                    if ($brgs->qty == "") {
                        $brgs['qty'] = $request->qty[$key] ;
                        $brgs['harga_lama'] =  $request->harga_lama[$key] ;
                        $brgs['harga'] =  $request->harga[$key] ;
                        $brgs->update();
                    }
                    else {
                        $brgs['qty'] = $brgs->qty + $request->qty[$key] ;
                        $brgs['harga_lama'] =  $request->harga_lama[$key] ;
                        $brgs['harga'] =  $request->harga[$key] ;
                        $brgs->update();
                    }
                   

                }
            }
            \LogActivity::addToLog($pos->no_po);
            return redirect('/rekappo')->with('success', 'Data Berhasil Diperbarui');
    }


    public function update1(Request $request)
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

            $pos = Rekappo::where('id','=', $request->id)->first();
            $pos->no_po = $request->no_po;
            $pos->no_kontrak = $request->no_kontrak;
            $pos->nilai_rap = $request->nilai_rap;
            $pos->tanggal = $request->tanggal;
            $pos->start_date = $request->start_date;
            $pos->end_date = $request->end_date;
            $pos->cara_bayar = $request->cara_bayar;
            $pos->cara_bayar1 = $request->cara_bayar1;
            $pos->pajak = $request->pajak;
            $pos->pajak1 = $request->pajak1;
            $pos->asuransi = $request->asuransi;
            // $pos->pajak = $request->has('pajak');
            $pos->nama_pekerjaan = $request->nama_pekerjaan;
            $pos->vendor_id = $request->vendor_id;
            $pos->lokasi_id = $request->lokasi_id;            
            $pos->currency_id = $request->currency_id; 
            $pos->preference_id = $request->preference_id;
            $pos->bod_id = $request->bod_id;
            $pos->hargapabrik = $request->hargapabrik;
            $pos->deskripsi = $request->deskripsi;
            $pos->suratpenawaran = $request->suratpenawaran;
            $pos->desc_tgl = $request->desc_tgl;
            $pos->desc = $request->desc;
            $pos->diskon = $request->diskon;
            $pos->biaya_kirim = $request->biaya_kirim;
            $pos->custom = $request->custom;
            $pos->catatan = $content;
            $pos->custom1 = $request->custom1;
            $pos->custom2 = $request->custom2;
            $pos->custom3 = $request->custom3;
            $pos->totalrp = $request->totalrp;
            // dd($pos);
            $pos->save();


            $id = $request->id;
            $dodet = $pos::with(['podetails', 'pofiles'])->find($id);        
            $dodet->update($request->toArray());
            $dodet->podetails()->delete();
            $dodet->pofiles()->delete();
            
            if ($pos) {
                foreach ($request->hargabarang_id as $key => $v) {
                    $data = array(
                        'rekappo_id'=>$pos->id,
                        'hargabarang_id'=>$v,
                        'qty'=>$request->qty [$key],
                        'satuan'=>$request->satuan [$key],
                        'harga'=>$request->harga [$key]
                    );
                    Podetail::insert($data);

                    $brgs = Hargabarang::where('id', $v )->first();
                        if ($brgs['qty'] <= 0) {
                            $brgs['qty'] = $request->qty[$key] ;
                            $brgs['harga_lama'] =  $request->harga_lama[$key] ;
                            $brgs['harga'] =  $request->harga[$key] ;
                            $brgs->update();
                        }
                        // elseif ($brgs['qty'] < $request->qty_old[$key]) {
                            
                        // } 
                        else
                        {
                            $brgs['qty'] = $brgs->qty - $request->qty_old[$key] ;
                            $brgs['harga_lama'] =  $request->harga_lama[$key] ;
                            $brgs['harga'] =  $request->harga[$key] ;
                            $brgs->update();
                        }
                        
                   
                
                }
            }
            \LogActivity::addToLog($pos->no_po);
            return redirect()->route('rekappoeditdetail', ['id' => $pos->id]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Rekappo::find($id);
        $data->podetails()->delete();
 	    $data->pofiles()->delete();
        $data->delete($data);
        \LogActivity::addToLog($data->no_po);
        return redirect('/rekappo')->with('success', 'PO Berhasil Dihapus');
    }

    public function destroydetail($id){
        $data = Podetail::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->id);
        // return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }

    public function destroyfile($id){
        $data = Pofile::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->id);
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }

    public function exportXLS(Request $request) {
    
        return Excel::download(new PoExport, 'po.xlsx');
       
    }

    public function exportPDF(Request $request) {
        $start = date('Y-m-d',strtotime($request->start));
        $end = date('Y-m-d',strtotime($request->end));
        $rekappos = Rekappo::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
    	$pdf = PDF::loadview('transaksi.rekappo.exportpdf', compact('rekappos', 'start', 'end'))->setPaper('A4','landscape');
    	return $pdf->stream();
       
    }

}
