<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>No BA Nego</th>
        <th>Tanggal</th>
        <th>No BA Aanwizing</th>
        <th>Vendor</th>
        <th>Lokasi Nego</th>
        <th>No SPH</th>
        <th>Tgl SPH</th>
        <th>Nilai SPH</th>
        {{-- <th>NO SPH Nego</th>
        <th>Tgl SPH Nego</th> --}}
        <th>Nilai SPH Nego</th>
        <th>Jaminan</th>
        <th>Jaminan (%)</th>
        <th>Jaminan (Rp)</th>
        <th>Lokasi Serah Terima</th>
        <th>Pengiriman Oleh</th>
    </tr>
    </thead>
    @php
        $no = 1 ;
    @endphp
    <tbody>
    @foreach($banegopengadaans as $invoice)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $invoice->nomor_ba }}</td>
            <td>{{ $invoice->tanggal }}</td>
            <td>{{ $invoice->bapengadaan->nomor_ba }}</td>
            <td>{{ $invoice->vendor->namaperusahaan . ", " . $invoice->vendor->badanusaha->kode }}</td>
            <td>{{ $invoice->lokasi_nego }}</td>
            <td>{{ $invoice->spph }}</td>
            <td>{{ $invoice->tgl_sph }}</td>
            <td>{{ $invoice->jml_penawaran }}</td>
            {{-- <td>{{ $invoice->spph_nego	 }}</td>
            <td>{{ $invoice->tgl_sph_nego }}</td> --}}
            <td>{{ $invoice->jml_nego }}</td>
            <td>{{ $invoice->jaminandp }}</td>
            <td>{{ $invoice->jaminandp1 }}</td>
            <td>{{ $invoice->jaminandp2 }}</td>
            <td>{{ $invoice->lokasi_serah }}</td>
            <td>{{ $invoice->pengiriman }}</td>
        </tr>
    @endforeach
    </tbody>
</table>