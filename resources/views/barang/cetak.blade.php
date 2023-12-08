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
<div class="row" style="width: 100mm; height: 100mm; background-color: rgb(144, 26, 229); border-radius: 15px" >
  <table class="table " style="width:98mm; height: 50mm; ">
      <thead>
          <tr>
              <th colspan="3" style="text-align: left" ><img src="{{'data_file/'.$pref->image }}" height="75px" alt="">
          </th>           
          </tr>
      </thead>
      <tbody>
          <tr style="height: 15px">
            <td>Nama Barang</td>
            <td>:</td>
            <td>{{ $barangs->nama_brg }}</td>
              {{-- <td rowspan="4" style="width: 50px"></td> --}}
              {{-- <td style="width: 15mm" >Nama Barang <br> <br> Merk <br> Tgl Pembelian</td>
              <td style="width: 2mm"> : <br><br> : <br> :</td>
              <td style="width: 35mm">{{ $barangs->nama_brg }} <br> {{ $barangs->merk  }} <br> {{ date('d-m-Y', strtotime($barangs->tgl_pembelian))  }}</td> --}}
          </tr>
          <tr>
            <td>No Aset Barang</td>
            <td>:</td>
            <td>{{ $barangs->asset_id }}</td>
          </tr>
          <tr>
            <td>Type / Serial Number</td>
            <td>:</td>
            <td>{{ $barangs->tipe }}</td>
          </tr>
          <tr>
            <td>Merk</td>
            <td>:</td>
            <td>{{ $barangs->merk }}</td>
          </tr>
          <tr>
            <td>Tgl Pembelian</td>
            <td>:</td>
            <td>{{ date('d-m-Y', strtotime($barangs->tgl_pembelian))  }}</td>
          </tr>
          <tr>
              <td colspan="3">  <img style="text-align: right" src="data:image/png;base64,{{DNS2D::getBarcodePNG(  $barangs->asset_id , 'QRCODE')}}" width="75px" alt=""></td>
          </tr>
      </tbody>
    </div>
  </table>
</body>
</html>