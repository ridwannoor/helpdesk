<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi\Receivedo;
use App\Models\Transaksi\Receivedodetail;
use App\Models\Transaksi\Doheader;
use App\Models\Transaksi\Dodetail;
use App\Models\Transaksi\Dofile;
use App\Models\Vendor;
use App\Models\Lokasi;
use App\Models\Menu;
use App\Models\Preference;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\LogActivity as LogActivityModel;
// use App\Models\Po\Rekappo;
use PDF;
// use App\Http\Controllers\Storage;

class RekapdoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();  
	    $menu = Menu::where('link', '/rekapdo')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
 
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        // $doheaders = Auth::user()->lokasis()->with('doheaders')->orderBy('id', 'DESC')->get();
        $doheaders = Doheader::orderBy('no_do', 'DESC')->get();
        // dd($doheaders);

        $judul = 'Rekap DO';
        return view('transaksi.rekapdo.index', compact('judul', 'doheaders','users','pref','crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function detail($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
     //   $parent = $users->menu->where(['parentmenu' => 0])->get();
        $judul = 'Rekap Delivery Order';
        $preferences = Preference::where('id', $id)->first();
        // $bapm = Doheader::find($id)->with('dodetails')->get();
        $bapm = Doheader::find($id);
        $detail = $bapm->dodetails()->first();
        $detailfile = $bapm->dofiles()->first();
        // $detail = Dodetail::where('doheader_id',$bapm)->first();
    //    dd($bapm,$detail);
        return view('transaksi.rekapdo.detail', compact('judul','detail','pref', 'bapm','preferences','detailfile','users'));
    }
    // public function getdownload($id)
    // {
    //     $bapm = Doheader::with('dofiles')->find($id);
               
    //     $files =  public_path('data_file/pdf'.$bapm->filename) ;
        
    //     return response()->download($files);

    //     // $file = public_path().'/data_file/pdf'.$dofiles ;

    //     // return response()->download($file);
    // }
}
