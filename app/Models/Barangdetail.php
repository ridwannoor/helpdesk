<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barangdetail extends Model
{
    protected $table = 'barangdetails';
    protected $fillable = ['barang_id', 'filename'];
    
    public function barang()
    {
        return $this->belongsTo('App\Models\Barang');
    }
}
