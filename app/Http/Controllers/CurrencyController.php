<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;
use App\Models\Lokasimail;
use App\Models\Menu;
use App\Models\Preference;
use Illuminate\Support\Facades\Auth;
use App\Models\LogActivity as LogActivityModel;

class CurrencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/currency')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $lok = Currency::orderBy('name', 'ASC')->get();
        // dd($lokerences);
        $judul = 'Currency';
        return view('currency.index', compact('judul','lok','users','pref', 'crud')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $lok = Currency::all();
        // dd($lokerences);
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $judul = 'Add Currency';
        return view('currency.add', compact('judul','users','pref')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lok = new lokasi();
        $lok->name = $request->name;
        $lok->negara = $request->negara;
        $lok->save();
        \LogActivity::addToLog($lok->name);
        return redirect('/currency')->with('success', 'Currency Berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $pref = Preference::first();
        $judul = 'Detail Currency';
      //   $lokasis = Currency::orderBy('kode', 'ASC')->get();
      //   $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
      //   $brgmaintenances = Barangmaintenance::all();
      //   $brgmutasis = Barangmutasi::all();
        $lokasis = Currency::find($id);
        // $loks = $lokasis->lokasimail()->get();
        return view('currency.show', compact('lokasis','users','pref','judul'));
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
        $users = Auth::user()->userdetails()->with('menu')->get();   
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $judul = 'Edit Currency';
        $lok = Currency::find($id);
        return view('currency.edit', compact('lok', 'judul','users','pref'));
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
        $lok = Currency::where('id', $request->id)->update([
            'name' => $request->name,
            'negara' => $request->negara
        ]);
        \LogActivity::addToLog($lok->name);
        return redirect('/currency')->with('success', 'Currency berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Currency::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->name);
        return redirect('/currency')->with('message', 'Currency Berhasil Dihapus');
    }
}
