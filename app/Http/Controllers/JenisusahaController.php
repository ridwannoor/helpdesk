<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenisusaha;
use App\Models\Preference;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\LogActivity as LogActivityModel;

class JenisusahaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/jenisusaha')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        // foreach ($users as $u) {
        //     $u;
        // }
        $lok = Jenisusaha::all();
        // dd($lokerences);
        $judul = 'Jenisusaha';
        return view('jenis.index', compact('judul','lok','users','pref', 'crud')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $lok = Jenisusaha::all();
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        // dd($lokerences);
        $judul = 'Add Jenisusaha';
        return view('jenis.add', compact('judul','users','pref')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lok = new jenisusaha();
        $lok->kode = $request->kode;
        $lok->detail = $request->detail;
        $lok->save();
        \LogActivity::addToLog($lok->kode);
        return redirect('/jenisusaha')->with('success', 'Jenisusaha Berhasil dibuat');
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
        $judul = 'Detail Jenis Usaha';
      //   $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
      //   $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
      //   $brgmaintenances = Barangmaintenance::all();
      //   $brgmutasis = Barangmutasi::all();
        $loks = Jenisusaha::find($id);
        // $loks = $lokasis->lokasimail()->get();
        return view('jenis.show', compact('loks','users','pref','judul','loks'));
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
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $judul = 'Edit Jenisusaha';
        $lok = Jenisusaha::find($id);
        return view('jenis.edit', compact('lok', 'judul','users','pref'));
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
        $lok = Jenisusaha::where('id', $request->id)->update([
            'kode' => $request->kode,
            'detail' => $request->detail
        ]);
        \LogActivity::addToLog($lok->kode);
        return redirect('/jenisusaha')->with('success', 'Jenisusaha berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Jenisusaha::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->kode);
        return redirect('/jenisusaha')->with('message', 'Jenisusaha Berhasil Dihapus');
    }
}
