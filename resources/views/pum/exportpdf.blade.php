<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN PUM PERIODE {{ date('d-m-Y', strtotime($start))  . " - " . date('d-m-Y', strtotime($end)) }}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 8pt;
		}
	</style>
	{{-- <center>
		<h5>Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
		<h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5>
	</center> --}}
<div class="row">
  <table class="table">
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
              <td>{{ number_format($invoice->total) }}</td>
          </tr>
      @endforeach
        
            
      </tbody>
     
    </div>
  </table>
</body>
</html>