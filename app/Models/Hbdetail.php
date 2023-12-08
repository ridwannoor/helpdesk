<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hbdetail extends Model
{
    protected $table = 'hbdetails';
    protected $fillable = ['hargabarang_id', 'doheader_id', 'qty',  'status' ];

    public function hargabarang()
    {
        return $this->belongsTo('App\Models\Hargabarang');
    }

    public function doheader()
    {
        return $this->belongsTo('App\Models\Transaksi\Doheader');
    }

    public function scopePublished($query)
    {
        return $query->where(['status'], true);
    }

    public function scopeDrafted($query)
    {
        return $query->where(['status'], false);
    }
 
    public function getPublishedAttribute()
    {
        return ([$this->status]) ? 'Yes' : 'No';
    }

    
}
