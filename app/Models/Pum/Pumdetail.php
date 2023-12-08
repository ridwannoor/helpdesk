<?php

namespace App\Models\Pum;

use Illuminate\Database\Eloquent\Model;

class Pumdetail extends Model
{
    protected $table = 'pumdetails';
    protected $id = 'id';
    protected $fillable = ['pumheader_id','deskripsi', 'jumlah'];

    public function pumheaders()
    {
        return $this->belongsTo('App\Models\Pum\Pumheader');
    }

    public function pumfiles()
    {
        return $this->belongsTo('App\Models\Pum\Pumfile');
    }
}
