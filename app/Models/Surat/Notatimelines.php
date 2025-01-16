<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Model;

class Notatimelines extends Model
{
    protected $table = 'notatimelines';
    protected $fillable = 
    [
        'notaheader_id', 
        'tanggal', 
        'item', 
        'status',
        'attach_file'
        // 'is_published'
    ];

    protected static function boot()
    {
        parent::boot();

        // static::creating(function ($notaheaders) {
        //     if(is_null($notaheaders->user_id)) {
        //         $notaheaders->user_id = auth()->user()->id;
        //     }
        // });
    }
    public function notaheader()
   {
       return $this->belongsTo('App\Models\Surat\Notaheader');
   }
}
