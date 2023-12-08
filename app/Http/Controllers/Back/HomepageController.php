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
use App\Models\Provinsi;
use App\Models\Vendorjenis;
use App\Models\Vendorjenisdoc;
use App\Models\Vendorlisensi;
// use App\Models\Slider;
use App\Models\Vendorfasilitas;
use App\Models\Vendorsertifikat;
use App\Models\Vendorlap;
use App\Models\Slider;
use Carbon\Carbon;

class HomepageController extends Controller
{
    use AuthenticatesUsers;


    public function __construct()
    {
        $this->middleware('auth:vendor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = "Selamat Datang, ";
        $pref = Preference::first();
        $sliders = Slider::all();
        $tenders = Tender::where('is_published', 1)->orderBy('created_at', 'DESC')->paginate(8);
        $now = now();
        // dd($now);
        // $nows = Tender::where('created_at', '=', $now)->get();
        // $active = Tender::where('statustender_id', 4)->get();
       
        $vendors = Auth::user('vendor')->with( 'vendorlisensi', 'vendorbank', 'itemdetails',  'vendorpengurus', 'vendorlap', 'vendorsertifikat', 'vendortenaga', 'vendorfasilitas', 'vendorpengalaman', 'vendordoc')->get();
        // dd($vendors);
        // $token = Str::random(64);
        // if (Auth::user()'check()) {
            // if (Auth::user('vendor')->is_email_verified) {
        return view('back.index', compact('pref', 'judul', 'tenders', 'vendors','sliders', 'now'));
            // }
           
        // }
        // return redirect('/vendor/login')->with('message', 'Opps You Do Not Have Access');
        // return view('back.index', compact('pref', 'judul'));
    }

    // public function resend(Request $request)
    // {
    //     if ($request->user('vendor')->hasVerifiedEmail()) {
    //         return redirect($this->redirectPath());
    //     }

    //     $request->user('vendor')->sendEmailVerificationNotification();

    //     return back()->with('resent', true);
    // }

}
