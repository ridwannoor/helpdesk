<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Barangmaintenance;
use App\Models\Barangmutasi;
use App\Models\Tipemaintenance;
use App\Models\Preference;
use App\Models\Lokasi;
use App\Models\Vendor;
use App\Models\Menu;
use App\Models\Pengadaan\Tender;
use App\Models\Pengadaan\Statustender;
use App\Models\Category;
use App\Models\Jenisusaha;
use App\Models\Badanusaha;
use App\Models\Faq;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{

    public function index()
    {
        $pref = Preference::first();
        $sliders = Slider::all();
        $tenders = Tender::where('is_published', '1')->orderBy('created_at', 'DESC')->paginate(5);
        return view('front.index', compact('pref', 'sliders', 'tenders'));
    }

    public function login()
    {
        $pref = Preference::first();
        return view('front.login', compact('pref'));
    }

    public function faq()
    {
        $pref = Preference::first();
        $faqs = Faq::all();
        return view('front.faq', compact('pref', 'faqs'));
    }

    public function pengumuman()
    {
        $pref = Preference::first();
        $tenders = Tender::where('is_published', '1')->orderBy('created_at', 'DESC')->paginate(5);
        // $tender1 = Tender::where('is_published', '1')->get();
        $closed = Tender::where('is_published', '1')->where('statustender_id', 1)->count();
        $open = Tender::where('is_published', '1')->where('statustender_id', 4)->count();
        $cancel = Tender::where('is_published', '1')->where('statustender_id', 3)->count();
        $pending = Tender::where('is_published', '1')->where('statustender_id', 2)->count();
        $invest = Tender::where('is_published', '1')->where('anggaran_id', 1)->count();
        $eksplo = Tender::where('is_published', '1')->where('anggaran_id', 2)->count();
        return view('front.pengumuman', compact('pref', 'tenders', 'closed', 'open', 'cancel', 'pending', 'invest', 'eksplo'));
    }

    public function pengdetail($id)
    {
        $pref = Preference::first();
        $tenders = Tender::find($id);
        $tends = Tender::where('is_published', '1')->orderBy('created_at', 'DESC')->paginate(5);
        if ($id == 35) {
            return view('front.pengdetailkhusus', compact('pref', 'tenders', 'tends'));
        }
        return view('front.pengdetail', compact('pref', 'tenders', 'tends'));
    }

    public function paket()
    {
        $pref = Preference::first();
        return view('front.paket', compact('pref'));
    }

    public function register()
    {
        $pref = Preference::first();
        $lok = Lokasi::all();
        $badan = Badanusaha::all();
        $jenis = Jenisusaha::all();
        $category = Category::all();
        return view('front.register', compact('pref', 'lok', 'badan', 'jenis', 'category'));
    }

    public function create(Request $request)
    {
        $vendors = new Vendor();
        $vendors->namaperusahaan = $request->namaperusahaan ;
        $vendors->email = $request->email ;
        $vendors->badanusaha_id = $request->badanusaha_id ;
        $vendors->jenisusaha_id = $request->jenisusaha_id ;
        $vendors->category_id = $request->category_id ;
        $vendors->lokasi_id = $request->lokasi_id ;
        $vendors->save();

        $this->guard()->login($vendor);

        return redirect('/vendor/home');

    }

}
