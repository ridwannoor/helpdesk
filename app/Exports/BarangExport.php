<?php

namespace App\Exports;

use App\Models\Barang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BarangExport implements FromView
{
    public function view(): View
    {
        return view('barang.invoice', [
            'barangs' => Barang::all()
        ]);
    }
}
