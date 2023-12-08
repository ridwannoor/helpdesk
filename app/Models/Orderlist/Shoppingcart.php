<?php

namespace App\Models\Orderlist;

use Illuminate\Database\Eloquent\Model;

class Shoppingcart extends Model
{
    protected $table = "shoppingcarts";
    protected $fillable = ['hargabarang_id', 'qty', 'user_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($shoppingcart) {
            if(is_null($shoppingcart->user_id)) {
                $shoppingcart->user_id = auth()->user()->id;
            }
        });

    }

    public function hargabarang(){
        return $this->belongsTo('App\Models\Hargabarang');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
