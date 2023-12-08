<?php

namespace App\Models\Pengadaan\Spk;

use Illuminate\Database\Eloquent\Model;

class Spkheader extends Model
{
    protected $table = "spkheaders";
    protected $fillable = [
        'nomor_spk',
        'bakesepakatan_id',
        'tanggal',
        'divisi_id',
        'is_published',
        'user_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($spkheaders) {
            if(is_null($spkheaders->user_id)) {
                $spkheaders->user_id = auth()->user()->id;
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

    public function bakesepakatan()
    {
        return $this->belongsTo('App\Models\Pengadaan\Bakes\Bakesepakatan');
    }

    public function spkfile()
    {
        return $this->hasMany('App\Models\Pengadaan\Spk\Spkfile');
    }

    public function divisi()
    {
        return $this->belongsTo('App\Models\Divisi');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
}
