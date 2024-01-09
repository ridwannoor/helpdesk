<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN PURCHASE ORDER PERIODE {{ date('d-m-Y', strtotime($start))  . " - " . date('d-m-Y', strtotime($end)) }}</title>
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
            <th>No PO / Kontrak</th>
            <th>Jangka Waktu</th>                        
            <th>Cara Bayar</th>
            {{-- <th>Pajak</th> --}}
            <th>Nama Vendor</th>          
            <th>Harga Pabrik</th>
            <th>Penawaran</th>  
            <th>Total</th>
            <th>Status</th>
            <th>Catatan</th>
          </tr>
      </thead>
      @php
          $no = 1 ;
      @endphp
      <tbody>
        @foreach ($rekappos as $item)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ date('d-m-Y', strtotime($item->tanggal))  }} <br>
                {{ $item->no_po }} <br>
                {{ $item->no_kontrak }} <br>
                {{ $item->nama_pekerjaan . ", " .  $item->lokasi->kode  }}</td>
              {{-- <td>{{ $item->no_kontrak }}</td> --}}
              <td>{{date('d-m-Y', strtotime($item->start_date))  . " s/d " . date('d-m-Y', strtotime($item->end_date))  }}</td>
              {{-- <td>{{ $item->end_date }}</td> --}}
              <td>{{ $item->cara_bayar }} <br> 
                {{ $item->cara_bayar1 }} <br> 
                {{ "Pajak : " . $item->pajak }} <br>
                {{ $item->pajak1 }}</td>
              <td>{{ $item->namaperusahaan . ", " . $item->vendor->badanusaha->kode }}</td>             
              {{-- <td>{{ $item->bod->code }}</td> --}}
              <td>{{ $item->hargapabrik . " - " . $item->deskripsi }}</td>
              <td>{{ $item->suratpenawaran }} <br> 
                {{ $item->desc_tanggal }} <br>
                {{ $item->desc }}</td>
              <td>{{"Rp " . number_format($item->totalrp)  }}</td>
              <td>
                @if ($item->is_published == 0)
                    <span>Publish</span>
                @else
                    <span>Draft</span>
                @endif
              </td>
              <td>{!! $item->catatan !!}</td>
            </tr>
        @endforeach
        
            
      </tbody>
     
    </div>
  </table>
</body>
</html>