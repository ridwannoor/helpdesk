<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendorjenisdoc;
use App\Models\Lokasimail;
use App\Models\Menu;
use App\Models\Preference;
use Illuminate\Support\Facades\Auth;
use App\Models\LogActivity as LogActivityModel;

class VendorjenisdocController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/vendorjenisdoc')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $lok = Vendorjenisdoc::all();
        // dd($lokerences);
        $judul = 'Vendorjenisdoc';
        return view('vendor.vendorjenisdoc.index', compact('judul','lok','users','pref', 'crud')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $lok = Vendorjenisdoc::all();
        // dd($lokerences);
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $judul = 'Add Vendorjenisdoc';
        return view('vendor.vendorjenisdoc.add', compact('judul','users','pref')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lok = new Vendorjenisdoc();
        $lok->keterangan = $request->keterangan;
        // $lok->negara = $request->negara;
        $lok->save();
        \LogActivity::addToLog($lok->keterangan); 
        return redirect('/vendorjenisdoc')->with('success', 'Vendorjenisdoc Berhasil dibuat');
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
        $judul = 'Detail Vendorjenisdoc';
      //   $lokasis = Vendorjenisdoc::orderBy('kode', 'ASC')->get();
      //   $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
      //   $brgmaintenances = Barangmaintenance::all();
      //   $brgmutasis = Barangmutasi::all();
        $loks = Vendorjenisdoc::find($id);
        // $loks = $lokasis->lokasimail()->get();
        return view('vendor.vendorjenisdoc.show', compact('loks','users','pref','judul'));
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
        $judul = 'Edit Vendorjenisdoc';
        $lok = Vendorjenisdoc::find($id);
        return view('vendor.vendorjenisdoc.edit', compact('lok', 'judul','users','pref'));
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
        // $lok = Vendorjenisdoc::where('id', $request->id)->update([
        //     'keterangan' => $request->keterangan
        // ]);
        $lok = Vendorjenisdoc::where('id','=', $request->id)->first();
        $lok->keterangan = $request->keterangan;
        $lok->save();

        \LogActivity::addToLog($lok->keterangan); 
        return redirect('/vendorjenisdoc')->with('success', 'Vendorjenisdoc berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Vendorjenisdoc::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->id); 
        return redirect('/vendorjenisdoc')->with('message', 'Vendorjenisdoc Berhasil Dihapus');
    }
}
