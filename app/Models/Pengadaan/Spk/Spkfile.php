<?php

namespace App\Models\Pengadaan\Spk;

use Illuminate\Database\Eloquent\Model;

class Spkfile extends Model
{
    protected $table = "spkfiles";
    protected $fillable = ['spkheader_id','filepdf'];

    public function spkheader()
   {
       return $this->belongsTo('App\Models\Pengadaan\Spk\Spkheader');
   }
}
