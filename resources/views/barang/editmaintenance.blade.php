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
            <form class="m-form m-form--label-align-right" method="POST" action="/barang/updatemaintenance"
                enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="_method" value="PUT" />
                    <input type="hidden" name="id" value="{{$brgmaintenances->id}}" />
                    <input type="hidden" name="barang_id" value="{{$brgmaintenances->barang_id}}" />
                </div>
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                       
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Nama Barang</label>
                                <div class="col-lg-6">
                                    <input type="text" name="" class="form-control m-input" value="{{ $brgmaintenances->barang->nama_brg }}" readonly>
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Supplier</label>
                                <div class="col-lg-6">
                                <select name="vendor_id" class="form-control m-input m-input--square" id="vendor_id">
                                        <option value="{{$brgmaintenances->vendor_id}}">{{ $brgmaintenances->vendor->namaperusahaan }}</option>
                                        @foreach ($vendors as $d)
                                        @if ($brgmaintenances->vendor_id != $d->id){
                                        <option value="{{$d->id}}">{{ $d->namaperusahaan }}</option>
                                        }
                                        @endif
                                        @endforeach  
                                    </select>
                                </div>  
                            </div>
                            
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Tipe Maintenance</label>
                                <div class="col-lg-6">
                                    <select name="tipemaintenance_id" class="form-control m-input m-input--square"
                                        id="tipemaintenance_id">
                                        <option value="{{$brgmaintenances->tipemaintenance_id}}">{{ $brgmaintenances->tipemaintenance->kode }}</option>
                                        @foreach ($tipes as $d)
                                        @if ($brgmaintenances->tipemaintenance_id != $d->id){
                                        <option value="{{$d->id}}">{{ $d->kode }}</option>
                                        }
                                        @endif
                                        @endforeach  
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Title</label>
                                <div class="col-lg-6">
                                    <input type="text" name="title" class="form-control m-input" value="{{ $brgmaintenances->title }}">
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Start Date</label>
                                <div class="col-lg-6">
                                    <div class="input-group date">
                                        <input type="text" class="form-control m-input" name="start_date" id="start_date"  value="{{ $brgmaintenances->start_date }}" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Complete Date</label>
                                <div class="col-lg-6">
                                    <div class="input-group date">
                                        <input type="text" class="form-control m-input" name="complete_date" id="complete_date"  value="{{ $brgmaintenances->complete_date }}" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Biaya</label>
                                <div class="col-lg-6">
                                    <input type="text" name="biaya" class="form-control m-input" onkeypress="return hanyaAngka(event)" value="{{ $brgmaintenances->biaya }}">
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Catatan</label>
                                <div class="col-lg-6">
                                    <textarea name="catatan" id="" class="form-control m-input" rows="10">{{ $brgmaintenances->catatan }}</textarea>
                                    {{-- <input type="text" name="qty" class="form-control m-input" onkeypress="return hanyaAngka(event)" required> --}}
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
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
        $("#start_date").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
        $("#complete_date").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
    });
</script>
@endsection