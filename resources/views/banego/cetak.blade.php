<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $judul  }} {{ $lok->no_ba }}</title>
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
        width: 960px;
    }

    .table, td, tr, th {
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
{{-- @include('component.head') --}}

<body>

    <footer>
        <p style="text-align: right; font-size: 8pt"><i>BERITA ACARA KLARIFIKASI DAN NEGOSIASI HARGA
                            {{ strtoupper($lok->nama_pek)  }}</i> </p>
        {{-- <img src="{{ url('data_file/' . $pref->image) }}" width="100%" height="100%"/> --}}
    </footer>
    <div class="container">
        <header class="mt-0">
            <p style="text-align: right; font-size: 8pt"><img src="{{ public_path('data_file/'.$pref->image) }}" width="300px" alt=""></p>
        </header>
        <div class="row">

            <table border="1" class="table">
                <tbody>
                    <tr>
                        <td style="text-align: center;" colspan="2">BERITA ACARA KLARIFIKASI DAN NEGOSIASI HARGA
                            {{ strtoupper($lok->nama_pek)  }} </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">{{  $lok->no_ba  }}</td>
                        <td style="text-align: center;">{{ "Tanggal : ". date("d-m-Y", strtotime($lok->tanggal)) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p style="text-align: justify">Pada hari {{ hariIndo(date('l', strtotime($lok->tanggal))) }}, tanggal
            {{ terbilang(date('d', strtotime($lok->tanggal))) }} bulan {{ bulanIndo(date('F', strtotime($lok->tanggal)))}} tahun
            {{ terbilang(date('Y', strtotime($lok->tanggal))) }}
            ({{ date("d-m-Y", strtotime($lok->tanggal)) }})
            {{ "bertempat di " . $lok->lokasi_nego }},
            telah diadakan Rapat Klarifikasi dan Negosiasi Harga terhadap Dokumen Penawaran
            Harga untuk Pekerjaan tersebut diatas yang dihadiri oleh : </p>
        {{-- <p> --}}
        {{-- <div class="container"> --}}
        <p><strong>I. a, PT :</strong></p>
        <table class="table">
            @foreach ($lok->divisis as $item)
            <tbody>
                <tr>
                    <td  width="300px">- {{ strtoupper($item->detail) }}</td>
                    {{-- <td>_________________</td> --}}
                </tr>
                {{-- <th>{{  $lok->divisis->implode('detail' ,  ', ' ) }}</th> --}}
                {{-- <th>{{ $lok->vendor->namaperusahaan }}</th> --}}
            </tbody>
            @endforeach
        </table>

        {{-- </div> --}}
        {{-- </p> --}}
        <p><strong>II. Pihak Mitra Pengadaan :</strong></p>
        <table class="table">
            <tbody>
                <tr>
                    <td>{{ $lok->vendor->namaperusahaan }}, {{ $lok->vendor->badanusaha->kode }}</td>
                </tr>
            </tbody>
        </table>


        @php
        $no = 1 ;
        @endphp
        <p>Dihasilkan kesepakatan harga & spesifikasi sebagai berikut :</p>

        <ol type="1">
            <li>Penawaran Harga <strong>Sebelum Negosiasi :</strong> <br>
                <table class="table">
                    {{-- <thead>
                        <tr>
                            <th></th>
                            <th width="15px"></th>
                            <th></th>
                        </tr>
                    </thead> --}}
                    <tbody>
                        <tr>
                            <td width="300px"> Nama Perusahaan </td>
                            <td width="30px">:</td>
                            <td>{{ $lok->vendor->namaperusahaan }}, {{ $lok->vendor->badanusaha->kode }}</td>
                        </tr>
                        <tr>
                            <td width="300px"> NPWP </td>
                            <td width="30px">:</td>
                            <td >{{ $lok->vendor->npwp }}</td>
                        </tr>
                        <tr>
                            <td width="300px">Jumlah Penawaran </td>
                            <td width="30px">:</td>
                            <td>{{ "Rp ". format_uang($lok->jml_penawaran)  }}
                                ({{ terbilang($lok->jml_penawaran) . " rupiah" }})
                                @if ($lok->pajak == "include")
                                termasuk pajak yang berlaku.
                               @else
                                tidak termasuk pajak.
                               @endif
                            </td>
                        </tr>
                        <tr>
                            <td width="300px">Surat Penawaran Harga No </td>
                            <td width="30px">:</td>
                            <td>{{ $lok->spph }}</td>
                        </tr>
                    </tbody>
                </table>
            </li>
            <li>Penawaran Harga <strong>Setelah Negosiasi :</strong> <br>
                <table class="table">
                    <tbody>
                        <tr>
                            <td width="300px">Nama Perusahaan</td>
                            <td width="30px">:</td>
                            <td>{{ $lok->vendor->namaperusahaan }}, {{ $lok->vendor->badanusaha->kode }}</td>
                        </tr>

                        <tr>
                            <td width="300px">NPWP</td>
                            <td width="30px">:</td>
                            <td>{{ $lok->vendor->npwp }}</td>
                        </tr>

                        <tr>
                            <td width="300px">Jumlah Penawaran </td>
                            <td width="30px">:</td>
                            <td>{{ "Rp ". format_uang($lok->jml_nego)  }}
                                ({{ terbilang($lok->jml_nego) . " rupiah" }})
                                @if ($lok->pajak == "include")
                                termasuk pajak yang berlaku.
                               @else
                                tidak termasuk pajak.
                               @endif
                            </td>
                        </tr>
                        {{-- <tr>
                            <td width="300px">Surat Penawaran Harga Nego No </td>
                            <td width="30px">:</td>
                            <td>{{ $lok->spph_nego }}</td>
                        </tr> --}}
                    </tbody>
                </table>
            </li>
            <li style="margin-bottom: 1 rem">Jangka Waktu Pelaksanaan Pekerjaan : {{ date("d-m-Y", strtotime($lok->start_date)) . " - " . date("d-m-Y", strtotime($lok->end_date)) }} <strong>({{ $lok->waktu_pel . " hari kalender" }})</strong> terhitung sejak terbit {{  $lok->dokpekerjaans->implode('kode' ,  ', ' ) }}

                @foreach ($lok->dokpekerjaans as $item)
                    @if ($item->kode == "PO")
                        @if ($lok->garansi)
                        <li style="margin-bottom: 1 rem"> Garansi / Product / Warranty / Pemeliharaan :
                            <strong>{{ $lok->garansi . " hari kalender"  }}</strong> <br> *syarat dan ketentuan berlaku (terlampir)</li>
                        @endif
                        @if ($lok->asuransi)
                        <li style="margin-bottom: 1 rem"> Asuransi :
                            <strong>{{ $lok->asuransi . " hari kalender"  }}</strong> </li>
                        @endif
                        @if ($lok->masapemeliharaan)
                        <li style="margin-bottom: 1 rem"> Masa Pemeliharaan :
                            <strong>{{ $lok->masapemeliharaan . " hari kalender"  }}</strong> </li>
                        @endif
                {{-- <p> Garansi / Product / Warranty / Pemeliharaan :
                        <strong>{{ $lok->garansi . " hari kalender"  }}</strong></p> --}}
                        @if ($lok->tempat)
                            <li style="margin-bottom: 1 rem"> Lokasi Serah Terima Barang :
                            <strong>{{ $lok->tempat }}</strong></li>
                        @endif
                        @if ($lok->training)
                            <li style="margin-bottom: 1 rem"> Training dilakukan : <strong>{{ $lok->training }}</strong></li>
                        @endif
                    @endif
                @endforeach


                @if ($lok->pajak == "include")
                    <li style="margin-bottom: 1 rem">
                        {{ $lok->vendor->namaperusahaan }}, {{ $lok->vendor->badanusaha->kode }} merupakah Pengusaha Kena Pajak dan menerbitkan Faktur Pajak Pertambahan Nilai (PPN).
                    </li>
                @else
                    <li style="margin-bottom: 1 rem">
                        {{ $lok->vendor->namaperusahaan }}, {{ $lok->vendor->badanusaha->kode }} bukan perusahaan kena pajak (Non PKP). {{ $lok->vendor->namaperusahaan }}, {{ $lok->vendor->badanusaha->kode }} membuat surat pernyataan diatas materai yang menyatakan bahwa bukan Pengusaha Kena Pajak dan tidak menerbitkan Faktur Pajak Pertambahan Nilai (PPN). Dan melampirkan Fotocopy KTP yang bertanda tangan di Surat Pernyataan.
                    </li>
                @endif
            <li style="text-align: justify;margin-bottom: 1 rem"> Tata Cara Pembayaran : <strong>{!! $lok->cara_pembayaran  !!}</strong></li>
            <li style="margin-bottom: 1 rem"> Pengiriman Barang/Material ke lokasi pekerjaan dilakukan oleh : <strong>{{ $lok->pengirim  }}</strong></li>
            <li style="margin-bottom: 1 rem"> <strong>{{ $lok->vendor->namaperusahaan }}, {{ $lok->vendor->badanusaha->kode }}</strong> selanjutnya akan mengirimkan surat penawaran harga setelah
                negosiasi.</li>
                @if (preg_replace('/[^A-Za-z0-9 ]/', '', $lok->catatan))
            <li style="text-align: justify; margin-bottom: 1 rem"> {!! $lok->catatan !!}</li>
                @endif
            <li style="margin-bottom: 1 rem"> Ruang lingkup pekerjaan telah sesuai dengan BoQ dan Syarat-syarat teknis
                telah disetujui oleh kedua belah pihak (terlampir){{$lok->jaminan_id}}</li>

                @php
                $jam = $lok->jml_nego * 5/100 ;
                $dp =  $lok->jml_nego * $lok->nilaidp/100;
                $bidok = preg_replace('/[^\d\w]+/', '', $lok->bidok->name);
                @endphp

                @if ( $lok->jaminan_id == '1')
                    @foreach ($lok->dokpekerjaans as $item)
                        @if ($item->kode == "Kontrak" OR $lok->dokpekerjaans == "SPK")
                            <li style="text-align: justify; margin-bottom: 1 rem">    Selanjutnya pihak KEDUA
                            @if ($lok->downpayment =="include")
                                Membayarkan Jaminan DP {{ $lok->nilaidp ." %" }} sebesar {{ "Rp ". format_uang($dp) }} dapat berupa Bank Garansi, Asuransi, ataupun Tunai, dan
                            @endif
                            menyerahkan Biaya Administrasi Dokumen Kontrak sebesar {{ "Rp ". format_uang($bidok)  }}
                            ({{terbilang($bidok) . "rupiah"}}) ke rekening BNI nomor : 03333-55569 a/n PT. a.
                            </li>
                        @endif
                    @endforeach
                @elseif ( $lok->jaminan_id == '2')
                    @foreach ($lok->dokpekerjaans as $item)
                        @if ($item->kode == "Kontrak" OR $lok->dokpekerjaans == "SPK")
                            <li style="text-align: justify; margin-bottom: 1 rem">    Selanjutnya pihak KEDUA
                            @if ($lok->downpayment =="include")
                                Membayarkan Jaminan DP {{ $lok->nilaidp ." %" }} sebesar {{ "Rp ". format_uang($dp) }} dapat berupa Bank Garansi, Asuransi, ataupun Tunai, dan
                            @endif
                            Menyerahkan Jaminan Pelaksanaan sebesar 5% (lima
                            persen) dari nilai pekerjaan atau senilai {{ "Rp ". format_uang($jam)  }}
                            ({{ terbilang($jam) . "rupiah"}}). dapat berupa bank garansi,
                            asuransi, atau pun tunai dengan jangka waktu jaminan pelaksanaan adalah ditambah minimal 1 (satu) bulan lebih lama dari
                            Jangka Waktu berakhirnya kontrak.
                            </li>
                        @endif
                    @endforeach
                @elseif ( $lok->jaminan_id == '3')
                    @foreach ($lok->dokpekerjaans as $item)
                        @if ($item->kode == "Kontrak" OR $lok->dokpekerjaans == "SPK")
                            <li style="text-align: justify; margin-bottom: 1 rem">    Selanjutnya pihak KEDUA
                            @if ($lok->downpayment =="include")
                                Membayarkan Jaminan DP {{ $lok->nilaidp ." %" }} sebesar {{ "Rp ". format_uang($dp) }} dapat berupa Bank Garansi, Asuransi, ataupun Tunai, dan
                            @endif
                            Menyerahkan Jaminan Pelaksanaan sebesar 5% (lima
                            persen) dari nilai pekerjaan atau senilai {{ "Rp ". format_uang($jam)  }}
                            ({{ terbilang($jam) . "rupiah"}}). dapat berupa bank garansi,
                            asuransi, atau pun tunai dengan jangka waktu jaminan pelaksanaan adalah ditambah minimal 1 (satu) bulan lebih lama dari Jangka Waktu berakhirnya kontrak
                            dan membayarkan biaya dokument kontrak sebesar {{ "Rp ". format_uang($bidok)  }}
                            ({{terbilang($bidok) . "rupiah"}})
                            ke rekening BNI nomor : 03333-55569
                            a/n PT. a.
                            </li>
                        @endif
                    @endforeach
                @elseif ($lok->jaminan_id == '4')
                @foreach ($lok->dokpekerjaans as $item)
                    @if ($item->kode == "Kontrak" OR $lok->dokpekerjaans == "SPK")
                    <li style="text-align: justify; margin-bottom: 1 rem">    Selanjutnya pihak KEDUA
                        @if ($lok->downpayment =="include")
                        Membayarkan Jaminan DP {{ $lok->nilaidp ." %" }} sebesar {{ "Rp ". format_uang($dp) }} dapat berupa Bank Garansi, Asuransi, ataupun Tunai.
                        @endif
                    @endif
                @endforeach
                {{-- <span></span> --}}
                @endif

                {{-- @if ($lok->jaminan == "include")
                    @foreach ($lok->dokpekerjaans as $item)
                    @if ($item->kode == "Kontrak" OR $lok->dokpekerjaans == "SPK")

                    <li style="text-align: justify; margin-bottom: 1 rem">    Selanjutnya pihak KEDUA
                    @if ($lok->downpayment =="include")
                    membayarkan jaminan DP {{ $lok->nilaidp ." %" }} sebesar {{ "Rp ". format_uang($dp) }} dapat berupa Bank Garansi, Asuransi, ataupun Tunai,
                    @endif
                    membayarkan jaminan pelaksanaan sebesar
                    5% (lima
                    persen) dari nilai pekerjaan atau senilai {{ "Rp ". format_uang($jam)  }}
                    ({{ terbilang($jam) . "rupiah"}}). dapat berupa bank garansi,
                    asuransi, atau pun tunai dengan jangka waktu jaminan pelaksanaan adalah ditambah minimal 1 (satu) bulan lebih lama dari Jangka Waktu berakhirnya kontrak
                    dan membayarkan biaya dokument kontrak sebesar {{ "Rp ". format_uang($bidok) }}
                    ({{terbilang($bidok) . "rupiah"}})
                    ke rekening BNI nomor : 03333-55569
                    a/n PT. a.

                </li>
                    @endif
                    @endforeach
                @endif --}}


        </ol>

        <p>
            Berita Acara Klarifikasi dan Negosiasi Harga ini merupakan satu kesatuan dan
            menjadi bagian yang tidak
            terpisahkan dari {{  $lok->dokpekerjaans->implode('kode' ,  '/ ' ) }} serta mempunyai kekuatan hukum yang
            megikat para pihak.
        </p>

        <p>Demikian Berita Acara ini dibuat dengan sebenar-benarnya untuk dipergunakan
            sebagaimana mestinya.</p>


        <p><strong>a, PT</strong></p>
        <table class="table">
            @foreach ($lok->divisis as $item)
            @if ($item->detail != "Area Manager")
            <tbody>
                <tr>
                    <td height="70px" width="300px">- {{ strtoupper($item->detail) }}</td>
                    <td>_________________</td>
                </tr>
            </tbody>
            @endif
            @endforeach
        </table>
        <p><strong>Pihak Mitra Pengadaan</strong></p>

        <table class="table table-striped- table-bordered table-hover table-checkable">
            <tbody>
                <td>{{ $lok->vendor->namaperusahaan }}, {{ $lok->vendor->badanusaha->kode }}</td>
                <td>_________________</td>
                {{-- <th>{{ $lok->vendor->namaperusahaan }}</th> --}}
            </tbody>
            {{-- < --}}
        </table>
    </div>


</body>


</html>