<?php

namespace App\Models\Po;

use Illuminate\Database\Eloquent\Model;

class Podetail extends Model
{
    protected $table = 'podetails';
    // protected $id = 'id';
    protected $fillable = ['rekappo_id',  'hargabarang_id', 'qty',  'satuan',  'harga'];
    
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($podetails) {
    //         if(is_null($podetails->user_id)) {
    //             $podetails->user_id = auth()->user()->id;
    //         }
    //     });

    // }

    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User');
    // }
    

    public function hargalist()
    {
        return $this->hasMany('App\Models\Hargalist');
    }
    
    public function rekappos()
    {
        return $this->belongsTo('App\Models\Po\Rekappo');
    }

    // public function currency()
    // {
    //     return $this->belongsTo('App\Models\Currency');
    // }

    public function hargabarang()
    {
        return $this->belongsTo('App\Models\Hargabarang');
    }
}
