<?php

namespace App\Http\Controllers\Back;


use App\Models\Vendor;
use App\Models\Preference;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Lokasi;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Jenisusaha;
use App\Models\Badanusaha;  
use App\Models\Pengadaan\Tender;
use App\Models\Pengadaan\Tenderpenawaran;
use App\Models\Pengadaan\Tenderquot;
use App\Models\Provinsi;
use App\Models\Vendorjenis;
use App\Models\Vendorjenisdoc;
use App\Models\Vendorlisensi;
use App\Models\Vendorfasilitas;
use App\Models\Vendorsertifikat;
use App\Models\Vendorlap;
use App\Models\Jenispekerjaan;
use Carbon\Carbon;

class TenderController extends Controller
{
    use AuthenticatesUsers;


    public function __construct()
    {
        $this->middleware('auth:vendor');
    }


    public function index()
    {
        $judul = "Tender";
        $pref = Preference::first();
        $tenders = Tender::where('is_published', 1)->orderBy('created_at', 'DESC')->get();
        $jenispekerjaans = Jenispekerjaan::with('tenders')->get();
        // $jns = $jenispekerjaans->tenders->where('is_published', $tenders->is)
        $vendors = Auth::user('vendor')->with( 'vendorlisensi', 'vendorbank', 'itemdetails', 'vendorpengurus', 'vendorlap', 'vendorsertifikat', 'vendortenaga', 'vendorfasilitas', 'vendorpengalaman', 'vendordoc')->get();
        return view('back.tender.index', compact('pref', 'judul', 'tenders', 'vendors', 'jenispekerjaans'));
        
    }

    public function search(Request $request)
    {

    }

    public function show($id)
    {
        $judul = "Tender Detail";
        $pref = Preference::first();
        $now = Carbon::now();
        // dd($now);
        $tenders = Tender::with('tenderdetail', 'jenispekerjaans', 'tenderpenawaran', 'tenderquot')->find($id);
        $tenderpens = Tenderpenawaran::all();
        return view ('back.tender.show', compact('judul', 'pref', 'tenders', 'tenderpens', 'now'));
    }

    public function penawaran($id)
    {
        $judul = "Tender Detail";
        $pref = Preference::first();
        $tenders = Tender::with('tenderdetail', 'jenispekerjaans')->find($id);
        return view('back.tender.penawaran', compact('judul', 'pref', 'tenders')) ;
    }

    public function jasakontruksi(Request $request)
    {
        $judul = "Tender Detail";
        $pref = Preference::first();
        $tenders = Tender::all();
        $jasakonstruksi = Jenispekerjaan::with('tenders')->where('id', 1)->get();
        // dd( $jasakonstruksi);
       
        return view ('back.tender.show', compact('judul', 'pref', 'tenders', 'jasakonstruksi'));
    }

    public function jasakonsultankonstruksi(Request $request)
    {

    }
    public function pengadaanbarang(Request $request)
    {

    }
    public function quotation(Request $request)
    {
        $quote = $request->quot ;
        $tends = $request->tender_id;
        $vends = $request->vendor_id;
        $file = $request->file_pdf;
        $syarts = $request->syarattender_id;
        
        $tendsls = Tenderpenawaran::where('tender_id', $request->tender_id)
        ->where('vendor_id', $request->vendor_id)
        ->where('nilai_penawaran', $request->nilai_penawaran)
        ->where('regist', $request->regist_id)
        ->first();

        $tendesl = Tenderquot::where('tender_id', $request->tender_id)
        ->where('vendor_id', $request->vendor_id)
        ->where('syarattender_id', $request->syarattender_id)
        ->where('file_pdf', $request->file_pdf)
        ->first();

        if(!$tendsls AND  !$tendesl)
        {
            $tendls = Tenderpenawaran::where('tender_id', $request->tender_id)
            ->where('vendor_id', $request->vendor_id)
            ->first();
            $tendls->nilai_penawaran = $request->nilai_penawaran;
            $tendls->save();
    
            // $no = 1 ;
            if($request->hasFile('file_pdf'))
            {
                foreach ($request->file_pdf as $key => $value) {
                    $name = $value->getClientOriginalName();
                    $extension = $value->getClientOriginalExtension();
                    $filename = 'TNDR_'. $vends . "_" . $name ; 
                    $tujuan_upload = 'data_file/pdf';
                    $value->move($tujuan_upload,$filename);
    
                    $data = array(
                        'tender_id'=>$tends,         
                        'vendor_id'=>$vends,   
                        'file_pdf' => $filename,
                        'syarattender_id' => $request->syarattender_id [$key]              
                    );
                    Tenderquot::insert($data); 
                }
            }
            
            return redirect('/vendor/tender')->with('success', 'Berhasil dibuat');

        }
        else{
            return redirect()->back()->with('message', 'Sudah Ada Data');
        }
        // dd($tendsls);
        // if ($tendsls) {
        //    return redirect()->back()->with('message', 'Sudah Ada Data');
        // }

        // else{
      
    }

    public function detail($id)
    {
        $judul = "Tender Detail";
        $pref = Preference::first();
        $tenders = Tender::with('tenderdetail', 'jenispekerjaans')->find($id);
        return view('back.tender.detail', compact('judul', 'pref', 'tenders')) ;
    }

    public function detailtender($id)
    {
        $judul = "Tender Detail";
        $pref = Preference::first();
        $tenders = Tender::with('tenderdetail', 'jenispekerjaans')->find($id);
        return view('back.tender.detailtender', compact('judul', 'pref', 'tenders')) ;
    }

    public function destroyfile($id){
        $data = Tenderquot::find($id);
        $data->delete($data);
        // dd($data);
        // \LogActivity::addToLog($data->id);
        return redirect('/vendor/tender')->with('message', 'File berhasil dihapus');
    }

    public function regist(Request $request)
    {
       
     
        if(Auth::user('vendor')->is_published == 1)                 
            {
                $id = $request->id ;
                $regs = $request->regist ;
                $quote = $request->quot ;
                $tends = $request->tender_id;
                $vends = $request->vendor_id;
                // $tedner = Tenderpenawaran::where('tender_id', $tends)
                // ->where('vendor_id', $tends)
                // ->where('regist', $regs)
                // ->where('quot', $quote)
                // ->first();   
                // $vendrn = Tenderpenawaran::where('vendor_id', $vends)->get();   
                // $regis = Tenderpenawaran::where('regist', $regs)->get(); 
                // dd($id);
                // dd($regis, $tedner, $vendrn);
                // $tenders = Tender::find($id);
                // dd($tends);
                $tedner = Tenderpenawaran::where('tender_id' , $request->tender_id)->where('vendor_id' , $request->vendor_id)->first();
                $tender = Tender::find($tends);
                $now = Now();
                // dd($tender);
                if ($tedner == NULL) {
                  
                    // dd( $now);
                    if ($tender->tgl_daftar <= $now) {
                        
                        return redirect()->back()->with('message', 'Registrasi Tutup');
                       
                    }
                    else
                    {
                        $data = new Tenderpenawaran ;
                        $data->tender_id = $tends ;
                        $data->vendor_id = $vends ;
                        $data->regist = $regs ;
                        // $data->quot = $quote ;
                        $data->save();
                        // dd($data);
                        return redirect()->back()->with('success', 'Berhasil Registrasi');
                      
                    }
                  
                }
                // $tedner1 = $tedner->where('regist', $regs)->first();
                elseif ($tedner->where('regist', $regs)->first())
                {
                    // dd($tedner);
                    return redirect()->back()->with('message', 'Sudah Teregistrasi');
                }

                elseif($tedner->where('regist', $regs)->where('quot', $quote))
                {
                    // dd($tedner);
                        $judul = 'Qoutation Tender';
                        $pref = Preference::first();
                        $tenders = Tender::with('tenderdetail', 'jenispekerjaans')->find($request->tender_id);

                        $tedner = Tenderpenawaran::where('tender_id' , $request->tender_id)->where('vendor_id' , $request->vendor_id)->first();
                        $tedner->quot = $request->quot;
                        $tedner->save();

                        return view('back.tender.qoutation', [$request->tender_id], compact('judul', 'pref', 'tenders'));
                }
                else
                {
                    return redirect()->back()->with('message', 'Anda Belum Registrasi');
                }           
            }    
        
        else
            {
                return redirect()->back()->with('message', 'Lakukan verifikasi vendor terlebih dahulu.');
            }
        }
    
}
