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
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="/do/updatetrack" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="PUT" />
                            <input type="hidden" name="id" value="{{$bapm->id}}" />
                        </div>   
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label>Nomor:</label>
                                    <input type="text" name="no_do" class="form-control m-input" value="{{ $bapm->no_do }}" readonly>
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                                <div class="col-lg-6">
                                    <label class="">Tanggal Berangkat:</label>
                                    <div class="input-group date">
                                            <input type="text" class="form-control m-input" required name="tanggal_sampai" id="tanggal_sampai" value="{{ $bapm->tanggal_sampai }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                </div>
                               
                            </div>
                            <div class="form-group m-form__group row">
                               
                                <div class="col-lg-6">
                                    <label class="">Keterangan:</label>
                                    <textarea name="ket_pengiriman" id="ket_pengiriman" class="form-control m-input" cols="30" rows="5">{{ $bapm->ket_pengiriman }}</textarea>
                                    {{-- <input type="text" name="ket_pengiriman" class="form-control m-input" id="ket_pengiriman"> --}}
                                    {{-- <div class="input-group date"> --}}
                                            {{-- <input type="text" class="form-control m-input" name="tgl_mulai" readonly  placeholder="Select Date" id="tglmulai" value="{{$bapm->tgl_mulai}}"/>
                                            <span class="input-group-text">-</span><input type="text" class="form-control m-input" name="tgl_akhir" readonly  placeholder="Select Date" id="tglakhir" value="{{$bapm->tgl_akhir}}"/> --}}
                                            
                                            {{-- <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div> --}}
                                        {{-- </div> --}}
                                </div>
                                <div class="col-lg-6">
                                    {{-- <label class="">File Upload:</label> --}}
                                    <div class="col-lg-12">
                                        <input type="file" name="filename[]" id="filename" multiple required><br>
                                        <span class="m-form__help">Upload file hanya : .PDF</span>
                                    </div>
                                </div>
                              
                            </div>
                           
                           
                           
                            
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-8">
                                        <div class="btn-group pull-right">
                                            <a href="/do" class="btn btn-secondary">Cancel</a>
                                            <button class="btn btn-success">Save</button>
                                            {{-- <a href="/do/store" class="btn btn-success">Submit</a> --}}
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
<script type="text/javascript">
    $(document).ready(function () {
        $('#tanggal_sampai').datepicker({
         //merubah format tanggal datepicker ke dd-mm-yyyy
            format: "yyyy-mm-dd",
            //aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
            //format: "dd-mm-yyyy",
            autoclose: true
        }),
        $("#tglmulai").datepicker({
            autoclose:true,
            format:"yyyy-mm-dd"
        }),
        $("#tglakhir").datepicker({
            autoclose:true,
            format:"yyyy-mm-dd",
           // startDate:new Date
        });
        $("#tglkirim").datepicker({
            autoclose:true,
            format:"yyyy-mm-dd"
        });
    });
</script>
@endsection