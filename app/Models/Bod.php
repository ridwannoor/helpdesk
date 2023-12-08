<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bod extends Model
{
    protected $table = 'bods';
    protected $fillable = ['code', 'name', 'jabatan','status'];

    public function rekappo(){
        return $this->hasMany('App\Models\Rekappo');
    }

    public function poheader(){
        return $this->hasMany('App\Models\Poheader');
    }

    public function serviceorder(){
        return $this->hasMany('App\Models\SO\Serviceorder');
    }

    public function sppheader(){
        return $this->hasMany('App\Models\Pengadaan\Spp\Sppheader');
    }

    public function bakesepakatan(){
        return $this->hasMany('App\Models\Pengadaan\Bakes\Bakesepakatan');
    }
}
