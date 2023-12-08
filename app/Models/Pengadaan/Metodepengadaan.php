<?php

namespace App\Models\Pengadaan;

use Illuminate\Database\Eloquent\Model;

class Metodepengadaan extends Model
{
    protected $table = "metodepengadaans";
    protected $fillable = [ 
       'name'
    ];

    public function tender()
    {
        return $this->hasMany('App\Models\Pengadaan\Tender');
    }
}
