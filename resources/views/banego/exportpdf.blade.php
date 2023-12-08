<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN BA KLARIF & NEGO LOGISTIK PERIODE {{ date('d-m-Y', strtotime($start))  . " - " . date('d-m-Y', strtotime($end)) }}</title>
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
            <th>Nama Pekerjaan</th>
            <th>Lokasi Nego</th>           
            <th>SPH / SPH NEGO</th>           
            {{-- <th>SPPH Nego</th> --}}
            {{-- <th>Selisih Harga</th> --}}
            {{-- <th>Pajak</th> --}}
            <th>Waktu Pelaksanaan</th>
            <th>Garansi/ Asuransi/ Training/ Pemeliharaan</th>
            <th>Tempat - Pengirim</th>
            {{-- <th>Pengirim</th> --}}
            {{-- <th>Training</th> --}}
            <th>Cara Bayar/ Biaya Dokumen/ DP</th>
            {{-- <th>Asuransi</th> --}}
            {{-- <th></th> --}}
            {{-- <th>Down Payment</th>   --}}
            {{-- <th>Biaya Dokumen</th> --}}
            <th>Catatan</th>
          </tr>
      </thead>
      @php
          $no = 1 ;
      @endphp
      <tbody>
        @foreach($banegos as $invoice)
        @php
            $jumlah = $invoice->jml_penawaran - $invoice->jml_nego
        @endphp
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ date('d-m-Y', strtotime($invoice->tanggal))  }} <br>
                  {{ $invoice->no_ba }} <br>
                  {{ $invoice->nama_pek }}</td>
                <td>{{ $invoice->lokasi_nego }}</td>
                <td><span>SPPH</span> <br> {{ $invoice->spph }} <br> {{ "Rp " . number_format($invoice->jml_penawaran)  }} <br>
                  <span>SPPH NEGO</span> 
                  {{-- <br> {{ $invoice->spph_nego }} --}}
                   <br>{{ "Rp " . number_format($invoice->jml_nego)  }} <br>
                 <span>Pajak : </span><strong>{{ $invoice->pajak }}</strong> 
                </td>
                {{-- <td>
                    {{ $jumlah }}
                </td> --}}
                
                <td>{{ $invoice->start_date }} - {{ $invoice->end_date . " (" . $invoice->waktu_pel . " hari)"  }} </td>
                {{-- <td>{{ $invoice->waktu_pel }}</td> --}}
                <td>{{ $invoice->garansi . " / " .  $invoice->asuransi . " / " .  $invoice->training . " / " . $invoice->masapemeliharaan . " hari"  }}</td>
                <td>{{ $invoice->tempat . " - " . $invoice->pengiriman }}</td>
                {{-- <td>{{ $invoice->pengiriman }}</td> --}}
                {{-- <td>{{ $invoice->training }}</td> --}}
                <td>{!! $invoice->cara_pembayaran !!} / <br> 
                  {{ "Rp " . number_format($invoice->biaya_dok) }} <br> 
                  {{ $invoice->downpayment }} <br>
                  {{ "Rp " . number_format($invoice->nilaidp) }}</td>
                {{-- <td>{{ number_format($invoice->biaya_dok) }}</td> --}}
                <td>{!! $invoice->catatan !!}</td>
            </tr>
        @endforeach
      </tbody>
     
    </div>
  </table>
</body>
</html>