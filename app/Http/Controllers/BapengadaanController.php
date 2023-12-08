<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Lokasi;
use App\Models\Vendor;
use App\Models\Divisi;
use App\Models\Jenispekerjaan;
use App\Models\Jeniskontrak;
// use App\Models\Formpengadaan;
use App\Models\Preference;
use App\Models\Pengadaan\Bapengadaan\Badetailpengadaan;
use App\Models\Pengadaan\Bapengadaan\Bapengadaan;
use App\Models\Pengadaan\Bapengadaan\Bafilepengadaan;
use App\Models\Pengadaan\Bapengadaan\Bapertanyaan;
use PDF;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BapengadaanExport;
use App\Models\LogActivity as LogActivityModel;

class BapengadaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
            $users = Auth::user()->userdetails()->with('menu')->get();   
            $menu = Menu::where('link', '/bapengadaan')->first();
            $crud = $users->where('menu_id', $menu->id)->first();
          //  $parent = $users->menu->where(['parentmenu' => 0])->get();
            $userbrg = Auth::user()->lokasis()->with('barang')->get();
            $pref = Preference::first();
            $ba = Bapengadaan::with('divisis', 'vendors')->get();
            $judul = 'BA Aanwizing';
            return view('pengadaan.bapengadaan.index', compact('judul','pref','users','userbrg','crud', 'ba')); 
    }

    public function create()
    {
        $loks = Lokasi::all();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        $users = Auth::user()->userdetails()->with('menu')->get();           
        // $noUrutAkhir = $this->GenerateNumber();
       // $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pref = Preference::first();
        $divisis = Divisi::orderBy('kode', 'ASC')->get();
        // $fps = Formpengadaan::orderBy('nomor', 'ASC')->get();
        // $doks = Dokpekerjaan::orderBy('detail', 'ASC')->get();
        $judul = 'Tambah BA Aanwizing';
        return view('pengadaan.bapengadaan.add', compact('judul','users','pref','loks', 'vendors', 'divisis')); 
    }

    public function store(Request $request)
    {
        $nomor_ba = $request->nomor_ba;
        $ven = Bapengadaan::where('nomor_ba',$nomor_ba)->first();

        if ($ven) {
            return redirect()->back()->with('message', 'Data Sudah Ada');
        }
        else {
            $bapengadaans = new Bapengadaan();
            $bapengadaans->nomor_ba = $request->nomor_ba ;
            $bapengadaans->tanggal = $request->tanggal;
            $bapengadaans->lokasi_id = $request->lokasi_id;
            $bapengadaans->lokasi_nego = $request->lokasi_nego;
            $bapengadaans->judul_pekerjaan = $request->judul_pekerjaan;
            $bapengadaans->tgl_penawaran = $request->tgl_penawaran;
            $bapengadaans->save();
            $bapengadaans->divisis()->attach($request->divisi_id);
            $bapengadaans->vendors()->attach($request->vendor_id);

            
            foreach ($request->dokumen as $key => $v) {
                $data =Badetailpengadaan::Insert( array(
                    'bapengadaan_id'=>$bapengadaans->id,
                    'dokumen'=>$v,
                    'sebelum'=>$request->sebelum [$key],
                    'menjadi'=>$request->menjadi [$key],
                ));
            }
            
            foreach ($request->pertanyaan as $key => $v) {
                $data1 =Bapertanyaan::Insert( array(
                    'bapengadaan_id'=>$bapengadaans->id,
                    'pertanyaan'=>$v,
                    'jawaban'=>$request->jawaban [$key]
                ));
            }
            \LogActivity::addToLog($bapengadaans->nomor_ba);
        return redirect('/bapengadaan')->with('success', 'BA Aanwizing Berhasil dibuat');
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
        $menu = Menu::where('link', '/bapengadaan')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        // $userbrg = Auth::user()->lokasis()->with('barang')->get();
        $pref = Preference::first();
        $ba = Bapengadaan::with('divisis', 'vendors')->find($id);
        $divisis = Divisi::orderBy('kode', 'ASC')->get();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        $judul = 'BA Aanwizing';
        return view('pengadaan.bapengadaan.show', compact('judul','pref','users','crud', 'ba', 'divisis')); 
    }

    public function edit($id)
    {
        $users = Auth::user()->userdetails()->with('menu')->get();   
        $pref = Preference::first();
         $judul = 'Edit BA Aanwizing';
         $loks = Lokasi::all();
         $ba = Bapengadaan::with('vendors', 'divisis')->find($id);
         $vendors = Vendor::pluck('namaperusahaan', 'id')->all();    
         $divisis = Divisi::pluck('kode', 'id')->all();    
         return view('pengadaan.bapengadaan.edit', compact('ba', 'judul','users','pref', 'vendors', 'divisis', 'loks'));
    }

    public function update(Request $request)
    {
            $bapengadaans = Bapengadaan::where('id', $request->id)->first();
            $bapengadaans->nomor_ba = $request->nomor_ba ;
            $bapengadaans->tanggal = $request->tanggal;
            $bapengadaans->lokasi_id = $request->lokasi_id;
            $bapengadaans->lokasi_nego = $request->lokasi_nego;
            $bapengadaans->judul_pekerjaan = $request->judul_pekerjaan;
            $bapengadaans->tgl_penawaran = $request->tgl_penawaran;
            $bapengadaans->save();
            $bapengadaans->divisis()->sync($request->divisis);
            $bapengadaans->vendors()->sync($request->vendors);

            $id = $request->id;
            $dodet = $bapengadaans::with('badetailpengadaans', 'bapertanyaans')->find($id);        
            $dodet->update($request->toArray());
            $dodet->badetailpengadaans()->delete();
            $dodet->bapertanyaans()->delete();

         
            foreach ($request->dokumen as $key => $v) {
                $data =Badetailpengadaan::Insert( array(
                    'bapengadaan_id'=>$bapengadaans->id,
                    'dokumen'=>$v,
                    'sebelum'=>$request->sebelum [$key],
                    'menjadi'=>$request->menjadi [$key],
                ));
            }
            
            foreach ($request->pertanyaan as $key => $v) {
                $data1 =Bapertanyaan::Insert( array(
                    'bapengadaan_id'=>$bapengadaans->id,
                    'pertanyaan'=>$v,
                    'jawaban'=>$request->jawaban [$key]
                ));
            }
            \LogActivity::addToLog($bapengadaans->nomor_ba);
        return redirect('/bapengadaan')->with('success', 'BA Aanwizing Berhasil diperbarui');
    }

    public function publish($id)
    {       
        $bapengadaans = Bapengadaan::find($id);
        $bapengadaans->is_published = !$bapengadaans->is_published;
        $bapengadaans->save();  
        return redirect('/bapengadaan');
    }

    public function exportXLS(Request $request) {
    
        return Excel::download(new BapengadaanExport, 'bapengadaan.xlsx');
       
    }

    public function destroy($id)
    {
        $data = Bapengadaan::with('vendors', 'divisis')->find($id);
        // $data->banegopengadaan()->delete();
        $data->badetailpengadaans()->delete();
        $data->bafilepengadaans()->delete();
        $data->bapertanyaans()->delete();
        $data->delete($data);
        \LogActivity::addToLog($data->nomor_ba);
        return redirect('/bapengadaan')->with('message', 'Bapengadaan Berhasil Dihapus');
    }

    public function destroyfile($id){
        $data = Bafilepengadaan::with('vendors', 'divisis')->find($id);
        $data->delete($data);
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }

    public function upload($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();   
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();      
        $bapengadaans = Bapengadaan::with('vendors', 'divisis')->find($id);
        // $bods = Bod::all();
        $judul = 'Upload File BA Aanwizing';
        $preferences = Preference::all();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        return view('pengadaan.bapengadaan.upload', compact('bapengadaans','judul', 'pref','lokasis','vendors','users', 'preferences'));
    }
    
    public function simpanupload(Request $request){
        $bapengadaans = Bapengadaan::where('id','=', $request->id)->first();
        $bapengadaans->nomor_ba = $request->nomor_ba;
        // dd($bapengadaans);
        $bapengadaans->save();
        
   
        if($request->hasfile('filepdf'))
        {
           foreach ($request->filepdf as $file) {
            $name = $file->getClientOriginalName();
            // $filename = $request->id.$name; 
            $extension = $file->getClientOriginalExtension();
            $filename = 'BAP_'. date('YmdHis').".".$extension; 
            $tujuan_upload = 'data_file/pdf';
            $file->move($tujuan_upload,$filename);
           $data = array(
                   'bapengadaan_id'=>$bapengadaans->id,
                   'filepdf'=>$filename
               );
               Bafilepengadaan::insert($data);
           }
        }
        \LogActivity::addToLog($bapengadaans->nomor_ba);
        return redirect('/bapengadaan')->with('success', 'Data Berhasil Diperbarui');
    }

    public function cetak($id)
    {
         $users = Auth::user()->userdetails()->with('menu')->get();   
        $menu = Menu::where('link', '/bapengadaan')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
        //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $userbrg = Auth::user()->lokasis()->with('barang')->get();
        $pref = Preference::find(1);
        $bapengadaans = Bapengadaan::with('bafilepengadaans', 'bapertanyaans', 'divisis', 'vendors')->find($id);
        $vendors = Vendor::pluck('namaperusahaan', 'id')->all();    
         $divisis = Divisi::pluck('kode', 'id')->all();    
        $judul = 'BA Aanwizing';
        // $bulan = $this->tanggal_local();
        $pdf = PDF::loadView('pengadaan.bapengadaan.cetak',compact('judul','pref','users','userbrg','crud', 'bapengadaans', 'divisis', 'vendors'));
        return $pdf->stream();    
    }

}
