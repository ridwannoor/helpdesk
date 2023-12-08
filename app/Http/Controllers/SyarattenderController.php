<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pengadaan\Syarattender;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Lokasi;
use App\Models\Vendor;
use App\Models\Badanusaha;
use App\Models\Preference;
// use Alert;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\LogActivity as LogActivityModel;

class SyarattenderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/syarattender')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $userbrg = Auth::user()->lokasis()->with('barang')->get();
        $pref = Preference::first();
        $syarats = Syarattender::orderBy('kode_syarat', 'ASC')->get();
        $judul = 'Syarat Tender';
        return view('pengadaan.tender.syarat.index', compact('judul','pref','users','userbrg','crud', 'syarats')); 
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
        $judul = 'Tambah Syarat Tender';
        return view('pengadaan.tender.syarat.add', compact('judul','users','pref','lokasis', 'vendors')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$file = $request->file('file_syarat')) {
            $syarats = new Syarattender();
            $syarats->kode_syarat = $request->kode_syarat;
            $syarats->detail_syarat = $request->detail_syarat;
            // $syarats->file_syarat = $filename ;
            $syarats->save();
            \LogActivity::addToLog($syarats->kode_syarat);
            toast('Data Syarat Tender Berhasil Dibuat','success');
            return redirect('/syarattender');
        }
        else
        {
            $file = $request->file('file_syarat');
            // $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'ST_'. date('YmdHis').".".$extension; 
            // $ext = $file->getClientOriginalExtension();
            // $filename = $request->id.time().".".$ext; 
            $tujuan_upload = 'data_file/syarat';
            $file->move($tujuan_upload,$filename);
            
            $syarats = new Syarattender();
            $syarats->kode_syarat = $request->kode_syarat;
            $syarats->detail_syarat = $request->detail_syarat;
            $syarats->file_syarat = $filename ;
            $syarats->save();
            \LogActivity::addToLog($syarats->kode_syarat);
            toast('Data Syarat Tender Berhasil Dibuat','success');
            return redirect('/syarattender');
            
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
          $judul = 'Detail Syarattender';
        //   $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        //   $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        //   $brgmaintenances = Barangmaintenance::all();
        //   $brgmutasis = Barangmutasi::all();
          $syarats = Syarattender::find($id);
          return view('pengadaan.tender.syarat.show', compact('syarats','users','pref','judul'));
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
         $judul = 'Edit Syarat Tender';
         $syarats = Syarattender::find($id);
       
         return view('pengadaan.tender.syarat.edit', compact('syarats', 'judul','users','pref'));
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
        if (!$file = $request->file('file_syarat')) {
            $syarats = Syarattender::where('id', $request->id)->first();
            $syarats->kode_syarat = $request->kode_syarat;
            $syarats->detail_syarat = $request->detail_syarat;
            // $syarats->file_syarat = $filename ;
            $syarats->save();
            \LogActivity::addToLog($syarats->kode_syarat);
            toast('Data Syarat Tender Berhasil Dibuat','success');
            return redirect('/syarattender');
        }
        else
        {
            $file = $request->file('file_syarat');
            $extension = $file->getClientOriginalExtension();
            $filename = 'ST_'. date('YmdHis').".".$extension; 
            // $ext = $file->getClientOriginalExtension();
            // $filename = $request->id.time().".".$ext; 
            $tujuan_upload = 'data_file/syarat';
            $file->move($tujuan_upload,$filename);
            
            $syarats = Syarattender::where('id', $request->id)->first();
            $syarats->kode_syarat = $request->kode_syarat;
            $syarats->detail_syarat = $request->detail_syarat;
            $syarats->file_syarat = $filename ;
            $syarats->save();
            \LogActivity::addToLog($syarats->kode_syarat);
            toast('Data Syarat Tender Berhasil Dibuat','success');
            return redirect('/syarattender');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Syarattender::where('id',$id)->delete();
        $data = Syarattender::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->kode_syarat);
        // return response()->json(['status'=> 'Syarattender Berhasil di Hapus']);
        // Alert::warning('alert', 'Syarattender Berhasil di Hapus');
        toast('Data Syarattender Berhasil Dihapus','success');
        return redirect('/syarattender');
    }

}
