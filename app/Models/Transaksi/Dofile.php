<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Model;

class Dofile extends Model
{
    protected $table = "dofiles";
    protected $fillable = ['doheader_id','filename'];

    public function doheaders()
   {
       return $this->belongsTo('App\Models\Transaksi\Doheader');
   }
}
