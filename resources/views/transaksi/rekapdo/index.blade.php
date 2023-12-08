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
    @if ($crud == null)
    <div class="m-grid__item m-grid__item--fluid m-grid  m-error-6" style="background-image: url(assets/app/media/img/error/bg6.jpg);">
        <div class="m-error_container">
            <div class="m-error_subtitle m--font-light">
                <h1>Oops...</h1>		 
            </div> 		 
            <p class="m-error_description m--font-light">
                Looks like something went wrong.<br>
                We're working on it			 
            </p>		 
        </div>	 
    </div> 
    @else
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
                    <tr>
                        <th rowspan="2" style="vertical-align : middle;text-align:center;">No</th>
                        {{-- <th rowspan="2" style="vertical-align : middle;text-align:center;">Tanggal</th> --}}
                        <th rowspan="2" style="vertical-align : middle;text-align:center;">Delivery Order</th>
                        <th rowspan="2" style="vertical-align : middle;text-align:center;">Lokasi</th>
                        <th colspan="2" style="vertical-align : middle;text-align:center;">Status</th>
                    </tr>
                    <tr>
                        <th style="vertical-align : middle;text-align:center;">Delivery Order</th>
                        <th style="vertical-align : middle;text-align:center;">Good Receive</th>
                    </tr>
                </thead>
                @php
                    $no = 1 ;
                @endphp
                <tbody>
                                        
                    @foreach ($doheaders as $item)
			            {{-- @foreach ($item->doheaders as $item) --}}
	
                        @if ($item->is_published == '1' )   
                    <tr>
                        
                        <td style="vertical-align : middle;text-align:center;">{{ $no++ }}</td>
                        <td width="250px" style="vertical-align : middle;text-align:left;">
			  	<a href="/rekapdo/detail/{{ $item->id }}" target="_blank"><strong>{{ $item->no_do }}</strong></a> <br>
				{{ $item->perihal }}
			</td>
                        <td style="vertical-align : middle;text-align:center;"><span class="m-badge m-badge--brand m-badge--wide">{{ $item->lokasi->kode }}</span></td>
                        <td style="vertical-align : middle;text-align:center;"> 
                            @if ($item->is_published == 0)
                            <span class="m-badge m-badge--warning m-badge--wide">draft</span>
                         @else
                         <span class="m-badge m-badge--success m-badge--wide">publish</span>
                         @endif
                        </td>
                        <td style="vertical-align : middle;text-align:center;"> 
                            @if ($item->is_published_ro == 0)
                            <span class="m-badge m-badge--warning m-badge--wide">draft</span>
                         @else
                         <span class="m-badge m-badge--success m-badge--wide">publish</span>
                         @endif
                        </td>
                    </tr>        
                     
                    @endif   
                      {{-- @endforeach         --}}
                    @endforeach       
                     
                </tbody>

            </table>
        </div>
    </div>
    @endif
    <!-- END EXAMPLE TABLE PORTLET-->
</div>
@endsection

@section('footer-script')
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}" type="text/javascript"></script>
@endsection