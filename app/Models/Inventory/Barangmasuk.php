<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class Barangmasuk extends Model
{
    protected $table = "barangmasuks";
    protected $fillable = ['deskripsi', 'qty', 'satuan', 'user_id'];

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

}
