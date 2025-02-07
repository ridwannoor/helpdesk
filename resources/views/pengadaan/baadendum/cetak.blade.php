<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $judul  }}</title>
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
            {{-- {{ strtoupper( "BERITA ACARA KLARIFIKASI DAN NEGOSIASI HARGA " . $banegopengadaans->bapengadaan->judul_pekerjaan)  }}</i>  --}}
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
                            {{ strtoupper( "BERITA ACARA KLARIFIKASI DAN NEGOSIASI HARGA " . $banegopengadaans->bapengadaan->judul_pekerjaan)  }} </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">{{ "NO. BA " . $banegopengadaans->nomor_ba  }}</td>
                        <td style="text-align: center;">{{ "Tanggal : ". date("d-m-Y", strtotime($banegopengadaans->tanggal)) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>       

        <p style="text-align: justify ; text-transform: capitalize">Pada hari {{ hariIndo(date('l', strtotime($banegopengadaans->tanggal))) }}, tanggal
            {{ terbilang(date('d', strtotime($banegopengadaans->tanggal))) }} bulan {{ bulanIndo(date('F', strtotime($banegopengadaans->tanggal)))}} tahun 
            {{ terbilang(date('Y', strtotime($banegopengadaans->tanggal))) }}
            ({{ date("d-m-Y", strtotime($banegopengadaans->tanggal)) }}) lokasi  {{ $banegopengadaans->lokasi_nego }},
            telah diadakan Rapat Klarifikasi & Negosiasi Harga terhadap Dokumen Penawaran Harga untuk pekerjaan tersebut di atas yang dihadiri oleh: </p>
        {{-- <p> --}}
        {{-- <div class="container"> --}}
        <p><strong>I. IAS Property Indonesia, PT :</strong></p>
        {{-- <table class="table"> --}}
       <ol type="1">
            @foreach ($banegopengadaans->divisis as $item)
            {{-- <tbody> --}}
                {{-- <tr> --}}
                   <li style="margin: 20px">{{ strtoupper($item->detail) }}</li>     
                {{-- </tr> --}}
            {{-- </tbody> --}}
            @endforeach
        </ol>
            {{-- </table> --}}

        {{-- </div> --}}
        {{-- </p> --}}
        <p><strong>II. Pihak Calon Mitra :</strong></p>
      
        <ol type="1">
            <li style="margin: 20px">{{ $banegopengadaans->vendor->namaperusahaan }}, {{ $banegopengadaans->vendor->badanusaha->kode }}</li>     
        </ol>
        {{-- <table class="table">
            <tbody>
                <tr> --}}
                    {{-- <td>{{ $banegopengadaans->vendor->namaperusahaan }}, {{ $banegopengadaans->vendor->badanusaha->kode }}</td> --}}
                {{-- </tr>
            </tbody>
        </table> --}}
        @php
        $no = 1;
        @endphp
        <p style="text-transform: capitalize"> Dihasilkan kesepakatan sebagai berikut:</p>
          <ol>
                <li style="text-align: justify"><span> Rencana Anggaran Pelaksanaan (RAP) yang diterima yaitu sebesar {{ "Rp " . format_uang($banegopengadaans->bapengadaan->nilai_rap)  }}- 
                    ({{ terbilang($banegopengadaans->bapengadaan->nilai_rap) . " rupiah" }}) harga termasuk pajak.</span></li>

            <li style="text-transform: capitalize"><span>Penawaran harga sebelum negosiasi:</span>   <br>
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
                    @if ($banegopengadaans->spph)
                        <tr>
                            <td>No SPPH</td>
                            <td>{{ $banegopengadaans->spph }}</td>
                        </tr>	
                    @endif                  
                    <tr>
                        <td>Jumlah Penawaran</td>
                        <td>{{ "Rp ". format_uang($banegopengadaans->jml_penawaran)  }}
                            ({{ terbilang($banegopengadaans->jml_penawaran) . " rupiah" }}) harga sudah termasuk pajak. </td>
                    </tr>							 
                </tbody> 
            </table>
        </li> 
            <li style="text-transform: capitalize"><span>Penawaran harga sesudah negosiasi :</span>   <br>

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
                    @if ($banegopengadaans->spph_nego)
                        <tr>
                            <td>No SPPH</td>
                            <td>{{ $banegopengadaans->spph_nego }}</td>
                        </tr>	
                    @endif                   
                    <tr>
                        <td>Jumlah Penawaran</td>
                        <td>{{ "Rp ". format_uang($banegopengadaans->jml_nego)  }}
                            ({{ terbilang($banegopengadaans->jml_nego) . " rupiah" }}) harga sudah termasuk pajak.</td>
                    </tr>							 
                </tbody> 
            </table>
        </li>
            <li><span>Jangka Waktu Pelaksanaan :   {{ $banegopengadaans->bapengadaan->jangkawaktu_pelaksanaan . " (" . $banegopengadaans->bapengadaan->jangka_pelaksanaan . ") Hari Kalender Terhitung Sejak Terbit Kontrak / PO / SPK" }} </span> </li>
            <li><span> Jangka Waktu Pemeliharaan : {{ $banegopengadaans->bapengadaan->jangka_pemeliharaan . " (" . terbilang($banegopengadaans->bapengadaan->jangka_pemeliharaan) . " ) " }}  hari kalender</span>  </li>
            <li><span> Cara Pembayaran :</span> <br>
               <ol type="I">
                @foreach ($banegopengadaans->bapengadaan->badetailpengadaans as $item)   

                <li style="margin-top:14px; text-align: justify">  {{ $item->termin }}   </li>    
                      
                @endforeach
             </ol>
            </li>
            @php
            $jam = $banegopengadaans->jml_nego * 5/100 ;
            // $dp =  $banegopengadaans->jml_nego * $lok->nilaidp/100;?
            @endphp
            {{-- <li style="text-align: justify ; text-transform: capitalize"><span>{{ $banegopengadaans->vendor->namaperusahaan }}, {{ $banegopengadaans->vendor->badanusaha->kode }} selanjutnya akan mengirimkan surat penawaran harga setelah negosiasi</span></li> --}}
            {{-- <li style="text-align: justify ; text-transform: capitalize"><span>Pengiriman Barang / Material ke Lokasi Pekerjaan dilakukan oleh : {{ $banegopengadaans->pengiriman }}</span></li> --}}
            <li style="text-align: justify ; text-transform: capitalize"><span>Calon Mitra Jasa Konstruksi selanjutnya akan mengirimkan Surat Penawaran Harga setelah Negosiasi.</span> </li>
            <li style="text-align: justify ; text-transform: capitalize"><span>lingkup Pekerjaan telah sesuai dengan BoQ dan Kerangka Acuan Kerja (KAK) / RKS yang disetujui oleh Unit Spesifikasi Teknis Terkait.(terlampir)</span>  </li>
            {{-- @if ($banegopengadaans->jaminandp == "other")
            <li style="text-align: justify ; text-transform: capitalize"><span>Pihak Kedua membayarkan Jaminan DP {{ $banegopengadaans->jaminandp1 . "%" }} sebesar {{ "Rp " . format_uang($banegopengadaans->jaminandp2)  }} dapat berupa bank garansi, asuransi, ataupun tunai.</span></li>
            @endif --}}
            {{-- <li style="text-align: justify ; text-transform: capitalize"><span>Pihak Kedua membayarkan Jaminan pelaksanaan sebesar 5% (lima persen) dari nilai pekerjaan atau senilai {{ $banegopengadaans->jaminandp1 . " %" }} sebesar {{ "Rp " . format_uang($jam) . " (" . terbilang($jam) . ") "  }} dapat berupa bank garansi, asuransi, ataupun tunai.
            dengan jangka waktu jaminan pelaksanaan {{ $banegopengadaans->bapengadaan->jangka_pelaksanaan }} hari kalender dengan jangka waktu Jaminan Pelaksanaan selama jangka waktu 
            pelaksanaan ditambah 30 hari kalender dan membayarkan biaya dokument kontrak sebesar {{ "Rp " . format_uang($banegopengadaans->bapengadaan->biaya_dokumen)  }} ke rekening BNI nomor : 03333-55569 a/n PT IAS Property Indonesia</span></li>
             --}}
            <li style="text-align: justify ; text-transform: capitalize"><span>Berita Acara Klarifikasi dan Negosiasi Harga ini merupakan satu kesatuan dan menjadi bagian yang tidak terpisahkan dari Kontrak serta mempunyai kekuatan hukum yang mengikat Para Pihak.</span></li>
            
        </ol>                         
        <p>Demikian Berita Acara ini dibuat dengan sebenar-benarnya untuk dipergunakan sebagaimana mestinya.</p>
      
        <p><strong>I. IAS Property Indonesia, PT</strong></p>
        {{-- <table class="table"> --}}
            <ol>
            @foreach ($banegopengadaans->divisis as $item)
            {{-- <tbody>
                <tr> --}}
                  <li style="margin: 25px">{{ strtoupper($item->detail) }} &emsp; <span>.................</span> </li>
                    {{-- <td>_________________</td>
                </tr> --}}
                {{-- <th>{{  $bapengadaans->divisis->implode('detail' ,  ', ' ) }}</th> --}}
                {{-- <th>{{ $bapengadaans->vendor->namaperusahaan }}</th> --}}
            {{-- </tbody> --}}
            @endforeach
        </ol>
        {{-- </table> --}}
        <p><strong>II. Pihak Calon Mitra</strong></p>

        <ol>
            <li style="margin: 25px">{{ $banegopengadaans->vendor->namaperusahaan }}, {{ $banegopengadaans->vendor->badanusaha->kode }} &emsp; <span>.................</span></li>
        </ol>
        {{-- <table class="table table-striped- table-bordered table-hover table-checkable">
            <tbody>
                <td>{{ $banegopengadaans->vendor->namaperusahaan }}, {{ $banegopengadaans->vendor->badanusaha->kode }}</td>
                <td>_________________</td> --}}
                {{-- <th>{{ $lok->vendor->namaperusahaan }}</th> --}}
            {{-- </tbody> --}}
            {{-- < --}}
        {{-- </table> --}}
    </div>

    
</body>


</html>