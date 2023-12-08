<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Lokasi;
use App\Models\Vendor;
use App\Models\Badanusaha;
use App\Models\Preference;
use App\Models\Kontrak\Kontrakhead;
use App\Models\Kontrak\Kontrakfile;
use App\Models\Po\Rekappo;
use App\Models\LogActivity as LogActivityModel;

class KontrakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/kontrak')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $kontraks = Kontrakhead::with('kontrakfile')->orderBy('created_at','DESC')->get();
        // dd($lokerences);
        $judul = 'Kontrak';
        return view('kontrak.index', compact('judul','kontraks','users','pref', 'crud')); 
    }
}
