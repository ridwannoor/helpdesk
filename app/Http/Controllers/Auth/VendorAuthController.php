<?php

namespace App\Http\Controllers\Auth;

use App\Models\Vendor;
use App\Models\Preference;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Lokasi;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Jenisusaha;
use App\Models\Badanusaha;
use PDF;
use Redirect;
use Carbon\Carbon;
use App\Models\VendorVerify;
// use Hash;

class VendorAuthController extends Controller
{
    use AuthenticatesUsers;

    protected $maxAttempts = 3;
    protected $decayMinutes = 2;

    // protected function broker()
    // {
    //     return Password::broker('vendors');
    // }

    // protected $guard = 'vendor';

    // protected function guard(){
    //     return Auth::guard('vendor');
    // }

    protected $redirectTo = '/vendor/home';

    public function __construct()
    {
        $this->middleware('guest:vendor')->except('logout');
    }

    public function login()
    {
        $judul = "Login Vendor";
        $pref = Preference::first();
        return view('front.login', compact('judul', 'pref'));
    }

    public function lupapassword()
    {
        $judul = "Lupa Password Vendor";
        $pref = Preference::first();
        return view('front.email', compact('judul', 'pref'))->with('user_type', request()->user_type);;
    }

    public function home(Request $request)
    {

        $email = $request->email;
        $pwd   = $request->password;

        if (Auth::guard('vendor')->attempt(['email' => $email, 'password' => $pwd])) {
            // return redirect('/vendor/dashboard');
            return redirect()->intended('/vendor/dashboard')->with('success', 'You Have Successfully Login');
        } else {
            return back()->withErrors(['email' => 'Email or password are wrong.']);
            // return redirect
        }
<<<<<<< HEAD
=======

>>>>>>> 53cfbbbc08d912e0518321ff1864a317026cf79f
    }

    public function api_login(Request $request)
    {

        $email = $request->email;
        $pwd   = $request->password;
        Auth::guard('vendor')->logout();
        session()->flush();

        if (Auth::guard('vendor')->attempt(['email' => $email, 'password' => $pwd])) {
            // return redirect('/vendor/dashboard');
            // return redirect()->intended('/vendor/dashboard')->with('success', 'You Have Successfully Login');
            return response()->json([
                'status' => true,
                'data' => $email
            ]);
        } else {
            // return back()->withErrors(['email' => 'Email or password are wrong.']);
            return response()->json([
                'status' => false,
                'data' => null
            ]);
            // return redirect
        }
<<<<<<< HEAD
=======

    }

    public function CreateVendorKode($is_bahan_baku = 0){
        $lastVendor = Vendor::where('is_bahan_baku', $is_bahan_baku)->count();
        $newKode = 'V' . str_pad(($lastVendor + 1), 4, '0', STR_PAD_LEFT);
        return $newKode;
>>>>>>> 53cfbbbc08d912e0518321ff1864a317026cf79f
    }

    public function create(Request $request)
    {
        $name = $request->namaperusahaan;
        $mail = $request->email;

        $vend = Vendor::where('namaperusahaan', $name)->orWhere('email', $mail)->first();

        if ($vend) {
            return back()->withErrors(['namaperusahaan' => 'Perusahaan / Email Anda sudah terdaftar, silahkan lupa password']);
        } else {
            $vendors = new Vendor();
            $vendors->namaperusahaan = $request->namaperusahaan;
            $vendors->email = $request->email;
            $vendors->password = bcrypt($request->password);
            $vendors->badanusaha_id = $request->badanusaha_id;
            $vendors->provinsi_id = $request->provinsi_id;
            $vendors->save();

<<<<<<< HEAD
            $token = Str::random(64);

            VendorVerify::create([
                'vendor_id' => $vendors->id,
                'token' => $token
            ]);

            Mail::send('front.emailVerification', ['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Email Verification Mail');
            });

            return redirect()->back()->with('success', 'Great! You have Successfully loggedin');
        }
=======
	}
	else
	{
        $vendors = new Vendor();
        $vendors->namaperusahaan = $request->namaperusahaan ;
        $vendors->is_bahan_baku = $request->is_bahan_baku ;
        $vendors->kode = $this->CreateVendorKode($request->is_bahan_baku);
        $vendors->email = $request->email ;
        $vendors->password = bcrypt($request->password) ;
        $vendors->badanusaha_id = $request->badanusaha_id ;
        $vendors->provinsi_id = $request->provinsi_id ;
        $vendors->save();

        $token = Str::random(64);

        VendorVerify::create([
              'vendor_id' => $vendors->id,
              'token' => $token
            ]);

        Mail::send('front.emailVerification', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Email Verification Mail');
          });

        return redirect()->back()->with('success', 'Great! You have Successfully loggedin');
	}
>>>>>>> 53cfbbbc08d912e0518321ff1864a317026cf79f
    }



    public function verifyAccount($token)
    {
        $verifyVendor = VendorVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

<<<<<<< HEAD
        if (!is_null($verifyVendor)) {
            $vendor = $verifyVendor->vendor;

            if (!$vendor->is_email_verified) {
=======
        if(!is_null($verifyVendor) ){
            $vendor = $verifyVendor->vendor;

            if(!$vendor->is_email_verified) {
>>>>>>> 53cfbbbc08d912e0518321ff1864a317026cf79f
                $verifyVendor->vendor->is_email_verified = 1;
                $verifyVendor->vendor->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

        // dd(vendor);
        return redirect()->route('vendor.login')->with('message', $message);
    }

    public function logout()
    {
        Auth::guard('vendor')->logout();
        session()->flush();

<<<<<<< HEAD
        return redirect()->route('client.login');
    }
=======
        return redirect()->route('vendor.login');
    }








>>>>>>> 53cfbbbc08d912e0518321ff1864a317026cf79f
}
