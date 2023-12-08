<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Lokasi;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Jenisusaha;
use App\Models\Badanusaha;
use App\Models\Vendordoc;
use App\Models\Vendorjenis;
use App\Models\Vendorlisensi;
use App\Models\Vendorfasilitas;
use App\Models\Vendorsertifikat;
use App\Models\Vendorpengalaman;
use App\Models\Vendorpengalamanfile;

class ProfilepengalamanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:vendor');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'file' => 'mimes:pdf|max:10240'
        // ]);

        // if (!$file = $request->file('file')) 
        // {
            $vendors = new Vendorpengalaman;
            $vendors->vendor_id = $request->vendor_id;  
            $vendors->nama_pek = $request->nama_pek;
            $vendors->vendorklasifikasi_id = $request->vendorklasifikasi_id;
            $vendors->no_kontrak = $request->no_kontrak;
            $vendors->tgl_kontrak = $request->tgl_kontrak;
            $vendors->owner = $request->owner;           
            $vendors->lokasi = $request->lokasi;
            $vendors->nilai = $request->nilai;
            $vendors->tgl_selesai = $request->tgl_selesai;
            $vendors->tgl_bast = $request->tgl_bast;
            // $vendors->file = $filename;
            $vendors->save();

            if($request->hasfile('file'))
            {
               foreach ($request->file as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = 'PROFPENG_'. date('YmdHis').".".$extension; 
                // $name = $file->getClientOriginalName();
                // $filename = $request->id.$name; 
                $tujuan_upload = 'data_file/profile/doc';
                $file->move($tujuan_upload,$filename);
               $data = array(
                       'vendorpengalaman_id'=>$vendors->id,
                       'file'=>$filename
                   );
                   Vendorpengalamanfile::insert($data);
               }
            }
            // dd($vendors);

            return redirect()->back()->with('success', $vendors->nama_pek . ' Data Berhasil di Buat');
        
        // }
        // else
        // {
            // $file = $request->file('file');
            // $ext = $file->getClientOriginalExtension();
            // $filename = $request->id.time().".".$ext; 
            // $tujuan_upload = 'data_file/profile/doc';
            // $file->move($tujuan_upload,$filename);

            // $vendors = new Vendorpengalaman;
            // $vendors->vendor_id = $request->vendor_id;  
            // $vendors->nama_pek = $request->nama_pek;
            // $vendors->vendorklasifikasi_id = $request->vendorklasifikasi_id;
            // $vendors->no_kontrak = $request->no_kontrak;
            // $vendors->tgl_kontrak = $request->tgl_kontrak;
            // $vendors->owner = $request->owner;
           
            // $vendors->lokasi = $request->lokasi;
            // $vendors->nilai = $request->nilai;
            // $vendors->tgl_selesai = $request->tgl_selesai;
            // $vendors->tgl_bast = $request->tgl_bast;
            // $vendors->file = $filename;
            // $vendors->save();
            // return redirect()->back()->with('success', 'Data Berhasil di Buat');
        
        // }
        
        // return view('back.profile.index', compact('pref', 'judul'));
    }

    public function update(Request $request)
    {
        // $request->validate([
        //     'file' => 'mimes:pdf|max:10240'
        // ]);
            // if (!$file = $request->file('file')) 
            // {
                $vendors = Vendorpengalaman::where('id', $request->id)->first();
                $vendors->vendor_id = $request->vendor_id;
                $vendors->nama_pek = $request->nama_pek;
                $vendors->vendorklasifikasi_id = $request->vendorklasifikasi_id;
                $vendors->no_kontrak = $request->no_kontrak;
                $vendors->tgl_kontrak = $request->tgl_kontrak;
                $vendors->owner = $request->owner;               
                $vendors->lokasi = $request->lokasi;
                $vendors->nilai = $request->nilai;
                $vendors->tgl_selesai = $request->tgl_selesai;
                $vendors->tgl_bast = $request->tgl_bast;
                // $vendors->file = $filename;
                $vendors->save();
                
                if($request->hasfile('file'))
                {
                   foreach ($request->file as $file) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = 'PROFPENG_'. date('YmdHis').".".$extension; 
                    // $name = $file->getClientOriginalName();
                    // $filename = $request->id.$name; 
                    $tujuan_upload = 'data_file/profile/doc';
                    $file->move($tujuan_upload,$filename);
                   $data = array(
                           'vendorpengalaman_id'=>$vendors->id,
                           'file'=>$filename
                       );
                       Vendorpengalamanfile::insert($data);
                   }
                }
//  dd($vendors);
            
                return redirect()->back()->with('success', $vendors->nama_pek . ' Data Berhasil di Update');
            // }
            // else
            // {
            //     $file = $request->file('file');
            //     $ext = $file->getClientOriginalExtension();
            //     $filename = $request->id.time().".".$ext; 
            //     $tujuan_upload = 'data_file/profile/doc';
            //     $file->move($tujuan_upload,$filename);
    
                
            //     $vendors = Vendorpengalaman::where('id', $request->id)->first();
            //     $vendors->vendor_id = $request->vendor_id;
            //     $vendors->nama_pek = $request->nama_pek;
            //     $vendors->vendorklasifikasi_id = $request->vendorklasifikasi_id;
            //     $vendors->no_kontrak = $request->no_kontrak;
            //     $vendors->tgl_kontrak = $request->tgl_kontrak;
            //     $vendors->owner = $request->owner;
               
            //     $vendors->lokasi = $request->lokasi;
            //     $vendors->nilai = $request->nilai;
            //     $vendors->tgl_selesai = $request->tgl_selesai;
            //     $vendors->tgl_bast = $request->tgl_bast;
            //     $vendors->file = $filename;
            //     $vendors->save();
                
            //     return redirect()->back()->with('success', 'Data Berhasil di Update');
            // }

           
        
        // return view('back.profile.index', compact('pref', 'judul'));
    }

    // public function show($id)
    // {
    //     $data = Vendorlisensi::find($id);
 	   
    // }

    public function destroy($id)
    {
        $data = Vendorpengalaman::find($id);
 	    $data->vendorpengalamanfile()->delete();
        $data->delete($data);
        return redirect()->back();
    }

    public function destroyfile($id){
        $data = Vendorpengalamanfile::find($id);
        $data->delete($data);
        return redirect()->back()->with('message',  ' Data berhasil Dihapus');
    }
}
