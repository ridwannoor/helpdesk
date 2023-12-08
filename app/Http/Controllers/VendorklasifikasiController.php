<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendorklasifikasi;
// use App\Models\Vendorklasifikasimail;
use App\Models\Menu;
use App\Models\Preference;
use Illuminate\Support\Facades\Auth;
use App\Models\LogActivity as LogActivityModel;

class VendorklasifikasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/vendorklasifikasi')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $lok = Vendorklasifikasi::all();
        // dd($lokerences);
        $judul = 'Vendorklasifikasi';
        return view('vendor.vendorklasifikasi.index', compact('judul','lok','users','pref', 'crud')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $lok = Vendorklasifikasi::all();
        // dd($lokerences);
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $judul = 'Add Vendorklasifikasi';
        return view('vendor.vendorklasifikasi.add', compact('judul','users','pref')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lok = new Vendorklasifikasi();
        $lok->kode = $request->kode;
        $lok->name = $request->name;
        $lok->save();

        \LogActivity::addToLog($lok->kode); 
        return redirect('/vendorklasifikasi')->with('success', 'Vendorklasifikasi Berhasil dibuat');
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
        $judul = 'Detail Vendorklasifikasi';
      //   $Vendorklasifikasis = Vendorklasifikasi::orderBy('kode', 'ASC')->get();
      //   $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
      //   $brgmaintenances = Barangmaintenance::all();
      //   $brgmutasis = Barangmutasi::all();
        $loks = Vendorklasifikasi::find($id);
        // $loks = $loks->Vendorklasifikasimail()->get();
        return view('vendor.vendorklasifikasi.show', compact('loks','users','pref','judul'));
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
        $judul = 'Edit Vendorklasifikasi';
        $lok = Vendorklasifikasi::find($id);
        return view('vendor.vendorklasifikasi.edit', compact('lok', 'judul','users','pref'));
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
        // $lok = Vendorklasifikasi::where('id', $request->id)->update([
        //     'kode' => $request->kode,
        //     'name' => $request->name
        // ]);
        $lok = Vendorklasifikasi::where('id','=', $request->id)->first();
        $lok->kode = $request->kode;
        $lok->name = $request->name;
        $lok->save();

        \LogActivity::addToLog($lok->kode); 
        return redirect('/vendorklasifikasi')->with('success', 'Vendorklasifikasi berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Vendorklasifikasi::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->kode); 
        return redirect('/vendorklasifikasi')->with('message', 'Vendorklasifikasi Berhasil Dihapus');
    }
}
