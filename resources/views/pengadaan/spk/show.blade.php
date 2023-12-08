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
                              
                                @php
                                    $no = 1;
                                @endphp
                                <div class="m-invoice__body m-invoice__body--centered ">
                                 <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td rowspan="4">SURAT PERINTAH KERJA</td>
                                            <td>Lokasi Pekerjaan</td>
                                            <td>:</td>
                                            <td>{{ $spk->bakesepakatan->banegopengadaan->bapengadaan->lokasi->kode }}</td>
                                        </tr>
                                        <tr>
                                            <td>Unit Kerja</td>
                                            <td>:</td>
                                            <td>{{ $spk->divisi->kode }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nomor</td>
                                            <td>:</td>
                                            <td>{{ $spk->nomor_spk }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                            <td>{{ date('d-m-Y' , strtotime($spk->tanggal))  }}</td>
                                        </tr>
                                        <tr>
                                            <td rowspan="10">PEKERJAAN</td>
                                            <td colspan="3" style="text-align: center">DASAR SURAT PERINTAH KERJA</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="text-align: center">BERITA ACARA PENJELASAN PEKERJAAN (aawizing)</td>
                                        </tr>
                                        <tr>
                                            <td>Nomor</td>
                                            <td>:</td>
                                            <td>{{ $spk->bakesepakatan->banegopengadaan->bapengadaan->nomor_ba }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                            <td>{{ date('d-m-Y' , strtotime($spk->bakesepakatan->banegopengadaan->bapengadaan->tanggal))  }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="text-align: center">BERITA ACARA KLARIFIKASI & NEGOSIASI</td>
                                        </tr>
                                        <tr>
                                            <td>Nomor</td>
                                            <td>:</td>
                                            <td>{{ $spk->bakesepakatan->banegopengadaan->nomor_ba }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                            <td>{{ date('d-m-Y' , strtotime($spk->bakesepakatan->banegopengadaan->tanggal))  }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="text-align: center">PARA PIHAK</td>
                                        </tr>
                                        <tr>
                                            <td>Pihak Pertama</td>
                                            <td>:</td>
                                            <td>{{ $pref->nama_perusahaan }}</td>
                                        </tr>
                                        <tr>
                                            <td>Pihak Kedua</td>
                                            <td>:</td>
                                            <td>{{ $spk->bakesepakatan->banegopengadaan->vendor->namaperusahaan . ", " . $spk->bakesepakatan->banegopengadaan->vendor->badanusaha->kode  }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: justify">
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
                                            <td colspan="4" style="text-align: center">RUANG LINGKUP</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: justify">PIHAK PERTAMA meminta PIHAK KEDUA untuk melaksanakan Pekerjaan {{ $spk->bakesepakatan->banegopengadaan->bapengadaan->judul_pekerjaan }} dengan ruang lingkup terlampir (BoQ, RKS dan Dokumen lainnya)</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: center">NILAI PEKERJAAN</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: justify">Biaya Pekerjaan sebagaimana tersebut dalam Surat Perintah Kerja ini telah disepakati oleh PARA PIHAK sebesar {{ "Rp " . format_uang($spk->bakesepakatan->banegopengadaan->jml_nego) }} termasuk pajak – pajak.</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: center">TATA CARA PEMBAYARAN</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: justify">
                                                <ol type="I">
                                                    @foreach ($spk->bakesepakatan->banegopengadaan->bapengadaan->badetailpengadaans as $item)   
                                    
                                                    <li style="margin-top:14px; text-align: justify">  {{ $item->termin }}   </li>    
                                                          
                                                    @endforeach
                                                 </ol>    
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: center">JANGKA WAKTU PELAKSANAAN</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: justify">
                                                Seluruh Pekerjaan yang tercantum dalam Surat Perintah Kerja ini harus diselesaikan 
                                                dan diserahkan dengan baik dan benar oleh PIHAK KEDUA kepada PIHAK PERTAMA selambat - lambatnya 
                                                dalam waktu {{ $spk->bakesepakatan->banegopengadaan->bapengadaan->jangka_pelaksanaan }} hari kalender, terhitung sejak {{ $spk->bakesepakatan->banegopengadaan->bapengadaan->jangkawaktu_pelaksanaan }} , 
                                                dengan masa garansi/masa pemeliharaan selama {{ $spk->bakesepakatan->banegopengadaan->bapengadaan->jangka_pemeliharaan }} hari kalender setelah Berita Acara Serah Terima Pertama (BAST) 
                                                Pekerjaan {{ $spk->bakesepakatan->banegopengadaan->bapengadaan->judul_pekerjaan }} disetujui dan ditandatangani oleh Para Pihak.    
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: center">DENDA DAN SANKSI</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: justify">
                                                Denda Keterlambatan <br> Apabila seluruh Pekerjaan tidak dapat diserahkan dan/atau tidak dapat 
                                                diselesaikan pada waktu yang telah ditetapkan, maka PIHAK KEDUA bersedia untuk dikenai denda 
                                                keterlambatan sebesar 1% (satu permil)/hari dari Nilai Pekerjaan diluar pajak-pajak dihitung 
                                                berdasarkan jangka waktu pelaksanaan, dan untuk denda keterlambatan maksimal atas penyelesaian 
                                                pekerjaan adalah 5% (lima persen) dari Nilai Pekerjaan diluar pajak - pajak.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: justify">
                                                Sanksi <br>
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
                                                        @foreach ($spk->spkfile as $item)
                                                            <div class="m-widget4__item">
                                                                <div class="m-widget4__info">
                                                                        <a href="{{ url('data_file/pdf/'.$item->filepdf) }}" target="_blank"><span class="m-widget4__text">  {{ $item->filepdf   }}</span></a>
                                                              </div>
                                                                <div class="m-widget4__ext" >
                                                                    <a href="/spk/destroyfile/{{$item->id}}" class="m-widget4__icon delete-confirm">
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