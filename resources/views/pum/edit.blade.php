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
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="/pum/update" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="PUT" />
                            <input type="hidden" name="id" value="{{$pums->id}}" />
                        </div>   
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label>Nomor:</label>
                                    <input type="text" name="no_pum" class="form-control m-input" value="{{ $pums->no_pum }}">
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                                <div class="col-lg-4">
                                    <label class="">Tanggal:</label>
                                    <div class="input-group date">
                                            <input type="text" class="form-control m-input" name="tanggal" readonly  value="{{ $pums->tanggal }}" id="tanggal"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-lg-4">
                                    <label class="">Lokasi TMP:</label>
                                    <div class="input-group m-input-group m-input-group--square">
                                        {{-- <div class="btn-group"> --}}
                                            <select name="lokasi_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" id="lokasi_id">                                           
                                                <option value="{{$pums->lokasi_id}}">{{ $pums->lokasi->kode }}</option>
                                                @foreach ($lokasis as $d)
                                                @if ($pums->lokasi_id != $d->id){
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
                               
                                <div class="col-lg-8">
                                    <label class="">Nama Pekerjaan:</label>
                                    <textarea name="nama_pek" class="form-control m-input m-input--air" id="exampleTextarea" rows="5">{{ $pums->nama_pek }}</textarea>
                                 
                                </div>
                                <div class="col-lg-4">
                                    <label class="">Pemesan:</label>
                                    <div class="input-group m-input-group m-input-group--square">                                        
                                        <select name="preference_id" class="form-control m-bootstrap-select m_selectpicker" id="preference_id">                                           
                                            <option value="{{$pums->preference_id}}">{{ $pums->preference->nama_perusahaan }}</option>
                                            @foreach ($preferences as $d)
                                            @if ($pums->preference_id != $d->id){
                                            <option value="{{$d->id}}">{{ $d->nama_perusahaan }}</option>
                                            }
                                            @endif
                                            @endforeach                                           
                                        </select>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label class="">Membuat:</label>
                                    <div class="input-group m-input-group m-input-group--square">                                        
                                        <select name="divisi_id" class="form-control m-bootstrap-select m_selectpicker" id="divisi_id">                                           
                                            <option value="{{$pums->divisi_id}}">{{ $pums->divisi->name }}, {{ $pums->divisi->kode }}</option>
                                            @foreach ($divisis as $d)
                                            @if ($pums->divisi_id != $d->id){
                                            <option value="{{$d->id}}">{{ $d->name }}, {{ $d->kode }}</option>
                                            }
                                            @endif
                                            @endforeach                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label class="">Mengetahui:</label>
                                    <div class="input-group m-input-group m-input-group--square">                                        
                                        <select name="divisi1_id" class="form-control m-bootstrap-select m_selectpicker" id="divisi1_id">                                           
                                            <option value="{{$pums->divisi1_id}}">{{ $pums->divisi1->name }}, {{ $pums->divisi1->kode }}</option>
                                            @foreach ($divisi1s as $d)
                                            @if ($pums->divisi1_id != $d->id){
                                            <option value="{{$d->id}}">{{ $d->name }}, {{ $d->kode }}</option>
                                            }
                                            @endif
                                            @endforeach                                           
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-lg-4">
                                    <label class="">BOD:</label>
                                    <div class="input-group m-input-group m-input-group--square">
                                        <select name="bod_id" class="form-control m-bootstrap-select m_selectpicker" id="bod_id">
                                            <option value="{{$pums->bod_id}}">{{ $pums->bod->name }}, {{ $pums->bod->code }}</option>
                                            @foreach ($bods as $d)
                                            @if ($d->status == 'active')
                                                @if ($pums->bod_id != $d->id)
                                                <option value="{{ $d->id }}">{{ $d->name }}, {{ $d->code }}</option>
                                                @endif                                    
                                            @endif   
                                            @endforeach                                       
                                        </select>
                                        {{-- <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">+</a>                                    --}}
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
                                                    <th>Jumlah</th>
                                                    {{-- <th><a href="#" class="addRow">Add More</a></th> --}}
                                                    <th width='130px'>Action</th>
                                                </tr>
                                            </thead>
                                            @php
                                                $no = 1 ;
                                            @endphp
                                            <tbody>
                                                @foreach ($pums->pumdetails as $item)
                                                <tr>
                                                    <td><textarea name="deskripsi[]" class="form-control m-input" cols="30" rows="5">{{ $item->deskripsi }} </textarea>
                                                       </td>
                                                    <td><input type="text" name="jumlah[]" class="form-control m-input" value="{{ $item->jumlah }}" onkeypress="return hanyaAngka(event)"></td>
                                                   <td><a href="/pum/destroy/{{ $item->id }}" onclick="return confirm('Are you sure? Delete ')" class="btn btn-danger">Delete</a></td>
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
                                            <a href="/pum" class="btn btn-secondary">Cancel</a>
                                            <button class="btn btn-success">Save</button>
                                            {{-- <a href="/pum/store" class="btn btn-success">Submit</a> --}}
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