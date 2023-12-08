<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Badanusaha extends Model
{
    protected $table = 'badanusahas';
    protected $fillable = ['kode', 'detail'];

    public function vendor(){
        return $this->hasMany('App\Models\Vendor');
    }
}
