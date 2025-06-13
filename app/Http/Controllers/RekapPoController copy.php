<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Po\Rekappo;
use App\Models\Po\Poheader;
use App\Models\Po\Podetail;
use App\Models\Po\Potemp;
use App\Models\Po\Pofile;
use App\Models\Preference;
use App\Models\Lokasi;
use App\Models\Hargabarang;
use App\Models\Bod;
use App\Models\Menu;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Session;
use PDF;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PoExport;

class RekapPoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function GenerateNumber(){
        $AWAL = 'IASP-PBJ';
        // karna array dimulai dari 0 maka kita tambah di awal data kosong
        // bisa juga mulai dari "1"=>"I"
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $noUrutAkhir = Rekappo::WhereYear('created_at', Carbon::now()->year)->count();
        $no = 1;
        if($noUrutAkhir) {
            $noUrutAkhir = sprintf("%03s", abs($noUrutAkhir + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
        }
        else {
            $noUrutAkhir = sprintf("%03s", $no). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
        }

        return $noUrutAkhir;
    }

    public function index()
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
	    $menu = Menu::where('link', '/rekappo')->first();
        $crud = $users->where('menu_id', $menu->id)->first();
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $rekappos = Rekappo::orderBy('created_at', 'DESC')->get();
        $judul = 'Rekap PO';
        return view('transaksi.rekappo.index', compact('judul', 'rekappos','users','pref','crud','lokasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $noUrutAkhir = $this->GenerateNumber();
        $rekappos = Rekappo::all();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $preferences = Preference::all();
        $bods = Bod::all();
        $barangs = Hargabarang::orderBy('nama_brg', 'ASC')->get();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        // $temporary =
        $judul = 'Rekap PO';
        return view('transaksi.rekappo.add', compact('users','judul', 'bods', 'noUrutAkhir', 'barangs', 'rekappos','pref','preferences','lokasis','vendors'));
    }

    // public function store(Request $request)
    // {
    //     $pos = new Poheader();

    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // $name = $request->no_po;
        // $poheaders = Rekappo::where('no_po',$name)->first();

        // if ($poheaders) {
        //     return redirect()->back()->with('message', 'Data Sudah Ada ..!!');
        // }
        // else {
            $pos = new Rekappo();
            $pos->no_po = $request->no_po;
            $pos->no_kontrak = $request->no_kontrak;
            $pos->tanggal = $request->tanggal;
            $pos->start_date = $request->start_date;
            $pos->end_date = $request->end_date;
            $pos->cara_bayar = $request->cara_bayar;
            $pos->cara_bayar1 = $request->cara_bayar1;
            $pos->pajak = $request->pajak;
            $pos->pajak1 = $request->pajak1;
            // $pos->pajak = $request->has('pajak');
            $pos->nama_pekerjaan = $request->nama_pekerjaan;
            $pos->vendor_id = $request->vendor_id;
            $pos->lokasi_id = $request->lokasi_id;
            $pos->preference_id = $request->preference_id;
            $pos->bod_id = $request->bod_id;
            $pos->hargapabrik = $request->hargapabrik;
            $pos->deskripsi = $request->deskripsi;
            $pos->suratpenawaran = $request->suratpenawaran;
            $pos->desc_tgl = $request->desc_tgl;
            $pos->desc = $request->desc;
            $pos->diskon = $request->diskon;
            $pos->biaya_kirim = $request->biaya_kirim;
            $pos->ppn = $request->ppn;
            $pos->total = $request->total;
            $pos->save();

            // $id = $request->id;
            // $dodet = $pos::with(['podetails', 'pofiles'])->find($id);
            // $dodet->update($request->toArray());
            // $dodet->podetails()->delete();
            // $dodet->pofiles()->delete();

            if ($pos) {
                foreach ($request->material as $key => $v) {
                    $data = array(
                        'rekappo_id'=>$pos->id,
                        'material'=>$v,
                        'qty'=>$request->qty [$key],
                        'satuan'=>$request->satuan [$key],
                        'harga'=>$request->harga [$key]
                    );
                    Podetail::insert($data);
                }
            }

            // if($request->hasfile('filepdf'))
            // {
            //    foreach ($request->filepdf as $file) {
            //     $name = $file->getClientOriginalName();
            //     $filename = $request->id.$name;
            //     $tujuan_upload = 'data_file/pdf';
            //     $file->move($tujuan_upload,$filename);
            //    $data = array(
            //            'rekappo_id'=>$pos->id,
            //            'filepdf'=>$filename
            //        );
            //        Pofile::insert($data);
            //    }
            // }

            // $id = $request->no_po;
            // $dodet = Poheader::with('potemps')->find($id);
            // // $dodet->update($request->toArray());
            // $dodet->potemps()->delete();
            // $dodet->delete($dodet);
        // }
            return redirect('/rekappo')->with('success', 'Data Berhasil disimpan');

    }

    public function store1(Request $request)
    {
        // $name = $request->no_po;
        // $poheaders = Poheader::where('no_po',$name)->first();

        // if ($poheaders) {
        //     return redirect()->back()->with('message', 'Data Sudah Ada ..!!');
        // }
        // else {
            $pos = new Poheader();
            $pos->no_po = $request->no_po;
            $pos->no_kontrak = $request->no_kontrak;
            $pos->tanggal = $request->tanggal;
            $pos->start_date = $request->start_date;
            $pos->end_date = $request->end_date;
            $pos->cara_bayar = $request->cara_bayar;
            $pos->cara_bayar1 = $request->cara_bayar1;
            $pos->pajak = $request->pajak;
            $pos->pajak1 = $request->pajak1;
            // $request->cara_bayar;
            // $pos->pajak = $request->has('pajak');
            $pos->nama_pekerjaan = $request->nama_pekerjaan;
            $pos->vendor_id = $request->vendor_id;
            $pos->lokasi_id = $request->lokasi_id;
            $pos->preference_id = $request->preference_id;
            $pos->bod_id = $request->bod_id;
            $pos->hargapabrik = $request->hargapabrik;
            $pos->deskripsi = $request->deskripsi;
            $pos->suratpenawaran = $request->suratpenawaran;
            $pos->desc_tgl = $request->desc_tgl;
            $pos->desc = $request->desc;
            $pos->diskon = $request->diskon;
            $pos->biaya_kirim = $request->biaya_kirim;
            $pos->ppn = $request->ppn;
            $pos->total = $request->total;
            // dd($pos->cara_bayar);
            $pos->save();

                // $id = $request->id;
                // $dodet = $pos::with(['potemps'])->find($id);
            // $dodet->update($request->toArray());
            // $dodet->potemps()->delete();
            // $dodet->pofiles()->delete();

            if ($pos) {
                foreach ($request->material as $key => $v) {
                    $data = array(
                        'poheader_id'=>$pos->id,
                        'material'=>$v,
                        'qty'=>$request->qty [$key],
                        'satuan'=>$request->satuan [$key],
                        'harga'=>$request->harga [$key]
                    );
                    Potemp::insert($data);
                }
            }

            // if($request->hasfile('filepdf'))
            // {
            //    foreach ($request->filepdf as $file) {
            //     $name = $file->getClientOriginalName();
            //     $filename = $request->id.$name;
            //     $tujuan_upload = 'data_file/pdf';
            //     $file->move($tujuan_upload,$filename);
            //    $data = array(
            //            'poheader_id'=>$pos->id,
            //            'filepdf'=>$filename
            //        );
            //        Pofile::insert($data);
            //    }
            // }

            return redirect()->route('rekappodetail', ['id' => $pos->id]);
    }

    public function detail($id)
    {
        $pref = Preference::where('id',1)->get();
        $users = Auth::user()->userdetails()->with('menu')->get();
        $rekappos = Poheader::find($id);
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $preferences = Preference::all();
        $bods = Bod::all();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        // $temporary =
        $judul = 'Purchase Order';
        return view('transaksi.rekappo.adddetail', compact('users','judul', 'bods',  'rekappos','pref','preferences','lokasis','vendors'));

    }

    public function editdetail($id)
    {
        $pref = Preference::where('id',1)->get();
        $users = Auth::user()->userdetails()->with('menu')->get();
        $rekappos = Rekappo::find($id);
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $preferences = Preference::all();
        $bods = Bod::all();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        // $temporary =
        $judul = 'Purchase Order';
        return view('transaksi.rekappo.editdetail', compact('users','judul', 'bods', 'rekappos','pref','preferences','lokasis','vendors'));

    }

    public function cetak($id)
    {
        $pref = Preference::where('id',1)->get();
        $users = Auth::user()->userdetails()->with('menu')->get();
        $rekappos = Rekappo::find($id);
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $preferences = Preference::all();
        $bods = Bod::all();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        // $temporary =
        $judul = 'Purchase Order';
        $pdf = PDF::loadView('transaksi.rekappo.cetak', compact('users','judul', 'bods', 'rekappos','pref','preferences','lokasis','vendors'));
        return $pdf->stream();
    }

    public function show($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $judul = 'Show PO';
        $judul1 = 'Purchase Order';
        $bods = Bod::all();
        $rekappos = Rekappo::with('preference', 'lokasi', 'vendor')->find($id);
        return view('transaksi.rekappo.show', compact('rekappos', 'judul', 'bods', 'judul1','users','pref'));
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
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pos = Rekappo::find($id);
        $bods = Bod::all();
        $judul = 'Edit Rekap PO';
        $preferences = Preference::all();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        return view('transaksi.rekappo.edit', compact('pos','judul', 'pref','bods','lokasis','vendors','users', 'preferences'));
    }

    public function upload($id)
    {
        $pref = Preference::first();
        $users = Auth::user()->userdetails()->with('menu')->get();
      //  $parent = $users->menu->where(['parentmenu' => 0])->get();
        $pos = Rekappo::find($id);
        $bods = Bod::all();
        $judul = 'Upload File Rekap PO';
        $preferences = Preference::all();
        $lokasis = Lokasi::orderBy('kode', 'ASC')->get();
        $vendors = Vendor::orderBy('namaperusahaan', 'ASC')->get();
        return view('transaksi.rekappo.upload', compact('pos','judul', 'pref','bods','lokasis','vendors','users', 'preferences'));
    }

    public function poupload(Request $request){
        $pos = Rekappo::where('id','=', $request->id)->first();
        $pos->no_po = $request->no_po;
        $pos->save();


        if($request->hasfile('filepdf'))
        {
           foreach ($request->filepdf as $file) {
            $name = $file->getClientOriginalName();
            $filename = $request->id.$name;
            $tujuan_upload = 'data_file/pdf';
            $file->move($tujuan_upload,$filename);
           $data = array(
                   'rekappo_id'=>$pos->id,
                   'filepdf'=>$filename
               );
               Pofile::insert($data);
           }
        }

        return redirect('/rekappo')->with('success', 'Data Berhasil Diperbarui');
    }

    public function publish($id)
    {
        $rekapp = Rekappo::find($id);
        $rekapp->is_published = !$rekapp->is_published;
        $rekapp->save();
        return redirect('/rekappo');
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
        // $name = $request->no_po;
        // $poheaders = Poheader::where('no_po',$name)->first();

        // if ($poheaders) {
        //     return redirect()->back()->with('message', 'Data Sudah Ada ..!!');
        // }
        // else {
            $pos = Rekappo::where('id','=', $request->id)->first();
            $pos->no_po = $request->no_po;
            $pos->no_kontrak = $request->no_kontrak;
            $pos->tanggal = $request->tanggal;
            $pos->start_date = $request->start_date;
            $pos->end_date = $request->end_date;
            $pos->cara_bayar = $request->cara_bayar;
            $pos->cara_bayar1 = $request->cara_bayar1;
            $pos->pajak = $request->pajak;
            $pos->pajak1 = $request->pajak1;
            // $pos->pajak = $request->has('pajak');
            $pos->nama_pekerjaan = $request->nama_pekerjaan;
            $pos->vendor_id = $request->vendor_id;
            $pos->lokasi_id = $request->lokasi_id;
            $pos->preference_id = $request->preference_id;
            $pos->bod_id = $request->bod_id;
            $pos->hargapabrik = $request->hargapabrik;
            $pos->deskripsi = $request->deskripsi;
            $pos->suratpenawaran = $request->suratpenawaran;
            $pos->desc_tgl = $request->desc_tgl;
            $pos->desc = $request->desc;
            $pos->diskon = $request->diskon;
            $pos->biaya_kirim = $request->biaya_kirim;
            $pos->ppn = $request->ppn;
            $pos->total = $request->total;
            // dd($pos);
            $pos->save();

            $id = $request->id;
            $dodet = $pos::with(['podetails', 'pofiles'])->find($id);
            $dodet->update($request->toArray());
            $dodet->podetails()->delete();
            $dodet->pofiles()->delete();

            if ($pos) {
                foreach ($request->material as $key => $v) {
                    $data = array(
                        'rekappo_id'=>$pos->id,
                        'material'=>$v,
                        'qty'=>$request->qty [$key],
                        'satuan'=>$request->satuan [$key],
                        'harga'=>$request->harga [$key]
                    );
                    Podetail::insert($data);
                }
            }

            // if($request->hasfile('filepdf'))
            // {
            //    foreach ($request->filepdf as $file) {
            //     $name = $file->getClientOriginalName();
            //     $filename = $request->id.$name;
            //     $tujuan_upload = 'data_file/pdf';
            //     $file->move($tujuan_upload,$filename);
            //    $data = array(
            //            'rekappo_id'=>$pos->id,
            //            'filepdf'=>$filename
            //        );
            //        Pofile::insert($data);
            //    }
            // }

            return redirect('/rekappo')->with('success', 'Data Berhasil Diperbarui');
    }


    public function update1(Request $request)
    {
        // $name = $request->no_po;
        // $poheaders = Poheader::where('no_po',$name)->first();

        // if ($poheaders) {
        //     return redirect()->back()->with('message', 'Data Sudah Ada ..!!');
        // }
        // else {
            $pos = Rekappo::where('id','=', $request->id)->first();
            $pos->no_po = $request->no_po;
            $pos->no_kontrak = $request->no_kontrak;
            $pos->tanggal = $request->tanggal;
            $pos->start_date = $request->start_date;
            $pos->end_date = $request->end_date;
            $pos->cara_bayar = $request->cara_bayar;
            $pos->cara_bayar1 = $request->cara_bayar1;
            $pos->pajak = $request->pajak;
            $pos->pajak1 = $request->pajak1;
            // $pos->pajak = $request->has('pajak');
            $pos->nama_pekerjaan = $request->nama_pekerjaan;
            $pos->vendor_id = $request->vendor_id;
            $pos->lokasi_id = $request->lokasi_id;
            $pos->preference_id = $request->preference_id;
            $pos->bod_id = $request->bod_id;
            $pos->hargapabrik = $request->hargapabrik;
            $pos->deskripsi = $request->deskripsi;
            $pos->suratpenawaran = $request->suratpenawaran;
            $pos->desc_tgl = $request->desc_tgl;
            $pos->desc = $request->desc;
            $pos->diskon = $request->diskon;
            $pos->biaya_kirim = $request->biaya_kirim;
            // $pos->ppn = $request->ppn;
            // $pos->total = $request->total;
            // dd($pos);
            $pos->save();

            $id = $request->id;
            $dodet = $pos::with(['podetails', 'pofiles'])->find($id);
            $dodet->update($request->toArray());
            $dodet->podetails()->delete();
            $dodet->pofiles()->delete();

            if ($pos) {
                foreach ($request->material as $key => $v) {
                    $data = array(
                        'rekappo_id'=>$pos->id,
                        'material'=>$v,
                        'qty'=>$request->qty [$key],
                        'satuan'=>$request->satuan [$key],
                        'harga'=>$request->harga [$key]
                    );
                    Podetail::insert($data);
                }
            }

            // if($request->hasfile('filepdf'))
            // {
            //    foreach ($request->filepdf as $file) {
            //     $name = $file->getClientOriginalName();
            //     $filename = $request->id.$name;
            //     $tujuan_upload = 'data_file/pdf';
            //     $file->move($tujuan_upload,$filename);
            //    $data = array(
            //            'rekappo_id'=>$pos->id,
            //            'filepdf'=>$filename
            //        );
            //        Pofile::insert($data);
            //    }
            // }

            return redirect()->route('rekappoeditdetail', ['id' => $pos->id]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Rekappo::find($id);
        $data->podetails()->delete();
 	    $data->pofiles()->delete();
        $data->delete($data);

        // $data1 = Poheader::find($id);
        // $data1->potemps()->delete();
 	    // $data1->pofiles()->delete();
        // $data1->delete($data1);

        return redirect('/rekappo')->with('success', 'PO Berhasil Dihapus');
    }

    public function destroydetail($id){
        $data = Podetail::find($id);
        $data->delete($data);
        // return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }

    public function destroyfile($id){
        $data = Pofile::find($id);
        $data->delete($data);
        return redirect()->back()->with('message', 'Data berhasil Dihapus');
    }

    public function exportXLS(Request $request) {

        return Excel::download(new PoExport($request), 'po-collection.xlsx');

    }
}
