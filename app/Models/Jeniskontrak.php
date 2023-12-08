<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jeniskontrak extends Model
{
    protected $table = 'jeniskontraks';
    protected $fillable = ['name'];


    public function formpengadaan()
    {
        return $this->hasMany('App\Models\Pengadaan\Formpengadaan');
    }
}
