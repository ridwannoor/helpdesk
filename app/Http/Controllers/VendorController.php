<?php

namespace App\Http\Controllers;
//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendorbank;
use App\Models\Vendorbod;
use App\Models\Vendor;
use App\Models\Jenisusaha;
use App\Models\Lokasi;
use App\Models\Menu;
use App\Models\Itemdetail;
use App\Models\Badanusaha;
use App\Models\Bank;
use App\Models\Bod;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\LogActivity as LogActivityModel;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Models\Emailvendor;
use App\Models\Preference;
use App\Models\Vendordoc;
use App\Models\Vendorkontrak;
use App\Models\Vendorjenis;
use App\Models\Vendorjenisdoc;
use App\Models\Vendorlisensi;
use App\Models\Vendormaillog;
use App\Models\Vendorfasilitas;
use App\Models\Vendorklasifikasi;
use App\Models\Vendorsertifikat;
use App\Models\Vendorlap;
use App\Models\Vendorpengalaman;
use App\Models\Vendorpengurus;
use App\Models\Vendortenaga;
use App\Models\Vendortipe;
use App\Models\Currency;
use App\Models\Jenispekerjaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VendorExport;
use App\Models\Po\Rekappo;
use App\Models\Provinsi;
// use App\Models\Po\Poheader;
use App\Models\Po\Podetail;
// use App\Models\Po\Potemp;
use App\Models\Po\Pofile;
// use Illuminate\Support\Arr;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
	    $menu = Menu::where('link', '/vendor')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $vendors = Vendor::orderBy('is_published', 'DESC')->paginate(200);
        $vendors1 = Vendor::orderBy('is_published', 'DESC')->get();
        $cat   = Category::orderBy('kode','ASC')->get();
        $provinsi   = Provinsi::orderBy('name','ASC')->get();
        $jns = Jenisusaha::orderBy('kode','ASC')->get();
        $jpeks = Jenispekerjaan::orderBy('name','ASC')->get();
        $sert = Vendorklasifikasi::orderBy('kode','ASC')->get();
        $lisens = Vendorjenis::orderBy('keterangan','ASC')->get();
	//dd($vendors);
        $menus = Menu::all();
        $badan = Badanusaha::all();
        $judul = 'Vendor';
        return view('vendor.index', compact('vendors', 'vendors1','judul','users','pref','badan', 'crud', 'cat', 'provinsi', 'jns', 'jpeks', 'sert', 'lisens'));
    }

    public function indexall(Request $request)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
	    $menu = Menu::where('link', '/vendor')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        // $vendors = Vendor::orderBy('is_published', 'DESC')->paginate(200);
        $vendors1 = Vendor::orderBy('is_published', 'DESC')->get();
        $cat   = Category::orderBy('kode','ASC')->get();
        // $provinsi   = Provinsi::orderBy('name','ASC')->get();
        // $jns = Jenisusaha::orderBy('kode','ASC')->get();
        // $jpeks = Jenispekerjaan::orderBy('name','ASC')->get();
        // $sert = Vendorklasifikasi::orderBy('kode','ASC')->get();
        // $lisens = Vendorjenis::orderBy('keterangan','ASC')->get();
	//dd($vendors);
        // $menus = Menu::all();
        // $badan = Badanusaha::all();
        $judul = 'Vendor All';
        return view('vendor.all', compact('vendors1','judul','users','pref', 'crud', 'cat'));
    }

    public function search(Request $request)
    {
        $vend1 = collect($request->jenispekerjaan_id)  ;
        $vend2 = $request->is_published ;
        $vend3 = collect($request->jenisusaha_id);
        $vend4 = collect($request->category_id);
        $vend5 = collect($request->vendorsertifikasi_id);
       
        $jenispekerjaan = Jenispekerjaan::all();
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
	    $menu = Menu::where('link', '/vendor')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $cat   = Category::orderBy('kode','ASC')->get();
        $provinsi   = Provinsi::orderBy('name','ASC')->get();
        $jns = Jenisusaha::orderBy('kode','ASC')->get();
        $jpeks = Jenispekerjaan::orderBy('name','ASC')->get();
        $menus = Menu::all();
        $badan = Badanusaha::all();
        $judul = 'Vendor';

        $vendors = Vendor::with('jenispekerjaans', 'jenisusahas', 'categories', 'badanusaha', 'vendorlisensi', 'vendorsertifikat');
        if($vend1)
        {
          $Ass =  $vendors->jenispekerjaans->where('jenispekerjaans_id', '=', $vend1)->get();
          dd($Ass);
        }
       
        return view('vendor.search', compact('judul','pref','users', 'vend1', 'jensa', 'crud', 'cat', 'provinsi', 'jns', 'jpeks', 'bids' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function confirmation(Request $request){
    //     $data = $request->all();
    //     dd($data);
    //     return view('vendor.add',compact('data'));
    // }   

    public function create()
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
        $lokasis = Lokasi::all();
        $judul = 'Add Vendor';
        $cat   = Category::orderBy('kode','ASC')->get();
        $provinsi   = Provinsi::orderBy('name','ASC')->get();
        $jns = Jenisusaha::orderBy('kode','ASC')->get();
        $jpeks = Jenispekerjaan::orderBy('name','ASC')->get();
        $badan = Badanusaha::orderBy('kode','ASC')->get();
        $bank = Bank::orderBy('name','ASC')->get();
        return view('vendor.add', compact('judul', 'cat', 'jns', 'users','pref', 'badan', 'provinsi', 'lokasis', 'bank', 'jpeks'));
    }

    public function emailvend()
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
        $lokasis = Lokasi::all();
        $judul = 'Email Vendor';
        $cat   = Category::orderBy('kode','ASC')->get();
        $jns = Jenisusaha::orderBy('kode','ASC')->get();
        $jpeks = Jenispekerjaan::orderBy('name','ASC')->get();
        $badan = Badanusaha::orderBy('kode','ASC')->get();
        $bank = Bank::orderBy('name','ASC')->get();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        return view('vendor.emailvendor', compact('judul', 'vendors', 'cat', 'jns', 'users','pref', 'badan', 'lokasis', 'bank', 'jpeks'));
    }

    public function createbod($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
        $lokasis = Lokasi::all();
        $judul = 'Add Vendor BOD';
        $cat   = Category::pluck('detail', 'id')->all(); 
        $jns = Jenisusaha::pluck('detail', 'id')->all(); 
        $jpeks = Jenispekerjaan::pluck('name', 'id')->all(); 
        $badan = Badanusaha::orderBy('kode','ASC')->get();
        $bank = Bank::orderBy('name','ASC')->get();
        $vendorbods = Vendor::with('vendorbod')->find($id);
        return view('vendor.vendorbod.add', compact('judul', 'cat', 'jns', 'users','pref', 'badan', 'lokasis', 'bank', 'vendorbods', 'jpeks'));
    }

    
    public function storebod(Request $request)
    {
        $vendorbods = new Vendorbod();
        $vendorbods->vendor_id = $request->id;
        $vendorbods->nama = $request->nama;
        $vendorbods->jabatan = $request->jabatan;
        $vendorbods->status = $request->status;
        $vendorbods->save();
        \LogActivity::addToLog($vendorbods->nama); 
        return redirect('/vendor/show' . $vendorbods->vendor_id)->with('success', 'Data berhasil disimpan .. !!');
    }

    public function editbod($id)
    {
        $vendors = Vendor::all();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $pref = Preference::first();
        $vendorbods = Vendorbod::find($id);
        $judul = 'Edit Vendor BOD' ;
        return view('vendor.vendorbod.edit', compact('vendorbods',  'judul','users','pref', 'vendors'));

    }

    public function updatebod(Request $request)
    {
        $vendorbods = Vendorbod::where('id','=', $request->id)->first();
        $vendorbods->vendor_id = $request->vendor_id;
        $vendorbods->nama = $request->nama;
        $vendorbods->jabatan = $request->jabatan;
        $vendorbods->status = $request->status;
        $vendorbods->save();
        \LogActivity::addToLog($vendorbods->nama); 
        return redirect('/vendor/show' . $vendorbods->vendor_id)->with('success', 'Data berhasil disimpan .. !!');        
    }

    public function destroybod($id)
    {
        $data = Vendorbod::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->id); 
        return redirect('/vendor')->with('message', 'Data Maintenance Berhasil Dihapus');
    }

    public function publishbod($id)
    {
        $data = Vendorpengurus::find($id);
        $data->ttd = !$data->ttd;
        $data->save();
        return redirect('/vendor/show/'. $data->vendor_id);
    }

    public function createbank($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
        $lokasis = Lokasi::all();
        $judul = 'Add Vendor BOD';
        $cat   = Category::orderBy('kode','ASC')->get();
        $jns = Jenisusaha::orderBy('kode','ASC')->get();
        $badan = Badanusaha::orderBy('kode','ASC')->get();
        $bank = Bank::orderBy('name','ASC')->get();
        $vendors = Vendor::with('vendorbank')->find($id);
        $vendorbanks = Bank::all();
        return view('vendor.vendorbank.add', compact('judul', 'cat', 'jns', 'users','pref', 'badan', 'lokasis', 'bank', 'vendors', 'vendorbanks'));
    }

    
    public function storebank(Request $request)
    {
        $vendorbanks = new Vendorbank();
        $vendorbanks->vendor_id = $request->id;
        $vendorbanks->bank_id = $request->bank_id;
        $vendorbanks->nomor_rek = $request->nomor_rek;
        $vendorbanks->nama_pemilik = $request->nama_pemilik;
        $vendorbanks->save();
        \LogActivity::addToLog($vendorbanks->bank_id); 
        return redirect('/vendor/show/' . $vendorbanks->vendor_id)->with('success', 'Data berhasil disimpan .. !!');
    }

    public function editbank($id)
    {
        $vendors = Vendor::all();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $pref = Preference::first();
        $vendorbanks = Vendorbank::find($id);
        $banks = Bank::all();
        $judul = 'Edit Vendor BOD' ;
        return view('vendor.vendorbank.edit', compact('vendorbanks','banks', 'judul','users','pref', 'vendors'));

    }

    public function updatebank(Request $request)
    {
        $vendorbanks = Vendorbank::where('id','=', $request->id)->first();
        $vendorbanks->vendor_id = $request->vendor_id;
        $vendorbanks->bank_id = $request->bank_id;
        $vendorbanks->nomor_rek = $request->nomor_rek;
        $vendorbanks->nama_pemilik = $request->nama_pemilik;
        $vendorbanks->save();
        \LogActivity::addToLog($vendorbanks->bank_id); 
        return redirect('/vendor/show'. $vendorbanks->vendor_id)->with('success', 'Data berhasil disimpan .. !!');        
    }

    public function destroybank($id)
    {
        $data = Vendorbank::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->id); 
        return redirect('/vendor/show/' . $data->vendor_id)->with('message', 'Data Maintenance Berhasil Dihapus');
    }

  
    public function publish($id)
    {       
        $banegos = Vendor::find($id);
        $banegos->is_published = !$banegos->is_published;
        $banegos->save();  
        return redirect('/vendor');
    }


    public function store(Request $request)
    {
        $name = $request->namaperusahaan;
        $ven = Vendor::where('namaperusahaan',$name)->first();

        if ($ven) {
            return redirect()->back()->with('message', 'Data Sudah Ada');
        }
        else {

            $vendors = new Vendor();
            $vendors->kode = $request->kode;
            $vendors->badanusaha_id = $request->badanusaha_id;
            $vendors->namaperusahaan = $request->namaperusahaan;
            $vendors->alamat = $request->alamat;
            // $vendors->alamat_domisili = $request->alamat_domisili;
            $vendors->provinsi_id = $request->provinsi_id;
            $vendors->product = $request->product;   
            // $vendors->lokasi_id = $request->lokasi_id;              
            $vendors->email = $request->email;
            $vendors->contactperson = $request->contactperson;
            $vendors->notelp = $request->notelp;
            $vendors->handphone = $request->handphone;
            $vendors->npwp = $request->npwp;
            $vendors->alternative_person = $request->alternative_person;
            $vendors->alternative_phone = $request->alternative_phone;
            $vendors->website = $request->website;
            $vendors->catatan = $request->catatan;
            $vendors->save();
            $vendors->categories()->attach($request->categories);
            $vendors->jenisusahas()->attach($request->jenisusahas);
            $vendors->jenispekerjaans()->attach($request->jenispekerjaans);

            \LogActivity::addToLog($vendors->namaperusahaan); 
            return redirect('/vendor')->with('success', 'Data Berhasil Disimpan'  );
        }

           
        
    }


    public function trash()
        {
            $pref = Preference::first();
            $users = Auth::user()->userdetails()->with('menu')->get();
            $menu = Menu::where('link', '/vendor')->first();
            $crud = $users->where('menu_id', $menu->id)->first();
            $vendors = Vendor::onlyTrashed()->orderBy('created_at', 'ASC')->get();
            $cat   = Category::orderBy('kode','ASC')->get();
            $provinsi   = Provinsi::orderBy('name','ASC')->get();
            $jns = Jenisusaha::orderBy('kode','ASC')->get();
            $jpeks = Jenispekerjaan::orderBy('name','ASC')->get();
            $sert = Vendorklasifikasi::orderBy('kode','ASC')->get();
            $lisens = Vendorjenis::orderBy('keterangan','ASC')->get();
        //dd($vendors);
            $menus = Menu::all();
            $badan = Badanusaha::all();
            // $judul = 'Vendor';
            // return view('vendor.index', compact('vendors','judul','users','pref','badan', 'crud', 'cat', 'provinsi', 'jns', 'jpeks', 'sert', 'lisens'));

                // mengampil data guru yang sudah dihapus
            $judul = "Vendor Terhapus";
                // $pref = Preference::first();
                // $vendors = Vendor::onlyTrashed()->get();
            return view('vendor.trash', compact('vendors','judul','users','pref','badan', 'crud', 'cat', 'provinsi', 'jns', 'jpeks', 'sert', 'lisens'));
        }


        public function restore($id)
        {
            $pref = Preference::first();
            $users = Auth::user()->userdetails()->with('menu')->get();
            $menu = Menu::where('link', '/vendor')->first();
            $crud = $users->where('menu_id', $menu->id)->first();
            $vendors = Vendor::onlyTrashed()->where('id', $id);
            $vendors->restore();
            $cat   = Category::orderBy('kode','ASC')->get();
            $provinsi   = Provinsi::orderBy('name','ASC')->get();
            $jns = Jenisusaha::orderBy('kode','ASC')->get();
            $jpeks = Jenispekerjaan::orderBy('name','ASC')->get();
            $sert = Vendorklasifikasi::orderBy('kode','ASC')->get();
            $lisens = Vendorjenis::orderBy('keterangan','ASC')->get();
        //dd($vendors);
            $menus = Menu::all();
            $badan = Badanusaha::all();
            // $judul = 'Vendor';
            // return view('vendor.index', compact('vendors','judul','users','pref','badan', 'crud', 'cat', 'provinsi', 'jns', 'jpeks', 'sert', 'lisens'));

                // mengampil data guru yang sudah dihapus
            $judul = "Vendor Terhapus";
          
                // $pref = Preference::first();
                // $vendors = Vendor::onlyTrashed()->get();
            // return view('vendor.trash', compact('vendors','judul','users','pref','badan', 'crud', 'cat', 'provinsi', 'jns', 'jpeks', 'sert', 'lisens'));

                // $guru = Guru::onlyTrashed();
            
        
                return redirect('/vendor/trash');
        }

        public function deletepermanent($id)
        {
            $pref = Preference::first();
            $users = Auth::user()->userdetails()->with('menu')->get();
            $menu = Menu::where('link', '/vendor')->first();
            $crud = $users->where('menu_id', $menu->id)->first();
            $vendors = Vendor::onlyTrashed()->where('id', $id);
            $cat   = Category::orderBy('kode','ASC')->get();
            $provinsi   = Provinsi::orderBy('name','ASC')->get();
            $jns = Jenisusaha::orderBy('kode','ASC')->get();
            $jpeks = Jenispekerjaan::orderBy('name','ASC')->get();
            $sert = Vendorklasifikasi::orderBy('kode','ASC')->get();
            $lisens = Vendorjenis::orderBy('keterangan','ASC')->get();
        //dd($vendors);
            $menus = Menu::all();
            $badan = Badanusaha::all();
            // $judul = 'Vendor';
            // return view('vendor.index', compact('vendors','judul','users','pref','badan', 'crud', 'cat', 'provinsi', 'jns', 'jpeks', 'sert', 'lisens'));

                // mengampil data guru yang sudah dihapus
            $judul = "Vendor Terhapus";
            $vendors->forceDelete();

                // hapus permanen data guru
                // $guru = Guru::onlyTrashed()->where('id',$id);
                // $guru->forceDelete();
        
                return redirect('/vendor/trash');
        }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
        $judul = 'Show Vendor';
        $menu = Menu::where('link', '/vendor')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        // $vendors = Vendor::with('vendorbod', 'vendorbank')->find($id);
        // $details = $vendors->itemdetails()->first();
        $vendorjenis = Vendorjenis::all();
        $vendorjenisdoc = Vendorjenisdoc::all();
        $vendortipe = Vendortipe::all();
        $currency = Currency::all();
        $bank = Bank::all();
        $vendors = Vendor::with('vendorlisensi', 'vendorbod', 'itemdetails', 'vendorbank', 'vendorpengurus', 'vendorlap', 'vendorsertifikat', 'vendortenaga', 'vendorfasilitas', 'vendorpengalaman', 'vendordoc')->find($id);
        $vendorlisensicount = $vendors->vendorlisensi->count();
        $vendorlisensi = $vendors->vendorlisensi->where('is_published', 0)->count();
        $vendorlisensi1 = $vendors->vendorlisensi->where('is_published', 1)->count();
        $vendorpengurus = $vendors->vendorpengurus->where('is_published', 0)->count();
        $vendorpengurus1 = $vendors->vendorpengurus->where('is_published', 1)->count();
        $vendorlap = $vendors->vendorlap->where('is_published', 0)->count();
        $vendorlap1 = $vendors->vendorlap->where('is_published', 1)->count();
        $vendorsertifikat = $vendors->vendorsertifikat->where('is_published', 0)->count();
        $vendorsertifikat1 = $vendors->vendorsertifikat->where('is_published', 1)->count();
        $vendortenaga = $vendors->vendortenaga->where('is_published', 0)->count();
        $vendortenaga1 = $vendors->vendortenaga->where('is_published', 1)->count();
        $vendorfasilitas = $vendors->vendorfasilitas->where('is_published', 0)->count();
        $vendorfasilitas1 = $vendors->vendorfasilitas->where('is_published', 1)->count();
        $vendorpengalaman = $vendors->vendorpengalaman->where('is_published', 0)->count();
        $vendorpengalaman1 = $vendors->vendorpengalaman->where('is_published', 1)->count();
        $vendordok = $vendors->vendordoc->where('is_published', 0)->count();
        $vendordok1 = $vendors->vendordoc->where('is_published', 1)->count();
        $vendorpenguruscount = $vendors->vendorpengurus->count();
        $vendorlapcount = $vendors->vendorlap->count();
        $vendorsertifikatcount = $vendors->vendorsertifikat->count();
        // dd($vendorlisensi);
        $vendortenagacount = $vendors->vendortenaga->count();
        $vendorfasilitascount = $vendors->vendorfasilitas->count();
        $vendorpengalamancount = $vendors->vendorpengalaman->count();
        $vendordokcount = $vendors->vendordoc->count();
        // dd($details);
 	//$parent = $users->menu->where(['parentmenu' => 0])->get();
        return view('vendor.show', compact('vendors','judul','users', 'crud', 'pref','vendorjenis', 'vendorlisensi', 
        'vendorpengurus','vendorpengurus1','vendorlap', 'vendorlap1', 'vendorsertifikat', 'vendorsertifikat1',
        'vendortenaga', 'vendortenaga1', 'vendorfasilitas', 'vendorfasilitas1', 'vendorpengalaman', 'vendorpengalaman1', 'vendordok', 'vendordok1',
        'vendorlisensi1',  'bank', 'vendortipe', 'vendorjenisdoc', 'currency', 'vendorlisensicount', 
        'vendorpenguruscount', 'vendorlapcount', 'vendorsertifikatcount', 'vendortenagacount', 'vendorfasilitascount', 
        'vendorpengalamancount', 'vendordokcount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
        $judul = 'Edit Vendor';
        $vendors = Vendor::with( 'badanusaha', 'bank')->find($id);
        $details = $vendors->itemdetails()->get();
        $lokasis = Lokasi::orderBy('kode','ASC')->get();
        $badan = Badanusaha::orderBy('kode','ASC')->get();
        $categories = Category::pluck('detail', 'id')->all(); 
        $jenisusahas = Jenisusaha::pluck('detail', 'id')->all(); 
        $provinsi   = Provinsi::orderBy('name','ASC')->get();
        $jenispekerjaans = Jenispekerjaan::pluck('name', 'id')->all(); 
        $bank = Bank::orderBy('name','ASC')->get();
 	//$parent = $users->menu->where(['parentmenu' => 0])->get();
        return view('vendor.edit', compact('vendors','judul', 'provinsi', 'users','pref', 'badan', 'categories', 'jenisusahas','bank', 'details','lokasis', 'jenispekerjaans'));
    }

    public function uploadsimpan(Request $request)
    {
        $file = $request->file('filename');
        // $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = 'VEN_'. date('YmdHis').".".$extension; 
        // $ext = $file->getClientOriginalExtension();
        // $name = $file->getClientOriginalName();
        // $filename = $name.".".$ext; 
        // $filename = $name;
        $tujuan_upload = 'data_file/pdf';
        $file->move($tujuan_upload,$filename);

        $vendorfiles = new Itemdetail;
        $vendorfiles->vendor_id = $request->vendor_id;
        $vendorfiles->filename = $filename;
        $vendorfiles->save();
        \LogActivity::addToLog($vendorfiles->vendor_id); 
        return redirect()->route('vendorindex', ['id' => $vendorfiles->id]);
    }

    public function uploadkontrak(Request $request)
    {
        $file = $request->file('filepdf');
        $extension = $file->getClientOriginalExtension();
        $filename = 'VEN_'. date('YmdHis').".".$extension; 
        // $ext = $file->getClientOriginalExtension();
        // $name = $file->getClientOriginalName();
        // $filename = $name.".".$ext; 
        // $filename = $request->id.$name; 
        $tujuan_upload = 'data_file/pdf';
        $file->move($tujuan_upload,$filename);

        $vendorkontraks = new Vendorkontrak;
        $vendorkontraks->vendor_id = $request->vendor_id;
        $vendorkontraks->name = $request->name;
        $vendorkontraks->pekerjaan = $request->pekerjaan;
        $vendorkontraks->filepdf = $filename;
        $vendorkontraks->save();
        \LogActivity::addToLog($vendorkontraks->vendor_id); 
        return redirect()->route('vendorindex', ['id' => $vendorkontraks->id]);
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

        $vendors = Vendor::where('id','=', $request->id)->first();
        $vendors->kode = $request->kode;
        $vendors->badanusaha_id = $request->badanusaha_id;
        $vendors->namaperusahaan = $request->namaperusahaan;
        $vendors->alamat = $request->alamat;
        // $vendors->alamat_domisili = $request->alamat_domisili;
        $vendors->provinsi_id = $request->provinsi_id;
        $vendors->product = $request->product;   
        // $vendors->lokasi_id = $request->lokasi_id;       
        $vendors->email = $request->email;
        $vendors->contactperson = $request->contactperson;
        $vendors->notelp = $request->notelp;
        $vendors->handphone = $request->handphone;
        $vendors->npwp = $request->npwp;
        $vendors->alternative_person = $request->alternative_person;
        $vendors->alternative_phone = $request->alternative_phone;
        $vendors->website = $request->website;
        $vendors->catatan = $request->catatan;
        $vendors->save();
        $vendors->categories()->sync($request->categories);
        $vendors->jenisusahas()->sync($request->jenisusahas);
        $vendors->jenispekerjaans()->sync($request->jenispekerjaans);

        // if($request->hasfile('filename'))
        // {
        //    foreach ($request->filename as $file) {
               
        //        $name = $file->getClientOriginalName();
        //        $filename = $request->id.$name; 
        //        $tujuan_upload = 'data_file/pdf';
        //        $file->move($tujuan_upload,$filename);

        //        $data = array(
        //            'vendor_id'=>$vendors->id,
        //            'filename'=>$filename
        //        );
        //        Itemdetail::insert($data);
        //    }
        // }
        \LogActivity::addToLog($vendors->namaperusahaan); 
        return redirect('/vendor')->with('success', 'Data Berhasil Diupdate'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Vendor::find($id);
        $data->itemdetails()->delete();
        // $data->vendorbods()->delete();
        $data->vendorbank()->delete();
        $data->vendorlisensi()->delete();
        $data->vendorlap()->delete();
        $data->vendorpengalaman()->delete();
        $data->vendorpengurus()->delete();
        $data->vendorsertifikat()->delete();
        $data->vendortenaga()->delete();
        $data->vendordoc()->delete();
        $data->vendorkontrak()->delete();
        $data->delete($data);

        \LogActivity::addToLog($data->id); 
        return redirect('/vendor')->with('sukses','Data Berhasil di Hapus');
    }

    public function destroyfile($id){
        $data = Itemdetail::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->id); 
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }

    public function destroyfilekontrak($id){
        $data = Vendorkontrak::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->id); 
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }

    public function exportXLS(Request $request) {
    
        return Excel::download(new VendorExport($request), 'vendor-collection.xlsx');
       
    }

    public function exportPDF(Request $request) {
        $start = date('Y-m-d',strtotime($request->start));
        $end = date('Y-m-d',strtotime($request->end));
        $vendors = Vendor::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
    	$pdf = PDF::loadview('vendor.exportpdf', compact('vendors', 'start', 'end'))->setPaper('A4','landscape');
    	return $pdf->stream();
       
    }

    public function cetak($id) {
      
        $vendors = Vendor::find($id);
    	$pdf = PDF::loadview('vendor.cetak', compact('vendors'))->setPaper('A4','portrait');
    	return $pdf->stream();
       
    }

    public function sendemail(Request $request)
    {
        // $emails = new Emailvendor();
        $posts = new Emailvendor();
        $postersemail = $posts->to;
     
        $this->validate($request, [
            'to' => 'required|email',
            'keterangan' => 'required'
            ]);
    
        $data = array(
            'to' => $postersemail,
            'keterangan' => $request->keterangan
            );
    
        Mail::send('vendor.sendmail', $data, function($message) use ($data){
            // $message->from($data['email']);
            $message->to( $data['postersemail'] );
            $message->subject('Informasi Eproc PT IAS Property Indonesia');
        });
    
        dd($data);

        return redirect()->back()->with('success', 'Email berhasil Dikirim');

    }

    public function sendmaillog(Request $request)
    {
        $vendors = new Vendormaillog();
        $vendors->vendor_id = $request->vendor_id ;
        $vendors->name = $request->name ;
        $vendors->deskripsi = $request->deskripsi ;
        $vendors->save();
        \LogActivity::addToLog($vendors->vendor_id); 
        
        Mail::send('vendor.sendmaillog', ['name' => $vendors->name , 'deskripsi' => $vendors->deskripsi], function($message) use($request){
            $message->to($request->email);
            $message->subject($request->name);
        });

        return redirect()->back()->with('success',  ' Email berhasil Dikirim');

    }

    public function certificate($id)
    {
        $judul = 'Certificate';
        $pref = Preference::first();
        $bods = BOD::get();
        $vendors = Vendor::find($id);
        // $bulan = $this->tanggal_local();
        $pdf = PDF::loadView('vendor.certificate',compact('judul', 'pref', 'bods', 'vendors'))->setPaper('A4', 'landscape');
        return $pdf->stream();  
    }

}
