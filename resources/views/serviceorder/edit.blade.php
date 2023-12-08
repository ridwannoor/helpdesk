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
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="/so/update" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="PUT" />
                            <input type="hidden" name="id" value="{{$serviceorders->id}}" />
                        </div>   
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label>Nomor:</label>
                                    <input type="text" name="no_so" class="form-control m-input" value="{{ $serviceorders->no_so }}">
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                                <div class="col-lg-4">
                                    <label class="">Tanggal:</label>
                                    <div class="input-group date">
                                            <input type="text" class="form-control m-input" name="tanggal" readonly  value="{{ $serviceorders->tanggal }}" id="tanggal"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>Nomor Kontrak :</label>
                                    <input type="text" name="no_kontrak" class="form-control m-input" value="{{$serviceorders->no_kontrak}}">
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                               
                                <div class="col-lg-6">
                                    <label class="">Waktu Pelaksanaan:</label>
                                    <div class="input-group date">
                                            <input type="text" class="form-control m-input" name="start_date" readonly  placeholder="Select Date" id="tglmulai" value="{{$serviceorders->start_date}}"/>
                                            <span class="input-group-text">-</span><input type="text" class="form-control m-input" name="end_date" readonly  placeholder="Select Date" id="tglakhir" value="{{$serviceorders->end_date}}"/>
                                            
                                            {{-- <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div> --}}
                                        </div>
                                </div>
                                <div class="col-lg-3">
                                    <label class="">Tanggal Kontrak:</label>
                                    <div class="input-group date">
                                            <input type="text" class="form-control m-input" name="tgl_kontrak" placeholder="Select Date" id="tglkirim" value="{{$serviceorders->tgl_kontrak}}"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-lg-3">
                                    <label class="">Lokasi TMP:</label>
                                    <div class="input-group m-input-group m-input-group--square">
                                        {{-- <div class="btn-group"> --}}
                                            <select name="lokasi_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" id="lokasi_id">                                           
                                                <option value="{{$serviceorders->lokasi_id}}">{{ $serviceorders->lokasi->kode }}</option>
                                                @foreach ($lokasis as $d)
                                                @if ($serviceorders->lokasi_id != $d->id){
                                                <option value="{{$d->id}}">{{ $d->kode }}</option>
                                                }
                                                @endif
                                                @endforeach                                           
                                            </select>
                                        {{-- <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">+</a>                                    --}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-3">
                                    <label class="">Nama Pekerjaan:</label>
                                    <textarea name="nama_pek" class="form-control m-input m-input--air" id="exampleTextarea" rows="3">{{ $serviceorders->nama_pek }}</textarea>
                                    {{-- <input type="email" class="form-control m-input" placeholder="Enter contact number"> --}}
                                    {{-- <span class="m-form__help">Please enter your contact</span> --}}
                                </div>
                                <div class="col-lg-3">
                                    <label class="">Pemesan:</label>
                                    <div class="input-group m-input-group m-input-group--square">                                        
                                        <select name="preference_id" class="form-control m-bootstrap-select m_selectpicker" id="preference_id">                                           
                                            <option value="{{$serviceorders->preference_id}}">{{ $serviceorders->preference->nama_perusahaan }}</option>
                                            {{-- @foreach ($pref as $d)
                                            @if ($serviceorders->preference_id != $d->id){
                                            <option value="{{$d->id}}">{{ $d->nama_perusahaan }}</option>
                                            }
                                            @endif
                                            @endforeach                                            --}}
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-lg-3">
                                    <label class="">BOD:</label>
                                    <div class="input-group m-input-group m-input-group--square">
                                        <select name="bod_id" class="form-control m-bootstrap-select m_selectpicker" id="bod_id">
                                            <option value="{{$serviceorders->bod_id}}">{{ $serviceorders->bod->name }}, {{ $serviceorders->bod->code }}</option>
                                            @foreach ($bods as $d)
                                            @if ($d->status == 'active')
                                                @if ($serviceorders->bod_id != $d->id)
                                                <option value="{{ $d->id }}">{{ $d->name }}, {{ $d->code }}</option>
                                                @endif                                    
                                            @endif   
                                            @endforeach                                       
                                        </select>
                                        {{-- <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">+</a>                                    --}}
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label class="">Vendor :</label>
                                    <div class="input-group m-input-group m-input-group--square">
                                        <select name="vendor_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" id="vendor_id">                                           
                                            <option value="{{$serviceorders->vendor_id}}">{{ $serviceorders->vendor->namaperusahaan }}, {{ $serviceorders->vendor->badanusaha->kode }}</option>
                                            @foreach ($vendor as $d)
                                            @if ($serviceorders->vendor_id != $d->id){
                                            <option value="{{$d->id}}">{{ $d->namaperusahaan }}, {{ $d->badanusaha->kode }}</option>
                                            }
                                            @endif
                                            @endforeach                                           
                                        </select>
                                    </div>
                                </div>                            
                            </div>                        
                           
                            <div class="form-group m-form__group row">
                                    <div class="btn-group">
                                            <button id="btnAddRow" type="button" class="btn btn-primary">
                                                    Add Row
                                                </button>
                                                <button id="btnDelLastRow" type="button" class="btn btn-danger">
                                                    Delete Last Row
                                                </button>
                                    </div>
                                    <table class="table table-striped-table-bordered table-hover" id="tblAddRow">
                                            <thead>
                                                <tr>
                                                    <th>Material/Barang</th>
                                                    <th>Qty</th>
                                                    <th>Satuan</th>
                                                    <th>Serial Number</th>
                                                    <th>Lokasi</th>
                                                    <th>Catatan</th>
                                                    {{-- <th><a href="#" class="addRow">Add More</a></th> --}}
                                                    <th width='130px'>Action</th>
                                                </tr>
                                            </thead>
                                            @php
                                                $no = 1 ;
                                            @endphp
                                            <tbody>
                                                @foreach ($serviceorders->sodetails as $item)
                                                <tr>
                                                    <td><input type="text" name="deskripsi[]" value="{{ $item->deskripsi }}" class="form-control m-input"></td>
                                                    <td><input type="text" name="qty[]" class="form-control m-input" value="{{ $item->qty }}" onkeypress="return hanyaAngka(event)"></td>
                                                    <td><input type="text" name="satuan[]" class="form-control m-input" value="{{ $item->satuan }}"></td>
                                                    <td><input type="text" name="serial_num[]" class="form-control m-input" value="{{ $item->serial_num }}"></td>
                                                    <td><input type="text" name="lokasi[]" class="form-control m-input" value="{{ $item->lokasi }}"></td>
                                                    <td><input type="text" name="catatan[]" class="form-control m-input" value="{{ $item->catatan }}"></td>
                                                    <td><a href="/so/destroy/{{ $item->id }}" onclick="return confirm('Are you sure? Delete ')" class="btn btn-danger">Delete</a></td>
                                                </tr>                                                         
                                                @endforeach
                                            </tbody>                        
                                        </table>
                            </div>
                           
                            
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-8">
                                        <div class="btn-group pull-right">
                                            <a href="/so" class="btn btn-secondary">Cancel</a>
                                            <button class="btn btn-success">Save</button>
                                            {{-- <a href="/so/store" class="btn btn-success">Submit</a> --}}
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
<script type="text/javascript">
    $(document).ready(function () {
        $('#tanggal').datepicker({
         //merubah format tanggal datepicker ke dd-mm-yyyy
            format: "yyyy-mm-dd",
            //aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
            //format: "dd-mm-yyyy",
            autoclose: true
        }),
        $("#tglmulai").datepicker({
            autoclose:true,
            format:"yyyy-mm-dd"
        }),
        $("#tglakhir").datepicker({
            autoclose:true,
            format:"yyyy-mm-dd",
           // startDate:new Date
        });
        $("#tglkirim").datepicker({
            autoclose:true,
            format:"yyyy-mm-dd"
        });
    });
</script>
@endsection