<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendorpengalamanfile extends Model
{
    protected $table = "vendorpengalamanfiles";
    protected $fillable = ['vendorpengalaman_id', 'file'];

    public function vendorpengalaman()
    {
        return $this->belongsTo('App\Models\Vendorpengalaman');
    }
}

