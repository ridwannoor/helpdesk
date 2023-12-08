<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyDrive extends Model
{
    protected $table = 'my_drives';
    protected $fillable = ['title', 'file', 'mydrivecategory_id', 'image', 'user_id'];
    // protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($mydrive) {
            if(is_null($mydrive->user_id)) {
                $mydrive->user_id = auth()->user()->id;
            }
        });

    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function mydrivecategory()
    {
        return $this->belongsTo('App\Models\Mydrivecategory');
    }
}
