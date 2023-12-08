<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $judul  }} {{ $ba->nomor_bak }}</title>
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
          <span style="text-align: left; font-size: 8pt"> {{ "BA." . $ba->nomor_bak }} <br>
        {{ "Tanggal " . $ba->tanggal }}
        </span>  
     
        </p>
        <p style="text-align: right; font-size: 8pt">  <span class="pagenum"></span></p>
          
                            {{-- {{ strtoupper( "BERITA ACARA KESEPAKATAN " . $ba->banegopengadaans->bapengadaan->judul_pekerjaan)  }}</i> </p> --}}
        {{-- <img src="{{ url('data_file/' . $pref->image) }}" width="100%" height="100%"/> --}}
    </footer>
    <div class="container">
        <header class="mt-0">
            <p style="text-align: right; font-size: 8pt"><img src="{{ public_path('data_file/'.$pref->image) }}" width="300px" alt=""></p>
        </header>   
        <div class="row">
             
            <p style="text-align: center ; text-transform:uppercase ">BERITA ACARA KESEPAKATAN <br>
                ANTARA <br>
                {{ $pref->nama_perusahaan }} <br>
                DENGAN <br>
                {{ $ba->banegopengadaan->vendor->namaperusahaan . ", " . $ba->banegopengadaan->vendor->badanusaha->kode }} <br>
                    TENTANG <br>
                {{ $ba->banegopengadaan->bapengadaan->judul_pekerjaan }}
                </p>
                <hr>
                <p style="text-align: center ; text-transform:capitalize ">
                Nomor : {{ "BA." . $ba->nomor_bak }}
                </p>
        </div>  
        <p>Kami yang bertanda tangan dibawah ini:</p>
        <ol type="I">
            <li>
                Nama <span style="margin-left: 11px"> : {{ $ba->bod->name }} </span>  <br>
                <span>Jabatan : {{ $ba->bod->jabatan . " - " . $pref->nama_perusahaan}}</span>    <br>
                Dalam hal ini bertindak untuk dan atas nama {{ $pref->nama_perusahaan }} untuk selanjutnya disebut sebagai PIHAK PERTAMA.
            </li>  
            <li>
                @foreach ($ba->banegopengadaan->vendor->vendorpengurus as $item)
                    @if ($item->ttd == 1)
                        Nama  <span style="margin-left: 11px; text-transform: uppercase"> : {{ $item->nama  }} </span>  <br>
                        Jabatan : <span style="margin-left: 11px; text-transform: uppercase">  {{ $item->jabatan . " - " . $ba->banegopengadaan->vendor->namaperusahaan . ", " . $ba->banegopengadaan->vendor->badanusaha->kode }} </span><br>
                        Dalam hal ini bertindak untuk dan atas nama {{ $ba->banegopengadaan->vendor->namaperusahaan . ", " . $ba->banegopengadaan->vendor->badanusaha->kode}} untuk selanjutnya disebut sebagai PIHAK KEDUA.
                    @endif
                @endforeach
                {{-- @foreach ($vendorbods as $item)
                    @if ($ba->bapengadaan->vendor->vendorpengurus->ttd == "1")
                    Nama  <span style="margin-left: 11px"> : {{ $ba->bapengadaan->vendor->vendorpengurus->nama  }} </span>  <br>
                    Jabatan : {{ $ba->bapengadaan->vendor->vendorpengurus->jabatan . " - " . $ba->bapengadaan->vendor->namaperusahaan . ", " . $ba->bapengadaan->vendor->badanusaha->kode }} <br>
                    Dalam hal ini bertindak untuk dan atas nama {{ $ba->bapengadaan->vendor->namaperusahaan }}, untuk selanjutnya disebut sebagai PIHAK KEDUA.
                    @endif
                @endforeach --}}
            </li>  
        </ol>  
        <p style="text-align: justify">PIHAK PERTAMA dan PIHAK KEDUA untuk selanjutnya secara bersama-sama disebut sebagai PARA PIHAK.</p>   
        <p style="text-align: justify">PARA PIHAK masing-masing bertindak dalam kedudukannya sebagaimana tersebut di atas, terlebih dahulu menerangkan hal-hal sebagai berikut:</p>  
        <ol type="I">
            {{-- <li>Bahwa pada {{ $ba->banegopengadaan->tgl_sph }} telah disampaikan Surat Permintaan Penawaran Harga nomor:  {{ $ba->banegopengadaan->spph }}  yang disampaikan oleh PIHAK PERTAMA kepada PIHAK KEDUA.</li>     --}}
            <li style="text-align: justify">Bahwa pada tanggal {{ date('d-m-Y' , strtotime($ba->banegopengadaan->tgl_sph ))  }} telah diterima Surat Penawaran Harga nomor : {{ $ba->banegopengadaan->spph }} yang dibuat oleh PIHAK KEDUA.</li>
            <li style="text-align: justify">Bahwa pada tanggal  {{ date('d-m-Y' , strtotime($ba->banegopengadaan->tanggal )) }} telah dibuat Berita Acara Klarifikasi & Negosiasi nomor {{ $ba->banegopengadaan->nomor_ba }} yang disetujui oleh perwakilan PARA PIHAK</li>
            <li style="text-align: justify">Bahwa pada tanggal {{ date('d-m-Y' , strtotime($ba->banegopengadaan->tgl_sph_nego ))  }} telah diterima Surat Penawaran Harga Setelah Negosiasi nomor : {{ $ba->banegopengadaan->spph_nego }} yang dibuat oleh PIHAK KEDUA.</li>
        </ol>     
        <p style="text-align: justify">Sehubungan dengan hal-hal tersebut di atas, PARA PIHAK sepakat untuk bekerjasama  dengan ketentuan sebagai berikut: </p>      
        <ol type="1">
            <li style="text-align: justify">PIHAK KEDUA bersedia untuk melaksanakan Pekerjaan Perbaikan Jalan Akses Bandara Pada Pekerjaan 
                Design & Build Revitalisasi dan Beautifikasi Terminal Internasional, Domestik, GAT & Fasilitas 
                Penunjang di Bandara Internasional I Gusti Ngurah Rai - Bali, dengan ruang lingkup sesuai Bill of Quantity (BoQ) 
                dengan Kerangka Acuan Kerja (KAK) serta syarat-syarat teknis lainnya yang telah disetujui oleh Unit Spesifikasi 
                Teknis (UST) terkait (terlampir). </li>  
            <li style="text-align: justify">PARA PIHAK sepakat bahwa Jangka waktu pelaksanaan pekerjaan adalah dari 73 (tujuh puluh tiga) hari kalender. 
                Dan Jangka waktu pemeliharaan pekerjaan adalah selama 290 (dua ratus sembilan puluh) hari kalender.</li>
            <li style="text-align: justify">PARA PIHAK sepakat bahwa biaya pekerjaan adalah Rp 4.430.366.074,- 
                (empat miliar empat ratus tiga puluh juta tiga ratus enam puluh enam ribu tujuh puluh empat rupiah), 
                termasuk pajak- pajak yang berlaku.</li>
            <li style="text-align: justify">PARA PIHAK sepakat bahwa tata cara pembayaran atas biaya pekerjaan diatur dengan ketentuan sebagai berikut :
                   <ol type="I">
                @foreach ($ba->banegopengadaan->bapengadaan->badetailpengadaans as $item)
            
                    <li> {{ $item->termin }}  </li>
              
                 @endforeach
                </ol>
            </li>
            @php
            $jam = $ba->banegopengadaan->jml_nego * 5/100 ;
            // $dp =  $banegopengadaan->jml_nego * $lok->nilaidp/100;?
            @endphp
            @if ($ba->banegopengadaan->jaminandp == "other")
            <li style="text-align: justify ; text-transform: capitalize"><span>Pihak Kedua membayarkan Jaminan DP {{ $ba->banegopengadaan->jaminandp1 . "%" }} sebesar {{ "Rp " . format_uang($ba->banegopengadaan->jaminandp2)  }} dapat berupa bank garansi, asuransi, ataupun tunai.</span></li>
            @endif
            <li style="text-align: justify ; text-transform: capitalize"><span>Pihak Kedua membayarkan Jaminan pelaksanaan sebesar 5% (lima persen) dari nilai pekerjaan atau senilai {{ $ba->banegopengadaan->jaminandp1 . " %" }} sebesar {{ "Rp " . format_uang($jam) . " (" . terbilang($jam) . ") "  }} dapat berupa bank garansi, asuransi, ataupun tunai.
            dengan jangka waktu jaminan pelaksanaan {{ $ba->banegopengadaan->bapengadaan->jangka_pelaksanaan }} hari kalender dengan jangka waktu Jaminan Pelaksanaan selama jangka waktu 
            pelaksanaan ditambah 30 hari kalender dan membayarkan biaya dokument kontrak sebesar {{ "Rp " . format_uang($ba->banegopengadaan->bapengadaan->biaya_dokumen)  }} ke rekening BNI nomor : 03333-55569 a/n  {{ $pref->nama_perusahaan }}</span></li>
            
            <li style="text-align: justify">Dengan diterbitkannya Berita Acara Kesepakatan ini, maka kami harap agar pelaksana pekerjaan dapat menghubungi Divisi 
                Construction selaku Unit Spesifikasi Teknis (UST) untuk dapat melakukan koordinasi persiapan pekerjaan.</li>
        </ol> 
        <p>Demikian Berita Acara Kesepakatan ini dibuat, untuk dapat digunakan sebagaimana seharusnya.</p> 
        <br><br><br><br>
        <p style="text-align: center">Jakarta, 20 Mei 2022</p>   
        <p>
            <div class="table-responsive">
                <table class="table a">
                    <tbody>
                        <tr>
                            <td style="vertical-align : top;text-align:center;">
                                <strong>PIHAK PERTAMA</strong> <br>
                                {{ $pref->nama_perusahaan }}                               
                                <br><br><br><br><br><br><br>
                            </td>
                            <td style="vertical-align : top;text-align:center; text-transform: uppercase">
                                <strong>PIHAK KEDUA</strong> <br>
                                {{ $ba->banegopengadaan->vendor->namaperusahaan }}, {{ $ba->banegopengadaan->vendor->badanusaha->kode }}
                                <br><br><br><br><br><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align : top;text-align:center;">
                                <strong> {{ $ba->bod->name }}</strong> <br>                              
                                {{ $ba->bod->jabatan }}
                            </td>
                            <td style="vertical-align : top;text-align:center; text-transform: uppercase">
                                @foreach ($ba->banegopengadaan->vendor->vendorpengurus as $item)
                                @if ($item->ttd == 1)
                                    <strong> {{ $item->nama }}</strong> <br>  
                                    {{ $item->jabatan }}                            
                                    {{-- {{ $item->jabatan }} --}}
                                @endif
                                @endforeach
                              
                            </td>
                        </tr>
    
                    </tbody>
                </table>
            </div>
        </p>
    </div>

    
</body>


</html>