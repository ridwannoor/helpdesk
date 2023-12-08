<?php

namespace App\Exports;

use App\Models\Po\Rekappo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class PoExport1 implements FromCollection, WithHeadings
{
    // use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    // protected $request;
   
    // public function __construct($request)
    // {
    //    $this->request = $request;
    // } 

    public function collection()
    {
        return Rekappo::all();
    }
    
    // public function collection()
    // {
    //     // return Rekappo::all();
    //     $rekappo = Rekappo::where('lokasi_id', 'like', '%'.$this->request->lokasi_id)
    //     ->orWhere('start_date', 'like', '%'.$this->request->start_date)
    //     ->orWhere('end_date', 'like', '%'.$this->request->end_date)->get();
        
    //     $output = [];

    //     foreach ($rekappo as $item) {
    //         $output[] = [
    //            $rekappo->no_po,
    //            $rekappo->no_kontrak, 
    //            $rekappo->tanggal, 
    //            $rekappo->start_date,
    //            $rekappo->end_date,
    //            $rekappo->nama_pekerjaan,
    //            $rekappo->cara_bayar,
    //            $rekappo->cara_bayar1,
    //            $rekappo->pajak,
    //            $rekappo->asuransi,
    //            $rekappo->vendor_id,
    //            $rekappo->lokasi_id,
    //            $rekappo->user_id,
    //            $rekappo->preference_id,
    //            $rekappo->bod_id,
    //            $rekappo->hargapabrik,
    //            $rekappo->deskripsi,
    //            $rekappo->suratpenawaran,
    //            $rekappo->desc_tgl,
    //            $rekappo->desc,
    //            $rekappo->diskon,
    //            $rekappo->biaya_kirim,
    //            $rekappo->ppn,
    //            $rekappo->total
    //         ];

    //     }
    //     return collect($output);
    // }

    public function headings() : array {
        return [
            'id',
            'no_po',
            'no_kontrak', 
            'tanggal', 
            'start_date',
            'end_date',
            'nama_pekerjaan',
            'cara_bayar',
            'cara_bayar1',
            'pajak',
            'asuransi',
            'vendor_id',
            'lokasi_id',
            'user_id',
            'preference_id',
            'bod_id',
            'hargapabrik',
            'deskripsi',
            'suratpenawaran',
            'desc_tgl',
            'desc',
            'diskon',
            'biaya_kirim',
            'ppn',
            'total'
        ];  
    }
}
