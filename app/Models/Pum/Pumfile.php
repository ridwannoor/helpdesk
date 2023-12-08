<?php

namespace App\Models\Pum;

use Illuminate\Database\Eloquent\Model;

class Pumfile extends Model
{
    protected $table = "pumfiles";
    protected $fillable = ['pumheader_id','filename'];

    public function pumheaders()
   {
       return $this->belongsTo('App\Models\Pum\Pumheader');
   }
}
