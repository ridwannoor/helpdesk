<?php

namespace App\Exports;

use App\Models\Pengadaan\Bapengadaan\Bapengadaan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BapengadaanExport implements FromView
{
    public function view(): View
    {
        return view('pengadaan.bapengadaan.invoice', [
            'bapengadaans' => Bapengadaan::all()
        ]);
    }
}