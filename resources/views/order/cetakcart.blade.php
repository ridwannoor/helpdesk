<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Logistik Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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

        table.a {
            font-size: 16px;
        }

        .satu {
            font-size: 16px;
        }
    </style>

</head>

<body>
    <div id="container">
        <div class="row" style="margin:3em">
            <div class="col-sm-12 ">
                {{-- <h1 class="align-bottom text-center"><strong>{{$judul1}}</strong></h1> --}}
            </div>
        </div>
        <div class="row">
            
            <div class="col-sm-12">
                <address class="satu">
                    <strong class="text-uppercase"><h1 style="vertical-align : middle;text-align:right;">E-LOGISTIK CART</h1></strong><br>
                    <p style="vertical-align : middle;text-align:right;">{{ $pref->nama_perusahaan }}</p>
                    <p style="vertical-align : middle;text-align:right;"> {{ $pref->email }}</p>
                    <br>
                   
                </address>
            </div>
        </div>
        {{-- <hr> --}}

        <div class="row">
            <div class="col-sm-12">
                <address class="satu">
                    <strong>No Order : </strong><h4>{{$carts->no_order}}</h4><br>
                    <strong>Tanggal : </strong><h4>{{  date("d-m-Y", strtotime($carts->tanggal))}}</h4>
                </address>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="vertical-align : middle;text-align:center;">No</th>
                            <th style="vertical-align : middle;text-align:center;">Material</th>
                            <th style="vertical-align : middle;text-align:center;">Harga</th>
                            <th style="vertical-align : middle;text-align:center;">Qty</th>
                            <th style="vertical-align : middle;text-align:center;">Jumlah</th>
                        </tr>
                    </thead>
                    @php
                    $no = 1 ;
                    @endphp
                    <tbody>
                        @foreach ($carts->orderdetails as $item)
                        {{-- @foreach ($item->orderdetails as $k) --}}
                            
                        {{-- @endforeach --}}
                            <tr>
                                <td style="vertical-align : middle;text-align:center;">{{ $no++ }}</td>
                                <td>
                                   <div class="row">
                                    <div class="col-sm-3">
                                        <img src="{{ url('data_file/'.$item->hargabarang->image) }}" alt="image" width="100px">
                                    </div>
                                    <div class="col-sm-9">
                                        <p>{{ $item->hargabarang->nama_brg }}</p>
                                        <p>{{ $item->hargabarang->vendor->namaperusahaan }}, {{ $item->hargabarang->lokasi->kode }} </p>
                                     </div>
                                </div>   

                                </td>
                                <td style="vertical-align : middle;text-align:right;">{{ "Rp ". number_format($item->harga)  }}</td>
                                <td style="vertical-align : middle;text-align:center;">{{ $item->qty }}</td>
                                <td style="vertical-align : middle;text-align:right;">{{ "Rp ". number_format($item->subtotal)  }}</td>
                                {{-- <td>{{ $item->qty }}</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br><br><br>
        <div class="row" style="margin:3em">
            <div class="col-sm-4">
                <address class="text-uppercase">
                    <p class="satu" style="vertical-align : middle;text-align:center;">Dibuat Oleh :</p>
                    <strong>
                        {{-- <div class="a">{{ $bapm->lokasi->kode }} </div> --}}
                    </strong>
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
                
            </div>
            <div class="col-sm-4">
                <address class="text-uppercase">
                    <p class="satu" style="vertical-align : middle;text-align:center;">Disetujui Oleh :</p>
                    <strong>
                        {{-- <div class="a">{{ $bapm->lokasi->kode }} </div> --}}
                    </strong>
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


</body>

</html>