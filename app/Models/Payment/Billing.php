<?php

namespace App\Payment\Models;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $table = 'billings';
    protected $fillable = ['invoice_date', 'invoice_number', 'start_date', 'expired_date', 'total_amount', 'status'];

}
