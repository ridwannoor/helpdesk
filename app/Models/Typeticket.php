<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typeticket extends Model
{
    protected $table = 'typetickets';
    protected $fillable = ['deskripsi'];

    public function ticket()
    {
        return $this->belongsTo('App\Models\Ticket');
    }
}
