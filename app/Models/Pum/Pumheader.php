<?php

namespace App\Models\Pum;

use Illuminate\Database\Eloquent\Model;

class Pumheader extends Model
{
    protected $table = 'pumheaders';
    protected $fillable = 
    [
        'no_pum', 
        'tanggal',  
        'preference_id',
        'lokasi_id', 
        'bod_id',
        'divisi_id',
        'divisi1_id',
        'nama_pek', 
        'user_id',
        'total',
        'is_published'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pumheader) {
            if(is_null($pumheader->user_id)) {
                $pumheader->user_id = auth()->user()->id;
            }
        });
    }

    public function pumdetails()
    {
        return $this->hasMany('App\Models\Pum\Pumdetail');
    }
 
    public function pumfiles()
    {
        return $this->hasMany('App\Models\Pum\Pumfile');
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

    
//    public function vendor()
//    {
//        return $this->belongsTo('App\Models\Vendor');
//    }

   public function user()
   {
       return $this->belongsTo('App\Models\User');
   }

   public function pjpumheader()
    {
        return $this->hasMany('App\Models\Pum\Pjpum\Pumheader');
    }

   public function lokasi()
   {
       return $this->belongsTo('App\Models\Lokasi');
   }

   public function preference()
   {
       return $this->belongsTo('App\Models\Preference');
   }

   public function divisi()
   {
       return $this->belongsTo('App\Models\Divisi');
   }

   public function divisi1()
   {
       return $this->belongsTo('App\Models\Divisi');
   }


   public function bod()
   {
       return $this->belongsTo('App\Models\Bod');
   }
}
