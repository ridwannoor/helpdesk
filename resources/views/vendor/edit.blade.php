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
            <form class="m-form m-form--label-align-right" method="POST" action="/vendor/update"
                enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="_method" value="PUT" />
                    <input type="hidden" name="id" value="{{$vendors->id}}" />
                </div>
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-2">
                                <label>Kode Perusahaan</label>
                                <input type="text" name="kode" class="form-control m-input" value="{{ $vendors->kode }}">
                                <span class="m-form__help">Example : XXX-0000</span>
                            </div>
                              <div class="col-lg-2">
                                <label>Badan Usaha</label>                          
                                <select name="badanusaha_id" class="form-control m-bootstrap-select m_selectpicker">
                                    <option value="{{$vendors->badanusaha_id}}">{{ $vendors->badanusaha->kode }}</option>
                                    @foreach ($badan as $d)
                                    @if ($vendors->badanusaha_id != $d->id){
                                    <option value="{{$d->id}}">{{ $d->kode }}</option>
                                    }
                                    @endif
                                    @endforeach   
{{-- 
                                    @foreach ($badan as $item)
                                    <option value="{{$item->id}}">{{ $item->kode }}</option>
                                    @endforeach                                     --}}
                                </select>
                            </div>                    
                            <div class="col-lg-4">
                                <label>Nama Perusahaan</label>
                                <div class="input-group">
                                    <input type="text" name="namaperusahaan" class="form-control m-input"  style="text-transform: uppercase" value="{{ $vendors->namaperusahaan }}">
                                    <div class="input-group-append">
                                        <button class="btn btn btn-secondary" id="basic-addon2" type="button"><i class="flaticon-home"></i></button>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-lg-4">
                                <label>NPWP</label>
                                <input type="text" name="npwp" class="form-control m-input" value="{{ $vendors->npwp }}">
                                {{-- <span class="m-form__help">We'll never share your email with anyone else</span> --}}
                            </div>
                            
                        </div>
                        <div class="form-group m-form__group row">
                           
                           
                            <div class="col-lg-4">
                                <label>Phone Company</label>
                                <div class="input-group control-group">
                                    <input type="text" name="notelp" onkeypress="return hanyaAngka(event)" value="{{ $vendors->notelp }}" class="form-control m-input">
                                    <div class="input-group-append">
                                        {{-- <a href="javascript:void(0);" class="btn btn-secondary add_button">+</a> --}}
                                        <button class="btn btn btn-secondary" id="basic-addon2" type="button"><i class="fa fa-phone"></i></button>
                                    </div>
                                </div>
                                {{-- <div class=">

                                </div> --}}
                            </div>         
                            <div class="col-lg-4">
                                <label>Email</label>
                                <div class="input-group">
                                    <input type="email" name="email" class="form-control m-input" value="{{ $vendors->email }}" >
                                    <div class="input-group-append">
                                        <button class="btn btn btn-secondary" id="basic-addon2" type="button"><i class="flaticon-mail-1"></i></button>
                                    </div>
                                </div> 
                            </div>
                            
                            <div class="col-lg-4">
                                <label>Website</label>
                                <div class="input-group">
                                    <input type="text" name="website" class="form-control m-input" value="{{ $vendors->website }}">
                                    <div class="input-group-append">
                                        <button class="btn btn btn-secondary" id="basic-addon2" type="button"><i class="flaticon-globe"></i></button>
                                    </div>
                                </div> 
                            </div>
                            {{-- <div class="col-lg-4">     
                                <label>Lokasi</label>                           
                                <select name="lokasi_id" class="form-control m-bootstrap-select m_selectpicker" id="lokasi_id">                                           
                                    <option value="{{$vendors->lokasi_id}}">{{ $vendors->lokasi->kode }}</option>
                                    @foreach ($lokasis as $d)
                                    @if ($vendors->lokasi_id != $d->id){
                                    <option value="{{$d->id}}">{{ $d->kode }}</option>
                                    }
                                    @endif
                                    @endforeach                                           
                                </select>
                            </div> --}}
                           

                            
                        </div>
                      
                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control m-input" cols="30"
                                    rows="3">{{ $vendors->alamat }}</textarea>
                                {{-- <input type="text" name="alamat" class="form-control m-input" placeholder="Detail"> --}}
                                {{-- <span class="m-form__help">We'll never share your email with anyone else</span> --}}
                            </div>
                           
                            <div class="col-lg-6">
                                <label>Provinsi</label>
                                <select name="provinsi_id" id="provinsi" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                                    <option value="{{ $vendors->provinsi_id }}">{{ $vendors->provinsi->name }}</option>
                                    @foreach ($provinsi as $item)
                                        @if ($vendors->provinsi_id != $item->id)
                                               <option value="{{ $item->id }}">{{ $item->name }}</option>    
                                        @endif                                 
                                    @endforeach                                
                                </select>        
                                {{-- <textarea name="alamat_domisili" class="form-control m-input" cols="30"
                                    rows="3">{{ $vendors->alamat_domisili }}</textarea> --}}
                                {{-- <input type="text" name="alamat" class="form-control m-input" placeholder="Detail"> --}}
                                {{-- <span class="m-form__help">We'll never share your email with anyone else</span> --}}
                            </div>
                          
                            
                        </div>
                        
                        <div class="form-group m-form__group row">
                          
                           
                            <div class="col-lg-3">
                                <label>Contact Person</label>
                                <div class="input-group">
                                    <input type="text" name="contactperson" class="form-control m-input"   value="{{ $vendors->contactperson }}">
                                    <div class="input-group-append">
                                        {{-- <a href="javascript:void(0);" class="btn btn-secondary add_button">+</a> --}}
                                        <button class="btn btn btn-secondary" id="basic-addon2" type="button"><i class="flaticon-user"></i></button>
                                    </div>
                                </div>                               
                                {{-- <span class="m-form__help">We'll never share your email with anyone else</span> --}}
                            </div>
                    
                         
                            <div class="col-lg-3">
                                <label>Handphone</label>
                                <div class="input-group control-group">
                                    <input type="text" name="handphone" onkeypress="return hanyaAngka(event)" class="form-control m-input" value="{{ $vendors->handphone }}">
                                    <div class="input-group-append">
                                        {{-- <a href="javascript:void(0);" class="btn btn-secondary add_button">+</a> --}}
                                        <button class="btn btn btn-secondary" id="basic-addon2" type="button"><i class="fa fa-phone"></i></button>
                                    </div>
                                </div>
                                {{-- <div class=">

                                </div> --}}
                            </div>
                            
                            <div class="col-lg-3">
                                <label>Contact Person Alternative</label>
                                <div class="input-group">
                                    <input type="text" name="alternative_person" class="form-control m-input"  value="{{ $vendors->alternative_person }}">
                                    <div class="input-group-append">
                                        {{-- <a href="javascript:void(0);" class="btn btn-secondary add_button">+</a> --}}
                                        <button class="btn btn btn-secondary" id="basic-addon2" type="button"><i class="flaticon-user"></i></button>
                                    </div>
                                </div>                               
                                {{-- <span class="m-form__help">We'll never share your email with anyone else</span> --}}
                            </div>
                        
                           
                            <div class="col-lg-3">
                                <label>Phone Alternative</label>
                                <div class="input-group control-group">
                                    <input type="text" name="alternative_phone" onkeypress="return hanyaAngka(event)" class="form-control m-input" value="{{ $vendors->alternative_phone }}">
                                    <div class="input-group-append">
                                        {{-- <a href="javascript:void(0);" class="btn btn-secondary add_button">+</a> --}}
                                        <button class="btn btn btn-secondary" id="basic-addon2" type="button"><i class="fa fa-phone"></i></button>
                                    </div>
                                </div>
                                {{-- <div class=">

                                </div> --}}
                            </div>
                        </div>
                       
                        <div class="form-group m-form__group row">
                            @php
                            if(isset($vendors)) {
                            $jpek = $vendors->jenispekerjaans->pluck('id')->all();
                            } else {
                            $jpek = null;
                            }
                            @endphp
                            <div class="col-lg-3">
                                <label class="">Bidang Pekerjaan:</label>
                                <div class="input-group m-input-group m-input-group--square">
                                    {!! Form::select('jenispekerjaans[]', $jenispekerjaans, $jpek, ['class' => 'form-control m-bootstrap-select m_selectpicker', 'required', 'multiple', 'data-live-search' => 'true']) !!} 
                                 </div>  
                            </div>
                            @php
                            if(isset($vendors)) {
                            $jns = $vendors->jenisusahas->pluck('id')->all();
                            } else {
                            $jns = null;
                            }
                            @endphp
                            <div class="col-lg-3">
                                <label class="">Jenis Usaha:</label>
                                <div class="input-group m-input-group m-input-group--square">
                                {!! Form::select('jenisusahas[]', $jenisusahas, $jns, ['class' => 'form-control m-bootstrap-select m_selectpicker', 'required', 'multiple', 'data-live-search' => 'true']) !!} 
                                </div>
                            </div>
                            @php
                            if(isset($vendors)) {
                            $cat = $vendors->categories->pluck('id')->all();
                            } else {
                            $cat = null;
                            }
                            @endphp
                            <div class="col-lg-3">
                                <label class="">Category:</label>
                                <div class="input-group m-input-group m-input-group--square">
                                    {!! Form::select('categories[]', $categories, $cat, ['class' => 'form-control m-bootstrap-select m_selectpicker', 'required', 'multiple', 'data-live-search' => 'true']) !!} 
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label>Product</label>
                                <input type="text" name="product" class="form-control m-input" value="{{ $vendors->product }}">
                                {{-- <span class="m-form__help">We'll never share your email with anyone else</span> --}}
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                          
                            <div class="col-lg-12">
                                <label>Catatan</label>
                                <div class="input-group">
                                    <textarea name="catatan" id="catatan" cols="30" rows="3" class="form-control m-input">{{ $vendors->catatan }}</textarea>
                                    {{-- <input type="text" name="website" class="form-control m-input" > --}}
                                    {{-- <div class="input-group-append">
                                        <button class="btn btn btn-secondary" id="basic-addon2" type="button"><i class="flaticon-globe"></i></button>
                                    </div> --}}
                                </div> 
                            </div>
                        </div>
                        <hr>
                       
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


@section('footer-script')
    
<script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
@endsection