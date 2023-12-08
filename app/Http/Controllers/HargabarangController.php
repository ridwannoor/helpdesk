<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hargabarang;
use App\Models\Preference;
// use App\Events\HargabarangWasCreated;
use App\Models\Lokasi;
use App\Models\Hargalist;
use App\Models\Vendor;
use App\Models\Menu;
use App\Models\Hbdetail;
use App\Models\Currency;
use App\Models\LogActivity as LogActivityModel;
use Illuminate\Support\Facades\Auth;

class HargabarangController extends Controller
{
    
    public function search(Request $request)
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
	    $menu = Menu::where('link', '/hargabarang')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $lokasis = Lokasi::all();
        // $menu = $request->menu_id;
        // $userhargabrg = Auth::user()->lokasis()->with('hargabarang')->get();
        // $g = $users->where('menu_id',  $menu)->first();
        // dd($menu);
        $vendors = Vendor::all();
        // $hargabrgs = Hargabarang::with('hargalist')->get();
        // $hargabrgs = Hargabarang::with('hargalist')->get();
    //    dd($hargabrgs);
        $pref = Preference::first();
        $judul = 'Barang Material';

        $hargabrgs = Hargabarang::Where('nama_brg', 'LIKE',  "%$request->nama_brg%")
        ->orWhere('lokasi_id', 'LIKE', "%$request->lokasi_id%")
        ->orWhere('vendor_id', 'LIKE', "%$request->vendor_id%")
        ->get();

        // $hargabrgs = Hargabarang::all()->filter(function )

       
        // if ($request->nama_brg) {
        //     $hargabrgs = $hargabrgs->where('nama_brg', 'LIKE', "%". $request->nama_brg . "%");
        //     // collect($array)->where('nama_brg', 'LIKE', "%". $request->nama_brg . "%")->all();
        // }

        // if ($request->lokasi_id) {
        //     $hargabrgs = $hargabrgs->where('lokasi_id', 'LIKE', "%". $request->lokasi_id . "%");
        // }

        // if ($request->vendor_id) {
        //     $hargabrgs = $hargabrgs->where('vendor_id', 'LIKE', "%". $request->vendor_id . "%");
        // }

        // $hargabrgs = $hargabrgs->all();
        // dd( $hargabrgs);
        return view('hargabarang.search', compact('judul','pref','users','hargabrgs','lokasis', 'vendors', 'crud'));
    }

    public function index(Request $request)
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/hargabarang')->first();
        $crud = $users->where('menu_id', $menu->id)->first();

      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $lokasis = Lokasi::orderBy('kode','ASC')->get();
        // $menu = $request->menu_id;
        // $userhargabrg = Auth::user()->lokasis()->with('hargabarang')->get();
        // $g = $users->where('menu_id',  $menu)->first();
        // dd($menu);
        $vendors = Vendor::orderBy('namaperusahaan','ASC')->get();
        $hargabrgs = Hargabarang::orderBy('nama_brg', 'ASC')->get();
        $currencies = Currency::orderBy('name', 'ASC')->get();
        // $hargabrgs = Hargabarang::with('hargalist')->get();
    //    dd($hargabrgs);
        $pref = Preference::first();
        $judul = 'Barang Material';
        return view('hargabarang.index', compact('judul','pref','users','hargabrgs','lokasis', 'vendors', 'crud', 'currencies')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lokasis = Lokasi::orderBy('kode','ASC')->get();
        $vendors = Vendor::orderBy('namaperusahaan','ASC')->get();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $currencies = Currency::orderBy('name', 'ASC')->get();
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $judul = 'Add List Barang';
        return view('hargabarang.add', compact('judul','users','pref','lokasis', 'vendors', 'currencies')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->nama_brg as $key => $v) {
           

            $hargabarang = new Hargabarang();
            // $hargabarang->nama_brg = $content[$v];
            $hargabarang->nama_brg = $v;
            $hargabarang->qty = $request->qty[$key];
            $hargabarang->satuan = $request->satuan[$key];
            $hargabarang->currency_id = $request->currency_id[$key];
            $hargabarang->harga_lama = $request->harga[$key];
            $hargabarang->harga = $request->harga[$key];
            $hargabarang->lokasi_id = $request->lokasi_id;
            $hargabarang->vendor_id = $request->vendor_id;
            $hargabarang->save();
            \LogActivity::addToLog($hargabarang->nama_brg);
            // event(new HargabarangWasCreated($hargabarang));
        }

       
        toast('Data Barang Berhasil Dibuat','success');
    // }
    return redirect('/hargabarang');
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
        $judul = 'Detail Barang Material';
       
      //   $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
      //   $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
      //   $brgmaintenances = Barangmaintenance::all();
      //   $brgmutasis = Barangmutasi::all();
        $hargabarangs = Hargabarang::with('hbdetails')->find($id);
        // $hbdetails = Hbdetail::with();
        return view('hargabarang.show', compact('hargabarangs', 'users', 'pref', 'judul'  ));
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
        $judul = 'Edit Harga Barang';
        $lokasis = Lokasi::orderBy('kode','ASC')->get();
        $vendors = Vendor::orderBy('namaperusahaan','ASC')->get();
        $hargabarangs = Hargabarang::find($id);
        $currencies = Currency::orderBy('name', 'ASC')->get();
        return view('hargabarang.edit', compact('hargabarangs', 'judul','users','pref','lokasis','vendors', 'currencies'));
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
            $content = $request->nama_brg;
            // $content1 = $request->catatan;
            $dom = new \DomDocument();
            @$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $imageFile = $dom->getElementsByTagName('imageFile');
      
            foreach($imageFile as $item => $image){
                $data = $img->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $imgeData = base64_decode($data);
                $image_name= 'upload_file' . time().$item.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $imgeData);
                
                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);
             }
      
            $content = $dom->saveHTML();


            $hargabarang = Hargabarang::where('id', $request->id)->first();
            // $hargabarang->nama_brg = $content[$v];
            $hargabarang->nama_brg = $content;
            $hargabarang->qty = $request->qty;
            $hargabarang->satuan = $request->satuan;
            $hargabarang->currency_id = $request->currency_id;
            $hargabarang->harga_lama = $request->harga_lama;
            $hargabarang->harga = $request->harga;
            $hargabarang->lokasi_id = $request->lokasi_id;
            $hargabarang->vendor_id = $request->vendor_id;
            $hargabarang->save();

            // $hargabarang = Hargabarang::where('id', $request->id)->update([
            //     'nama_brg' => $content,
            //     // 'qty' => $request->qty,
            //     'satuan' => $request->satuan,
            //     'currency_id' => $request->currency_id,
            //     'harga_lama' => $request->harga_lama,
            //     'harga' => $request->harga,
            //     'lokasi_id' => $request->lokasi_id,
            //     'vendor_id' => $request->vendor_id
            // ]);
            \LogActivity::addToLog($content);
            toast('Data Barang Berhasil Diperbarui','success');
            return redirect('/hargabarang');
        }
        else {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = $request->id.time().".".$ext; 
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);

            $content = $request->nama_brg;
            // $content1 = $request->catatan;
            $dom = new \DomDocument();
            @$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $imageFile = $dom->getElementsByTagName('imageFile');
      
            foreach($imageFile as $item => $image){
                $data = $img->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $imgeData = base64_decode($data);
                $image_name= 'upload_file' . time().$item.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $imgeData);
                
                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);
             }
      
            $content = $dom->saveHTML();

            $hargabarang = Hargabarang::where('id', $request->id)->first();
            // $hargabarang->nama_brg = $content[$v];
            $hargabarang->nama_brg = $content;
            $hargabarang->qty = $request->qty;
            $hargabarang->satuan = $request->satuan;
            $hargabarang->currency_id = $request->currency_id;
            $hargabarang->harga_lama = $request->harga_lama;
            $hargabarang->harga = $request->harga;
            $hargabarang->lokasi_id = $request->lokasi_id;
            $hargabarang->vendor_id = $request->vendor_id;
            $hargabarang->save();

            // $hargabarang = Hargabarang::where('id', $request->id)->update([
            //     'nama_brg' => $content,
            //     // 'qty' => $request->qty,
            //     'satuan' => $request->satuan,
            //     'currency_id' => $request->currency_id,
            //     'harga_lama' => $request->harga_lama,
            //     'harga' => $request->harga,
            //     'image' => $filename,
            //     'lokasi_id' => $request->lokasi_id,
            //     'vendor_id' => $request->vendor_id
            // ]);
            \LogActivity::addToLog($content);
            toast('Data Barang Berhasil Diperbarui','success');
            return redirect('/hargabarang');
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
        $data = Hargabarang::find($id);
        $data->hargalist()->delete();
        $data->delete($data);
        \LogActivity::addToLog($data->nama_brg);
        toast('Data Barang Berhasil Dihapus','success');
        return redirect('hargabarang');
        // return redirect('/hargabarang')->with('message', "Barang Berhasil Dihapus, $data->nama_brg");
    }

    public function publish($id)
    {       
        $hbdetails = Hbdetail::find($id);
        $hbdetails->status = !$hbdetails->status;
        $hbdetails->save();  
        \LogActivity::addToLog($hbdetails->status);
        return redirect('/hargabarang');
    }
}
