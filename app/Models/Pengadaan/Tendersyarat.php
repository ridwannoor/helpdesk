<?php

namespace App\Models\Pengadaan;

use Illuminate\Database\Eloquent\Model;

class Tendersyarat extends Model
{
    protected $table = "tendersyarats";
    protected $fillable = [ 
       'tender_id',
       'syarattender_id'

    ];

    public function tenders()
    {
        return $this->belongsTo('App\Models\Pengadaan\Tender');
    }

    public function syarattender()
    {
        return $this->belongsTo('App\Models\Pengadaan\Syarattender');
    }
}
