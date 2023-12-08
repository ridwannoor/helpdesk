<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>No SPK</th>
        <th>No BA Nego</th>
        <th>Tanggal</th>
    </tr>
    </thead>
    @php
        $no = 1 ;
    @endphp
    <tbody>
    @foreach($spks as $invoice)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $invoice->nomor_spk }}</td>
            <td>{{ $invoice->bakesepakatan->banegopengadaan->nomor_ba }}</td>
            <td>{{ $invoice->tanggal }}</td>
        </tr>
    @endforeach
    </tbody>
</table>