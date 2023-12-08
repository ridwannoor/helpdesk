<?php

namespace App\Models\Pengadaan\Spp;

use Illuminate\Database\Eloquent\Model;

class Sppdetail extends Model
{
    protected $table = "sppdetails";
    protected $fillable = ['sppheader_id','suratpend'];

    public function sppheader()
   {
       return $this->belongsTo('App\Models\Pengadaan\Spp\Sppheader');
   }
}
