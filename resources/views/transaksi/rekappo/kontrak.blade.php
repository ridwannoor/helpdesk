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
            line-height: 1.8;
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

        /* ol, li {
           
        } */

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
   
    <div id="container">
        <header>
            <p style="text-align: right; font-size: 8pt"><img
                    src="{{ public_path('data_file/'.$rekappos->preference->image) }}" width="300px" alt=""></p>
        </header>
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

    <div class="row" style="font-size: 10pt; text-align: justify;" >
        <h2 style="text-align: center;"><strong>{{$rekappos->nama_pekerjaan}}</strong></h2> <hr>
        <h4 style="text-align: center;"><strong>{{$rekappos->no_kontrak}}</strong></h4> 
        <span>
            Kontrak Pekerjaan {{$rekappos->nama_pekerjaan}} (selanjutnya disebut “Kontrak”) ini dibuat dan ditandatangani pada hari 
            {{ hariIndo(date('l', strtotime($rekappos->tanggal))) }}, tanggal {{ date('d M Y', strtotime($rekappos->tanggal)) }}
            {{-- {{ terbilang(date('d', strtotime($rekappos->tanggal))) }} bulan {{ bulanIndo(date('F', strtotime($rekappos->tanggal)))}} tahun 
            {{ terbilang(date('Y', strtotime($rekappos->tanggal))) }} --}}
            {{-- Jum’at Tanggal 31 Mei 2023  --}}
            di Jakarta, oleh dan antara: 
        </span>
            <ol type="I" style="text-align: justify;  ">
                <li>{{ $pref->nama_perusahaan }}, Perseroan Terbatas yang didirikan berdasarkan Akta Nomor 2 tanggal 6 Januari 2012 dibuat dihadapan Nanda Fauz Iwan, 
                    Sarjana Hukum, Magister Kenotariatan, Notaris di Jakarta Selatan. Perseroan telah mendapatkan pengesahan dari Menteri Hukum dan 
                    Hak Asasi Manusia Republik Indonesia Nomor AHU-03704.AH.01.01.Tahun 2012 tanggal 20 Januari 2012, dimana akta sudah beberapa kali mengalami 
                    perubahan dan bertalian dengan perubahan terakhir sebagaimana tertuang pada Akta Nomor 09  Tanggal 18 Agustus 2022 yang dibuat dihadapan 
                    Nanda Fauz Iwan, Sarjana Hukum, Magister Kenotariatan, Notaris di Jakarta dan perubahan telah didaftarkan pada Sistem Administrasi 
                    Badan Hukum pada Kementerian Hukum dan Hak Asasi Manusia Republik Indonesia sebagaimana tertera pada Surat Penerimaan Pemberitahuan 
                    Perubahan Data Perseroan Nomor AHU-AH.01.09-0045126 Tanggal 18 Agustus 2022. Perseroan berkedudukan di Jakarta dan berkantor pusat 
                    di Sainath Tower lantai 10, Jalan selangit blok B 9 nomor 7, Gunung Sahari Selatan, Kemayoran-Jakarta Pusat. Dengan demikian dalam 
                    perbuatan hukum pada perjanjian ini diwakili oleh RISTIYANTO EKO WIBOWO dalam jabatannya selaku DIREKTUR UTAMA, dengan demikian sah 
                    bertindak untuk dan atas nama {{ $pref->nama_perusahaan }} 
                    -	Selanjutnya dalam perjanjian ini disebut PIHAK PERTAMA.
                </li>
                <li>
                       {{ $rekappos->vendor->namaperusahaan }}, {{ $rekappos->vendor->badanusaha->kode }}, Perseroan Terbatas yang didirikan menurut hukum yang berlaku di Indonesia, yang Anggaran Dasarnya 
                    dimuat dalam Akta Nomor 8 tertanggal 29 Juni 2022, dibuat dihadapan Ronald Aprianto Sugiarto, Sarjana Hukum, Magister Kenotariatan, 
                    Notaris di Kabupaten Gresik, dan telah mendapat pengesahan dari Menteri Hukum dan Hak Asasi Manusia Republik Indonesia 
                    Nomor AHU-00268.AII.02.01.TAHUN 2017. Dimana telah mengalami perubahan yang tertuang dalam Akta Nomor 1 tanggal 03 Februari 2023, 
                    dibuat dihadapan Notaris Ronald Aprianto Sugiarto, Sarjana Hukum, Magister Kenotariatan, Notaris di Kabupaten Gresik, yang telah 
                    menerima Surat Keputusan dari Menteri Hukum dan Hak Asasi Manusia Republik Indonesia Nomor : AHU.0025089.AH.01.11.TAHUN 2023 
                    Tanggal 07 Februari 2023. Demikian dalam perbuatan hukum dalam perjanjian ini diwakili oleh BARRY REYNALDO PATTIPEILUHU dalam 
                    jabatannya selaku DIREKTUR UTAMA, demikian daripada itu sah mewakili    {{ $rekappos->vendor->namaperusahaan }}, {{ $rekappos->vendor->badanusaha->kode }}.
                    -	Selanjutnya dalam perjanjian ini disebut PIHAK KEDUA.

                </li>
            </ol>
            <span  style="text-align: center;">MENGINGAT BAHWA :</span>
            <ol type="I" style="text-align: justify; ">
                <li>PIHAK PERTAMA dalam kedudukannya sebagaimana di atas memberi tugas kepada PIHAK KEDUA dan PIHAK KEDUA menerima tugas dari PIHAK PERTAMA untuk 
                    Pelaksanaan {{$rekappos->nama_pekerjaan}}.</li>
                <li>PIHAK KEDUA sebagaimana dinyatakan kepada PIHAK PERTAMA, memiliki keahlian profesional, personil dan sumber daya teknis 
                    serta telah menyetujui untuk melaksanakan pekerjaan sesuai dengan persyaratan dan ketentuan dalam Kontrak ini;</li>
                <li>PIHAK PERTAMA dan PIHAK KEDUA selanjutnya disebut ’Para Pihak’ menyatakan memiliki kewenangan untuk menandatangani Kontrak
                        ini dan mengikat pihak yang diwakili; </li>
                <li>Para Pihak mengakui dan menyatakan bahwa sehubungan dengan penandatanganan Kontrak ini, masing – masing pihak :
                    <ol>
                        <li>menandatangani Kontrak ini setelah meneliti secara patut;</li>
                        <li>telah membaca dan memahami secara penuh ketentuan Kontrak ini;</li>
                        <li>telah mendapatkan kesempatan yang memadai untuk memeriksa dan mengkonfirmasikan semua ketentuan 
                            dalam Kontrak ini beserta semua fakta dan kondisi yang terkait.</li>
                    </ol>
                </li>
            </ol>
            <span  style="text-align: center;">Maka oleh karena itu Para Pihak dengan ini bersepakat dan menyetujui hal-hal sebagai berikut:</span>
            <ol type="I" style="text-align: justify; ">
                <li>Dokumen-dokumen berikut ini merupakan satu-kesatuan dan bagian yang tidak terpisahkan dari Kontrak ini :</li>
                <ol>
                    <li>Perubahan Kontrak yang berupa Addendum Kontrak/Berita Acara Perubahan Pekerjaan/Contract Change Order (apabila ada);</li>
                    <li>Pokok Kontrak, Syarat-syarat Umum Kontrak (SSUK) dan Syarat-syarat Khusus Kontrak (SSKK);</li>
                    <li>Berita Acara Negosiasi Harga;</li>
                    <li>Rencana Kerja dan Syarat (RKS) atau Spesifikasi Teknis atau Kerangka Acuan Kerja/Terms of Reference;</li>
                    <li>Lampiran-lampiran, yang merupakan satu-kesatuan dan bagian yang tidak terpisahkan dari Kontrak yang berupa Daftar kuantitas dan harga, Surat penawaran dan Dokumen Penawaran, Surat Penunjukan Pemenang;</li>
                    <li>Berita Acara dan Surat Pernyataan (Apabila ada).</li>
                </ol>
                <li>Dokumen-dokumen di atas dibuat untuk saling menjelaskan satu sama lain dan jika terjadi pertentangan antara ketentuan dalam suatu dokumen 
                    dengan ketentuan dalam dokumen yang lain maka yang berlaku adalah 
                    ketentuan dalam dokumen yang lebih tinggi berdasarkan tata urutan/hierarki sebagaimana dijelaskan dalam Kontrak.</li>
                <li>Kontrak ini mulai berlaku efektif terhitung sejak tanggal yang ditetapkan di atas dan penyelesaian keseluruhan 
                    pekerjaan sebagaimana diatur dalam Kontrak dan dokumen lain yang merupakan satu kesatuan dan bagian yang tidak terpisahkan dari Kontrak.</li>
            </ol>
            <span>Dengan demikian, Para Pihak telah bersepakat untuk menandatangani Kontrak ini pada                   
                tanggal tersebut di atas dan melaksanakan Kontrak sesuai dengan ketentuan peraturan               
                perundang - undangan di Republik Indonesia.</span>
        
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
                                    @foreach ($rekappos->vendor->vendorpengurus as $item)
                                        @if ($item->is_published)
                                        <strong>    {{ $item->nama}}   </strong> <br>

                                        {{ $item->jabatan}}  
                                        @endif
                                    @endforeach
                                </td>
                                <td style="vertical-align : top;text-align:center;">
                                    <strong> {{ $rekappos->bod->name }}</strong> <br>
                                  
                                    {{ $rekappos->bod->jabatan }}
                                </td>
                            </tr>
        
                        </tbody>
                    </table>
                </div>
          <div class="page-break"></div>

  <h4 style="text-align: center;"><strong>SYARAT - SYARAT UMUM KONTRAK (SSUK)</strong></h4> 
    <ol type="1" style="text-align: justify; ">
        <li>Definisi</li>
        <span>Istilah-istilah yang digunakan dalam Kontrak ini harus mempunyai definisi seperti yang dimaksudkan sebagai berikut :</span>        
            <ol>
                <li>Kontrak Pekerjaan adalah Pekerjaan {{$rekappos->nama_pekerjaan}} selanjutnya disebut Kontrak adalah perjanjian secara tertulis antara PIHAK PERTAMA dengan 
                    PIHAK KEDUA yang mencakup Pokok Kontrak, Syarat – Syarat Umum Kontrak (SSUK), Syarat – Syarat Khusus Kontrak (SSKK) 
                    serta dokumen yang merupakan bagian tidak terpisahkan dari Kontrak untuk melaksanakan Pekerjaan {{$rekappos->nama_pekerjaan}}.</li>
                <li>PIHAK PERTAMA adalah pejabat yang berwenang menandatangani dan melaksanakan Kontrak ini serta mewakili 
                    Direksi dan bertindak untuk dan atas nama {{ $pref->nama_perusahaan }}.</li>
                <li>PIHAK KEDUA adalah pejabat yang berwenang menandatangani dan melaksanakan Kontrak ini serta 
                    mewakili Direksi dan bertindak untuk dan atas nama {{ $rekappos->vendor->namaperusahaan }}, {{ $rekappos->vendor->badanusaha->kode }}.</li>
                <li>Perusahaan adalah {{ $pref->nama_perusahaan }}.</li>
                <li>Unit Teknis adalah Divisi Property Management & Utility  yang memiliki wewenang dan tanggungjawab 
                    membuat pra desain (3D dan animasi berikut RKS dan spesifikasi teknis) serta mempersiapkan segala aspek administrasi, 
                    aspek teknis, Rencana Anggaran dan Biaya (RAB), Kerangka Acuan Kerja/Term of Reference, serta melakukan penghitungan 
                    ulang dan menyusun Rencana Anggaran Pelaksanaan</li>
                <li>Unit Pengawasan adalah Unit Project Control yang memiliki kewenangan dan tanggung jawab memastikan 
                    terselesaikannya proyek konstruksi tepat waktu melalui monitoring dan evaluasi terhadap waktu, biaya dan mutu pekerjaan. </li>
                <li>Direksi Pekerjaan adalah pegawai yang ditugaskan oleh Direksi berdasarkan Surat Keputusan Direksi untuk melaksanakan 
                    Pengawasan Pekerjaan Proyek di Tim Management Proyek.</li>
                <li>Pekerjaan Utama adalah jenis pekerjaan yang secara langsung menunjang terwujudnya dan berfungsinya suatu 
                    pengadaan sesuai peruntukannya yang ditetapkan dalam Dokumen Teknis/KAK/TOR.</li>
                <li>Contract Change Order (CCO) adalah Perubahan Pekerjaan berupa penambahan, pengurangan atau penggantian 
                    Pekerjaan sesuai dengan kebutuhan yang diperlukan untuk tercapainya Pekerjaan dan oleh karenanya akan disepakati oleh Para Pihak.</li>
                <li>Nilai Kontrak adalah total harga/biaya pekerjaan yang telah disepakati oleh Para Pihak dalam Kontrak.</li>
                <li>Masa Pemeliharaan adalah suatu masa (jangka waktu) teretentu setelah bagian/seluruh Pekerjaan selesai dilaksanakan
                     dan diserah-terimakan oleh PIHAK KEDUA kepada PIHAK PERTAMA, dihitung sejak tanggal penyerahan pertama pekerjaan</li>
                <li>Jaminan Pelaksanaan adalah jaminan yang bersifat mudah dicairkan dan tidak bersyarat (unconditional), 
                    yang diserahkan oleh PIHAK KEDUA kepada PIHAK PERTAMA untuk menjamin terpenuhinya kewajiban PIHAK KEDUA</li>
                <li>Purchase Order (PO) adalah dokumen resmi yang dikeluarkan oleh Perusahaan kepada mitra penyedia barang yang mencakup 
                    permintaan barang  (yakni jumlah, harga dan tipe barang) maupun jasa (terbatas hanya untuk jasa pemasangan dan jasa angkut serta jasa angkat)</li>
                <li>Jangka Waktu Kontrak adalah jangka waktu pelaksanaan pekerjaan terhitung mulai tanggal ditandatanganinya Kontrak sampai dengan masa pemeliharaan berakhir.</li>
            </ol>
            <li>Bahasa dan Hukum</li>
            <ol>
                <li>Bahasa yang digunakan dalam Kontrak ini adalah Bahasa Indonesia.</li>
                <li>Hukum yang digunakan dalam pelaksanaan Kontrak ini adalah hukum yang berlaku di Indonesia.</li>
            </ol>
            <li>Larangan Korupsi, Kolusi, Nepotisme (KKN) dan/atau Penipuan</li>
            <ol>
                <li>Para Pihak dilarang untuk :</li>
                <ol type="a" style="text-align: justify; ">
                    <li>menawarkan, menerima atau menjanjikan untuk memberi atau menerima hadiah atau imbalan berupa apapun atau melakukan tindakan lainnya 
                        untuk mempengaruhi siapapun yang diketahui atau patut dapat diduga berkaitan dengan pengadaan ini;</li>
                    <li>membuat dan/atau menyampaikan secara tidak benar dokumen dan/atau keterangan lain yang disyaratkan untuk penyusunan dan pelaksanaan Kontrak ini.</li>
                    <li>mempengaruhi siapapun yang diketahui atau patut dapat diduga berkaitan dengan Pengadaan ini.</li>
                    <li>PIHAK PERTAMA dan/atau PIHAK KEDUA yang melakukan dan/atau terlibat KKN dan/atau penipuan dikenakan sanksi berdasarkan ketentuan peraturan perundang-undangan.</li>
                <li>PIHAK KEDUA yang menurut yang berlaku penilaian PIHAK PERTAMA terbukti melakukan larangan-larangan di atas dapat dikenakan sanksi-sanksi administratif sebagai berikut :</li>
                <ol>
                    <li>Pengakhiran/Pemutusan Kontrak;</li>
                    <li>Pencantuman dalam daftar hitam (blacklist) Perusahaan; dan</li>
                    <li>Jaminan Pelaksanaan menjadi hak PIHAK PERTAMA.</li>
                </ol>
                </ol>
                <li>Pengenaan sanksi administratif di atas akan diumumkan melalui Surat Resmi dari PIHAK  
                    PERTAMA.
                   </li>
            </ol>
            <li>Korespondensi</li>
            <ol>
                <li>Semua korespondensi dapat berbentuk surat menyurat, surat elektronik (e-Mail) dan/atau facsimile dengan alamat tujuan masing – masing pihak yang tercantum dalam Kontrak.</li>
                <li>Semua pemberitahuan, permohonan atau persetujuan berdasarkan Kontrak ini harus dibuat secara tertulis dalam Bahasa Indonesia, dan dianggap 
            telah diberitahukan jika telah disampaikan secara langsung kepada wakil sah Para Pihak atau jika disampaikan melalui surat tercatat dan/atau faksimile 
            ditujukan ke alamat sesuai yang tercantum dalam Kontrak.</li> 
        </ol>
        <li>Bea Meterai dan Perpajakan</li>
        <ol>
            <li>Bea Meterai untuk mengadakan Kontrak ini menjadi beban dan tanggung jawab PIHAK KEDUA.</li>
            <li>Harga/biaya pekerjaan yang dicantumkan dalam Kontrak sudah termasuk pajak-pajak dan keuntungan perusahaan dengan ketentuan apabila dikemudian hari terdapat kebijakan baru pemerintah 
                mengenai Pajak Pertambahan Nilai (PPN) maka akan diadakan perubahan dalam bentuk adendum. </li>
            <li>PIHAK KEDUA berkewajiban untuk membayar semua pajak - pajak, bea, retribusi dan pungutan lain yang sah yang dibebankan oleh peraturan  perpajakan atas pelaksanaan Kontrak ini. 
                Semua pengeluaran perpajakan ini telah termasuk dalam Nilai Kontrak.</li>
        </ol>
        <li>Penggunaan Dokumen Kontrak dan Informasi</li>
        <span>PIHAK KEDUA tidak diperkenankan menggunakan dokumen Kontrak dan Informasi yang ada kaitannya dengan Kontrak di luar keperluan dari pekerjaan yang tersebut dalam Kontrak, 
            kecuali lebih dahulu mendapat ijin tertulis dari PIHAK PERTAMA.</span>
        <li>Instruksi</li>
        <ol>
            <li>PIHAK KEDUA wajib melaksanakan semua instruksi PIHAK PERTAMA yang berkaitan dengan  
                pelaksanaan pekerjaan  </li>
            <li>Semua Instruksi harus dilakukan secara tertulis</li>
        </ol>
        <li>Hak Atas Kekayaan Intelektual </li>
        <ol>
            <li>PIHAK KEDUA wajib menjamin dan melindungi serta menjaga PIHAK PERTAMA dari segala ancaman atau tuntutan tanggung jawab atas 
                pelanggaran hak paten, hak cipta, merek dagang atau hak rancangan industri yang timbul karena penggunaan barang atau pelanggaran 
                dalam bentuk apapun atas barang-barang oleh PIHAK KEDUA ataupun untuk setiap penemuan yang telah terdaftar maupun belum terdaftar 
                yang diserahkan oleh PIHAK KEDUA kepada PIHAK PERTAMA</li>
            <li>Dalam hal terdapat tuntutan hukum atau klaim pelanggaran Hak atas Kekayaan Intelektual dari pihak lain kepada PIHAK PERTAMA 
                sehubungan dengan penggunaan dan pengoperasian barang, PIHAK KEDUA harus menggunakan usaha-usaha terbaiknya untuk :</li>
                <ol type="a" style="text-align: justify; ">
                    <li>Memperoleh lisensi dari pihak ketiga tersebut apabila PIHAK KEDUA mengakui bahwa telah terdapat pelanggaran Hakatas Kekayaan Intelektual</li>
                    <li>Memberikan pembelaan atas tuntutan atau klaim tersebut sampai dengan keluarnya putusan yang berkekuatan hukum tetap</li>
                    <li>Pilihan – pilihan diatas harus dikomunikasikan secara terbuka dengan PIHAK PERTAMA dan harus memperoleh persetujuan terlebih dahulu dari 
                        PIHAK PERTAMA sebelum pelaksanaannya.</li>
                </ol>
            <li>PIHAK KEDUA wajib memberikan kompensasi sebesar total kerugian yang diderita oleh PIHAK PERTAMA, baik yang langsung maupun 
                tidak langsung diderita akibat pelanggaran Hak atas Kekayaan Intelektual, dan PIHAK KEDUA dengan ini membebaskan PIHAK PERTAMA dari 
                segala tuntutan hukum, baik di pengadilan atau forum lainnya, dan PIHAK KEDUA harus menyelesaikan tuntutan hukum atas biayanya sendiri.</li>
        </ol>
        <li>Tata Tertib</li>
        <ol>
            <li>Selama melaksanakan pekerjaan yang ada dalam Kontrak ini, PIHAK KEDUA wajib mentaati setiap ketentuan yang berlaku di Bandar Udara atau di lingkungan kerja PIHAK PERTAMA.</li>
            <li>PIHAK KEDUA dalam melaksanakan pekerjaan wajib memelihara keamanan, ketertiban dan ketenangan di wilayah pekerjaan</li>
            <li>PIHAK KEDUA bertanggung jawab sepenuhnya terhadap pengamanan para pegawainya dalam melaksanakan pekerjaan yang diperjanjian ini dari kemungkinan kejahatan, tindakan Kriminal 
                yang akan merugikan PIHAK PERTAMA dan atau pihak lain</li>
            <li>PIHAK KEDUA bertanggung jawab sepenuhnya dan wajib memperbaiki dan atau mengganti setiap kerusakan/kerugian yang diderita PIHAK PERTAMA yang ditimbulkan oleh 
                PIHAK KEDUA dan/atau pegawainya, baik karena kesengajaan ataupun karena kelalaian</li>
        </ol>
        <li>Larangan Mengalihkan Pekerjaan  </li>
        <ol>
            <li>PIHAK KEDUA dilarang mengalihkan/mensubkontrakkan seluruh pekerjaan kepada Pihak Ketiga/ Pihak Lain.</li>
            <li>PIHAK KEDUA dapat mengalihkan/mensubkontrakkan sebagian pekerjaan kepada pihak lain dengan izin tertulis dari PIHAK PERTAMA.</li>
            <li>Terhadap pelanggaran atas larangan sebagaimana dimaksud pada poin 10.1 dan poin 10.2, dikenakan sanksi administrasi berupa peringatan kepada PIHAK KEDUA, 
                pemutusan Kontrak atau dikenakan sanksi berupa masuk ke dalam daftar hitam (blacklist) Perusahaan.</li>
        </ol>
        <li>Hak dan Kewajiban Para Pihak</li>
        <ol>
            <li>Hak dan Kewajiban PIHAK PERTAMA :</li>
            <ol type="a" style="text-align: justify; ">
                <li>Mengawasi dan memeriksa pekerjaan yang dilaksanakan oleh PIHAK KEDUA</li>
                <li>Meminta laporan-laporan secara periodik mengenai pelaksanaan pekerjaan yang dilakukan oleh PIHAK KEDUA</li>
                <li>Melakukan perubahan Kontrak</li>
                <li>Menangguhkan pembayaran</li>
                <li>Mengenakan denda keterlambatan</li>
                <li>Melakukan pembayaran atas pekerjaan yang telah dilaksanakan sesuai ketentuan.</li>
                <li>Menyerahkan seluruh atau sebagian lapangan pekerjaan untuk pelaksanaan pekerjaan</li>
                <li>Memberikan instruksi sesuai jadwal</li>
            </ol>
            <li>Hak dan Kewajiban PIHAK KEDUA :</li>
            <ol type="a" style="text-align: justify; ">
                <li>Menerima pembayaran sesuai ketentuan dalam Kontrak atas pekerjaan yang telah dilaksanakan</li>
                <li>Melaksanakan dan menyelesaikan pekerjaan sesuai dengan jadwal pekerjaan yang telah ditetapkan dalam Kontrak</li>
                <li>Melaporkan pelaksanaan pekerjaan secara periodik kepada PIHAK PERTAMA</li>
                <li>Menyerahkan hasil pekerjaan sesuai dengan jadwal penyerahan pekerjaan yang telah ditetapkan dalam Kontrak</li>
                <li>Mengambil langkah-langkah yang memadai untuk melindungi lingkungan baik di dalam maupun di luar tempat kerja dan 
                    membatasi perusakan dan pengarus/gangguan kepada masyarakat maupun miliknya, sebagai akibat polusi, kebisingan dan kerusakan 
                    lain yang disebabkan kegiatan PIHAK KEDUA</li>
                <li>Melaksanakan pekerjaan sesuai dengan kontrak pekerjaan beserta lampiran-lampirannya</li>
                <li>Bertanggung jawab penuh dan melepaskan segala bentuk resiko hukum pemberi kerja/owner/PIHAK PERTAMA, apabila 
                    dalam masa pelaksanaan pekerjaan dan setelah selesai pelaksanaan pekerjaan terjadi permasalahan hukum 
                    (contoh : temuan audit internal maupun eksternal, dan lain-lain) seandainya PIHAK KEDUA tidak melaksanakan pekerjaan 
                    sesuai Kontrak beserta Lampiran-lampirannya</li>
            </ol>
        </ol>
        <li>Cacat Mutu</li>
        <ol>
            <li>PIHAK Pertama berhak memeriksa pekerjaan PIHAK KEDUA dan memberitahu PIHAK KEDUA apabila terdapat cacat mutu dalam pekerjaan. 
                PIHAK PERTAMA dapat memerintahkan PIHAK KEDUA untuk menguji hasil pekerjaan yang dianggap terdapat cacat mutu</li>
            <li>Apabila PIHAK PERTAMA memerintahkan PIHAK KEDUA untuk melaksanakan pengujian dan ternyata pengujian memperlihatkan adanya cacat mutu, 
                maka biaya pengujian dan perbaikan menjadi tanggung jawab PIHAK KEDUA. </li>
            <li>Setiap kali pemberitahuan cacat mutu, PIHAK KEDUA harus segera memperbaiki dalam waktu sesuai yang tercantum dalam pemberitahuan PIHAK PERTAMA</li>
            <li>Cacat mutu harus diperbaiki sebelum penyerahan pertama pekerjaan dan selama masa pemeliharaan. Penyerahan pertama pekerjaan dan masa pemeliharaan 
            dapat diperpanjang sampai cacat mutu selesai diperbaiki</li>
            <li>PIHAK KEDUA dengan jaminan pabrikan dari produsen pabrikan (jika ada) berkewajiban untuk menjamin bahwa selama penggunaan secara wajar, 
                Barang tidak mengandung cacat mutu yang disebabkan oleh tindakan atau kelalaian PIHAK KEDUA, atau cacat mutu akibat desain, bahan, dan cara kerja. </li>
            <li>Jika PIHAK KEDUA tidak memperbaiki atau mengganti Barang akibat cacat mutu dalam jangka waktu yang ditentukan maka Perusahaan akan
                menghitung biaya perbaikan yang diperlukan, dan Perusahaan secara langsung atau melalui pihak ketiga yang ditunjuk oleh Perusahaan akan 
                melakukan perbaikan tersebut. PIHAK KEDUA berkewajiban untuk membayar biaya perbaikan atau penggantian tersebut sesuai dengan klaim yang 
                diajukan secara tertulis oleh Perusahaan. Biaya tersebut dapat dipotong oleh PIHAK PERTAMA dari nilai tagihan atau jaminan pelaksanaan PIHAK KEDUA. </li>
            <li>Terlepas dari kewajiban penggantian biaya, Perusahaan dapat memasukkan PIHAK KEDUA yang lalai memperbaiki cacat mutu ke dalam daftar hitam</li>
        </ol>
        <li>Pengawas Pelaksanaan Pekerjaan </li>
        <ol>
            <li>Selama berlangsungnya pelaksanaan pekerjaan, PIHAK PERTAMA jika dipandang perlu dapat mengangkat Pengawas Pekerjaan 
                yang berkewajiban untuk mengawasi pelaksanaan pekerjaan</li>
            <li>Dalam melaksanakan kewajibannya, Pengawas Pekerjaan selalu bertindak untuk kepentingan PIHAK PERTAMA</li>
        </ol>
        <li>Jangka Waktu Penyelesaian Pekerjaan </li>
        <ol>
            <li>PIHAK KEDUA berkewajiban menyelesaikan pekerjaan selambat-lambatnya pada tanggal penyelesaian yang ditetapkan dalam Kontrak. </li>
            <li>Jika pekerjaan tidak selesai pada tanggal penyelesaian bukan akibat Keadaan Kahar melainkan karena kesalahan atau kelalaian PIHAK KEDUA maka PIHAK KEDUA dikenakan denda. </li>
            <li>Tanggal Penyelesaian yang dimaksud dalam Kontrak ini adalah tanggal penyelesaian semua pekerjaan. </li>
        </ol>
        <li>Keterlambatan Pelaksanaan Pekerjaan</li>
        <ol>
            <li>Apabila PIHAK KEDUA terlambat melaksanakan pekerjaan sesuai jadwal maka PIHAK PERTAMA dapat membuat peringatan secara tertulis atau dikenakan klausul Perjanjian kritis.</li>
            <li>Apabila keterlambatan pelaksanaan pekerjaan disebabkan oleh PIHAK PERTAMA, maka PIHAK KEDUA berhak atas perpanjangan waktu pelaksanaan pekerjaan</li>
            <li>Apabila keterlambatan pelaksanaan pekerjaan terjadi karena keadaan kahar, maka PIHAK KEDUA tidak dikenakan peringatan</li>
        </ol>
        <li>Perjanjian Kritis</li>
        <ol>
            <li>Perjanjian dinyatakan kritis apabila :</li>
            <ol type="a" style="text-align: justify; ">
                <li>Dalam periode I (rencana fisik pelaksanaan 0% - 70% dari Perjanjian), realisasi fisik pelaksanaan terlambat lebih besar 10% dari rencana</li>
                <li>Dalam periode II (rencana fisik pelaksanaan 70% - 100% dari Perjanjian, realisasi fisik pelaksanaan terlambat lebih besar 5% dari rencana)</li>
                <li>Rencana fisik pelaksanaan 70% - 100% dari Perjanjian, realisasi fisik pelaksanaan terlambat lebih besar 5% dari rencana</li>
            </ol>
            <li>Penanganan perjanjian kritis dilaksanakan sebagai berikut :</li>
            <span>Dalam hal terjadi keterlambatan sebagaimana tersebut pada ketentuan 18 penanganan Perjanjian kirits dilaksanakan dengan ketentuan sebagai berikut :</span>
            <ol type="a" style="text-align: justify; ">
                <li>Rapat Pembuktian (Show Cause Meeting/SCM)</li>
                <li>Pada saat Perjanjian dinyatakan kritis, PIHAK PERTAMA menerbitkan surat peringatan kepada PIHAK KEDUA dan selanjutnya menyelenggarakan SCM</li>
                <li>Dalam SCM, PIHAK PERTAMA dan PIHAK PEDUA membahas dan menyepakati besaran kemajuan fisik yang harus dicapai oleh PIHAK KEDUA dalam periode waktu 
                    tertentu (uji coba pertama) yang dituangkan dalam berita acara </li>
                <li>Apabila PIHAK KEDUA gagal pada uji coba pertama, maka harus diselenggarakan SCM Tahap II yang membahas dan menyepakati besaran kemajuan fisik yang 
                    harus dicapai oleh PIHAK KEDUA dalam periode waktu tertentu (uji coba kedua) yang dituangkan dalam berita acara</li>
                <li>Apabila PIHAK KEDUA gagal pada uji coba kedua, maka harus diselenggarakan SCM Tahap III yang membahas dan menyepakati besaran kemajuan fisik 
                    yang harus dicapai oleh PIHAK KEDUA dalam periode waktu tertentu (uji coba ketiga) yang dituangkan dalam berita acara</li>
                <li>Pada setiap uji coba yang gagal, PIHAK PERTAMA harus menerbitkan surat peringatan kepada PIHAK KEDUA atas keterlambatan realisasi 
                    fisik pelaksanaan pekerjaan</li>
                <li>Apabila pada uji coba ketiga masih gagal, PIHAK PERTAMA dapat menyelesaikan pekerjaan melalui kesepakatan tiga pihak atau memutuskan Perjanjian secara 
                    sepihak dengan mengesampingkan pasal 1266 Kitab Undang-Undang Hukum Perdata</li>
                <li>Kesepakatan tiga pihak</li>
                <ol>
                    <li>PIHAK KEDUA masih bertanggung jawab atas seluruh pekerjaan sesuai ketentuan kontrak</li>
                    <li>PIHAK PERTAMA menetapkan pihak ketiga sebagai penyedia jasa yang akan menyelesaikan sisa pekerjaan atau atas usulan PIHAK KEDUA</li>
                    <li>Pihak ketiga melaksanakan pekerjaan dengan menggunakan harga satuan sebagaimana tersebut dalam lampiran Kontrak. Dalam hal pihak ketiga 
                        mengusulkan harga satuan yang lebih tinggi dari harga satuan yang tersebut dalam lampiran Kontrak, maka selisih harga menjadi tanggung jawab PIHAK KEDUA</li>
                    <li>Pembayaran kepada pihak ketiga dapat dilakukan secara langsung</li>
                    <li>Kesepakatan tiga pihak dituangkan dalam berita acara dan menjadi dasar pembuatan Addendum Kontrak</li>
                </ol>
            </ol>
        </ol>
        <li>Serah Terima Pekerjaan</li>
        <ol>
            <li>Setelah pekerjaan selesai 100% (seratus persen), PIHAK KEDUA menyerahkan hasil pekerjaan kepada PIHAK PERTAMA dan pelaksanaan penyerahan pekerjaan dituangkan 
                di dalam Berita Acara Serah Terima Pertama (BAST-I).</li>
            <li>Serah terima pekerjaan dilakukan di lokasi serah terima sebagaimana ditetapkan dalam Kontrak.</li>
            <li>Direksi Pekerjaan melakukan penilaian terhadap hasil pekerjaan yang telah diselesaikan oleh PIHAK KEDUA. Apabila terdapat kekurangan-kekurangan dan/atau 
                cacat hasil pekerjaan, PIHAK PERTAMA menyampaikan kepada PIHAK KEDUA untuk memperbaiki/menyelesaikannya</li>
            <li>Jika Pekerjaan dianggap tidak memenuhi persyaratan Kontrak maka PIHAK PERTAMA berhak untuk menolak Pekerjaan tersebut.</li>
            <li>PIHAK PERTAMA menerima penyerahan pekerjaan untuk kedua kalinya setelah seluruh hasil pekerjaan dilaksanakan sesuai dengan ketentuan Kontrak dan diterima 
                oleh Direksi Pekerjaan yang dituangkan dalam Berita Acara Serah terima Kedua.</li>
        </ol>
        <li>Perubahan Kontrak</li>
        <ol>
            <li>Untuk kepentingan perubahan Kontrak, PIHAK PERTAMA dapat membentuk Tim/ Pejabat Peneliti Pelaksanaan Kontrak atas usul Unit Teknis.</li>
            <li>Perubahan Kontrak dapat dilaksanakan apabila disetujui oleh Para Pihak dengan ketentuan sebagai berikut : </li>
            <ol type="a" style="text-align: justify; "> 
                <li>Perubahan pekerjaan disebabkan oleh sesuatu hal sehingga dianggap perlu mengubah lingkup pekerjaan dalam Kontrak.</li>
                <li>Perubahan Jangka Waktu Kontrak akibat adanya perubahan pekerjaan.</li>
                <li>Perubahan harga Nilai Kontrak akibat adanya perubahan pekerjaan, perubahan pelaksanaan pekerjaan dan/atau penyesuaian harga.</li>
            </ol>
            <li>Perubahan yang menyangkut lingkup pekerjaan, metode kerja dan metode pembayaran serta Jangka Waktu Kontrak cukup dibuatkan berita acara perubahan yang ditandatangani oleh PIHAK PERTAMA dengan PIHAK KEDUA.</li>
            <li>Perubahan yang menyangkut Nilai Kontrak dibuatkan addendum.</li>
            <li>Untuk penambahan lingkup pekerjaan baru, maka negosiasi harga dilaksanakan antara PIHAK KEDUA dengan Unit Pengadaan dan Logistik dan Unit Teknis.</li>
        </ol>
        <li>Penangguhan Pembayaran</li>
        <ol>
            <li>Apabila PIHAK KEDUA tidak melakukan kewajiban sesuai ketentuan dalam Kontrak dan Lampiran-Lampirannya, maka dikenakan sanksi penangguhan pembayaran setelah PIHAK PERTAMA 
                memberitahukan penangguhan pembayaran tersebut secara tertulis</li>
            <li>Pemberitahuan penangguhan pembayaran memuat rincian keterlambatan disertaialasan -alasan yang jelas dan keharusan PIHAK KEDUA untuk memperbaiki dan menyelesaikan pekerjaan dalam 
                jangka waktu sesuai yang tercantum dalam surat pemberitahuan penangguhan pembayaran</li>
        </ol>
        <li>Perubahan Jangka Waktu Kontrak</li>
        <ol>
            <li>Perpanjangan Jangka Waktu Kontrakdapat diberikan oleh PIHAK PERTAMA atas  pertimbangan yang layak dan wajar untuk hal - hal sebagai berikut :</li>
            <ol type="a" style="text-align: justify; ">
                <li>perubahan pekerjaan tertentu/Contract Chance Order (CCO);</li>
                <li>masalah yang timbul di luar kendali PIHAK KEDUA; dan/atau</li>
                <li>Keadaan Tidak Terduga (Unforesseen Condition).</li>
            </ol>
            <li>PIHAK PERTAMA dapat menugaskan Unit Pengawasan Pekerjaan untuk meneliti kelayakan usulan Perubahan Jangka Waktu Kontrak.</li>
            <li>PIHAK PERTAMA dapat menyetujui Perubahan Jangka Waktu Kontraksetelah melakukan penelitian terhadap usulan tertulis yang diajukan oleh PIHAK KEDUA.</li>
            <li>Persetujuan Perubahan Jangka Waktu Kontrak pekerjaan dituangkan dalam berita acara yang ditandatangani oleh Para Pihak.</li>            
        </ol>
        <li>Denda </li>
        <ol>
            <li>Apabila seluruh pekerjaan tidak dapat diserahkan dan/atau tidak dapat diselesaikan pada waktu yang telah ditetapkan, 
                maka PIHAK KEDUA bersedia untuk dikenai denda keterlambatan sebesar 1 ‰ (satu permil)/hari dari Nilai Kontrak. 
                Para Pihak sepakat bahwa denda keterlambatan maksimal atas penyelesaian pekerjaan adalah sebesar 5% (lima persen) dari Nilai Kontrak. </li>
            <li>Apabila denda keterlambatan telah mencapai jumlah denda keterlambatan maksimal dan pelaksanaan pekerjaan melampaui 
                Jangka Waktu Kontrak sebagaimana diatur dalam Kontrak maka :</li>
                <ol type="a" style="text-align: justify; ">
                    <li>PIHAK KEDUA bersedia dikenakan denda bunga sebesar 2% (dua persen)/bulan dari jumlah denda keterlambatan maksimal 
                        terhitung sejak tanggal keterlambatan sampai dengan tanggal penyerahan seluruh pekerjaan.</li>
                    <li>PIHAK PERTAMA dapat membatalkan Kontrak secara sepihak dengan memperhatikan ketentuan Pengakhiran/Pemutusan Kontrak 
                        dan atas pengakhiran/pemutusan kontrak tersebut PIHAK KEDUA tidak berhak menuntut ganti rugi dalam bentuk apapun kepada PIHAK PERTAMA.</li>
                </ol>
        </ol>
        <li>Sanksi</li>
        <span>PIHAK KEDUA dapat dikenakan sanksi berupa Pengakhiran/Pemutusan Kontrak dan masuk kedalam daftar hitam selama 2 (dua) tahun, 
            apabila terjadi hal-hal sebagai berikut:</span>
            <ol>
                <li>Cidera janji, lalai dan/atau tidak memenuhi kewajiban dan tanggungjawabnya sebagaimana diatur di dalam Kontrak ini;</li>
                <li>Terbukti melakukan Korupsi, Kolusi, Nepotisme (KKN) dan/atau penipuan;</li>
                <li>Terbukti memalsukan dokumen atau memberikan data yang tidak benar dalam proses pelelangan atau dalam pelaksanaan Kontrak ini;</li>
                <li>Nyata - nyata telah mengalihkan tanggung jawab seluruhpekerjaan atau Pekerjaan Utama dengan mensubkontrakkan kepada Pihak Ketiga/Pihak 
                    Lain tanpa izin tertulis dari PIHAK PERTAMA.</li>
                <li>Denda keterlambatan pelaksanaan pekerjaan akibat kelalaian PIHAK KEDUA sudah melampaui 5% (lima persen) dari Nilai Kontrak ini.</li>
            </ol>
        <li>Pengakhiran/Pemutusan Kontrak</li>
        <ol>
            <li>PIHAK PERTAMA berhak mengakhiri memutuskan Kontrak ini apabila :</li>
            <ol type="a" style="text-align: justify; ">
                <li>PIHAK KEDUA cidera janji, lalai dan/atau tidak memenuhikewajiban - kewajibannya seperti yang diatur dalam Kontrak ini,
                    maka PIHAK PERTAMA akan mengakhiri/memutuskan Kontrak ini dengan ketentuan sebagai berikut:</li>
                    <ol >
                        <li>PIHAK PERTAMA terlebih dahulu akan memberikan peringatan tertulis sebanyak 3 (tiga) kali dengan selang waktu antara 
                        peringatan pertama dan kedua dan antara peringatan kedua dengan peringatan ketiga masing - masing adalah 10 (sepuluh) hari 
                        kalender untuk segera memenuhi kewajiban - kewajibannya. </li>
                        <li>Apabila dalam waktu 14 (empat belas) hari kalender terhitung dari tanggal diterimanya surat peringatan terakhir 
                            ternyata PIHAK KEDUA masih tidak melaksanakan kewajibannya, maka PIHAK PERTAMA dapat membatalkan Kontrak ini secara sepihak, 
                            namun tidak menghilangkan kewajiban - kewajiban yang harus dilaksanakan oleh PIHAK KEDUA, dalam hal demikian Para 
                            Pihak sepakat secara tegas untuk mengenyampingkan ketentuan - ketentuan dalam Pasal 1266 dan Pasal 1267 Kitab Undang - 
                            Undang Hukum Perdata.</li>
                    </ol>
                <li>PIHAK KEDUA berada dalam Keadaan Pailit.</li>
                <li>Apabila PIHAK KEDUA nyata-nyata telah menyerahkan atau mensubkontrakkan seluruh pekerjaan kepada Pihak Ketiga/Pihak 
                    Lain tanpa persetujuan atau izin tertulis. </li>
                <li>Dengan berakhirnya Kontrak secara sepihak, maka Jaminan Pelaksanaan akan menjadi hak  PIHAK PERTAMA</li>
            </ol>
            <li>Pengakhiran/Pemutusan Kontrak ini juga dapat dilakukan apabila terjadi hal - hal diluar kekuasaan Para Pihak (Keadaan Kahar/force majeure) 
                dalam melaksanakan kewajiban yang ditentukan dalam Kontrak ini yang disebabkan oleh Keadaan Kahar. Sedangkan apabila keadaan/kejadian 
                tersebut menyebabkan pekerjaan tidak dapat diserahkan tepat pada waktu, maka PIHAK PERTAMA akan memperhitungkan kembali waktu penyerahannya.</li>
        </ol>
        <li>Tanggung Jawab PIHAK KEDUA</li>
        <span>Dalam melaksanakan pekerjaan ini, tanggung jawab PIHAK KEDUA meliputi : </span>
        <ol>
            <li>Ketelitian/kebenaran, kerapihan hasil pekerjaan yang dilakukan oleh PIHAK KEDUA sesuai dengan peraturan dan persyaratan serta 
                petunjuk - petunjuk PIHAK PERTAMA.  </li>
            <li>Kelancaran pelaksanaan pekerjaan. </li>
            <li>Semua kerugian Pihak Lain/Pihak Ketiga yang diakibatkan oleh kesalahan PIHAK KEDUA menjadi tanggung jawab PIHAK KEDUA sepenuhnya.</li>
            <li>Kesehatan, kesejahteraan dan keselamatan kerja para pekerjanya selama pelaksanaan pekerjaan.</li>
            <li>Keamanan peralatan yang dipakai selama pelaksanaan pekerjaan.</li>
            <li>Keamanan, keselamatan, penerangan dan kebersihan di tempat pelaksanaan pekerjaan.</li>
        </ol>
        <li>Risiko Kenaikan Upah dan/atau Harga Bahan</li>
        <span>Risiko kenaikan upah dan/atau harga bahan selama pelaksanaan pekerjaan menjadi beban dan tanggung jawab PIHAK KEDUA sepenuhnya. 
            Dengan demikian PIHAK KEDUA tidak berhak mengajukan klaim apabila selama pelaksanaan pekerjaan terjadi kenaikan upah dan/atau harga 
            bahan (harga borongan merupakan harga pasti/fixed). Kenaikan upah dan/atau harga bahan tidak boleh mengurangi mutu hasil pekerjaan.</span>
        <li>Penyelesaian Perselisihan</li>
        <ol>
            <li>Para Pihak berkewajiban untuk berupaya sungguh - sungguh menyelesaikan secara damai semua perselisihan yang timbul atau 
                berhubungan dengan Kontrak ini atau interpretasinya selama atau setelah pelaksanaan pekerjaan ini.</li>
            <li>Setiap perselisihan/persoalan yang timbul sehubungan dengan Kontrak ini untuk pertama sekali akan diselesaikan oleh Para
                    Pihak secara musyawarah untuk mufakat atau tanpa mediator. </li>
            <li>Apabila perselisihan sebagaimana dimaksud dalam poin 30.2 tidak dapat diselesaikan secara musyawarah, mediasi, 
            konsiliasi maka untuk selanjutnya Para Pihak sepakat menyelesaikan perselisihan tersebut dengan menunjuk Pengadilan Negeri Jakarta Pusat.</li>
        </ol>
        <li>Keadaan Tidak Terduga (Unforeseen Condition)</li>
        <ol>
            <li>Yang dimaksud keadaan tidak terduga adalah suatu keadaan yang muncul akibat suatu kondisi yang tidak terduga, namun berdasarkan upaya 
                Para Pihak dan/atau salah satu pihak yang terkena keadaan tidak terduga tersebut kondisinya masih bisa diatasi. </li>
            <li>Pemenuhan kewajiban Para Pihak dalam Kontrak akibat Keadaan Tidak Terduga, dapat dipenuhi berdasarkan kesepakatan Para Pihak.</li>
            <li>Dalam hal PIHAK KEDUA menemui suatu keadaan tidak terduga atas kondisi fisik yang tidak terduga, PIHAK KEDUA wajib menyampaikan 
                pemberitahuan secara tertulis kepada PIHAK PERTAMA sesegera mungkin dan selanjutnya akan dilakukan justifikasi teknis oleh pihak 
                independen yang ditunjuk oleh PIHAK PERTAMA.</li>
        </ol>
        <li>Keadaan Kahar (Force Majeur)</li>
        <ol>
            <li>Keadaan Kahar adalah suatu keadaan yang terjadi diluar kehendak Para Pihak dan tidak dapat diperkirakan sebelumnya sehingga 
                kewajiban yang ditentukan dalam Kontrak menjadi tidak dapat dipenuhi.</li>
            <li>Yang dimaksud dengan Keadaan Kahar dalam Kontrak ini adalah bencana alam yaitu banjir, kebakaran, gempa bumi, badai dan 
                bencana non alam, bencana sosial, sabotase, kerusuhan, pemberontakan, pemogokan, embargo, blokade, Peraturan - Peraturan 
                Pemerintah yang berkaitan langsung dengan pelaksanaan Kontrak, huru - hara politik, perang, epidemi, tindakan pemerintah 
                dibidang moneter, bencana alam yang berakibat langsung terhadap pelaksanaan pekerjaan dan segala hal yang diluar kuasa manusia 
                yang kesemuanya bukan kesalahan/kelalaian PIHAK KEDUA yang dapat dibenarkan oleh PIHAK PERTAMA.</li>
            <li>Apabila terjadi Keadaan Kahar, maka PIHAK KEDUA memberitahukan kepada PIHAK PERTAMA paling lambat 7 (tujuh) hari kerja sejak 
                terjadinya Keadaan Kahar dengan menyertakan pernyataan Keadaan Kahar dari pejabat yang berwenang.</li>
            <li>Jangka waktu yang ditetapkan dalam Kontrak untuk pemenuhan kewajiban pihak yang tertimpa Keadaan Kahar harus diperpanjang 
                sekurang - kurangnya sama dengan jangka waktu terhentinya Kontrak akibat Keadaan Kahar.</li>
            <li>Pada saat terjadinya Keadaan Kahar, Kontrak ini akan dihentikan sementara hingga Keadaan Kahar berakhir, dengan ketentuan 
                PIHAK KEDUA berhak untuk menerima pembayaran sesuai dengan prestasi atau kemajuan pelaksanaan pekerjaan yang telah dicapai. 
                Jika selama masa Keadaan Kahar PIHAK PERTAMA memerintahkan secara tertulis kepada PIHAK KEDUA untuk meneruskan pekerjaan sedapat 
                mungkin maka PIHAK KEDUA berhak untuk menerima pembayaran sebagaimana ditentukan dalam Kontrak dan mendapat penggantian biaya 
                yang wajar sesuai dengan yang telah dikeluarkan untuk bekerja dalam situasi demikian. Penggantian biaya ini harus diatur dalam suatu addendum.</li>
        </ol>
        <li>Pemeriksaan Bersama</li>
        <ol>
            <li>Apabila diperlukan, pada tahap awal pelaksanaan Kontrak, Direksi Pekerjaan bersama-sama dengan PIHAK KEDUA melakukan pemeriksaan 
                kondisi lapangan pada waktu yang telah disepakati oleh Para Pihak setelah penandatangan kontrak.</li>
            <li>Untuk pemeriksaan bersama ini, Direksi Pekerjaan dapat membentuk Pejabat Peneliti Pelaksanaan Kontrak atas usul PIHAK PERTAMA.</li>
            <li>Hasil pemeriksaan bersama dituangkan dalam Berita Acara.</li>
        </ol>
        <li>Pengemasan/Pengepakan</li>
        <ol>
            <li>PIHAK KEDUA berkewajiban atas tanggungannya sendiri untuk mengepak Barang sedemikian rupa sehingga Barang terhindar dan terlindungi 
                dari resiko kerusakan atau kehilangan selama masa transportasi atau pada saat pengiriman dari tempat asal Barang sampai ke lokasi pekerjaan.</li>
            <li>PIHAK KEDUA harus melakukan pengepakan, penandaan dan penyertaan dokumen identitas Barang di dalam dan di luar paket Barang sebagaimana ditetapkan dalam SSKK.</li>
        </ol>
        <li>Transportasi dan Pengiriman Barang</li>
        <ol>
            <li>PIHAK KEDUA bertanggung jawab atas biaya sendiri dalam hal dibutuhkannya transportasi pengangkutan Barang (termasuk pemuatan dan penyimpanan) hingga sampai pada lokasi pekerjaan.</li>
            <li>Transportasi Barang harus diteruskan sampai di lokasi serah terima.</li>
            <li>Semua biaya transportasi (termasuk pemuatan dan penyimpanan) telah termasuk di dalam Nilai Kontrak.</li>
            <li>PIHAK KEDUA wajib untuk menyelesaikan pengiriman barang sesuai dengan jadwal pengiriman, dokumen rincian pengiriman dan dokumen terkait lainnya.</li>
        </ol>
        <li>Pemeriksaan dan Pengujian</li>
        <ol>
            <li>Direksi Pekerjaan berhak untuk melakukan pemeriksaan dan pengujian atas Barang untuk memastikan kecocokannya dengan spesifikasi dan persyaratan yang telah ditentukan dalam kontrak.</li>
            <li>Pemeriksaan dan pengujian dapat dilakukan sendiri oleh PIHAK KEDUA dan disaksikan oleh Direksi Pekerjaan atau diwakilkan kepada pihak ketiga</li>
            <li>Pemeriksaan dan Pengujian dilaksanakan sebagaimana diatur dalam SSKK.</li>
            <li>Biaya pemeriksaan dan pengujian ditanggung oleh PIHAK KEDUA.</li>
            <li>Pemeriksaan dan pengujian dilakukan di tempat yang ditentukan dalam SSKK, dan dihadiri oleh Direksi Pekerjaan.</li>
        </ol>
        <li>Uji Coba</li>
        <ol>
            <li>Setelah barang terinstalasi barang diuji-coba oleh PIHAK KEDUA disaksikan oleh Direksi Pekerjaan;</li>
            <li>Hasil uji coba dituangkan dalam berita acara;</li>
            <li>Apabila pengoperasian barang tersebut memerlukan keahlian khusus maka harus dilakukan site training oleh PIHAK KEDUA, biaya site training termasuk dalam nilai Kontrak;</li>
            <li>Apabila hasil uji coba tidak sesuai dengan spesifikasi yang ditentukan dalam Kontrak, maka PIHAK KEDUA memperbaiki atau mengganti barang tersebut dengan biaya sepenuhnya ditanggung PIHAK KEDUA.</li>
        </ol>
        <li>Pedoman Pengoperasian dan Perawatan </li>
        <ol>
            <li>PIHAK KEDUA diwajibkan memberikan petunjuk kepada Perusahaan/Pejabat Yang Berwenang tentang pedoman pengoperasian dan perawatan dalam jangka waktu sebagaimana ditetapkan dalam Persyaratan Teknis.</li>
            <li>Pedoman pengoperasian dan perawatan harus diserahkan selambat – lambatnya pada saat BAST I (Berita Acara Serah Terima Pertama) pekerjaan ditandatangani oleh Para Pihak.</li>
        </ol>
        <li>Jaminan Pelaksanaan</li>
        <ol>
            <li>PIHAK KEDUA wajib menyerahkan Jaminan Pelaksanaan sebesar 5% dari Nilai Kontrak atau senilai Rp 18.232.860- 
                (delapan belas juta dua ratus tiga puluh dua ribu delapan ratus enam puluh rupiah) dalam bentuk Bank Garansi yang 
                dikeluarkan oleh Bank Nasional atau Uang Tunai atau Asuransi dari Asuransi Nasional yang dibuktikan dengan Tanda Terima 
                Jaminan Pelaksanaan dan memiliki jangka waktu jaminan pelaksanaan selama 30 (tiga puluh) hari kalender.</li>
            <li>Masa berlaku Jaminan Pelaksanaan adalah ditambah minimal 1 (satu) bulan lebih lama dari Jangka Waktu berakhirnya Kontrak</li>
            <li>Dalam hal terjadi Perubahan/Addendum atas Jangka Waktu maupun nilai kontrak, maka PIHAK KEDUA wajib menyesuaikan Jaminan 
                Pelaksanaan dengan ketentuan perubahan/Addendum yang terbaru</li>
            <li>Jaminan Pelaksanaan dapat menjadi milik PIHAK PERTAMA dan dapat dicairkan oleh PIHAK PERTAMA apabila :</li>
            <ol type="a" style="text-align: justify; ">
                <li>PIHAK KEDUA mengundurkan diri atau tidak sanggup untuk melaksanakan pekerjaan sebagaimana ditetapkan dalam Kontrak ini.</li>
                <li>Menyerahkan/memindahtangankan seluruh  pelaksanaan pekerjaan yang ditetapkan dalam Kontrak ini kepada pihak lain tanpa persetujuan 
                    tertulis dari PIHAK PERTAMA.</li>
                <li>PIHAK KEDUA melakukan kesengajaan, kesalahan atau kelalaian dalam melaksanakanKontrak ini yang dapat menyebabkan kerugian PIHAK PERTAMA.</li>
                <li>Terjadi pemutusan Kontrak sebagaimana dimaksud Pasal 27 pada syarat – syarat umum Kontrak ini.</li>
            </ol>
        </ol>
        <li>Itikad Baik</li>
        <ol>
            <li>Para Pihak bertindak berdasarkan asas saling percaya yang disesuaikan dengan hak-hak yang terdapat dalam Kontrak.</li>
            <li>Para Pihak sepakat untuk melaksanakan Kontrak dengan jujur tanpa menitikberatkan kepentingan masing-masing pihak. </li>
            <li>Apabila selama Jangka Waktu Kontrak, salah satu pihak merasa dirugikan, maka diupayakan tindakan yang terbaik untuk mengatasi keadaan tersebut.</li>
        </ol>
        <li>Lain-lain</li>
        <span>PIHAK KEDUA dalam pekerjaan ini memiliki kewajiban untuk membayarkan biaya dokumen kontrak sebesar Rp 2.000.000,- (dua juta rupiah) ke rekening BNI nomor 03333-55569 atas nama {{ $pref->nama_perusahaan }}.</span>
    </ol>
    <div class="page-break"></div>
    <h4 style="text-align: center;"><strong>SYARAT - SYARAT KHUSUS KONTRAK (SSKK)</strong></h4> 
    {{-- <h4></h4> --}}
    <ol type="I" style="text-align: justify; ">
        <li>Ruang Lingkup Pekerjaan</li>
        <ol>
            <li>Pekerjaan  Pengadaan dan Pemasangan battery UPS PIER dan AOCC di Bandar Udara Internasional I Gusti Ngurah Rai Bali, terdiri dari :</li>
            <table class="table">
                <thead>
                    <tr>
                        <th>Deksripsi</th>
                        <th>Satuan</th>
                        <th>Qty</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <li>Seluruh pekerjaan sebagaimana telah sesuai dengan Bill of Quantity (BoQ) dan disetujui oleh Unit Spesifikasi Teknis terkait.</li>
            <li>Pekerjaan ini berlokasi di   di Bandar Udara Internasional I Gusti Ngurah Rai Bali.</li>
            <li>Seluruh pekerjaan sebagaimana dimaksud harus dilaksanakan sesuai dengan spesifikasi teknis dan persyaratan lainnya dalam Rencana 
                Kerja dan Syarat (RKS), dan/atau Kerangka Acuan Kerja (KAK), dan/atau dokumen lainnya yang disepakati para pihak dan merupakan 
                bagian yang tidak terpisahkan dari kontrak ini.</li>
            <li>PIHAK KEDUA menjamin tidak ada pengurangan kualitas dari spesifikasi teknis yang telah disepakati PARA PIHAK sehingga bila 
                terjadi kerusakan sebagai akibat kelalaian dari pengurangan spesifikasi teknis maka akan menjadi tanggung jawab PIHAK KEDUA. </li>
        </ol>
        <li>Jenis Kontrak</li>
        <ol>
            <li>Jenis kontrak dalam perjanjian ini adalah menggunakan Kontrak Harga Satuan;</li>
            <li>Kontrak Harga Satuan adalah kontrak atas penyelesaian pekerjaan dalam batas waktu tertentu berdasarkan harga satuan yang 
                pasti atau berupa formula harga yang pasti untuk setiap satuan barang dan/atau jasa, peralatan atau unsur pekerjaan dengan 
                spesifikasi teknis tertentu yang volume barang dan/atau jasa masih bersifat perkiraan sementara sedangkan pembayarannya didasarkan 
                pada hasil pengukuran bersama atas volume barang dan/atau jasa yang benar-benar telah dilaksanakan oleh PIHAK KEDUA.</li>
            <li>Pembayaran dilakukan pada jumlah jasa atau pekerjaan yang telah diserahterimakan atau oleh PIHAK KEDUA dan diterima oleh PIHAK PERTAMA.</li>
        </ol>
        <li>Nilai Kontrak</li>
        <span>Biaya untuk Pekerjaan Pengadaan dan Pemasangan battery UPS PIER dan AOCC di Bandar Udara Internasional I Gusti Ngurah Rai Bali 
            telah disepakati para pihak sebesar Rp 364.657.200,- (tiga ratus enam puluh juta enam ratus lima puluh tujuh ribu dua ratus rupiah). 
            Harga sebagaimana dimaksud sudah termasuk PPN 11% (sebelas persen), pajak-pajak dan biaya-biaya lain yang mungkin timbul sebagai akibat 
            pada pekerjaan dimaksud.</span>
        <li>Cara Pembayaran</li>
        <span>PARA PIHAK sepakat bahwa tata cara pembayaran atas biaya pekerjaan sebagaimana dimaksud adalah sebagai berikut:</span>
        <ol>
            <li>Pembayaran Tahap I sebesar 80% (delapan persen) x Rp 364.657.200,- = Rp 291.725.760,- (dua ratus sembilan puluh satu juta tujuh 
                ratus dua puluh lima ribu tujuh ratus enam puluh rupiah) yang dibayarkan setelah Material On Site 100% yang dituangkan kedalam Berita 
                Acara Pemeriksaan Pekerjaan (BAPP) dan Berita Acara Serah Terima Material on Site (BAMOS) yang ditandatangani oleh Para Pihak atau 
                Pihak yang ditunjuk oleh Para Pihak disertai dengan dokumen pendukung Berita Acara tersebut.</li>
            <li>Pembayaran Tahap II sebesar 20% (dua puluh persen) x Rp 364.657.200,- = Rp 72.931.440,- (tujuh puluh dua juta sembilan ratus 
                tiga puluh satu ribu empat ratus empat puluh rupiah) yang dibayarkan setelah Instalasi Selesai yang dituangkan kedalam Berita Acara 
                Pemeriksaan Pekerjaan (BAPP) dan Berita Acara Serah Terima (BAST) yang ditandatangani oleh Para Pihak atau Pihak yang ditunjuk oleh 
                Para Pihak disertai dengan dokumen pendukung Berita Acara tersebut.</li>
        </ol>
        <li>Jangka Waktu Pelaksanaan Kontrak</li>
        <ol>
            <li>Jangka Waktu pelaksanaan pekerjaan ini adalah 7 (tujuh) hari kalender terhitung sejak tanggal 15 Juni 2023 sampai dengan 21 Juni 2023.</li>
            <li>PIHAK PERTAMA berhak menolak pada saat diserah terimakan pekerjaan dari PIHAK KEDUA bilamana pekerjaan yang diserahkan tersebut 
                tidak sesuai dengan ketentuan mengenai spesifikasi teknis pelaksanaan pekerjaan dan/atau dokumen acuan pelaksanaan pekerjaan yang dimuat 
                dalam Kontrak ini dan PIHAK KEDUA berkewajiban memperbaiki/melengkapi kekurangannya yang disesuaikan dengan persyaratan yang tertuang 
                dalam dokumen pengadaan dan/atau dokumen acuan pelaksanaan pekerjaan yang dimuat dalam Kontrak ini beserta seluruh lampiran – lampirannya, 
                dengan beban dan biaya ditanggung oleh PIHAK KEDUA.</li>
        </ol>
        <li>Jaminan Bebas Cacat Mutu/Garansi</li>
        <ol>
            <li>PIHAK KEDUA dengan jaminan pabrikan dari produsen pabrikan (jika ada) berkewajiban untuk menjamin bahwa selama penggunaan secara wajar, 
                barang tidak mengandung cacat mutu yang disebabkan oleh Tindakan atau kelalaian PIHAK KEDUA, atau cacat mutu akibat desain, bahan, dan cara kerja;</li>
            <li>Masa tanggung jawab jaminan bebas cacat mutu/garansi ini berlaku sampai dengan 3 (tiga) tahun kompresor dan 1 (satu) tahun terhitung sejak tanggal 
                serah terima barang;</li>
            <li>PIHAK PERTAMA akan menyampaikan pemberitahuan cacat mutu kepada PIHAK KEDUA segera setelah ditemukan cacat mutu tersebut selama masa layanan purnajual;</li>
            <li>Terhadap cacat mutu, PIHAK KEDUA berkewajiban untuk memperbaiki atau mengganti barang dalam jangka waktu yang ditetapkan dalam pemberitahuan tersebut;</li>
            <li>Jika PIHAK KEDUA tidak memperbaiki atau mengganti barang akibat cacat mutu dalam jangka waktu yang ditentukan maka PIHAK PERTAMA akan melaksanakan
                 pebaikan tersebut. PIHAK KEDUA berkewajiban untuk membayar biaya perbaikan atau penggantian tersebut sesuai dengan klaim yang diajukan secara tertulis
                  oleh PIHAK PERTAMA. Biaya tersebut dapat dipotong oleh PIHAK PERTAMA dari nilai tagihan atau jaminan pelaksanaan PIHAK KEDUA;</li>
            <li>Terlepas dari kewajiban penggantian biaya, PIHAK PERTAMA dapat memasukkan PIHAK KEDUA yang lalai memperbaiki cacat mutu kedalam daftar hitam.</li>
        </ol>
        <li>Korespondensi</li>
        <span>	Semua pemberitahuan, permohonan atau persetujuan berdasarkan Kontrak ini dibuat secara tertulis dalam Bahasa Indonesia, dan dianggap telah
             diberitahukan jika telah disampaikan secara langsung kepada Wakil Sah Para Pihak atau disampaikan melalui Surat menyurat dan/atau faksimile 
             yang ditujukan ke alamat Para Pihak sebagai berikut:</span>
             <ol>
                <li>PIHAK PERTAMA</li>
                <table class="table" style="line-height: 1">                
                    <tbody>
                        <tr>
                            <td scope="row">Nama</td>
                            <td>:</td>
                            <td>{{ $pref->nama_perusahaan }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Alamat</td>
                            <td>:</td>
                            <td>{{ $pref->address }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Telp</td>
                            <td>:</td>
                            <td>{{ $pref->phone }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Faksimile</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">Website</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">Email</td>
                            <td>:</td>
                            <td>{{ $pref->email }}</td>
                        </tr>
                    </tbody>
                </table>
                <li>PIHAK KEDUA</li>
                <table class="table" style="line-height: 1">                
                    <tbody>
                        <tr>
                            <td scope="row">Nama</td>
                            <td>:</td>
                            <td> {{ $rekappos->vendor->namaperusahaan }}, {{ $rekappos->vendor->badanusaha->kode }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Alamat</td>
                            <td>:</td>
                            <td> {{ $rekappos->vendor->alamat }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Telp</td>
                            <td>:</td>
                            <td>{{ $rekappos->notelp }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Faksimile</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">Website</td>
                            <td>:</td>
                            <td>, {{ $rekappos->website }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Email</td>
                            <td>:</td>
                            <td>{{ $rekappos->email }}</td>
                        </tr>
                    </tbody>
                </table>
             </ol>
        <li>Wakil Sah Para Pihak</li>
        <span>Wakil Sah Para Pihak dalam kontrak ini adalah sebagai berikut :</span>
        <ol type="1">
            <li>PIHAK PERTAMA   : Direktur Utama {{ $pref->nama_perusahaan }}</li>
            <li>PIHAK KEDUA     : Direktur Utama  {{ $rekappos->vendor->namaperusahaan }}, {{ $rekappos->vendor->badanusaha->kode }}</li>
        </ol>
        <li>Lokasi Serah Terima</li>
        <span>Serah Terima dilakukan di Bandar Udara Internasional I Gusti Ngurah Rai Bali</span>
    </ol>
    {{-- <script src="{{ asset('assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script> --}}
    {{-- <script src="{{ asset('assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>    --}}
    <!--end::Global Theme Bundle -->
    </div>
        </div>

</body>

</html>
