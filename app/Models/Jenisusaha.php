<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vendor;

class Jenisusaha extends Model
{
    protected $table = 'jenisusahas';
    protected $fillable = ['kode', 'detail'];

    public function vendors(){
        return $this->belongsToMany('App\Models\Vendor');
    }
}
