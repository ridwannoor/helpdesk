<?php

namespace App\Models\Orderlist;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $table = "orderdetails";
    protected $fillable = ['orderheader_id', 'hargabarang_id', 'qty', 'harga', 'subtotal', 'user_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($orderdetail) {
            if(is_null($orderdetail->user_id)) {
                $orderdetail->user_id = auth()->user()->id;
            }
        });

    }

    public function orderheader(){
        return $this->belongsTo('App\Models\Orderlist\Orderheader');
    }

    public function hargabarang(){
        return $this->belongsTo('App\Models\Hargabarang');
    }

    public function users(){
        return $this->belongsTo('App\Models\User');
    }
}
