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
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                  {{ $judul }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="m-form m-form--label-align-right" method="POST" action="/spk/update" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="PUT" />
                            <input type="hidden" name="id" value="{{$spk->id}}" />
                        </div>                   
                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-3">
                                    <label>Nomor SPK</label>                                    
                                        <input type="text" name="nomor_spk" value="{{ $spk->nomor_spk }}" class="form-control m-input" placeholder="Kode">
                                        {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                    </div>
                                    <div class="col-lg-3">
                                    {{-- <label>Jangka Pelaksanaan</label> --}}
                                    <label>BA Kesepakatan</label>
                                    <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="bakesepakatan_id">
                                        <option value="{{ $spk->bakesepakatan_id }}">{{ $spk->bakesepakatan->nomor_bak  }}</option>
                                        @foreach ($bakes as $item)       
                                            @if ($spk->bakesepakatan_id != $item->id)                                         
                                                <option value="{{ $item->id }}">{{ $item->nomor_bak  }}</option>
                                            @endif 
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Tanggal</label>                                    
                                        <div class="input-group date"  data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="tanggal" value="{{ date('Y-m-d', strtotime($spk->tanggal)) }}" placeholder="Select date & time" id="tgl"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Unit Terkait</label>                                    
                                        <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true"  name="divisi_id" id="divisi">
                                            <option value="{{ $spk->divisi_id }}">{{ $spk->divisi->kode }}</option> 
                                            @foreach ($divisis as $item)
                                                 @if ($spk->divisi_id != $item->id)
                                                 <option value="{{ $item->id }}">{{ $item->kode }}</option>                                                        
                                                 @endif   
                                             @endforeach    
                                        </select>
                                        </div>
                                </div>
                                   
                                </div>
                               
                            </div>
                            
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-6">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="/spk" class="btn btn-default">Back</a>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->
    
                
            </div>
        </div>
    </div>
    
@endsection


@section('footer-script')

<script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function () {        
        $("#tgl").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
        $("#enddate").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });

      
     
    });     
</script>   

@endsection