<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $judul  }} {{ $bapengadaans->nomor_ba }}</title>
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

    .pagenum:before {
        content: counter(page);
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

    /* .table-border, td, tr, th {
        border: 1px solid #333;
    } */

    .table-borderless {
        border:  solid #fff;

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
        <hr>
        <p style="text-align: right; font-size: 6pt"><i>BERITA ACARA RAPAT PENJELASAN (AANWIZJING) <br> PEKERJAAN
                            {{ strtoupper( $bapengadaans->judul_pekerjaan)  }}</i> <br>
                             <span class="pagenum"></span></p>
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
                        <td style="text-align: center;" colspan="2"><strong> BERITA ACARA RAPAT PENJELASAN  (AANWIZJING) <br> PEKERJAAN
                            {{ strtoupper( $bapengadaans->judul_pekerjaan)  }} </strong></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">{{ "NO. " . $bapengadaans->nomor_ba  }}</td>
                        <td style="text-align: center;">{{ "Tanggal : ". date("d-m-Y", strtotime($bapengadaans->tanggal)) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p style="text-align: justify; ">Pada hari {{ hariIndo(date('l', strtotime($bapengadaans->tanggal))) }}, tanggal
            {{ terbilang(date('d', strtotime($bapengadaans->tanggal))) }} bulan {{ bulanIndo(date('F', strtotime($bapengadaans->tanggal)))}} tahun
            {{ terbilang(date('Y', strtotime($bapengadaans->tanggal))) }}
            ({{ date("d-m-Y", strtotime($bapengadaans->tanggal)) }}) lokasi
            {{ $bapengadaans->lokasi_nego }}, telah diadakan Rapat Penjelasan Pekerjaan (Aanwijzing) pekerjaan sebagaimana tersebut di atas, dengan hasil sebagai berikut:  </p>
        {{-- <p> --}}
        {{-- <div class="container"> --}}
        <p><strong>A. Jalannya Rapat Penjelasan Pekerjaan (Aanwijzing)</strong></p>
        {{-- <table class="table"> --}}
            <ol type="1">
                <li  style="margin: 20px;text-align: justify;">Rapat dibuka oleh Vice President Supply Chain Management pada pukul {{ date('H:i', strtotime($bapengadaans->tanggal)) }} WIB dan dilanjutkan
                    dengan pemberian penjelasan mengenai peraturan umum dan persyaratan administrasi, kemudian dilanjutkan dengan penjelasan
                    persyaratan teknis beserta dokumen penawaran harga pekerjaan oleh Unit Spesifikasi Teknis. Kepada Peserta Pengadaan
                    diberikan kesempatan untuk bertanya tentang hal-hal yang belum jelas dalam persyaratan penawaran administrasi, teknis, serta harga.</li>
                    <li  style="margin: 20px;text-align: justify;">Pertanyaan yang diajukan oleh Peserta telah dijawab oleh Divisi Supply Chain Management dan Unit Spesifikasi Teknis.</li>
                    <li  style="margin: 20px;text-align: justify;">Peserta menyatakan telah mempelajari dan memahami  terhadap keseluruhan isi dan ketentuan yang dicantumkan di dalam Dokumen
                        Pengadaan beserta lampirannya (RKS/KAK, BoQ Kosong, dokumen teknis lainnya).</li>
                        <li  style="margin: 20px;text-align: justify;">Secara lengkap hasil pemberian Penjelasan tersebut termuat dalam Dokumen Pengadaan beserta lampirannya yang
                            merupakan bagian yang tidak terpisahkan dengan Berita Acara ini.</li>
                        <li  style="margin: 20px;text-align: justify;">Apabila ada perubahan dokumen pada saat rapat penjelasan pekerjaan, maka perubahan tersebut akan menjadi ketentuan yang mengikat.</li>
                        <li  style="margin: 20px;text-align: justify;">Rapat penjelasan pekerjaan ditutup pada pukul {{ date('H:i', strtotime($bapengadaans->tgl_penawaran)) }} WIB</li>
                </ol>

                <p><strong>B. Perubahan</strong></p>
                @php
                    $no = 1 ;
                @endphp
                <table border="1" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Dokumen</th>
                            <th>Sebelum</th>
                            <th>Menjadi</th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($bapengadaans->badetailpengadaans as $item)
                        <tr >
                            <td style="width: 50px; text-align: center">{{ $no++ }}</td>
                            <td scope="row"> {{ $item->dokumen }}</td>
                            <td>{{ $item->sebelum }} </td>
                            <td>{{ $item->menjadi }} </td>
                        </tr>
                   @endforeach
                    </tbody>
                </table>
                <p><strong>C. Pertanyaan dan Jawaban</strong></p>
                @php
                $no = 1 ;
            @endphp
                <table border="1"  class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                        </tr>
                    </thead>
                    <tbody>

                   @foreach ($bapengadaans->bapertanyaans as $item)
                   <tr>
                        <td style="width: 50px; text-align: center">{{ $no++ }}</td>
                       <td scope="row"> {{ $item->pertanyaan }}</td>
                       <td>{{ $item->jawaban }} </td>
                   </tr>
              @endforeach
                    </tbody>
                </table>
                <p style="text-align: justify;">Berita Acara Rapat Penjelasan (Aanwijzing) ini merupakan satu kesatuan dan menjadi bagian yang
                    tidak terpisahkan dari Kontrak serta mempunyai kekuatan hukum yang mengikat Para Pihak.
                </p>
                <p style="text-align: justify;">Demikian Berita Acara ini dibuat dengan sebenar-benarnya untuk dipergunakan sebagaimana mestinya.
                </p>
                <p><strong>D. Daftar Peserta</strong></p>


                <p><strong>IAS Property Indonesia, PT</strong></p>
                <table class="table">
                    @foreach ($bapengadaans->divisis as $item)
                    <tbody>
                        <tr>
                            <td height="70px" width="300px">- {{ strtoupper($item->kode) }}</td>
                            <td>_________________</td>
                        </tr>
                        {{-- <th>{{  $lok->divisis->implode('detail' ,  ', ' ) }}</th> --}}
                        {{-- <th>{{ $lok->vendor->namaperusahaan }}</th> --}}
                    </tbody>
                    @endforeach
                </table>
                <p><strong>Pihak Mitra Pengadaan</strong></p>

                <table class="table table-striped- table-bordered table-hover table-checkable">
                    @foreach ($bapengadaans->vendors as $item)
                    <tbody>
                        <tr>
                            <td height="70px" width="300px">- {{ strtoupper($item->namaperusahaan) }}</td>
                            <td>_________________</td>
                        </tr>
                        {{-- <th>{{  $lok->divisis->implode('detail' ,  ', ' ) }}</th> --}}
                        {{-- <th>{{ $lok->vendor->namaperusahaan }}</th> --}}
                    </tbody>
                    @endforeach
                </table>
    </div>


</body>


</html>
