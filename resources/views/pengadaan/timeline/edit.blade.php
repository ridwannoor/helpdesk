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
                    <form class="m-form m-form--label-align-right" method="POST" action="/timeline/update" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="PUT" />
                            <input type="hidden" name="id" value="{{$times->id}}" />
                        </div>                   
                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group row">
                                 
                                    <div class="col-lg-3">
                                    {{-- <label>Jangka Pelaksanaan</label> --}}
                                    <label>Tender *</label>
                                    <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true"  name="tender_id" id="tender_id">
                                        <option value="{{ $times->tender_id }}">{{ $times->tender->nomor_pr  }}</option>
                                        @foreach ($tenders as $item)       
                                            @if ($times->tender_id != $item->id)                                         
                                                <option value="{{ $item->id }}">{{ $item->nomor_pr  }}</option>
                                            @endif 
                                        @endforeach
                                        {{-- @foreach ($tenders as $item)                                                
                                            <option value="{{ $item->id }}">{{ $item->nomor_pr  }}</option>
                                        @endforeach --}}
                                    </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <span id="tendertext"></span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-3">
                                        <label>Undangan Aanwijzing</label>                                    
                                        <div class="input-group date"  data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="undangan_aanwizing" value="{{ $times->undangan_aanwizing }}" id="tgl"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Keterangan Undangan Aanwijzing</label>                                    
                                        <input type="text" name="ket_undangan" id="ket_undangan" class="form-control m-input" value="{{ $times->ket_undangan }}" >
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-3">
                                        <label>Rapat Penjelasan Pekerjaan (Aanwijzing)</label>                                    
                                        <div class="input-group date"  data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="rapat_pekerjaan"  value="{{ $times->rapat_pekerjaan }}" id="tgl1"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Keterangan Rapat Penjelasan Pekerjaan (Aanwijzing)</label>                                    
                                        <input type="text" name="ket_rapat" id="ket_rapat" class="form-control m-input" value="{{ $times->ket_rapat }}" >
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-3">
                                        <label>Dokumen Pengadaan (SBD)</label>                                    
                                        <div class="input-group date"  data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="sbd"  value="{{ $times->sbd }}" id="tgl2"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Keterangan Dokumen Pengadaan (SBD)</label>                                    
                                        <input type="text" name="ket_sbd" id="ket_sbd" class="form-control m-input" value="{{ $times->ket_sbd }}" >
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-3">
                                        <label>Surat Penawaran Harga</label>                                    
                                        <div class="input-group date"  data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="sph"  value="{{ $times->sph }}" id="tgl3"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Keterangan Surat Penawaran Harga</label>                                    
                                        <input type="text" name="ket_sph" id="ket_sph" class="form-control m-input" value="{{ $times->ket_sph }}" >
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-3">
                                        <label>Rapat Pembukaan Penawaran</label>                                    
                                        <div class="input-group date"  data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="rpp"  value="{{ $times->rpp }}" id="tgl4"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Keterangan Rapat Pembukaan Penawaran</label>                                    
                                        <input type="text" name="ket_rpp" id="ket_rpp" class="form-control m-input" value="{{ $times->ket_rpp }}" >
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-3">
                                        <label>Pengumuman Hasil Evaluasi Tahap 1 & Undangan Pembukaan Penawaran Tahap 2</label>                                    
                                        <div class="input-group date"  data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="pengumuman"  value="{{ $times->pengumuman }}" id="tgl10"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Keterangan Pengumuman Hasil Evaluasi Tahap 1 & Undangan Pembukaan Penawaran Tahap 2</label>                                    
                                        <input type="text" name="ket_pengum" id="ket_pengum" class="form-control m-input" value="{{ $times->ket_pengum }}" >
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-3">
                                        <label>Rapat Pembukaan Penawaran 2</label>                                    
                                        <div class="input-group date"  data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="rpp_1"  value="{{ $times->rpp_1 }}" id="tgl5"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Keterangan Rapat Pembukaan Penawaran 2</label>                                    
                                        <input type="text" name="ket_rpp1" id="ket_rpp1" class="form-control m-input" value="{{ $times->ket_rpp1 }}" >
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-3">
                                        <label>Pengumuman Hasil Evaluasi Tahap 2 & Undangan Negosiasi Harga</label>                                    
                                        <div class="input-group date"  data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="pengumuman_1"  value="{{ $times->pengumuman_1 }}" id="tgl11"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Keterangan Pengumuman Hasil Evaluasi Tahap 2 & Undangan Negosiasi Harga</label>                                    
                                        <input type="text" name="ket_pengum1" id="ket_pengum1" class="form-control m-input" value="{{ $times->ket_pengum1 }}" >
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-3">
                                        <label>Rapat Klarifikasi & Negosiasi Harga</label>                                    
                                        <div class="input-group date"  data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="klarif_nego"  value="{{ $times->klarif_nego }}" id="tgl6"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Keterangan Rapat Klarifikasi & Negosiasi Harga</label>                                    
                                        <input type="text" name="ket_klarif" id="ket_klarif" class="form-control m-input" value="{{ $times->ket_klarif }}" >
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-3">
                                        <label>Surat Penawaran Harga Negosiasi</label>                                    
                                        <div class="input-group date"  data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="sph_nego"  value="{{ $times->sph_nego }}" id="tgl7"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Keterangan Surat Penawaran Harga Negosiasi</label>                                    
                                        <input type="text" name="ket_sphnego" id="ket_sphnego" class="form-control m-input" value="{{ $times->ket_sphnego }}" >
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-3">
                                        <label>Surat Penunjukan Pemenang</label>                                    
                                        <div class="input-group date"  data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="spp"  value="{{ $times->spp }}" id="tgl8"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Keterangan Surat Penunjukan Pemenang</label>                                    
                                        <input type="text" name="ket_spp" id="ket_spp" class="form-control m-input" value="{{ $times->ket_spp }}" >
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-3">
                                        <label>Surat Kontrak/SPK</label>                                    
                                        <div class="input-group date"  data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="kontrak"  value="{{ $times->kontrak }}" id="tgl9"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Keterangan Surat Kontrak/SPK</label>                                    
                                        <input type="text" name="ket_kontrak" id="ket_kontrak" class="form-control m-input" value="{{ $times->ket_kontrak }}" >
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
                                        <a href="/timeline" class="btn btn-default">Back</a>
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
        $("#tgl").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
        $("#tgl1").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
        $("#tgl2").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
        $("#tgl3").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
        $("#tgl4").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
        $("#tgl5").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
        $("#tgl6").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
        $("#tgl7").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
        $("#tgl8").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
        $("#tgl9").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
        $("#tgl10").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
        $("#tgl11").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
        $("#tgl12").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
    });     
</script>   

@endsection