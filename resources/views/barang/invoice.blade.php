<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nama Barang</th>
        <th>Tanggal Pembelian</th>
        <th>Qty</th>
        <th>Serial</th>       
        <th>Merk</th>
        <th>Category</th>
        <th>Lokasi</th>
        <th>Vendor</th>    
        <th>Kondisi</th>
        <th>Catatan</th>
    </tr>
    </thead>
    @php
        $no = 1 ;
        $jumlah = 0 ;
    @endphp
    <tbody>
    @foreach($barangs as $invoice)
    {{-- @php
        $jumlah = $invoice->jml_penawaran - $invoice->jml_nego
    @endphp --}}
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $invoice->nama_brg }}</td>
            <td>{{ $invoice->tgl_pembelian }}</td>
            <td>{{ $invoice->aset_tag }}</td>
            <td>{{ $invoice->serial }}</td>
            <td>{{ $invoice->merk }}</td>
            <td>{{ $invoice->category }}</td>
            <td>{{ $invoice->lokasi->kode }}</td>
            <td>{{ $invoice->vendor->namaperusahaan . ", " . $invoice->vendor->badanusaha->kode }}</td>    
            <td>{{ $invoice->kondisi }}</td>
            <td>{{ $invoice->catatan }}</td>            
        </tr>
    @endforeach
    </tbody>
</table>