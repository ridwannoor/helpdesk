<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userdetail extends Model
{
    protected $table = 'userdetails';
    protected $fillable = ['user_id', 'menu_id', 'create', 'edit', 'destroy', 'show', 'cetak', 'publish', 'approval'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($users) {
            if(is_null($users->user_id)) {
                $users->user_id = auth()->user()->id;
            }
        });

    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function menu()
    {
        return $this->belongsTo('App\Models\Menu');
    }

    
}
