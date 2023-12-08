<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bod;
use App\Models\Preference;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use App\Models\LogActivity as LogActivityModel;

class BodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/bod')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $bods = Bod::orderBy('status', 'ASC')->get();
        $judul = 'Bod';
        return view('bod.index', compact('judul','bods','users','pref', 'crud')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $bods = Bod::all();
        // dd($bodserences);
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $judul = 'Add Bod';
        return view('bod.add', compact('judul','users','pref')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bods = new Bod();
        $bods->code = $request->code;
        $bods->name = $request->name;
        $bods->jabatan = $request->jabatan;
        $bods->status = $request->status;
        $bods->save();

        \LogActivity::addToLog($bods->name);
        return redirect('/bod')->with('success', 'Bod Berhasil dibuat');
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
        $judul = 'Detail BOD';
      //   $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
      //   $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
      //   $brgmaintenances = Barangmaintenance::all();
      //   $brgmutasis = Barangmutasi::all();
        $bods = Bod::find($id);
        return view('bod.show', compact('bods','users','pref','judul'));
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
        $judul = 'Edit Bod';
        $bods = Bod::find($id);
        return view('bod.edit', compact('bods', 'judul','users','pref'));
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
        $bods = Bod::where('id', $request->id)->update([
            'code' => $request->code,
            'name' => $request->name,
            'jabatan' => $request->jabatan,
            'status' => $request->status
        ]);
        \LogActivity::addToLog($bods->name);
        return redirect('/bod')->with('success', 'Bod berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Bod::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->name);
        return redirect('/bod')->with('message', 'Bod Berhasil Dihapus');
    }
}
