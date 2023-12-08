<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokpekerjaan extends Model
{
    protected $table = 'dokpekerjaans';
    protected $fillable = ['kode', 'detail'];

    public function banegos(){
        return $this->belongsToMany('App\Models\Banego');
    }
}
