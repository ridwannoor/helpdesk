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
                <a href="/spp" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
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
                                            
                                            <td>No SPP</td>
                                            <td>:</td>
                                            <td>{{ $spp->nomor_spp }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                            <td>{{ date('d-m-Y' , strtotime($spp->tanggal))  }}</td>
                                        </tr>                                      
                                        <tr>
                                            <td>BA Klarif & Nego</td>
                                            <td>:</td>
                                            <td>{{ $spp->banegopengadaan->nomor_ba }}</td>
                                        </tr>   
                                        <tr>
                                            <td>Biaya Dokumen</td>
                                            <td>:</td>
                                            <td>{{ $spp->bidok }}</td>
                                        </tr>  
                                        <tr>
                                            <td>BOD</td>
                                            <td>:</td>
                                            <td>{{ $spp->bod->code . " - " . $spp->bod->name }}</td>
                                        </tr>    
                                        <tr>
                                            <td>Surat Pendukung</td>
                                            <td>:</td>
                                            <td>
                                                
                                                <ol type="1">
                                                    @foreach ($spp->sppdetail as $c)
                                                    <li> {{ $c->suratpend }}</li>
                                                    @endforeach
                                                </ol>
                                           
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
                                                        @foreach ($spp->sppfile as $item)
                                                            <div class="m-widget4__item">
                                                                <div class="m-widget4__info">
                                                                        <a href="{{ url('data_file/pdf/'.$item->filepdf) }}" target="_blank"><span class="m-widget4__text">  {{ $item->filepdf   }}</span></a>
                                                              </div>
                                                                <div class="m-widget4__ext" >
                                                                    <a href="/spp/destroyfile/{{$item->id}}" class="m-widget4__icon delete-confirm">
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