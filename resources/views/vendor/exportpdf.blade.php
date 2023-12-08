<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN VENDOR PERIODE {{ date('d-m-Y', strtotime($start))  . " - " . date('d-m-Y', strtotime($end)) }}</title>
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
            <th>Nama Perusahaan</th>
            <th>Alamat</th>
            <th>Contact Person</th>
            <th>Jenis Pekerjaan</th>
            <th>Catatan</th>
            
          </tr>
      </thead>
      @php
          $no = 1 ;
      @endphp
      <tbody>
        @foreach ($vendors as $invoice)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $invoice->kode }} <br>
                  {{ $invoice->namaperusahaan . " , " .  $invoice->badanusaha->kode }} <br>
                  {{ $invoice->npwp }} <br>
                  {{ $invoice->email }} <br>
                  {{ $invoice->website }}
              </td>
              <td>{{ $invoice->alamat }} <br>
                {{ $invoice->provinsi->name }} <br>
                {{ $invoice->notelp }}
              </td>
              {{-- <td>{{ $invoice->npwp }}</td>
              <td>{{ $invoice->email }}</td> --}}
              {{-- <td>{{ $invoice->notelp }}</td> --}}
              <td>{{ $invoice->contactperson . " - " . $invoice->handphone }} <br>
                  {{ $invoice->alternative_person . " - " . $invoice->alternative_phone }}</td>
              <td>{{ $invoice->jenispekerjaans->implode('name', ', ') }} <br>
                  {{ $invoice->jenisusahas->implode('detail', ', ') }} <br>
                  {{ $invoice->categories->implode('detail', ', ') }} <br>
                  {{ $invoice->product }}</td>
              {{-- <td>{{ $invoice->website }}</td> --}}
              <td>{{ $invoice->catatan }}</td>
            </tr>
        @endforeach
        
            
      </tbody>
     
    </div>
  </table>
</body>
</html>