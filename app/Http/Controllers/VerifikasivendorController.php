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
use Illuminate\Support\Facades\Auth;
use Session;
use PDF;
use App\Models\Preference;
use App\Models\LogActivity as LogActivityModel;
use App\Models\Vendordoc;
use App\Models\Vendorjenis;
use App\Models\Vendorjenisdoc;
use App\Models\Vendorlisensi;
use App\Models\Vendorfasilitas;
use App\Models\Vendorsertifikat;
use App\Models\Vendorlap;
use App\Models\Vendorpengalaman;
use App\Models\Vendorpengurus;
use App\Models\Vendortenaga;
use App\Models\Vendortipe;
use App\Models\Currency;
use App\Models\Jenispekerjaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VendorExport;
use Illuminate\Support\Facades\Mail;

class VerifikasivendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
	    $menu = Menu::where('link', '/verifikasivendor')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $vendors = Vendor::where('is_published', 0)->whereNotNull('terms')->orderBy('updated_at', 'DESC')->get();
        // echo json_encode($vendors);
        // return;
	//dd($vendors);
        $menus = Menu::all();
        $badan = Badanusaha::all();
        $judul = 'Verifikasi Vendor';
        return view('vendor.verifikasi.index', compact('vendors','judul','users','pref','badan', 'crud'));
    }

    public function show($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
        $judul = 'Show Vendor';
        // $vendors = Vendor::with('vendorbod', 'vendorbank')->find($id);
        // $details = $vendors->itemdetails()->first();
        $vendorjenis = Vendorjenis::all();
        $vendorjenisdoc = Vendorjenisdoc::all();
        $vendortipe = Vendortipe::all();
        $currency = Currency::all();
        $bank = Bank::all();
        $vendors = Vendor::with('vendorlisensi', 'vendorbod', 'itemdetails', 'vendorbank', 'vendorpengurus', 'vendorlap', 'vendorsertifikat', 'vendortenaga', 'vendorfasilitas', 'vendorpengalaman', 'vendordoc')->find($id);
        $vendorlisensicount = $vendors->vendorlisensi->count();
        $vendorlisensi = $vendors->vendorlisensi->where('is_published', 0)->count();
        $vendorlisensi1 = $vendors->vendorlisensi->where('is_published', 1)->count();
        $vendorpengurus = $vendors->vendorpengurus->where('is_published', 0)->count();
        $vendorpengurus1 = $vendors->vendorpengurus->where('is_published', 1)->count();
        $vendorlap = $vendors->vendorlap->where('is_published', 0)->count();
        $vendorlap1 = $vendors->vendorlap->where('is_published', 1)->count();
        $vendorsertifikat = $vendors->vendorsertifikat->where('is_published', 0)->count();
        $vendorsertifikat1 = $vendors->vendorsertifikat->where('is_published', 1)->count();
        $vendortenaga = $vendors->vendortenaga->where('is_published', 0)->count();
        $vendortenaga1 = $vendors->vendortenaga->where('is_published', 1)->count();
        $vendorfasilitas = $vendors->vendorfasilitas->where('is_published', 0)->count();
        $vendorfasilitas1 = $vendors->vendorfasilitas->where('is_published', 1)->count();
        $vendorpengalaman = $vendors->vendorpengalaman->where('is_published', 0)->count();
        $vendorpengalaman1 = $vendors->vendorpengalaman->where('is_published', 1)->count();
        $vendordok = $vendors->vendordoc->where('is_published', 0)->count();
        $vendordok1 = $vendors->vendordoc->where('is_published', 1)->count();
        $vendorpenguruscount = $vendors->vendorpengurus->count();
        $vendorlapcount = $vendors->vendorlap->count();
        $vendorsertifikatcount = $vendors->vendorsertifikat->count();
        // dd($vendorlisensi);
        $vendortenagacount = $vendors->vendortenaga->count();
        $vendorfasilitascount = $vendors->vendorfasilitas->count();
        $vendorpengalamancount = $vendors->vendorpengalaman->count();
        $vendordokcount = $vendors->vendordoc->count();
        // dd($details);
 	//$parent = $users->menu->where(['parentmenu' => 0])->get();
        return view('vendor.verifikasi.show', compact('vendors','judul','users','pref','vendorjenis', 'vendorlisensi', 
        'vendorpengurus','vendorpengurus1','vendorlap', 'vendorlap1', 'vendorsertifikat', 'vendorsertifikat1',
        'vendortenaga', 'vendortenaga1', 'vendorfasilitas', 'vendorfasilitas1', 'vendorpengalaman', 'vendorpengalaman1', 'vendordok', 'vendordok1',
        'vendorlisensi1',  'bank', 'vendortipe', 'vendorjenisdoc', 'currency', 'vendorlisensicount', 
        'vendorpenguruscount', 'vendorlapcount', 'vendorsertifikatcount', 'vendortenagacount', 'vendorfasilitascount', 
        'vendorpengalamancount', 'vendordokcount'));
    }

    public function filestore(Request $request)
    {
        $file = $request->file('filename');
        // $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = 'BRG_'. date('YmdHis').".".$extension; 
        // $ext = $file->getClientOriginalExtension();
        // $filename = $request->id.time().".".$ext; 
        $tujuan_upload = 'data_file/pdf';
        $file->move($tujuan_upload,$filename);


        $vendorfiles = new Itemdetail;
        $vendorfiles->vendor_id = $request->vendor_id;
        $vendorfiles->filename = $filename;
        $vendorfiles->save();
        // dd($vendorfiles);

        return redirect()->back();
    }

    public function verif(Request $request)
    {
        $vendors = Vendor::where('id','=', $request->id)->first();
        $vendors->tgl_verifikasi = $request->tgl_verifikasi ;
        $vendors->keterangan = $request->keterangan ;
        $vendors->save();

        Mail::send('vendor.verifikasi.emailVerif', ['tgl_verifikasi' => $vendors->tgl_verifikasi , 'keterangan' => $vendors->keterangan], function($message) use($request){
            $message->to($request->email);
            $message->subject('Jadwal Verifikasi Dokumen');
        });

        return redirect()->back()->with('success', $vendors->namaperusahaan .  ',' . $vendors->badanusaha->kode . ' Jadwal berhasil Dikirim');

    }

    public function tolakverif(Request $request)
    {
        $vendors = Vendor::where('id','=', $request->id)->first();
        // $vendors->tgl_verifikasi = $request->tgl_verifikasi ;
        $vendors->keterangan = $request->keterangan ;
        $vendors->terms = $request->terms ;
        $vendors->tgl_verifikasi = $request->tgl_verifikasi ;
        $vendors->tgl_request = $request->tgl_request ;
        $vendors->save();

        Mail::send('vendor.verifikasi.emailtolakVerif', [ 'keterangan' => $vendors->keterangan], function($message) use($request){
            $message->to($request->email);
            $message->subject('Penolakan Verifikasi Dokumen');
        });

        return redirect()->back()->with('success', $vendors->namaperusahaan . ',' . $vendors->badanusaha->kode .  ' Penolakan Verifikasi berhasil Dikirim');

    }

    public function publish($id)
    {       
        $vendorbods = Vendor::find($id);
        $vendorbods->is_published = !$vendorbods->is_published;
        $vendorbods->save();  

        Mail::send('vendor.verifikasi.done', ['vendorbods' => $vendorbods], function($mail) use($vendorbods) {
            $mail->to($vendorbods->email);
            $mail->subject('Berhasil Verifikasi Dokumen');
        });
        

        return redirect()->back()->with('success', $vendorbods->namaperusahaan . ',' . $vendorbods->badanusaha->kode .  'Verifikasi berhasil Dikirim');

        // return redirect('/verifikasivendor')->with('success', 'Vendor berhasil Verifikasi');
    }

    public function unpublish($id)
    {       
        $vendorbods = Vendor::find($id);
        $vendorbods->is_published = !$vendorbods->is_published;
        $vendorbods->terms = $vendorbods->terms == '';
        $vendorbods->save();  

        return redirect('/verifikasivendor')->with('success', 'Vendor berhasil Verifikasi');
    }

    public function publishbod($id)
    {       
        $vendorbods = Vendorpengurus::find($id);
        $vendorbods->ttd = !$vendorbods->ttd;
        $vendorbods->save();  
        return redirect('/verifikasivendor/show/' . $vendorbods->vendor_id );
    }

    public function publishpengurus($id)
    {       
        $vendorbods = Vendorpengurus::find($id);
        $vendorbods->is_published = !$vendorbods->is_published;
        $vendorbods->save();  
        return redirect('/verifikasivendor/show/' . $vendorbods->vendor_id );
    }

    public function publishlisensi($id)
    {       
        $vendorbods = Vendorlisensi::find($id);
        $vendorbods->is_published = !$vendorbods->is_published;
        $vendorbods->save();  
        return redirect('/verifikasivendor/show/' . $vendorbods->vendor_id );
    }

    public function publishsertifikat($id)
    {       
        $vendorbods = Vendorsertifikat::find($id);
        $vendorbods->is_published = !$vendorbods->is_published;
        $vendorbods->save();  
        return redirect('/verifikasivendor/show/' . $vendorbods->vendor_id );
    }

    public function publishlap($id)
    {       
        $vendorbods = Vendorlap::find($id);
        $vendorbods->is_published = !$vendorbods->is_published;
        $vendorbods->save();  
        return redirect('/verifikasivendor/show/' . $vendorbods->vendor_id );
    }

    public function publishtenaga($id)
    {       
        $vendorbods = Vendortenaga::find($id);
        $vendorbods->is_published = !$vendorbods->is_published;
        $vendorbods->save();  
        return redirect('/verifikasivendor/show/' . $vendorbods->vendor_id );
    }

    public function publishfasilitas($id)
    {       
        $vendorbods = Vendorfasilitas::find($id);
        $vendorbods->is_published = !$vendorbods->is_published;
        $vendorbods->save();  
        return redirect('/verifikasivendor/show/' . $vendorbods->vendor_id );
    }

    public function publishpengalaman($id)
    {       
        $vendorbods = Vendorpengalaman::find($id);
        $vendorbods->is_published = !$vendorbods->is_published;
        $vendorbods->save();  
        return redirect('/verifikasivendor/show/' . $vendorbods->vendor_id );
    }

    public function publishdok($id)
    {       
        $vendorbods = Vendordoc::find($id);
        $vendorbods->is_published = !$vendorbods->is_published;
        $vendorbods->save();  
        return redirect('/verifikasivendor/show/' . $vendorbods->vendor_id );
    }

    public function exportPDF(Request $request) {
        $start = date('Y-m-d',strtotime($request->start));
        $end = date('Y-m-d',strtotime($request->end));
        $vendors = Vendor::whereDate('tgl_verifikasi','>=',$start)->whereDate('tgl_verifikasi','<=',$end)->get();
        // echo json_encode($vendors);
        // return;
    	$pdf = PDF::loadview('vendor.verifikasi.exportpdf', compact('vendors', 'start', 'end'))->setPaper('A4','landscape');
    	return $pdf->stream();
       
    }
}
