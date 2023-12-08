<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'banks';
    protected $fillable = ['name', 'code'];

    public function vendor(){
        return $this->hasMany('App\Models\Vendor');
    }

    public function vendorbank()
    {
        return $this->hasMany('App\Models\Vendorbank');
    }
}
