<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banego extends Model
{
    protected $table = 'banegos';
    protected $fillable = 
    [
    'nama_pek', 
    'no_ba', 
    'lokasi_nego',
    'tanggal',   
    'spph', 
    'jml_penawaran',
    'nilai_rap',
    // 'spph_nego',
    'start_date',
    'end_date',
    'jaminan_id',
    'jml_nego',
    'pajak',
    'waktu_pel',
    'garansi',
    'asuransi',
    'masapemeliharaan',
    'tempat',
    'pengirim',
    'training',
    'cara_pembayaran',
    'downpayment',
    'nilaidp',
    'bidok_id',
    'po',
    'spk',
    'kontrak',
    'catatan',
    'is_published',
    'vendor_id',
    'user_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($banegos) {
            if(is_null($banegos->user_id)) {
                $banegos->user_id = auth()->user()->id;
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where(['is_published'], true);
    }

    public function bafiles()
    {
        return $this->hasMany('App\Models\Bafile');
    }
 
    public function scopeDrafted($query)
    {
        return $query->where(['is_published'], false);
    }
 
    public function getPublishedAttribute()
    {
        return ([$this->is_published]) ? 'Yes' : 'No';
    }

    public function vendor(){
        return $this->belongsTo('App\Models\Vendor');
    }

    public function jaminan(){
        return $this->belongsTo('App\Models\Pengadaan\Jaminan');
    }

    public function bidok(){
        return $this->belongsTo('App\Models\Bidok');
    }

    public function divisis(){
        return $this->belongsToMany('App\Models\Divisi');
    }

    public function dokpekerjaans(){
        return $this->belongsToMany('App\Models\Dokpekerjaan');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function preference()
    {
        return $this->belongsTo('App\Models\Preference');
    }
}
