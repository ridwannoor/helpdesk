<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>No BA Kesepakatan</th>
        <th>No BA Nego</th>
        <th>Tanggal</th>
    </tr>
    </thead>
    @php
        $no = 1 ;
    @endphp
    <tbody>
    @foreach($bakesepakatans as $invoice)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $invoice->nomor_ba }}</td>
            <td>{{ $invoice->banegopengadaan->nomor_ba }}</td>
            <td>{{ $invoice->tanggal }}</td>
        </tr>
    @endforeach
    </tbody>
</table>