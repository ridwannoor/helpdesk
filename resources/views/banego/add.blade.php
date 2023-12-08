@extends('layouts.app2')

@section('header-script')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

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
                <form class="m-form m-form--label-align-right" method="POST" action="/banego/store" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="POST" />
                        {{-- <input type="hidden" name="id" value="{{$dept->id}}" /> --}}
                    </div>                   
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">                                
                            <div class="form-group m-form__group row">
                                <div class="col-lg-3">
                                    <label>No Berita Acara</label>
                                    <input type="text" name="no_ba" class="form-control m-input" value="{{ $noUrutAkhir }}" >                                        
                                </div>
                                <div class="col-lg-3">
                                    <label>Nilai RAP</label>
                                    <input type="text" name="nilai_rap" class="form-control m-input" required>
                                </div>
                                <div class="col-lg-6">
                                    <label>Nama Pekerjaan</label>
                                    <textarea name="nama_pek" id="nama_pek" class="form-control m-input" cols="30" rows="5"></textarea>
                                </div>
                            </div>                           
                            
                            <div class="form-group m-form__group row">                                
                                <div class="col-lg-3">
                                    <label>Tanggal</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control m-input" name="tanggal" readonly placeholder="Select Date" id="tanggal"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-lg-3">
                                    <label>Lokasi Nego</label>
                                    <input type="text" name="lokasi_nego" class="form-control m-input" >
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                                <div class="col-lg-3">
                                    <label>Divisi Terkait</label>
                                    <div class="input-group m-input-group m-input-group--square">
                                        <select name="divisi_id[]" class="form-control m-bootstrap-select m_selectpicker" id="divisi_id" multiple>
                                            @foreach ($divisis as $item)
                                            <option value="{{ $item->id }}">{{ $item->kode }}</option>                                        
                                            @endforeach                                       
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>Mitra Pengadaan</label>
                                    <div class="input-group m-input-group m-input-group--square">
                                     
                                        <select name="vendor_id" data-live-search="true" class="form-control m-bootstrap-select m_selectpicker" id="vendor_id">
                                            @foreach ($vendors as $item)
                                            <option value="{{ $item->id }}">{{ $item->namaperusahaan }}, {{ $item->badanusaha->kode }}</option>                                        
                                            @endforeach                                       
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">                                
                                <div class="col-lg-3">
                                    <label>No SPPH</label>
                                    <input type="text" name="spph" class="form-control m-input"  placeholder="No SPPH">
                                </div>
                            
                                <div class="col-lg-3">
                                    <label>Jumlah Penawaran</label>
                                    <input type="text" name="jml_penawaran" class="form-control m-input" onkeypress="return hanyaAngka(event)" placeholder="Jumlah Penawaran">
                                </div>
                            
                                {{-- <div class="col-lg-3">
                                    <label>No SPPH Nego</label>
                                    <input type="text" name="spph_nego" class="form-control m-input" placeholder="No SPPH Nego">
                                </div> --}}
                                <div class="col-lg-3">
                                    <label>Jumlah Nego</label>
                                    <input type="text" name="jml_nego" class="form-control m-input" onkeypress="return hanyaAngka(event)" placeholder="Jumlah Nego">
                                </div>
                            
                            </div>
                            
                            <div class="form-group m-form__group row">
                                <div class="col-lg-3">
                                    <label>Waktu Pelaksanaan</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control m-input" name="start_date" id="startdate" readonly placeholder="Start Date"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>&nbsp;</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control m-input" name="end_date" id="enddate" readonly placeholder="End Date"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>Waktu Pelaksanaan (Hari)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control m-input" name="waktu_pel" onkeypress="return hanyaAngka(event)" placeholder="Waktu Pelaksanaan" aria-describedby="basic-addon2">
                                            <div class="input-group-append"><span class="input-group-text" id="basic-addon2">hari</span></div>
                                        </div>
                                    
                                </div>
                                <div class="col-lg-3">
                                    <label>Garansi</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control m-input" name="garansi" placeholder="Garansi" aria-describedby="basic-addon2">
                                            <div class="input-group-append"><span class="input-group-text" id="basic-addon2">hari</span></div>
                                        </div>
                                </div>
                                
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-3">
                                    <label>Asuransi</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control m-input" name="asuransi" onkeypress="return hanyaAngka(event)" placeholder="Asuransi" aria-describedby="basic-addon2">
                                            <div class="input-group-append"><span class="input-group-text" id="basic-addon2">hari</span></div>
                                        </div>
                                </div>  
                                <div class="col-lg-3">
                                    <label>Masa Pemeliharaan</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control m-input" name="masapemeliharaan" onkeypress="return hanyaAngka(event)" placeholder="Masa Pemeliharaan" aria-describedby="basic-addon2">
                                            <div class="input-group-append"><span class="input-group-text" id="basic-addon2">hari</span></div>
                                        </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>Down Payment</label>
                                    <div class="m-radio-inline" id="downpayment">
                                        <label class="m-radio">
                                            <input type="radio" name="downpayment" value="include">Include DP
                                            <span></span>
                                        </label>
                                        <label class="m-radio">
                                            <input type="radio" name="downpayment" value="exclude"> Exclude DP
                                            <span></span>
                                        </label>
                                        <p class="m-form__help"><input type="text" class="form-control m-input" id="nilaidp" style="display:none" placeholder="hanya angka, contoh : 10" name="nilaidp" onkeypress="return hanyaAngka(event)"></p>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>Pajak</label>
                                    <div class="m-radio-inline">
                                        <label class="m-radio">
                                            <input type="radio" name="pajak" value="include">Include Pajak
                                            <span></span>
                                        </label>
                                        <label class="m-radio">
                                            <input type="radio" name="pajak" value="exclude"> Exclude Pajak
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label>Tempat Serah Terima </label>
                                    <div class="m-input-icon m-input-icon--left">
                                        <input type="text" class="form-control m-input" name="tempat" placeholder="Lokasi">
                                        <span class="m-input-icon__icon m-input-icon__icon--left"><span><i class="la la-map-marker"></i></span></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>Pengiriman Oleh</label>
                                    <div class="m-input-icon m-input-icon--left">
                                        <input type="text" class="form-control m-input" name="pengirim" placeholder="Pengirim">
                                        <span class="m-input-icon__icon m-input-icon__icon--left"><span><i class="la la-cab"></i></span></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>Training</label>
                                    <input type="text" name="training" class="form-control m-input" placeholder="Training">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">                                    
                                <div class="col-lg-6">
                                    <label>Cara Pembayaran</label>
                                    <textarea name="cara_pembayaran"  id="summernote" class="form-control m-input"></textarea>
                                </div>
                                <div class="col-lg-6">
                                    <label>Catatan</label>
                                    <textarea name="catatan"  id="summernote1" class="form-control m-input"></textarea>
                                </div>
                                
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label>Jaminan</label>
                                    <select name="jaminan_id" class="form-control m-bootstrap-select m_selectpicker">
                                        @foreach ($jams as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach                                      
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label>Biaya Dokument</label>
                                    <select name="bidok_id" class="form-control m-bootstrap-select m_selectpicker">
                                        @foreach ($bidoks as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach   
                                    </select>
                                    {{-- <input type="text" name="biaya_dok" class="form-control m-input" onkeypress="return hanyaAngka(event)" placeholder="Biaya Dok"> --}}
                                </div>
                                <div class="col-lg-4">
                                    <label>Dokument</label>
                                    <div class="input-group m-input-group m-input-group--square">
                                        <select name="dokpekerjaan_id[]" class="form-control m-bootstrap-select m_selectpicker" id="divisi_id" multiple required>
                                            @foreach ($doks as $item)
                                            <option value="{{ $item->id }}">{{ $item->kode }}</option>                                        
                                            @endforeach                                       
                                        </select>
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
                                    <a href="/banego" class="btn btn-default">Back</a>
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
<script src="assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
     $('#summernote').summernote({
            height: "100px"
        });
        $('#summernote1').summernote({
            height: "100px"
        });
</script>
<script>
    function myFunction() {
        // Get the checkbox
        var checkBox = document.getElementById("myCheck");
        // Get the output text
        var text = document.getElementById("text");
    
        // If the checkbox is checked, display the output text
        if (checkBox.checked == true){
        text.style.display = "block";
        } else {
        text.style.display = "none";
        }
    }

    $(document).ready(function () {
        $('#tanggal').datepicker({
         //merubah format tanggal datepicker ke dd-mm-yyyy
            format: "yyyy-mm-dd",
            //aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
            //format: "dd-mm-yyyy",
            autoclose: true
        }),

        $('#startdate').datepicker({
         //merubah format tanggal datepicker ke dd-mm-yyyy
            format: "yyyy-mm-dd",
            //aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
            //format: "dd-mm-yyyy",
            autoclose: true
        }),
        $('#enddate').datepicker({
         //merubah format tanggal datepicker ke dd-mm-yyyy
            format: "yyyy-mm-dd",
            //aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
            //format: "dd-mm-yyyy",
            autoclose: true
        }),
        
        $("#downpayment input[type='radio']").change(function(){
            if($(this).val()=="include")
            {
                $("#nilaidp").show();
            }
            else
            {                
                $("#nilaidp").hide(); 
            }
        });
    });
</script>

@endsection