<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Model;

class Notaheader extends Model
{
    protected $table = 'notaheaders';
    protected $fillable = 
    [
        'no_nodin', 
        'nama_pek', 
        'tgl_terima', 
        'tgl_surat',
        'unit_st',      
        'divisi_id',
        'lokasi_id', 
        'pic',     
        'pic_off',   
        'user_id',
        'status',
        'keterangan',
        'kesimpulan'
        // 'is_published'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($notaheaders) {
            if(is_null($notaheaders->user_id)) {
                $notaheaders->user_id = auth()->user()->id;
            }
        });
    }

    public function divisi()
    {
        return $this->belongsTo('App\Models\Divisi');
    }

    // public function lokasi()
    // {
    //     return $this->belongsTo('App\Models\Lokasi');
    // }

    public function notafile()
    {
        return $this->hasMany('App\Models\Surat\Notafile');
    }

    public function notatimelines()
    {
        return $this->hasMany('App\Models\Surat\Notatimelines');
    }
}
