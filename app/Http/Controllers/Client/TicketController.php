<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Preference;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use App\Models\Preference;
use App\Models\Client;
use App\Models\Ticket;
use App\Models\Statusticket;
use App\Models\Typeticket;
use App\Models\ClientVerify;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth:client');
    }

    public function index()
    {
        $pref = Preference::first();
        $judul = "Tickets";
        $client = Auth::user('client');
        $tickets  = Ticket::where('client_id', $client->id)->get();
        // $tenders = Tender::where('is_published', '1')->orderBy('created_at', 'DESC')->paginate(5);
        return view('client.ticket.index', compact('pref', 'tickets', 'judul'));
    }
}
