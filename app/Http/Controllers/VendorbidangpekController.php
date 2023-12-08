<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenispekerjaan;
use App\Models\Menu;
use App\Models\Preference;
use Illuminate\Support\Facades\Auth;
use App\Models\LogActivity as LogActivityModel;

class VendorbidangpekController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/vendorbidangpek')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $lok = Jenispekerjaan::all();
        // dd($lokerences);
        $judul = 'Bidang Pekerjaan';
        return view('jenispekerjaan.index', compact('judul','lok','users','pref', 'crud')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $lok = Jenispekerjaan::all();
        // dd($lokerences);
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $judul = 'Add Bidang Pekerjaan';
        return view('jenispekerjaan.add', compact('judul','users','pref')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lok = new Jenispekerjaan();
        $lok->name = $request->name;
        // $lok->keterangan = $request->keterangan;
        $lok->save();
        \LogActivity::addToLog($lok->name); 
        return redirect('/vendorbidangpek')->with('success', 'Bidang Pekerjaan Berhasil dibuat');
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
        $judul = 'Detail Bidang Pekerjaan';
      //   $jenispekerjaans = Jenispekerjaan::orderBy('kode', 'ASC')->get();
      //   $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
      //   $brgmaintenances = Barangmaintenance::all();
      //   $brgmutasis = Barangmutasi::all();
        $loks = Jenispekerjaan::find($id);
        // $loks = $loks->jenispekerjaanmail()->get();
        return view('jenispekerjaan.show', compact('loks','users','pref','judul'));
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
        $judul = 'Edit Bidang Pekerjaan';
        $lok = Jenispekerjaan::find($id);
        return view('jenispekerjaan.edit', compact('lok', 'judul','users','pref'));
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
        // $lok = Jenispekerjaan::where('id', $request->id)->update([
        //     'name' => $request->name
        //     // 'keterangan' => $request->keterangan
        // ]);
        $lok = Jenispekerjaan::where('id','=', $request->id)->first();
        $lok->name = $request->name;
        // $lok->keterangan = $request->keterangan;
        $lok->save();

        \LogActivity::addToLog($lok->name); 
        return redirect('/vendorbidangpek')->with('success', 'Bidang Pekerjaan berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Jenispekerjaan::find($id);
        $data->delete($data);
        return redirect('/vendorbidangpek')->with('message', 'Bidang Pekerjaan Berhasil Dihapus');
    }
}
