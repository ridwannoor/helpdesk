<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Kode Perusahaan</th>
        <th>Nama Perusahaan</th>
        <th>Alamat</th>
        <th>NPWP</th>
        <th>Email</th>
        <th>No Telp</th>
        <th>Contact Person</th>
        <th>Alternative Person</th>
        <th>Jenis Pekerjaan</th>
        <th>Jenis Usaha</th>
        <th>Category</th>
        <th>Produk</th>
        <th>Lokasi</th>
        <th>Website</th>        
        <th>Catatan</th>
    </tr>
    </thead>
    @php
        $no = 1 ;
    @endphp
    <tbody>
    @foreach($vendors as $invoice)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $invoice->kode }}</td>
            <td>{{ $invoice->namaperusahaan . " , " .  $invoice->badanusaha->kode }}</td>
            <td>{{ $invoice->alamat }}</td>
            <td>{{ $invoice->npwp }}</td>
            <td>{{ $invoice->email }}</td>
            <td>{{ $invoice->notelp }}</td>
            <td>{{ $invoice->contactperson . " - " . $invoice->handphone }}</td>
            <td>{{ $invoice->alternative_person . " - " . $invoice->alternative_phone }}</td>
            <td>{{ $invoice->jenispekerjaans->implode('name', ', ') }}</td>
            <td>{{ $invoice->jenisusahas->implode('detail', ', ') }}</td>
            <td>{{ $invoice->categories->implode('detail', ', ') }}</td>
            <td>{{ $invoice->product }}</td>
            <td>{{ $invoice->lokasi->kode }}</td>
            <td>{{ $invoice->website }}</td>
            <td>{{ $invoice->catatan }}</td>
            {{-- <td></td>
            <td></td>  --}}
        </tr>
    @endforeach
    </tbody>
</table>