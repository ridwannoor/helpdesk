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
        <div>
            <div class="align-right">
                <a href="/baadendum" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                    <i class="la la-plus m--hide"></i>
                    <i class="la la-undo"> Back</i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('m-content')
    <div class="m-content">
        <div class="row">
            <div class="col-lg-12">
                @include('component.alertnotification')
                {{-- @if ($message = Session::get('alert'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    </button>
                    <strong>Alert!</strong> {{ $message }}.
                </div>
                @endif --}}
                <!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__body m-portlet__body--no-padding">
                        <div class="m-invoice-2">
                            <div class="m-invoice__wrapper">
                                <div class="m-invoice__head" style="background-image: url(assets/app/media/img/logos/bg-6.html);">
                                    <div class="m-invoice__container m-invoice__container--centered">
                                        <div class="m-invoice__logo">
                                            {{-- <a href="#"> --}}
                                                <h5 style="text-align: center">{{ $ba->banegopengadaan->bapengadaan->judul_pekerjaan }}</h5>
                                            {{-- </a>				  --}}
                                            {{-- <a href="#">
                                                <img  src="assets/app/media/img/logos/logo_client_color.png">
                                            </a> --}}
                                        </div>

                                        <div class="m-invoice__items">
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">NO.BA Nego </span>
                                                <span class="m-invoice__text">{{ "No. BA." . $ba->nomor_ba }}</span>
                                            </div>
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Tanggal</span>
                                                <span class="m-invoice__text">{{ date('d-m-Y ', strtotime($ba->tanggal)) }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @php
                                    $no = 1;
                                @endphp
                                <div class="m-invoice__body m-invoice__body--centered ">
                                    <p>
                                        Pada hari ini, {{ hariIndo(date('l', strtotime($ba->tanggal))) }} tanggal  {{ terbilang(date('d', strtotime($ba->tanggal))) }} bulan {{ bulanIndo(date('F', strtotime($ba->tanggal))) }} tahun
                                        {{ terbilang(date('Y', strtotime($ba->tanggal))) }} ({{ date("d-m-Y", strtotime($ba->tanggal)) }})
                                        {{ $ba->lokasi_nego }}, telah diadakan Rapat Negosiasi Harga terhadap Dokumen Penawaran Harga untuk pekerjaan tersebut di atas yang dihadiri oleh:
                                    </p>
                                   <p>
                                    {{-- <br> --}}
                                        <span>I. PT a</span> <br>
                                        @foreach ($ba->divisis as $item)
                                                <span><strong>{{"- " . $item->detail }}</strong> </span><br>
                                        @endforeach
                                    <br>
                                        <span>II. Pihak Calon Mitra Jasa Konstruksi </span> <br>
                                        <span><strong>{{ $ba->vendor->namaperusahaan . ", " . $ba->vendor->badanusaha->kode }}</strong> </span>
                                    </p>

                                     <p> Dihasilkan kesepakatan sebagai berikut:</p>

                                     <ol>
                                        <li style="margin-top: 14px">Rencana Anggaran Pelaksanaan (RAP) yang diterima yaitu sebesar {{ "Rp " . format_uang($ba->bapengadaan->nilai_rap)  }}-
                                            ({{ terbilang($ba->bapengadaan->nilai_rap) . " rupiah" }}) harga termasuk pajak.</li>
                                        <li style="margin-top: 14px">Penawaran harga sebelum negosiasi: <br>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                         <td>Nama Perusahaan</td>
                                                         <td>{{ $ba->vendor->namaperusahaan }}, {{ $ba->vendor->badanusaha->kode }}</td>
                                                    </tr>
                                                    <tr>
                                                         <td>NPWP</td>
                                                         <td>{{ $ba->vendor->npwp }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>No SPPH</td>
                                                        <td>{{ $ba->spph }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah Penawaran</td>
                                                        <td>{{ "Rp ". format_uang($ba->jml_penawaran)  }}
                                                            ({{ terbilang($ba->jml_penawaran) . " rupiah" }}) </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </li>
                                        <li style="margin-top: 14px">Penawaran harga sesudah negosiasi:</li>
                                        <li style="margin-top: 14px">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                         <td>Nama Perusahaan</td>
                                                         <td>{{ $ba->vendor->namaperusahaan }}, {{ $ba->vendor->badanusaha->kode }}</td>
                                                    </tr>
                                                    <tr>
                                                         <td>NPWP</td>
                                                         <td>{{ $ba->vendor->npwp }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>No SPPH</td>
                                                        <td>{{ $ba->spph_nego }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah Penawaran</td>
                                                        <td>{{ "Rp ". format_uang($ba->jml_nego)  }}
                                                            ({{ terbilang($ba->jml_nego) . " rupiah" }}) </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </li>
                                        <li style="margin-top: 14px"> Jangka waktu pelaksanaan : sejak ditandatangani kontrak sampai dengan {{ date('d-m-Y' , strtotime($ba->bapengadaan->end_date)) }} </li>
                                        <li style="margin-top: 14px">Jangka Waktu Pemeliharaan : {{ $ba->bapengadaan->jangka_pemeliharaan . " (" . terbilang($ba->bapengadaan->jangka_pemeliharaan) . " )" }}  hari kalender </li>
                                        <li style="margin-top: 14px">Cara Pembayaran : <br>
                                            <table class="table">
                                                {{-- <thead>
                                                    <tr>
                                                        <th>Cara Pembayaran</th>
                                                    </tr>
                                                </thead>  --}}
                                                <tbody>
                                                    @foreach ($ba->bapengadaan->badetailpengadaans as $item)
                                                        <tr>
                                                            <td>{{ $item->termin }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </li>
                                        <li style="margin-top: 14px">Calon Mitra Jasa Konstruksi selanjutnya akan mengirimkan Surat Penawaran Harga setelah Negosiasi.</li>
                                        <li style="margin-top: 14px">Ruang lingkup Pekerjaan telah sesuai dengan BoQ dan Kerangka Acuan Kerja (KAK) / RKS yang disetujui oleh Unit Spesifikasi Teknis Terkait.(terlampir) </li>
                                        <li style="margin-top: 14px">Berita Acara Klarifikasi dan Negosiasi Harga ini merupakan satu kesatuan dan menjadi bagian yang tidak terpisahkan dari Kontrak serta mempunyai kekuatan hukum yang mengikat Para Pihak.</p>
                                           </li>
                                    </ol>
                                    <p>Demikian Berita Acara ini dibuat dengan sebenar-benarnya untuk dipergunakan sebagaimana mestinya.</p>
                                </div>
                                <div class="m-invoice__footer">
                                    <div class="m-invoice__table  m-invoice__table--centered table-responsive">
                                        <table class="table table-striped- table-bordered table-hover table-checkabl">
                                            <thead>
                                                <th style="background: rgba(89, 199, 39, 0.842)">
                                                    File Upload
                                                </th>
                                            </thead>
                                            <tbody>
                                                <td>
                                                    <div class="m-widget4">
                                                        @foreach ($ba->baadendumfile as $item)
                                                            <div class="m-widget4__item">
                                                                <div class="m-widget4__info">
                                                                        <a href="{{ url('data_file/pdf/'.$item->filepdf) }}" target="_blank"><span class="m-widget4__text">  {{ $item->filepdf   }}</span></a>
                                                              </div>
                                                                <div class="m-widget4__ext" >
                                                                    <a href="/baadendum/destroyfile/{{$item->id}}" class="m-widget4__icon delete-confirm">
                                                                        <i class="la la-close"></i>

                                                                    </a>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                    </div>
                                                </td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!--end::Portlet-->
        </div>
    </div>

@endsection


@section('footer-script')
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
@endsection