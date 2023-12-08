<?php

namespace App\Models\SO;

use Illuminate\Database\Eloquent\Model;

class Sofile extends Model
{
    protected $table = "sofiles";
    protected $fillable = ['serviceorder_id','filename'];

    public function serviceorders()
   {
       return $this->belongsTo('App\Models\SO\Serviceorder');
   }
}
