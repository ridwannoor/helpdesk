<?php

namespace App\Models\SO;

use Illuminate\Database\Eloquent\Model;

class Sodetail extends Model
{
    protected $table = 'sodetails';
    protected $id = 'id';
    protected $fillable = ['serviceorder_id','deskripsi', 'qty', 'satuan', 'serial_num', 'lokasi', 'catatan'];

    public function serviceorders()
    {
        return $this->belongsTo('App\Models\SO\Serviceorder');
    }

    public function sofiles()
    {
        return $this->belongsTo('App\Models\SO\Sofile');
    }
}
