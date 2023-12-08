<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>No Nota Dinas</th>
        <th>Tanggal Terima</th>
        <th>Tanggal Surat</th>
        <th>Unit ST</th>
        <th>Divisi</th>
        <th>Lokasi</th>
        <th>Nama Pekerjaan</th>
        <th>Catatan</th>
        <th>Catatan Tindak Lanjut</th>
        <th>Status</th>
        
    </tr>
    </thead>
    @php
        $no = 1 ;
        
    @endphp
    <tbody>
    @foreach($nodins as $invoice)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $invoice->no_nodin }}</td>
            <td>{{ $invoice->tgl_terima }}</td>
            <td>{{ $item->tgl_surat }}</td>
            <td>{{ $invoice->divisi->detail }}</td>
            <td>{{ $invoice->unit_st }}</td>
            <td>{{ $invoice->lokasi->kode }}</td>
            <td>{{ $invoice->nama_pek }}</td>
            <td>{!! $invoice->keterangan !!}</td>
            <td>{{ $item->kesimpulan }}</td>
            <td>{{ $invoice->status }}</td>
        </tr>
    @endforeach
    </tbody>
</table>