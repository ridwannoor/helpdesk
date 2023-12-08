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
            <form class="m-form m-form--label-align-right" method="POST" action="/barang/store"
                enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="_method" value="POST" />
                    {{-- <input type="hidden" name="id" value="{{$dept->id}}" /> --}}
                </div>
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label>Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>                               
                                </div>
                                <div class="col-lg-5">
                                    <label>Nama Barang *</label>
                                    <input type="text" name="nama_brg" class="form-control m-input" required>
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                                <div class="col-lg-3">
                                    <label>Qty *</label>
                                    <input type="text" name="aset_tag" class="form-control m-input" required>
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label>No Aset Barang *</label>
                                    <input type="text" name="asset_id" class="form-control m-input" required>
                                </div> 
                                
                                <div class="col-lg-8">
                                    <label>Garansi</label>
                                    <div class="input-daterange input-group">
                                        <input type="text" class="form-control m-input" id="startdate" name="start_date" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">s/d</span>
                                        </div>
                                        <input type="text" class="form-control" id="enddate" name="end_date" />
                                    </div>
                                </div> 
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-3">
                                    <label>Tipe / Serial Number *</label>
                                    <input type="text" name="tipe" class="form-control m-input" required>
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                                <div class="col-lg-3">
                                    <label>Merk *</label>
                                    <input type="text" name="merk" class="form-control m-input" required>
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                                <div class="col-lg-3">
                                    <label>Category *</label>
                                    <input type="text" name="category" class="form-control m-input" required>
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                                <div class="col-lg-3">
                                    <label>Vendor</label>
                                    <select name="vendor_id" data-live-search="true" class="form-control m-bootstrap-select m_selectpicker" required
                                        id="vendor_id">
                                        <option value="">Please Select</option>
                                        @foreach ($vendors as $item)
                                        <option value="{{ $item->id }}">{{ $item->namaperusahaan . ', ' . $item->badanusaha->kode }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                           
                            <div class="form-group m-form__group row">                             
                                <div class="col-lg-4">
                                    <label>Harga (/unit) *</label>
                                    <input type="text" name="serial" class="form-control m-input" required>
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                                <div class="col-lg-4">
                                    <label>Lokasi</label>
                                    <select name="lokasi_id" class="form-control m-bootstrap-select m_selectpicker" required
                                        id="lokasi_id">
                                        <option value="">Please Select</option>
                                        @foreach ($lokasis as $item)
                                        <option value="{{ $item->id }}">{{ $item->kode }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label>Tanggal Pembelian</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control m-input" name="tgl_pembelian" required placeholder="Select Date" id="tglkirim"/>
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
                                    <label>Catatan (Opsional)</label>
                                    <textarea name="catatan" id="" class="form-control m-input" cols="30" rows="10"></textarea>
                                    {{-- <input type="text" name="catatan" class="form-control m-input"> --}}
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>                                
                                <div class="col-lg-3">
                                    <label>Kondisi</label>
                                   <select class="form-control m-bootstrap-select m_selectpicker" id="kondisi" name="kondisi">
                                        <option value="baik">Baik</option>
                                        <option value="rusak">Rusak</option>   
                                    </select>                        
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

<script src="assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {    
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
        
        $("#tglkirim").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
    });
</script>
@endsection