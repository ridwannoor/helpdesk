<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenisticket extends Model
{
    protected $table = 'jenistickets';
    protected $fillable = ['deskripsi'];

    public function ticket()
    {
        return $this->hasMany('App\Models\Ticket');
    }
}
