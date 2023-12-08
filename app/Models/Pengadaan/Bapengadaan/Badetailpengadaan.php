<?php

namespace App\Models\Pengadaan\Bapengadaan;

use Illuminate\Database\Eloquent\Model;

class Badetailpengadaan extends Model
{
    protected $table = "badetailpengadaans";
    protected $fillable = [
        'bapengadaan_id',
        'dokumen',
        'sebelum',
        'menjadi'
    ];

    /**
     * Get the user that owns the Fpdetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bapengadaan()
    {
        return $this->belongsTo('App\Models\Pengadaan\Bapengadaan\Bapengadaan');
    }

}
