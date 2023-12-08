<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itemdetail extends Model
{
    protected $table = "itemdetails";
    protected $fillable = ['vendor_id', 'filename'];

    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor');
    }
}


