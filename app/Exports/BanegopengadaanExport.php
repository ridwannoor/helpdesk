<?php

namespace App\Exports;

use App\Models\Pengadaan\Banego\Banegopengadaan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BanegopengadaanExport implements FromView
{
    public function view(): View
    {
        return view('pengadaan.banegopengadaan.invoice', [
            'banegopengadaans' => Banegopengadaan::all()
        ]);
    }
}