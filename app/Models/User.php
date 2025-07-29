<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userdetails()
    {
        return $this->hasMany('App\Models\Userdetail');
    }

    public function hargabarangs()
    {
        return $this->hasMany('App\Models\Hargabarang');
    }

    public function shoppingcart()
    {
        return $this->hasMany('App\Models\Orderlist\Shoppingcart');
    }

    public function orderdetails()
    {
        return $this->hasMany('App\Models\Orderlist\Orderdetail');
    }

    public function orderheaders()
    {
        return $this->hasMany('App\Models\Orderlist\Orderheader');
    }

    public function pjpumheaders()
    {
        return $this->hasMany('App\Models\Pum\Pjpum\Pjpumheader');
    }
    public function pumheaders()
    {
        return $this->hasMany('App\Models\Pum\Pumheader');
    }

    public function logactivity()
    {
        return $this->hasMany('App\Models\LogActivity');
    }
    // public function vendor(){
    //     return $this->hasMany('App\Models\Vendor');
    // }

    public function lokasis()
    {
        return $this->belongsToMany('App\Models\Lokasi', 'lokasi_user', 'user_id', 'lokasi_id');
    }

    public function baadendumheaders()
    {
        return $this->hasMany('App\Models\Pengadaan\Baadendum\Baadendumheader');
    }

    public function banegopengadaans()
    {
        return $this->hasMany('App\Models\Pengadaan\Banego\Banegopengadaan');
    }

    public function bapengadaans()
    {
        return $this->hasMany('App\Models\Pengadaan\Bapengadaan\Bapengadaan');
    }

    public function spkheaders()
    {
        return $this->hasMany('App\Models\Pengadaan\Spk\Spkheader');
    }

    public function sppheaders()
    {
        return $this->hasMany('App\Models\Pengadaan\Spp\Sppheader');
    }

    // public function data()
    // {
    // // Setiap user akan memiliki banyak data
    //     return $this->hasMany('App\Data','user_id');
    // }

    public function barangs()
    {
        return $this->hasMany('App\Models\Barang');
    }

    public function doheaders()
    {
        return $this->hasMany('App\Models\Transaksi\Doheader');
    }
    public function rekappos()
    {
        return $this->hasMany('App\Models\Po\Rekappo');
    }

    // public function podetails()
    // {
    //     return $this->hasMany('App\Models\Po\Podetail');
    // }

    // public function potemps()
    // {
    //     return $this->hasMany('App\Models\Po\Potemp');
    // }

    public function poheaders()
    {
        return $this->hasMany('App\Models\Po\Poheader');
    }

    public function barangmutasi()
    {
        return $this->hasMany('App\Models\Barangmutasi');
    }

    public function barangmaintenance()
    {
        return $this->hasMany('App\Models\Barangmaintenance');
    }

    public function banego()
    {
        return $this->hasMany('App\Models\Banego');
    }

    public function ticket()
    {
        return $this->hasMany('App\Models\Ticket');
    }
}
