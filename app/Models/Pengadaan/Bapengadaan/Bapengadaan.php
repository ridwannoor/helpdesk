<?php

namespace App\Models\Pengadaan\Bapengadaan;

use Illuminate\Database\Eloquent\Model;

class Bapengadaan extends Model
{
    protected $table = "bapengadaans";
    protected $fillable = [
        'nomor_ba',
        'tanggal',       
        'lokasi_id',
        'lokasi_nego',
        'tgl_penawaran',
        'judul_pekerjaan',
        'is_published',
        'user_id'
    ];

    /**
     * The roles that belong to the Bapengadaan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($bapengadaans) {
            if(is_null($bapengadaans->user_id)) {
                $bapengadaans->user_id = auth()->user()->id;
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

    public function divisis()
    {
        return $this->belongsToMany('App\Models\Divisi');
    }

    public function vendors()
    {
        return $this->belongsToMany('App\Models\Vendor');
    }

    public function banegopengadaan()
    {
        return $this->hasMany('App\Models\Pengadaan\Banego\Banegopengadaan');
    }

    public function badetailpengadaans()
    {
        return $this->hasMany('App\Models\Pengadaan\Bapengadaan\Badetailpengadaan');
    }

    public function bapertanyaans()
    {
        return $this->hasMany('App\Models\Pengadaan\Bapengadaan\Bapertanyaan');
    }

    public function bafilepengadaans()
    {
        return $this->hasMany('App\Models\Pengadaan\Bapengadaan\Bafilepengadaan');
    }
 
    public function lokasi()
    {
        return $this->belongsTo('App\Models\Lokasi');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
