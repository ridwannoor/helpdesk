<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Model;

class Moms extends Model
{
    protected $table = 'moms';
    protected $fillable = 
    [
        'tgl_jam_rapat', 
        'lokasi', 
        'peserta_rapat', 
        'nama_agenda',
        'attach_file'
        // 'is_published'
    ];

    protected static function boot()
    {
        parent::boot();

        // static::creating(function ($notaheaders) {
        //     if(is_null($notaheaders->user_id)) {
        //         $notaheaders->user_id = auth()->user()->id;
        //     }
        // });
    }

    public function divisi()
    {
        return $this->belongsTo('App\Models\Divisi');
    }

    // public function lokasi()
    // {
    //     return $this->belongsTo('App\Models\Lokasi');
    // }

    public function momissue()
    {
        return $this->hasMany('App\Models\Surat\Momissue');
    }
}
