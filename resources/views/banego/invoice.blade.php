<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nama Pekerjaan</th>
        <th>No BA</th>
        <th>Lokasi Nego</th>
        <th>Tanggal</th>
        <th>SPPH</th>
        <th>Jumlah</th>
        <th>SPPH Nego</th>
        <th>Jumlah</th>
        <th>Selisih Harga</th>
        <th>Pajak</th>
        <th>Tanggal Waktu Pelaksanaan</th>
        <th>Waktu Pelaksanaan</th>
        <th>Garansi</th>
        <th>Tempat</th>
        <th>Pengirim</th>
        <th>Training</th>
        <th>Cara Pembayaran</th>
        <th>Asuransi</th>
        <th>Masa Pemeliharaan</th>
        <th>Down Payment</th>        
        <th>Nilai DP</th>
        <th>Biaya Dokumen</th>
        <th>Catatan</th>
    </tr>
    </thead>
    @php
        $no = 1 ;
        $jumlah = 0 ;
    @endphp
    <tbody>
    @foreach($banegos as $invoice)
    @php
        $jumlah = $invoice->jml_penawaran - $invoice->jml_nego
    @endphp
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $invoice->nama_pek }}</td>
            <td>{{ $invoice->no_ba }}</td>
            <td>{{ $invoice->lokasi_nego }}</td>
            <td>{{ $invoice->tanggal }}</td>
            <td>{{ $invoice->spph }}</td>
            <td>{{ $invoice->jml_penawaran }}</td>
            {{-- <td>{{ $invoice->spph_nego }}</td> --}}
            <td>{{ $invoice->jml_nego }}</td>
            <td>
                {{ $jumlah }}
            </td>
            <td>{{ $invoice->pajak }}</td>
            <td>{{ $invoice->start_date }} - {{ $invoice->end_date }}</td>
            <td>{{ $invoice->waktu_pel }}</td>
            <td>{{ $invoice->garansi }}</td>
            <td>{{ $invoice->tempat }}</td>
            <td>{{ $invoice->pengiriman }}</td>
            <td>{{ $invoice->training }}</td>
            <td>{!! $invoice->cara_pembayaran !!}</td>
            <td>{{ $invoice->asuransi }}</td>
            <td>{{ $invoice->masapemeliharaan }}</td>
            <td>{{ $invoice->downpayment }}</td>
            <td>{{ $invoice->nilaidp }}</td>
            <td>{{ $invoice->biaya_dok }}</td>
            <td>{!! $invoice->catatan !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>