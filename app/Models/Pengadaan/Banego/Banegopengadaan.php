<?php

namespace App\Models\Pengadaan\Banego;

use Illuminate\Database\Eloquent\Model;

class Banegopengadaan extends Model
{
    protected $table = "banegopengadaans";
    protected $fillable = [
        'nomor_ba',
        'nilai_rap',
        'judul_pekerjaan',
        'tanggal',
        'vendor_id', 
        'dasar_id',
        'lokasi_nego',
        'spph',
        'tgl_sph',       
        'jumlah penawaran',
        'pajak_rap',    
        'jumlah_nego',  
        'jaminandp',
        'jaminandp1',
        'jaminandp2', 
        'jaminan_id',
        'kontrak_id',
        'jawa_pel',
        'jawa_pem',
        'catatan',
        'is_published',
        'user_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($banegopengadaans) {
            if(is_null($banegopengadaans->user_id)) {
                $banegopengadaans->user_id = auth()->user()->id;
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

    public function sppheader()
    {
        return $this->hasMany('App\Models\Pengadaan\Spp\Sppheader');
    }

    public function divisis()
    {
        return $this->belongsToMany('App\Models\Divisi');
    }
   
    public function jaminan()
    {
        return $this->belongsTo('App\Models\Pengadaan\Jaminan');
    }

    public function dasar()
    {
        return $this->belongsTo('App\Models\Dasar');
    }
    
    public function kontrak()
    {
        return $this->belongsTo('App\Models\Pengadaan\Kontrak');
    }

    public function bapengadaan()
    {
        return $this->belongsTo('App\Models\Pengadaan\Bapengadaan\Bapengadaan');
    }

    public function banegopengadaanfile()
    {
        return $this->hasMany('App\Models\Pengadaan\Banego\Banegopengadaanfile');
    }

    public function banegodetail()
    {
        return $this->hasMany('App\Models\Pengadaan\Banego\Banegodetail');
    }

    public function bakesepakatan()
    {
        return $this->hasMany('App\Models\Pengadaan\Bakes\Bakesepakatan');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
