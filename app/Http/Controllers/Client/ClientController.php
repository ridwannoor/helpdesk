<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Preference;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use App\Models\Preference;
use App\Models\Client;
use App\Models\ClientVerify;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;



class ClientController extends Controller
{

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth:client');
    }

    public function dashboard()
    {
        $pref = Preference::first();
        // $sliders = Slider::all();
        // $tenders = Tender::where('is_published', '1')->orderBy('created_at', 'DESC')->paginate(5);
        return view('client.dashboard', compact('pref'));
    }

    public function logout()
    {
        Auth::guard('client')->logout();
        session()->flush();

        return redirect()->route('client.home');
    }
}
