<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Model;

class Receivedodetail extends Model
{
    protected $table = 'receivedodetails';
    protected $id = 'id';
    protected $fillable = ['doheader_id','dodetail_id','catatan_revisi'];

    public function dodetails()
    {
        return $this->hasMany('App\Models\Transaksi\Dodetail');
    }

    public function doheaders()
    {
        return $this->hasMany('App\Models\Transaksi\Doheader');
    }

}
