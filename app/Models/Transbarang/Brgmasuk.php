<?php

namespace App\Models\Transbarang;

use Illuminate\Database\Eloquent\Model;

class Brgmasuk extends Model
{
    protected $table = "brgmasuks";
    protected $fillable = ['no_trans', 'tanggal', 'user_id', 'notes'];

    public function brgmasukdetails(){
        return $this->belongsTo('App\Models\Transbarang\Brgmasukdetail');
    }

    public function users(){
        return $this->belongsTo('App\Models\User');
    }
}
