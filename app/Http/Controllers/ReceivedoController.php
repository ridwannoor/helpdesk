<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi\Receivedo;
use App\Models\Transaksi\Receivedodetail;
use App\Models\Transaksi\Doheader;
use App\Models\Transaksi\Dodetail;
use App\Models\Transaksi\Dofile;
use App\Models\Vendor;
use App\Models\Hargabarang;
use App\Models\Hbdetail;
use App\Models\Barang;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use App\Models\Lokasi;
use App\Models\Preference;
use App\Mail\Grmail;
use Mail;
use App\Models\LogActivity as LogActivityModel;

class ReceivedoController extends Controller
{
    // use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    

    public function index()
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
	    $menu = Menu::where('link', '/receivedo')->first();
        $crud = $users->where('menu_id', $menu->id)->first();

      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $userdo = Auth::user()->lokasis()->with('doheaders')->orderBy('created_at', 'DESC')->get();
        $judul = 'Good Receive';
        return view('transaksi.receivedo.index', compact('judul', 'userdo','users','pref','crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function publish($id)
    {       
        $doheaders = Doheader::find($id);
        $doheaders->is_published_ro = !$doheaders->is_published_ro;
        $doheaders->save();  

     
        // dd($pref->email);
        foreach ($doheaders->lokasi->lokasimail as $key => $value) {
            $do[] = $value->email;
           
        }

        // $nodins = Notaheader::where('id','=', $request->id)->first();
        // $nodins->no_nodin = $request->no_nodin;
        // $nodins->nama_pek = $request->nama_pek;
        // dd($do);
        $data = [
            'no_do' => $doheaders->no_do,
            'perihal' => $doheaders->perihal,
            // 'do' => $do,
            // 'publish' => $doheaders->is_published,
            // 'publish1' => $doheaders->is_published_ro,
        ];
        // $pref = Preference::find(1);
        // dd($data);
            $sendmail = Mail::to($do)->send(new Grmail($data)) ;
            // dd($sendmail);

        if (Mail::failures()) {
            // return redirect('/do')->with('success', 'Berhasil dipublish dan Gagal Mengirim Email');
            return response()->Fail('Sorry! Please try again latter');
       }
       else{
             return redirect('/receivedo')->with('success', 'Berhasil dipublish dan Sukses Mengirim Email');
            // return response()->success('Great! Successfully send in your mail');
          }
        
        
        // return redirect('/receivedo');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     //   $parent = $users->menu->where(['parentmenu' => 0])->get();
        $judul = 'Show Good Receive';
        $preferences = Preference::where('id', $id)->first();
        // $bapm = Doheader::find($id)->with('dodetails')->get();
        $bapm = Doheader::find($id);
        $detail = $bapm->dodetails()->first();
        $detailfile = $bapm->dofiles()->first();
        // $detail = Dodetail::where('doheader_id',$bapm)->first();
    //    dd($bapm,$detail);
        return view('transaksi.receivedo.show', compact('judul','detail','pref', 'bapm','preferences','detailfile','users'));
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
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $judul = 'Good Receive';
        $bapm = Doheader::find($id);
        // $preferences = Preference::where('id', $id)->first();
        $detail = $bapm->dodetails()->first();
        $vendor = Vendor::all();
        // $preferences = Preference::all();
        $lokasis = Lokasi::all();
        $hargabarangs = Hargabarang::orderby('nama_brg', 'asc')->get();
        // dd($bapm,$detail);
        // dd($vendors);

        return view('transaksi.receivedo.edit', compact('users','judul', 'hargabarangs', 'bapm','detail','vendor','pref','lokasis'));
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
        $doheaders = Doheader::where('id','=', $request->id)->first();
        $doheaders->no_do = $request->no_do;
        $doheaders->tanggal = date('Y-m-d', strtotime($request->tanggal));
        $doheaders->perihal = $request->perihal;
        $doheaders->lokasi_id = $request->lokasi_id;
        $doheaders->vendor_id = $request->vendor_id;
        $doheaders->preference_id = $request->preference_id;
        $doheaders->lokasi_pengambilan = $request->lokasi_pengambilan;
        $doheaders->tujuan_pengiriman = $request->tujuan_pengiriman;
        $doheaders->ref_po = $request->ref_po;
        $doheaders->tgl_mulai = date('Y-m-d', strtotime($request->tgl_mulai));
        $doheaders->tgl_akhir = date('Y-m-d', strtotime($request->tgl_akhir));
        $doheaders->tgl_pengiriman = date('Y-m-d', strtotime($request->tgl_pengiriman));      
        $doheaders->is_published_ro = $this->is_published_ro = true ;
        $doheaders->save();

        \LogActivity::addToLog($doheaders->no_do);
        
        $id = $request->id;
        $dodet = $doheaders::with(['dodetails', 'dofiles'])->find($id);        
        $dodet->update($request->toArray());
        $dodet->dodetails()->delete();
        // $dodet->dofiles()->delete();
        
        if ($doheaders) {
            foreach ($request->hargabarang_id as $key => $v) {
                $data = array(
                    'doheader_id'=>$doheaders->id,
                    'hargabarang_id'=>$v,
                    'qty'=>$request->qty [$key],
        		    'catatan'=>$request->catatan [$key],
                    'qty_baik'=>$request->qty_baik [$key],
                    'qty_rusak'=>$request->qty_rusak [$key],
                    'satuan'=>$request->satuan [$key],
                    // 'catatan_revisi'=>$request->catatan_revisi [$key],
                );
                Dodetail::insert($data);

                $brgs = Hargabarang::where('id', $v )->first();
                $brgs['qty'] = $brgs->qty - $request->qty_baik[$key] ;
                $brgs->update();

                $data = array(
                    'hargabarang_id'=>$v,
                    'doheader_id'=>$doheaders->id,
                    'qty'=>$request->qty_rusak [$key]
                );
               Hbdetail::insert($data);
            }    
            if($request->hasfile('filename'))
            {
                foreach ($request->filename as $file) {
                    // $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = 'GR_'. date('YmdHis').".".$extension; 
                    // $name = $file->getClientOriginalName();
                    // $filename = $request->id.$name; 
                    $tujuan_upload = 'data_file/pdf';
                    $file->move($tujuan_upload,$filename);

                    $data = array(
                        'doheader_id'=>$doheaders->id,
                        'filename'=>$filename
                    );
                    Dofile::insert($data);
                }
            }
        }

     

            
        return redirect('/receivedo')->with('success','data berhasil disimpan');
        
      
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function destroyfile($id){
        $data = Dofile::find($id);
        $data->delete($data);
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }
}
