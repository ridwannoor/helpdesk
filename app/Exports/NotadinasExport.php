<?php

namespace App\Exports;

use App\Models\Surat\Notaheader;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class NotadinasExport implements FromView
{
    public function view(): View
    {
        $nodins = DB::select("
            SELECT
                n.id,
                n.no_nodin,
                n.nama_pek,
                n.tgl_terima,
                n.tgl_surat,
                d.kode AS divisi,
                n.pic,
                n.pic_off,
                n.keterangan,
                n.kesimpulan,
                n3.filename AS file_nodin,
                n2.tanggal AS tgl_timeline,
                n2.item AS item_timeline,
                n2.status AS status_timeline,
                n2.attach_file AS file_timeline
            FROM notaheaders n
            LEFT JOIN notatimelines n2 ON n2.notaheader_id = n.id
            LEFT JOIN notafiles n3 ON n3.notaheader_id = n.id
            LEFT JOIN divisis d ON d.id = n.divisi_id
        ");

        return view('surat.notadinas.exportxls', [
            'nodins' => $nodins
        ]);
    }
}
