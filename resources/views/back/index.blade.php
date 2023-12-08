@extends('back.layouts.app')

@section('header-script')

@endsection

@section('m-subheader')
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            {{-- <p class="m-subheader__title"> --}}
              <h5> {{ $judul . " "  .  Auth::user('vendor')->namaperusahaan . ". " . Auth::user('vendor')->badanusaha->kode }}</h5> 
            {{-- </p> --}}
        </div>

    </div>
</div>
@endsection

@section('m-content')
<div class="m-content">
    @include('component.alertnotification')
    @if (Auth::user('vendor')->is_email_verified == null)
    <div class="alert alert-info alert-dismissible fade show   m-alert m-alert--square m-alert--air" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        </button>
        <strong>Perhatian !!</strong> Silahkan Verifikasi Email Terlebih Dahulu
    </div>
    @endif

    {{-- <div class="alert alert-info alert-dismissible fade show   m-alert m-alert--square m-alert--air" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        </button>
        <strong>Perhatian !!</strong> Silahkan Verifikasi Email Terlebih Dahulu
    </div> --}}

    <!--Begin::Section-->
    <div class="row">
      
        <div class="col-lg-12">
            @php                              
            $now = now();
            @endphp
            @foreach (Auth::user('vendor')->vendorlisensi as $vl)
           
                @if ($vl->end < $now AND $vl->expired == null)
                    <div class="alert alert-warning" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        </button>
                        <strong>{{ date('d-m-Y', strtotime($vl->end)) . " (Expired)" }} </strong>   {{ "Lisensi, " . $vl->vendorjenis->keterangan }}   
                    </div>
                    
                @endif
             
            @endforeach
          
            @foreach (Auth::user('vendor')->vendorsertifikat as $vs)           
                @if ($vs->berlaku_end < $now AND $vs->expired == null)
                    <div class="alert alert-warning" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        </button>
                        <strong>{{ date('d-m-Y', strtotime($vs->berlaku_end)) . " (Expired)" }}  </strong>     {{ "SBU, " . $vs->vendorklasifikasi->kode . " - " . $vs->vendorklasifikasi->name }}      
                    </div>
                @endif                                     
            @endforeach
        </div>
        <div class="col-lg-12 mt-4 mb-4">
            <div id="carouselId" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($sliders as $item)
                    <li data-target="#carouselId" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' :'' }}"></li>
                    @endforeach
                    {{-- <li data-target="#carouselId" data-slide-to="1"></li>
                    <li data-target="#carouselId" data-slide-to="2"></li> --}}
                </ol>
                <div class="carousel-inner" role="listbox" style="border-radius: 10px">
                    @foreach ($sliders as $item)
                    <div class="carousel-item {{ $loop->first ? 'active' :'' }}">
                        <img src="{{ url('data_file/'.$item->image) }}" height="400px" width="100%" alt="" >
                        {{-- <img data-src="{{ asset('') }} " alt="First slide"> --}}
                    </div>
                    @endforeach
                    {{-- <div class="carousel-item">
                        <img src="{{ asset('front/assets/images/slider/img-3.jpg') }}" height="400px" width="100%" alt="" >
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('front/assets/images/slider/img-5.jpg') }}" height="400px" width="100%" alt="" >
                    </div> --}}
                </div>
                <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
       <div class="col-lg-12">
        <div class="row mt-4">
   <div class="col-lg-4">
    <div class="m-portlet" style="border-radius: 10mm; height: 140px; background-color:rgb(205, 148, 234)">
        <div class="m-portlet__body m-portlet__body--no-padding">
        
                    <!--begin::Total Profit-->
                    <div class="m-widget24">					 
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title text-white">
                                Total Tenders
                            </h4><br>
                            {{-- <span class="m-widget24__desc text-white" style="height: 150px">
                                <i class="fa fa-chart-bar" aria-hidden="true"></i>
                            </span> --}}
                            <span class="m-widget24__stats text-light" style="font-size: 36px">
                               {{ $tenders->count() }}
                            </span>		
                        </div>				      
                    </div>
                  
        </div>
    </div>
   </div>
   <div class="col-lg-4">
    <div class="m-portlet"  style="border-radius: 10mm; height: 140px; background-color:rgb(205, 148, 234)">
        <div class="m-portlet__body  m-portlet__body--no-padding">
        
                    <!--begin::Total Profit-->
                    <div class="m-widget24">					 
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title text-white">
                                Active Tenders
                            </h4><br>
                            <span class="m-widget24__stats text-light" style="font-size: 36px">
                               {{ $tenders->where('tgl_tutup', '>=', $now)->count() }}
                            </span>		
                        </div>				      
                    </div>
                  
        </div>
    </div>
   </div>
   <div class="col-lg-4">
    <div class="m-portlet"  style="border-radius: 10mm; height: 140px; background-color: rgb(205, 148, 234)">
        <div class="m-portlet__body  m-portlet__body--no-padding">
        
                    <!--begin::Total Profit-->
                    <div class="m-widget24">					 
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title text-white">
                                Today's Tender
                            </h4><br>
                            <span class="m-widget24__stats text-light" style="font-size: 36px">
                                {{ $tenders->where('created_at', $now)->count() }}
                            </span>		
                        </div>				      
                    </div>
                  
        </div>
    </div>
   </div>
</div></div>
<div class="col-lg-12">
    <div class="row mt-4">
<div class="col-lg-4">
    <div class="m-portlet m-portlet--brand m-portlet--head-solid-bg m-portlet--rounded">
        <div class="m-portlet">
            <div class="m-portlet__body">
                <!--begin::Section-->
                <div class="m-section m-section--last">
                    <div class="m-section__content">
                        <!--begin::Preview-->
                        <div class="m-demo">
                            <div class="m-demo__preview">
                                <div class="m-list-search">
                                    <div class="m-list-search__results">
                                        <span class="m-list-search__result-message m--hide">
                                            No record found
                                        </span>
                                        <span class="m-list-search__result-category m-list-search__result-category--first">
                                            PETUNJUK PENGGUNAAN 
                                        </span>
                                        <a href="/data_file/dokument/manual_book.pdf" target="__blank" class="m-list-search__result-item">
                                            <span class="m-list-search__result-item-pic"><i
                                                    class="flaticon-interface-3 m--font-warning"></i></span>
                                            <span class="m-list-search__result-item-text">Panduan Pengisian Data E-Proc
                                                </span>
                                        </a>

                                        <span
                                            class="m-list-search__result-category ">
                                            PERSYARATAN PRAKUALIFIKASI
                                        </span>
                                        <a href="#" class="m-list-search__result-item">
                                            <span class="m-list-search__result-item-icon"><i
                                                    class="flaticon-interface-3 m--font-warning"></i></span>
                                            <span class="m-list-search__result-item-text">Prosedur dan Persyaratan
                                                Dokumen Prakualifikasi</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Preview-->


                    </div>
                    <!--end::Section-->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-8">
    <div class="m-portlet m-portlet--full-height ">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                      <span class="text-uppercase"> Tender <strong>Terbaru</strong></span> 
                        {{-- COMING SOON --}}
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="m-scrollable m-scroller ps ps--active-y" data-scrollable="true" style="height: 600px; overflow: hidden;">
            <div class="m-list-timeline m-list-timeline--skin-light">
                <div class="m-list-timeline__items">
                    @foreach ($tenders as $item)
                    <div class="m-list-timeline__item bg-light p-3 mb-3" style="border-radius : 10px">
                        <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                        <span class="m-list-timeline__text">
                          <span class="text-uppercase"><strong>{{ $item->nomor_pr  }}</strong></span>   <br>
                          <span class="text-uppercase"><strong><a href="/vendor/tender/detail/{{ $item->id }}">{{ $item->nama_paket }}</a> </strong> </span>  <br>
                          <span>Tanggal Tutup Pendaftaran : {{ date('d-m-Y', strtotime($item->tgl_daftar))  }}</span> <br>
                          {{-- <span>Tanggal Penutupan Penawaran : {{ date('d-m-Y', strtotime($item->tgl_tutup)) }}</span> <br> --}}
                          {{ $item->jenispekerjaans->implode('name' ,  ', ' ) }}<br>
                          HPS / RAP : {{ "Rp " . number_format($item->pagu)  }}
                        </span>
                    @php
                        $now = now();
                    @endphp
                            <span class="m-list-timeline__time"> 
                                @if ($item->tgl_daftar <= $now )
                                <span class="m-badge m-badge--danger m-badge--wide">Close </span>  
                              @else
                              <span class="m-badge m-badge--success m-badge--wide ">Open </span>  
                                  {{-- {{ $item->statustender->name }} --}}
                              @endif
                                {{-- @if ( $item->statustender->name == 'Close' )
                                    <span class="m-badge m-badge--danger m-badge--wide ">{{ $item->statustender->name }}</span>
                                @else
                                    <span class="m-badge m-badge--brand m-badge--wide ">{{ $item->statustender->name }}</span>
                                @endif --}}
                            </span> 
                    </div>
                    @endforeach
                </div>
            </div>
            </div>
            <div class="pull-right p-3 mb-4">{{ $tenders->links() }}</div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!--End::Section-->



</div>
@endsection

@section('footer-script')
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}"
    type="text/javascript"></script>
@endsection
