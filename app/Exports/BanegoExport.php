<?php

namespace App\Exports;

use App\Models\Banego;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BanegoExport implements FromView
{
    public function view(): View
    {
        return view('banego.invoice', [
            'banegos' => Banego::all()
        ]);
    }
}