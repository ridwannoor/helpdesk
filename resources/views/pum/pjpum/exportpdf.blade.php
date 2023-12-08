<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN PJ PUM PERIODE {{ date('d-m-Y', strtotime($start))  . " - " . date('d-m-Y', strtotime($end)) }}</title>
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
            <th>No PJ PUM</th>
            <th>Tanggal</th> 
            <th>No PUM</th>
            <th>Memmbuat</th>
            <th>Mengetahui</th>
            <th>Nilai PJ</th>
            <th>Nilai PUM</th>
            <th>Pengembalian</th>
          </tr>
      </thead>
      @php
          $no = 1 ;
          $total = 0 ;
      @endphp
      <tbody>
        @foreach($pums as $invoice)
        @php
            $selisih = $invoice->pumheader->total - $invoice->total;
            // $selisih += $total;
        @endphp
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $invoice->no_pjpum }}</td>
            <td>{{ $invoice->tanggal }}</td>
            <td>{{ $invoice->pumheader->no_pum }} <br>
              {{ $invoice->pumheader->nama_pek }}</td>
            <td>{{ $invoice->membuat }}</td>
            <td>{{ $invoice->mengetahui }}</td>
            <td>{{ $invoice->total }}</td>
            <td>{{ $invoice->pumheader->total }}</td>
            <td>{{ $selisih }}</td>
        </tr>
    @endforeach
      </tbody>
     
    </div>
  </table>
</body>
</html>