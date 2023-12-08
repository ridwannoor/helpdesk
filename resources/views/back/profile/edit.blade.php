@extends('back.layouts.app')

@section('header-script')

@endsection


@section('m-content')
<div class="m-content">
    <div class="row">
       <div class="col-lg-12">
        <div class="m-portlet m-portlet--brand m-portlet--head-solid-bg">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
							Edit Profile Perusahaan
						</h3>
					</div>
				</div>
			</div>
			<!--begin::Form-->
			<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="/vendor/profile/update" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="_method" value="PUT" />
                    <input type="hidden" name="id" value="{{$vendors->id}}" />
                </div>
				<div class="m-portlet__body">	
					<div class="form-group m-form__group row">
                        <div class="col-lg-2">
                            <label for="badanusaha">Badan Usaha *</label>
                            <select name="badanusaha_id" id="badanusaha" class="form-control m-bootstrap-select m_selectpicker" required>
                                <option value="{{ $vendors->badanusaha_id }}">{{ $vendors->badanusaha->kode }}</option>
                                @foreach ($badanusaha as $item)
                                    @if ($vendors->badanusaha_id != $item->id)
                                           <option value="{{ $item->id }}">{{ $item->kode }}</option>    
                                    @endif                                 
                                @endforeach                                
                            </select>
                        </div>
						<div class="col-lg-4">
							<label>Nama Perusahaan *</label>
							<input type="text" class="form-control m-input" name="namaperusahaan" value="{{ $vendors->namaperusahaan }}" required>
							{{-- <span class="m-form__help">Please enter your full name</span> --}}
						</div>
						<div class="col-lg-3">
							<label class="">NPWP *</label>
							<div class="m-input-icon m-input-icon--right">
								<input type="text" class="form-control m-input" name="npwp" value="{{ $vendors->npwp }}" required>
								<span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-file"></i></span></span>
							</div>
							{{-- <span class="m-form__help">Please enter your postcode</span> --}}
						</div>
						<div class="col-lg-3">
							<label class="">No Telp *</label>
							<div class="m-input-icon m-input-icon--right">
								<input type="text" name="notelp" class="form-control m-input" value="{{ $vendors->notelp }}" required>
								<span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-phone"></i></span></span>
							</div>
							{{-- <span class="m-form__help">Please enter your postcode</span> --}}
						</div>
					</div>	 
                  
					<div class="form-group m-form__group row">
						{{-- <div class="col-lg-4">
							<label>Product:</label>
							<div class="m-input-icon m-input-icon--right">
								<input type="text" name="product" class="form-control m-input" value="{{ $vendors->product }}">
								<span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-file"></i></span></span>
							</div>
						</div> --}}
						<div class="col-lg-4">
							<label class="">Alamat Domisili*</label>
                            <textarea name="alamat" class="form-control m-input" id="alamat" cols="30" rows="4" required>{{ $vendors->alamat }}</textarea>
							{{-- <input type="text" class="form-control m-input" placeholder="Enter contact number"> --}}
							{{-- <span class="m-form__help">Please enter your contact number</span> --}}
						</div>
						<div class="col-lg-4">
                            <label for="provinsi">Provinsi *</label>
                            <select name="provinsi_id" id="provinsi" class="form-control m-bootstrap-select m_selectpicker" required>
                                <option value="{{ $vendors->provinsi_id }}">{{ $vendors->provinsi->name }}</option>
                                @foreach ($provinsi as $item)
                                    @if ($vendors->provinsi_id != $item->id)
                                           <option value="{{ $item->id }}">{{ $item->name }}</option>    
                                    @endif                                 
                                @endforeach                                
                            </select>
                        </div>
						{{-- <div class="col-lg-4">
							<label class="">Alamat Domisili</label>
                            <textarea name="alamat_domisili" class="form-control m-input" id="alamat_domisili" cols="30" rows="4">{{ $vendors->alamat_domisili }}</textarea>
							
						</div> --}}
                        <div class="col-lg-4">
							<label>Email *</label>
							<div class="m-input-icon m-input-icon--right">
								<input type="email" name="email" class="form-control m-input" value="{{ $vendors->email }}" readonly required>
								<span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-envelope-o"></i></span></span>
							</div>
							{{-- <span class="m-form__help">Please enter your address</span> --}}
						</div>
						
					</div>	 
                    <div class="form-group m-form__group row">		
						<div class="col-lg-4">
							<label class="">Website </label>
							<div class="m-input-icon m-input-icon--right">
								<input type="text" name="website" class="form-control m-input"  value="{{ $vendors->website }}">
								<span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-globe"></i></span></span>
							</div>
							{{-- <span class="m-form__help">Please enter your postcode</span> --}}
						</div>				
						<div class="col-lg-4">
							<label class="">Contact Person *</label>
							<div class="m-input-icon m-input-icon--right">
								<input type="text" name="contactperson" class="form-control m-input" required value="{{ $vendors->contactperson }}">
								<span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-user"></i></span></span>
							</div>
							{{-- <span class="m-form__help">Please enter your postcode</span> --}}
						</div>
                       
                        <div class="col-lg-4">
							<label class="">Handphone *</label>
							<div class="m-input-icon m-input-icon--right">
								<input type="text" name="handphone" class="form-control m-input" required value="{{ $vendors->handphone }}">
								<span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-phone"></i></span></span>
							</div>
							{{-- <span class="m-form__help">Please enter your postcode</span> --}}
						</div>
					</div>	 
                    <div class="form-group m-form__group row">						
						<div class="col-lg-4">
							<label class="">Contact Person Alternative </label>
							<div class="m-input-icon m-input-icon--right">
								<input type="text" name="alternative_person" class="form-control m-input" value="{{ $vendors->alternative_person }}">
								<span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-user"></i></span></span>
							</div>
							{{-- <span class="m-form__help">Please enter your postcode</span> --}}
						</div>
                        <div class="col-lg-4">
							<label class="">Phone Alternatif</label>
							<div class="m-input-icon m-input-icon--right">
								<input type="text" name="alternative_phone" class="form-control m-input"  value="{{ $vendors->alternative_phone }}">
								<span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-phone"></i></span></span>
							</div>
							{{-- <span class="m-form__help">Please enter your postcode</span> --}}
						</div>
                       
					</div>
					<div class="form-group m-form__group row">						
						{{-- <div class="col-lg-3">
							<label class="">Lokasi:</label>
                            <select name="lokasi_id" id="lokasi" class="form-control m-bootstrap-select m_selectpicker">
                                <option value="{{ $vendors->lokasi_id }}">{{ $vendors->lokasi->kode }}</option>
                                @foreach ($lokasi as $item)
                                    @if ($vendors->lokasi_id != $item->id)
                                           <option value="{{ $item->id }}">{{ $item->kode }}</option>    
                                    @endif                                 
                                @endforeach                                
                            </select>
						</div> --}}
						@php
						if(isset($vendors)) {
						$jpek = $vendors->jenispekerjaans->pluck('id')->all();
						} else {
						$jpek = null;
						}
						@endphp
                        <div class="col-lg-3">
							<label class="">Bidang Pekerjaan *</label>
							<div class="input-group m-input-group m-input-group--square">
							{!! Form::select('jenispekerjaans[]', $jenispekerjaans, $jpek, ['class' => 'form-control m-bootstrap-select m_selectpicker', 'required', 'multiple']) !!} 
							</div>
							<span class="m-form__help">Lebih dari 1 Pilihan</span>
						</div>
						@php
						if(isset($vendors)) {
						$cates = $vendors->categories->pluck('id')->all();
						} else {
						$cates = null;
						}
						@endphp
                        <div class="col-lg-3">
							<label class="">Kategori Usaha *</label>
							<div class="input-group m-input-group m-input-group--square">
                            {!! Form::select('categories[]', $categories, $cates, ['class' => 'form-control m-bootstrap-select m_selectpicker', 'required', 'multiple']) !!} 
							</div>
								<span class="m-form__help">Lebih dari 1 Pilihan</span>
						</div>
						@php
						if(isset($vendors)) {
						$jen = $vendors->jenisusahas->pluck('id')->all();
						} else {
						$jen = null;
						}
						@endphp
                        <div class="col-lg-3">
							<label class="">Jenis Usaha *</label>
							<div class="input-group m-input-group m-input-group--square">
							{!! Form::select('jenisusahas[]', $jenisusahas, $jen, ['class' => 'form-control m-bootstrap-select m_selectpicker', 'required', 'multiple']) !!} 
							</div>
								<span class="m-form__help">Lebih dari 1 Pilihan</span>
						</div>
						<div class="col-lg-3">
							<label>Product </label>
							<div class="m-input-icon m-input-icon--right">
								<input type="text" name="product" class="form-control m-input" value="{{ $vendors->product }}">
								<span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="la la-file"></i></span></span>
							</div>
							{{-- <span class="m-form__help">Please enter your address</span> --}}
						</div>
					</div>	 	 
                    <div class="form-group m-form__group row">						
						<div class="col-lg-12">
							<label class="">Catatan:</label>
							<textarea name="catatan" id="catatan" class="form-control m-input" cols="30" rows="5">{{ $vendors->catatan }}</textarea>
						</div>
                       
					</div>	
	            </div>
	            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
					<div class="m-form__actions m-form__actions--solid">
						<div class="row">
							<div class="col-lg-12">
								<div class="btn-group pull-right">
									<button type="submit" class="btn btn-primary">Update</button>
									<a href="/vendor/profile" class="btn btn-default">Batal</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
			<!--end::Form-->
		</div>
       </div>            
    </div>
</div>
@endsection

@section('footer-script')

@endsection
