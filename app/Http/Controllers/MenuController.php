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

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/menu')->first();
        // $menuList = $menu->tree();
        $crud = $users->where('menu_id', $menu->id)->first();
        //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $userbrg = Auth::user()->lokasis()->with('barang')->get();
        $pref = Preference::first();
        $lok = Menu::orderBy('parent_id', 'ASC')->get();
        $judul = 'Menu';
        return view('menu.index', compact('judul','pref','users','userbrg','crud', 'lok')); 
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
        // dd($parent);
        $pref = Preference::first();
        $judul = 'Tambah Menu';
        return view('menu.add', compact('judul','users','pref','lokasis', 'vendors')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->deskripsi;
        $ven = Menu::where('deskripsi',$name)->first();

        if ($ven) {
            return redirect()->back()->with('message', 'Data Sudah Ada');
        }
        else {

            $menus = new Menu();
            $menus->parent_id = $request->parent_id;
            $menus->deskripsi = $request->deskripsi;
            $menus->icon = $request->icon;
            $menus->link = $request->link;
            $menus->save();
            \LogActivity::addToLog($menus->deskripsi);
            return redirect('/menu')->with('success', 'Data Berhasil Disimpan'  );
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
        $users = Auth::user()->userdetails()->with('menu')->get();   
        // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
         $judul = 'Edit Menu';
         $lok = Menu::find($id);
         return view('menu.edit', compact('lok', 'judul','users','pref'));
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
        $lok = Menu::where('id','=', $request->id)->first();
        $lok->parent_id = $request->parent_id;
        $lok->deskripsi = $request->deskripsi;
        $lok->icon = $request->icon;
        $lok->link = $request->link;       
        $lok->save();

        \LogActivity::addToLog($lok->deskripsi);
        return redirect('/menu')->with('success', 'Menu berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Menu::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->deskripsi);
        return redirect('/menu')->with('message', 'Menu Berhasil Dihapus');
    }

    public function createsub()
    {
        $lokasis = Lokasi::all();
        $vendors = Vendor::all();
        $users = Auth::user()->userdetails()->with('menu')->get();         
        // dd($parent);
        $pref = Preference::first();
        $judul = 'Tambah Menu';
        return view('menu.addmenu', compact('judul','users','pref','lokasis', 'vendors')); 
    }

   
    public function storesub(Request $request)
    {
        $name = $request->deskripsi;
        $ven = Menu::where('deskripsi',$name)->first();

        if ($ven) {
            return redirect()->back()->with('message', 'Data Sudah Ada');
        }
        else {

            $menus = new Menu();
            $menus->parent_id = $request->parent_id;
            $menus->deskripsi = $request->deskripsi;
            $menus->icon = $request->icon;
            $menus->link = $request->link;
            $menus->save();
            \LogActivity::addToLog($menus->deskripsi);
            return redirect('/menu')->with('success', 'Data Berhasil Disimpan'  );
        }
    }

    public function editsub($id)
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
         $judul = 'Edit Menu';
         $lok = Menu::find($id);
         return view('menu.editsub', compact('lok', 'judul','users','pref'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatesub(Request $request)
    {
        $lok = Menu::where('id', $request->id)->update([
            'parent_id' => $request->parent_id,
            'deskripsi' => $request->deskripsi,
            'icon' => $request->icon,
            'link' => $request->link
        ]);
        \LogActivity::addToLog($lok->deskripsi);
        return redirect('/menu')->with('success', 'Menu berhasil di update');
    }


}
