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
                    <form class="m-form m-form--label-align-right" method="POST" action="/bapengadaan/update" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="PUT" />
                            <input type="hidden" name="id" value="{{$ba->id}}" />
                        </div>                   
                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-3">
                                    <label>Nomor BA Aanwizing</label>                                    
                                        <input type="text" name="nomor_ba" value="{{ $ba->nomor_ba }}" class="form-control m-input" placeholder="Kode">
                                        {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Tanggal Aanwizing</label>                                    
                                        <div class="input-group date"  data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="tanggal"  value="{{ $ba->tanggal }}" id="m_datetimepicker_2"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Lokasi Pekerjaan</label>                                    
                                        <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="lokasi_id" id="lokasi">
                                            <option value="{{$ba->lokasi_id}}">{{ $ba->lokasi->kode}}</option>
                                                @foreach ($loks as $d)
                                                @if ($ba->lokasi_id != $d->id){
                                                <option value="{{$d->id}}">{{ $d->kode }}</option>
                                                }
                                                @endif
                                                @endforeach  
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Tutup Rapat</label>                                    
                                        <div class="input-group date"  data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly value="{{ $ba->tgl_penawaran }}" name="tgl_penawaran"  id="m_datetimepicker_2"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                if(isset($ba)) {
                                $lokasi = $ba->divisis->pluck('id')->all();
                                } else {
                                $lokasi = null;
                                }
                                @endphp
                                <div class="form-group m-form__group row">                                    
                                    <div class="col-lg-3">
                                    <label>Divisi</label>
                                        {{-- <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="divisi_id" id="divisi_id" multiple> --}}
                                            {!! Form::select('divisis[]', $divisis, $lokasi, ['class' => 'form-control m-bootstrap-select m_selectpicker', 'data-live-search' => 'true', 'required', 'multiple']) !!} 
                                       
                                        {{-- </select> --}}
                                    </div>
                                    @php
                                    if(isset($ba)) {
                                    $lokasi = $ba->vendors->pluck('id')->all();
                                    } else {
                                    $lokasi = null;
                                    }
                                    @endphp
                                    <div class="col-lg-3">
                                        <label>Vendor</label>
                                        {!! Form::select('vendors[]', $vendors, $lokasi, ['class' => 'form-control m-bootstrap-select m_selectpicker', 'data-live-search' => 'true', 'required', 'multiple']) !!} 
                                       
                                        {{-- <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="vendor_id" id="vendor_id" multiple>
                                            @foreach ($vendors as $item)                                                
                                                <option value="{{ $item->id }}">{{ $item->namaperusahaan . ", " . $item->badanusaha->kode }}</option>
                                            @endforeach
                                        </select> --}}
                                    </div>   
                                    <div class="col-lg-3">
                                        <label> Lokasi Meeting</label>
                                    <div class="input-group">
                                        <input type="text" name="lokasi_nego" class="form-control m-input" value="{{ $ba->lokasi_nego }}" aria-describedby="basic-addon2">
                                        <div class="input-group-append"><span class="input-group-text" id="basic-addon2"><i class="fa fa-map" aria-hidden="true"></i></span></div>
                                    </div>                                        
                                    {{-- <span class="m-form__help"></span> --}}
                                    </div>                                    
                                  
                                                         
                                    <div class="col-lg-3">
                                        <label>Nama Pekerjaan</label>
                                        <textarea name="judul_pekerjaan" class="form-control m-input" placeholder="Nama Pekerjaan" id="" cols="30" rows="5"> {{ $ba->judul_pekerjaan }}</textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group m-form__group " id="otherTermin">
                                    <div class="btn-group">
                                        <button id="btnAddRow" type="button" class="btn btn-primary">
                                            Add Row
                                        </button>
                                        <button id="btnDelLastRow" type="button" class="btn btn-danger">
                                            Delete Last Row
                                        </button>
                                    </div>
                                    <table class="table table-striped-table-bordered table-hover mt-4" id="tblAddRow">
                                        <thead>
                                            <tr>
                                                <th>Dokumen</th>
                                                <th>Sebelum</th>
                                                <th>Menjadi</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $no = 1 ;
                                        @endphp
                                        <tbody>
                                            @foreach ($ba->badetailpengadaans as $item)    
                                            <tr>
                                                <td> <textarea name="dokumen[]" id="dokumen"  class="form-control m-input"  cols="30" rows="5" required>{{ $item->dokumen }}</textarea></td>
                                                <td> <textarea name="sebelum[]" id="sebelum"  class="form-control m-input"  cols="30" rows="5" required>{{ $item->sebelum }}</textarea></td>
                                                <td> <textarea name="menjadi[]" id="menjadi"  class="form-control m-input"  cols="30" rows="5" required>{{ $item->menjadi }}</textarea></td>
                                            </tr>   
                                            @endforeach      
                                        </tbody>                        
                                    </table>menjadi
                                </div>	 
                                <hr>
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
                                                <th>Pertanyaan </th>
                                                <th>Jawaban</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $no = 1 ;
                                        @endphp
                                        <tbody>
                                            @foreach ($ba->bapertanyaans as $item)    
                                            <tr>
                                                <td> <textarea name="pertanyaan[]" id="pertanyaan"  class="form-control m-input" cols="30" rows="5" required>{{ $item->pertanyaan }}</textarea></td>
                                                <td> <textarea name="jawaban[]" id="jawaban"  class="form-control m-input"  cols="30" rows="5" required>{{ $item->jawaban }}</textarea></td>
                                            </tr> 
                                            @endforeach    
                                        </tbody>                        
                                    </table>
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
                                        <a href="/bapengadaan" class="btn btn-default">Back</a>
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
<script>
    $(document).ready(function () {        
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

        $("#rdbayar input[type='radio']").change(function(){
            if($(this).val()=="custom")
            {
                $("#otherAnswer").show();
                $("#otherTermin").hide();
                
            }
            else
            {                
                $("#otherAnswer").hide(); 
                $("#otherTermin").show();
            }
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