<?php

namespace App\Models\Pengadaan;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    protected $table = "timelines";
    protected $fillable = [ 
       'tender_id',
       'undangan_aanwizing',
       'ket_undangan',
       'rapat_pekerjaan',
       'ket_rapat',
       'sbd',
       'ket_sbd',
       'sph',
       'ket_sph',
       'rpp',
       'ket_rpp',
       'pengumuman',
       'ket_pengum',
       'rpp_1',
       'ket_rpp1',
       'pengumuman_1',
        'ket_pengum1',
       'klarif_nego',
       'ket_klarif',
       'sph_nego',
       'ket_sphnego',
       'spp',
       'ket_spp',
       'kontrak',
       'ket_kontrak'
    ];

    public function tender()
    {
        return $this->belongsTo('App\Models\Pengadaan\Tender');
    }

    public function timelinefile()
    {
        return $this->hasMany('App\Models\Pengadaan\Timelinefile');
    }
}
