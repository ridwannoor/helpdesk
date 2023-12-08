<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vendor;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['kode', 'detail'];

    public function vendors(){
        return $this->belongsToMany('App\Models\Vendor');
    }
}
