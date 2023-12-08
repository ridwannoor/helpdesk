<?php

namespace App\Models\Pengadaan;

use Illuminate\Database\Eloquent\Model;

class Tenderquot extends Model
{
    protected $table = "tenderquots";
    protected $fillable = [ 
       'tender_id',
       'vendor_id', 
       'syarattender_id',
       'file_pdf'

    ];

    public function tender()
    {
        return $this->belongsTo('App\Models\Pengadaan\Tender');
    }
    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor');
    }
    public function syarattender()
    {
        return $this->belongsTo('App\Models\Pengadaan\Syarattender');
    }
}
