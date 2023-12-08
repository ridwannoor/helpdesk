<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$judul}}</title>

    <!--begin::Global Theme Styles -->
    {{-- <link href="{{ asset('assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" /> --}}
    <!--end::Global Theme Styles -->
    {{-- <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.js"> --}}
    {{-- <link href="{{ asset('assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
    type="text/css" /> --}}
    {{-- https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/> --}}
    {{-- <link href="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet"
    type="text/css" /> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css}}">
    {{-- <link href="{{ asset('assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> --}}

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
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
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: #333;
            text-align: left;
            font-size: 8pt;
            margin: 0;
            margin-top: 5em;
            margin-bottom: 7em;
        }

        .page-break {
            page-break-after: always;
        }

        .container {
            margin: 0 auto;
            margin-top: 100px;
            margin-bottom: 50px;
            padding: 40px;
            width: 960px;
            height: auto;
            background-color: #fff;
        }

        caption {
            font-size: 28px;
            margin-bottom: 15px;
        }


        table {
            /* border: 1px solid #333; */
            border-collapse: collapse;
            margin: 0 auto;
            width: 100%;
        }
        /* .row {
            padding: 40px;
            margin: 10;
            width: 100%;
        }
         */
        .table,
        td,
        tr,
        th {
            padding: 12px;
            /* border: 1px solid #333; */
            /* width: 100%; */
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
        }

        h4,
        p {
            text-align: "justify"
                margin:15px;
        }

    </style>

</head>

<body>
    <header>
        <p style="text-align: right; font-size: 8pt"><img
                src="{{ public_path('data_file/'.$rekappos->preference->image) }}" width="300px" alt=""></p>
    </header>
    <div id="container">
        {{-- <div class="container-fluid"> --}}
        {{-- <div class="row" style="margin:2em">      
       <div class="col-sm-12">
         <img src="{{ public_path('data_file/'.$rekappos->preference->image) }}" class="pull-right" width="300px"
        alt="">
    </div>
    </div> --}}
    {{-- <div class="row" style="margin:3em">
        <div class="col-sm-12 ">
            {{-- <h1 class="align-bottom text-center"><strong>{{$judul}}</strong></h1> --}}

    <div class="row">
        <h1 style="text-align: center"><strong>{{$judul}} (PO)</strong></h1>
        <div class="table-responsive">
            <table class="table" border="1">
                <tbody>
                    <tr>
                        {{-- <td>Vendor : </td> --}}
                        <td colspan="4" style="vertical-align : top;text-align:justify;">
                            <strong class="text-uppercase">Vendor</strong><br>
                            {{ $rekappos->vendor->namaperusahaan }}, {{ $rekappos->vendor->badanusaha->kode }} <br>
                            {{ $rekappos->vendor->alamat }} <br>
                            {{ $rekappos->vendor->email }}<br>
                            {{ $rekappos->vendor->notelp }}<br>
                            {{-- {{ $rekappos->vendor->bank->name }} <br>
                            {{ $rekappos->vendor->no_rek }} <br>
                            {{ $rekappos->vendor->pemilik_rek }} --}}
                        </td>
                        {{-- <td width="50px"></td> --}}
                        <td colspan="4" style="vertical-align : top;text-align:justify;">
                            <strong class="text-uppercase">Pemesanan</strong><br>
                            {{ $rekappos->preference->nama_perusahaan }}<br>
                            {{ $rekappos->preference->address }}<br>
                            {{ $rekappos->preference->email }}<br>
                            {{ $rekappos->preference->phone }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" width=50%>Purchase Order : <span>{{$rekappos->no_po}}</span><br></td>
                        {{-- <td></td> --}}
                        <td colspan="4" width=50%>No. Kontrak : <span>{{$rekappos->no_kontrak}}</span><br></td>
                    </tr>
                    <tr>
                        <td colspan="4" width=50%>Tanggal :
                            <span>{{  date("d-m-Y", strtotime($rekappos->tanggal))}}</span></td>
                        {{-- <td></td> --}}
                        <td colspan="4" width=50%>Waktu Pelaksanaan :
                            <span>{{  date("d-m-Y", strtotime($rekappos->start_date))}}
                                /
                                {{  date("d-m-Y", strtotime($rekappos->end_date))}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" width=50%>Pekerjaan : {{ $rekappos->nama_pekerjaan }} -
                            {{ $rekappos->lokasi->kode }}</td>
                        {{-- <td></td> --}}
                        <td colspan="4" width=50%>Pajak :
                            @if ($rekappos->pajak == "exclude")
                            <span>Exclude Tax (V0)</span>
                            @elseif ($rekappos->pajak == "ppn")
                            <span>Include Tax (V1)</span>
                            @elseif ($rekappos->pajak == "ppn11")
                            <span>Include Tax (V1)</span>
                            @elseif ($rekappos->pajak == "pph")
                            <span>Include Tax (V1)</span>
                            @else
                            <span>Include Tax (V1)</span>
                            @endif
                            {{-- / Asuransi : 
                            @if ($rekappos->asuransi == 0)
                            <span>Exclude Assurance </span>
                            @else
                            <span>Include Assurance</span>
                            @endif --}}
                        </td>
                    </tr>
                </tbody>
                {{-- </table>
            <table class="table" border="1" > --}}
                <thead>
                    <tr>
                        <th width="10px" style="vertical-align : middle;text-align:center; ">No</th>
                        <th width="400px" colspan="3" style="vertical-align : middle;text-align:center;">Material</th>
                        <th width="10px" style="vertical-align : middle;text-align:center;">Satuan</th>
                        {{-- <th width="50px" style="vertical-align : middle;text-align:center;">Ppn</th> --}}
                        <th width="10px" style="vertical-align : middle;text-align:center; ">Qty</th>
                        <th width="140px" style="vertical-align : middle;text-align:center;">Harga</th>
                        <th width="140px" style="vertical-align : middle;text-align:center;">Jumlah</th>
                    </tr>
                </thead>
                @php
                $no = 1 ;
                $subtotal = 0;
                $subatotal = 0;
                $ppn = 0;
                $diskon = 0;
                @endphp
                <tbody>
                    @foreach ($rekappos->podetails as $item)
                    @php
                        $jumlah = $item->qty*$item->harga ;
                        $subtotal += $jumlah; 
                    @endphp
                    <tr>
                        <td style="vertical-align : middle;text-align:center;">{{$no++}}</td>
                        <td colspan="3" style="vertical-align : middle;text-align:left;">
                            {!! $item->hargabarang->nama_brg !!}</td>
                        <td style="vertical-align : middle;text-align:center;">{{ $item->satuan }}</td>
                        {{-- <td style="vertical-align : middle;text-align:center;">
                            @if ($rekappos->pajak == 0)
                            <span>V0</span>
                            @else
                            <span>V1</span>
                            @endif
                        </td> --}}
                        <td style="vertical-align : middle;text-align:center;">{{ $item->qty }}</td>
                        <td style="vertical-align : middle;text-align:right;">{{$rekappos->currency->name . " " . format_uang($item->harga) }}</td>
                        <td style="vertical-align : middle;text-align:right;">{{$rekappos->currency->name . " " . format_uang($jumlah) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                @php
                    if ($rekappos->pajak == "ppn") {                                                    
                        $subatotal = $subtotal - $rekappos->diskon;
                        $ppn = $subatotal * 10/100; 
                        $total = $subatotal + $ppn + $rekappos->biaya_kirim + $rekappos->custom1 - $rekappos->custom3;    
                    } 
                    elseif ($rekappos->pajak == "ppn11") {                                                    
                        $subatotal = $subtotal - $rekappos->diskon;
                        $ppn = $subatotal * 11/100; 
                        $total = $subatotal + $ppn + $rekappos->biaya_kirim + $rekappos->custom1 - $rekappos->custom3;    
                    } 
                    elseif ($rekappos->pajak == "pph") {                                                    
                        $subatotal = $subtotal - $rekappos->diskon;
                        $ppn = $subatotal * 1/100; 
                        $total = $subatotal + $ppn + $rekappos->biaya_kirim + $rekappos->custom1 - $rekappos->custom3;    
                    } 
                    elseif ($rekappos->pajak == "other") {
                        $subatotal = $subtotal - $rekappos->diskon;
                        $ppn = $subatotal * $rekappos->pajak1/100;
                        $total = $subatotal  + $ppn + $rekappos->biaya_kirim + $rekappos->custom1 - $rekappos->custom3;
                    }
                    else {
                        $subatotal = $subtotal - $rekappos->diskon;
                        // $ppn = $subatotal * $rekappos->pajak1/100;
                        $total = $subatotal + $rekappos->biaya_kirim + $rekappos->custom1 - $rekappos->custom3;
                    }
                @endphp
                <tfoot>
                    <tr>
                        <td colspan="7" style="vertical-align : middle;text-align:right;">Sub Total</td>
                        <td style="vertical-align : middle;text-align:right;">{{$rekappos->currency->name . " " . format_uang($subtotal) }}</td>
                    </tr>
                    @if($rekappos->diskon)
                    <tr>
                        <td colspan="7" style="vertical-align : middle;text-align:right;">Disc</td>
                        <td style="vertical-align : middle;text-align:right;">{{$rekappos->currency->name . " " . format_uang($rekappos->diskon) }}</td>
                    </tr>

                    <tr>
                        <td colspan="7" style="vertical-align : middle;text-align:right;">Sub Total After Disc</td>
                        <td style="vertical-align : middle;text-align:right;">{{$rekappos->currency->name . " " . format_uang($subatotal) }}</td>
                    </tr>
                    @endif
                    @if($rekappos->pajak != "exclude")
                    <tr>
                        
                        <td colspan="7" style="vertical-align : middle;text-align:right;">
                            @if ($rekappos->pajak == "ppn")
                            PPN 10%
                            @elseif ($rekappos->pajak == "ppn11")
                            PPN 11%   
                            @elseif ($rekappos->pajak == "pph")
                            PPN 1%                            
                            @elseif ($rekappos->pajak == "other")
                            PPN {{ $rekappos->pajak1 . "%" }}
                            @endif
                        </td>
                        <td style="vertical-align : middle;text-align:right;">
                        {{-- @if () --}}
                        @if ($rekappos->pajak == "ppn")
                          {{$rekappos->currency->name . " " . format_uang($ppn = $subatotal * 10/100)   }}
                          @elseif ($rekappos->pajak == "ppn11")
                          {{$rekappos->currency->name . " " . format_uang($ppn = $subatotal * 11/100)   }} 
                        @elseif ($rekappos->pajak == "pph")
                        {{$rekappos->currency->name . " " . format_uang($ppn = $subatotal * 1/100)   }}                 
                        @elseif ($rekappos->pajak == "other")
                        {{$rekappos->currency->name . " " . format_uang($ppn = $subatotal *  $rekappos->pajak1 / 100)   }}  
                        @endif
                        {{-- @endif --}}
                            {{-- {{ format_uang($ppn) }} --}}
                        </td>
                    </tr>
                    @endif
                    @if($rekappos->biaya_kirim)
                    <tr>
                        {{-- <td></td>
                        <td></td>
                        <td></td>
                        <td></td> --}}
                        <td colspan="7" style="vertical-align : middle;text-align:right;">Biaya Kirim</td>
                        <td style="vertical-align : middle;text-align:right;">{{$rekappos->currency->name . " " . format_uang($rekappos->biaya_kirim) }}
                        </td>
                    </tr>
                    @endif
                    @if($rekappos->custom)
                    <tr>
                        {{-- <td></td>
                        <td></td>
                        <td></td>
                        <td></td> --}}
                        <td colspan="7" style="vertical-align : middle;text-align:right;">{{ $rekappos->custom }}</td>
                        <td style="vertical-align : middle;text-align:right;">{{$rekappos->currency->name . " " . format_uang($rekappos->custom1) }}
                        </td>
                    </tr>
                    @endif
                    @if($rekappos->custom2)
                    <tr>
                        {{-- <td></td>
                        <td></td>
                        <td></td>
                        <td></td> --}}
                        <td colspan="7" style="vertical-align : middle;text-align:right;">{{ $rekappos->custom2 }}</td>
                        <td style="vertical-align : middle;text-align:right;">{{$rekappos->currency->name . " " . format_uang($rekappos->custom3) }}
                        </td>
                    </tr>
                    @endif
                    <tr>
                        {{-- <td></td>
                        <td></td>
                        <td></td>
                        <td></td> --}}
                        <td colspan="7" style="vertical-align : middle;text-align:right;"><strong>TOTAL</strong> </td>
                        <td style="vertical-align : middle;text-align:right;">
                            <strong>{{$rekappos->currency->name . " " . format_uang($total) }}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="8" style="vertical-align : middle;text-align:left;"><strong>Terbilang :</strong>
                            <br><span style="text-transform: capitalize"><i>
                                    {{  $rekappos->total  }}</span> </i> </td>
                        {{-- <td style="vertical-align : middle;text-align:right;"><strong>{{ format_uang($rekappos->total) }}</strong>
                        </td> --}}
                    </tr>
                    <tr>
                        <td colspan="8" height="150px" style="vertical-align : top;text-align:left;">
                            <strong> Pembayaran :
                                @if ($rekappos->cara_bayar == "cbd")
                                Cash Before Delivery <br>
                                @elseif ($rekappos->cara_bayar == "cad")
                                Cash After Delivery <br>
                                @elseif ($rekappos->cara_bayar == "dp")
                                DP 20% & Sisa 80% <br>
                                @else
                                {{ $rekappos->cara_bayar1 }} <br>
                                @endif
                            </strong>
                            <i> Term of Payment (TOP) </i>
                            <br><br>
                            <strong> Catatan : <i>VO = Exclude PPN ; V1 = Include PPN</i></strong> <br>
                            <i>Notes </i> <br>
                            <ol type="I">
                                @if ($rekappos->asuransi == "include")
                                <li>                                      
                                    <span>Termasuk Asuransi</span>                                    
                                </li> 
                                @endif
 				@if ($rekappos->catatan)
                                <li>{!! $rekappos->catatan !!}</li>
				@endif
                                <li> <span> Harga {{ $rekappos->hargapabrik }} {{ $rekappos->deskripsi }} </span></li>
                                @if ($rekappos->suratpenawaran == "spph")
                                <li>  <span>Sesuai Surat Penawaran Harga {{ $rekappos->desc }} Tanggal  {{  date("d-m-Y", strtotime($rekappos->desc_tgl)) }} </span> </li>
                                @else
                                   <li> <span>Sesuai Surat Penawaran Harga Nego No {{ $rekappos->desc }} Tanggal  {{  date("d-m-Y", strtotime($rekappos->desc_tgl)) }} </span></li>
                                @endif
                                   <li> <span>Mohon dapat diemail ke logistik@approperti.co.id setelah PO diterima, ditandatangan dan stempel perusahaan paling lambat 3 hari kerja.  </span>  </li>
                            </ol> 
                        </td>
                    </tr>
                </tfoot>
            </table>
    </div>
    </div>

         <div class="row">

        <div class="table-responsive">
            <table class="table a">
                <tbody>
                    <tr>
                        <td style="vertical-align : top;text-align:center;">
                            {{ $rekappos->vendor->namaperusahaan }}, {{ $rekappos->vendor->badanusaha->kode }}
                            <br><br><br><br><br><br><br>
                        </td>
                        <td style="vertical-align : top;text-align:center;">
                            {{ $rekappos->preference->nama_perusahaan }}
                            <br><br><br><br><br><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align : top;text-align:center;">
                            ________________________
                        </td>
                        <td style="vertical-align : top;text-align:center;">
                            <strong> {{ $rekappos->bod->name }}</strong> <br>
                          
                            {{ $rekappos->bod->jabatan }}
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    </div>



    </div>


    <script src="{{ asset('assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
    <!--end::Global Theme Bundle -->


</body>

</html>
