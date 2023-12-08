<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lokasi;
use App\Models\Lokasimail;
use App\Models\Menu;
use App\Models\Preference;
use Illuminate\Support\Facades\Auth;
use App\Models\LogActivity as LogActivityModel;

class LokasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/lokasi')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $lok = Lokasi::orderBy('kode', 'ASC')->get();
        // dd($lokerences);
        $judul = 'Lokasi';
        return view('lokasi.index', compact('judul','lok','users','pref', 'crud')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $lok = Lokasi::all();
        // dd($lokerences);
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $judul = 'Add Lokasi';
        return view('lokasi.add', compact('judul','users','pref')); 
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
        $lok->kode = $request->kode;
        $lok->detail = $request->detail;
        $lok->save();
        \LogActivity::addToLog($lok->kode);
        return redirect('/lokasi')->with('success', 'Lokasi Berhasil dibuat');
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
        $judul = 'Detail Lokasi';
      //   $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
      //   $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
      //   $brgmaintenances = Barangmaintenance::all();
      //   $brgmutasis = Barangmutasi::all();
        $lokasis = Lokasi::find($id);
        $loks = $lokasis->lokasimail()->get();
        return view('lokasi.show', compact('lokasis','users','pref','judul','loks'));
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
        $judul = 'Edit Lokasi';
        $lok = Lokasi::find($id);
        return view('lokasi.edit', compact('lok', 'judul','users','pref'));
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
        $lok = Lokasi::where('id', $request->id)->update([
            'kode' => $request->kode,
            'detail' => $request->detail
        ]);
        \LogActivity::addToLog($lok->kode);
        return redirect('/lokasi')->with('success', 'Lokasi berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Lokasi::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->kode);
        return redirect('/lokasi')->with('message', 'Lokasi Berhasil Dihapus');
    }

    public function destroymail($id)
    {
        $data = Lokasimail::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->id);
        return redirect('/lokasi')->with('message', 'Email Berhasil Dihapus');
    }

    public function postmail(Request $request)
    {
        $loks = new Lokasimail();
        $loks->lokasi_id = $request->id;
        $loks->name = $request->name;
        $loks->email = $request->email;
        // dd($loks);
        $loks->save();
        \LogActivity::addToLog($loks->name);
        return redirect()->back()->with('success', 'Data berhasil disimpan .. !!');
    }
    // public function addmail($id)
    // {
    //     $lokasis = Lokasi::all();
    //     $vendors = Vendor::all();
    //     $tipes = Tipemaintenance::all();
    //     $users = Auth::user()->userdetails()->with('menu')->get();   
    //    // $parent = $users->menu->where(['parentmenu' => 0])->get();
    //     $pref = Preference::first();
    //     $brg = Barang::find($id);
    //     // $judul = 'Add Barang';
    //     $judul = 'Add Maintenance Barang' ;
    //     return view('lokasi.addmail', compact('brg', 'tipes', 'judul','users','pref','lokasis','vendors'));

    // }
}
