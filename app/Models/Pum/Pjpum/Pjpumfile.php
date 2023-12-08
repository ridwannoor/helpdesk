<?php

namespace App\Models\Pum\Pjpum;

use Illuminate\Database\Eloquent\Model;

class Pjpumfile extends Model
{
    protected $table = "pjpumfiles";
    protected $fillable = ['pjpumheader_id','filename'];

    public function pjpumheaders()
   {
       return $this->belongsTo('App\Models\Pum\Pjpum\Pjpumheader');
   }
}
