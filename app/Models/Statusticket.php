<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statusticket extends Model
{
    protected $table = 'statustickets';
    protected $fillable = ['deskripsi'];

    public function ticket()
    {
        return $this->hasMany('App\Models\Ticket');
    }
}
