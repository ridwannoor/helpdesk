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

use Carbon\Carbon;

class ProfilelisensiController extends Controller
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
            $vendors = new Vendorlisensi;
            $vendors->vendor_id = $request->vendor_id;
            $vendors->vendorjenis_id = $request->vendorjenis_id;
            $vendors->keterangan = $request->keterangan;
            $vendors->nomor = $request->nomor;
            $vendors->penerbit = $request->penerbit;    
            $vendors->start = $request->start;
            $vendors->end = $request->end;   
            $vendors->expired = $request->expired;   
            // $vendors->file = $filename;
            $vendors->save();
            return redirect()->back()->with('success', $vendors->vendorjenis->keterangan . ' Data Berhasil di Buat');
        }
        else
        {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = 'PROFLIS_'. date('YmdHis').".".$extension; 
            // $ext = $file->getClientOriginalExtension();
            // $filename = $request->id.time().".".$ext; 
            $tujuan_upload = 'data_file/profile/doc';
            $file->move($tujuan_upload,$filename);

            $vendors = new Vendorlisensi;
            $vendors->vendor_id = $request->vendor_id;
            $vendors->vendorjenis_id = $request->vendorjenis_id;
            $vendors->keterangan = $request->keterangan;
            $vendors->nomor = $request->nomor;
            $vendors->penerbit = $request->penerbit;    
            $vendors->start = $request->start;
            $vendors->end = $request->end;   
            $vendors->expired = $request->expired;   
            $vendors->file = $filename;
            $vendors->save();
            return redirect()->back()->with('success', $vendors->vendorjenis->keterangan . ' Data Berhasil di Buat');
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

            $vendors = Vendorlisensi::where('id', $request->id)->first();
            $vendors->vendor_id = $request->vendor_id;
            $vendors->vendorjenis_id = $request->vendorjenis_id;
            $vendors->keterangan = $request->keterangan;
            $vendors->nomor = $request->nomor;
            $vendors->penerbit = $request->penerbit;    
            $vendors->start = $request->start;
            $vendors->expired = $request->expired;   
            $vendors->end = $request->end;   
            // $vendors->file = $filename;
            $vendors->save();
            
        return redirect()->back()->with('success' , $vendors->vendorjenis->keterangan . ' Berhasil di Update ' );
        }
        else
        {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = 'PROFLIS_'. date('YmdHis').".".$extension; 
            // $ext = $file->getClientOriginalExtension();
            // $filename = $request->id.time().".".$ext; 
            $tujuan_upload = 'data_file/profile/doc';
            $file->move($tujuan_upload,$filename);

            $vendors = Vendorlisensi::where('id', $request->id)->first();
            $vendors->vendor_id = $request->vendor_id;
            $vendors->vendorjenis_id = $request->vendorjenis_id;
            $vendors->keterangan = $request->keterangan;
            $vendors->nomor = $request->nomor;
            $vendors->penerbit = $request->penerbit;    
            $vendors->start = $request->start;
            $vendors->expired = $request->expired;   
            $vendors->end = $request->end;   
            $vendors->file = $filename;
            $vendors->save();
            
            return redirect()->back()->with('success' , $vendors->vendorjenis->keterangan . ' Data Berhasil di Update');
        }
           
        
        // return view('back.profile.index', compact('pref', 'judul'));
    }

    // public function show($id)
    // {
    //     $data = Vendorlisensi::find($id);
 	   
    // }

    public function destroy($id)
    {
        $data = Vendorlisensi::find($id);
 	    // $data->bafiles()->delete();
        $data->delete($data);
        return redirect()->back();
    }
}
