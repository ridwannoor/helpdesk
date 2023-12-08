<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendorbod extends Model
{
    protected $table = 'vendorbods';
    protected $fillable = ['vendor_id', 'nama', 'jabatan', 'status', 'is_published'];
    

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

    // public function bakesepakatan()
    // {
    //     return $this->hasMany('App\Models\Pengadaan\Bakes\Bakesepakatan');
    // }

}
