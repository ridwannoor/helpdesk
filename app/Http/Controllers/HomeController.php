<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Po\Rekappo;
use App\Models\Transaksi\Doheader;
use App\Models\User;
use App\Models\Barang;
use App\Models\Hargabarang;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Pum\Pjpum\Pjpumheader;
use App\Models\Lokasi;
use App\Models\Vendor;
use App\Models\SO\Serviceorder;
use App\Models\Pum\Pumheader;
use App\Models\Preference;
use App\Models\Userdetail;
use App\Models\Banego;
use App\Models\Jenisusaha;
use App\Models\Jenispekerjaan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Pengadaan\Tender;
use App\Models\Pengadaan\Tenderdetail;
use App\Models\Pengadaan\Tenderfile;
use App\Models\Pengadaan\Bapengadaan\Bapengadaan;
use App\Models\Pengadaan\Spk\Spkheader;
use App\Models\Pengadaan\Spp\Sppheader;
use App\Models\Pengadaan\Banego\Banegopengadaan;
use App\Models\Pengadaan\Bakes\Bakesepakatan;
use App\Models\Pengadaan\Baaddendum\Baadendumheader;
// use App\Charts\SampleChart;
// use App\Charts\SampleChart;
use App\Models\LogActivity as LogActivityModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function search(Request $request) {
    //     $start = date('Y-m-d',strtotime($request->start));
    //     $end = date('Y-m-d',strtotime($request->end));

    //     $banegos = Banego::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
    // 	$pdf = PDF::loadview('banego.exportpdf', compact('banegos', 'start', 'end'))->setPaper('A4','landscape');
    // 	return $pdf->stream();
       
    // }

    public function search(Request $request)
    {
        $judul = 'Dashboard';
        $judul1 = 'Dashboard';
        $pref = Preference::first();
      
        $start = date('Y-m-d',strtotime($request->start));
        $end = date('Y-m-d',strtotime($request->end));        
        $now = now();
        $lokasis = Lokasi::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
        $user = User::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
        $users = Auth::user()->userdetails()->with('menu')->get();  
        $invs = Hargabarang::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
        $userdo = Auth::user()->lokasis()->get();    
        $pos = Rekappo::where('is_published', '1')->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
        $pum = Pumheader::where('is_published', '1')->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
        $pumosk = Pumheader::where('is_published', '1')->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->sum('total');
	    $pums = Pjpumheader::where('is_published', '1')->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->sum('total');
        $poraps = Rekappo::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->where('is_published', '1')->sum('nilai_rap');
        $pototals = Rekappo::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->where('is_published', '1')->sum('totalrp');
        $dos = Doheader::where('is_published', '1')->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
        $vendorverifieds = Vendor::where('is_published', 1)->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
        $vendorunverifieds = Vendor::where('is_published', 0)->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
        $category = Category::all();
        $jenisusaha = Jenisusaha::all();
        $jenispek = Jenispekerjaan::all();
        $vendors = Vendor::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
        $barangs = Barang::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->sum('aset_tag');
        // $banego = Banego::where('is_published', '1')->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->sum('biaya_dok');
        $bans = Banego::where('is_published', '1')->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get() ;
        $sos = Serviceorder::where('is_published', '1')->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
        $banego1 = Banego::where('is_published', '1')->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->sum('jml_penawaran', 'jml_nego');
        $banego2 = Banego::where('is_published', '1')->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->sum('jml_nego');
        $tenders = Tender::where('is_published', '1')->sum('pagu');
        $tens = Tender::where('is_published', '1')->with('lokasi')->get();
        $bakes = Bakesepakatan::all();
        $spks = Spkheader::all();
        $spps = Sppheader::all();
        $bapengadaans = Bapengadaan::all();
        // $bapengraps = Bapengadaan::where('is_published', '1')->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->sum('nilai_rap');
        // $bapengraps1 = Bapengadaan::where('is_published', '1')->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->sum('biaya_dokumen');
        $banegopengs = Banegopengadaan::where('is_published', '1')->get();
        $basph = Banegopengadaan::where('is_published', '1')->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->sum('jml_penawaran');
        // $basph1 = Banegopengadaan::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->sum('jml_klarif');
        $basph2 = Banegopengadaan::where('is_published', '1')->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->sum('jml_nego');

        foreach ($userdo as $loks) {
            $lok[] = $loks->kode;
            $do[] = $loks->doheaders()->where('lokasi_id', $loks->id)->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->count();
            $po[] = $loks->rekappos()->where('lokasi_id', $loks->id)->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->count();
            $pum1[] = $loks->pums()->where('lokasi_id', $loks->id)->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->count();
            $s2[] = $loks->tender()->where('lokasi_id', $loks->id)->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->count();
            $s3[] = $loks->tender()->where('lokasi_id', $loks->id)->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->sum('nilai');
           
        }

        return view('homepage.search', compact('judul','users', 'pref', 'bakes', 'spks',  'banegopengs', 'basph', 'basph2', 'pumosk', 'bapengadaans',   'now', 'jenispek', 'bans', 'jenisusaha', 'poraps', 
        'pototals', 'judul1','lok', 'pum1', 'lokasis','invs', 'sos', 'user', 'banego1','banego2', 'do','po','pum','pums',  's2', 's3',
        'pos','dos', 'barangs', 'userdo', 'vendorverifieds','vendorunverifieds', 'category', 'vendors', 'tenders', 'tens', 'spps'));
    }
    
   

    public function index()
    {
        $judul = 'Dashboard';
        $judul1 = 'Purchase Order';
        $pref = Preference::first();
        $lokasis = Lokasi::get();
        $user = User::get();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $now = now();
        $invs = Hargabarang::all();
        $userdo = Auth::user()->lokasis()->get();    
        $pos = Rekappo::where('is_published', '1')->get();
        $pum = Pumheader::where('is_published', '1')->get();
        $pumosk = Pumheader::where('is_published', '1')->sum('total');
	    $pums = Pjpumheader::where('is_published', '1')->sum('total');
        $poraps = Rekappo::where('is_published', '1')->sum('nilai_rap');
        $pototals = Rekappo::where('is_published', '1')->sum('totalrp');
        $dos = Doheader::where('is_published', '1')->get();
        $vendorverifieds = Vendor::where('is_published', 1)->get();
        $vendorunverifieds = Vendor::where('is_published', 0)->get();
        $category = Category::get();
        $jenisusaha = Jenisusaha::get();
        $jenispek = Jenispekerjaan::get();
        $vendors = Vendor::get();
        $bapengadaans = Bapengadaan::where('is_published', '1')->get();
        // $bapengraps = $bapengadaans->sum('nilai_rap');
        // $bapengraps1 = $bapengadaans->sum('biaya_dokumen');
        $banegopengs = Banegopengadaan::where('is_published', '1')->get();
        $basph = $banegopengs->where('is_published', '1')->sum('jml_penawaran');
        // $basph1 = $banegopengs->sum('jml_klarif');
        $basph2 = $banegopengs->where('is_published', '1')->sum('jml_nego');
        $bakes = Bakesepakatan::all();
        $spks = Spkheader::all();
        $spps = Sppheader::all();
        // $bacounts = Bapengadaan::all()->count();
        $barangs = Barang::all()->sum('aset_tag');
        // $banego = Banego::where('is_published', '1')->sum('biaya_dok');
        $bans = Banego::where('is_published', '1')->get() ;
        $sos = Serviceorder::where('is_published', '1')->get();
        $banego1 = Banego::where('is_published', '1')->sum('jml_penawaran', 'jml_nego');
        $banego2 = Banego::where('is_published', '1')->sum('jml_nego');
        // $tendters = Tender::with('lokasi', '')->get();
        $tenders = Tender::where('is_published', '1')->sum('pagu');
        $tens = Tender::where('is_published', '1')->with('lokasi')->get();
        // foreach($tens as $s) {
        //     $s1[] = $s->lokasi->kode;
        //     $s2[] = $s->where('lokasi_id', $s->id)->count();
        // }
        $logs = \LogActivity::logActivityLists();
            // dd($logs);
        foreach ($userdo as $loks) {
            $lok[] = $loks->kode;
            $do[] = $loks->doheaders()->where('lokasi_id', $loks->id)->count();
            $po[] = $loks->rekappos()->where('lokasi_id', $loks->id)->count();
            $pum1[] = $loks->pums()->where('lokasi_id', $loks->id)->count();
            $s2[] = $loks->tender()->where('lokasi_id', $loks->id)->count();
            $s3[] = $loks->tender()->where('lokasi_id', $loks->id)->sum('pagu');
        }

        return view('homepage.index', compact('judul','users', 'pref', 'bakes', 'spks',  'banegopengs', 'basph', 'basph2', 'pumosk', 'bapengadaans',   'now', 'jenispek', 'bans', 'jenisusaha', 'poraps', 
        'pototals', 'judul1','lok', 'pum1', 'lokasis','invs', 'sos', 'user', 'banego1','banego2', 'do','po','pum','pums',  's2', 's3',
        'pos','dos', 'barangs', 'userdo', 'vendorverifieds','vendorunverifieds', 'category', 'vendors', 'tenders', 'tens', 'spps', 'logs'));
    }

    public function bantuan()
    {
        $judul = "Bantuan";
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();    
        return view('bantuan', compact('judul', 'pref', 'users'));
    }

    public function myTestAddToLog()
    {
        \LogActivity::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    // public function logActivity()
    // {
    //     $logs = \LogActivity::logActivityLists();
    //     return view('logActivity',compact('logs'));
    // }

    // public function Pofilter($tahun)
    // {
    //     $tahun = Rekappo::whereyear($year);

    //     return $tahun;
    // }
    // function menu(){
    //     $
    // }
    // function get_menu_child($parent=0){
    //     $menus = Menu::where('parent_menu', $parent)->get();
    //     $parent = Menu::where('id', $parent)->first();
        
    // }
}
