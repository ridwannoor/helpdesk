<?php

namespace App\Exports;

use App\Models\Pengadaan\Spk\Spkheader;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SpkExport implements FromView
{
    public function view(): View
    {
        return view('pengadaan.spk.invoice', [
            'spks' => Spkheader::all()
        ]);
    }
}