<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendorklasifikasi extends Model
{
     public $table = "vendorklasifikasis";
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'kode',
        'name',
    ];
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    // public function vendor()
    // {
    //     return $this->belongsTo(Vendor::class);
    // }

    public function vendorsertifikat()
    {
        return $this->hasMany('App\Models\Vendorsertifikat');
    }

    public function vendorpengalaman()
    {
        return $this->hasMany('App\Models\Vendorpengalaman');
    }

    public function tenderdetail()
    {
        return $this->hasMany('App\Models\Pengadaan\Tenderdetail');
    }
}
