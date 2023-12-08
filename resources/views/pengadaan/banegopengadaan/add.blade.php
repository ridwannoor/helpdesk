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
                    <form class="m-form m-form--label-align-right" method="POST" action="/banegopengadaan/store" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="POST" />
                            {{-- <input type="hidden" name="id" value="{{$dept->id}}" /> --}}
                        </div>                   
                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-3">
                                    <label>Nomor BA Nego</label>                                    
                                        <input type="text" name="nomor_ba" class="form-control m-input" placeholder="Kode">
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Tanggal BA Nego</label>                                    
                                        <div class="input-group date"  data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="tanggal" placeholder="Select date & time" id="m_datetimepicker_2" required/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Nilai RAP</label>                                    
                                        <input type="text" name="nilai_rap" class="form-control m-input" placeholder="Nilai RAP">
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Pajak RAP</label>  
                                        <select name="pajak_rap" class="form-control m-bootstrap-select m_selectpicker" id="">
                                            <option value="Termasuk Pajak">Termasuk Pajak</option>    
                                            <option value="Tidak Termasuk Pajak">Tidak Termasuk Pajak</option>    
                                        </select>         
                                    </div>                                    
                                </div>
                                <div class="form-group m-form__group row">    
                                    <div class="col-lg-3">
                                        <label>Dasar Anggaran</label>  
                                        <select name="dasar_id"  class="form-control m-bootstrap-select m_selectpicker" id="dasar">
                                            @foreach ($dasars as $item)
                                            <option value="{{ $item->id }}">{{ $item->kode }}</option>
                                        @endforeach
                                        </select>        
                                    </div>                               
                                    
                                    <div class="col-lg-3">
                                        <label for="">Lokasi Nego</label>
                                        <input type="text" name="lokasi_nego" class="form-control m-input" placeholder="Lokasi">
                                    </div>
                                    <div class="col-lg-3">
                                    <label>Jangka Waktu Pelaksanaan</label>                                    
                                        <input type="text" name="jawa_pel" class="form-control m-input" >
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Jangka Waktu Pemeliharaan</label>                                    
                                        <input type="text" name="jawa_pem" class="form-control m-input" >
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">                                     
                                    <div class="col-lg-3">
                                        <label>Vendor</label>
                                        <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="vendor_id" id="vendor_id">
                                            @foreach ($vendors as $item)                                                
                                                <option value="{{ $item->id }}">{{ $item->namaperusahaan . ", " . $item->badanusaha->kode }}</option>
                                            @endforeach
                                        </select>
                                    </div>  
                                    <div class="col-lg-3">
                                        <label for="">Divisi Terkait</label>
                                        <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="divisi_id[]" id="divisi_id" multiple>
                                            @foreach ($divisis as $item)                                                
                                                <option value="{{ $item->id }}">{{ $item->kode }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Tanggal SPH </label>             
                                        <div class="input-group date"  data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="tgl_sph" placeholder="Select date" id="tgl_sph"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>     
                                    </div>
                                    <div class="col-lg-3">
                                        <label>No SPH </label>             
                                            <input type="text" name="spph" class="form-control m-input" placeholder="" aria-describedby="basic-addon2">      
                                    </div>
                                   
                                </div>                                
                                <div class="form-group m-form__group row"> 
                                    <div class="col-lg-3">
                                        <label>Nilai SPH </label>                                    
                                        <div class="input-group">
                                            <input type="text" name="jml_penawaran" class="form-control m-input" required placeholder="hanya angka" aria-describedby="basic-addon2">                                          
                                            <div class="input-group-append"><span class="input-group-text" id="basic-addon2">Rp</span></div>                                                                                   
                                        </div>  
                                        <span class="m-form__help">Gunakan titik (.) pada dua angka dibelakang koma</span>  
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Nilai SPH Nego </label>                                    
                                        <div class="input-group">
                                            <input type="text" name="jml_nego" class="form-control m-input" required placeholder="hanya angka" aria-describedby="basic-addon2">                                          
                                            <div class="input-group-append"><span class="input-group-text" id="basic-addon2">Rp</span></div>                                           
                                        </div>  
                                        <span class="m-form__help">Gunakan titik (.) pada dua angka dibelakang koma</span>  
                                    </div>    
                                    <div class="col-lg-3">
                                        <label>Jaminan</label>  
                                        <select name="jaminan_id"  class="form-control m-bootstrap-select m_selectpicker" id="jampel">
                                            @foreach ($jaminans as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach                                      
                                        </select>  
                                    </div>    
                                    <div class="col-lg-3">
                                        <label>Jenis Kontrak</label>  
                                        <select name="kontrak_id"  class="form-control m-bootstrap-select m_selectpicker" id="kontrak">
                                            @foreach ($kontraks as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                        </select>        
                                    </div>                           
                                </div>
                                <div class="form-group m-form__group row"> 
                                    <div class="col-lg-3">
                                        <label>Jaminan Uang Muka</label>
                                        <div class="m-radio-inline" id="rdjaminan">   
                                            <label class="m-radio">
                                                <input type="radio" name="jaminandp" value="nondp"> Non DP
                                                <span></span>
                                            </label>
                                            <label class="m-radio">
                                                <input type="radio" name="jaminandp" value="other"> DP %    
                                                <span></span>
                                            </label>
                                        </div>
                                        <p class="m-form__help">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control m-input" id="otherAnswer" style="display:none" placeholder="% (Hanya Angka)" name="jaminandp1">
                                                   </div>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control m-input" id="otherAnswer1" style="display:none"  placeholder="Rp (Hanya Angka)" name="jaminandp2">
                                                </div>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Nama Pekerjaan</label>    
                                        <textarea name="judul_pekerjaan" class="form-control m-input" id="judul_pekerjaan" cols="30" rows="10"></textarea>                                
                                            {{-- <input type="text" name="judul_pekerjaan" class="form-control m-input" placeholder="Kode"> --}}
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Catatan</label>  
                                        <textarea name="catatan" id="summernote" cols="30" rows="3"  class="form-control m-bootstrap-select m_selectpicker"></textarea>
                                    </div>
                                </div>
                                <div class="form-group m-form__group " id="otherTermin1">
                                    <div class="btn-group">
                                        <button id="btnAdd" type="button" class="btn btn-primary">
                                            Add Row
                                        </button>
                                        <button id="btnDel" type="button" class="btn btn-danger">
                                            Delete Last Row
                                        </button>
                                    </div>
                                    <table class="table table-striped-table-bordered table-hover mt-4" id="tblAddRow1">
                                        <thead>
                                            <tr>
                                                <th>Cara Pembayaran </th>
                                            </tr>
                                        </thead>
                                        @php
                                            $no = 1 ;
                                        @endphp
                                        <tbody>
                                            <tr>
                                                <td> <textarea name="carabayar[]" id="carabayar"  class="form-control m-input"  cols="30" rows="5" required></textarea></td>
                                            </tr>     
                                        </tbody>                        
                                    </table>
                                </div>	         
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    {{-- <div class="col-lg-2"></div> --}}
                                    <div class="col-lg-12">
                                        <div class="btn-group pull-right">
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        <a href="/banegopengadaan" class="btn btn-default">Back</a>
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
{{-- <script src="assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script> --}}
<script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>     --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $('#summernote').summernote({
            height: "100px"
        });
</script>
<script type="text/javascript">
    $(document).ready(function () {

        $("#rdjaminan input[type='radio']").change(function(){
            if($(this).val()=="other")
            {
                $("#otherAnswer").show();
                $("#otherAnswer1").show();
            }
            else
            {                
                $("#otherAnswer").hide(); 
                $("#otherAnswer1").hide(); 
            }
        });
    });
</script>            
<script>
    $(document).ready(function () {        
        $("#tgl_sph").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
        $("#tgl_sphnego").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
     
        $("#startdate").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
        $("#enddate").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });

        $('#btnAdd').on('click', function() {
        var lastRow = $('#tblAddRow1 tbody tr:last').html();
        //alert(lastRow);
        $('#tblAddRow1 tbody').append('<tr>' + lastRow + '</tr>');
        $('#tblAddRow1 tbody tr:last input').val('');
    });

    // Delete last row in the table
    $('#btnDel').on('click', function() {
        var lenRow = $('#tblAddRow1 tbody tr').length;
        //alert(lenRow);
        if (lenRow == 1 || lenRow <= 1) {
            alert("Can't remove all row!");
        } else {
            $('#tblAddRow1 tbody tr:last').remove();
        }
    });

    // Delete row on click in the table
    $('#tblAddRow1').on('click', 'tr a', function(e) {
        var lenRow = $('#tblAddRow1 tbody tr').length;
        e.preventDefault();
        if (lenRow == 1 || lenRow <= 1) {
            alert("Can't remove all row!");
        } else {
            $(this).parents('tr').remove();
        }
    });

    });     
</script>   

@endsection