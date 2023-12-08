<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>No BA Aanwizing</th>
        <th>Tanggal</th>
        <th>Lokasi</th>
        <th>Judul Pekerjaan</th>
        <th>Tanggal Akhir Penawaran</th>
    </tr>
    </thead>
    @php
        $no = 1 ;
    @endphp
    <tbody>
    @foreach($bapengadaans as $invoice)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $invoice->nomor_ba }}</td>
            <td>{{ $invoice->tanggal }}</td>
            <td>{{ $invoice->lokasi->kode }}</td>
            <td>{{ $invoice->judul_pekerjaan }}</td>
            <td>{{ $invoice->nama_pekerjaan }}</td>
            <td>{{ $invoice->tgl_penawaran }}</td>
        </tr>
    @endforeach
    </tbody>
</table>