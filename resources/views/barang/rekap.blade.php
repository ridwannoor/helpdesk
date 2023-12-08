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
              <th>Tanggal</th>
              <th>Nama Barang</th>
              <th>Pembelian</th>
              <th>Maintenance</th>       
          </tr>
      </thead>
      @php
          $no = 1 ;
          $jumlah = 0;
      @endphp
      <tbody>
        {{-- @foreach ($barangs as $item) --}}
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $barangs->tgl_pembelian }}</td>
                <td>{{ $barangs->nama_brg }}</td>
                <td>{{ "Rp " . format_uang($barangs->serial) }}</td>
                <td></td>
            </tr>
            @foreach ($barangs->barangmaintenance as $item)
            @php
                $jumlah += $item->biaya;    
            @endphp
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ date('d-m-Y', strtotime($item->start_date)) . " s/d " . date('d-m-Y', strtotime($item->complete_date)) }}</td>
                <td>{{ $item->title }}</td>
                <td></td>
                <td>{{"Rp " . format_uang( $item->biaya) }}</td>
            </tr>
            @endforeach
            
         {{-- @endforeach --}}
      </tbody>
      <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td>Total</td>
                <td><strong>{{ "Rp " . format_uang($barangs->serial) }}</strong></td>
                <td><strong>{{  "Rp " . format_uang( $jumlah) }}</strong></td>
            </tr>
      </tfoot>
    </div>
  </table>
</body>
</html>