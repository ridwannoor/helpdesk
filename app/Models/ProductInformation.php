<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductInformation extends Model
{
    protected $table = 'product_informations';
    protected $fillable = ['title', 'file', 'image', 'user_id'];
    // protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($productinformation) {
            if(is_null($productinformation->user_id)) {
                $productinformation->user_id = auth()->user()->id;
            }
        });

    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
