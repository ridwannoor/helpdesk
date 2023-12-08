<?php

namespace App\Models\Pengadaan;

use Illuminate\Database\Eloquent\Model;

class Tenderdetail extends Model
{
    protected $table = "tenderdetails";
    protected $fillable = [ 
       'tender_id',
       'vendorklasifikasi_id'
    ];

    public function tender()
    {
        return $this->belongsTo('App\Models\Pengadaan\Tender');
    }

    public function vendorklasifikasi()
    {
        return $this->belongsTo('App\Models\Vendorklasifikasi');
    }
}
