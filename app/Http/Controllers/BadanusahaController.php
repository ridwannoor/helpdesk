<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Lokasi;
use App\Models\Vendor;
use App\Models\Badanusaha;
use App\Models\Preference;
use App\Models\LogActivity as LogActivityModel;

class BadanusahaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/badanusaha')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $userbrg = Auth::user()->lokasis()->with('barang')->get();
        $pref = Preference::first();
        $lok = Badanusaha::all();
        $judul = 'Badan Usaha';
        return view('badanusaha.index', compact('judul','pref','users','userbrg','crud', 'lok')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lokasis = Lokasi::all();
        $vendors = Vendor::all();
        $users = Auth::user()->userdetails()->with('menu')->get();   
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $judul = 'Tambah Badan Usaha';
        return view('badanusaha.add', compact('judul','users','pref','lokasis', 'vendors')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->kode;
        $ven = Badanusaha::where('kode',$name)->first();

        if ($ven) {
            return redirect()->back()->with('message', 'Data Sudah Ada');
        }
        else {

            $badanusahas = new Badanusaha();
            $badanusahas->kode = $request->kode;
            $badanusahas->detail = $request->detail;
            $badanusahas->save();
            \LogActivity::addToLog($badanusahas->detail);
            return redirect('/badanusaha')->with('success', 'Data Berhasil Disimpan'  );
        }
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
        $judul = 'Detail Badan Usaha';
      //   $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
      //   $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
      //   $brgmaintenances = Barangmaintenance::all();
      //   $brgmutasis = Barangmutasi::all();
        $badans = Badanusaha::find($id);
        return view('badanusaha.show', compact('badans','users','pref','judul'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
         $judul = 'Edit Badan Usaha';
         $lok = Badanusaha::find($id);
         return view('badanusaha.edit', compact('lok', 'judul','users','pref'));
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
        $lok = Badanusaha::where('id', $request->id)->update([
            'kode' => $request->kode,
            'detail' => $request->detail
        ]);
        \LogActivity::addToLog($lok->detail);

        return redirect('/badanusaha')->with('success', 'Badan Usaha berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Badanusaha::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->detail);
        return redirect('/badanusaha')->with('message', 'Badan Usaha Berhasil Dihapus');
    }
}
