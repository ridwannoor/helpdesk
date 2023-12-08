<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orderlist\Orderheader;
use App\Models\Orderlist\Orderdetail;
use App\Models\Hargabarang;
use App\Models\Preference;
use App\Models\Lokasi;
use App\Models\Vendor;
use App\Models\Po\Rekappo;
use App\Models\Banego;
use App\Models\Menu;
use App\Models\User;
use App\Models\Orderlist\Shoppingcart;
use Carbon;
use PDF;
use Illuminate\Support\Facades\Auth;
use Overtrue\LaravelShoppingCart\Item;
use Illuminate\Support\Collection;
use Mail;
use App\Models\LogActivity as LogActivityModel;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
	    $menu = Menu::where('link', '/orderlist')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $pref = Preference::first();
        $brgs = Hargabarang::select('nama_brg')->groupBy('nama_brg')->paginate(20);
        $carts = Auth::user()->shoppingcart()->get();
        $counts = $carts->sum('qty');
        $judul = 'Order List';
        return view('order.index1', compact('judul','pref','users','crud', 'brgs','counts')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lokasis = Lokasi::all();
        $brgs = Hargabarang::orderBy('nama_brg','ASC')->get();
        $users = Auth::user()->userdetails()->with('menu')->get();   
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $judul = 'Add Order';
        return view('order.add', compact('judul','users','pref','lokasis', 'brgs')); 
    }

    public function detail(Request $request)
    {
        $pref = Preference::first();
        $cari = $request->nama_brg;
        $brgs = Hargabarang::where('nama_brg', 'LIKE', "%".$cari."%")->get();
        $groups = $brgs->groupBy('nama_brg');
        $carts = Auth::user()->shoppingcart()->get();
        $counts = $carts->sum('qty');

        $judul = 'Order List';
        $judul1 = 'Order List Detail';
        // dd($groups);
        
        $users = Auth::user()->userdetails()->with('menu')->get();   
        return view('order.detail', compact('brgs', 'judul', 'pref','users', 'groups', 'judul1', 'carts', 'counts'));
          
    }

    
    public function search(Request $request)
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
	    $menu = Menu::where('link', '/orderlist')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        // $orders = Orderheader::with('orderdetail','lokasi', 'barang')->get();
        $pref = Preference::first();
        $judul = 'Order List';
        $carts = Shoppingcart::count();
        $cari = $request->nama_brg;
        $brgs = Hargabarang::where('nama_brg', 'LIKE', "%".$cari."%")->paginate(16);
        $carts = Auth::user()->shoppingcart()->get();
        $counts = $carts->sum('qty');
        return view('order.search', compact('judul','pref','users','crud', 'brgs', 'carts','counts')); 


    }

    public function GenerateNumber(){
        $AWAL = 'LOG-ORDER';
        // karna array dimulai dari 0 maka kita tambah di awal data kosong
        // bisa juga mulai dari "1"=>"I"
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $noUrutAkhir = Orderheader::count('no_order');
        $no = 1;
        if($noUrutAkhir) {
            $noUrutAkhir = sprintf("%03s", abs($noUrutAkhir + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
        }
        else {
            $noUrutAkhir = sprintf("%03s", $no). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
        }
        
        return $noUrutAkhir;
    }

    public function cart()
    {
        $ldate = Carbon\Carbon::now();;
        $lokasis = Lokasi::all();
        $brgs = Hargabarang::orderBy('nama_brg','ASC')->get();
        $users = Auth::user()->userdetails()->with('menu')->get();  
        $noUrutAkhir = $this->GenerateNumber(); 
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $judul = 'Cart Order';
        $carts = Auth::user()->shoppingcart()->get();
        $counts = $carts->sum('qty');

        // dd($carts);
        return view('order.cart', compact('judul','users','pref','lokasis', 'brgs', 'ldate', 'counts', 'noUrutAkhir', 'carts')); 
    }
    
    public function cartdetail()
    {
        $ldate = Carbon\Carbon::now();;
        $lokasis = Lokasi::all();
        $brgs = Hargabarang::orderBy('nama_brg','ASC')->get();
        $users = Auth::user()->userdetails()->with('menu')->get();  
        $noUrutAkhir = $this->GenerateNumber(); 
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $judul = 'Cart Order Detail';
        $carts = Auth::user()->shoppingcart()->get();
        // dd($carts);
        $counts = $carts->sum('qty');
        return view('order.cartdetail', compact('judul','users','pref','lokasis', 'brgs', 'ldate', 'counts', 'noUrutAkhir', 'carts')); 
    

    }


    public function downloadpdf($id)
    {

        $carts = Orderheader::with('orderdetails')->find($id);
        $pref = Preference::first();        
        $pdf = PDF::loadview('order.cetakcart', compact('carts', 'pref'));
        return $pdf->stream();
    }

    public function cartstore(Request $request)
    {
        // $pref = Preference::first();
        $nama_per = $request->nama_perusahaan;
        $email = $request->email;

        $carts = new Orderheader();
        $carts->no_order = $request->no_order;
        $carts->tanggal = date("Y-m-d", strtotime($request->tanggal));
        // dd($carts);
        $carts->save();
        // dd($carts);
        if ($carts) {
            foreach ($request->hargabarang_id as $key => $v) {
                $data = array(
                    'orderheader_id'=>$carts->id,
                    'hargabarang_id'=>$v,
                    'qty'=>$request->qty [$key],
		            'harga'=>$request->harga [$key],
                    'subtotal'=>$request->subtotal [$key],
                    'user_id'=>$request->user_id [$key]
                );
                // dd($data);
                Orderdetail::insert($data);
            }
        }
        
        // $ecarts = $this->downloadpdf;

        $sendmail = Mail::send('order.emailcart', ['request'=>$request], function ($message)use($request) {
            $message->from('logistik@approperti.co.id');
            $message->to($request->emailto);
            $message->subject('Subject');
            // $message->attach('ecarts');

            // $message->file();
        });
        // dd($sendmail);
        
        $shoppingcarts = Auth::user()->shoppingcart()->delete();
        
        return redirect()->back()->with('success','data berhasil disimpan');
    }

    public function updatecart(Request $request)
    {

        $shopp = Shoppingcart::where('id', $request->id)->update([
            'qty' => $request->qty
        ]);

        // dd($shopp);
        return redirect()->back()->with('success', 'Berhasil Menghapus Item ..');
    }

    public function removecart($id)
    {
        $data = Shoppingcart::find($id);
        $data->delete($data);
        return redirect()->back()->with('success', 'Berhasil Menghapus Item ..');
    }

    public function addtocart(Request $request)
    {
        // $total = 0 ;
        $qty = $request->qty;
        $harga = $request->harga;
        $name = $request->id ; 
        $shoppers = Shoppingcart::where('hargabarang_id', $name)->first();
        // dd($shoppers);

        if ($shoppers) {
            // $shoppers = Shoppingcart::where('hargabarang_id', $name)->first();
            // $shoppers->qty = $qty + $item->qty ; 
            return redirect()->back()->with('success', 'Existing Data');
        }
        else {
            $cart = new Shoppingcart();
            $cart->hargabarang_id = $request->id;
            $cart->qty = $request->qty;
            $cart->save();

            return redirect('/orderlist')->with('success', 'Add to Cart');
        }
   
    }

    public function addtocart1(Request $request)
    {
        // $total = 0 ;
        $qty = $request->qty;
        $harga = $request->harga;
        $name = $request->id ; 
        $shoppers = Shoppingcart::where('hargabarang_id', $name)->first();
        // dd($shoppers);

        if ($shoppers) {
            // $shoppers = Shoppingcart::where('hargabarang_id', $name)->first();
            // $shoppers->qty = $qty + $item->qty ; 
            return redirect()->back()->with('success', 'Existing Data');
        }
        else {
            $cart = new Shoppingcart();
            $cart->hargabarang_id = $request->id;
            $cart->qty = $request->qty;
            $cart->save();

            return redirect('/orderlist')->with('success', 'Add to Cart');
        }
   
    }
    
    public function cartlistshow($id)
    {
        $brgs = Hargabarang::orderBy('nama_brg','ASC')->get();
        $users = Auth::user()->userdetails()->with('menu')->get();  
        $noUrutAkhir = $this->GenerateNumber(); 
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $judul = 'Cart List Show';
        $carts = Orderheader::find($id);
        // $details = $carts->orderdetail();
        // dd($carts);
        // $counts = $carts->sum('qty');

        // dd($carts);
        return view('user.profile.cartdetail', compact('judul','users','pref', 'brgs',   'noUrutAkhir', 'carts')); 
         
    }

    public function cartlist()
    {
        // $ldate = Carbon\Carbon::now();;
        $lokasis = Lokasi::all();
        $brgs = Hargabarang::orderBy('nama_brg','ASC')->get();
        $users = Auth::user()->userdetails()->with('menu')->get();  
        $noUrutAkhir = $this->GenerateNumber(); 
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $judul = 'Cart List';
        $carts = Auth::user()->orderheaders()->get();
        // $details = $carts->orderdetails()->get();
        // dd($carts);
        // $counts = $carts->sum('qty');

        // dd($carts);
        return view('user.profile.cartlist', compact('judul','users','pref','lokasis', 'brgs',   'noUrutAkhir', 'carts')); 
            
    }

    public function history($id)
    {
        // $ldate = Carbon\Carbon::now();;
        $lokasis = Lokasi::all();
        // $brgs = Hargabarang::orderBy('nama_brg','ASC')->get();
        $users = Auth::user()->userdetails()->with('menu')->get();  
        // $noUrutAkhir = $this->GenerateNumber(); 
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $judul = 'History';
        $historys = Auth::user()->find($id);
        $logs = LogActivityModel::Orderby('created_at', 'DESC')->get();
        // $details = $carts->orderdetails()->get();
        // dd($logs);
        // $counts = $carts->sum('qty');

        // dd($carts);
        return view('user.profile.history', compact('judul','users','pref','lokasis', 'historys', 'logs')); 
            
    }

    public function historysearch(Request $request, $id)
    {
        // $ldate = Carbon\Carbon::now();;
        $lokasis = Lokasi::all();
        // $brgs = Hargabarang::orderBy('nama_brg','ASC')->get();
        $users = Auth::user()->userdetails()->with('menu')->get();  
        // $noUrutAkhir = $this->GenerateNumber(); 
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $judul = 'History';
        $historys = Auth::user()->find($id);
        $start = date('Y-m-d',strtotime($request->start));
        $end = date('Y-m-d',strtotime($request->end));
        $banegos = Auth::user()->banego()->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->count();
        $rekapos = Auth::user()->rekappos()->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->count();
        $doheaders = Auth::user()->doheaders()->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->count();
        $pumheaders = Auth::user()->pumheaders()->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->count();
        $pjpumheaders = Auth::user()->pjpumheaders()->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->count();
        $baadendumheaders = Auth::user()->baadendumheaders()->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->count();
        $banegopengadaans = Auth::user()->banegopengadaans()->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->count();
        $spkheaders = Auth::user()->spkheaders()->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->count();
        $sppheaders = Auth::user()->sppheaders()->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->count();
        // $rekapos = Rekappo::with('user')->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
        // $details = $carts->orderdetails()->get();
        // dd($banegos);
        // $counts = $carts->sum('qty');
        $logs = LogActivityModel::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->Orderby('created_at', 'DESC')->get();
        // dd($carts);
        return view('user.profile.historysearch', compact('judul','users','pref','lokasis',  'banegos', 'rekapos', 'logs', 'doheaders', 'pumheaders', 'pjpumheaders', 'baadendumheaders', 'banegopengadaans', 'spkheaders', 'sppheaders')); 
            
    }
  
   

}
