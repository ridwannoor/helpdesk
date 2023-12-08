<?php

namespace App\Models\Pengadaan\Spp;

use Illuminate\Database\Eloquent\Model;

class Sppheader extends Model
{
    protected $table = "sppheaders";
    protected $fillable = [
        'nomor_spp',
        'tanggal',
        'bidok',
        'banegopengadaan_id', 
        'is_published',    
        'bod_id',   
        'user_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($sppheaders) {
            if(is_null($sppheaders->user_id)) {
                $sppheaders->user_id = auth()->user()->id;
            }
        });
    }

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

    public function banegopengadaan()
    {
        return $this->belongsTo('App\Models\Pengadaan\Banego\Banegopengadaan');
    }

    public function bod()
    {
        return $this->belongsTo('App\Models\Bod');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function sppfile()
    {
        return $this->hasMany('App\Models\Pengadaan\Spp\Sppfile');
    }

    public function sppdetail()
    {
        return $this->hasMany('App\Models\Pengadaan\Spp\Sppdetail');
    }
}
