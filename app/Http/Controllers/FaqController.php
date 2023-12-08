<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Lokasi;
use App\Models\Vendor;
use App\Models\Badanusaha;
use App\Models\Preference;
use App\Models\LogActivity as LogActivityModel;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/faqint')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $userbrg = Auth::user()->lokasis()->with('barang')->get();
        $pref = Preference::first();
        $faqs = Faq::all();
        $judul = 'Faq';
        return view('faq.index', compact('judul','pref','users','userbrg','crud', 'faqs')); 
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
        $judul = 'Tambah Faq';
        return view('faq.add', compact('judul','users','pref','lokasis', 'vendors')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->judul;
        $faqs = Faq::where('judul',$name)->first();

        if ($faqs) {
            return redirect()->back()->with('message', 'Data Sudah Ada');
        }
        else {
            $faqs = new Faq();
            $faqs->judul = $request->judul;
            $faqs->name = $request->name;
            $faqs->detail = $request->detail;
            $faqs->save();
            \LogActivity::addToLog($faqs->judul);
        return redirect('/faqint')->with('success', 'Faq Berhasil dibuat');
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
        $judul = 'Detail Faq';
      //   $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
      //   $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
      //   $brgmaintenances = Barangmaintenance::all();
      //   $brgmutasis = Barangmutasi::all();
        $faqs = Faq::find($id);
        return view('faq.show', compact('faqs','users','pref','judul'));
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
         $judul = 'Edit Faq';
         $faqs = Faq::find($id);
         return view('faq.edit', compact('faqs', 'judul','users','pref'));
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
        $faqs = Faq::where('id', $request->id)->update([
            'judul' => $request->judul,
            'name' => $request->name,
            'detail' => $request->detail
        ]);
        \LogActivity::addToLog($faqs->judul);
        return redirect('/faqint')->with('success', 'Faq berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faqs = Faq::find($id);
        $faqs->delete($faqs);
        \LogActivity::addToLog($faqs->id);
        return redirect('/faqint')->with('message', 'Faq Berhasil Dihapus');
    }
}
