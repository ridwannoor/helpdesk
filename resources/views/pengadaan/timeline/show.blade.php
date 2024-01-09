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
                <a href="/timeline" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
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
                                <div class="m-invoice__body text-left">
                                    <table class="table table-striped table-inverse ">
                                        <thead>
                                            <tr>
                                                <th colspan="5">
                                                    @if ($times->rpp_1)
                                                    Time Line Tender (Metode 2 Sampul)
                                                    @else    
                                                    Time Line Tender (Metode 1 Sampul)
                                                    @endif                          
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>No</th>
                                                <th>Dokumen</th>
                                                <th>Tanggal</th>
                                                <th>Checklist</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>Pengumuman Tender</td>
                                                <td>{{date('d-m-Y', strtotime($times->tender->tgl_paket))  }} </td>
                                                <td>
                                                    <input type="checkbox" name="" id="" checked>
                                                </td>
                                                <td>  {{ $times->tender->nama_paket }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>Pendaftaran Peserta</td>
                                                <td>{{date('d-m-Y', strtotime($times->tender->tgl_tutup))  }} </td>
                                                <td><input type="checkbox" name="" id="" checked></td>
                                                <td>
                                                    @foreach ($times->tender->tenderpenawaran as $item)
                                                        {{-- @foreach ($item->vendor as $v) --}}
                                                            {{-- @foreach ($v as $c) --}}
                                                            {{ " - " . $item->namaperusahaan . ", " . $item->badanusaha->kode }} <br>
                                                            {{-- @endforeach                                  --}}
                                                        {{-- @endforeach --}}
                                                    @endforeach
                                                </td>
                                                {{-- <td>  {{ $times->tender->nama_paket }}</td> --}}
                                            </tr>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>Undangan Aanwijzing </td>
                                                {{-- <td>:</td> --}}
                                                <td>{{date('d-m-Y', strtotime($times->undangan_aanwizing)) }}</td>
                                                <td><input type="checkbox" name="" id="" checked></td>
                                                <td>{{ $times->ket_undangan }}</td>
                                            </tr>
                                           
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>Rapat Penjelasan Pekerjaan (Aanwijzing)</td>
                                                {{-- <td>:</td> --}}
                                                <td>{{date('d-m-Y', strtotime( $times->rapat_pekerjaan))}}</td>
                                                <td><input type="checkbox" name="" id="" checked></td>
                                                <td>{{ $times->ket_rapat }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>Dokumen Pengadaan (SBD)</td>
                                                {{-- <td>:</td> --}}
                                                <td>{{date('d-m-Y', strtotime( $times->sbd))}}</td>
                                                <td><input type="checkbox" name="" id="" checked></td>
                                                <td>{{ $times->ket_sbd }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>Surat Penawaran Harga</td>
                                                {{-- <td>:</td> --}}
                                                <td>{{date('d-m-Y', strtotime( $times->sph))}}</td>
                                                <td><input type="checkbox" name="" id="" checked></td>
                                                <td>{{ $times->ket_sph }}</td>
                                            </tr>
                                            @if ($times->rpp_1 )
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>Rapat Pembukaan Penawaran Tahap 1</td>
                                                    {{-- <td>:</td> --}}
                                                    <td>{{date('d-m-Y', strtotime( $times->rpp)) }}</td>
                                                    <td><input type="checkbox" name="" id="" checked></td>
                                                    <td>{{ $times->ket_rpp }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>Pengumuman Hasil Evaluasi Tahap 1 & Undangan Pembukaan Penawaran Tahap 2</td>
                                                    {{-- <td>:</td> --}}
                                                    <td>{{date('d-m-Y', strtotime( $times->pengumuman))}}</td>
                                                    <td><input type="checkbox" name="" id="" checked></td>
                                                    <td>{{ $times->ket_pengum }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>Rapat Pembukaan Penawaran Tahap 2</td>
                                                    {{-- <td>:</td> --}}
                                                    <td>{{ date('d-m-Y', strtotime($times->rpp_1 )) }}</td>
                                                    <td><input type="checkbox" name="" id="" checked></td>
                                                    <td>{{ $times->ket_rpp1 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>Pengumuman Hasil Evaluasi Tahap 2 & Undangan Negosiasi Harga</td>
                                                    {{-- <td>:</td> --}}
                                                    <td>{{date('d-m-Y', strtotime($times->pengumuman_1)) }}</td>
                                                    <td><input type="checkbox" name="" id="" checked></td>
                                                    <td>{{ $times->ket_pengum1 }}</td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>Rapat Pembukaan Penawaran</td>
                                                    {{-- <td>:</td> --}}
                                                    <td>{{date('d-m-Y', strtotime( $times->rpp)) }}</td>
                                                    <td><input type="checkbox" name="" id="" checked></td>
                                                    <td>{{ $times->ket_rpp }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>Pengumuman Hasil Evaluasi & Undangan Negosiasi Harga</td>
                                                    {{-- <td>:</td> --}}
                                                    <td>{{date('d-m-Y', strtotime( $times->pengumuman))}}</td>
                                                    <td><input type="checkbox" name="" id="" checked></td>
                                                    <td>{{ $times->ket_pengum }}</td>
                                                </tr>
                                            @endif
                                       
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>Rapat Klarifikasi & Negosiasi Harga</td>
                                                {{-- <td>:</td> --}}
                                                <td>{{date('d-m-Y', strtotime( $times->klarif_nego)) }}</td>
                                                <td><input type="checkbox" name="" id="" checked></td>
                                                <td>{{ $times->ket_klarif }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>Surat Penawaran Harga Negosiasi</td>
                                                {{-- <td>:</td> --}}
                                                <td>{{date('d-m-Y', strtotime(  $times->sph_nego))}}</td>
                                                <td><input type="checkbox" name="" id="" checked></td>
                                                <td>{{ $times->ket_sphnego }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>Surat Penunjukan Pemenang</td>
                                                {{-- <td>:</td> --}}
                                                <td>{{date('d-m-Y', strtotime( $times->spp))}}</td>
                                                <td><input type="checkbox" name="" id="" checked></td>
                                                <td>{{ $times->ket_spp }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>Kontrak/SPK</td>
                                                {{-- <td>:</td> --}}
                                                <td>{{date('d-m-Y', strtotime( $times->kontrak))}}</td>
                                                <td><input type="checkbox" name="" id="" checked></td>
                                                <td>{{ $times->ket_kontrak }}</td>
                                            </tr>
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
    
    
@endsection


@section('footer-script')
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
@endsection