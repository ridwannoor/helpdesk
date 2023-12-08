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

class ProfilefasilitasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:vendor');
    }

    public function store(Request $request)
    {
            $request->validate([
                'file' => 'mimes:pdf|max:10240'
            ]);

            if (!$file = $request->file('file')) 
            {
                $vendors = new Vendorfasilitas;
                $vendors->vendor_id = $request->vendor_id;  
                $vendors->lokasi = $request->lokasi;
                $vendors->kepemilikan = $request->kepemilikan;
                $vendors->nama = $request->nama;
                $vendors->spesifikasi = $request->spesifikasi;
                $vendors->jumlah = $request->jumlah;
                $vendors->thn_pembuatan = $request->thn_pembuatan;
                // $vendors->file = $filename;
                $vendors->save();
                return redirect()->back()->with('success',  $vendors->nama . ' Data Berhasil di Buat');
            }
            else
            {
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $filename = 'PROFAS_'. date('YmdHis').".".$extension; 
                // $ext = $file->getClientOriginalExtension();
                // $filename = $request->id.time().".".$ext; 
                $tujuan_upload = 'data_file/profile/doc';
                $file->move($tujuan_upload,$filename);
    
                $vendors = new Vendorfasilitas;
                $vendors->vendor_id = $request->vendor_id;  
                $vendors->lokasi = $request->lokasi;
                $vendors->kepemilikan = $request->kepemilikan;
                $vendors->nama = $request->nama;
                $vendors->spesifikasi = $request->spesifikasi;
                $vendors->jumlah = $request->jumlah;
                $vendors->thn_pembuatan = $request->thn_pembuatan;
                $vendors->file = $filename;
                $vendors->save();
                return redirect()->back()->with('success',  $vendors->nama . ' Data Berhasil di Buat');
            }
        
        
        // return view('back.profile.index', compact('pref', 'judul'));
    }

    public function update(Request $request)
    {
            $request->validate([
                'file' => 'mimes:pdf|max:10240'
            ]); 
            if (!$file = $request->file('file')) 
            {
                $vendors = Vendorfasilitas::where('id', $request->id)->first();
                $vendors->vendor_id = $request->vendor_id;
                $vendors->lokasi = $request->lokasi;
                $vendors->kepemilikan = $request->kepemilikan;
                $vendors->nama = $request->nama;
                $vendors->spesifikasi = $request->spesifikasi;
                $vendors->jumlah = $request->jumlah;
                $vendors->thn_pembuatan = $request->thn_pembuatan;
                // $vendors->file = $filename;
                $vendors->save();
                
                return redirect()->back()->with('success',  $vendors->nama . ' Data Berhasil di Update');
            }
            else
            {
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $filename = 'PROFAS_'. date('YmdHis').".".$extension; 
                // $ext = $file->getClientOriginalExtension();
                // $filename = $request->id.time().".".$ext; 
                $tujuan_upload = 'data_file/profile/doc';
                $file->move($tujuan_upload,$filename);
    
                $vendors = Vendorfasilitas::where('id', $request->id)->first();
                $vendors->vendor_id = $request->vendor_id;
                $vendors->lokasi = $request->lokasi;
                $vendors->kepemilikan = $request->kepemilikan;
                $vendors->nama = $request->nama;
                $vendors->spesifikasi = $request->spesifikasi;
                $vendors->jumlah = $request->jumlah;
                $vendors->thn_pembuatan = $request->thn_pembuatan;
                $vendors->file = $filename;
                $vendors->save();
                
                return redirect()->back()->with('success',  $vendors->nama . ' Data Berhasil di Update');
            }
          
        
        // return view('back.profile.index', compact('pref', 'judul'));
    }

    // public function show($id)
    // {
    //     $data = Vendorlisensi::find($id);
 	   
    // }

    public function destroy($id)
    {
        $data = Vendorfasilitas::find($id);
 	    // $data->bafiles()->delete();
        $data->delete($data);
        return redirect()->back();
    }
}
