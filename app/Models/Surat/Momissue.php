<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Model;

class Momissue extends Model
{
    protected $table = "mom_issue";
    protected $fillable = ['issue','pembahasan','tindak_lanjut','batas_waktu','pic','status'];

//     public function notaheader()
//    {
//        return $this->belongsTo('App\Models\Surat\Notaheader');
//    }
}
