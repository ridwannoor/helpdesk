<?php

namespace App\Exports;

use App\Models\SO\Serviceorder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SoExport implements FromView
{
    public function view(): View
    {
        return view('serviceorder.invoice', [
            'serviceorders' => Serviceorder::all()
        ]);
    }
}