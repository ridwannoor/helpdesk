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
            {{-- </div> --}}

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
                <form class="m-form m-form--label-align-right" action="/notadinas/upload/simpan" method="POST"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="PUT" />
                        <input type="hidden" name="id" value="{{$nodins->id}}" />
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label>Nota Dinas</label>
                                    <input type="text" name="no_nodin" class="form-control m-input"
                                        value="{{ $nodins->no_nodin }}" readonly>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label>Nama File</label>
                                    <input type="text" name="nama_nodin" class="form-control m-input" placeholder="Nama File yang dilampirkan" required>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-12">
                                    <label for="example-text-input">Upload File</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="filename[]" id="customFile" required>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>                               
                            </div>
                        </div>
                    </div>

    {{-- </div> --}}
    <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions m-form__actions">
            <div class="row">
                <div class="col-lg-12">
                    <div class="btn-group pull-right">
                        {{-- <a href="/rekappo/edit/detail/{{ $nodins->id }}" class="btn btn-primary">Next</a>
                        --}}
                        <a href="/notadinas" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!--end::Form-->
</div>
{{-- </div> --}}
<!--end::Portlet-->
</div>
</div>
</div>
{{-- </div>
</div> --}}

@endsection
