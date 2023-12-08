<?php

namespace App\Exports;

use App\Models\Po\Rekappo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PoExport implements FromView
{
    public function view(): View
    {
        return view('transaksi.rekappo.invoice', [
            'rekappos' => Rekappo::all()
        ]);
    }
}