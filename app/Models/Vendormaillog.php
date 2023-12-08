<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendormaillog extends Model
{
    protected $table = 'vendormaillogs';
    protected $fillable = [
        'vendor_id', 
        'name', 
        'deskripsi'
    ];

    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor');
    }
}
