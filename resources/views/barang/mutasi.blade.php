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
            <form class="m-form m-form--label-align-right" method="POST" action="/barang/mutasi/store"
                enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="_method" value="POST" />
                    <input type="hidden" name="id" value="{{$brg->id}}" />
                    {{-- <input type="hidden" name="barang_id" value="{{$brgmutasi->barang_id}}" /> --}}
                </div>
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                       
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Nama Barang</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_brg" class="form-control m-input" value="{{ $brg->nama_brg }}" readonly>
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                            </div>                         
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Lokasi</label>
                                <div class="col-lg-6">
                                    <select name="lokasi_id" class="form-control m-input m-input--square"
                                        id="lokasi_id">
                                        <option value="">Please Select</option>
                                        @foreach ($lokasis as $item)
                                        <option value="{{ $item->id }}">{{ $item->kode }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                            
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Checkout Date</label>
                                <div class="col-lg-6">
                                    <div class="input-group date">
                                        <input type="text" class="form-control m-input" name="checkout_date"  placeholder="Select Date" id="checkout_date"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Expected Checkin Date</label>
                                <div class="col-lg-6">
                                    <div class="input-group date">
                                        <input type="text" class="form-control m-input" name="expected_checkin_date"  placeholder="Select Date" id="expected_checkin_date"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Catatan</label>
                                <div class="col-lg-6">
                                    <textarea name="catatan" id="" class="form-control m-input" cols="30" rows="10"></textarea>
                                    {{-- <input type="text" name="catatan" class="form-control m-input"> --}}
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Upload File</label>
                                <div class="col-lg-6">
                                    {{-- <input type="file" name="" id=""> --}}
                                    <input type="file" name="image" class="form-control m-input" multiple>
                                    <span class="m-form__help">Upload file hanya : .jpeg, .png</span>
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
                                    <a href="/barang" class="btn btn-default">Back</a>
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
        $("#checkout_date").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        }); 
        $("#expected_checkin_date").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
    });
</script>
@endsection