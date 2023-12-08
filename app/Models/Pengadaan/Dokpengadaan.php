<?php

namespace App\Models\Pengadaan;

use Illuminate\Database\Eloquent\Model;

class Dokpengadaan extends Model
{
    protected $table = "dokpengadaans";
    protected $fillable = [ 'name' ];

    public function Fpdetail()
    {
        return $this->hasMany('App\Models\Pengadaan\Fpdetail');
    }
}
