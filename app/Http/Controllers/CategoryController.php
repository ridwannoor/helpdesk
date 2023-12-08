<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Lokasi;
use App\Models\Vendor;
use App\Models\Badanusaha;
use App\Models\Preference;
use App\Models\LogActivity as LogActivityModel;
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/category')->first();
            $crud = $users->where('menu_id', $menu->id)->first();
          //  $parent = $users->menu->where(['parentmenu' => 0])->get();
            $userbrg = Auth::user()->lokasis()->with('barang')->get();
            $pref = Preference::first();
            $lok = Category::all();
            $judul = 'Category';
            return view('category.index', compact('judul','pref','users','userbrg','crud', 'lok')); 
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
        $judul = 'Tambah Category';
        return view('category.add', compact('judul','users','pref','lokasis', 'vendors')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->kode;
        $ven = Category::where('kode',$name)->first();

        if ($ven) {
            return redirect()->back()->with('message', 'Data Sudah Ada');
        }
        else {
            $lok = new Category();
            $lok->kode = $request->kode;
            $lok->detail = $request->detail;
            $lok->save();
            \LogActivity::addToLog($lok->kode);
        return redirect('/category')->with('success', 'Category Berhasil dibuat');
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
        $judul = 'Detail Category';
      //   $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
      //   $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
      //   $brgmaintenances = Barangmaintenance::all();
      //   $brgmutasis = Barangmutasi::all();
        $categories = Category::find($id);
        return view('category.show', compact('categories','users','pref','judul'));
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
         $judul = 'Edit Category';
         $lok = Category::find($id);
         return view('category.edit', compact('lok', 'judul','users','pref'));
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
        $lok = Category::where('id', $request->id)->update([
            'kode' => $request->kode,
            'detail' => $request->detail
        ]);
        \LogActivity::addToLog($lok->kode);
        return redirect('/category')->with('success', 'Category berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->kode);
        return redirect('/category')->with('message', 'Category Berhasil Dihapus');
    }
}
