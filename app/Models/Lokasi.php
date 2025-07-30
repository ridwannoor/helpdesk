<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasis';
    protected $fillable = ['kode', 'detail'];

    public function rekappos()
    {
        return $this->hasMany('App\Models\Po\Rekappo');
    }
    public function ticket()
    {
        return $this->hasMany('App\Models\Ticket');
    }

    public function pums()
    {
        return $this->hasMany('App\Models\Pum\Pumheader');
    }

    public function lokasimail()
    {
        return $this->hasMany('App\Models\Lokasimail');
    }

    public function bapengadaan()
    {
        return $this->hasMany('App\Models\Pengadaan\Bapengadaan');
    }

    public function poheader()
    {
        return $this->hasMany('App\Models\Transaksi\Poheader');
    }

    public function doheaders()
    {
        return $this->hasMany('App\Models\Transaksi\Doheader');
    }

    public function barang()
    {
        return $this->hasMany('App\Models\Barang');
    }

    public function notaheader()
    {
        return $this->hasMany('App\Models\Surat\Notaheader');
    }

    // public function vendor(){
    //     return $this->hasMany('App\Models\Vendor');
    // }

    public function hargabarang()
    {
        return $this->hasMany('App\Models\Hargabarang');
    }

    public function serviceorders()
    {
        return $this->hasMany('App\Models\SO\serviceorder');
    }

    public function barangmutasi()
    {
        return $this->hasMany('App\Models\Barangmutasi');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'lokasi_user', 'user_id', 'lokasi_id');
    }

    public function tender()
    {
        return $this->hasMany('App\Models\Pengadaan\Tender');
    }
}
