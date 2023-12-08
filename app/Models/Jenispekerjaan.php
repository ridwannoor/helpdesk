<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenispekerjaan extends Model
{
    protected $table = 'jenispekerjaans';
    protected $fillable = ['name'];

    public function formpengadaan()
    {
        return $this->hasMany('App\Models\Pengadaan\Formpengadaan');
    }

    public function vendors(){
        return $this->belongsToMany('App\Models\Vendor');
    }
    
    public function tenders()
    {
        return $this->belongsToMany('App\Models\Pengadaan\Tender');
    }
}
