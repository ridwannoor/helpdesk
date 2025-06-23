<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = 'provinsis_cities';
    protected $fillable = ['city_name'];

    public function vendor(): HasMany
    {
        return $this->hasMany('App\Models\Vendor');
    }
}
