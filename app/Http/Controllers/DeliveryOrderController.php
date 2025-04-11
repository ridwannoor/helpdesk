<?php

namespace App\Http\Controllers;

// use App\Http\Requests;
// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi\Doheader;
use App\Models\Transaksi\Dodetail;
use App\Models\Transaksi\Dofile;
use App\Models\Vendor;
use App\Models\Hargabarang;
use App\Models\Lokasi;
use App\Models\Menu;
use App\Models\Preference;
use Illuminate\Support\Facades\Auth;
use App\Mail\Domail;
use PDF;
use Redirect;
use Carbon\Carbon;
use Mail;
use App\Models\LogActivity as LogActivityModel;

class DeliveryOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(Request $request)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
	    $menu = Menu::where('link', '/do')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $does = Doheader::orderBy('no_do', 'DESC')->get();
        $judul = 'Delivery Order';
        return view('transaksi.deliveryorder.index', compact('judul','does','users','pref','crud'));
    }

    public function create()
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $now = \Carbon\Carbon::now();
        $noUrutAkhir = $this->GenerateNumber();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $hargabarangs = Hargabarang::orderBy('nama_brg', 'ASC')->get();
        $preferences = Preference::all();
        $judul = 'Add Delivery Order';
        return view('transaksi.deliveryorder.add', compact('judul', 'preferences', 'hargabarangs', 'noUrutAkhir','lokasis','users','now', 'vendors','pref'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $doheaders = new Doheader();
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
        $doheaders->save();

        if ($doheaders) {
            foreach ($request->hargabarang_id as $key => $v) {
                $data = array(
                    'doheader_id'=>$doheaders->id,
                    'hargabarang_id'=>$v,
                    'qty'=>$request->qty [$key],
		            'catatan'=>$request->catatan [$key],
                    // 'qty_revisi'=>$request->qty_revisi [$key],
                    'satuan'=>$request->satuan [$key],
                    // 'catatan_revisi'=>$request->catatan_revisi [$key],
                );
                Dodetail::insert($data);
            }
        }

        \LogActivity::addToLog($doheaders->no_do);
        // $doemail = $doheaders->lokasi->lokasimail->email;
        // dd($doemail);

        // $sendmail = Mail::send('transaksi.deliveryorder.email', ['request'=>$request], function ($message)use($request) {
        //     $message->from('logistik@approperti.co.id');
        //     $message->to($doemail);
        //     $message->subject('Subject');
        //     // $message->attach('ecarts');

        //     // $message->file();
        // });

        return redirect('/do')->with('success','data berhasil disimpan');


    }

    // public function kirim()
    // {

    //     $email =
    // }

    public function publish($id)
    {
        $doheaders = Doheader::find($id);
        // dd($doheaders);
        $doheaders->is_published = !$doheaders->is_published;
        $doheaders->save();

        $do = [];
        foreach ($doheaders->lokasi->lokasimail as $key => $value) {
            $do[] = $value->email;
        }

        $data = [
            'no_do' => $doheaders->no_do,
            'perihal' => $doheaders->perihal,
            // 'publish' => $doheaders->is_published,
        ];
        // dd($do);
        if ($do) {
            $sendmail = Mail::to($do)->send(new Domail($data)) ;
        }

            // dd($do);

        if (Mail::failures()) {
            // return redirect('/do')->with('success', 'Berhasil dipublish dan Gagal Mengirim Email');
            return response()->Fail('Sorry! Please try again latter');
       }
       else{
             return redirect('/do')->with('success', 'Berhasil dipublish dan Sukses Mengirim Email');
            // return response()->success('Great! Successfully send in your mail');
          }



    //    return redirect('/do')->with('success', 'Berhasil dipublish');
    }

    // public function publish1($id)
    // {
    //     $doheaders = Doheader::find($id);


    // }

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
        $judul = 'Show Delivery Order';
        // $preferences = Preference::first();
        // dd($preferences);
        // $bapm = Doheader::find($id)->with('dodetails')->get();
        $bapm = Doheader::with(['vendor','preference'])->find($id);
        $hargabarangs = Hargabarang::orderBy('nama_brg', 'ASC')->get();
        $detail = $bapm->dodetails()->first();
        $detailfile = $bapm->dofiles()->first();
        // $detail = Dodetail::where('doheader_id',$bapm)->first();
    //    dd($bapm,$detail);
        return view('transaksi.deliveryorder.show', compact('judul','detail', 'bapm', 'detailfile', 'hargabarangs', 'users','pref'));

    }

    public function cetak($id)
    {
        // $users = Auth::user()->userdetails()->get();
        $judul = 'Cetak Delivery Order';
        $judul1 = 'Delivery Order';
        $bapm = Doheader::with(['vendor','preference'])->find($id);;
        $detail = $bapm->dodetails()->first();
        set_time_limit(300);
        $pdf = PDF::loadView('transaksi.deliveryorder.cetak',compact('judul','judul1','bapm', 'detail'))->setPaper('a4', 'portrait');
        return $pdf->stream();
        // return $pdf->download('cetak.pdf');
        // $pdf = PDF::loadView('transaksi.deliveryorder.cetak', compact('judul','preferences', 'bapm', 'detail'));
        // $pdf->setOption('enable-javascript', true);
        // $pdf->setOption('javascript-delay', 5000);
        // $pdf->setOption('enable-smart-shrinking', true);
        // $pdf->setOption('no-stop-slow-scripts', true);
        // return $pdf->download('cetak1.pdf');
        // $dompdf = new DOMPDF();
        // $dompdf->loadHTML($html);
        // $dompdf->render();
        // $dompdf->stream() ;
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
        $judul = 'Edit Delivery Order';
        $bapm = Doheader::find($id);
        $detail = $bapm->dodetails()->first();
        $vendor = Vendor::all();
        $lokasis = Lokasi::all();
        $preferences = Preference::all();
        $hargabarangs = Hargabarang::orderBy('nama_brg', 'ASC')->get();

        // $preferences = Preference::all();
        // dd($bapm,$detail);
        // dd($vendors);

        return view('transaksi.deliveryorder.edit', compact('users','judul','bapm' , 'preferences', 'hargabarangs', 'detail','lokasis','vendor','pref'));
    }

    public function track($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $judul = 'Track Delivery Order';
        $bapm = Doheader::find($id);
        $detail = $bapm->dodetails()->first();
        $vendor = Vendor::all();
        $lokasis = Lokasi::all();


        // $preferences = Preference::all();
        // dd($bapm,$detail);
        // dd($vendors);

        return view('transaksi.deliveryorder.track', compact('users','judul','bapm','detail','lokasis','vendor','pref'));
    }

    public function updatetrack(Request $request)
    {
        $doheaders = Doheader::where('id','=', $request->id)->first();
        // $doheaders->no_do = $request->no_do;
        $doheaders->tanggal_sampai = date('Y-m-d', strtotime($request->tanggal_sampai));
        $doheaders->ket_pengiriman = $request->ket_pengiriman;
        $doheaders->save();

        if ($doheaders) {
            if($request->hasfile('filename'))
         {
            foreach ($request->filename as $file) {
                // $name = $file->getClientOriginalName();
                // $filename = $request->id.$name;
                // $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = 'DO_'. date('YmdHis').".".$extension;
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
    \LogActivity::addToLog($doheaders->no_do);
        return redirect('/do')->with('success','data berhasil disimpan');


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
        $doheaders->save();

        $id = $request->id;
        $dodet = $doheaders::with(['dodetails', 'dofiles'])->find($id);
        $dodet->update($request->toArray());
        $dodet->dodetails()->delete();
        $dodet->dofiles()->delete();

        if ($doheaders) {
            foreach ($request->hargabarang_id as $key => $v) {
                $data = array(
                    'doheader_id'=>$doheaders->id,
                    'hargabarang_id'=>$v,
                    'qty'=>$request->qty [$key],
		            'catatan'=>$request->catatan [$key],
                    // 'qty_revisi'=>$request->qty_revisi [$key],
                    'satuan'=>$request->satuan [$key],
                    // 'catatan_revisi'=>$request->catatan_revisi [$key],
                );
                Dodetail::insert($data);

                // $brgs = Hargabarang::where('id', $v, )->first();

                // $brgs['qty'] = $brgs->qty - $request->qty[$key] ;
                // // $brgs['harga_lama'] =  $request->harga[$key] ;
                // // $brgs['harga'] =  $request->harga[$key] ;
                // // $data2 = array(
                // //     $brgs->qty => $brgs->qty + $request->qty[$key]
                // // );
                // $brgs->save();

            }
            if($request->hasfile('filename'))
         {
            foreach ($request->filename as $file) {

                // $file = $request->file('filename');
                // $ext = $file->getClientOriginalExtension();
                // $filename = $request->id.time().".".$ext;
                $extension = $file->getClientOriginalExtension();
                $filename = 'DO_'. date('YmdHis').".".$extension;
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

        \LogActivity::addToLog($doheaders->no_do);
        return redirect('/do')->with('success','data berhasil disimpan');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = Doheader::find($id);
        $data->dodetails()->delete();
        $data->dofiles()->delete();
        $data->delete($data);
        \LogActivity::addToLog($data->no_do);
        // $data->delete($data);
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }

    public function destroyfile($id){
        $data = Dofile::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->id);
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }


    public function GenerateNumber(){
        $AWAL = 'APP-LOG';
        // karna array dimulai dari 0 maka kita tambah di awal data kosong
        // bisa juga mulai dari "1"=>"I"
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $noUrutAkhir = Doheader::WhereYear('created_at', Carbon::now()->year)->count();
        $no = 1;
        if($noUrutAkhir) {
            $noUrutAkhir = sprintf("%03s", abs($noUrutAkhir + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
        }
        else {
            $noUrutAkhir = sprintf("%03s", $no). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
        }

        return $noUrutAkhir;
    }


}
