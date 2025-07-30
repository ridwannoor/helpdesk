@extends('client.layouts.app')

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

@section('main')
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
            <form class="m-form m-form--label-align-right" method="POST" action="/client/ticket/store"
                enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="_method" value="POST" />
                    {{-- <input type="hidden" name="client_id" value="{{Auth::user('client')->id}}" /> --}}
                </div>
                <div class="m-portlet__body">

                    <div class="m-form__section m-form__section--first">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>Title:</label>
                                <input type="text" class="form-control m-input" placeholder="Title" name="title">
                              
                            </div>
                            <div class="col-lg-6">
                                <label>Type:</label>
                                    <select name="typeticket_id" data-live-search="true" class="form-control m-bootstrap-select m_selectpicker" id="typeticket_id" required>
                                        <option value="">Please Select</option>
                                        @foreach ($typetickets as $item)
                                            <option value="{{ $item->id }}" >{{ $item->deskripsi }}</option>                                        
                                        @endforeach                                       
                                    </select>
                               
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                  <label class="">Deskripsi:</label>
                               <textarea name="deskripsi" class="form-control m-input" id="deskripsi" cols="30" rows="5"></textarea>
                            </div>
                             <div class="col-lg-6">
                                 <label>Status:</label>
                                    <select name="statusticket_id" data-live-search="true" class="form-control m-bootstrap-select m_selectpicker" id="statusticket_id" required>
                                        <option value="">Please Select</option>
                                        @foreach ($statustickets as $item)
                                            <option value="{{ $item->id }}" >{{ $item->deskripsi }}</option>                                        
                                        @endforeach                                       
                                    </select>
                             </div>
                        </div>
                         <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                               <label>Lokasi:</label>
                                    <select name="lokasi_id" data-live-search="true" class="form-control m-bootstrap-select m_selectpicker" id="lokasi_id" required>
                                        <option value="">Please Select</option>
                                        @foreach ($lokasis as $item)
                                            <option value="{{ $item->id }}" >{{ $item->kode }}</option>                                        
                                        @endforeach                                       
                                    </select>
                            </div>
                            <div class="col-lg-6">
                               <label>Jenis:</label>
                                    <select name="jenisticket_id" data-live-search="true" class="form-control m-bootstrap-select m_selectpicker" id="jenisticket_id" required>
                                        <option value="">Please Select</option>
                                        @foreach ($jenistickets as $item)
                                            <option value="{{ $item->id }}" >{{ $item->deskripsi }}</option>                                        
                                        @endforeach                                       
                                    </select>
                            </div>
                        </div>
                           <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>File Upload:</label>
                                {{-- <input type="file" class="form-control m-input" placeholder="Enter full name"> --}}
                                <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                  </div>
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
                                    <a href="{{ route('client.ticket') }}" class="btn btn-default">Back</a>
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
