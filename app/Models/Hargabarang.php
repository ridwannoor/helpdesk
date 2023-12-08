<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Hargalist;

class Hargabarang extends Model
{
    // use SoftDeletes;

    protected $table = 'hargabarangs';
    protected $fillable = ['nama_brg', 'qty', 'satuan', 'currency_id', 'harga_lama', 'harga',  'image', 'lokasi_id', 'vendor_id','user_id'];
    // protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($hargabarang) {
            if(is_null($hargabarang->user_id)) {
                $hargabarang->user_id = auth()->user()->id;
            }
        });

    }

    public function potemps()
    {
        return $this->hasMany('App\Models\Po\Potemp');
    }

    public function dodetails()
    {
        return $this->hasMany('App\Models\Transaksi\Dodetail');
    }

    public function podetails()
    {
        return $this->hasMany('App\Models\Po\Podetail');
    }

    public function hbdetails()
    {
        return $this->hasMany('App\Models\Hbdetail');
    }



    public function hargalist()
    {
        return $this->hasOne('App\Models\Hargalist');
    }

    
    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor');
    }

    public function currency()
    {
        return $this->belongsTo('App\Models\Currency');
    }

    public function lokasi()
    {
        return $this->belongsTo('App\Models\Lokasi');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
 
}
