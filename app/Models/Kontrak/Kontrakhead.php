<?php

namespace App\Models\Kontrak;

use Illuminate\Database\Eloquent\Model;

class Kontrakhead extends Model
{
    protected $table = "kontrakheads";
    protected $fillable = [ 
       'no_kontrak',
       'rekappo_id',
       'tanggal',
       'jenis',
        'is_published'
    ];

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
        return ($this->is_published) ? 'Yes' : 'No';
    }

    public function kontrakfile()
    {
        return $this->hasMany('App\Models\Kontrak\Kontrakfile');
    }

    public function rekappo()
    {
        return $this->belongsTo('App\Models\Po\Rekappo');
    }
}
