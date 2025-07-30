<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = ['deskripsi', 'file_upload', 'jenisticket_id', 'typeticket_id', 'statusticket_id', 'lokasi_id', 'client_id', 'user_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($ticket) {
            if (is_null($ticket->client_id)) {
                $ticket->client_id = auth()->user('client')->id;
            }
        });
    }

    public function statusticket()
    {
        return $this->belongsTo('App\Models\Statusticket');
    }

    public function typeticket()
    {
        return $this->belongsTo('App\Models\Typeticket');
    }
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
    public function jenisticket()
    {
        return $this->belongsTo('App\Models\Jenisticket');
    }

    public function lokasi()
    {
        return $this->belongsTo('App\Models\Lokasi');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
