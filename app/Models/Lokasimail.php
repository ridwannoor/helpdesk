<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasimail extends Model
{
    protected $table = 'lokasimails';
    protected $fillable = ['lokasi_id', 'name', 'email'];

    public function lokasi()
    {
        return $this->belongsTo('App\Models\Lokasi');
    }
}
