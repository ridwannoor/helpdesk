<?php

namespace App\Models\Pengadaan;

use Illuminate\Database\Eloquent\Model;

class Timelinefile extends Model
{
    protected $table = "timelinefiles";
    protected $fillable = ['timeline_id','filepdf'];

    public function timeline()
   {
       return $this->belongsTo('App\Models\Pengadaan\Timeline');
   }
}
