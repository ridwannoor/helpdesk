<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipemaintenance extends Model
{
    protected $table = 'tipemaintenances';
    protected $fillable = ['kode', 'detail'];

    public function barangmaintenance()
    {
        return $this->hasMany('App\Models\Barangmaintenance');
    }
}
