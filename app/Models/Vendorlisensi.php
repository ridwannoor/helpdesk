<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Carbon\Carbon;

class Vendorlisensi extends Model
{
    // use Expirable;

    protected $table = 'vendorlisensis';
    protected $fillable = ['vendor_id', 'vendorjenis_id', 'keterangan', 'nomor', 'expired', 'penerbit', 'start', 'end', 'file', 'is_published'];
    

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

    public function vendorjenis()
    {
        return $this->belongsTo('App\Models\Vendorjenis');
    }
}
