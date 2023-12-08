<?php

namespace App\Models\Po;

use Illuminate\Database\Eloquent\Model;

class Pofile extends Model
{
    protected $table = "pofiles";
    protected $fillable = ['rekappo_id','filepdf'];

    public function rekappo()
   {
       return $this->belongsTo('App\Models\Po\Rekappo');
   }
}
