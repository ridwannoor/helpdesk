<?php

namespace App\Models\Orderlist;

use Illuminate\Database\Eloquent\Model;

class Orderheader extends Model
{
    protected $table = "orderheaders";
    protected $fillable = ['no_order', 'tanggal', 'user_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($orderheader) {
            if(is_null($orderheader->user_id)) {
                $orderheader->user_id = auth()->user()->id;
            }
        });

    }

    public function users(){
        return $this->belongsTo('App\Models\User');
    }

    public function orderdetails(){
        return $this->hasMany('App\Models\Orderlist\Orderdetail');
    }
    
}
