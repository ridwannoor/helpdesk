@extends('layouts.app2')

@section('m-subheader')
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">{{ $judul }}</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="#" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="#" class="m-nav__link">
                        <span class="m-nav__link-text">{{ $judul }}</span>
                    </a>
                </li>

            </ul>
        </div>

    </div>
</div>
@endsection

@section('m-content')
<div class="m-content">
    @include('component.alertnotification')

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        {{ $lok->nama_pek }}
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        {{-- @if ($crud->create > 0) --}}
                        {{-- <a href="/banego/cetak/{{ $lok->id }}" target="_blank"
                            class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                            <span>
                                <i class="fa flaticon-technology"></i>
                                <span>Print</span>
                            </span>
                        </a> --}}
                        {{-- @endif                         --}}
                    </li>
                    <li class="m-portlet__nav-item"></li>

                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            {{-- <div class="form-group m-form__group m--margin-top-10"> --}}
            {{-- <div class="alert m-alert m-alert--default" role="alert"> --}}
            {{-- <div class="row">  --}}
            <div class="m-section__content">
                <div class="m-demo__preview">

                    <div class="m-stack__item m-stack__item--center m-stack__item--middle">
                        <div class="m-stack m-stack--ver m-stack--general">
                            {{-- <div class="m-stack__item m-stack__item--center m-stack__item--top">
                                    Item
                                </div> --}}
                            <div class="m-stack__item m-stack__item--left m-stack__item--middle">
                                <p>
                                    <table class="table table-striped- table-bordered table-hover table-checkabl">
                                        <tbody>
                                            <th>Nama Pekerjaan :</th>
                                            <th>{{ $lok->nama_pek }}</th>
                                        </tbody>
                                        <tbody>
                                            <th>No Berita Acara : </th>
                                            <th>{{ $lok->no_ba }}</th>
                                        </tbody>
                                        <tbody>
                                            <th>Nilai RAP : </th>
                                            <th>{{ $lok->nilai_rap }}</th>
                                        </tbody>
                                        <tbody>
                                            <th>Tanggal : </th>
                                            <th>{{ $lok->tanggal }}</th>
                                        </tbody>

                                    </table>
                                </p>
                                <p style="text-align: justify">Pada hari {{ hariIndo(date('l', strtotime($lok->tanggal))) }}, tanggal
                                      {{ terbilang(date('d', strtotime($lok->tanggal))) }} bulan {{ bulanIndo(date('F', strtotime($lok->tanggal))) }} tahun 
                                    {{ terbilang(date('Y', strtotime($lok->tanggal))) }}
                                    {{-- {{ tanggal_indonesia(date(substr($lok->tanggal, 1)))  }}  --}}
                                    {{-- {{ tanggal_indonesia($lok->tanggal, 1) }} --}}
                                    
                                    {{-- {{ terbilang(date("Y", strtotime($lok->tanggal)))  }} --}}
                                    ({{ date("d-m-Y", strtotime($lok->tanggal)) }}) 
                                    {{ $lok->lokasi_nego }},
                                    telah diadakan Rapat Klarifikasi dan Negosiasi Harga terhadap Dokumen Penawaran
                                    Harga untuk Pekerjaan tersebut diatas yang dihadiri oleh : </p>
                                <p><strong>I. PT Angkasa Pura Properti :</strong></p>
                                <p>
                                    <div class="container">
                                        <table class="table table-striped- table-bordered table-hover table-checkabl">
                                            @foreach ($lok->divisis as $item)
                                            <tbody>
                                                <td>{{ $item->detail }}</td>
                                                {{-- <th>{{  $lok->divisis->implode('detail' ,  ', ' ) }}</th> --}}
                                                {{-- <th>{{ $lok->vendor->namaperusahaan }}</th> --}}
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </p>
                                <p><strong>II. Pihak Mitra Pengadaan :</strong></p>
                                <p>
                                    <div class="container">{{ $lok->vendor->namaperusahaan }},
                                        {{ $lok->vendor->badanusaha->kode }}
                                    </div>
                                </p><br>
                                <p>
                                    @php
                                    $no = 1 ;
                                    @endphp
                                    <div class="container">
                                        <p>Dihasilkan kesepakatan harga & spesifikasi sebagai berikut :</p>

                                        <p>{{ $no++ }}. Penawaran Harga <strong>Sebelum Negosiasi :</strong></p>
                                        
                                            <table class="table table-striped- table-bordered table-hover table-checkable">
                                                <tbody>
                                                    <td>Nama Perusahaan : </td>
                                                    <td>{{ $lok->vendor->namaperusahaan }}, {{ $lok->vendor->badanusaha->kode }}</td>
                                                </tbody>
                                                <tbody>
                                                    <td>Npwp : </td>
                                                    <td>{{ $lok->vendor->npwp }}</td>
                                                </tbody>
                                                <tbody>
                                                    <td>Jumlah Penawaran :</td>
                                                    <td>{{ "Rp ". format_uang($lok->jml_penawaran)  }}
                                                        ({{ terbilang($lok->jml_penawaran) . " rupiah" }}) 
                                                       @if ($lok->pajak == "include")
                                                        termasuk pajak yang berlaku.
                                                       @else
                                                        tidak termasuk pajak.
                                                       @endif 
                                                    </td>
                                                </tbody>
                                                <tbody>
                                                    <td>Surat Penawaran Harga No : </td>
                                                    <td>{{ $lok->spph }}</td>
                                                </tbody>
                                            </table>
                                       
                                        <p>{{ $no++ }}. Penawaran Harga <strong>Setelah Negosiasi :</strong></p>

                                        <table class="table table-striped- table-bordered table-hover table-checkable">
                                            <tbody>
                                                <td>Nama Perusahaan :</td>
                                                <td>{{ $lok->vendor->namaperusahaan }}, {{ $lok->vendor->badanusaha->kode }}</td>
                                            </tbody>
                                            <tbody>
                                                <td>Npwp : </td>
                                                <td>{{ $lok->vendor->npwp }}</td>
                                            </tbody>
                                            <tbody>
                                                <td>Jumlah Penawaran :</td>
                                                <td>{{ "Rp ". format_uang($lok->jml_nego)  }}
                                                    ({{ terbilang($lok->jml_nego) . " rupiah" }}) 
                                                   @if ($lok->pajak == "include")
                                                    termasuk pajak yang berlaku.
                                                   @else
                                                    tidak termasuk pajak.
                                                   @endif 
                                                </td>
                                            </tbody>
                                            {{-- <tbody>
                                                <td>Surat Penawaran Nego No : </td>
                                                <td>{{ $lok->spph_nego }}</td>
                                            </tbody> --}}
                                        </table>

                                        <p>{{ $no++ }}. Jangka Waktu Pelaksanaan Pekerjaan :
                                            <strong>{{ date("d-m-Y", strtotime($lok->start_date)) . " - " . date("d-m-Y", strtotime($lok->end_date)) . " " .  $lok->waktu_pel . " hari kalender" }}</strong> </p>
                                            @foreach ($lok->dokpekerjaans as $item)
                                                @if ($item->kode == "PO")
                                                <p>{{ $no++ }}. Garansi / Product / Warranty / Pemeliharaan :
                                                    <strong>{{ $lok->garansi . " hari kalender"  }}</strong></p>
                                                    <p>{{ $no++ }}. Tempat Serah Terima Barang :
                                                        <strong>{{ $lok->tempat  }}</strong></p>
                                                        <p>{{ $no++ }}. Asuransi :
                                                            <strong>{{ $lok->asuransi  }}</strong></p>
                                                            <p>{{ $no++ }}. Masa Pemeliharaan :
                                                                <strong>{{ $lok->masapemeliharaan  }}</strong></p>
                                                    <p>{{ $no++ }}. Training dilakukan : <strong>{{ $lok->training  }}</strong></p>
                                                    
                                                @endif
                                            @endforeach
                                       {{-- @if ($lok->dokpekerjaans-> == "PO") --}}
                                            {{-- <p>{{ $no++ }}. Garansi / Product / Warranty / Pemeliharaan :
                                            <strong>{{ $lok->garansi . " hari kalender"  }}</strong></p>
                                            <p>{{ $no++ }}. Tempat Serah Terima Barang :
                                                <strong>{{ $lok->tempat  }}</strong></p>
                                            <p>{{ $no++ }}. Training dilakukan : <strong>{{ $lok->training  }}</strong></p> --}}
                                            
                                       {{-- @endif --}}
                                        <p>{{ $no++ }}. Tata Cara Pembayaran : <strong>{!! $lok->cara_pembayaran  !!}</strong>
                                        </p>
                                        <p>{{ $no++ }}. Pengiriman Barang/Material ke lokasi pekerjaan dilakukan oleh : <strong>{{ $lok->pengirim  }}</strong></p>
                                        <p>{{ $no++ }}. {{ $lok->vendor->namaperusahaan }}, {{ $lok->vendor->badanusaha->kode }} selanjutnya akan mengirimkan surat penawaran
                                            harga setelah
                                            negosiasi.</p>
                                        @if ($lok->catatan)
                                        <p>{{ $no++ }}. {!! $lok->catatan !!}</p>
                                            
                                        @endif
                                        <p>{{ $no++ }}. Ruang lingkup pekerjaan telah sesuai dengan BoQ dan
                                            Syarat-syarat teknis
                                            telah disetujui
                                            oleh kedua belah pihak (terlampir)</p>
                                        <p style="text-align: justify">
                                            @php
                                            $jam = $lok->jml_nego * 5/100 ;
                                            $dp =  $lok->jml_nego * $lok->nilaidp/100;
                                            @endphp
                                            {{-- @foreach ($lok->dokpekerjaans as $item) --}}
                                            {{-- @if ($lok->dokpekerjaans->implode('kode' ,  '/ ' ) == "Kontrak") --}}
                                            {{-- @if ($lok->jaminan == "include")
                                                
                                            @foreach ($lok->dokpekerjaans as $item)
                                                @if ($item->kode == "Kontrak" OR $item->kode == "SPK")

                                                {{ $no++ }}. Selanjutnya pihak KEDUA 
                                                @if ($lok->downpayment =="include")
                                                membayarkan jaminan DP {{ $lok->nilaidp ." %" }} sebesar {{ "Rp ". format_uang($dp) }} dapat berupa Bank Garansi, Asuransi, ataupun Tunai,
                                                @endif membayarkan jaminan pelaksanaan sebesar
                                                5% (lima
                                                persen) dari nilai pekerjaan atau senilai {{ "Rp ". format_uang($jam)  }}
                                                ({{ terbilang($jam) . "rupiah"}}). dapat berupa bank garansi,
                                                asuransi, atau pun tunai dengan jangka waktu jaminan pelaksanaan selama
                                                {{ $lok->waktu_pel }}
                                                ({{ terbilang($lok->waktu_pel) }}) hari kalender
                                                 
                                                @if ($lok->biaya_dok)
                                                dan membayarkan biaya dokument kontrak sebesar
                                                {{ "Rp ". format_uang($lok->biaya_dok)  }} ({{ terbilang($lok->biaya_dok) . "rupiah"}})
                                                @endif
                                                
                                                ke rekening BNI nomor : 03333-55569
                                                a/n PT. Angkasa Pura Properti.
                                                @endif 
                                            @endforeach
                                           
                                            @endif --}}

                                            {{-- @endif --}}
                                            {{-- @endforeach --}}
                                            {{-- @if ($lok->dokpekerjaans->kode == "kontrak")
                                            
                                            @endif --}}
                                        </p>
                                        <p>{{ $no++ }}. Jaminan : {{ $lok->jaminan->name ?? '' }}</p>
                                        <p>{{ $no++ }}. Biaya Dokumen : {{ $lok->bidok->name ?? '' }}</p>
                                        <p>
                                            Berita Acara Klarifikasi dan Negosiasi Harga ini merupakan satu kesatuan dan
                                            menjadi bagian yang tidak
                                            terpisahkan dari {{  $lok->dokpekerjaans->implode('kode' ,  '/ ' ) }} serta
                                            mempunyai kekuatan hukum yang
                                            megikat para pihak.
                                        </p>

                                        <p>Demikian Berita Acara ini dibuat dengan sebenar-benarnya untuk dipergunakan
                                            sebagaimana mestinya.</p>
                                    </div>
                                </p>
                                <br>
                                <p><strong>PT Angkasa Pura Properti</strong></p>
                                <p>
                                    <table class="table table-striped- table-bordered table-hover table-checkabl">
                                        @foreach ($lok->divisis as $item)
                                        <tbody>
                                            <td>{{ $item->detail }}</td>
                                        </tbody>
                                        @endforeach
                                        {{-- < --}}
                                    </table>
                                </p>
                                <p><strong>Pihak Mitra Pengadaan</strong></p>
                                <p>
                                    <table class="table table-striped- table-bordered table-hover table-checkabl">
                                        <tbody>
                                            <td>{{ $lok->vendor->namaperusahaan }}, {{ $lok->vendor->badanusaha->kode }}
                                            </td>
                                            {{-- <th>{{ $lok->vendor->namaperusahaan }}</th> --}}
                                        </tbody>
                                        {{-- < --}}
                                    </table>
                                </p>

                                {{-- <p><strong>Pihak Mitra Pengadaan</strong></p> --}}
                                <p>
                                    <table class="table table-striped- table-bordered table-hover table-checkabl">
                                        <thead>
                                            <th style="background: rgba(89, 199, 39, 0.842)">
                                                File Upload
                                            </th>
                                        </thead>
                                        <tbody>
                                            <td>
                                                <div class="m-widget4">
                                                    @foreach ($lok->bafiles as $item)
                                                        <div class="m-widget4__item">
                                                            <div class="m-widget4__info">
                                                                    <a href="{{ url('data_file/pdf/'.$item->filepdf) }}" target="_blank"><span class="m-widget4__text">  {{ $item->filepdf   }}</span></a>
                                                          </div>
                                                            <div class="m-widget4__ext" >
                                                                <a href="/banego/destroyfile/{{$item->id}}" class="m-widget4__icon delete-confirm">
                                                                    <i class="la la-close"></i>
                                                                    
                                                                </a>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                </div>
                                            </td>
                                        </tbody>
                                    </table>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{-- </div> --}}

            {{-- </div> --}}
            {{-- </div> --}}
            {{-- <div class="form-group m-form__group m--margin-top-10"> --}}
            {{-- <div class="row">
               
            </div> --}}
            {{-- </div> --}}
            <!--begin: Datatable -->

        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
</div>
@endsection

@section('footer-script')
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}"
    type="text/javascript"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Anda Sudah Yakin?',
        text: 'Data Ini Akan Dihapus Secara Permanen !',
        icon: 'warning',
        buttons: ["Tidak", "Iya !"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
</script>
@endsection