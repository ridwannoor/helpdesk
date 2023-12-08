<?php

namespace App\Models\Pengadaan\Bapengadaan;

use Illuminate\Database\Eloquent\Model;

class Bapertanyaan extends Model
{
    protected $table = "bapertanyaans";
    protected $fillable = [
        'bapengadaan_id',
        'pertanyaan',
        'jawaban'
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
