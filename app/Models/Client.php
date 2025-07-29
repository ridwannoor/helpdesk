<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class Client extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use SoftDeletes;

    protected $guard = 'client';

    protected $table = 'clients';
    protected $dates = ['deleted_at'];
    protected $fillable =
    [
        'name',
        'email',
        'password',
        'image',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $casts = [
        'notelp' => 'array',
        'email_verified_at' => 'datetime',
    ];

    public function scopePublished($query)
    {
        return $query->where(['is_published'], true);
    }

    public function scopeDrafted($query)
    {
        return $query->where(['is_published'], false);
    }

    public function getPublishedAttribute()
    {
        return ([$this->is_published]) ? 'Yes' : 'No';
    }

    public function ticket()
    {
        return $this->belongsTo('App\Models\Ticket');
    }
}
