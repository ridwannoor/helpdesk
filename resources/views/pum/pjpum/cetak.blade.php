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

        table.a {
            font-size: 16px;
        }

        .border {
            border: 0;
        }

        .satu {
            font-size: 16px;
        }

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
        <p style="text-align: right; font-size: 8pt"><img src="{{ public_path('data_file/'.$preferences->image) }}"
                width="300px" alt=""></p>
    </header>

    <div id="container">
        {{-- <div class="container-fluid"> --}}
        {{-- <div class="row" style="margin:3em">      
       <div class="col-sm-12">
         <img src="{{ public_path('data_file/'.$pums->preference->image) }}" class="pull-right" width="300px" alt="">
    </div>
    </div> --}}
    <div class="row" style="margin-top:10em">
        <div class="col-lg-12 ">
            <h2 class="align-bottom text-center"><strong>{{$judul1}}</strong></h2>
            <h4 class="align-bottom text-center">{{$pums->no_pjpum}}</h4>
            <br>
          
        </div>
       
    </div>
   

    <div class="row">
        <div class="col-lg-12">
            <p style="font-size: 8pt;">Pada hari {{ hariIndo(date('l', strtotime($pums->tanggal))) }}, tanggal
                {{ terbilang(date('d', strtotime($pums->tanggal))) }} bulan {{ bulanIndo(date('F', strtotime($pums->tanggal)))}} tahun 
                {{ terbilang(date('Y', strtotime($pums->tanggal))) }}
                ({{ date("d-m-Y", strtotime($pums->tanggal)) }}) 
                diselesaikan pertanggungjawaban atas Permintaan Uang Muka (PUM)</p> <br>
        </div>
        <div class="col-lg-12">
            <address class="satu">
                {{-- <table class="table-responsive"> --}}
                {{-- <div class="table-responsive"> --}}
                    <table class="table table-responsive a">
                        <tbody>
                            <tr>
                                <td>Nama Pekerjaan </td>
                                <td>:</td>
                                <td>{{$pums->pumheader->nama_pek}}</td>    
                            </tr>   
                            <tr>
                                <td>Tanggal :</td>
                                <td>:</td>
                                <td>{{date("d-m-Y", strtotime($pums->tanggal))}}</td>    
                            </tr>   
                            {{-- <tr>
                                <td>Lokasi :</td>
                                <td>:</td>
                                <td>{{$pums->lokasi->kode}}</td>    
                            </tr>      --}}
                        </tbody>   
                    </table>
                {{-- </div> --}}
             
                {{-- <strong>Service Order : </strong><span>{{$pums->no_pum}}</span><br> --}}
                {{-- <strong>Nama Pekerjaan : </strong><span>{{$pums->nama_pek}}</span><br>
                <strong>Tanggal : </strong><span>{{  date("d-m-Y", strtotime($pums->tanggal))}}</span><br>
                <strong>Lokasi : </strong><span>{{ $pums->lokasi->kode }}</span> --}}
                {{-- <strong>Tanggal Kontrak        : </strong><span>{{  date("d-m-Y", strtotime($pums->tgl_kontrak))}}</span>
                --}}
            </address>
        </div>
        {{-- <div class="col-sm-6">
            <address class="satu">
                {{-- <strong>Waktu Pelaksanaan : </strong><span>{{  date("d-m-Y", strtotime($pums->start_date))}} /
                {{  date("d-m-Y", strtotime($pums->end_date))}}</span><br> 
                <strong>Tanggal : </strong><span>{{  date("d-m-Y", strtotime($pums->tanggal))}}</span><br>
                <strong>Lokasi : </strong><span>{{ $pums->lokasi->kode }}</span>
            </address>
        </div> --}}
    </div>
    {{-- <hr> --}}


    <div class="row">
        <div class="table-responsive">
            <table class="table a">
                <thead>
                    <tr>
                        <th style="vertical-align : middle;text-align:center;">No</th>
                        <th style="vertical-align : middle;text-align:center;">Deskripsi</th>
                        <th style="vertical-align : middle;text-align:center;">Nilai PUM</th>
                        <th style="vertical-align : middle;text-align:center;">Realisasi</th>
                        <th style="vertical-align : middle;text-align:center;">Saldo (+)(-)</th>
                        <th style="vertical-align : middle;text-align:center;">Keterangan</th>
                    </tr>
                </thead>
                @php
                $no = 1 ;
                $total = 0;
                @endphp
                <tbody>
                    @foreach ($pums->pjpumdetails as $item)
                    @php
                        $total += $item->jumlah;
                        $saldo = $pums->pumheader->total - $total;
                    @endphp
                    <tr>
                        <td style="vertical-align : middle;text-align:center;">{{$no++}}</td>
                        <td style="vertical-align : middle;text-align:left;">{{ $item->deskripsi }}</td>
                        <td></td>
                        {{-- <td style="vertical-align : middle;text-align:center;">{{"Rp " . format_uang($pums->pumheader->total)  }}</td> --}}
                        <td style="vertical-align : middle;text-align:right;">{{"Rp " .  format_uang( $item->jumlah) }}</td>
                        <td></td>
                    </tr>

                    @endforeach
                    <tr>
                        <td></td>
                        <td style="vertical-align : middle;text-align:right; font-style: oblique;"><strong>Total</strong> </td>
                        <td style="vertical-align : middle;text-align:right; font-style: oblique;"><strong>{{"Rp " . format_uang( $pums->pumheader->total) }}</strong></td>
                        <td style="vertical-align : middle;text-align:right; font-style: oblique;"><strong>{{"Rp " . format_uang( $total) }}</strong></td>
                        <td style="vertical-align : middle;text-align:right; font-style: oblique;"><strong>{{"Rp " . format_uang( $saldo) }}</strong></td>
                        <td style="vertical-align : middle;text-align:left; font-style: oblique;"><strong>Setor Ke APP</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <p style="font-size: 8pt; ">Demikian berita acara ini dibuat untuk kelengkapan administrasi pertanggungjawaban uang muka </p>
            {{-- PUM disetujui / ditolak sebesar  {{ "Rp " . format_uang( $pums->total) .",-" }}</p> --}}
        </div>
    </div>
    <div class="row" style="padding:5rem">
        
        <div class="col-sm-4">
            <address class="text-uppercase">
                <p class="satu">Diajukan Oleh :</p>
                <strong>
                    {{-- <div class="a">Logistic Officer</div> --}}
                </strong>
            </address>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <span class="text-uppercase" style="font-size: 8pt">{{ $pums->membuat }} </span>
        </div>
        <div class="col-sm-4">
           
        </div>
        <div class="col-sm-4">
            <address class="text-uppercase">
                <p class="satu">Mengetahui :</p>
                <strong>
                    {{-- <div class="a">{{ $pums->menyetujui }}</div> --}}
                </strong>
            </address>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <span class="text-uppercase" style="font-size: 8pt; ">{{ $pums->mengetahui }} </span>
        </div>
    </div>
</div>

    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/usm/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}

</body>

</html>
