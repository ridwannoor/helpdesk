<?php

namespace App\Exports;

use App\Models\Pengadaan\Bakes\Bakesepakatan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BakesepakatanExport implements FromView
{
    public function view(): View
    {
        return view('pengadaan.bakesepakatan.invoice', [
            'bakesepakatans' => Bakesepakatan::all()
        ]);
    }
}