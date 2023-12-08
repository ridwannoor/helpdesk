<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Model;

class Notafile extends Model
{
    protected $table = "notafiles";
    protected $fillable = ['notaheader_id','filename'];

    public function notaheader()
   {
       return $this->belongsTo('App\Models\Surat\Notaheader');
   }
}
