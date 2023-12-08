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
            <form class="m-form m-form--label-align-right" method="POST" action="/vendorbod/update"
                enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="_method" value="PUT" />
                    <input type="hidden" name="id" value="{{$vendorbods->id}}" />
                    <input type="hidden" name="vendor_id" value="{{$vendorbods->vendor_id}}" />
                </div>
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                       
                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                <label>Nama</label>
                                <div class="input-group">
                                    <input type="text" name="nama" class="form-control m-input" style="text-transform: uppercase" value="{{$vendorbods->nama}}">
                                    <div class="input-group-append">
                                        <button class="btn btn btn-secondary" id="basic-addon2" type="button"><i class="flaticon-home"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Jabatan</label>
                                <div class="input-group">
                                    <input type="text" name="jabatan" class="form-control m-input" value="{{$vendorbods->jabatan}}" style="text-transform: uppercase">
                                    <div class="input-group-append">
                                        <button class="btn btn btn-secondary" id="basic-addon2" type="button"><i class="flaticon-home"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Status</label>
                                <select name="status" class="form-control m-bootstrap-select m_selectpicker" id="status">
                                    @if ($vendorbods->status == "aktif")
                                        <option value="aktif">Aktif</option>
                                        <option value="nonaktif">Non Aktif</option>
                                    @else
                                        <option value="nonaktif">Non Aktif</option>
                                        <option value="aktif">Aktif</option>
                                    @endif
                                    {{-- @foreach ($lokasis as $item) --}}
                                    {{-- <option value="aktif">Aktif</option> --}}
                                  
                                    {{-- @endforeach                                        --}}
                                </select>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div></div>
                            <div class="col-lg-6">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="/vendor" class="btn btn-default">Back</a>
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


