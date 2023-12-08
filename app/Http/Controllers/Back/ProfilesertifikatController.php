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
use App\Models\Vendorpengurus;
use App\Models\Vendortenaga;

class ProfilesertifikatController extends Controller
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
                $vendors = new Vendorsertifikat;
                $vendors->vendor_id = $request->vendor_id;
                $vendors->vendorklasifikasi_id = $request->vendorklasifikasi_id;
                $vendors->vendorsubkla_id = $request->vendorsubkla_id;
                $vendors->nomor = $request->nomor;
                $vendors->berlaku_start = $request->berlaku_start;
                $vendors->berlaku_end = $request->berlaku_end;
                $vendors->keterangan = $request->keterangan;
                $vendors->expired = $request->expired;   
                // $vendors->file = $filename;
                $vendors->save();
                return redirect()->back()->with('success', $vendors->vendorklasifikasi->name . ' Data Berhasil di Buat');
            }
            else
            {
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $filename = 'PROFSER_'. date('YmdHis').".".$extension; 
                // $ext = $file->getClientOriginalExtension();
                // $filename = $request->id.time().".".$ext; 
                $tujuan_upload = 'data_file/profile/doc';
                $file->move($tujuan_upload,$filename);
    
                $vendors = new Vendorsertifikat;
                $vendors->vendor_id = $request->vendor_id;
                $vendors->vendorklasifikasi_id = $request->vendorklasifikasi_id;
                $vendors->vendorsubkla_id = $request->vendorsubkla_id;
                $vendors->nomor = $request->nomor;
                $vendors->berlaku_start = $request->berlaku_start;
                $vendors->berlaku_end = $request->berlaku_end;
                $vendors->keterangan = $request->keterangan;
                $vendors->expired = $request->expired;   
                $vendors->file = $filename;
                $vendors->save();
                return redirect()->back()->with('success', $vendors->vendorklasifikasi->name . ' Data Berhasil di Buat');
            }
         
     
    }

    public function update(Request $request)
    {
            $request->validate([
                'file' => 'mimes:pdf|max:10240'
            ]);
            
            if (!$file = $request->file('file')) 
            {
                $vendors = Vendorsertifikat::where('id', $request->id)->first();
                $vendors->vendor_id = $request->vendor_id;
                $vendors->vendorklasifikasi_id = $request->vendorklasifikasi_id;
                $vendors->vendorsubkla_id = $request->vendorsubkla_id;
                $vendors->nomor = $request->nomor;
                $vendors->berlaku_start = $request->berlaku_start;
                $vendors->berlaku_end = $request->berlaku_end;
                $vendors->keterangan = $request->keterangan;
                $vendors->expired = $request->expired;   
                // $vendors->file = $filename;
                $vendors->save();
                
                return redirect()->back()->with('success', $vendors->vendorklasifikasi->name . ' Data Berhasil di Update');
            }
            else
            {
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $filename = 'PROFSER_'. date('YmdHis').".".$extension; 
                // $ext = $file->getClientOriginalExtension();
                // $filename = $request->id.time().".".$ext; 
                $tujuan_upload = 'data_file/profile/doc';
                $file->move($tujuan_upload,$filename);
    
                $vendors = Vendorsertifikat::where('id', $request->id)->first();
                $vendors->vendor_id = $request->vendor_id;
                $vendors->vendorklasifikasi_id = $request->vendorklasifikasi_id;
                $vendors->vendorsubkla_id = $request->vendorsubkla_id;
                $vendors->nomor = $request->nomor;
                $vendors->berlaku_start = $request->berlaku_start;
                $vendors->berlaku_end = $request->berlaku_end;
                $vendors->keterangan = $request->keterangan;
                $vendors->expired = $request->expired;   
                $vendors->file = $filename;
                $vendors->save();
                
                return redirect()->back()->with('success', $vendors->vendorklasifikasi->name . ' Data Berhasil di Update');
            }
         
        
    }

  

    public function destroy($id)
    {
        $data = Vendorsertifikat::find($id);
 	    // $data->bafiles()->delete();
        $data->delete($data);
        return redirect()->back()->with('message', ' Data Berhasil di Hapus');
    }
}
