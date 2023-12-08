<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendorfasilitas extends Model
{
    protected $table = 'vendorfasilitas';
    protected $fillable = ['vendor_id',  'kepemilikan', 'nama', 'spesifikasi', 'jumlah', 'thn_pembuatan', 'lokasi', 'file', 'is_published'];
    

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

    // public function vendortipe()
    // {
    //     return $this->belongsTo('App\Models\Vendortipe');
    // }
}
