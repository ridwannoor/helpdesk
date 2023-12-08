<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preference;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Menu;
use App\Models\Userdetail;
use App\Models\Lokasi;
use Illuminate\Support\Facades\Hash;
use App\Models\LogActivity as LogActivityModel;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
      
        $judul = 'Profile';
        return view('user.profile.index', compact('judul','pref','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
            // $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->save();
            // $users->lokasis()->sync($request->lokasis);
            \LogActivity::addToLog($users->name);
            return redirect('/user/profile')->with('success', 'Data Berhasil Disimpan'); 
        }

        else {
            $file = $request->file('image');
            // $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'PRO_'. date('YmdHis').".".$extension; 
            // $ext = $file->getClientOriginalExtension();
            // $filename = $request->id.time().".".$ext; 
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);

            $users = User::where('id', $request->id)->first();
            $users->name = $request->name;
            // $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->image = $filename;
            $users->save();
            // $users->lokasis()->sync($request->lokasis);
            \LogActivity::addToLog($users->name);
            return redirect('/user/profile')->with('success', 'Data Berhasil Disimpan'); 
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
        //
    }
}
