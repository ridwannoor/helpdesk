<?php

namespace App\Models\Pengadaan\Bapengadaan;

use Illuminate\Database\Eloquent\Model;

class Bafilepengadaan extends Model
{
    protected $table = "bafilepengadaans";
    protected $fillable = ['bapengadaan_id','filepdf'];

    public function bapengadaan()
   {
       return $this->belongsTo('App\Models\Pengadaan\Bapengadaan\Bapengadaan');
   }
}
