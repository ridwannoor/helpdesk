<?php

namespace App\Models\Pengadaan\Banego;

use Illuminate\Database\Eloquent\Model;

class Banegopengadaanfile extends Model
{
    protected $table = "banegopengadaanfiles";
    protected $fillable = ['banegopengadaan_id','filepdf'];

    public function banegopengadaan()
   {
       return $this->belongsTo('App\Models\Pengadaan\Banego\Banegopengadaan');
   }
}
