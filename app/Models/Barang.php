<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';
    protected $fillable = 
    [
        'nama_brg', 
        'asset_id',
        'start_date',
        'end_date',
        'aset_tag', 
        'serial',
        'merk',
        'tipe',
        'category',
        'kondisi',
        'tgl_pembelian', 
        'image',  
        'catatan',
        'status', 
        'vendor_id',
        'lokasi_id', 
        // 'is_published',
        'user_id'
    ];
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($barang) {
            if(is_null($barang->user_id)) {
                $barang->user_id = auth()->user()->id;
            }
        });

    }

    // public function scopePublished($query)
    // {
    //     return $query->where(['is_published'], true);
    // }

    
    // public function scopeDrafted($query)
    // {
    //     return $query->where(['is_published'], false);
    // }
 
    // public function getPublishedAttribute()
    // {
    //     return ([$this->is_published]) ? 'Yes' : 'No';
    // }

    public function lokasi()
    {
        return $this->belongsTo('App\Models\Lokasi');
    }

    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function barangmaintenance()
    {
        return $this->hasMany('App\Models\Barangmaintenance');
    }

    public function barangmutasi()
    {
        return $this->hasMany('App\Models\Barangmutasi');
    }
 
    public function barangdetail()
    {
        return $this->hasMany('App\Models\Barangdetail');
    }

}
