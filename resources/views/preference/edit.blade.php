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
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="/preference/update" method="POST" enctype="multipart/form-data">
                    {{-- @csrf
                    @method() --}}
                    <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="id" value="{{$item->id}}" />
                            <input type="hidden" name="_method" value="PUT" />
                            
                        </div>
                    <div class="m-portlet__body">	
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">Full Name:</label>
                            <div class="col-lg-5">
                                {{-- @foreach ($item as $item) --}}
                                    <input type="text" name="nama_perusahaan" class="form-control m-input"  value="{{ $item->nama_perusahaan }}">
  <span class="m-form__help">Please enter your full name</span>
                                {{-- @endforeach --}}

                                
                              
                            </div>
                            <label class="col-lg-2 col-form-label">Contact Number:</label>
                            <div class="col-lg-3">
                                <div class="input-group">

                                        {{-- @foreach ($item as $item) --}}
                                     <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                    <input type="text" name="phone" class="form-control m-input"  value="{{ $item->phone }}" >
                                        {{-- @endforeach --}}
                                   
                                </div>
                                <span class="m-form__help">Please enter your contact number</span>
                            </div>
                        </div>	   
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">Email:</label>
                            <div class="col-lg-5">
                                {{-- @foreach ($item as $item) --}}
                                    <input type="email" name="email" class="form-control m-input" value="{{ $item->email }}">
                                    <span class="m-form__help">Please enter your email</span>
                                {{-- @endforeach --}}
                            </div>
                            
                        </div>  
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">Address:</label>
                            <div class="col-lg-6">
                                <div class="m-input-icon m-input-icon--right">
                                        {{-- @foreach ($item as $item) --}}
                                    <textarea class="form-control m-input" name="address"  rows="3">{{ $item->address }}</textarea>
                                        {{-- @endforeach --}}
                                    
                                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-map-marker"></i></span></span>
                                </div>
                                <span class="m-form__help">Please enter your address</span>
                            </div>
                            {{-- <label class="col-lg-2 col-form-label">Postcode:</label>
                            <div class="col-lg-3">
                                <div class="m-input-icon m-input-icon--right">
                                    <input type="text" class="form-control m-input" placeholder="Enter your postcode">
                                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-bookmark-o"></i></span></span>
                                </div>
                                <span class="m-form__help">Please enter your postcode</span>
                            </div> --}}
                        </div>	     
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">Image:</label>
                            <div class="col-lg-6">
                                <div class="m-input-icon m-input-icon--right">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="customFile" >
                                        <label class="custom-file-label" for="customFile" >Choose file </label>
                                        <span class="m-form__help">Format File : .jpg, .png, .jpeg (maks.10MB)</span>
                                    </div>
                                </div>
                                <br>
                                {{-- @foreach ($item as $item) --}}
                                <div class="alert alert-dismissible fade show   m-alert m-alert--outline m-alert--air" role="alert">
                                    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    </button> --}}
                                      <strong>{{$item->image}}</strong>				  	
                                </div>
                                      {{-- <span class="m-form__help">{{ $item->image }}</span> --}}
                                {{-- @endforeach --}}
                              
                            </div>
                        </div>	
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">Logo:</label>
                            <div class="col-lg-6">
                                <div class="m-input-icon m-input-icon--right">
                                    <div class="custom-file">
                                        <input type="file" name="logo" class="custom-file-input" id="customFile" >
                                        <label class="custom-file-label" for="customFile" >Choose file </label>
                                        <span class="m-form__help">Format File : .jpg, .png, .jpeg (maks.10MB)</span>
                                    </div>
                                </div>
                                <br>
                                {{-- @foreach ($item as $item) --}}
                                <div class="alert alert-dismissible fade show   m-alert m-alert--outline m-alert--air" role="alert">
                                    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    </button> --}}
                                      <strong>{{$item->logo}}</strong>				  	
                                </div>
                                      {{-- <span class="m-form__help">{{ $item->image }}</span> --}}
                                {{-- @endforeach --}}
                              
                            </div>
                        </div>	            
                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10" >
                                    <div class="btn-group  pull-right">
                                          <button type="submit" id="submit" class="btn btn-success">Submit</button>
                                    <a href="/preference" class="btn btn-default">Back</a>
                                    </div>
                                    {{-- @foreach ($item as $item) --}}
                                  
                                        {{-- <a href="/itemerence/edit/{{ $item->id }}" type="submit" class="btn btn-success pull-right">Edit</a> --}}
                                    {{-- @endforeach --}}
                                    
                                    {{-- <a href="/itemerence" type="cancel" class="btn btn-default">Back</a> --}}
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