<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi\Doheader;
use App\Models\Transaksi\Dodetail;
use App\Models\Transaksi\Dofile;
use App\Models\Vendor;
use App\Models\Lokasi;
use App\Models\Menu;
use App\Models\Preference;
use Illuminate\Support\Facades\Auth;
use App\Mail\Domail;
use PDF;
use Redirect;
use Carbon\Carbon;
use Mail;
use App\Models\LogActivity as LogActivityModel;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();  
	    $menu = Menu::where('link', '/inventory')->first();
        $crud = $users->where('menu_id', $menu->id)->first(); 
        $does = Dodetails::orderBy('tanggal', 'DESC')->get();
        $judul = 'Inventory';
        return view('inventory.index', compact('judul','does','users','pref','crud')); 
    }
}
