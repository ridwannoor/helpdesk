<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $judul  }} {{ $spp->nomor_spk }}</title>
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
          {{-- <span style="text-align: left; font-size: 8pt"> {{ "BA." . $spp->bakesepakatan->nomor_bak }} <br>
        {{ "Tanggal " . $spp->tanggal }}
        </span>   --}}

        </p>
        <p style="text-align: right; font-size: 8pt">  <span class="pagenum"></span></p>

                            {{-- {{ strtoupper( "BERITA ACARA KESEPAKATAN " . $spp->bakesepakatan->banegopengadaans->bapengadaan->judul_pekerjaan)  }}</i> </p> --}}
        {{-- <img src="{{ url('data_file/' . $pref->image) }}" width="100%" height="100%"/> --}}
    </footer>
    <div class="container">
        <header class="mt-0">
            <p style="text-align: right; font-size: 8pt"><img src="{{ public_path('data_file/'.$pref->image) }}" width="300px" alt=""></p>
        </header>
        <div class="row">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td style="width: 150px;">Nomor</td>
                        <td style="width: 20px;">:</td>
                        <td>{{ $spp->nomor_spp }}</td>
                    </tr>
                    <tr>
                        <td style="width: 150px;">Lampiran</td>
                        <td style="width: 20px;">:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td style="width: 150px;">Perihal</td>
                        <td style="width: 20px;">:</td>
                        <td>Penunjukan Pemenang</td>
                    </tr>
                </tbody>
             </table>


                <p>Kepada Yth.</p>
                <p>{{ $spp->banegopengadaan->vendor->namaperusahaan . ", " . $spp->banegopengadaan->vendor->badanusaha->kode }}</p>
                <p>Up. Pimpinan Perusahaan</p>
                <p>Di</p>
                <p>Tempat</p>
             <p><br></p>
                <p>Dengan Hormat,</p>
                <p>Menunjuk :</p>
                <ol type="1" >
                    @foreach ($spp->sppdetail as $item)
                    <li style="text-align: justify">{{ $item->suratpend }}</li>
                    @endforeach
                    {{-- <li style="text-align: justify">Nota Dinas Vice President Supply Chain Management Pengadaan Nomor : {{ $spp->no_nodin }}, tanggal {{ date('d-m-Y', strtotime($spp->tanggal))  }} perihal  {{ $spp->perihal }}.</li>
                    <li style="text-align: justify">Disposisi Persetujuan {{ $spp->bod->jabatan }} tanggal {{ date('d-m-Y', strtotime($spp->tgl_dispo)) }}.</li> --}}
                </ol>
                <p style="text-align: justify">Dengan ini diberitahukan bahwa dengan memperhatikan ketentuan Prosedur Pengadaan Barang dan /atau Jasa yang berlaku dilingkungan PT IAS Property Indonesia,
                    maka ditunjuk sebagai Pemenang pelaksana pekerjaan, adalah :</p>
                <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td style="width: 150px;">Nama Perusahaan</td>
                        <td style="width: 20px;">:</td>
                        <td>{{ $spp->banegopengadaan->vendor->namaperusahaan . ", " . $spp->banegopengadaan->vendor->badanusaha->kode }}</td>
                    </tr>
                    <tr>
                        <td style="width: 150px;">Alamat</td>
                        <td style="width: 20px;">:</td>
                        <td>{{ $spp->banegopengadaan->vendor->alamat }}</td>
                    </tr>
                    <tr>
                        <td style="width: 150px;">NPWP</td>
                        <td style="width: 20px;">:</td>
                        <td>{{ $spp->banegopengadaan->vendor->npwp }}</td>
                    </tr>
                    <tr>
                        <td style="width: 150px;">Nama Pekerjaan</td>
                        <td style="width: 20px;">:</td>
                        <td>{{ $spp->banegopengadaan->judul_pekerjaan }}</td>
                    </tr>
                    <tr>
                        <td style="width: 150px;">Nilai Pekerjaan</td>
                        <td style="width: 20px;">:</td>
                        <td>{{"Rp " . number_format( $spp->banegopengadaan->jml_nego)  . ',- (' .  terbilang($spp->banegopengadaan->jml_nego) . " ripiah)" }}</td>
                    </tr>
                    <tr>
                        <td style="width: 150px;">Waktu Pelaksanaan</td>
                        <td style="width: 20px;">:</td>
                        <td>{{ $spp->banegopengadaan->jawa_pel }}</td>
                    </tr>
                </tbody>
             </table>
             @php
                 $jampel = $spp->banegopengadaan->jml_nego * 5/100 ;

             @endphp
             <p style="text-align: justify"> Sehubungan dengan hal tersebut, dimohon untuk
                @if ( $spp->banegopengadaan->jaminan == '1')
                    <span> melakukan pembayaran biaya administrasi kontrak pengadaan barang dan
                        jasa sebesar Rp {{ number_format($jampel) }},- ({{ terbilang($jampel)  }} rupiah) ke rekening BNI nomor : 03333-55569 a/n PT IAS Property Indonesia. </span>
                @elseif ( $spp->banegopengadaan->jaminan = '2')
                <span> melakukan pembayaran jaminan pelaksanaan sebesar 5% (lima persen) dari nilai kontrak
                    atau senilai {{ number_format($jampel) }},- ({{ terbilang($jampel)  }} rupiah) dan
                    jasa sebesar {{ number_format($spp->bidok) }},- ({{ terbilang($spp->bidok)  }} rupiah) ke rekening BNI nomor : 03333-55569 a/n PT IAS Property Indonesia. </span>
                @elseif ( $spp->banegopengadaan->jaminan = '3')
              <span> melakukan pembayaran jaminan pelaksanaan sebesar 5% (lima persen) dari nilai kontrak
                atau senilai Rp {{ number_format($jampel) }},- ({{ terbilang($jampel)  }} rupiah) dan biaya administrasi kontrak pengadaan barang dan
                jasa sebesar Rp {{ number_format($spp->bidok) }},- ({{ terbilang($spp->bidok)  }} rupiah) ke rekening BNI nomor : 03333-55569 a/n PT IAS Property Indonesia. </span>
                @else

                @endif
                 </p>

             <p style="text-align: justify">Dengan terbitnya Surat Penunjukan Pemenang ini, maka Pekerjaan sudah dapat segera dimulai dilaksanakan.
                Dan diharapkan agar pelaksana pekerjaan dapat menghubungi Unit Spesifikasi Teknis (UST) untuk dapat melakukan koordinasi persiapan pekerjaan.</p>

            <p style="text-align: justify">Demikian diberitahukan sebagaimana mestinya, atas perhatian dan kerjasamanya diucapkan terima kasih.</p>

            <p>Jakarta, {{ date('d M Y', strtotime($spp->tanggal)) }} <br>
            a.n DIREKSI <br>
            {{ $spp->bod->jabatan }} <br>
            <br>
            <br>
            <br>
            <br> <br>
            <br>
            {{ $spp->bod->name }}
            </p>
        </div>
    </div>


</body>


</html>
