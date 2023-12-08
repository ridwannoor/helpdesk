<?php

namespace App\Models\Transbarang;

use Illuminate\Database\Eloquent\Model;

class Brgmasukdetail extends Model
{
    protected $table = "brgmasukdetails";
    protected $fillable = ['brgmasuk_id', 'barang_id', 'total'];

    public function brgmasuks(){
        return $this->hasMany('App\Models\Transbarang\Brgmasuk');
    }

    public function barangs(){
        return $this->hasMany('App\Models\Barang');
    }
}
