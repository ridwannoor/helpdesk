<?php

namespace App\Models\Pengadaan;

use Illuminate\Database\Eloquent\Model;

class Tendernodin extends Model
{
    protected $table = "tendernodins";
    protected $fillable = [ 
       'tender_id',
       'namenodin'
    ];

    public function tender()
    {
        return $this->belongsTo('App\Models\Pengadaan\Tender');
    }
}
