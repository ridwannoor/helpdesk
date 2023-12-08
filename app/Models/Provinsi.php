<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsis';
    protected $fillable = ['name'];

   
    public function vendor(): HasMany
    {
        return $this->hasMany('App\Models\Vendor');
    }
}
    