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
                    <form class="m-form m-form--label-align-right" method="POST" action="/baadendum/store" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="POST" />
                            {{-- <input type="hidden" name="id" value="{{$dept->id}}" /> --}}
                        </div>                   
                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-3">
                                    <label>Nomor BA Addendum</label>                                    
                                        <input type="text" name="nomor_ba" class="form-control m-input" placeholder="Kode">
                                        {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Tanggal BA Addendum</label>                                    
                                        <div class="input-group date"  data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="tanggal" placeholder="Select date & time" id="m_datetimepicker_2"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                    {{-- <label>Jangka Pelaksanaan</label> --}}
                                    <label>BA Klarif & Nego</label>
                                    <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="banegopengadaan_id" id="">
                                        @foreach ($ba as $item)                                                
                                            <option value="{{ $item->id }}">{{ $item->nomor_ba  }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    
                                </div>
                               
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-4">
                                        <label for="">Lokasi Nego</label>
                                        <input type="text" name="lokasi_nego" class="form-control m-input" placeholder="Lokasi">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">Divisi Terkait</label>
                                        <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="divisi_id[]" id="divisi_id" multiple>
                                            @foreach ($divisis as $item)                                                
                                                <option value="{{ $item->id }}">{{ $item->kode }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Vendor</label>
                                        <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="vendor_id" id="vendor_id">
                                            @foreach ($vendors as $item)                                                
                                                <option value="{{ $item->id }}">{{ $item->namaperusahaan . ", " . $item->badanusaha->kode }}</option>
                                            @endforeach
                                        </select>
                                    </div>   
                                </div>
                                <div class="form-group m-form__group row"> 
                                    <div class="col-lg-3">
                                        <label>Nilai RAP </label>                                    
                                        <div class="input-group">
                                            <input type="text" name="rap" class="form-control m-input" required placeholder="hanya angka" aria-describedby="basic-addon2">                                          
                                            <div class="input-group-append"><span class="input-group-text" id="basic-addon2">Rp</span></div>                                           
                                        </div>  
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Nilai Kontrak </label>                                    
                                        <div class="input-group">
                                            <input type="text" name="nilai_kontrak" class="form-control m-input" required placeholder="hanya angka" aria-describedby="basic-addon2">                                          
                                            <div class="input-group-append"><span class="input-group-text" id="basic-addon2">Rp</span></div>                                           
                                        </div>  
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Nilai SPH </label>                                    
                                        <div class="input-group">
                                            <input type="text" name="jumlah" class="form-control m-input" required placeholder="hanya angka" aria-describedby="basic-addon2">                                          
                                            <div class="input-group-append"><span class="input-group-text" id="basic-addon2">Rp</span></div>                                           
                                        </div>  
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Nilai SPH Nego </label>                                    
                                        <div class="input-group">
                                            <input type="text" name="jumlah_nego" class="form-control m-input" required placeholder="hanya angka" aria-describedby="basic-addon2">                                          
                                            <div class="input-group-append"><span class="input-group-text" id="basic-addon2">Rp</span></div>                                           
                                        </div>  
                                    </div>
                                </div>
                              
                                <div class="form-group m-form__group row"> 
                                    <div class="col-lg-4">
                                        <label>BA Evaluasi</label>          
                                            <input type="text" name="ba_evaluasi" class="form-control m-input" placeholder="" aria-describedby="basic-addon2">     
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Tanggal</label>             
                                        <div class="input-group date"  data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="tgl_ba"  placeholder="Select date" id="tgl_sphnego"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>   
                                    </div>                                    
                                                                    
                                </div>
                                <div class="form-group m-form__group row"> 
                                    <div class="col-lg-4">
                                        <label>Detail</label>                                    
                                        <textarea  name="detail" class="form-control m-input" cols="30" rows="4"></textarea>
                                    </div>  
                                    <div class="col-lg-4">
                                        <label>Jangka Waktu Pelaksanaan</label>                                    
                                        <textarea  name="jangka_waktu" class="form-control m-input" cols="30" rows="4"></textarea>
                                    </div>                             
                                    <div class="col-lg-4">
                                        <label>Cara Pembayaran</label>                                    
                                        <textarea  name="cara_bayar" class="form-control m-input" cols="30" rows="4"></textarea>
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    {{-- <div class="col-lg-2"></div> --}}
                                    <div class="col-lg-12">
                                        <div class="btn-group pull-right">
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        <a href="/baadendum" class="btn btn-default">Back</a>
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
{{-- <script src="assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script> --}}
<script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>     --}}
<script type="text/javascript">
    $(document).ready(function () {

        $("#rdjaminan input[type='radio']").change(function(){
            if($(this).val()=="other")
            {
                $("#otherAnswer").show();
                $("#otherAnswer1").show();
            }
            else
            {                
                $("#otherAnswer").hide(); 
                $("#otherAnswer1").hide(); 
            }
        });
    });
</script>            
<script>
    $(document).ready(function () {        
        $("#tgl_sph").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
        $("#tgl_sphnego").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
        $("#tgl_sphklarif").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
        $("#startdate").datepicker({
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