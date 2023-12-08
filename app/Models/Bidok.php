<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bidok extends Model
{
    protected $table = "bidoks";
    protected $fillable = [ 'name' ];


    public function banego()
    {
        return $this->hasMany('App\Models\Banego');
    }
}
