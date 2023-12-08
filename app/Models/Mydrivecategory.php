<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mydrivecategory extends Model
{
    protected $table = 'mydrivecategorys';
    protected $fillable = ['title'];


    public function mydrive()
    {
        return $this->hasMany('App\Models\Mydrive');
    }
}
