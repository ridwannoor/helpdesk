<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendordoc extends Model
{
    protected $table = 'vendordocs';
    protected $fillable = ['vendor_id', 'vendorjenisdoc_id', 'keterangan', 'file' , 'is_published'];
    

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

    public function vendorjenisdoc()
    {
        return $this->belongsTo('App\Models\Vendorjenisdoc');
    }
}
