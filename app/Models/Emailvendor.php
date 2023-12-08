<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emailvendor extends Model
{
    protected $table = 'emailvendors';
    protected $fillable = ['to', 'keterangan'];
}
