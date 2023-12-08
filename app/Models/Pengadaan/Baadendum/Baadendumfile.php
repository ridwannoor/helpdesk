<?php

namespace App\Models\Pengadaan\Baadendum;

use Illuminate\Database\Eloquent\Model;

class Baadendumfile extends Model
{
    protected $table = "baadendumfiles";
    protected $fillable = ['baadendumheader_id','filepdf'];

    public function baadendumheader()
   {
       return $this->belongsTo('App\Models\Pengadaan\Baadendum\Baadendumheader');
   }
}
