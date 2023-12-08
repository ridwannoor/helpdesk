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
use App\Models\Jenispekerjaan;
use App\Models\Badanusaha;
use App\Models\Vendordoc;
use App\Models\Bod;
use PDF;
use App\Models\Provinsi;
use App\Models\Vendorjenis;
use App\Models\Vendorjenisdoc;
use App\Models\Vendorlisensi;
use App\Models\Vendorfasilitas;
use App\Models\Vendorsertifikat;
use App\Models\Vendorlap;
use Illuminate\Support\Facades\Mail;
use App\Models\Itemdetail;
use App\Models\Vendorpengalaman;
use App\Models\Vendorpengurus;
use App\Models\Vendortenaga;
use App\Models\Vendortipe;
use App\Models\Vendorbank;
use App\Models\Currency;
use App\Models\Bank;
use App\Models\VendorVerify;
use App\Models\Vendorklasifikasi;
use App\Models\Vendorsubkla;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:vendor');
    }

    public function gantipassword()
    {
        $judul = "Ganti Password";
        $pref = Preference::first();

        return view('back.profile.password', compact('judul', 'pref'));

    }

    public function gantipasswordupdate(Request $request)
    {
        $vendors = Vendor::where('id', $request->id)->first();
        $vendors->password = bcrypt($request->password) ;
        $vendors->save();

        return redirect('/vendor/dashboard')->with('success', 'Password berhasil diubah');


    }

    public function index()
    {
        // $vldate = Vendorlisensi::where('end', '<', Carbon::now()->addDays(7))->get();
        // dd( $vldate);
        $judul = "Profile";
        $pref = Preference::first();
        $vendorjenis = Vendorjenis::all();
        $vendorjenisdoc = Vendorjenisdoc::all();
        $vendortipe = Vendortipe::all();
        $vendorklasifikasi = Vendorklasifikasi::all();
        $vendorsubkla = Vendorsubkla::all();
        $currency = Currency::all();
        $bank = Bank::all();
        $now = Carbon::now();
        // dd($now);
        $vendors = Auth::user('vendor')->with( 'vendorlisensi', 'vendorbank', 'itemdetails', 'vendorpengurus', 'vendorlap', 'vendorsertifikat', 'vendortenaga', 'vendorfasilitas', 'vendorpengalaman', 'vendordoc')->get();
        
        $vendorlisensicount = Auth::user('vendor')->vendorlisensi->count();
        $vendorpenguruscount = Auth::user('vendor')->vendorpengurus->count();
        $vendorlapcount =  Auth::user('vendor')->vendorlap->count();
        $vendorsertifikatcount = Auth::user('vendor')->vendorsertifikat->count();
        $vendortenagacount = Auth::user('vendor')->vendortenaga->count();
        $vendorfasilitascount = Auth::user('vendor')->vendorfasilitas->count();
        $vendorpengalamancount = Auth::user('vendor')->vendorpengalaman->count();
        $vendordokcount = Auth::user('vendor')->vendordoc->count();

        $vendorlisensi = Auth::user('vendor')->vendorlisensi->where('is_published', 0)->count();
        $vendorlisensi1 = Auth::user('vendor')->vendorlisensi->where('is_published', 1)->count();
        $vendorpengurus = Auth::user('vendor')->vendorpengurus->where('is_published', 0)->count();
        $vendorpengurus1 = Auth::user('vendor')->vendorpengurus->where('is_published', 1)->count();
        $vendorlap = Auth::user('vendor')->vendorlap->where('is_published', 0)->count();
        $vendorlap1 = Auth::user('vendor')->vendorlap->where('is_published', 1)->count();
        $vendorsertifikat = Auth::user('vendor')->vendorsertifikat->where('is_published', 0)->count();
        $vendorsertifikat1 = Auth::user('vendor')->vendorsertifikat->where('is_published', 1)->count();
        $vendortenaga = Auth::user('vendor')->vendortenaga->where('is_published', 0)->count();
        $vendortenaga1 = Auth::user('vendor')->vendortenaga->where('is_published', 1)->count();
        $vendorfasilitas = Auth::user('vendor')->vendorfasilitas->where('is_published', 0)->count();
        $vendorfasilitas1 = Auth::user('vendor')->vendorfasilitas->where('is_published', 1)->count();
        $vendorpengalaman = Auth::user('vendor')->vendorpengalaman->where('is_published', 0)->count();
        $vendorpengalaman1 = Auth::user('vendor')->vendorpengalaman->where('is_published', 1)->count();
        $vendordok = Auth::user('vendor')->vendordoc->where('is_published', 0)->count();
        $vendordok1 = Auth::user('vendor')->vendordoc->where('is_published', 1)->count();

        // $alertlisensis = Vendorlisensi::whereNull('end')
        //                      ->orWhere('end' > Carbon::now())
        //                      ->get();

        // $vendorlisensi = Vendorlisensi::with($vendors)->get();
        return view('back.profile.index', compact('pref', 'judul', 'vendorjenis', 
        'vendorlisensi',  'vendorpengurus','vendorpengurus1','vendorlap', 'vendorlap1', 'vendorsertifikat', 'vendorsertifikat1',
        'vendortenaga', 'vendortenaga1', 'vendorfasilitas', 'vendorfasilitas1', 'vendorpengalaman', 'vendorpengalaman1', 'vendordok', 'vendordok1',
        'vendorlisensi1', 'vendors', 'bank', 'vendortipe', 'vendorjenisdoc', 'currency', 'vendorlisensicount', 
         'vendorpenguruscount', 'vendorlapcount', 'vendorsertifikatcount', 'vendortenagacount', 'vendorklasifikasi', 'vendorsubkla',
         'vendorfasilitascount', 'vendorpengalamancount', 'vendordokcount', 'now'));
    }   

    public function certificate($id)
    {
        $judul = 'Certificate';
        $pref = Preference::first();
        $bods = BOD::get();
        // $bulan = $this->tanggal_local();
        $pdf = PDF::loadView('back.profile.certificate',compact('judul', 'pref', 'bods'))->setPaper('a4', 'landscape');
        return $pdf->stream();  
    }

    public function edit($id)
    {
        $judul = "Profile Edit";
        $pref = Preference::first();
        $vendors = Vendor::find($id);
        $badanusaha = Badanusaha::all();
        $jenisusahas = Jenisusaha::pluck('detail', 'id')->all();  
        $categories = Category::pluck('detail', 'id')->all();  
        $provinsi = Provinsi::all();
        $jenispekerjaans = Jenispekerjaan::pluck('name', 'id')->all();  
        $lokasi = Lokasi::all();
        return view('back.profile.edit', compact('pref', 'judul', 'vendors', 'provinsi', 'badanusaha', 'categories', 'lokasi', 'jenisusahas', 'jenispekerjaans'));
    }

    public function update(Request $request)
    {
        $vendors = Vendor::where('id', $request->id)->first();
        $vendors->namaperusahaan = $request->namaperusahaan;
        $vendors->alamat = $request->alamat;
        $vendors->provinsi_id = $request->provinsi_id;
        $vendors->product = $request->product;
        $vendors->npwp = $request->npwp;
        $vendors->contactperson = $request->contactperson;
        $vendors->notelp = $request->notelp;
        $vendors->handphone = $request->handphone;
        $vendors->alternative_person = $request->alternative_person;
        $vendors->alternative_phone = $request->alternative_phone;
        $vendors->website = $request->website;
        $vendors->catatan = $request->catatan;
        $vendors->badanusaha_id = $request->badanusaha_id;
        $vendors->save();
        $vendors->categories()->sync($request->categories);
        $vendors->jenisusahas()->sync($request->jenisusahas);
        $vendors->jenispekerjaans()->sync($request->jenispekerjaans);

        return redirect()->route('vendor.profile', ['id' => $vendors->id]);
    }

    public function updatedoc(Request $request)
    {
        $name = $request->jenis;
        $brg_chek = Vendordoc::where('jenis', $name)->first();

        if ($brg_chek) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = 'PROF_'. date('YmdHis').".".$extension; 
            // $ext = $file->getClientOriginalExtension();
            // $filename = $request->id.time().".".$ext; 
            $tujuan_upload = 'data_file/profile/doc';
            $file->move($tujuan_upload,$filename);

            $vendors = Vendordoc::where('id', $request->id)->first();
            $vendors->vendor_id = $request->vendor_id;
            $vendors->jenis = $request->jenis;
            $vendors->keterangan = $request->keterangan;
            $vendors->nomor = $request->nomor;
            $vendors->penerbit = $request->penerbit;
            $vendors->telp = $request->telp;
            $vendors->start = $request->start;
            $vendors->end = $request->end;   
            $vendors->file = $filename;
            $vendors->save();
            return redirect()->back();
        } else {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = 'PROF_'. date('YmdHis').".".$extension; 
            // $ext = $file->getClientOriginalExtension();
            // $filename = $request->id.time().".".$ext; 
            $tujuan_upload = 'data_file/profile/doc';
            $file->move($tujuan_upload,$filename);

            $vendors = new Vendordoc;
            $vendors->vendor_id = $request->vendor_id;
            $vendors->jenis = $request->jenis;
            $vendors->keterangan = $request->keterangan;
            $vendors->nomor = $request->nomor;
            $vendors->penerbit = $request->penerbit;
            $vendors->telp = $request->telp;
            $vendors->start = $request->start;
            $vendors->end = $request->end;   
            $vendors->file = $filename;
            $vendors->save();
            return redirect()->back();
        }
        
    }

    public function destroyfile($id){
        $data = Itemdetail::find($id);
        $data->delete($data);
        return redirect()->route('vendor.profile', ['id' => $data->id]);
    }

    public function fileupload(Request $request)
    {
        $file = $request->file('filename');
        $extension = $file->getClientOriginalExtension();
        $filename = 'PROF_'. date('YmdHis').".".$extension; 
        // $ext = $file->getClientOriginalExtension();
        // $filename = $request->id.time().".".$ext; 
        $tujuan_upload = 'data_file/pdf';
        $file->move($tujuan_upload,$filename);

        // $name = $file->getClientOriginalName();
        // $filename = $request->id.$name;  
        // $tujuan_upload = 'data_file/pdf';
        // $file->move($tujuan_upload,$filename);

        $vendorfiles = new Itemdetail;
        $vendorfiles->vendor_id = $request->vendor_id;
        $vendorfiles->filename = $filename;
        $vendorfiles->save();
        
        return redirect()->route('vendor.profile', ['id' => $vendorfiles->id]);
    }

    public function imageupload(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png'
        ]);

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = 'PROF_'. date('YmdHis').".".$extension; 
        // $ext = $file->getClientOriginalExtension();
        // $filename = $request->id.time().".".$ext; 
        $tujuan_upload = 'data_file/pdf';
        $file->move($tujuan_upload,$filename);

        // $name = $file->getClientOriginalName();
        // $filename = $request->id.$name;  
        // $tujuan_upload = 'data_file/pdf';
        // $file->move($tujuan_upload,$filename);

        $vendorfiles = Vendor::where('id', $request->id)->first();
        // $vendorfiles->vendor_id = $request->vendor_id;
        $vendorfiles->image = $filename;
        $vendorfiles->save();
        
        return redirect()->route('vendor.profile', ['id' => $vendorfiles->id]);
    }

   public function terms(Request $request)
   {
        if ($request->has('terms')) {
            $vendors = Vendor::where('id', $request->id)->first();
            $vendors->terms = $request->has('terms') ;
            $vendors->tgl_request = $request->tgl_request;
            $vendors->save();

            return redirect()->back()->with('success', 'Permohonan Verifikasi Berhasil Dikirim');
        } else {
            return redirect()->back()->with('message', 'Checklist Syarat & Ketentuan');
        }        
   }

   public function lupaverifikasi(Request $request)
    {
        $token = Str::random(64);
        

        $vendorverifys = new VendorVerify();
        $vendorverifys->vendor_id = $request->vendor_id;
        $vendorverifys->token = $token;
        // dd($vendorverifys);
        
        $vendorverifys->save();

        Mail::send('back.profile.emailVerification', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Email Verification Mail');
        });
       
        // dd($vendorverifys);
      return redirect()->route('vendor.login')->with('success', 'Verifikasi Berhasil Dikirimkan');
    }

    public function verifyAccount($token)
    {
        $verifyVendor = VendorVerify::where('token', $token)->first();
  
        $message = 'Sorry your email cannot be identified.';
  
        if(!is_null($verifyVendor) ){
            $vendor = $verifyVendor->vendor;
           
            if($vendor->is_email_verified == null) {
                $vendor->is_email_verified = 1;
                $vendor->save();
                // $verifyVendor->vendor->is_email_verified = 1;
                // $verifyVendor->vendor->save();
                // dd( $verifyVendor);
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";   
            }
        }
  
        // dd(vendor);
      return redirect()->route('vendor.login')->with('message', $message);
    }

}
