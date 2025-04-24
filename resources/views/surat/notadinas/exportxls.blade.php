<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>No Nota Dinas</th>
            <th>Nama Pekerjaan</th>
            <th>Tgl Terima</th>
            <th>Tgl Surat</th>
            <th>Divisi</th>
            <th>PIC Manager</th>
            <th>PIC Officer</th>
            <th>Catatan</th>
            <th>Catatan Tindak Lanjut</th>
            <th>File Nota Dinas</th>
            <th>Tgl Timeline</th>
            <th>Item Timeline</th>
            <th>Status Timeline</th>
            <th>File Timeline</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($nodins as $n)
            <tr>
                <td>{{ $n->id }}</td>
                <td>{{ $n->no_nodin }}</td>
                <td>{{ $n->nama_pek }}</td>
                <td>{{ $n->tgl_terima }}</td>
                <td>{{ $n->tgl_surat }}</td>
                <td>{{ $n->divisi }}</td>
                <td>{{ $n->pic }}</td>
                <td>{{ $n->pic_off }}</td>
                <td>{{ $n->keterangan }}</td>
                <td>{{ $n->kesimpulan }}</td>
                <td>{{ $n->file_nodin }}</td>
                <td>{{ $n->tgl_timeline }}</td>
                <td>{{ $n->item_timeline }}</td>
                <td>{{ $n->status_timeline }}</td>
                <td>{{ $n->file_timeline }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
