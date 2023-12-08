<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Lokasi;
use App\Models\Vendor;
use App\Models\Badanusaha;
use App\Models\Preference;
use App\Models\Pengadaan\Timeline;
use App\Models\Pengadaan\Tender;
use App\Models\Pengadaan\Timelinefile;
use App\Models\LogActivity as LogActivityModel;
use PDF;

class TimelineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/timeline')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $pref = Preference::first();
        $times = Timeline::orderBy('created_at', 'DESC')->get();
        $judul = 'Timeline';
        return view('pengadaan.timeline.index', compact('judul','pref','users','crud', 'times')); 
    }

    public function create()
    {
        $lokasis = Lokasi::all();
        $vendors = Vendor::all();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $tenders = Tender::orderBy('nomor_pr', 'DESC')->get();
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $judul = 'Timeline Create';
        return view('pengadaan.timeline.add', compact('judul','users','pref','lokasis', 'vendors', 'tenders')); 
    }

    public function store(Request $request)
    {
        $times = new Timeline();
        $times->tender_id = $request->tender_id;
        $times->undangan_aanwizing = $request->undangan_aanwizing;
        $times->ket_undangan = $request->ket_undangan;
        $times->rapat_pekerjaan = $request->rapat_pekerjaan;
        $times->ket_rapat = $request->ket_rapat;
        $times->sbd = $request->sbd;
        $times->ket_sbd = $request->ket_sbd;
        $times->sph = $request->sph;
        $times->ket_sph = $request->ket_sph;
        $times->rpp = $request->rpp;
        $times->ket_rpp = $request->ket_rpp;
        $times->pengumuman = $request->pengumuman;
        $times->ket_pengum = $request->ket_pengum;
        $times->rpp_1 = $request->rpp_1;
        $times->ket_rpp1 = $request->ket_rpp1;
        $times->pengumuman_1 = $request->pengumuman_1;
        $times->ket_pengum1 = $request->ket_pengum1;
        $times->klarif_nego = $request->klarif_nego;
        $times->ket_klarif = $request->ket_klarif;
        $times->sph_nego = $request->sph_nego;
        $times->ket_sphnego = $request->ket_sphnego;
        $times->spp = $request->spp;
        $times->ket_spp = $request->ket_spp;
        $times->kontrak = $request->kontrak;
        $times->ket_kontrak = $request->ket_kontrak;
        $times->save();
        \LogActivity::addToLog($times->tender_id);
        return redirect('/timeline')->with('success', 'Data Berhasil Tersimpan');
    }

    public function edit($id)
    {
        $lokasis = Lokasi::all();
        $vendors = Vendor::all();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $tenders = Tender::orderBy('nomor_pr', 'DESC')->get();
        $times = Timeline::find($id);
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $judul = 'Timeline Edit';
        return view('pengadaan.timeline.edit', compact('judul','users','pref','lokasis', 'vendors', 'tenders', 'times')); 
    }

    public function update(Request $request)
    {
        $times = Timeline::where('id', $request->id)->first();
        $times->tender_id = $request->tender_id;
        $times->undangan_aanwizing = $request->undangan_aanwizing;
        $times->ket_undangan = $request->ket_undangan;
        $times->rapat_pekerjaan = $request->rapat_pekerjaan;
        $times->ket_rapat = $request->ket_rapat;
        $times->sbd = $request->sbd;
        $times->ket_sbd = $request->ket_sbd;
        $times->sph = $request->sph;
        $times->ket_sph = $request->ket_sph;
        $times->rpp = $request->rpp;
        $times->ket_rpp = $request->ket_rpp;
        $times->pengumuman = $request->pengumuman;
        $times->ket_pengum = $request->ket_pengum;
        $times->rpp_1 = $request->rpp_1;
        $times->ket_rpp1 = $request->ket_rpp1;
        $times->pengumuman_1 = $request->pengumuman_1;
        $times->ket_pengum1 = $request->ket_pengum1;
        $times->klarif_nego = $request->klarif_nego;
        $times->ket_klarif = $request->ket_klarif;
        $times->sph_nego = $request->sph_nego;
        $times->ket_sphnego = $request->ket_sphnego;
        $times->spp = $request->spp;
        $times->ket_spp = $request->ket_spp;
        $times->kontrak = $request->kontrak;
        $times->ket_kontrak = $request->ket_kontrak;
        $times->save();
        \LogActivity::addToLog($times->tender_id);
        return redirect('/timeline')->with('success', 'Data Berhasil di Perbarui');
    }

    public function destroy($id)
    {
        // Syarattender::where('id',$id)->delete();
        $data = Timeline::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->tender_id);
        // return response()->json(['status'=> 'Syarattender Berhasil di Hapus']);
        // Alert::warning('alert', 'Syarattender Berhasil di Hapus');
        // toast('Data Syarattender Berhasil Dihapus','success');
        return redirect('/timeline')->with('success', 'Data Berhasil di Hapus');
    }

    public function show($id)
    {
          $users = Auth::user()->userdetails()->with('menu')->get();   
          $pref = Preference::first();
          $judul = 'Detail Timeline';
          $times = Timeline::find($id);
          return view('pengadaan.timeline.show', compact('times','users','pref','judul'));
    }

    public function cetak($id)
    {
        $judul = 'Cetak Timeline';
        $times = Timeline::find($id);    
        $pref = Preference::first(); 
        $pdf = PDF::loadView('pengadaan.timeline.cetak',compact('judul','times', 'pref'))->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

}
