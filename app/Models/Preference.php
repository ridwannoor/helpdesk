<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    protected $table = 'preferences';
    protected $fillable = ['nama_perusahaan', 'email', 'address', 'image', 'logo', 'phone'];

    public function doheaders()
    {
        return $this->hasMany('App\Models\Transaksi\Doheader');
    }

    public function rekappos()
    {
        return $this->hasMany('App\Models\Transaksi\Rekappo');
    }

    public function banegos()
    {
        return $this->hasMany('App\Models\Banego');
    }

    public function serviceorders()
    {
        return $this->hasMany('App\Models\SO\serviceorder');
    }
}
