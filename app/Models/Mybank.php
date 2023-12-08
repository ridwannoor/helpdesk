<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mybank extends Model
{
    protected $table = 'mybanks';
    protected $fillable = ['bank', 'no_account', 'account_bank', 'image'];
    // protected $dates = ['deleted_at'];

}
