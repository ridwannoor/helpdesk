<?php

namespace App\Models\Po;

use Illuminate\Database\Eloquent\Model;

class Potemp extends Model
{
    protected $table = 'potemps';
    // protected $id = 'id';
    protected $fillable = ['poheader_id', 'hargabarang_id', 'qty', 'satuan', 'harga'];

    // public function getNamaBarang(){
    // 	return $this->hasOne(Hargabarang::class, 'id', 'hargabarang_id');
    // }
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($potemps) {
    //         if(is_null($potemps->user_id)) {
    //             $potemps->user_id = auth()->user()->id;
    //         }
    //     });

    // }
    public function hargalist()
    {
        return $this->hasMany('App\Models\Hargalist');
    }

    public function poheaders()
    {
        return $this->belongsTo('App\Models\Po\Poheader');
    }

    
    public function hargabarang()
    {
        return $this->belongsTo('App\Models\Hargabarang');
    }

    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User');
    // }
    
}
