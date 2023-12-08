<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Divisi;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Lokasi;
use App\Models\Vendor;
use App\Models\Badanusaha;
use App\Models\Preference;
use App\Models\Bank;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\LogActivity as LogActivityModel;

class BankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
            $users = Auth::user()->userdetails()->with('menu')->get();   
            $menu = Menu::where('link', '/bank')->first();
            $crud = $users->where('menu_id', $menu->id)->first();
          //  $parent = $users->menu->where(['parentmenu' => 0])->get();
            $userbrg = Auth::user()->lokasis()->with('barang')->get();
            $pref = Preference::first();
            $lok = Bank::orderBy('code', 'ASC')->get();
            $judul = 'Bank';
            return view('bank.index', compact('judul','pref','users','userbrg','crud', 'lok')); 
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
        $judul = 'Tambah Bank';
        return view('bank.add', compact('judul','users','pref','lokasis', 'vendors')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->code;
        $ven = Bank::where('code',$name)->first();

        if ($ven) {
            return redirect()->back()->with('message', 'Data Sudah Ada');
        }
        else {
            $lok = new Bank();
            $lok->code = $request->code;
            $lok->name = $request->name;
            $lok->save();
            toast('Bank Berhasil Dibuat','success');
            \LogActivity::addToLog($lok->name);
        return redirect('/bank');
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
          $judul = 'Detail Bank';
          $banks = Bank::find($id);
          return view('bank.show', compact('banks','users','pref','judul'));
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
        $pref = Preference::first();
         $judul = 'Edit Bank';
         $lok = Bank::find($id);
       
         return view('bank.edit', compact('lok', 'judul','users','pref'));
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
        $lok = Bank::where('id', $request->id)->update([
            'code' => $request->code,
            'name' => $request->name
        ]);
        \LogActivity::addToLog($lok->name);
        toast('Bank Berhasil Diperbarui','success');
        return redirect('/bank');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Divisi::where('id',$id)->delete();
        $data = Bank::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->name);
        toast('Bank Berhasil Dihapus','success');
        return redirect('/bank');
    }
}
