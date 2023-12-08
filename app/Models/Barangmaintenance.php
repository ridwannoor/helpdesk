<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barangmaintenance extends Model
{
    protected $table = 'barangmaintenances';
    protected $fillable = ['barang_id', 'vendor_id', 'tipemaintenance_id','title', 'start_date', 'complete_date', 'biaya', 'catatan', 'user_id'];
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($barangmaintenance) {
            if(is_null($barangmaintenance->user_id)) {
                $barangmaintenance->user_id = auth()->user()->id;
            }
        });
    }
        
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor');
    }

    public function barang()
    {
        return $this->belongsTo('App\Models\Barang');
    }

    public function tipemaintenance()
    {
        return $this->belongsTo('App\Models\Tipemaintenance');
    }
    
}
