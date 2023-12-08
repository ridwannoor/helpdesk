<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Preference;
use App\Models\Menu;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use App\Models\LogActivity as LogActivityModel;

class PreferenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
     //   $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $sliders = Slider::all();
        // dd($preferences);
        $judul = 'Preference';
        return view('preference.index', compact('judul','pref','users','sliders'));
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
    public function storeslider(Request $request)
    {
        if (!$file = $request->file('image')){
            $sliders = new Slider();
            $sliders->title = $request->title;
            $sliders->deskripsi = $request->deskripsi;
            $sliders->save();
    
            return redirect()->back()->with('message', 'Data berhasil di Buat');
        }
       
        else
        {
            $file = $request->file('image');
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'GEN_'. date('YmdHis').".".$extension; 
            // $ext = $file->getClientOriginalExtension();
            // $filename = $request->id.time().".".$ext; 
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);


            // $gens->image = $filename;
            $sliders = new Slider();
            $sliders->title = $request->title;
            $sliders->deskripsi = $request->deskripsi;
            $sliders->image = $filename;
          
            $sliders->save();

            return redirect()->back()->with('message', 'Data berhasil di Buat');
        
        }
    }

    public function updateslider(Request $request)
    {
        if (!$file = $request->file('image')) {
            Slider::where('id','=', $request->id)
            ->update([
                'title' => $request->title,
                'deskripsi' => $request->deskripsi
            ]);
            return redirect()->back()->with('message', 'Data berhasil di Perbarui');
        }
        else {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = $request->id.time().".".$ext; 
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);
            // $gens->image = $filename;
            Slider::where('id','=', $request->id)
            ->update([
                'title' => $request->title,
                'deskripsi' => $request->deskripsi,
                'image' => $filename
            ]);
            return redirect()->back()->with('message', 'Data berhasil di Perbarui');
        }        
    }

    public function destroyslider($id)
    {
        $data = Slider::find($id);
        $data->delete($data);
        
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
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
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $item = Preference::find($id);
        $judul = 'Edit Preference';
        return view('preference.edit', compact('judul','users','item', 'pref'));
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
            
            $file1 = $request->file('logo');
            $ext = $file1->getClientOriginalExtension();
            $filename1 = $request->id.time().".".$ext; 
            $tujuan_upload = 'data_file';
            $file1->move($tujuan_upload,$filename1);

            Preference::where('id','=', $request->id)
            ->update([
                'nama_perusahaan' => $request->nama_perusahaan,
                'email' => $request->email,
                'address' => $request->address,
                'logo' => $filename1,
                'phone' => $request->phone
            ]);
            return redirect('/preference')->with('success','Data Berhasil di Simpan');
        }
        elseif(!$file = $request->file('logo'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = $request->id.time().".".$ext; 
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);

            Preference::where('id','=', $request->id)
            ->update([
                'nama_perusahaan' => $request->nama_perusahaan,
                'email' => $request->email,
                'address' => $request->address,
                'image' => $filename,
                'phone' => $request->phone
            ]);
            return redirect('/preference')->with('success','Data Berhasil di Simpan');
        }
        elseif(!$file = $request->file('image') AND !$file = $request->file('logo'))
        {
            $sliders = new Slider();
            $sliders->title = $request->title;
            $sliders->deskripsi = $request->deskripsi;
            $sliders->save();    
            return redirect()->back()->with('message', 'Data berhasil di Buat');
        }
        else {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = $request->id.time().".".$ext; 
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);
            
            $file1 = $request->file('logo');
            $ext = $file1->getClientOriginalExtension();
            $filename1 = $request->id.time().".".$ext; 
            $tujuan_upload = 'data_file';
            $file1->move($tujuan_upload,$filename1);

            // $gens->image = $filename;
            Preference::where('id','=', $request->id)
            ->update([
                'nama_perusahaan' => $request->nama_perusahaan,
                'email' => $request->email,
                'address' => $request->address,
                'image' => $filename,
                'logo' => $filename1,
                'phone' => $request->phone
            ]);
            return redirect('/preference')->with('success','Data Berhasil di Simpan');
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
