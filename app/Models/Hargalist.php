<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hargabarang;

class Hargalist extends Model
{
    protected $table = 'hargalists';
    protected $fillable = ['hargabarang_id', 'hargabaru','hargalama'];
    
    public function hargabarang()
    {
        return $this->belongsTo('App\Models\Hargabarang');
    }
 
}
