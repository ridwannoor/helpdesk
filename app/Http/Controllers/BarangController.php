<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Barangmaintenance;
use App\Models\Barangmutasi;
use App\Models\Barangdetail;
use App\Models\Tipemaintenance;
use App\Models\Preference;
use App\Models\Lokasi;
use App\Models\Vendor;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BarangExport;
use PDF;
use App\Models\LogActivity as LogActivityModel;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
	    $menu = Menu::where('link', '/barang')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        $brgs = Barang::with('barangmutasi')->orderBy('tgl_pembelian', 'DESC')->get();
        $pref = Preference::first();
        $judul = 'Barang';
        return view('barang.index', compact('judul','pref','users','brgs','crud')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $pref = Preference::first();
        $judul = 'Add Barang';
        return view('barang.add', compact('judul','users','pref','lokasis', 'vendors')); 
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
                $brg = new Barang();
                $brg->nama_brg = $request->nama_brg;
                $brg->aset_tag = $request->aset_tag;
                $brg->serial = $request->serial;
                $brg->asset_id = $request->asset_id;
                $brg->start_date = $request->start_date;
                $brg->end_date = $request->end_date;
                $brg->merk = $request->merk;
                $brg->tipe = $request->tipe;
                $brg->category = $request->category;
                $brg->kondisi = $request->kondisi;
                $brg->vendor_id = $request->vendor_id;
                $brg->lokasi_id = $request->lokasi_id;
                $brg->tgl_pembelian = $request->tgl_pembelian;
                $brg->catatan = $request->catatan;                
                $brg->save();

                \LogActivity::addToLog($brg->nama_brg);
                return redirect('/barang')->with('success', 'Data berhasil disimpan .. !!');
            } else {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = 'BRG_'. date('YmdHis').".".$extension; 
                $tujuan_upload = 'data_file';
                $file->move($tujuan_upload,$filename);

                $brg = new Barang();
                $brg->nama_brg = $request->nama_brg;
                $brg->asset_id = $request->asset_id;
                $brg->start_date = $request->start_date;
                $brg->end_date = $request->end_date;
                $brg->aset_tag = $request->aset_tag;
                $brg->serial = $request->serial;
                $brg->lokasi_id = $request->lokasi_id;
                $brg->merk = $request->merk;
                $brg->tipe = $request->tipe;
                $brg->category = $request->category;
                $brg->kondisi = $request->kondisi;
                $brg->vendor_id = $request->vendor_id;
                $brg->tgl_pembelian = $request->tgl_pembelian;
                $brg->image = $filename;
                $brg->catatan = $request->catatan;                
                $brg->save();

                \LogActivity::addToLog($brg->nama_brg);
                return redirect('/barang')->with('success', 'Data berhasil disimpan .. !!');
            }
        // }
        // return redirect('/barang')->with('success', "Barang Berhasil dibuat, $brg->nama_brg");
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
        //  $parent = $users->menu->where(['parentmenu' => 0])->get();
          $pref = Preference::first();
          $judul = 'Detail Barang';
          $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
          $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        //   $brgmaintenances = Barangmaintenance::orderBy('created_at', 'Desc')->get();
        //   $brgmutasis = Barangmutasi::orderBy('created_at', 'Desc')->get();
          $brg = Barang::with('barangmutasi', 'barangmaintenance')->find($id);
          return view('barang.show', compact('brg', 'judul','users','pref','lokasis','vendors' ));
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
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $judul = 'Edit Barang';
        $lokasis = Lokasi::all();
        $vendors = Vendor::all();
        $brg = Barang::find($id);
        return view('barang.edit', compact('brg', 'judul','users','pref','lokasis','vendors'));
    }

    public function upload($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();      
        $barangs = Barang::find($id);
        // $bods = Bod::all();
        $judul = 'Upload File Barang';
        $preferences = Preference::all();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        return view('barang.upload', compact('barangs','judul', 'pref','lokasis','vendors','users', 'preferences'));
    }

    public function barangupload(Request $request){
        $barangs = Barang::where('id','=', $request->id)->first();
        $barangs->nama_brg = $request->nama_brg;
        $barangs->save();
        
   
        if($request->hasfile('filename'))
        {
           foreach ($request->filename as $file) {
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $filename = 'BRG_'. date('YmdHis').".".$extension; 
            // $filename = $request->id.$name; 
            $tujuan_upload = 'data_file/pdf';
            $file->move($tujuan_upload,$filename);
           $data = array(
                   'barang_id'=>$barangs->id,
                   'filename'=>$filename
               );
               Barangdetail::insert($data);
           }
        }
        \LogActivity::addToLog($barangs->nama_brg);
        return redirect('/barang')->with('success', 'Data Berhasil Diperbarui');
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
            $brg = Barang::where('id', $request->id)->first();
            $brg->nama_brg = $request->nama_brg;
            $brg->aset_tag = $request->aset_tag;
            $brg->serial = $request->serial;
            $brg->asset_id = $request->asset_id;
            $brg->start_date = $request->start_date;
            $brg->end_date = $request->end_date;
            $brg->lokasi_id = $request->lokasi_id;
            $brg->merk = $request->merk;
            $brg->tipe = $request->tipe;
            $brg->category = $request->category;
            $brg->kondisi = $request->kondisi;
            $brg->vendor_id = $request->vendor_id;
            $brg->tgl_pembelian = $request->tgl_pembelian;
            // $brg->image = $filename;
            $brg->catatan = $request->catatan;                
            $brg->save();

            \LogActivity::addToLog($brg->nama_brg);
            return redirect('/barang')->with('success', 'Barang berhasil di update');
        } else {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'BRG_'. date('YmdHis').".".$extension; 
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);
            
            $brg = Barang::where('id', $request->id)->first();
            $brg->nama_brg = $request->nama_brg;
            $brg->aset_tag = $request->aset_tag;
            $brg->asset_id = $request->asset_id;
            $brg->start_date = $request->start_date;
            $brg->end_date = $request->end_date;
            $brg->serial = $request->serial;
            $brg->lokasi_id = $request->lokasi_id;
            $brg->merk = $request->merk;
            $brg->category = $request->category;
            $brg->tipe = $request->tipe;
            $brg->kondisi = $request->kondisi;
            $brg->vendor_id = $request->vendor_id;
            $brg->tgl_pembelian = $request->tgl_pembelian;
            $brg->image = $filename;
            $brg->catatan = $request->catatan;                
            $brg->save();

            \LogActivity::addToLog($brg->nama_brg);
            return redirect('/barang')->with('success', 'Barang berhasil di update');
        }
        

        
    }

    // public function publish($id)
    // {       
    //     $barangs = Barang::find($id);
    //     $barangs->is_published = !$barangs->is_published;
    //     $barangs->save();  
    //     return redirect('/barang');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Barang::find($id);
	    $data->barangmaintenance()->delete();
        $data->barangmutasi()->delete();        
        $data->barangdetail()->delete();
        $data->delete($data);
        \LogActivity::addToLog($data->nama_brg);
        return redirect('/barang')->with('message', 'Barang Berhasil Dihapus');
    }

    public function addmaintenance($id)
    {
        $lokasis = Lokasi::all();
        $vendors = Vendor::all();
        $tipes = Tipemaintenance::all();
        $users = Auth::user()->userdetails()->with('menu')->get();   
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $brg = Barang::find($id);
        // $judul = 'Add Barang';
        $judul = 'Add Maintenance Barang' ;
        return view('barang.addmaintenance', compact('brg', 'tipes', 'judul','users','pref','lokasis','vendors'));

    }

    public function storemaintenance(Request $request)
    {
        $brgmaintenance = new Barangmaintenance();
        $brgmaintenance->barang_id = $request->id;
        $brgmaintenance->vendor_id = $request->vendor_id;
        $brgmaintenance->tipemaintenance_id = $request->tipemaintenance_id;
        $brgmaintenance->title = $request->title;
        $brgmaintenance->start_date = $request->start_date;
        $brgmaintenance->complete_date = $request->complete_date;
        $brgmaintenance->biaya = $request->biaya;
        $brgmaintenance->catatan = $request->catatan;
        $brgmaintenance->save();

        \LogActivity::addToLog($brgmaintenance->barang->nama_brg);
        return redirect('/barang')->with('success', 'Data berhasil disimpan .. !!');
    }

    public function editmaintenance($id)
    {
        $lokasis = Lokasi::all();
        $vendors = Vendor::all();
        $tipes = Tipemaintenance::all();
        $users = Auth::user()->userdetails()->with('menu')->get();   
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $brgmaintenances = Barangmaintenance::find($id);
        // $brg = Barang::find($id);
        // $judul = 'Add Barang';
        $judul = 'Edit Maintenance Barang' ;
        return view('barang.editmaintenance', compact('brgmaintenances', 'tipes', 'judul','users','pref','lokasis','vendors'));

    }

    public function updatemaintenance(Request $request)
    {
        $brgmaintenance = Barangmaintenance::where('id','=', $request->id)->first();
        $brgmaintenance->barang_id = $request->barang_id;
        $brgmaintenance->vendor_id = $request->vendor_id;
        $brgmaintenance->tipemaintenance_id = $request->tipemaintenance_id;
        $brgmaintenance->title = $request->title;
        $brgmaintenance->start_date = $request->start_date;
        $brgmaintenance->complete_date = $request->complete_date;
        $brgmaintenance->biaya = $request->biaya;
        $brgmaintenance->catatan = $request->catatan;
        $brgmaintenance->save();

        \LogActivity::addToLog($brgmaintenance->barang->nama_brg);
        return redirect('/barang')->with('success', 'Data berhasil disimpan .. !!');        
    }

    public function destroymaintenance($id)
    {
        $data = Barangmaintenance::find($id);
        $data->delete($data);

        \LogActivity::addToLog($data->barang->nama_brg);
        return redirect('/barang')->with('message', 'Data Maintenance Berhasil Dihapus');
    }

    public function mutasi($id)
    {
        $lokasis = Lokasi::all();
        $vendors = Vendor::all();
        $users = Auth::user()->userdetails()->with('menu')->get();   
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $brg = Barang::find($id);
        // $judul = 'Add Barang';
        $judul = 'Mutasi Barang' ;
        return view('barang.mutasi', compact('brg', 'judul','users','pref','lokasis','vendors'));
    }

    public function editmutasi($id)
    {
        $lokasis = Lokasi::all();
        $vendors = Vendor::all();
        $users = Auth::user()->userdetails()->with('menu')->get();   
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $brgmutasis = Barangmutasi::find($id);
        // $brg = Barang::find($id);
        // $judul = 'Add Barang';
        $judul = 'Edit Mutasi Barang' ;
        return view('barang.editmutasi', compact('brgmutasis', 'judul','users','pref','lokasis','vendors'));

    }


    public function storemutasi(Request $request)
    {
        if (!$file = $request->file('image')) { 
            $brgmutasi = new Barangmutasi ();
            $brgmutasi->barang_id = $request->id;
            $brgmutasi->lokasi_id = $request->lokasi_id;
            $brgmutasi->checkout_date = $request->checkout_date;
            $brgmutasi->expected_checkin_date = $request->expected_checkin_date;
            $brgmutasi->catatan = $request->catatan;                
            $brgmutasi->save();
          
            \LogActivity::addToLog($brgmutasi->barang->nama_brg);
            return redirect('/barang')->with('success', 'Barang Mutasi berhasil di simmpan');
        } else {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'BRG_'. date('YmdHis').".".$extension; 
            // $ext = $file->getClientOriginalExtension();
            // $filename = $request->id.time().".".$ext; 
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);
            $brgmutasi = new Barangmutasi ();
            $brgmutasi->barang_id = $request->id;
            $brgmutasi->lokasi_id = $request->lokasi_id;
            $brgmutasi->checkout_date = $request->checkout_date;
            $brgmutasi->expected_checkin_date = $request->expected_checkin_date;
            $brgmutasi->catatan = $request->catatan;         
            $brgmutasi->image = $filename;           
            $brgmutasi->save();

            \LogActivity::addToLog($brgmutasi->barang->nama_brg);
            return redirect('/barang')->with('success', 'Barang Mutasi berhasil di simpan');     
        }
    }

    public function updatemutasi(Request $request)
    {
        if (!$file = $request->file('image')) { 
            $brgmutasi = Barangmutasi::where('id','=', $request->id)->first();
            $brgmutasi->barang_id = $request->barang_id;
            $brgmutasi->lokasi_id = $request->lokasi_id;
            $brgmutasi->checkout_date = $request->checkout_date;
            $brgmutasi->expected_checkin_date = $request->expected_checkin_date;
            $brgmutasi->catatan = $request->catatan;                
            $brgmutasi->save();

            \LogActivity::addToLog($brgmutasi->barang->nama_brg);
            return redirect('/barang')->with('success', 'Barang Mutasi berhasil di simmpan');
        } else {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'BRG_'. date('YmdHis').".".$extension; 
            // $ext = $file->getClientOriginalExtension();
            // $filename = $request->id.time().".".$ext; 
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$filename);
            $brgmutasi =  Barangmutasi::where('id','=', $request->id)->first();
            $brgmutasi->barang_id = $request->barang_id;
            $brgmutasi->lokasi_id = $request->lokasi_id;
            $brgmutasi->checkout_date = $request->checkout_date;
            $brgmutasi->expected_checkin_date = $request->expected_checkin_date;
            $brgmutasi->catatan = $request->catatan;         
            $brgmutasi->image = $filename;           
            $brgmutasi->save();

            \LogActivity::addToLog($brgmutasi->barang->nama_brg);
            return redirect('/barang')->with('success', 'Barang Mutasi berhasil di simpan');     
        }
    }

    public function destroyfile($id){
        $data = Barangdetail::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->id);
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }

    public function destroymutasi($id)
    {
        $data = Barangmutasi::find($id);
        $data->delete($data);
        \LogActivity::addToLog($data->id);
        return redirect('/barang')->with('message', 'Data mutasi Berhasil Dihapus');
    }

    public function exportXLS() {
    
        return Excel::download(new BarangExport, 'barang-collection.xlsx');
       
    }

    public function exportPDF() {
    
        $barangs = Barang::with('barangmutasi', 'barangmaintenance', 'barangdetail')->get(); 
    	$pdf = PDF::loadview('barang.exportpdf', compact('barangs'))->setPaper('A4','landscape');
    	return $pdf->stream();
       
    }

    public function cetak($id)
    {
         $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/barang')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $userbrg = Auth::user()->lokasis()->with('barang')->get();
        $pref = Preference::find(1);
        $barangs = Barang::with('barangmutasi', 'barangdetail', 'lokasi', 'vendor')->find($id);
        // $divisis = Divisi::all();
        $judul = 'Cetak Barang';
        // $bulan = $this->tanggal_local();
        $pdf = PDF::loadView('barang.cetak',compact('judul','pref','users','userbrg','crud', 'barangs'));
        return $pdf->stream();    
    }

    public function rekap($id)
    {
         $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/barang')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $userbrg = Auth::user()->lokasis()->with('barang')->get();
        $pref = Preference::find(1);
        $barangs = Barang::with('barangmutasi', 'barangdetail', 'lokasi', 'vendor')->find($id);
        // $divisis = Divisi::all();
        $judul = 'Cetak Barang';
        // $bulan = $this->tanggal_local();
        $pdf = PDF::loadView('barang.rekap',compact('judul','pref','users','userbrg','crud', 'barangs'));
        return $pdf->stream();    
    }
}
