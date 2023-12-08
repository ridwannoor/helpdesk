<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divisi;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Lokasi;
use App\Models\Vendor;
use App\Models\Badanusaha;
use App\Models\Preference;
// use Alert;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\LogActivity as LogActivityModel;

class DivisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/divisi')->first();
            $crud = $users->where('menu_id', $menu->id)->first();
          //  $parent = $users->menu->where(['parentmenu' => 0])->get();
            $userbrg = Auth::user()->lokasis()->with('barang')->get();
            $pref = Preference::first();
            $lok = Divisi::orderBy('kode', 'ASC')->get();
            $judul = 'Divisi';
            return view('divisi.index', compact('judul','pref','users','userbrg','crud', 'lok')); 
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
        $judul = 'Tambah Divisi';
        return view('divisi.add', compact('judul','users','pref','lokasis', 'vendors')); 
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
        $ven = Divisi::where('kode',$name)->first();

        if ($ven) {
            return redirect()->back()->with('message', 'Data Sudah Ada');
        }
        else {
            $lok = new Divisi();
            $lok->kode = $request->kode;
            $lok->detail = $request->detail;
            $lok->save();
            // alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.');
            toast('Data Divisi Berhasil Dibuat','success');
            \LogActivity::addToLog($lok->kode);
        return redirect('/divisi');
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
          $judul = 'Detail Divisi';
        //   $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        //   $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        //   $brgmaintenances = Barangmaintenance::all();
        //   $brgmutasis = Barangmutasi::all();
          $divisis = Divisi::find($id);
          return view('divisi.show', compact('divisis','users','pref','judul'));
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
         $judul = 'Edit Divisi';
         $lok = Divisi::find($id);
       
         return view('divisi.edit', compact('lok', 'judul','users','pref'));
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
        $lok = Divisi::where('id', $request->id)->update([
            'kode' => $request->kode,
            'detail' => $request->detail
        ]);

        \LogActivity::addToLog($lok->kode);
        // Alert::success('success', 'Divisi Berhasil di Ubah');
        toast('Data Divisi Berhasil Diperbarui','success');
        return redirect('/divisi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Divisi::where('id',$id)->delete();
        $data = Divisi::find($id);
        $data->delete($data);

        \LogActivity::addToLog($data->id);
        // return response()->json(['status'=> 'Divisi Berhasil di Hapus']);
        // Alert::warning('alert', 'Divisi Berhasil di Hapus');
        toast('Data Divisi Berhasil Dihapus','success');
        return redirect('/divisi');
    }
}
