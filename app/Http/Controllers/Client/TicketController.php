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
use App\Models\Lokasi;
use App\Models\Jenisticket;
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

    public function create()
    {
        // $bods = Ticket::all();
        // dd($bodserences);
        $pref = Preference::first();
        $typetickets = Typeticket::all();
        $statustickets = Statusticket::all();
        $jenistickets = Jenisticket::all();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        // $users = Auth::user()->userdetails()->with('menu')->get();
        //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $judul = 'Add Ticket';
        return view('client.ticket.add', compact('judul',  'pref', 'typetickets', 'statustickets', 'jenistickets', 'lokasis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tickets = new Ticket();
        $tickets->title = $request->title;
        $tickets->deskripsi = $request->deskripsi;
        $tickets->typeticket_id = $request->typeticket_id;
        $tickets->lokasi_id = $request->lokasi_id;
        $tickets->statusticket_id = $request->statusticket_id;
        $tickets->jenisticket_id = $request->jenisticket_id;
        // $tickets->status = $request->status;
        $tickets->save();

        // \LogActivity::addToLog($bods->name);
        return redirect('/client/ticket')->with('success', 'Ticket Berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $users = Auth::user()->userdetails()->with('menu')->get();
        $pref = Preference::first();
        $judul = 'Detail BOD';
        //   $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        //   $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        //   $brgmaintenances = Barangmaintenance::all();
        //   $brgmutasis = Barangmutasi::all();
        $bods = Ticket::find($id);
        return view('ticket.show', compact('bods',  'pref', 'judul'));
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
        // $users = Auth::user()get();
        // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $judul = 'Edit Ticket';
        $bods = Ticket::find($id);
        return view('ticket.edit', compact('bods', 'judul', 'pref'));
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
        $bods = Ticket::where('id', $request->id)->update([
            'code' => $request->code,
            'name' => $request->name,
            'jabatan' => $request->jabatan,
            'status' => $request->status
        ]);
        // \LogActivity::addToLog($bods->name);
        return redirect('/ticket')->with('success', 'Ticket berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Ticket::find($id);
        $data->delete($data);
        // \LogActivity::addToLog($data->name);
        return redirect('/ticket')->with('message', 'Ticket Berhasil Dihapus');
    }
}
