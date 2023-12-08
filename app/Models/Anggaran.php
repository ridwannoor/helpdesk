<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    protected $table = 'anggarans';
    protected $fillable = ['kode', 'detail'];

    public function tender(){
        return $this->hasMany('App\Models\Pengadaan\Tender');
    }
    
}
