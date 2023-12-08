<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendorsertifikat extends Model
{
    protected $table = 'vendorsertifikats';
    protected $fillable = ['vendor_id', 'vendorklasifikasi_id', 'vendorsubkla_id', 'expired', 'nomor', 'berlaku_start', 'berlaku_end', 'keterangan', 'file', 'is_published'];
    

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

    public function vendorklasifikasi()
    {
        return $this->belongsTo('App\Models\Vendorklasifikasi');
    }

    public function vendorsubkla()
    {
        return $this->belongsTo('App\Models\Vendorsubkla');
    }
}
