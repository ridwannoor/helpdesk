<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class ClientVerify extends Model
{
    use HasApiTokens, Notifiable;

    public $table = "client_verify";

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'client_id',
        'token',
    ];

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
