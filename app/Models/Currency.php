<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currencies';
    protected $fillable = ['name', 'negara'];

    public function hargabarang()
    {
        return $this->hasMany('App\Models\Hargabarang');
    }

    public function rekappo()
    {
        return $this->hasMany('App\Models\Po\Rekappo');
    }

    public function vendorpengalaman()
    {
        return $this->hasMany('App\Models\Vendorpengalaman');
    }
}
