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
        <div class="m-portlet  m-portlet--brand m-portlet--head-solid-bg m-portlet--rounded">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                          <i class="fa fa-home" aria-hidden="true"></i> &nbsp {{ $judul }}
                        </h3>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form class="m-form m-form--label-align-right" method="POST" action="/vendor/store"
                enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="_method" value="POST" />
                    {{-- <input type="hidden" name="id" value="{{$dept->id}}" /> --}}
                </div>
                <div class="m-portlet__body">
                    {{-- <div class="m-form__section m-form__section--first"> --}}
                        <div class="form-group m-form__group row">
                            <div class="col-lg-2">
                                <label>Kode Perusahaan</label>                           
                                    <input type="text" name="kode" class="form-control m-input" >
                                    <span class="m-form__help">Example : XXX-00000</span>
                                </div>
                            <div class="col-lg-2"> 
                            <label>Badan Usaha</label>  
                                <select name="badanusaha_id" class="form-control m-bootstrap-select m_selectpicker" id="badanusaha_id" required>
                                    <option value="">Please Select</option>
                                    @foreach ($badan as $item)
                                    <option value="{{$item->id}}">{{ $item->kode }}</option>
                                    @endforeach                                    
                                </select>
                            </div>
                            <div class="col-lg-4">
                            <label>Nama Perusahaan</label>
                                <div class="input-group">
                                    <input type="text" name="namaperusahaan" class="form-control m-input" style="text-transform: uppercase">
                                    <div class="input-group-append">
                                        <button class="btn btn btn-secondary" id="basic-addon2" type="button"><i class="flaticon-home"></i></button>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-lg-4">
                                <label>NPWP</label>                           
                                    <input type="text" name="npwp" class="form-control m-input" >
                                    {{-- <span class="m-form__help">We'll never share your email with anyone else</span> --}}
                                </div>
                          
                        </div>
                        <div class="form-group m-form__group row">
                            
                           
                            <div class="col-lg-4 ">
                                <label>Phone Company</label>
                               
                                    <div class="input-group control-group">
                                        <input type="text" name="notelp" onkeypress="return hanyaAngka(event)" class="form-control m-input">
                                        <div class="input-group-append">
                                            {{-- <a href="javascript:void(0);" class="btn btn-secondary add_button">+</a> --}}
                                            <button class="btn btn btn-secondary" id="basic-addon2" type="button"><i class="fa fa-phone"></i></button>
                                        </div>
                                    </div>
                                    {{-- <div class="">
        
                                    </div> --}}
                                </div>   
                                <div class="col-lg-4">
                                    <label>Email</label>
                                  
                                      <div class="input-group">
                                          <input type="email" name="email" class="form-control m-input" >
                                          <div class="input-group-append">
                                              <button class="btn btn btn-secondary" id="basic-addon2" type="button"><i class="flaticon-mail-1"></i></button>
                                          </div>
                                      </div> 
                                  </div>
                                  <div class="col-lg-4">
                                    <label>Website</label>
                                   
                                        <div class="input-group">
                                            <input type="text" name="website" class="form-control m-input" >
                                            <div class="input-group-append">
                                                <button class="btn btn btn-secondary" id="basic-addon2" type="button"><i class="flaticon-globe"></i></button>
                                            </div>
                                        </div> 
                                </div>
                                  
                            {{-- <div class="col-lg-4">
                                <label>Lokasi</label>
                                
                                    <select name="lokasi_id" class="form-control m-bootstrap-select m_selectpicker" id="lokasi_id">
                                        @foreach ($lokasis as $item)
                                        <option value="{{ $item->id }}" >{{ $item->kode }}</option>                                        
                                        @endforeach                                       
                                    </select>    
                                </div> --}}
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>Alamat Domisili</label>                                
                                    <textarea name="alamat" class="form-control m-input" cols="30"
                                        rows="5"></textarea>
                                </div>
                                <div class="col-lg-6">
                                    <label>Provinsi</label>   
                                    <select name="provinsi_id" id="provinsi" data-live-search="true" class="form-control m-bootstrap-select m_selectpicker" required>
                                        {{-- <option value="{{ $vendors->provinsi_id }}">{{ $vendors->provinsi->name }}</option> --}}
                                        @foreach ($provinsi as $item)
                                            {{-- @if ($vendors->provinsi_id != $item->id) --}}
                                                   <option value="{{ $item->id }}">{{ $item->name }}</option>    
                                            {{-- @endif                                  --}}
                                        @endforeach                                
                                    </select>                             
                                        {{-- <textarea name="alamat_domisili" class="form-control m-input" cols="30"
                                            rows="5"></textarea> --}}
                                    </div>
                        </div>
                     <div class="form-group m-form__group row">
                        
                        
                        <div class="col-lg-3">
                        <label>Contact Person</label>
                        
                            <div class="input-group">
                                <input type="text" name="contactperson" class="form-control m-input"  >
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
                                <input type="text" name="handphone" onkeypress="return hanyaAngka(event)" class="form-control m-input">
                                <div class="input-group-append">
                                    {{-- <a href="javascript:void(0);" class="btn btn-secondary add_button">+</a> --}}
                                    <button class="btn btn btn-secondary" id="basic-addon2" type="button"><i class="fa fa-phone"></i></button>
                                </div>
                            </div>
                            {{-- <div class="input_fields_wrap">

                            </div> --}}
                        </div>
                        <div class="col-lg-3">
                            <label>Contact Person Alternative</label>
                          
                                <div class="input-group">
                                    <input type="text" name="alternative_person" class="form-control m-input"  >
                                    <div class="input-group-append">
                                        {{-- <a href="javascript:void(0);" class="btn btn-secondary add_button">+</a> --}}
                                        <button class="btn btn btn-secondary" id="basic-addon2" type="button"><i class="flaticon-user"></i></button>
                                    </div>
                                </div>                               
                                {{-- <span class="m-form__help">We'll never share your email with anyone else</span> --}}
                            </div> 
                            <div class="col-lg-3 ">
                            <label>Phone Alternative</label>
                            
                                <div class="input-group control-group">
                                    <input type="text" name="alternative_phone" onkeypress="return hanyaAngka(event)" class="form-control m-input">
                                    <div class="input-group-append">
                                        {{-- <a href="javascript:void(0);" class="btn btn-secondary add_button">+</a> --}}
                                        <button class="btn btn btn-secondary" id="basic-addon2" type="button"><i class="fa fa-phone"></i></button>
                                    </div>
                                </div>
                                {{-- <div class="input_fields_wrap">
    
                                </div> --}}
                            </div>
                    </div>
                 
                    <div class="form-group m-form__group row">
                        <div class="col-lg-3">
                            <label>Bidang Pekerjaan</label>                  
                                <select name="jenispekerjaan_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" multiple required>
                                    <option value="">Please Select</option>
                                    @foreach ($jpeks as $item)
                                    <option value="{{$item->id}}">{{ $item->name }}</option>
                                    @endforeach                                    
                                </select>
                                {{-- <input type="text" name="bidangusaha" class="form-control m-input" > --}}
                                {{-- <span class="m-form__help">We'll never share your email with anyone else</span> --}}
                            </div>
                    <div class="col-lg-3">
                     <label>Bidang Usaha</label>                  
                         <select name="jenisusaha_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" multiple required>
                             <option value="">Please Select</option>
                             @foreach ($jns as $item)
                             <option value="{{$item->id}}">{{ $item->detail }}</option>
                             @endforeach                                    
                         </select>
                         {{-- <input type="text" name="bidangusaha" class="form-control m-input" > --}}
                         {{-- <span class="m-form__help">We'll never share your email with anyone else</span> --}}
                     </div>
                      <div class="col-lg-3">
                      <label>Kategori Usaha</label>                    
                         <select name="category_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" multiple required>
                             <option value="">Please Select</option>
                             @foreach ($cat as $item)
                             <option value="{{$item->id}}">{{ $item->detail }}</option>
                             @endforeach                                    
                         </select>
                     </div>
                      <div class="col-lg-3">
                       <label>Product</label>
                    
                         <input type="text" name="product" class="form-control m-input" >
                         {{-- <span class="m-form__help">We'll never share your email with anyone else</span> --}}
                     </div>
                 </div>
                    <div class="form-group m-form__group row">
                      
                       <div class="col-lg-12">
                       <label>Catatan</label>
                       
                           <div class="input-group">
                               <textarea name="catatan" id="catatan" cols="30" rows="5" class="form-control m-input"></textarea>
                               {{-- <input type="text" name="website" class="form-control m-input" > --}}
                               {{-- <div class="input-group-append">
                                   <button class="btn btn btn-secondary" id="basic-addon2" type="button"><i class="flaticon-globe"></i></button>
                               </div> --}}
                           </div> 
                       </div>
                       
                       {{-- <div class="col-lg-6">
                       <label>Upload File</label>
                      
                           <div class="custom-file">
                               <input type="file" class="custom-file-input" name="filename[]" id="customFile">
                               <label class="custom-file-label" for="customFile">Choose file</label>
                         </div>
                       
                       </div> --}}
                   </div>
                 
                        <hr>
                      
                   
                       
                     


                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            {{-- <div class="col-lg-2"></div> --}}
                            <div class="col-lg-12 ">
                                <div class="btn-group pull-right">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="/vendor" class="btn btn-default">Kembali</a>
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
{{-- 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
	var max_fields      = 3; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
	var add_button      = $(".add_field_button"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
            // $(wrapper).append('<div class="input-group control-group"><input type="text" name="notelp[]" onkeypress="return hanyaAngka(event)" class="form-control m-input"><a href="#" class="btn btn btn-danger remove_field">-</a></div>');
            var newtag = '<div class="input-group control-group"><input type="text" name="notelp[]" onkeypress="return hanyaAngka(event)" class="form-control m-input"><a href="#" class="btn btn btn-danger remove_field">-</a></div>';
            $(wrapper).append(newtag);  
			// $(wrapper).append(' <div class="col-lg-6"><div class="input-group control-group"><input type="text" name="notelp[]" class="form-control m-input"><div class="input-group-append"><button class="btn btn btn-danger add_field_button" type="button"><i class="glyphicon glyphicon-plus"></i>-</button></div></div></div>'); //add input box
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});
</script>
--}}


<script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
@endsection 