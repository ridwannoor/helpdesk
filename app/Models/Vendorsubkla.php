<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendorsubkla extends Model
{
    public $table = "vendorsubklas";
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'kode',
        'name',
    ];
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    // public function vendor()
    // {
    //     return $this->hasMany('App\Models\Vendor');
    // }

    public function vendorsertifikat()
    {
        return $this->hasMany('App\Models\Vendorsertifikat');
    }
}
