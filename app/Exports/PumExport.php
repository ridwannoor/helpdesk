<?php

namespace App\Exports;

use App\Models\Pum\Pumheader;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PumExport implements FromView
{
    public function view(): View
    {
        return view('pum.invoice', [
            'pums' => Pumheader::all()
        ]);
    }
}