<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divisi;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Lokasi;
use App\Models\Vendor;
use App\Models\Surat\Notaheader;
use App\Models\Surat\Notafile;
use App\Models\Badanusaha;
use App\Models\Preference;
use PDF;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NotadinasExport;
// use Alert;
use App\Models\LogActivity as LogActivityModel;
use RealRashid\SweetAlert\Facades\Alert;

class NotadinasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/notadinas')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $nodins = Notaheader::with('notafile')->orderBy('created_at','DESC')->get();

        foreach ($nodins as $nodin) {
            $temp = [];
            if (strpos($nodin->lokasi_id, '[') !== false) {
                // String contains '[', so convert it to an array
                $lokasi_array = json_decode($nodin->lokasi_id, true);
                foreach ($lokasi_array as $lok) {
                    $temp[] = Lokasi::where('id', $lok)->first();
                }
                
            }else{
                $temp[] = Lokasi::where('id', $nodin->lokasi_id)->first();
            }
            $nodin->lokasi = $temp;
        }


        // var_dump($menu);
        // return true;
        // $pendings = Notaheader::where('status', 'pending')->get();
        // $opens = Notaheader::where('status', 'open')->get();
        // $progress = Notaheader::where('status', 'proses')->get();
        // $dones = Notaheader::where('status', 'done')->get();
        // $cancels = Notaheader::where('status', 'cancel')->get();        // dd( $counts);
        // dd($lokerences);
        $judul = 'Nota Dinas';
        return view('surat.notadinas.index', compact('judul','nodins','users','pref', 'crud' )); 
    }

    public function create()
    {
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $vendors = Vendor::all();
        $divisis = Divisi::orderBy('kode', 'ASC')->get();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/notadinas')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $judul = 'Tambah Nota Dinas';
        return view('surat.notadinas.add', compact('judul','users','divisis', 'pref','lokasis', 'vendors', 'crud')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->lokasi_id = "[".implode(",",$request->lokasi_id)."]";
        // echo json_encode($request->lokasi_id);
        // return true;
        $no_nodin = $request->no_nodin;
        $nodins = Notaheader::where('no_nodin',$no_nodin)->first();

        if ($nodins) {
            return redirect()->back()->with('message', 'Data Sudah Ada');
        }
        else {
            $content = $request->keterangan;
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

            $nodins = new Notaheader();
            $nodins->no_nodin = $request->no_nodin;
            $nodins->nama_pek = $request->nama_pek;
            $nodins->tgl_terima = $request->tgl_terima;
            $nodins->tgl_surat = $request->tgl_surat;
            $nodins->divisi_id = $request->divisi_id;
            $nodins->unit_st = $request->unit_st;
            $nodins->lokasi_id = $request->lokasi_id;
            $nodins->pic = $request->pic;
            // $nodins->pic_off = $request->pic_off;
            $nodins->keterangan = $content;
            $nodins->status = $request->status;
            $nodins->save();

            \LogActivity::addToLog($nodins->no_nodin);
            // alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.');
            toast('Data Nota Dinas Berhasil Dibuat','success');
            // alert()->flash('Welcome back!', 'success');
            // Alert::success('success', 'Divisi Berhasil di Ubah');
            // alert()->flash('success', 'success', [
            //     'text' => 'Welcome to Laravel SweetAlert By Rashid Ali!'
            // ]);
        // return redirect('/divisi')->with('success', 'Divisi Berhasil dibuat');
        return redirect('/notadinas');
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
          $pref = Preference::first();
          $judul = 'Detail Nota Dinas';
        //   $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        //   $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        //   $brgmaintenances = Barangmaintenance::all();
        //   $brgmutasis = Barangmutasi::all();

          $nodins = Notaheader::with('notafile', 'divisi')->find($id);
          $temp = [];
            if (strpos($nodins->lokasi_id, '[') !== false) {
                // String contains '[', so convert it to an array
                $lokasi_array = json_decode($nodins->lokasi_id, true);
                foreach ($lokasi_array as $lok) {
                    $temp[] = Lokasi::where('id', $lok)->first();
                }
                
            }else{
                $temp[] = Lokasi::where('id', $nodins->lokasi_id)->first();
            }
            $nodins->lokasi = $temp;

        return view('surat.notadinas.show', compact('nodins','users','pref','judul'));
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
        $menu = Menu::where('link', '/notadinas')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $judul = 'Edit Nota Dinas';
        $nodins = Notaheader::with('notafile', 'divisi')->find($id);

        $temp = [];
        if (strpos($nodins->lokasi_id, '[') !== false) {
            // String contains '[', so convert it to an array
            $lokasi_array = json_decode($nodins->lokasi_id, true);
            foreach ($lokasi_array as $lok) {
                $temp[] = Lokasi::where('id', $lok)->first();
            }
            
        }else{
            $temp[] = Lokasi::where('id', $nodins->lokasi_id)->first();
        }
        $nodins->lokasi = $temp;

        // var_dump($nodins);
        // return true;

        $divisis = Divisi::orderBy('kode', 'ASC')->get();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        return view('surat.notadinas.edit', compact('nodins', 'judul','users','pref', 'divisis', 'lokasis', 'crud'));
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
        // $content = $request->keterangan;
        //     $dom = new \DomDocument();
        //     @$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        //     $imageFile = $dom->getElementsByTagName('imageFile');
      
        //     foreach($imageFile as $item => $image){
        //         $data = $img->getAttribute('src');
        //         list($type, $data) = explode(';', $data);
        //         list(, $data)      = explode(',', $data);
        //         $imgeData = base64_decode($data);
        //         $image_name= 'upload_file' . time().$item.'.png';
        //         $path = public_path() . $image_name;
        //         file_put_contents($path, $imgeData);
                
        //         $image->removeAttribute('src');
        //         $image->setAttribute('src', $image_name);
        //      }
      
        //     $content = $dom->saveHTML();
        $nodins = Notaheader::where('id','=', $request->id)->first();
        
        $request->lokasi_id = "[".implode(",",$request->lokasi_id)."]";

        $nodins->no_nodin = $request->no_nodin;
        $nodins->nama_pek = $request->nama_pek;
        $nodins->tgl_terima = $request->tgl_terima;
        $nodins->tgl_surat = $request->tgl_surat;
        $nodins->divisi_id = $request->divisi_id;
        $nodins->unit_st = $request->unit_st;
        $nodins->lokasi_id = $request->lokasi_id;
        $nodins->pic = $request->pic;
        $nodins->pic_off = $request->pic_off ;
        $nodins->status = $request->status;
        $nodins->kesimpulan = $request->kesimpulan;
        $nodins->save();

        // $lok = Notaheader::where('id', $request->id)->update([
        //     'no_nodin' => $request->no_nodin,
        //     'nama_pek' => $request->nama_pek,
        //     'tgl_terima' => $request->tgl_terima,
        //     'tgl_surat' => $request->tgl_surat,
        //     'divisi_id' => $request->divisi_id,
        //     'unit_st' => $request->unit_st,
        //     'lokasi_id' => $request->lokasi_id,
        //     'pic' => $request->pic,
        //     'pic_off' => $request->pic_off,
        //     // 'keterangan' => $content,
        //     'status' => $request->status,
        //     'kesimpulan' => $request->kesimpulan
        // ]);

        \LogActivity::addToLog($nodins->no_nodin);
        // Alert::success('success', 'Divisi Berhasil di Ubah');
        toast('Data Nota Dinas Berhasil Diperbarui','success');
        return redirect('/notadinas');
    }

    public function open(Request $request)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        // $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/notadinas')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        // $nodins = Notaheader::where('status', 'like', '%', $request->status , '%')->orderBy('created_at','DESC')->get();
        // Product::where('name','like','%'.$this->search .'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('created_at','DESC')->paginate($this->pagesize);  
        $nodins = Notaheader::with('notafile')->orderBy('created_at','DESC')->get();
        $nods = Notaheader::where('status', 'open')->get();
        $judul = 'Search Nota Dinas';
        $preferences = Preference::all();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $divisis = Divisi::orderBy('kode', 'ASC')->get();
        return view('surat.notadinas.open', compact('nodins','judul', 'crud', 'nods' , 'pref','lokasis','divisis','users', 'preferences'));
    }

    public function done(Request $request)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        // $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/notadinas')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        // $nodins = Notaheader::where('status', 'like', '%', $request->status , '%')->orderBy('created_at','DESC')->get();
        // Product::where('name','like','%'.$this->search .'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('created_at','DESC')->paginate($this->pagesize);  
        $nodins = Notaheader::with('notafile')->orderBy('created_at','DESC')->get();
        $nods = Notaheader::where('status', 'done')->get();
        // dd($nodins);
        // $bods = Bod::all();
        $judul = 'Search Nota Dinas';
        $preferences = Preference::all();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $divisis = Divisi::orderBy('kode', 'ASC')->get();
        return view('surat.notadinas.done', compact('nodins','judul', 'crud' , 'nods',  'pref','lokasis','divisis','users', 'preferences'));
    }

    public function progress(Request $request)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        // $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/notadinas')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        // $nodins = Notaheader::where('status', 'like', '%', $request->status , '%')->orderBy('created_at','DESC')->get();
        // Product::where('name','like','%'.$this->search .'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('created_at','DESC')->paginate($this->pagesize);  
        $nodins = Notaheader::with('notafile')->orderBy('created_at','DESC')->get();
        $nods = Notaheader::where('status', 'proses')->get();
        // dd($nodins);
        // $bods = Bod::all();
        $judul = 'Search Nota Dinas';
        $preferences = Preference::all();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $divisis = Divisi::orderBy('kode', 'ASC')->get();
        return view('surat.notadinas.progress', compact('nodins','judul', 'crud' , 'nods',  'pref','lokasis','divisis','users', 'preferences'));
    }

    public function cancel(Request $request)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        // $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/notadinas')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        // $nodins = Notaheader::where('status', 'like', '%', $request->status , '%')->orderBy('created_at','DESC')->get();
        // Product::where('name','like','%'.$this->search .'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('created_at','DESC')->paginate($this->pagesize);  
        $nodins = Notaheader::with('notafile')->orderBy('created_at','DESC')->get();
        $nods = Notaheader::where('status', 'cancel')->get();
        // dd($nodins);
        // $bods = Bod::all();
        $judul = 'Search Nota Dinas';
        $preferences = Preference::all();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $divisis = Divisi::orderBy('kode', 'ASC')->get();
        return view('surat.notadinas.cancel', compact('nodins','judul', 'crud' , 'nods',  'pref','lokasis','divisis','users', 'preferences'));
    }

    public function pending(Request $request)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        // $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/notadinas')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        // $nodins = Notaheader::where('status', 'like', '%', $request->status , '%')->orderBy('created_at','DESC')->get();
        // Product::where('name','like','%'.$this->search .'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('created_at','DESC')->paginate($this->pagesize);  
        $nodins = Notaheader::with('notafile')->orderBy('created_at','DESC')->get();
        $nods = Notaheader::where('status', 'pending')->get();
        // dd($nodins);
        // $bods = Bod::all();
        $judul = 'Search Nota Dinas';
        $preferences = Preference::all();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $divisis = Divisi::orderBy('kode', 'ASC')->get();
        return view('surat.notadinas.pending', compact('nodins','judul', 'crud' , 'nods' ,'pref','lokasis','divisis','users', 'preferences'));
    }

    public function revisi(Request $request)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        // $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/notadinas')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        // $nodins = Notaheader::where('status', 'like', '%', $request->status , '%')->orderBy('created_at','DESC')->get();
        // Product::where('name','like','%'.$this->search .'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('created_at','DESC')->paginate($this->pagesize);  
        $nodins = Notaheader::with('notafile')->orderBy('created_at','DESC')->get();
        $nods = Notaheader::where('status', 'revisi')->get();
        // dd($nodins);
        // $bods = Bod::all();
        $judul = 'Search Nota Dinas';
        $preferences = Preference::all();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $divisis = Divisi::orderBy('kode', 'ASC')->get();
        return view('surat.notadinas.revisi', compact('nodins','judul', 'crud' , 'nods' ,'pref','lokasis','divisis','users', 'preferences'));
    }


    public function upload($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();      
        $nodins = Notaheader::find($id);
        // $bods = Bod::all();
        $judul = 'Upload File Nota Dinas';
        $preferences = Preference::all();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $divisis = Divisi::orderBy('kode', 'ASC')->get();
        return view('surat.notadinas.upload', compact('nodins','judul', 'pref','lokasis','divisis','users', 'preferences'));
    }
    
    public function uploadsimpan(Request $request){
        $nodins = Notaheader::where('id','=', $request->id)->first();
        $nodins->no_nodin = $request->no_nodin;
        $nodins->save();
        
   
        if($request->hasfile('filename'))
        {
           foreach ($request->filename as $file) {
            // $file = $request->file('filename');
            // $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $filename = 'ND_'. date('YmdHis').".".$extension; 
            // $name = $file->getClientOriginalName();
            // $filename = $request->id.$name; 
            $tujuan_upload = 'data_file/pdf';
            $file->move($tujuan_upload,$filename);
           $data = array(
                   'notaheader_id'=>$nodins->id,
                   'filename'=>$filename
               );
               Notafile::insert($data);
           }
        }
        \LogActivity::addToLog($nodins->no_nodin);
        return redirect('/notadinas')->with('success', 'Data Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        // Divisi::where('id',$id)->delete();
        $data = Notaheader::find($id);
        $data->notafile()->delete();
        $data->delete($data);
        \LogActivity::addToLog($data->no_nodin);
        // return response()->json(['status'=> 'Divisi Berhasil di Hapus']);
        // Alert::warning('alert', 'Divisi Berhasil di Hapus');
        // toast('Data Nota Dinas Berhasil Dihapus','success');
        return redirect('/notadinas')->with('message', 'Data Berhasil Dihapus');
    }

    public function destroyfile($id){
        $data = Notafile::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->id);
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }

    public function exportXLS() {
    
        return Excel::download(new NotadinasExport, 'notadinas-collection.xlsx');
       
    }

    public function exportPDF(Request $request) {
        $start = date('Y-m-d',strtotime($request->start));
        $end = date('Y-m-d',strtotime($request->end));
        $nodins = Notaheader::with('notafile', 'divisi', 'lokasi')->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
    	$pdf = PDF::loadview('surat.notadinas.exportpdf', compact('nodins', 'start', 'end'))->setPaper('A4','landscape');
    	return $pdf->stream();
       
    }
}
