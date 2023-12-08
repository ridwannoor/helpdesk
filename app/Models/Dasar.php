<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dasar extends Model
{
    protected $table = 'dasars';
    protected $fillable = ['kode', 'detail'];

    public function banegopengadaan(){
        return $this->hasMany('App\Models\Pengadaan\Banego\Banegopengadaan');
    }
}
