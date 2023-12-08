<?php

namespace App\Models\Pengadaan;

use Illuminate\Database\Eloquent\Model;

class Tenderpenawaran extends Model
{
    protected $table = "tenderpenawarans";
    protected $fillable = [ 
       'tender_id',
       'vendor_id', 
       'nilai_penawaran',
       'regist',
        'quot'
    ];

    public function tender()
    {
        return $this->belongsTo('App\Models\Pengadaan\Tender');
    }

    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor');
    }
}
