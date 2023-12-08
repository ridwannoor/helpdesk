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
            <form class="m-form m-form--label-align-right" method="POST" action="/barang/update"
                enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="_method" value="PUT" />
                    <input type="hidden" name="id" value="{{$brg->id}}" />
                </div>
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group row">
                             
                                <div class="col-lg-4">
                                    <label>Image *</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>   
                                    <hr>
                                    @if ($brg->image)
                                    <div class="alert alert-dismissible fade show   m-alert m-alert--outline m-alert--air" role="alert">
                                        <strong>{{$brg->image}}</strong>     
                                    </div>   
                                    @endif
                                                               
                                </div>
                          
                               
                                <div class="col-lg-5">
                                <label>Nama Barang *</label>
                                <input type="text" name="nama_brg" required class="form-control m-input" value="{{ $brg->nama_brg }}">
                                </div>
                           
                              
                                <div class="col-lg-3">
                                    <label>Qty *</label>
                                    <input type="text" required name="aset_tag" class="form-control m-input" value="{{ $brg->aset_tag }}">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label>No Aset Barang *</label>
                                    <input type="text" required name="asset_id" value="{{ $brg->asset_id }}" class="form-control m-input">
                                </div> 
                                
                                <div class="col-lg-8">
                                    <label>Garansi</label>
                                    <div class="input-daterange input-group">
                                        <input type="text" class="form-control m-input" id="startdate" value="{{ $brg->start_date }}" name="start_date" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">s/d</span>
                                        </div>
                                        <input type="text" class="form-control" id="enddate" value="{{ $brg->end_date }}" name="end_date" />
                                    </div>
                                </div> 
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-3">
                                    <label>Tipe / Serial Number *</label>
                                    <input type="text" name="tipe" required value="{{ $brg->tipe }}" class="form-control m-input">
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                                <div class="col-lg-3">
                                    <label>Merk *</label>
                                    <input type="text" required name="merk" value="{{ $brg->merk }}" class="form-control m-input">
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                                <div class="col-lg-3">
                                    <label>Category *</label>
                                    <input type="text" required name="category" value="{{ $brg->category }}" class="form-control m-input">
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                                <div class="col-lg-3">
                                    <label>Vendor</label>
                                    <select name="vendor_id" data-live-search="true" class="form-control m-bootstrap-select m_selectpicker" required
                                        id="vendor_id">
                                        <option value="{{ $brg->vendor_id }}">{{ $brg->vendor->namaperusahaan . ' , ' . $brg->vendor->badanusaha->kode}}</option>
                                        {{-- <option value="">Please Select</option> --}}
                                        @foreach ($vendors as $d)
                                        @if ($brg->vendor_id != $d->id){
                                            <option value="{{$d->id}}">{{ $d->namaperusahaan . ' , ' . $d->badanusaha->kode}}</option>
                                            }
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                               
                                <div class="col-lg-4">
                                    <label>Harga (/unit) *</label>
                                    <input type="text" required name="serial" class="form-control m-input" value="{{ $brg->serial }}">
                                </div>
                         
                               
                                <div class="col-lg-4">
                                    <label>Lokasi</label>
                                    <select name="lokasi_id" class="form-control m-input m-input--square" required
                                        id="lokasi_id">
                                        <option value="{{ $brg->lokasi_id }}">{{ $brg->lokasi->kode }}</option>
                                        @foreach ($lokasis as $d)
                                        @if ($brg->lokasi_id != $d->id){
                                        <option value="{{$d->id}}">{{ $d->kode }}</option>
                                        }
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                          
                              
                                <div class="col-lg-4">
                                    <label>Tanggal Pembelian *</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control m-input" required name="tgl_pembelian" value="{{ $brg->tgl_pembelian }}"  placeholder="Select Date" id="tglkirim"/>
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
                                    <textarea name="catatan" id="" class="form-control m-input" cols="30" rows="10">{{ $brg->catatan }}</textarea>
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
                            {{-- <hr> --}}
                            
                        

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