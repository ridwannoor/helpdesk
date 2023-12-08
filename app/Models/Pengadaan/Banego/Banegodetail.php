<?php

namespace App\Models\Pengadaan\Banego;

use Illuminate\Database\Eloquent\Model;

class Banegodetail extends Model
{
    protected $table = "banegodetails";
    protected $fillable = ['banegopengadaan_id','carabayar'];

    public function banegopengadaan()
   {
       return $this->belongsTo('App\Models\Pengadaan\Banego\Banegopengadaan');
   }
}
