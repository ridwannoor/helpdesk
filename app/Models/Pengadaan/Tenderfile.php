<?php

namespace App\Models\Pengadaan;

use Illuminate\Database\Eloquent\Model;

class Tenderfile extends Model
{
    protected $table = "tenderfiles";
    protected $fillable = [ 
       'tender_id',
       'nama_file',
       'filepdf'
    ];

    public function tender()
    {
        return $this->belongsTo('App\Models\Pengadaan\Tender');
    }
}
