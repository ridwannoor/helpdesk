<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendorpengalaman extends Model
{
    protected $table = 'vendorpengalamans';
    protected $fillable = ['vendor_id', 'nama_pek', 'vendorklasifikasi_id', 'no_kontrak', 'tgl_kontrak', 'owner', 'lokasi','nilai', 'tgl_selesai', 'tgl_bast',  'is_published'];
    

    public function scopePublished($query)
    {
        return $query->where(['is_published'], true);
    }

    public function scopeDrafted($query)
    {
        return $query->where(['is_published'], false);
    }
 
    public function getPublishedAttribute()
    {
        return ([$this->is_published]) ? 'Yes' : 'No';
    }

    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor');
    }
    
    // public function currency()
    // {
    //     return $this->belongsTo('App\Models\Currency');
    // }
    
    public function vendorklasifikasi()
    {
        return $this->belongsTo('App\Models\Vendorklasifikasi');
    }

    public function vendorpengalamanfile()
    {
        return $this->hasMany('App\Models\Vendorpengalamanfile');
    }
}
