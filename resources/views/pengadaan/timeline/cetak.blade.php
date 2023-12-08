<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>{{ $judul  }} {{ $tim->nomor_spk }}</title> --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
</head>
{{-- @include('component.head') --}}

<style>
    body {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        color: #333;
        text-align: left;
        font-size: 20px;
        margin: 0;
    }

    .pagenum:before {
        content: counter(page);
}

    .page-break {
        page-break-after: always;
    }

    .tab1 {
            tab-size: 2;
        }
  
    .tab2 {
        tab-size: 4;
    }

    .tab4 {
        tab-size: 8;
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
        border: 1px solid #333;
        border-collapse: collapse;
        margin: 0 auto;
        width: 960px;
    }

    .table, td, tr, th {
        padding: 12px;
        border: 1px solid #333;
        /* width: 100%; */
    }
    header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 3cm;
            }

    ol li {
        /* background: #ffe5e5;
        color: darkred; */
        /* padding: 5px; */
        margin-bottom: 15px;
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
{{-- @include('component.head') --}}

<body>
     
    <footer> 
        <hr>
        <p>
          {{-- <span style="text-align: left; font-size: 8pt"> {{ "BA." . $spk->bakesepakatan->nomor_bak }} <br>
        {{ "Tanggal " . $spk->tanggal }}
        </span>   --}}
     
        </p>
        <p style="text-align: right; font-size: 8pt">  <span class="pagenum"></span></p>
          
                            {{-- {{ strtoupper( "BERITA ACARA KESEPAKATAN " . $spk->bakesepakatan->banegopengadaans->bapengadaan->judul_pekerjaan)  }}</i> </p> --}}
        {{-- <img src="{{ url('data_file/' . $pref->image) }}" width="100%" height="100%"/> --}}
    </footer>
    <div class="container">
        <header class="mt-0">
            <p style="text-align: right; font-size: 8pt"><img src="{{ public_path('data_file/'.$pref->image) }}" width="300px" alt=""></p>
        </header>   
        <div class="row">
            @php
                $no =1;
            @endphp
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="5">
                            @if ($times->rpp_1)
                            Time Line Tender (Metode 2 Sampul)
                            @else    
                            Time Line Tender (Metode 1 Sampul)
                            @endif                          
                        </th>
                    </tr>
                    <tr>
                        <th style="width: 50px; text-align: center" >No</th>
                        <th>Dokumen</th>
                        <th style="width: 120px; text-align: center">Tanggal</th>
                        <th>Checklist</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        <td style="width: 50px; text-align: center">{{ $no++ }}</td>
                        <td>Pengumuman Tender</td>
                        <td style="width: 120px; text-align: center">
                            @if ($times->tender->tgl_paket)
                            {{date('d-m-Y', strtotime($times->tender->tgl_paket))  }} 
                            @endif
                            {{-- {{date('d-m-Y', strtotime($times->tender->tgl_paket))  }}  --}}
                        </td>
                        <td>
                            @if ($times->tender->tgl_paket)
                            <input type="checkbox" name="" id="" checked>
                            @endif
                        </td>
                        <td>  {{ $times->tender->nama_paket }}</td>
                    </tr>
                    <tr>
                        <td style="width: 50px; text-align: center">{{ $no++ }}</td>
                        <td>Pendaftaran Peserta</td>
                        <td style="width: 120px; text-align: center">
                            @if ($times->tender->tgl_tutup)
                            {{date('d-m-Y', strtotime($times->tender->tgl_tutup))  }} 
                            @endif
                        </td>
                        <td>
                            @if ($times->tender->tgl_tutup)
                            <input type="checkbox" name="" id="" checked>
                            @endif
                        </td>
                        <td>
                            @foreach ($times->tender->tenderpenawaran as $item)
                                {{-- @foreach ($item->vendor as $v) --}}
                                    {{-- @foreach ($v as $c) --}}
                                    {{ " - " . $item->vendor->namaperusahaan . ", " . $item->vendor->badanusaha->kode }} <br>
                                    {{-- @endforeach                                  --}}
                                {{-- @endforeach --}}
                            @endforeach
                        </td>
                        {{-- <td>  {{ $times->tender->nama_paket }}</td> --}}
                    </tr>
                    <tr>
                        <td style="width: 50px; text-align: center">{{ $no++ }}</td>
                        <td>Undangan Aanwijzing </td>
                        {{-- <td>:</td> --}}
                        <td style="width: 120px; text-align: center">
                            @if ($times->tender->undangan_aanwizing)
                            {{date('d-m-Y', strtotime($times->undangan_aanwizing)) }}
                            @endif
                        </td>
                        <td>        
                            @if ($times->tender->undangan_aanwizing)
                            <input type="checkbox" name="" id="" checked>
                            @endif
                        </td>
                        <td>{{ $times->ket_undangan }}</td>
                    </tr>
                   
                    <tr>
                        <td style="width: 50px; text-align: center">{{ $no++ }}</td>
                        <td>Rapat Penjelasan Pekerjaan (Aanwijzing)</td>
                        {{-- <td>:</td> --}}
                        <td style="width: 120px; text-align: center">
                            @if ($times->tender->rapat_pekerjaan)
                            {{date('d-m-Y', strtotime( $times->rapat_pekerjaan))}}
                            @endif
                        </td>
                        <td>
                            @if ($times->tender->rapat_pekerjaan)
                            <input type="checkbox" name="" id="" checked>
                            @endif
                        </td>
                        <td>{{ $times->ket_rapat }}</td>
                    </tr>
                    <tr>
                        <td style="width: 50px; text-align: center">{{ $no++ }}</td>
                        <td>Dokumen Pengadaan (SBD)</td>
                        {{-- <td>:</td> --}}
                        <td style="width: 120px; text-align: center">
                            @if ($times->tender->sbd)
                            {{date('d-m-Y', strtotime( $times->sbd))}}
                            @endif
                        </td>
                        <td>
                            @if ($times->tender->sbd)
                            <input type="checkbox" name="" id="" checked>
                            @endif
                        </td>
                        <td>{{ $times->ket_sbd }}</td>
                    </tr>
                    <tr>
                        <td style="width: 50px; text-align: center">{{ $no++ }}</td>
                        <td>Surat Penawaran Harga</td>
                        {{-- <td>:</td> --}}
                        <td  style="width: 120px; text-align: center">
                            @if ($times->tender->sph)
                            {{date('d-m-Y', strtotime( $times->sph))}}
                            @endif
                        </td>
                        <td>
                            @if ($times->tender->sph)
                            <input type="checkbox" name="" id="" checked>
                            @endif
                        </td>
                        <td>{{ $times->ket_sph }}</td>
                    </tr>
                    @if ($times->rpp_1 )
                        <tr>
                            <td style="width: 50px; text-align: center">{{ $no++ }}</td>
                            <td>Rapat Pembukaan Penawaran Tahap 1</td>
                            {{-- <td>:</td> --}}
                            <td style="width: 120px; text-align: center">
                                @if ($times->tender->rpp)
                                {{date('d-m-Y', strtotime( $times->rpp)) }}
                                @endif
                            </td>
                            <td>
                                @if ($times->tender->rpp)
                                <input type="checkbox" name="" id="" checked>
                                @endif
                            </td>
                            <td>{{ $times->ket_rpp }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50px; text-align: center">{{ $no++ }}</td>
                            <td>Pengumuman Hasil Evaluasi Tahap 1 & Undangan Pembukaan Penawaran Tahap 2</td>
                            {{-- <td>:</td> --}}
                            <td  style="width: 120px; text-align: center">
                                @if ($times->tender->pengumuman)
                                {{date('d-m-Y', strtotime( $times->pengumuman))}}
                                @endif
                            </td>
                            <td>
                                @if ($times->tender->pengumuman)
                                <input type="checkbox" name="" id="" checked>
                                @endif
                            </td>
                            <td>{{ $times->ket_pengum }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50px; text-align: center">{{ $no++ }}</td>
                            <td>Rapat Pembukaan Penawaran Tahap 2</td>
                            {{-- <td>:</td> --}}
                            <td  style="width: 120px; text-align: center">
                                @if ($times->tender->rpp_1)
                                {{ date('d-m-Y', strtotime($times->rpp_1 )) }}
                                @endif
                            </td>
                            <td>
                                @if ($times->tender->rpp_1)
                                <input type="checkbox" name="" id="" checked>
                                @endif
                            </td>
                            <td>{{ $times->ket_rpp1 }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50px; text-align: center">{{ $no++ }}</td>
                            <td>Pengumuman Hasil Evaluasi Tahap 2 & Undangan Negosiasi Harga</td>
                            {{-- <td>:</td> --}}
                            <td style="width: 120px; text-align: center">
                                @if ($times->tender->pengumuman_1)
                                {{date('d-m-Y', strtotime($times->pengumuman_1)) }}
                                @endif
                            </td>
                            <td>
                                @if ($times->tender->pengumuman_1)
                                <input type="checkbox" name="" id="" checked>
                                @endif
                            </td>
                            <td>{{ $times->ket_pengum1 }}</td>
                        </tr>
                    @else
                        <tr>
                            <td style="width: 50px; text-align: center">{{ $no++ }}</td>
                            <td>Rapat Pembukaan Penawaran</td>
                            {{-- <td>:</td> --}}
                            <td style="width: 120px; text-align: center">
                                @if ($times->tender->rpp)
                                {{date('d-m-Y', strtotime( $times->rpp)) }}
                                @endif
                            </td>
                            <td>
                                @if ($times->tender->rpp)
                                <input type="checkbox" name="" id="" checked>
                                @endif
                            </td>
                            <td>{{ $times->ket_rpp }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50px; text-align: center">{{ $no++ }}</td>
                            <td>Pengumuman Hasil Evaluasi & Undangan Negosiasi Harga</td>
                            {{-- <td>:</td> --}}
                            <td  style="width: 120px; text-align: center">
                                @if ($times->tender->pengumuman)
                                {{date('d-m-Y', strtotime( $times->pengumuman))}}
                                @endif
                            </td>
                            <td>
                                @if ($times->tender->pengumuman)
                                <input type="checkbox" name="" id="" checked>
                                @endif
                            </td>
                            <td>{{ $times->ket_pengum }}</td>
                        </tr>
                    @endif
                  
                    <tr>
                        <td style="width: 50px; text-align: center">{{ $no++ }}</td>
                        <td>Rapat Klarifikasi & Negosiasi Harga</td>
                        {{-- <td>:</td> --}}
                        <td style="width: 120px; text-align: center">
                            @if ($times->tender->klarif_nego)
                            {{date('d-m-Y', strtotime( $times->klarif_nego)) }}
                            @endif
                        </td>
                        <td>
                            @if ($times->tender->klarif_nego)
                            <input type="checkbox" name="" id="" checked>
                            @endif
                        </td>
                        <td>{{ $times->ket_klarif }}</td>
                    </tr>
                    <tr>
                        <td style="width: 50px; text-align: center">{{ $no++ }}</td>
                        <td>Surat Penawaran Harga Negosiasi</td>
                        {{-- <td>:</td> --}}
                        <td style="width: 120px; text-align: center">
                            @if ($times->tender->sph_nego)
                            {{date('d-m-Y', strtotime(  $times->sph_nego))}}
                            @endif
                        </td>
                        <td>
                            @if ($times->tender->sph_nego)
                            <input type="checkbox" name="" id="" checked>
                            @endif
                        </td>
                        <td>{{ $times->ket_sphnego }}</td>
                    </tr>
                    <tr>
                        <td style="width: 50px; text-align: center">{{ $no++ }}</td>
                        <td>Surat Penunjukan Pemenang</td>
                        {{-- <td>:</td> --}}
                        <td style="width: 120px; text-align: center">
                            @if ($times->tender->spp)
                            {{date('d-m-Y', strtotime( $times->spp))}}
                            @endif
                        </td>
                        <td>
                            @if ($times->tender->spp)
                            <input type="checkbox" name="" id="" checked>
                            @endif
                        </td>
                        <td>{{ $times->ket_spp }}</td>
                    </tr>
                    <tr>
                        <td style="width: 50px; text-align: center">{{ $no++ }}</td>
                        <td>Kontrak/SPK</td>
                        {{-- <td>:</td> --}}
                        <td style="width: 120px; text-align: center">
                            @if ($times->tender->kontrak)
                            {{date('d-m-Y', strtotime( $times->kontrak))}}
                            @endif
                        </td>
                        <td style="width: 120px; text-align: center">
                            @if ($times->tender->kontrak)
                            <input type="checkbox" name="" id="" checked>
                            @endif
                        </td>
                        <td>{{ $times->ket_kontrak }}</td>
                    </tr>
                </tbody>
             </table>

                </div>
          
        </div>
    

    
</body>


</html>