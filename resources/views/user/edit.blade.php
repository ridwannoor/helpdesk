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
                    <form class="m-form m-form--label-align-right" method="POST" action="/user/update" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="PUT" />
                            <input type="hidden" name="id" value="{{$user->id}}" />
                        </div>                   
                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">Nama</label>
                                    <div class="col-lg-6">
                                    <input type="text" name="name" class="form-control m-input" value="{{$user->name}}">
                                        {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">Email</label>
                                    <div class="col-lg-6">
                                        <input type="email" name="email" class="form-control m-input" value="{{$user->email}}">
                                        {{-- <span class="m-form__help">We'll never share your email with anyone else</span> --}}
                                    </div>
                                </div>
                                @php
                                if(isset($user)) {
                                $lokasi = $user->lokasis->pluck('id')->all();
                                } else {
                                $lokasi = null;
                                }
                                @endphp
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">Lokasi:</label>
                                    <div class="col-lg-6">
                                        {!! Form::select('lokasis[]', $lokasis, $lokasi, ['class' => 'form-control m-bootstrap-select m_selectpicker', 'required', 'multiple', 'data-actions-box'=>'true']) !!} 
                                        {{-- <select class="form-control m-bootstrap-select m_selectpicker" name="lokasi_id[]" multiple>
                                            <option value="{{$user->lokasi_id}}">{{ $user->lokasi->kode }}</option>      
                                            @foreach ($lokasis as $item)
                                                @if ($users->lokasi_id != $item->id){
                                                <option value="{{$item->id}}">{{ $item->kode }}</option>
                                                }
                                                @endif                                    
                                            @endforeach
                                        </select> --}}
                                    </div>                           
                                </div>
                                {{-- {!! Form::select('lokasis[]', $lokasis, $lokasi, ['class' => 'form-control chosen', 'required', 'multiple']) !!}                                               --}}
                               
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">Password</label>
                                    <div class="col-lg-6">
                                        <input type="password" name="password" class="form-control m-input" value="{{$user->name}}">
                                        {{-- <span class="m-form__help">We'll never share your email with anyone else</span> --}}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">Password Confirmation</label>
                                    <div class="col-lg-6">
                                        <input type="password" id="password-confirm" name="password-confirmation" class="form-control m-input" placeholder="Enter Password Confirmation" required>
                                        {{-- <span class="m-form__help">We'll never share your email with anyone else</span> --}}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">Upload Image</label>
                                    <div class="col-lg-6">
                                    <input type="file" name="image" class="form-control m-input" >
                                        <span class="m-form__help">{{$user->image}}</span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">Status</label>
                                    <div class="col-lg-6">
                                        <select name="status" id="status" class="form-control m-bootstrap-select m_selectpicker">
                                            @if ($user->status == 'active')
                                                <option value="active">Aktif</option>
                                                <option value="nonactive">Tidak Aktif</option>
                                            @else
                                                <option value="nonactive">Tidak Aktif</option>
                                                <option value="active">Aktif</option>
                                            @endif
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
                                        <a href="/user" class="btn btn-default">Back</a>
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