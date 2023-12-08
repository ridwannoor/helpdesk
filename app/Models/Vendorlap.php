<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendorlap extends Model
{
    protected $table = 'vendorlaps';
    protected $fillable = ['vendor_id', 'thn', 'keterangan', 'file', 'is_published'];
    

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

}
