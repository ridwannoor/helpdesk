<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendorbank extends Model
{
    protected $table = 'vendorbanks';
    protected $fillable = ['vendor_id', 'bank_id', 'nomor_rek', 'nama_pemilik', 'image'];
    
    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor');
    }

    public function bank()
    {
        return $this->belongsTo('App\Models\Bank');
    }
}
