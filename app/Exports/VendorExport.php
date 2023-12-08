<?php

namespace App\Exports;

use App\Models\Vendor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class VendorExport implements FromView
{
    public function view(): View
    {
        return view('vendor.invoice', [
            'vendors' => Vendor::all()
        ]);
    }
}