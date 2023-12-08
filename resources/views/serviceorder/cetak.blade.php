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
        <p style="text-align: right; font-size: 8pt"><img src="{{ public_path('data_file/'.$serviceorders->preference->image) }}" width="300px" alt=""></p>
    </header>

    <div id="container">        
    {{-- <div class="container-fluid"> --}}
   {{-- <div class="row" style="margin:3em">      
       <div class="col-sm-12">
         <img src="{{ public_path('data_file/'.$serviceorders->preference->image) }}" class="pull-right" width="300px" alt="">                                       
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
                {{ $serviceorders->vendor->namaperusahaan }},  {{ $serviceorders->vendor->badanusaha->kode }}<br>
                {{ $serviceorders->vendor->alamat }}<br>
                {{ $serviceorders->vendor->email }}<br>
                {{ $serviceorders->vendor->no_telp }}<br>
            </address>        
        </div>
        <div class="col-sm-6">
            <address class="satu">
                <strong class="text-uppercase">Pemesanan</strong><br>
                {{ $serviceorders->preference->nama_perusahaan }}<br>
                {{ $serviceorders->preference->address }}<br>
                {{ $serviceorders->preference->email }}<br>
                {{ $serviceorders->preference->phone }}
            </address>                                   
        </div>
    </div>
    <hr>
    
    <div class="row">
        <div class="col-sm-6">
            <address class="satu">
                <strong>Service Order : </strong><span>{{$serviceorders->no_so}}</span><br>
                <strong>No Kontrak   : </strong><span>{{$serviceorders->no_kontrak}}</span><br>
                <strong>Tanggal Kontrak        : </strong><span>{{  date("d-m-Y", strtotime($serviceorders->tgl_kontrak))}}</span>
            </address>
        </div>
        <div class="col-sm-6">
            <address class="satu">
                <strong>Waktu Pelaksanaan : </strong><span>{{  date("d-m-Y", strtotime($serviceorders->start_date))}} / {{  date("d-m-Y", strtotime($serviceorders->end_date))}}</span><br>
                <strong>Tanggal   : </strong><span>{{  date("d-m-Y", strtotime($serviceorders->tanggal))}}</span>
            </address>             
        </div>
    </div>
    <hr>
    

    <div class="row">
        <div class="table-responsive">
            <table class="table a">
                <thead>
                     <tr>
                        <th style="vertical-align : middle;text-align:center;">No</th>
                        <th style="vertical-align : middle;text-align:center;">Deskripsi</th>
                        <th style="vertical-align : middle;text-align:center;">Qty</th>
                        <th style="vertical-align : middle;text-align:center;">Satuan</th>                                                     
                        <th style="vertical-align : middle;text-align:center;">Serial Number</th>                                                    
                        <th style="vertical-align : middle;text-align:center;">Lokasi</th>                                                   
                        <th style="vertical-align : middle;text-align:center;">Catatan</th>
                    </tr>
                </thead>
                @php
                    $no = 1 ;
                @endphp
                <tbody>
                    @foreach ($serviceorders->sodetails as $item)                                                
                    <tr>
                        <td style="vertical-align : middle;text-align:center;">{{$no++}}</td>
                        <td style="vertical-align : middle;text-align:left;">{{ $item->deskripsi }}</td>                                                
                        <td style="vertical-align : middle;text-align:center;">{{ $item->qty }}</td>
                        <td style="vertical-align : middle;text-align:center;">{{ $item->satuan }}</td>                                                 
                        <td style="vertical-align : middle;text-align:left;">{{ $item->serial_num }}</td>                                               
                        <td style="vertical-align : middle;text-align:left;">{{ $item->lokasi }}</td>                                             
                        <td style="vertical-align : middle;text-align:left;">{{ $item->catatan }}</td>
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
		<strong> <div class="a">{{ $serviceorders->lokasi->kode }} </div> </strong>               
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
              <strong>  <div class="a"> {{$serviceorders->vendor->namaperusahaan}}, {{ $serviceorders->vendor->badanusaha->kode }} </div> </strong>
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
                <p class="satu">{{$serviceorders->preference->nama_perusahaan}}</p>
               <strong> <div class="a">{{ $serviceorders->bod->jabatan }}</div> </strong>
            </address>
	<br>
        <br>
	<br>
	<br>
	<br>
	<br>
	<span style="font-size: 8pt">{{ $serviceorders->bod->name }}</span>

        </div>
    </div>  
   
    
</div>

{{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/usm/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}

</body>

</html>
