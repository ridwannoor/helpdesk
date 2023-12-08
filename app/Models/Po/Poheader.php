<?php

namespace App\Models\Po;

use Illuminate\Database\Eloquent\Model;

class Poheader extends Model
{
    protected $fillable = [
        'no_po',
        'no_kontrak', 
        'tanggal', 
        'start_date',
        'end_date',
        'nama_pekerjaan',
        'cara_bayar',
        'cara_bayar1',
        'pajak',
        'pajak1',
        'asuransi',
        'vendor_id',
        'lokasi_id',
        'currency_id',
        'user_id',
        'preference_id',
        'bod_id',
        'hargapabrik',
        'deskripsi',
        'suratpenawaran',
        'desc_tgl',
        'desc',
        'diskon',
        'biaya_kirim',
        'ppn',
        'total',
        'is_published'
        ];
    
        protected static function boot()
        {
            parent::boot();
    
            static::creating(function ($poheader) {
                if(is_null($poheader->user_id)) {
                    $poheader->user_id = auth()->user()->id;
                }
            });
    
        }
    
        // public function podetails()
        // {
        //     return $this->hasMany('App\Models\Po\Podetail');
        // }
    
        public function potemps()
        {
            return $this->hasMany('App\Models\Po\Potemp');
        }
    
        public function pofiles()
        {
            return $this->hasMany('App\Models\Po\Pofile');
        }
        public function preference()
        {
            return $this->belongsTo('App\Models\Preference');
        }
    
        public function bod()
        {
            return $this->belongsTo('App\Models\Bod');
        }
        
        public function currency()
        {
            return $this->belongsTo('App\Models\Currency');
        }

        public function user()
        {
            return $this->belongsTo('App\Models\User');
        }
        
        public function lokasi()
        {
            return $this->belongsTo('App\Models\Lokasi');
        }
    
        public function vendor()
        {
            return $this->belongsTo('App\Models\Vendor');
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
            return ($this->is_published) ? 'Yes' : 'No';
        }
}
