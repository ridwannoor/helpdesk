<?php

namespace App\Models\Pum\Pjpum;

use Illuminate\Database\Eloquent\Model;

class Pjpumheader extends Model
{
    protected $table = 'pjpumheaders';
    protected $fillable = 
    [
        'no_pjpum', 
        'pumheader_id',
        'tanggal',  
        'total',
        'membuat',
        'mengetahui',
        'user_id',
        'is_published'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pjpumheader) {
            if(is_null($pjpumheader->user_id)) {
                $pjpumheader->user_id = auth()->user()->id;
            }
        });
    }

    public function pumheader()
    {
        return $this->belongsTo('App\Models\Pum\Pumheader');
    }


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function pjpumdetails()
    {
        return $this->hasMany('App\Models\Pum\Pjpum\Pjpumdetail');
    }
 
    public function pjpumfiles()
    {
        return $this->hasMany('App\Models\Pum\Pjpum\Pjpumfile');
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
