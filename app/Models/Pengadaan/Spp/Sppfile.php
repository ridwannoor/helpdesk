<?php

namespace App\Models\Pengadaan\Spp;

use Illuminate\Database\Eloquent\Model;

class Sppfile extends Model
{
    protected $table = "sppfiles";
    protected $fillable = ['sppheader_id','filepdf'];

    public function sppheader()
   {
       return $this->belongsTo('App\Models\Pengadaan\Spp\Sppheader');
   }
}
