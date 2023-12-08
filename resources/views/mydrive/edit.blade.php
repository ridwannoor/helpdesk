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
                <form class="m-form m-form--label-align-right" method="POST" action="/mydrive/update" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="PUT" />
                        <input type="hidden" name="id" value="{{$drives->id}}" />
                    </div>                   
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Title</label>
                                <div class="col-lg-6">
                                    <input type="text" name="title" class="form-control m-input" value="{{ $drives->title }}">
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">Category</label>
                                <div class="col-lg-6">
                                    <select name="mydrivecategory_id" id="mydrivecategory_id" class="form-control m-bootstrap-select m_selectpicker">
                                        <option value="{{ $drives->mydrivecategory_id }}">{{ $drives->mydrivecategory->title }}</option>
                                        @foreach ($cats as $item)
                                            @if ($drives->mydrivecategory_id != $item->id)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                            @endif                                          
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">File Upload</label>
                                <div class="col-lg-6">
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <span>{{ $drives->file }}</span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="Icon" class="col-lg-2 col-form-label">Icon:</label>
                                <div class="col-lg-6">
                                    <div class="m-radio-list">
                                        <label>
                                            {{-- @if ($drives->image == "doc")
                                                <input type="radio" name="image" value="doc" checked="checked"><img src="{{ asset('assets/app/media/img/files/doc.svg') }}" width="70px" alt="doc">  
                                                <span></span>  
                                            @endif --}}
                                            <input type="radio" name="image" value="doc"><img src="{{ asset('assets/app/media/img/files/doc.svg') }}" width="70px" alt="doc">  
                                            <span></span>                    
                                        </label>
                                        <label>
                                            <input type="radio" name="image" value="xls"><img src="{{ asset('assets/app/media/img/files/xls.svg') }}" width="70px" alt="xls">
                                            <span></span>
                                        </label>
                                        <label>
                                            <input type="radio" name="image" value="jpg"> <img src="{{ asset('assets/app/media/img/files/jpg.svg') }}" width="70px" alt="jpg">
                                            <span></span>
                                        </label>
                                        <label>
                                            <input type="radio" name="image" value="pdf"> <img src="{{ asset('assets/app/media/img/files/pdf.svg') }}" width="70px" alt="pdf">
                                        <span></span>
                                    </label>
                                    
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
                                    <a href="/mydrive" class="btn btn-default">Back</a>
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
<style type="text/css">
    label > input{ /* Menyembunyikan radio button */
        visibility: hidden; 
        position: absolute; 
      }
      label > input + img{ /* style gambar */
        cursor:pointer;
        border:2px solid transparent;
      }
      label > input:checked + img{ /* (RADIO CHECKED) style gambar */
        border:2px solid rgb(51, 255, 0);
      }
</style>
@endsection