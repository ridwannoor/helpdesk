<?php

namespace App\Models\Pengadaan;

use Illuminate\Database\Eloquent\Model;

class Statustender extends Model
{
    protected $table = "statustenders";
    protected $fillable = [ 
       'name'
    ];

    public function tender()
    {
        return $this->hasMany('App\Models\Pengadaan\Tender');
    }

}
