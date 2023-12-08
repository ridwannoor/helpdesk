<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bafile extends Model
{
    protected $table = "bafiles";
    protected $fillable = ['banego_id','filepdf'];

    public function banego()
   {
       return $this->belongsTo('App\Models\Banego');
   }
}
