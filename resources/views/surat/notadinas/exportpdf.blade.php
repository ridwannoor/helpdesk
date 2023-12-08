<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN NOTA DINAS PROLOG PERIODE {{ date('d-m-Y', strtotime($start))  . " - " . date('d-m-Y', strtotime($end)) }}</title>
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
            <th>No Nota Dinas</th>
            <th>Tanggal Terima</th>
            <th>Tanggal Surat</th>           
            <th>Unit ST</th>
            <th>Divisi</th>
            <th>Lokasi</th>
            <th>Nama Pekerjaan</th>
            <th>Catatan</th>
            <th>Catatan Tindak Lanjut</th>
            <th>Status</th>
          </tr>
      </thead>
      @php
          $no = 1 ;
      @endphp
      <tbody>
        @foreach ($nodins as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->no_nodin }}</td>
                <td>{{ $item->tgl_terima }}</td>
                <td>{{ $item->tgl_surat }}</td>
                <td>{{ $item->divisi->detail }}</td>
                <td>{{ $item->unit_st }} <br>
                {{ $item->pic  }} <br>
              {{ $item->pic_off }}</td>
                <td>{{ $item->lokasi->kode }}</td>
                <td>{{ $item->nama_pek }}</td>
                <td>{!! $item->keterangan !!}</td>
                <td>{{ $item->kesimpulan }}</td>
                <td>{{ $item->status }}</td>
            
            </tr>
        @endforeach
        
            
      </tbody>
     
    </div>
  </table>
</body>
</html>