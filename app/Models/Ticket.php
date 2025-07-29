<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = ['deskripsi', 'file_upload', 'jenisticket_id', 'typeticket_id', 'statusticket_id', 'client_id', 'user_id'];

    public function statustickets()
    {
        return $this->hasMany('App\Models\Statusticket');
    }

    public function typetickets()
    {
        return $this->hasMany('App\Models\Typeticket');
    }
    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }
    public function jenistickets()
    {
        return $this->hasMany('App\Models\Jenisticket');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
