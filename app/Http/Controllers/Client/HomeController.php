<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Preference;
use App\Models\Client;
use App\Models\ClientVerify;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $pref = Preference::first();
        // $sliders = Slider::all();
        // $tenders = Tender::where('is_published', '1')->orderBy('created_at', 'DESC')->paginate(5);
        return view('client.index', compact('pref'));
    }


    public function lupapassword()
    {
        $judul = "Lupa Password Vendor";
        $pref = Preference::first();
        return view('client.email', compact('judul', 'pref'))->with('user_type', request()->user_type);;
    }

    public function login()
    {
        $pref = Preference::first();
        return view('client.login', compact('pref'));
    }

    public function register(Request $request)
    {
        // $name = $request->namaperusahaan;
        $mail = $request->email;

        $client = Client::where('email', $mail)->first();

        if ($client) {
            return back()->withErrors(['email' => 'Email Anda sudah terdaftar, silahkan lupa password']);
        } else {
            $clients = new Client();
            $clients->name = $request->name;
            $clients->email = $request->email;
            $clients->password = bcrypt($request->password);
            $clients->save();
            // dd($clients);
            $token = Str::random(64);

            ClientVerify::create([
                'client_id' => $clients->id,
                'token' => $token
            ]);

            Mail::send('client.emailVerification', ['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Email Verification Mail');
            });
            dd($clients);
            return redirect()->back()->with('success', 'Great! You have Successfully loggedin');
        }
    }

    public function verifyAccount($token)
    {
        $verifyClient = ClientVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if (!is_null($verifyClient)) {
            $client = $verifyClient->client;

            if (!$client->is_email_verified) {
                $verifyClient->client->is_email_verified = 1;
                $verifyClient->client->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

        // dd(vendor);
        return redirect()->route('client.login')->with('message', $message);
    }



    public function home(Request $request)
    {

        $email = $request->email;
        $pwd   = $request->password;

        if (Auth::guard('client')->attempt(['email' => $email, 'password' => $pwd])) {
            // return redirect('/vendor/dashboard');

            return redirect()->intended('/client/dashboard')->with('success', 'You Have Successfully Login');
        } else {
            return back()->withErrors(['email' => 'Email or password are wrong.']);
            // return redirect
        }
    }
}
