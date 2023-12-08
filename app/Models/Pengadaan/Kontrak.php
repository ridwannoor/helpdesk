<?php

namespace App\Models\Pengadaan;

use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    protected $table = "kontraks";
    protected $fillable = [ 'name' ];

    public function banegopengadaan()
    {
        return $this->hasMany('App\Models\Pengadaan\Banegopengadaan');
    }
}
