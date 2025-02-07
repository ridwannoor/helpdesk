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
                <a href="/bakesepakatan" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
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

                                            {{-- </a>				  --}}
                                            {{-- <a href="#">
                                                <img  src="assets/app/media/img/logos/logo_client_color.png">
                                            </a> --}}
                                        </div>


                                    </div>
                                </div>
                                @php
                                    $no = 1;
                                @endphp
                                <div class="m-invoice__body m-invoice__body--centered ">
                                    <p>Kami yang bertanda tangan dibawah ini:</p>
                                    <ol type="I">
                                        <li>
                                            Nama : {{ $ba->bod->name }}  <br>
                                            Jabatan : {{ $ba->bod->jabatan . " - " . $pref->nama_perusahaan}} <br>
                                            Dalam hal ini bertindak untuk dan atas nama {{ $pref->nama_perusahaan }} untuk selanjutnya disebut sebagai PIHAK PERTAMA.
                                        </li>
                                        <li>

                                            @foreach ($ba->banegopengadaan->vendor->vendorpengurus as $item)
                                                @if ($item->ttd == 1)
                                                Nama : {{ $item->nama  }}  <br>
                                                Jabatan : {{ $item->jabatan . " - " . $ba->banegopengadaan->vendor->namaperusahaan . ", " . $ba->banegopengadaan->vendor->badanusaha->kode }} <br>
                                                Dalam hal ini bertindak untuk dan atas nama {{ $ba->banegopengadaan->vendor->namaperusahaan . ", " . $ba->banegopengadaan->vendor->badanusaha->kode }} untuk selanjutnya disebut sebagai PIHAK KEDUA.
                                                @endif
                                            @endforeach
                                        </li>
                                    </ol>
                                    <p>PIHAK PERTAMA dan PIHAK KEDUA untuk selanjutnya secara bersama-sama disebut sebagai PARA PIHAK.</p>
                                    <p>PARA PIHAK masing-masing bertindak dalam kedudukannya sebagaimana tersebut di atas, terlebih dahulu menerangkan hal-hal sebagai berikut:</p>
                                    <ol type="I">
                                        {{-- <li>Bahwa pada {{ $ba->banegopengadaan->tgl_sph }} telah disampaikan Surat Permintaan Penawaran Harga nomor:  {{ $ba->banegopengadaan->spph }}  yang disampaikan oleh PIHAK PERTAMA kepada PIHAK KEDUA.</li>     --}}
                                        <li>Bahwa pada tanggal {{ date('d-m-Y' , strtotime($ba->banegopengadaan->tgl_sph ))  }} telah diterima Surat Penawaran Harga nomor : {{ $ba->banegopengadaan->spph }} yang dibuat oleh PIHAK KEDUA.</li>
                                        <li>Bahwa pada tanggal  {{ date('d-m-Y' , strtotime($ba->banegopengadaan->tanggal )) }} telah dibuat Berita Acara Klarifikasi & Negosiasi nomor {{ $ba->banegopengadaan->nomor_ba }} yang disetujui oleh perwakilan PARA PIHAK</li>
                                        <li>Bahwa pada tanggal {{ date('d-m-Y' , strtotime($ba->banegopengadaan->tgl_sph_nego ))  }} telah diterima Surat Penawaran Harga Setelah Negosiasi nomor : {{ $ba->banegopengadaan->spph_nego }} yang dibuat oleh PIHAK KEDUA.</li>
                                    </ol>
                                    <p>Sehubungan dengan hal-hal tersebut di atas, PARA PIHAK sepakat untuk bekerjasama  dengan ketentuan sebagai berikut: </p>
                                    <ol type="I">
                                        <li>PIHAK KEDUA bersedia untuk melaksanakan Pekerjaan Perbaikan Jalan Akses Bandara Pada Pekerjaan
                                            Design & Build Revitalisasi dan Beautifikasi Terminal Internasional, Domestik, GAT & Fasilitas
                                            Penunjang di Bandara Internasional I Gusti Ngurah Rai - Bali, dengan ruang lingkup sesuai Bill of Quantity (BoQ)
                                            dengan Kerangka Acuan Kerja (KAK) serta syarat-syarat teknis lainnya yang telah disetujui oleh Unit Spesifikasi
                                            Teknis (UST) terkait (terlampir). </li>
                                        <li>PARA PIHAK sepakat bahwa Jangka waktu pelaksanaan pekerjaan adalah dari 73 (tujuh puluh tiga) hari kalender.
                                            Dan Jangka waktu pemeliharaan pekerjaan adalah selama 290 (dua ratus sembilan puluh) hari kalender.</li>
                                        <li>PARA PIHAK sepakat bahwa biaya pekerjaan adalah Rp 4.430.366.074,-
                                            (empat miliar empat ratus tiga puluh juta tiga ratus enam puluh enam ribu tujuh puluh empat rupiah),
                                            termasuk pajak- pajak yang berlaku.</li>
                                        <li>PARA PIHAK sepakat bahwa tata cara pembayaran atas biaya pekerjaan diatur dengan ketentuan sebagai berikut :
                                               <ol type="I">
                                            @foreach ($ba->banegopengadaan->bapengadaan->badetailpengadaans as $item)

                                                <li> {{ $item->termin }}  </li>

                                             @endforeach
                                            </ol>
                                        </li>
                                        <li>Selanjutnya PIHAK KEDUA membayarkan jaminan pelaksanaan sebesar 5% (lima persen) dari nilai pekerjaan dapat
                                            berupa Bank Garansi, Asuransi atau pun Tunai, dengan jangka waktu Jaminan Pelaksanaan selama jangka waktu
                                            pelaksanaan ditambah 30 hari kalender dan membayarkan biaya dokumen kontrak sebesar Rp 7.000.000,- (tujuh juta rupiah)
                                            ke rekening BNI nomor : 03333-55569 a/n PT. a. Jaminan pelaksanaan dan biaya dokumen kontrak ini
                                            selambat-lambatnya diserahkan 7 hari kalender setelah Berita Acara Kesepakatan ini diterbitkan.</li>
                                        <li>Dengan diterbitkannya Berita Acara Kesepakatan ini, maka kami harap agar pelaksana pekerjaan dapat menghubungi Divisi
                                            Construction selaku Unit Spesifikasi Teknis (UST) untuk dapat melakukan koordinasi persiapan pekerjaan.</li>
                                    </ol>
                                    <p>Demikian Berita Acara Kesepakatan ini dibuat, untuk dapat digunakan sebagaimana seharusnya.</p>
                                    <p style="text-align: center">Jakarta, 20 Mei 2022</p>
                                    <p></p>
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
                                                        @foreach ($ba->bakesepakatanfile as $item)
                                                            <div class="m-widget4__item">
                                                                <div class="m-widget4__info">
                                                                        <a href="{{ url('data_file/pdf/'.$item->filepdf) }}" target="_blank"><span class="m-widget4__text">  {{ $item->filepdf   }}</span></a>
                                                              </div>
                                                                <div class="m-widget4__ext" >
                                                                    <a href="/bakesepakatan/destroyfile/{{$item->id}}" class="m-widget4__icon delete-confirm">
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