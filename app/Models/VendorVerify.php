<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class VendorVerify extends Model
{
    use HasApiTokens,Notifiable;
  
    public $table = "vendors_verify";
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'vendor_id',
        'token',
    ];
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
