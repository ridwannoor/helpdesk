<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Service Order</th>
        <th>Tanggal</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Lokasi</th>
        <th>Nama Vendor</th>
        <th>Bod</th>
        <th>Nama Pekerjaan</th>
        <th>No Kontrak</th>
        <th>Tgl Kontrak</th>
    </tr>
    </thead>
    @php
        $no = 1 ;
    @endphp
    <tbody>
    @foreach($serviceorders as $invoice)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $invoice->no_so }}</td>
            <td>{{ $invoice->tanggal }}</td>
            <td>{{ $invoice->start_date }}</td>
            <td>{{ $invoice->end_date }}</td>
            <td>{{ $invoice->lokasi->kode }}</td>
            <td>{{ $invoice->vendor->namaperusahaan }}</td>
            <td>{{ $invoice->bod->code }}</td>
            <td>{{ $invoice->nama_pek }}</td>
            <td>{{ $invoice->no_kontrak }}</td>
            <td>{{ $invoice->tgl_kontrak }}</td>
            {{-- <td></td>
            <td></td>  --}}
        </tr>
    @endforeach
    </tbody>
</table>