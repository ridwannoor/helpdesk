<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $judul  }} {{ $spk->nomor_spk }}</title>
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
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td rowspan="4"><strong>SURAT PERINTAH KERJA</strong></td>
                        <td>Lokasi Pekerjaan</td>
                        {{-- <td>:</td> --}}
                        <td>{{ ": " . $spk->bakesepakatan->banegopengadaan->bapengadaan->lokasi->kode }}</td>
                    </tr>
                    <tr>
                        <td>Unit Kerja</td>
                        {{-- <td>:</td> --}}
                        <td>{{ ": " . $spk->divisi->kode }}</td>
                    </tr>
                    <tr>
                        <td>Nomor</td>
                        {{-- <td>:</td> --}}
                        <td>{{ ": " . $spk->nomor_spk }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        {{-- <td>:</td> --}}
                        <td>{{ ": " . date('d-m-Y' , strtotime($spk->tanggal))  }}</td>
                    </tr>
                    <tr>
                        <td rowspan="10"><strong>PEKERJAAN</strong></td>
                        <td colspan="2" style="text-align: center"><strong>DASAR SURAT PERINTAH KERJA</strong></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center">BERITA ACARA PENJELASAN PEKERJAAN (aawizing)</td>
                    </tr>
                    <tr>
                        <td>Nomor</td>
                        {{-- <td>:</td> --}}
                        <td>{{ ": " . $spk->bakesepakatan->banegopengadaan->bapengadaan->nomor_ba }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        {{-- <td>:</td> --}}
                        <td>{{ ": " . date('d-m-Y' , strtotime($spk->bakesepakatan->banegopengadaan->bapengadaan->tanggal))  }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center"><strong>BERITA ACARA KLARIFIKASI & NEGOSIASI</strong></td>
                    </tr>
                    <tr>
                        <td>Nomor</td>
                        {{-- <td>:</td> --}}
                        <td>{{ ": " . $spk->bakesepakatan->banegopengadaan->nomor_ba }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        {{-- <td>:</td> --}}
                        <td>{{ ": " . date('d-m-Y' , strtotime($spk->bakesepakatan->banegopengadaan->tanggal))  }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center"><strong>PARA PIHAK</strong></td>
                    </tr>
                    <tr>
                        <td>Pihak Pertama</td>
                        {{-- <td>:</td> --}}
                        <td>{{ ": " . $pref->nama_perusahaan }}</td>
                    </tr>
                    <tr>
                        <td>Pihak Kedua</td>
                        {{-- <td>:</td> --}}
                        <td>{{ ": " . $spk->bakesepakatan->banegopengadaan->vendor->namaperusahaan . ", " . $spk->bakesepakatan->banegopengadaan->vendor->badanusaha->kode  }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: justify">
                            Surat Perintah Kerja ini dibuat dan ditandatangani pada hari {{ hariIndo(date('l', strtotime($spk->tanggal))) }}, tanggal
                            {{ terbilang(date('d', strtotime($spk->tanggal))) }} bulan {{ bulanIndo(date('F', strtotime($spk->tanggal)))}} tahun 
                            {{ terbilang(date('Y', strtotime($spk->tanggal))) }}
                            ({{ date("d-m-Y", strtotime($spk->tanggal)) }}) di 
                            Jakarta oleh dan antara PARA PIHAK. Selanjutnya PIHAK PERTAMA dan PIHAK KEDUA secara bersama - sama 
                            disebut PARA PIHAK telah sepakat saling mengikatkan diri dalam Surat Perintah Kerja dengan syarat - syarat 
                            dan ketentuan - ketentuan sebagai berikut :
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center"><strong>RUANG LINGKUP</strong></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: justify">PIHAK PERTAMA meminta PIHAK KEDUA untuk melaksanakan Pekerjaan {{ $spk->bakesepakatan->banegopengadaan->bapengadaan->judul_pekerjaan }} dengan ruang lingkup terlampir (BoQ, RKS dan Dokumen lainnya)</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center"><strong>NILAI PEKERJAAN</strong></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: justify">Biaya Pekerjaan sebagaimana tersebut dalam Surat Perintah Kerja ini telah disepakati oleh PARA PIHAK sebesar {{ "Rp " . format_uang($spk->bakesepakatan->banegopengadaan->jml_nego) }} termasuk pajak – pajak.</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center"> <strong>TATA CARA PEMBAYARAN</strong> </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: justify">
                            <ol type="I">
                                @foreach ($spk->bakesepakatan->banegopengadaan->bapengadaan->badetailpengadaans as $item)   
                
                                <li style="margin-top:14px; text-align: justify">  {{ $item->termin }}   </li>    
                                      
                                @endforeach
                             </ol>    
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center"><strong>JANGKA WAKTU PELAKSANAAN</strong></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: justify">
                            Seluruh Pekerjaan yang tercantum dalam Surat Perintah Kerja ini harus diselesaikan 
                            dan diserahkan dengan baik dan benar oleh PIHAK KEDUA kepada PIHAK PERTAMA selambat - lambatnya 
                            dalam waktu {{ $spk->bakesepakatan->banegopengadaan->bapengadaan->jangka_pelaksanaan }} hari kalender, terhitung sejak {{ $spk->bakesepakatan->banegopengadaan->bapengadaan->jangkawaktu_pelaksanaan }} , 
                            dengan masa garansi/masa pemeliharaan selama {{ $spk->bakesepakatan->banegopengadaan->bapengadaan->jangka_pemeliharaan }} hari kalender setelah Berita Acara Serah Terima Pertama (BAST) 
                            Pekerjaan {{ $spk->bakesepakatan->banegopengadaan->bapengadaan->judul_pekerjaan }} disetujui dan ditandatangani oleh Para Pihak.    
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center"><strong>DENDA DAN SANKSI</strong></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: justify">
                          <strong>Denda Keterlambatan</strong>   <br> 
                            Apabila seluruh Pekerjaan tidak dapat diserahkan dan/atau tidak dapat 
                            diselesaikan pada waktu yang telah ditetapkan, maka PIHAK KEDUA bersedia untuk dikenai denda 
                            keterlambatan sebesar 1% (satu permil)/hari dari Nilai Pekerjaan diluar pajak-pajak dihitung 
                            berdasarkan jangka waktu pelaksanaan, dan untuk denda keterlambatan maksimal atas penyelesaian 
                            pekerjaan adalah 5% (lima persen) dari Nilai Pekerjaan diluar pajak - pajak.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: justify">
                          <strong>Sanksi</strong>   <br>
                            Sanksi pemutusan Surat Perintah Kerja dikenakan kepada PIHAK KEDUA apabila dalam pelaksanaan 
                            pekerjaan PIHAK KEDUA terbukti lalai atau cidera janji dalam melaksanakan kewajibannya dan 
                            tidak memperbaiki dalam jangka waktu yang telah ditentukan; terbukti melakukan Korupsi, Kolusi, 
                            Nepotisme (KKN); terbukti melakukan pemalsuan dokumen/identitas bisnis; terbukti ditemukan kesalahan 
                            prosedur yang berpotensi menimbulkan kerugian keuangan PIHAK PERTAMA dan/atau berpotensi menimbulkan masalah hukum; 
                            PIHAK KEDUA dinyatakan pailit oleh Pengadilan; denda keterlambatan melampauinya 5% dari Nilai Pekerjaan diluar pajak - pajak.
                            
                        </td>
                    </tr>
                </tbody>
             </table>

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
                                    {{ $spk->bakesepakatan->banegopengadaan->vendor->namaperusahaan }}, {{ $spk->bakesepakatan->banegopengadaan->vendor->badanusaha->kode }}
                                    <br><br><br><br><br><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align : top;text-align:center;">
                                    <strong> {{ $spk->bakesepakatan->bod->name }}</strong> <br>                              
                                    {{ $spk->bakesepakatan->bod->jabatan }}
                                </td>
                                <td style="vertical-align : top;text-align:center; text-transform: uppercase">
                                    @foreach ($vendorbods as $item)
                                    @if ($item->ttd && $item->status == "aktif")
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
    </div>

    
</body>


</html>