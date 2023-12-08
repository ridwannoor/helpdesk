<?php

namespace App\Models\Kontrak;

use Illuminate\Database\Eloquent\Model;

class Kontrakfile extends Model
{
    protected $table = "kontrakfiles";
    protected $fillable = [ 
       'kontrakhead_id',
       'filepdf'
    ];

    public function kontrakhead()
    {
        return $this->belongsTo('App\Models\Kontrak\Kontrakhead');
    }
}
