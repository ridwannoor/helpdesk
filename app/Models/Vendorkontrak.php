<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendorkontrak extends Model
{
    protected $table = 'vendorkontraks';
    protected $fillable = [
        'vendor_id', 
        'name', 
        'pekerjaan', 
        'filepdf'
    ];

    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor');
    }
    
}
