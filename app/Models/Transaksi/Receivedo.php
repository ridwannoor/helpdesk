<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Model;

class Receivedo extends Model
{
   protected $table = 'receivedos';
   protected $id = 'id';
   protected $fillable = ['no_receive','doheader_id', 'is_published' ];

    public function doheaders()
    {
        return $this->hasMany('App\Models\Transaksi\Doheader');
    }

    public function receivedodetails()
    {
        return $this->belongsTo('App\Models\Transaksi\Receivedodetail');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
 
    public function scopeDrafted($query)
    {
        return $query->where('is_published', false);
    }
 
    public function getPublishedAttribute()
    {
        return ($this->is_published) ? 'Yes' : 'No';
    }

}
