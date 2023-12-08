<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Vendorjenis;
use App\Models\Vendorjenismail;
use App\Models\Menu;
use App\Models\Preference;
use Illuminate\Support\Facades\Auth;
use App\Models\LogActivity as LogActivityModel;

class VendorjenisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/vendorjenis')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $lok = Vendorjenis::all();
        // dd($lokerences);
        $judul = 'Vendorjenis';
        return view('vendor.vendorjenis.index', compact('judul','lok','users','pref', 'crud')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $lok = Vendorjenis::all();
        // dd($lokerences);
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $judul = 'Add Vendorjenis';
        return view('vendor.vendorjenis.add', compact('judul','users','pref')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lok = new Vendorjenis();
        // $lok->name = $request->name;
        $lok->keterangan = $request->keterangan;
        $lok->save();

        \LogActivity::addToLog($lok->keterangan); 
        return redirect('/vendorjenis')->with('success', 'Vendorjenis Berhasil dibuat');
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
        $judul = 'Detail Vendorjenis';
      //   $Vendorjeniss = Vendorjenis::orderBy('kode', 'ASC')->get();
      //   $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
      //   $brgmaintenances = Barangmaintenance::all();
      //   $brgmutasis = Barangmutasi::all();
        $loks = Vendorjenis::find($id);
        // $loks = $loks->Vendorjenismail()->get();
        return view('vendor.vendorjenis.show', compact('loks','users','pref','judul'));
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
        $judul = 'Edit Vendorjenis';
        $lok = Vendorjenis::find($id);
        return view('vendor.vendorjenis.edit', compact('lok', 'judul','users','pref'));
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
        // $lok = Vendorjenis::where('id', $request->id)->update([
        //     // 'name' => $request->name,
        //     'keterangan' => $request->keterangan
        // ]);
        $lok = Vendorjenis::where('id','=', $request->id)->first();
        // $lok->name = $request->name;
        $lok->keterangan = $request->keterangan;
        $lok->save();

        \LogActivity::addToLog($lok->keterangan); 
        return redirect('/vendorjenis')->with('success', 'Vendorjenis berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Vendorjenis::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->id); 
        return redirect('/vendorjenis')->with('message', 'Vendorjenis Berhasil Dihapus');
    }
}
