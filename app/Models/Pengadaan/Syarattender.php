<?php

namespace App\Models\Pengadaan;

use Illuminate\Database\Eloquent\Model;

class Syarattender extends Model
{
    protected $table = "syarattenders";
    protected $fillable = [ 
        'kode_syarat', 
        'detail_syarat',
        'file_syarat' 

    ];

    public function tender()
    {
        return $this->hasMany('App\Models\Pengadaan\Tender');
    }

    public function tendersyarat()
    {
        return $this->hasMany('App\Models\Pengadaan\Tendersyarat');
    }

    public function tenderquot()
    {
        return $this->hasMany('App\Models\Pengadaan\Tenderquot');
    }
}
