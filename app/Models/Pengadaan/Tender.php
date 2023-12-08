<?php

namespace App\Models\Pengadaan;

use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    protected $table = "tenders";
    protected $fillable = [ 
        'nomor_pr', 
        'nama_paket', 
        'tgl_paket', 
        'tgl_daftar', 
        'uraian_pek', 
        'lokasi_id',
        'anggaran_id',
        'dasar_id',
        'jenis_pekerjaan_id',
        'metodepengadaan_id',
        'metodeevaluasi_id',
        'statustender_id',
        'pagu',
        'lokasi_pekerjaan',
        'divisi_id',
        'tgl_tutup',        
        // 'tutup_tender',
        'nilai',
        'catatan',
        'catender',
        'jangka_pelaksanaan',
        'jangka_pemeliharaan',
        'jaminan_pelaksanaan', 
        'is_approval',
        'is_published'
    ];

    public function scopePublished($query)
    {
        return $query->where(['is_published', 'is_approval'], true);
    }
 
    public function scopeDrafted($query)
    {
        return $query->where(['is_published', 'is_approval'], false);
    }
 
    public function getPublishedAttribute()
    {
        return ([$this->is_published, $this->is_approval]) ? 'Yes' : 'No';
    }

    public function setCategoryAttribute($value)
    {
        $this->attributes['catender'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['catender'] = json_decode($value);
    }

    public function tenderdetail()
    {
        return $this->hasMany('App\Models\Pengadaan\Tenderdetail');
    }

    public function tenderfile()
    {
        return $this->hasMany('App\Models\Pengadaan\Tenderfile');
    }

    public function timeline()
    {
        return $this->hasMany('App\Models\Pengadaan\Timeline');
    }

    public function tendernodin()
    {   
        return $this->hasMany('App\Models\Pengadaan\Tendernodin');
    }   

    public function metodepengadaan()
    {
        return $this->belongsTo('App\Models\Pengadaan\Metodepengadaan');
    }

    public function metodeevaluasi()
    {
        return $this->belongsTo('App\Models\Pengadaan\Metodeevaluasi');
    }

    public function dasar()
    {
        return $this->belongsTo('App\Models\Dasar');
    }

    public function tenderpenawaran()
    {
        return $this->hasMany('App\Models\Pengadaan\Tenderpenawaran');
    } 

    public function tenderquot()
    {
        return $this->hasMany('App\Models\Pengadaan\Tenderquot');
    } 

    public function syarattender()
    {
        return $this->hasMany('App\Models\Pengadaan\Syarattender');
    } 
    
    public function tendersyarat()
    {
        return $this->hasMany('App\Models\Pengadaan\Tendersyarat');
    } 

    public function jenispekerjaans()
    {
        return $this->belongsToMany('App\Models\Jenispekerjaan');
    }

    public function lokasi()
    {
        return $this->belongsTo('App\Models\Lokasi');
    }

    public function divisi()
    {
        return $this->belongsTo('App\Models\Divisi');
    }

    public function statustender()
    {
        return $this->belongsTo('App\Models\Pengadaan\Statustender');
    }

    public function anggaran()
    {
        return $this->belongsTo('App\Models\Anggaran');
    }

}
