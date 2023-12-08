<?php

namespace App\Exports;

use App\Models\Notaheader;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class NotadinasExport implements FromView
{
    public function view(): View
    {
        return view('surat.notadinas.invoice', [
            'nodins' => Notaheader::with('notafile')->get()
        ]);
    }
}