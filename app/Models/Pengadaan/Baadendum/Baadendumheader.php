<?php

namespace App\Models\Pengadaan\Baadendum;

use Illuminate\Database\Eloquent\Model;

class Baadendumheader extends Model
{
    protected $table = "baadendumheaders";
    protected $fillable = [
        'nomor_ba',
        'banegopengadaan_id',
        'tanggal',
        'vendor_id', 
        'lokasi_nego',
        'rap',
        'nilai_kontrak',
        'jumlah',     
        'jumlah_nego', 
        'ba_evaluasi',
        'tgl_ba', 
        'detail',
        'jangka_waktu',
        'cara_bayar',
        'is_published',
        'user_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($baadendumheaders) {
            if(is_null($baadendumheaders->user_id)) {
                $baadendumheaders->user_id = auth()->user()->id;
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

    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor');
    }

    public function divisis()
    {
        return $this->belongsToMany('App\Models\Divisi');
    }
   
    public function banegopengadaan()
    {
        return $this->belongsTo('App\Models\Pengadaan\Banego\Banegopengadaan');
    }

    public function baadendumfile()
    {
        return $this->hasMany('App\Models\Pengadaan\Baadendum\Baadendumfile');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
