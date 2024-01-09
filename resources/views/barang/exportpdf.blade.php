<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
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
              <th>No</th>
              {{-- <th>No Aset</th> --}}
              <th>Nama Barang</th>
              <th>Tgl Pembelian</th> 
              <th>Tipe/Serial / Merk</th>
              <th>Kategori</th>
              <th>Qty</th>
              <th>Harga</th>
              <th>Garansi</th>
              <th>Toko Pembelian</th>
              <th>Kondisi</th>
          </tr>
      </thead>
      @php
          $no = 1 ;
      @endphp
      <tbody>
        @foreach ($barangs as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->asset_id }} <br>
                    {{ $item->nama_brg }}</td>
                <td>{{ $item->tgl_pembelian }}</td>
                <td>{{ $item->tipe }} <br> {{ $item->merk }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->aset_tag }}</td>
                <td>{{ "Rp " . format_uang($item->serial) }}</td>
                <td>{{ date('d-m-Y', strtotime($item->start_date)) . " s/d " . date('d-m-Y', strtotime($item->end_date)) }}</td>
                <td>{{ $item->namaperusahaan . ", " . $item->vendor->badanusaha->kode }}</td>
                <td>{{ $item->kondisi }}</td>
            </tr>
        @endforeach
        
            
      </tbody>
     
    </div>
  </table>
</body>
</html>