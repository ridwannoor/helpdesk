<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>No PO</th>
        <th>No Kontrak</th>
        <th>Tanggal</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Nama Pekerjaan</th>
        <th>Cara Bayar</th>
        <th>Cara Bayar Other</th>
        <th>Pajak</th>
        <th>Pajak Other</th>
        <th>Nama Vendor</th>
        <th>Lokasi</th>
        <th>Bod</th>
        <th>Harga Pabrik</th>
        <th>Deksripsi</th>
        <th>Catatan</th>
        <th>Surat Penawaran</th>
        <th>Tgl Penawaran</th>
        <th>Keterangan</th>        
        <th>Diskon</th>
        <th>PPN</th>
        <th>Biaya Kirim</th>
        <th>Custom</th>
        <th>Custom 1</th>
        <th>Total</th>
       <th>Total Rp</th>
    </tr>
    </thead>
    @php
        $no = 1 ;
        
    @endphp
    <tbody>
    @foreach($rekappos as $invoice)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $invoice->no_po }}</td>
            <td>{{ $invoice->no_kontrak }}</td>
            <td>{{ $invoice->tanggal }}</td>
            <td>{{ $invoice->start_date }}</td>
            <td>{{ $invoice->end_date }}</td>
            <td>{{ $invoice->cara_bayar }}</td>
            <td>{{ $invoice->cara_bayar1 }}</td>
            <td>{{ $invoice->pajak }}</td>
            <td>{{ $invoice->pajak1 }}</td>
            <td>{{ $invoice->nama_pekerjaan }}</td>
            <td>{{ $invoice->vendor->namaperusahaan }}</td>
            <td>{{ $invoice->lokasi->kode }}</td>
            <td>{{ $invoice->bod->code }}</td>
            <td>{{ $invoice->hargapabrik }}</td>
            <td>{{ $invoice->deskripsi }}</td>
            <td>{{ $invoice->suratpenawaran }}</td>
            <td>{{ $invoice->desc_tanggal }}</td>
            <td>{{ $invoice->desc }}</td>
            <td>{{ $invoice->diskon }}</td>
            <td>{{ $invoice->ppn }}</td>
            <td>{{ $invoice->biaya_kirim }}</td>
            <td>{!! $invoice->catatan !!}</td>
            <td>{{ $invoice->custom }}</td>
            <td>{{ $invoice->custom1 }}</td>
            <td>{{ $invoice->custom2 }}</td>
            <td>{{ $invoice->custom3 }}</td>
            <td>{{ $invoice->total }}</td>
            <td>{{ $invoice->total_rp }}</td>
            {{-- <td></td>
            <td></td>  --}}
        </tr>
    @endforeach
    </tbody>
</table>