<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi\Doheader;

class Doheader extends Model
{
   protected $table = 'doheaders';
   protected $id = 'id';
   protected $fillable = [
       'no_do',
       'tanggal', 
       'perihal', 
       'user_id', 
       'lokasi_id', 
       'vendor_id', 
       'preference_id',
       'lokasi_pengambilan', 
       'tujuan_pengiriman', 
       'tanggal_sampai', 
       'ket_pengiriman', 
       'ref_po', 
       'tgl_mulai', 
       'tgl_akhir',
       'tanggal_terima', 
       'tgl_pengiriman',
       'is_published', 
       'is_published_ro' 
    ];
//    protected $dateFormat = 'Y-M-d H:i:s';
   
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($doheader) {
            if(is_null($doheader->user_id)) {
                $doheader->user_id = auth()->user()->id;
            }
        });

    }
   public function dodetails()
   {
       return $this->hasMany('App\Models\Transaksi\Dodetail');
   }

   public function dofiles()
   {
       return $this->hasMany('App\Models\Transaksi\Dofile');
   }


   public function receivedos()
   {
       return $this->belongsTo('App\Models\Transaksi\Receivedo');
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

   public function hbdetails()
   {
       return $this->hasMany('App\Models\Hbdetail');
   }

   public function scopePublished($query)
   {
       return $query->where(['is_published','is_published_ro'], true);
   }

   public function scopeDrafted($query)
   {
       return $query->where(['is_published','is_published_ro'], false);
   }

   public function getPublishedAttribute()
   {
       return ([$this->is_published, $this->is_published_ro]) ? 'Yes' : 'No';
   }

  
}
