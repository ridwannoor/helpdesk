@extends('back.layouts.app')

@section('header-script')

@endsection

{{-- @section('m-subheader')
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">
                {{ $judul . " "  .  Auth::user('vendor')->namaperusahaan . ". " . Auth::user('vendor')->badanusaha->kode }}
            </h3>
        </div>

    </div>
</div>
@endsection --}}

@section('m-content')

<div class="m-content">
    <div class="row">      
        <div class="col-lg-12">
            @include('component.alertnotification')
            <div class="m-section__content">
                
                <div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
                   
                    <div class="m-demo__preview m-demo__preview--badge">
                        <h5 class="m-portlet__head-text">Kategori</h5>
                        <hr>
                       {{-- @foreach ($jenispekerjaans as $item) --}}
                       {{-- @php
                           $tenders1 = $item->tenders->where('is_published', '==', 1);
                       @endphp --}}
                            <span class="m-badge m-badge--default m-badge--wide p-3"><a href="#"><strong>Jasa Konstruksi</strong></a></span>
                            <span class="m-badge m-badge--default m-badge--wide p-3"><a href="#"><strong>Jasa Konsultan Konstruksi</strong></a></span>
                            <span class="m-badge m-badge--default m-badge--wide p-3"><a href="#"><strong>Pengadaan Barang/ Material Konstruksi</strong></a></span>
                            <span class="m-badge m-badge--default m-badge--wide p-3"><a href="#"><strong>Jasa Konsultan Lainnya</strong></a></span>
                            <span class="m-badge m-badge--default m-badge--wide p-3"><a href="#"><strong>Jasa Lainnya</strong></a></span>
                       {{-- @endforeach --}}
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-12">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                {{ $judul }}
                            </h3>
                        </div>
                    </div>
                    
                </div>
                <div class="m-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1_wrapper">
                        <thead>
                            <tr style="background: rgb(205, 148, 234)" >
                                <th>No</th>
                                <th>Tanggal Paket</th>
                                <th>Nama Paket Pekerjaan</th>
                                <th>Lokasi Pekerjaan</th>
                                {{-- <th>Status</th> --}}
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        @php
                            $no = 1 ;
                        @endphp
                        <tbody>
                            @foreach ($tenders as $tds)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td> 
                                        <div class="m-stack m-stack--ver m-stack--tablet m-stack--demo p-2">
                                            <div class="m-stack__item m-stack__item--center m-stack__item--top text-center"><h4><strong>{{ date('d', strtotime($tds->tgl_paket))  }}</strong></h4> </div>
                                            <div class="m-stack__item m-stack__item--center m-stack__item--bottom m--bg-brand text-center"><h6 class="m--font-light">{{ date('M Y', strtotime($tds->tgl_paket))  }}</h6> </div>
                                        </div>
                                       </td>
                                    <td><a href="/vendor/tender/show/{{ $tds->id }}"><strong>{{ $tds->nomor_pr }}</strong></a> <br> {{ $tds->nama_paket }}</td>
                                    <td>{{ $tds->lokasi_pekerjaan }}</td>
                                    {{-- <td  style="width: 200px">
                                        @if ($tds->is_published == 0)
                                        <span class="m-badge m-badge--warning m-badge--wide">draft</span>
                                        @else
                                        <span class="m-badge m-badge--success m-badge--wide">publish</span>
                                        @endif
                                    </td> --}}
                                    {{-- <td style="width: 150px">      
                                        <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-left m-dropdown--align-push" m-dropdown-toggle="click" aria-expanded="true">
                                            <a href="#" class="m-portlet__nav-link m-dropdown__toggle btn m-btn m-btn--link m-btn--hover-brand m-btn--pill">
                                                <i class="la la-ellipsis-v"></i>
                                            </a>
                                            <div class="m-dropdown__wrapper">
                                                    <span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust"></span>
                                                    <div class="m-dropdown__inner">
                                                        <div class="m-dropdown__body">              
                                                            <div class="m-dropdown__content">
                                                                <ul class="m-nav">      
                                                                    @if ($tds->registrasi == '1')
                                                                        <li class="m-nav__item">
                                                                            <a href="/vendor/tender/penawaran/{{ $tds->id }}" class="m-nav__link">
                                                                                <i class="m-nav__link-icon flaticon-notepad"></i>                                                                            
                                                                                    <span class="m-nav__link-text">Masukkan Penawaran</span>  
                                                                            </a>
                                                                        </li>
                                                                    @else  
                                                                        <li class="m-nav__item">
                                                                            <a href="#" class="m-nav__link">
                                                                                <i class="m-nav__link-icon flaticon-notepad"></i>                                                                            
                                                                                    <span class="m-nav__link-text">Pendaftaran Tender</span>  
                                                                            </a>
                                                                        </li>                                                                        
                                                                    @endif                                                     
                                                                  
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
        
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection


@section('footer-script')
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}"
    type="text/javascript"></script>
@endsection
