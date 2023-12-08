<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Model;

class Dodetail extends Model
{
    protected $table = 'dodetails';
    protected $id = 'id';
    protected $fillable = ['doheader_id','hargabarang_id', 'qty', 'qty_baik', 'qty_rusak', 'satuan','catatan'];

    public function doheaders()
    {
        return $this->belongsTo('App\Models\Transaksi\Doheader');
    }

    public function hargabarang()
    {
        return $this->belongsTo('App\Models\Hargabarang');
    }

    public function receivedodetails()
    {
        return $this->belongsTo('App\Models\Transaksi\Receivedodetail');
    }
}
