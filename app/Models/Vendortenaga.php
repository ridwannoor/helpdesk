<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendortenaga extends Model
{
    protected $table = 'vendortenagas';
    protected $fillable = ['vendor_id', 'nama', 'status', 'pendidikan', 'keahlian', 'pengalaman', 'file', 'is_published'];
    

    public function scopePublished($query)
    {
        return $query->where(['is_publstatusished'], true);
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
}
