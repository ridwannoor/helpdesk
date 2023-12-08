<?php

namespace App\Models\SO;

use Illuminate\Database\Eloquent\Model;

class Serviceorder extends Model
{
    protected $table = 'serviceorders';
    protected $fillable = 
    [
        'no_so', 
        'tanggal', 
        'start_date',
        'end_date', 
        'preference_id',
        'lokasi_id', 
        'vendor_id', 
        'bod_id',
        'nama_pek',  
        'no_kontrak', 
        'tgl_kontrak',
        'user_id',
        'is_published'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($doheader) {
            if(is_null($doheader->user_id)) {
                $doheader->user_id = auth()->user()->id;
            }
        });
    }

    public function sodetails()
    {
        return $this->hasMany('App\Models\SO\Sodetail');
    }
 
    public function sofiles()
    {
        return $this->hasMany('App\Models\SO\Sofile');
    }

    
   public function vendor()
   {
       return $this->belongsTo('App\Models\Vendor');
   }

   public function user()
   {
       return $this->belongsTo('App\Models\User');
   }

   public function lokasi()
   {
       return $this->belongsTo('App\Models\Lokasi');
   }

   public function preference()
   {
       return $this->belongsTo('App\Models\Preference');
   }

   public function bod()
   {
       return $this->belongsTo('App\Models\Bod');
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
