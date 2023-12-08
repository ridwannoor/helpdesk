<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preference;
use App\Models\Lokasi;
use App\Models\Vendor;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\LogActivity as LogActivityModel;

class BillingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $users = Auth::user()->userdetails()->get();   
        // $users = Auth::user()->userdetails()->with('menu')->get();   
	    // $menu = Menu::where('link', '/billing')->first();
        // $crud = $users->where('menu_id', $menu->id)->first();
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        // $userbrg = Auth::user()->lokasis()->with('barang')->get();
        // $brgs = Barang::with('barangmutasi')->orderBy('tahun_perolehan', 'DESC')->get();
        $pref = Preference::first();
        $judul = 'Billing';
        return view('billing.index', compact('judul','pref','users')); 
    }

    public function detail()
    {
        $users = Auth::user()->userdetails()->get();   
        // $users = Auth::user()->userdetails()->with('menu')->get();   
	    // $menu = Menu::where('link', '/billing')->first();
        // $crud = $users->where('menu_id', $menu->id)->first();
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        // $userbrg = Auth::user()->lokasis()->with('barang')->get();
        // $brgs = Barang::with('barangmutasi')->orderBy('tahun_perolehan', 'DESC')->get();
        $pref = Preference::first();
        $judul = 'Billing';
        return view('billing.detail', compact('judul','pref','users')); 
    }
}
