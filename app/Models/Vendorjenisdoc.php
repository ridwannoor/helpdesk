<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendorjenisdoc extends Model
{
    protected $table = 'vendorjenisdocs';
    protected $fillable = ['keterangan'];
    

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

    public function vendordoc()
    {
        return $this->hasMany('App\Models\Vendordoc');
    }
}
