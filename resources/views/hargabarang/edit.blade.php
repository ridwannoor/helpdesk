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
                    <form class="m-form m-form--label-align-right" method="POST" action="/hargabarang/update" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="PUT" />
                            <input type="hidden" name="id" value="{{$hargabarangs->id}}" />
                        </div>                   
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Lokasi</label>
                                <div class="col-10">
                                    <select name="lokasi_id" data-live-search="true" class="form-control m-bootstrap-select m_selectpicker" id="lokasi_id">
                                        <option value="{{$hargabarangs->lokasi_id}}">{{ $hargabarangs->lokasi->kode }}</option>
                                        @foreach ($lokasis as $d)
                                        @if ($hargabarangs->lokasi_id != $d->id){
                                        <option value="{{$d->id}}">{{ $d->kode }}</option>
                                        }
                                        @endif
                                        @endforeach                                     
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Vendor</label>
                                <div class="col-10">
                                    <select name="vendor_id" data-live-search="true" class="form-control m-bootstrap-select m_selectpicker" id="vendor_id">
                                        <option value="{{$hargabarangs->vendor_id}}">{{ $hargabarangs->vendor->namaperusahaan . ", " . $hargabarangs->vendor->badanusaha->kode }}</option>
                                        @foreach ($vendors as $d)
                                        @if ($hargabarangs->vendor_id != $d->id){
                                        <option value="{{$d->id}}">{{ $d->namaperusahaan . ", " . $d->badanusaha->kode }}</option>
                                        }
                                        @endif
                                        @endforeach                                     
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Nama Barang</label>
                                <div class="col-10">
                                    <textarea name="nama_brg" id="summernote" class="form-control m-input">{!! $hargabarangs->nama_brg !!}</textarea>
                                    {{-- <input class="form-control m-input" name="nama_brg" type="text" value="{{ $hargabarangs->nama_brg }}" id="example-text-input"> --}}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Qty</label>
                                <div class="col-10">
                                    <input class="form-control m-input" type="text" name="qty" value="{{ $hargabarangs->qty }}" id="example-text-input" readonly>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Satuan</label>
                                <div class="col-10">
                                    <input class="form-control m-input" type="text" name="satuan" value="{{ $hargabarangs->satuan }}" id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Mata Uang</label>
                                <div class="col-10">
                                    <select name="currency_id" class="form-control m-input" id="currency_id">
                                        <option value="{{ $hargabarangs->currency_id }}">{{ $hargabarangs->currency->name }}</option>
                                        @foreach ($currencies as $item)
                                            @if ($hargabarangs->currency_id != $item->id)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif                                            
                                        @endforeach
                                    </select>
                                    {{-- <input class="form-control m-input" type="text" name="currency_id" value="{{ $hargabarangs->currency_id }}" id="example-text-input"> --}}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Harga</label>
                                <div class="col-10">
                                    <input class="form-control m-input" type="hidden" name="harga_lama" value="{{ $hargabarangs->harga }}" id="example-text-input">
                                    <input class="form-control m-input" type="text" name="harga" value="{{ $hargabarangs->harga }}" id="example-text-input" required>
                                    <span class="m-form__help">Gunakan titik (.) pada dua angka dibelakang koma</span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Image</label>
                                <div class="col-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                  </div>
                                  <hr>
                                  <div class="alert alert-dismissible fade show   m-alert m-alert--outline m-alert--air" role="alert">
                                    <strong>{{$hargabarangs->image}}</strong>     
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
                                        <a href="/hargabarang" class="btn btn-default">Back</a>
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
     $('#summernote').summernote({
            height: "100px"
        });
        $('#summernote1').summernote({
            height: "100px"
        });
</script>
@endsection