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
use App\Models\Vendorjenisdoc;
use App\Models\Vendorlisensi;
use App\Models\Vendorfasilitas;
use App\Models\Vendorsertifikat;
use App\Models\Vendorlap;
use App\Models\Vendorpengalaman;
use App\Models\Vendorpengurus;
use App\Models\Vendortenaga;
use App\Models\Vendortipe;
use App\Models\Vendorbank;
use App\Models\Currency;
use App\Models\Bank;

class ProfilebankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:vendor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'mimes:pdf|max:10240'
        ]);

        if (!$file = $request->file('image')) {
            // $name = $file->getClientOriginalName();
            // $filename = $request->id.$name; 
            // $tujuan_upload = 'data_file/my_drive';
            // $file->move($tujuan_upload,$filename);

            $vendors = new Vendorbank;
            $vendors->vendor_id = $request->vendor_id;  
            $vendors->bank_id = $request->bank_id;
            $vendors->nomor_rek = $request->nomor_rek;
            $vendors->nama_pemilik = $request->nama_pemilik;
            $vendors->save();

            return redirect()->back()->with('success', $vendors->bank->name . ' Data Berhasil di Buat');
        }
        else {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'PROFBANK_'. date('YmdHis').".".$extension; 
            // $name = $file->getClientOriginalName();
            // $filename = $request->id.$name; 
            $tujuan_upload = 'data_file/bank';
            $file->move($tujuan_upload,$filename);

            $vendors = new Vendorbank;
            $vendors->vendor_id = $request->vendor_id;  
            $vendors->bank_id = $request->bank_id;
            $vendors->nomor_rek = $request->nomor_rek;
            $vendors->nama_pemilik = $request->nama_pemilik;
            $vendors->image = $filename;
            $vendors->save();
            return redirect()->back()->with('success', $vendors->bank->name .' Data Berhasil di Buat');
        }

            // $vendors = new Vendorbank;
            // $vendors->vendor_id = $request->vendor_id;  
            // $vendors->bank_id = $request->bank_id;
            // $vendors->nomor_rek = $request->nomor_rek;
            // $vendors->nama_pemilik = $request->nama_pemilik;
            // $vendors->save();
            // return redirect()->back();
        
        // return view('back.profile.index', compact('pref', 'judul'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image' => 'mimes:pdf|max:10240'
        ]);

        if (!$file = $request->file('image')) {

            $vendors = Vendorbank::where('id', $request->id)->first();
            $vendors->vendor_id = $request->vendor_id;  
            $vendors->bank_id = $request->bank_id;
            $vendors->nomor_rek = $request->nomor_rek;
            $vendors->nama_pemilik = $request->nama_pemilik;
            $vendors->save();
            return redirect()->back()->with('success', $vendors->bank->name . ' Data Berhasil di Update');
        }
        else {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'PROFBANK_'. date('YmdHis').".".$extension; 
            // $name = $file->getClientOriginalName();
            // $filename = $request->id.$name; 
            $tujuan_upload = 'data_file/bank';
            $file->move($tujuan_upload,$filename);

            $vendors = Vendorbank::where('id', $request->id)->first();
            $vendors->vendor_id = $request->vendor_id;  
            $vendors->bank_id = $request->bank_id;
            $vendors->nomor_rek = $request->nomor_rek;
            $vendors->nama_pemilik = $request->nama_pemilik;
            $vendors->image = $filename;
            $vendors->save();
            return redirect()->back()->with('success', $vendors->bank->name .' Data Berhasil di Update');
        }
    }


    public function destroy($id)
    {
        $data = Vendorbank::find($id);
 	    // $data->bafiles()->delete();
        $data->delete($data);
        return redirect()->back()->with('success', ' Data Berhasil di Hapus');
    }
}
