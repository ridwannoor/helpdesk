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
          </tr>
      @endforeach
        
            
      </tbody>
     
    </div>
  </table>
</body>
</html>