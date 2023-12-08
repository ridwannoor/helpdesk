<?php

namespace App\Models\Pengadaan\Bakes;

use Illuminate\Database\Eloquent\Model;

class Bakesepakatan extends Model
{
    protected $table = "bakesepakatans";
    protected $fillable = [
        'nomor_bak',
        'banegopengadaan_id',
        'tanggal',
        'bod_id',
        // 'vendorbod_id',
        'is_published',
        'user_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($bakesepakatans) {
            if(is_null($bakesepakatans->user_id)) {
                $bakesepakatans->user_id = auth()->user()->id;
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

    // public function vendorbod()
    // {
    //     return $this->belongsTo('App\Models\Vendorbod');
    // }

    public function bakesepakatanfile()
    {
        return $this->hasMany('App\Models\Pengadaan\Bakes\Bakesepakatanfile');
    }

    public function spkheader()
    {
        return $this->hasMany('App\Models\Pengadaan\Spk\Spkheader');
    }
}
