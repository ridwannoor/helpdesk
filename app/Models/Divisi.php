<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = 'divisis';
    protected $fillable = ['kode', 'detail','name'];

    public function banegos(){
        return $this->belongsToMany('App\Models\Banego');
    }

    public function banegopengadaans(){
        return $this->belongsToMany('App\Models\Pengadaan\Banego\Banegopengadaan');
    }

    public function baadendumheaders(){
        return $this->belongsToMany('App\Models\Pengadaan\Baadendum\Baadendumheader');
    }

    public function pumheaders(){
        return $this->belongsToMany('App\Models\Pum\Pumheader');
    }

    public function spkheader()
    {
        return $this->hasMany('App\Models\Pengadaan\Spk\Spkheader');
    }

    public function tender()
    {
        return $this->hasMany('App\Models\Pengadaan\Tender');
    }

    public function notaheader()
    {
        return $this->hasMany('App\Models\Surat\Notaheader');
    }
}
