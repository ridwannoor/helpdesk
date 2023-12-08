<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendorpengurus extends Model
{
    protected $table = 'vendorpengurus';
    protected $fillable = ['vendor_id', 'nama','jabatan', 'telp', 'nik', 'npwp', 'kewarganegaraan', 'file', 'ttd', 'status', 'is_published'];
    

    public function scopePublished($query)
    {
        return $query->where(['is_published', 'ttd'], true);
    }

    public function scopeDrafted($query)
    {
        return $query->where(['is_published', 'ttd'], false);
    }
 
    public function getPublishedAttribute()
    {
        return ([$this->is_published, $this->ttd]) ? 'Yes' : 'No';
    }

    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor');
    }
}
