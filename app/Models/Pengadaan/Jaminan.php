<?php

namespace App\Models\Pengadaan;

use Illuminate\Database\Eloquent\Model;

class Jaminan extends Model
{
    protected $table = "jaminans";
    protected $fillable = [ 'name' ];

    public function banegopengadaan()
    {
        return $this->hasMany('App\Models\Pengadaan\Banegopengadaan');
    }

    public function banego()
    {
        return $this->hasMany('App\Models\Banego');
    }
}
