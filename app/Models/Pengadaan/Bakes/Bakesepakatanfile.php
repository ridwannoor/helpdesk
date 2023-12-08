<?php

namespace App\Models\Pengadaan\Bakes;

use Illuminate\Database\Eloquent\Model;

class Bakesepakatanfile extends Model
{
    protected $table = "bakesepakatanfiles";
    protected $fillable = ['bakesepakatan_id','filepdf'];

    public function bakesepakatan()
   {
       return $this->belongsTo('App\Models\Pengadaan\Bakes\Bakesepakatan');
   }
}
