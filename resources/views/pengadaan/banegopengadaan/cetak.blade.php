<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $judul  }} {{ $banegopengadaans->nomor_ba }}</title>
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


    .pagenum:before {
        content: counter(page);
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
        <p style="text-align: right; font-size: 6pt"><i>
          <span>BERITA ACARA KLARIFIKASI DAN NEGOSIASI </span> <br>  {{ strtoupper( $banegopengadaans->judul_pekerjaan)  }}</i>
            <br>  <span class="pagenum"></span>
        </p>
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
                        <td style="text-align: center;" colspan="2">
                        <strong> <span>BERITA ACARA KLARIFIKASI DAN NEGOSIASI </span>  <br>{{ strtoupper($banegopengadaans->judul_pekerjaan) }}</strong>   </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; text-transform: uppercase">{{ "NO. BA " . $banegopengadaans->nomor_ba  }}</td>
                        <td style="text-align: center;">{{ "Tanggal : ". date("d-m-Y", strtotime($banegopengadaans->tanggal)) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p style="text-align: justify ; ">Pada hari {{ hariIndo(date('l', strtotime($banegopengadaans->tanggal))) }}, tanggal
            {{ terbilang(date('d', strtotime($banegopengadaans->tanggal))) }} bulan {{ bulanIndo(date('F', strtotime($banegopengadaans->tanggal)))}} tahun
            {{ terbilang(date('Y', strtotime($banegopengadaans->tanggal))) }}
            ({{ date("d-m-Y", strtotime($banegopengadaans->tanggal)) }}) lokasi  {{ $banegopengadaans->lokasi_nego }},
            telah diadakan Rapat Klarifikasi & Negosiasi Harga terhadap Dokumen Penawaran Harga untuk pekerjaan sebagaimana tersebut di atas, dengan hasil sebagai berikut:</p>
        {{-- <p> --}}
        {{-- <div class="container"> --}}
            <ol type="1" style="text-align: justify ;">
                <li>Divisi Supply Chain Management telah menerima {{ $banegopengadaans->dasar->kode  }} dari Unit Spesifikasi Teknis (UST) yaitu sejumlah
                    {{ "Rp " . format_uang($banegopengadaans->nilai_rap)  }} -  ({{ terbilang($banegopengadaans->nilai_rap) . " rupiah" }}) {{ $banegopengadaans->pajak_rap }}, yang kemudian dijadikan sebagai dasar melakukan klarifikasi dan negosiasi harga penawaran</li>
                <li>Divisi Supply Chain Management beserta Unit Spesifikasi Teknis (UST) telah melakukan klarifikasi terhadap penawaran yang disampaikan oleh peserta pengadaan.</li>
                <li><span>Penawaran harga sebelum negosiasi:</span>   <br>
                    <table class="table">
                        <tbody>
                            <tr>
                                 <td>Nama Perusahaan</td>
                                 <td>{{ $banegopengadaans->vendor->namaperusahaan }}, {{ $banegopengadaans->vendor->badanusaha->kode }}</td>
                            </tr>
                            <tr>
                                 <td>NPWP</td>
                                 <td>{{ $banegopengadaans->vendor->npwp }}</td>
                            </tr>
                            {{-- @if ($banegopengadaans->spph) --}}
                                <tr>
                                    <td>SPH</td>
                                    <td>{{ $banegopengadaans->spph }}</td>
                                </tr>
                            {{-- @endif                   --}}
                            <tr>
                                <td>Nilai Penawaran</td>
                                <td>{{ "Rp ". format_uang($banegopengadaans->jml_penawaran)  }}
                                    ({{ terbilang($banegopengadaans->jml_penawaran) . " rupiah" }}) harga sudah termasuk pajak. </td>
                            </tr>
                        </tbody>
                    </table>
                </li>
                <li><span>Penawaran harga sesudah negosiasi :</span>   <br>

                    <table class="table">
                        <tbody>
                            <tr>
                                 <td>Nama Perusahaan</td>
                                 <td>{{ $banegopengadaans->vendor->namaperusahaan }}, {{ $banegopengadaans->vendor->badanusaha->kode }}</td>
                            </tr>
                            <tr>
                                 <td>NPWP</td>
                                 <td>{{ $banegopengadaans->vendor->npwp }}</td>
                            </tr>
                            {{-- @if ($banegopengadaans->spph_nego)
                                <tr>
                                    <td>SPH Nego</td>
                                    <td>{{ $banegopengadaans->spph_nego }}</td>
                                </tr>
                            @endif                    --}}
                            <tr>
                                <td>Nilai Negosiasi</td>
                                <td>{{ "Rp ". format_uang($banegopengadaans->jml_nego)  }}
                                    ({{ terbilang($banegopengadaans->jml_nego) . " rupiah" }}) harga sudah termasuk pajak.</td>
                            </tr>
                        </tbody>
                    </table>
                </li>
                @if ($banegopengadaans->jawa_pel)
                    <li><span>Jangka Waktu Pelaksanaan :   {{ $banegopengadaans->jawa_pel  }} </span> </li>
                @endif
              @if ($banegopengadaans->jawa_pem)
                <li><span> Jangka Waktu Pemeliharaan : {{ $banegopengadaans->jawa_pem  }} </span>  </li>
              @endif

                <li><span>Tata Cara Pembayaran :</span> <br>
                   <ol type="I">
                    @foreach ($banegopengadaans->banegodetail as $item)

                    <li style="margin-top:14px; text-align: justify">  {{ $item->carabayar }}   </li>

                    @endforeach
                 </ol>
                </li>
                <li>Ruang lingkup pekerjaan yang ditawarkan oleh Pihak Penyedia telah sesuai dengan ruang lingkup pekerjaan yang tercantum di dalam Kerangka Acuan Kerja (KAK)/Rencana Kerja dan Syarat-Syarat (RKS) yang dipersyaratkan oleh Unit Spesifikasi Teknis (UST).</li>
                <li>Jenis Kontrak Pekerjaan yang dimaksud adalah Kontrak {{ $banegopengadaans->kontrak->name }}</li>
                <li>Penyedia Barang dan/atau Jasa selanjutnya akan mengirimkan Surat Penawaran Harga setelah klarifikasi & negosiasi. </li>
                <li><span> Penyedia Barang dan/atau Jasa menyatakan bahwa : </span> <br>
                    <ol type="a">
                        <li>Harga penawaran yang disampaikan telah sesuai dengan harga pasar yang berlaku pada saat proses pengadaan.</li>
                        <li>Penyedia Barang/Jasa bertanggung jawab penuh terhadap harga yang disampaikan dan sanggup melaksanakan pekerjaan sesuai dengan harga negosiasi yang ditawarkan.</li>
                    </ol>
                </li>
                @if ( $banegopengadaans->catatan )
                <li>Catatan : <br>
                    {!! $banegopengadaans->catatan !!}</li>
                @endif

                @if ( $banegopengadaans->jaminan == '1')
                    <li>Penyedia Barang dan/atau Jasa akan menyerahkan Biaya Administrasi Dokumen Kontrak sesuai dengan persyaratan yang tercantum dalam Dokumen Pengadaan.
                    </li>
                @elseif ( $banegopengadaans->jaminan = '2')
                    <li>Penyedia Barang dan/atau Jasa akan menyerahkan Jaminan Pelaksanaan sebesar 5% dari nilai Kontrak/SPK  sesuai dengan persyaratan yang tercantum dalam Dokumen Pengadaan.
                    </li>
                @elseif ( $banegopengadaans->jaminan = '3')
                    <li>Penyedia Barang dan/atau Jasa akan menyerahkan Jaminan Pelaksanaan sebesar 5% dari nilai Kontrak/SPK dan menyerahkan Biaya Administrasi Dokumen Kontrak sesuai dengan persyaratan yang tercantum dalam Dokumen Pengadaan.
                    </li>
                @else
                    <span></span>
                @endif
                <li>Berita Acara Klarifikasi & Negosiasi ini merupakan satu kesatuan dan menjadi bagian yang tidak terpisahkan dari Kontrak serta mempunyai kekuatan hukum yang mengikat Para Pihak. Dan ketentuan-ketentuan lain yang belum tertuang dalam
                    Berita Acara Klarifikasi & Negosiasi ini akan dijelaskan secara terperinci di dalam kontrak.</li>
            </ol>
            <p>Demikian Berita Acara ini dibuat dengan sebenar-benarnya untuk dipergunakan sebagaimana mestinya.</p>

        <p><strong>Daftar Peserta :</strong></p>
        <p><strong>I. PT a :</strong></p>
        <table class="table table-borderless">
            @foreach ($banegopengadaans->divisis as $item)
            <tbody>
                <tr>
                    <td height="70px" width="300px">- {{ strtoupper($item->detail) }}</td>
                    <td>_________________</td>
                </tr>
            </tbody>
            @endforeach
            </table>


     <p><strong>II. Peserta Pengadaan :</strong></p>

        <table class="table table-borderless">
            <tbody>
                <tr>
                <td height="70px" width="300px">{{ $banegopengadaans->vendor->namaperusahaan }}, {{ $banegopengadaans->vendor->badanusaha->kode }}</td>
                <td>_________________</td>
            </tr>
            </tbody>
            </table>

</body>


</html>