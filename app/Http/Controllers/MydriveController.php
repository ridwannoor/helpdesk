<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preference;
use App\Models\Lokasi;
use App\Models\Vendor;
use App\Models\Menu;
use App\Models\User;
use App\Models\MyDrive;
use App\Models\Mydrivecategory;
use Illuminate\Support\Facades\Auth;
use App\Models\LogActivity as LogActivityModel;

class MydriveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {        
        $users = Auth::user()->userdetails()->with('menu')->get();   
	    $menu = Menu::where('link', '/mydrive')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $pref = Preference::first();
        $drives = MyDrive::orderBy('created_at', 'DESC')->get();
        $cats = Mydrivecategory::orderBy('title', 'DESC')->get();
        // $carts = Auth::user()->shoppingcart()->get();
        // $counts = $carts->sum('qty');
        $judul = 'My Drive';
        return view('mydrive.index', compact('judul','pref','users','crud', 'drives', 'cats')); 
    }

    public function store(Request $request)
    {
        if (!$file = $request->file('file')) {
            // $name = $file->getClientOriginalName();
            // $filename = $request->id.$name; 
            // $tujuan_upload = 'data_file/my_drive';
            // $file->move($tujuan_upload,$filename);

            $drives = new MyDrive();
            $drives->title = $request->title;
            $drives->mydrivecategory_id = $request->mydrivecategory_id;
            $drives->image = $request->image;
            $drives->save();

            \LogActivity::addToLog($drives->title);
            // dd('log insert successfully.');

            return redirect('/mydrive')->with('success', 'Data berhasil disimpan .. !!');
        }
        else {
            // $cat = $request->mydrivecategory_id ;
            // dd($cat);

            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $filename = 'DRV_'. date('YmdHis').".".$extension; 
            // dd($filename);
            $tujuan_upload = 'data_file/my_drive';
            $file->move($tujuan_upload,$filename);

            $drives = new MyDrive();
            $drives->title = $request->title;
            $drives->file = $filename;
            $drives->mydrivecategory_id = $request->mydrivecategory_id;
            $drives->image = $request->image;
            $drives->save();

            \LogActivity::addToLog($drives->title);
            // dd($drives); 

            return redirect('/mydrive')->with('success', 'Data berhasil disimpan .. !!');
        }
      
    }

    public function edit($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $judul = 'Edit Drive';
        $drives = MyDrive::find($id);
        $cats = Mydrivecategory::orderBy('title', 'DESC')->get();
        return view('mydrive.edit', compact('drives', 'judul','users','pref', 'cats'));
    }

    public function update(Request $request)
    {
        if (!$file = $request->file('file')) {
            // $name = $file->getClientOriginalName();
            // $filename = $request->id.$name; 
            // $tujuan_upload = 'data_file/my_drive';
            // $file->move($tujuan_upload,$filename);

            $drives = MyDrive::where('id','=', $request->id)->first();
            $drives->title = $request->title;
            // $drives->file = $filename;
            $drives->mydrivecategory_id = $request->mydrivecategory_id;
            $drives->image = $request->image;
            $drives->save();

            \LogActivity::addToLog($drives->title);
            
            return redirect('/mydrive')->with('success', 'Data berhasil disimpan .. !!');
        }
        else {
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $filename = 'DRV_'. date('YmdHis').".".$extension; 
            $tujuan_upload = 'data_file/my_drive';
            $file->move($tujuan_upload,$filename);
            $drives = MyDrive::where('id','=', $request->id)->first();
            $drives->title = $request->title;
            $drives->file = $filename;
            $drives->mydrivecategory_id = $request->mydrivecategory_id;
            $drives->image = $request->image;
            $drives->save();

            \LogActivity::addToLog($drives->title);

            return redirect('/mydrive')->with('success', 'Data berhasil disimpan .. !!');
        }
      
    }

    public function destroy($id)
    {
        $data = MyDrive::find($id);
        $data->delete($data);
          \LogActivity::addToLog($data->title);
          
        return redirect('/mydrive')->with('message', 'Drive Berhasil Dihapus');
    }

    public function download($id)
    {
        $data = MyDrive::find($id);
        // $data->delete($data);
        // return redirect('/mydrive')->with('message', 'Drive Berhasil Dihapus');
    }
}
