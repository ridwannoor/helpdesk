<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Lokasi;
use App\Models\Vendor;
use App\Models\Badanusaha;
use App\Models\Preference;
use App\Models\Mybank;
use App\Models\LogActivity as LogActivityModel;


class PurchaseController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/badanusaha')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $userbrg = Auth::user()->lokasis()->with('barang')->get();
        $pref = Preference::first();
        $lok = Badanusaha::all();
        $judul = 'Purchase';

        return view('purchase.index', compact('judul','pref','users','userbrg','crud', 'lok'));
        // return Http::dd()->get('http://backoffice.atharva.id');
    }

    public function detail()
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/badanusaha')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $userbrg = Auth::user()->lokasis()->with('barang')->get();
        $pref = Preference::first();
        $lok = Badanusaha::all();
        $banks = Mybank::orderBy('bank', 'ASC')->get();
        $judul = 'Purchase Detail';
        // $purchase = 

        return view('purchase.detail', compact('judul','pref','users','userbrg','crud', 'lok', 'banks'));
        // return Http::dd()->get('http://backoffice.atharva.id');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
