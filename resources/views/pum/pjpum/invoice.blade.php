<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>No PUM</th>
        <th>Tanggal</th>
        <th>Lokasi</th>
        <th>Menyetujui</th>
        <th>Membuat</th>
        <th>Mengetahui</th>
        <th>Nama Pekerjaan</th>
        <th>Total</th>
    </tr>
    </thead>
    @php
        $no = 1 ;
    @endphp
    <tbody>
    @foreach($pums as $invoice)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $invoice->no_pum }}</td>
            <td>{{ $invoice->tanggal }}</td>
            <td>{{ $invoice->lokasi->kode }}</td>
            <td>{{ $invoice->bod->code }}</td>
            <td>{{ $invoice->divisi->name }}</td>
            <td>{{ $invoice->divisi1->name }}</td>
            <td>{{ $invoice->nama_pek }}</td>
            <td>{{ $invoice->total }}</td>
        </tr>
    @endforeach
    </tbody>
</table>