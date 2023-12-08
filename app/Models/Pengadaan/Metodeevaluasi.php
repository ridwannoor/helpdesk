<?php

namespace App\Models\Pengadaan;

use Illuminate\Database\Eloquent\Model;

class Metodeevaluasi extends Model
{
    protected $table = "metodeevaluasis";
    protected $fillable = [ 
       'name'
    ];

    public function tender()
    {
        return $this->hasMany('App\Models\Pengadaan\Tender');
    }
}
