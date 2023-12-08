<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barangmutasi extends Model
{
    protected $table = 'barangmutasis';
    protected $fillable = ['barang_id', 'lokasi_id', 'checkout_date','expected_checkin_date', 'catatan', 'image', 'user_id'];
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($barangmutasis) {
            if(is_null($barangmutasis->user_id)) {
                $barangmutasis->user_id = auth()->user()->id;
            }
        });
    }
        
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function lokasi()
    {
        return $this->belongsTo('App\Models\Lokasi');
    }

    public function barang()
    {
        return $this->belongsTo('App\Models\Barang');
    }
}
