<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$judul}}</title>

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> --}}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/usm/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}
    {{-- <style type="text/css">
        p{
          font-family: sans-serif;
          line-height: 1.75em;
          font-size:   1rem ;
        }
        i {
          font-family: sans;
          color: orange;
        }
      </style> --}}
<style>
div.a {
  font-size: 16px;
}

div.b {
  font-size: large;
}

div.c {
  font-size: 150%;
}

table.a { font-size: 16px; }
.satu { font-size: 16px; }

header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 3cm;
            }

</style>

</head>

<body>
    <header>
        <p style="text-align: left; font-size: 8pt"><img src="{{ public_path('data_file/'.$bapm->preference->image) }}" width="300px" alt=""></p>
    </header>

    <div id="container">
    {{-- <div class="container-fluid"> --}}
   {{-- <div class="row" style="margin:3em">
       <div class="col-sm-12">
         <img src="{{ public_path('data_file/'.$bapm->preference->image) }}" class="pull-right" width="300px" alt="">
        </div>
   </div> --}}
   <div class="row" style="margin:5em">
    <div class="col-sm-12 ">
        <h1 class="align-bottom text-center"><strong>{{$judul1}}</strong></h1>
        </div>
   </div>
    <div class="row">
        <div class="col-sm-6">
            <address class="satu">
                <strong class="text-uppercase" >Vendor</strong><br>
                {{ $bapm->vendor->namaperusahaan }},  {{ $bapm->vendor->badanusaha->kode }}<br>
                {{ $bapm->vendor->alamat }}<br>
                {{ $bapm->vendor->email }}<br>
                {{ $bapm->vendor->no_telp }}<br>
            </address>
        </div>
        <div class="col-sm-6">
            <address class="satu">
                <strong class="text-uppercase">Pemesanan</strong><br>
                {{ $bapm->preference->nama_perusahaan }}<br>
                {{ $bapm->preference->address }}<br>
                {{ $bapm->preference->email }}<br>
                {{ $bapm->preference->phone }}
            </address>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-sm-6">
            <address class="satu">
                <strong>Delivery Order : </strong><span>{{$bapm->no_do}}</span><br>
                <strong>Ref PO Nomor   : </strong><span>{{$bapm->ref_po}}</span><br>
                <strong>Tanggal        : </strong><span>{{  date("d-m-Y", strtotime($bapm->tanggal))}}</span>
            </address>
        </div>
        <div class="col-sm-6">
            <address class="satu">
                <strong>Waktu Pelaksanaan : </strong><span>{{  date("d-m-Y", strtotime($bapm->tgl_mulai))}} / {{  date("d-m-Y", strtotime($bapm->tgl_akhir))}}</span><br>
                <strong>Waktu Pengiriman   : </strong><span>{{  date("d-m-Y", strtotime($bapm->tgl_pengiriman))}}</span>
            </address>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-sm-6">
            <address class="satu">
               <strong class="text-uppercase">Lokasi Pengambilan</strong><br>
                <p class="text-justify" style="margin-right:2em">{{ $bapm->lokasi_pengambilan }}</p>
            </address>
        </div>
        <div class="col-sm-6">
            <address class="satu">
              <strong class="text-uppercase">Tujuan Pengiriman</strong><br>
               <p class="text-justify" style="margin-right:2em">{{ $bapm->tujuan_pengiriman }}</p>
            </address>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="table-responsive">
            <table class="table a">
                <thead>
                     <tr>
                                                <th rowspan="2" style="vertical-align : middle;text-align:center;">No</th>
                                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Material</th>
                                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Satuan</th>
                                                <th colspan="2" style="vertical-align : middle;text-align:center;">Pengiriman</th>
                                                <th colspan="2" style="vertical-align : middle;text-align:center;">Penerimaan</th>
                                                {{-- <th>Action</th> --}}
                                                {{-- <th><a href="#" class="addRow">Add More</a></th> --}}
                                                {{-- <th width='130px'>Action</th> --}}
                                            </tr>
                                            <tr>
                                                    <th style="vertical-align : middle;text-align:center;">Qty</th>
                                                    <th style="vertical-align : middle;text-align:center;">Catatan</th>
                                                    <th style="vertical-align : middle;text-align:center;">Qty Baik</th>
                                                    <th style="vertical-align : middle;text-align:center;">Qty Rusak</th>
                                            </tr>
                </thead>
                @php
                    $no = 1 ;
                @endphp
                <tbody>
                    @foreach ($bapm->dodetails as $item)
                    <tr>
                            <td style="vertical-align : middle;text-align:center;">{{$no++}}</td>
                            <td style="vertical-align : middle;text-align:left;">{{ html_entity_decode(strip_tags($item->hargabarang->nama_brg)) }}</td>
                            <td style="vertical-align : middle;text-align:center;">{{ html_entity_decode(strip_tags($item->satuan)) }}</td>
                            <td style="vertical-align : middle;text-align:center;">{{ html_entity_decode(strip_tags($item->qty)) }}</td>
                            <td style="vertical-align : middle;text-align:center;">{{ html_entity_decode(strip_tags($item->catatan)) }}</td>
                            {{-- <td style="vertical-align : middle;text-align:center;">
                            </td> --}}
                                {{-- @if (number_format($item->qty_baik) == 0)
                                    <td style="vertical-align : middle;text-align:center;"></td>
                                @else --}}
                                    <td style="vertical-align : middle;text-align:center;">{{ $item->qty_baik . " baik" }}</td>
                                {{-- @endif --}}

					        <td style="vertical-align : middle;text-align:center;">{{ $item->qty_rusak . " rusak" }}</td>
                            {{-- <td></td> --}}
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row" style="padding:5rem">
        <div class="col-sm-4">
            <address class="text-uppercase">
                <p class="satu">Diterima Oleh :</p>
		<strong> <div class="a">{{ $bapm->lokasi->kode }} </div> </strong>
            </address>
	<br>
        <br>
	<br>
	<br>
	<br>
	<br>
	<hr>
        </div>
        <div class="col-sm-4">
            <address class="text-uppercase">
                <p class="satu">Mengetahui :</p>
              <strong>  <div class="a"> {{$bapm->vendor->namaperusahaan}}, {{ $bapm->vendor->badanusaha->kode }} </div> </strong>
            </address>
	<br>
        <br>
	<br>
	<br>
	<br>
	<br>
	<hr>

        </div>
        <div class="col-sm-4">
            <address class="text-uppercase">
                <p class="satu">{{$bapm->preference->nama_perusahaan}}</p>
               <strong> <div class="a">VENDOR RESOURCE MANAGEMENT MANAGER</div> </strong>
            </address>
	<br>
        <br>
	<br>
	<br>
	<br>
	<br>
	<hr>

        </div>
    </div>


</div>

{{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/usm/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}

</body>

</html>
