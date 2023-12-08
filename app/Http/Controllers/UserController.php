<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;
use App\Models\Userdetail;
use App\Models\Lokasi;
use App\Models\Preference;
use Illuminate\Support\Facades\Hash;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Models\LogActivity as LogActivityModel;

class UserController extends Controller
{
    use FormAccessible;
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pref = Preference::first();
        $user = User::with('lokasis')->orderBy('status', 'ASC')->get();
        $users = Auth::user()->userdetails()->with('menu')->get();   
	    $menu = Menu::where('link', '/user')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $judul = 'User';
        return view('user.index', compact('judul','users','user','pref','crud')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        //$parent = $users->menu->where(['parentmenu' => 0])->get();        
	$lokasis = Lokasi::all();
        $judul = 'Add User';
        return view('user.add', compact('judul','lokasis','users','pref')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$file = $request->file('image')) {
            $users = new User();
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->status = $request->status;
            $users->save();
            $users->lokasis()->attach($request->lokasi_id);
            toast('Data User Berhasil Dibuat','success');
            \LogActivity::addToLog($users->name);
            return redirect('/user'); 
        }

        else {
            $file = $request->file('image');
            // $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'USER_'. date('YmdHis').".".$extension; 
            // $ext = $file->getClientOriginalExtension();
            // $name = $file->getClientOriginalName();
            // $filename = $name; 
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);

            $users = new User();
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->image = $filename;
            $users->status = $request->status;
            $users->save();
            $users->lokasis()->attach($request->lokasi_id);
            toast('Data User Berhasil Dibuat','success');
            \LogActivity::addToLog($users->name);
            return redirect('/user'); 
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
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $judul = 'Show User';
        $user = User::with('userdetails')->find($id);
        $menus = Menu::orderBy('deskripsi', 'ASC')->get();
        $lokasis = Lokasi::all();
        $userdetails = Userdetail::all();
        return view('user.show', compact('judul','users','user','menus','lokasis','userdetails','pref'));
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
        //$parent = $users->menu->where(['parentmenu' => 0])->get();
        $user = User::find($id);
        // $lokasis = Lokasi::all();
        $judul = 'Edit User';
        $lokasis = Lokasi::pluck('kode', 'id')->all();    
        return view('/user/edit', compact('users','user', 'judul','lokasis','pref'));
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
        if (!$file = $request->file('image')) {
            $users = User::where('id', $request->id)->first();
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->status = $request->status;
            $users->save();
            $users->lokasis()->sync($request->lokasis);
            toast('Data User Berhasil Diperbarui','success');
            \LogActivity::addToLog($users->name);
            return redirect('/user'); 
        }

        else {
            $file = $request->file('image');
            // $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'USER_'. date('YmdHis').".".$extension; 
            // $ext = $file->getClientOriginalExtension();
            // $name = $file->getClientOriginalName();
            // $filename = $name; 
            // $filename = $request->id.time().".".$ext; 
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);

            $users = User::where('id', $request->id)->first();
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->image = $filename;
            $users->status = $request->status;
            $users->save();
            $users->lokasis()->sync($request->lokasis);
            toast('Data User Berhasil Diperbarui','success');
            \LogActivity::addToLog($users->name);
            return redirect('/user'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        
        $data->lokasis()->detach();
        $data->userdetails()->delete();
        // dd($data);
        // $users->lokasis()->attach($request->lokasi_id);
        $data->delete($data);
        \LogActivity::addToLog($data->name);
        toast('Data User Berhasil Dihapus','success');
        return redirect('/user');
    }

    public function jobdestroy($id)
    {
        $data = Userdetail::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->id);
        toast('Data Job User Berhasil Dihapus','success');
        return redirect()->back();
    }

    public function jobstore(Request $request)
    {
       $id = $request->id;
       $user = User::where('id', $id)->first();
       $userjob = $user->userdetails ;
       $menu = $request->menu_id;
       $menus = $userjob->where('menu_id', $menu)->first();

       if ($menus) {
        toast('Data User Sudah Ada','warning');
        return redirect()->back();  
       }
       else {
           
        $userdetails = new Userdetail();
        $userdetails->user_id = $request->id;
        $userdetails->menu_id = $request->menu_id;
        $userdetails->create = $request->create;
        $userdetails->edit = $request->edit;
        $userdetails->destroy = $request->destroy;
        $userdetails->show = $request->show;
        $userdetails->cetak = $request->cetak;
        $userdetails->publish = $request->publish;
        $userdetails->approval = $request->approval;
        // dd($userdetails);
        $userdetails->save();     
        \LogActivity::addToLog($userdetails->user_id);   
        toast('Data Job User Berhasil Dibuat','success');
        return redirect()->back();
       }   
          
    }

    public function exportPDF(Request $request) {
        $start = date('Y-m-d',strtotime($request->start));
        $end = date('Y-m-d',strtotime($request->end));
        $users = User::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
    	$pdf = PDF::loadview('user.exportpdf', compact('users', 'start', 'end'))->setPaper('A4','landscape');
    	return $pdf->stream();
       
    }
}
