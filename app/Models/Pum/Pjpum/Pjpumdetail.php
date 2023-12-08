<?php

namespace App\Models\Pum\Pjpum;

use Illuminate\Database\Eloquent\Model;

class Pjpumdetail extends Model
{
    protected $table = 'pjpumdetails';
    protected $id = 'id';
    protected $fillable = ['pjpumheader_id','deskripsi', 'jumlah'];

    public function pjpumheaders()
    {
        return $this->belongsTo('App\Models\Pum\Pjpum\Pumheader');
    }

    // public function pjumfiles()
    // {
    //     return $this->belongsTo('App\Models\Pum\Pjpum\Pumfile');
    // }
}
