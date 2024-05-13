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
                    <form class="m-form m-form--label-align-right" method="POST" action="/tender/update" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="PUT" />
                            <input type="hidden" name="id" value="{{$tenders->id}}" />
                        </div>                   
                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-3">
                                    <label>Nomor Pengumuman</label>                                    
                                        <input type="text" name="nomor_pr" class="form-control m-input" value="{{ $tenders->nomor_pr }}">
                                    </div>
                                   
                                        
                                    <div class="col-lg-3">
                                        <label>Tanggal Terbit</label>                                    
                                        <div class="input-group date"  data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="tgl_paket" placeholder="Select date & time" id="tgl"  value="{{ $tenders->tgl_paket }}"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Tanggal Penutupan Pendaftaran </label>        
                                        <div class="input-group date" data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="tgl_daftar"
                                                id="m_datetimepicker_2" value="{{ $tenders->tgl_daftar }}"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i
                                                        class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Tanggal Berakhir Penawaran</label>   
                                        <div class="input-group date" data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="tgl_tutup"
                                                id="m_datetimepicker_2" value="{{ $tenders->tgl_tutup }}"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i
                                                        class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>                                   
                                        {{-- <div class="input-group date"  data-z-index="1100">
                                            <input type="text" class="form-control m-input" readonly name="tgl_tutup" placeholder="Select date & time" id="tgl"  value="{{ $tenders->tgl_tutup }}"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div> --}}
                                    </div>
                                  
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-3">
                                        <label>Lokasi Pekerjaan</label>     
                                        <textarea name="lokasi_pekerjaan" id="lokasi_pekerjaan" class="form-control m-input" cols="30" rows="5">{{ $tenders->lokasi_pekerjaan }}</textarea>                                
                                        {{-- <input type="text" name="lokasi_pekerjaan" class="form-control m-input" value="{{ $tenders->lokasi_pekerjaan }}"> --}}
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Nama Paket</label>     
                                        <textarea name="nama_paket" id="nama_paket" class="form-control m-input" cols="30" rows="5">{{ $tenders->nama_paket }}</textarea>                               
                                            {{-- <input type="text" name="nomor_pr" class="form-control m-input" placeholder="Nomor PR"> --}}
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Uraian Pekerjaan</label>
                                        <textarea name="uraian_pek" id="summernote1" class="form-control m-input" required>{!! $tenders->uraian_pek !!}</textarea>
                                        {{-- <textarea name="uraian_pek" id="uraian_pek" class="form-control m-input" cols="30" rows="5">{{ $tenders->uraian_pek }}</textarea>                                --}}
                                            {{-- <input type="text" name="nomor_pr" class="form-control m-input" placeholder="Nomor PR"> --}}
                                    </div>
                                </div>
                                @php
                                if(isset($tenders)) {
                                $jens = $tenders->jenispekerjaans->pluck('id')->all();
                                } else {
                                $jens = null;
                                }
                                @endphp
                                <div class="form-group m-form__group row">  
                                    <div class="col-lg-3">
                                        <label>Jenis Pekerjaan</label>
                                        {!! Form::select('jenispekerjaans[]', $jenispekerjaans, $jens, ['class' => 'form-control m-bootstrap-select m_selectpicker', 'data-live-search' => 'true', 'required', 'multiple']) !!} 
                                       
                                    </div>                                 
                                    <div class="col-lg-3">
                                        <label>Lokasi</label>
                                        <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true"  name="lokasi_id" id="lokasi">
                                            <option value="{{ $tenders->lokasi_id }}">{{ $tenders->lokasi->kode  }}</option>
                                            @foreach ($lokasis as $loks)    
                                                @if ($tenders->lokasi_id != $loks->id)                                            
                                                <option value="{{ $loks->id }}">{{ $loks->kode  }}</option>
                                                @endif  
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Anggaran</label>
                                        <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true"  name="anggaran_id" id="anggaran">
                                            <option value="{{ $tenders->anggaran_id }}">{{ $tenders->anggaran->kode  }}</option>
                                            @foreach ($anggarans as $item)           
                                                @if ($tenders->anggaran_id != $item->id)                                           
                                                    <option value="{{ $item->id }}">{{ $item->kode  }}</option>
                                                @endif  
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Nilai Tender</label>                                    
                                        <input type="text" name="pagu" class="form-control m-input" value="{{ $tenders->pagu }}">
                                    </div> 
                                   
                                </div>
                                <div class="form-group m-form__group row">    
                                    <div class="col-lg-3">
                                        <label>Dasar Anggaran</label>
                                        <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true"  name="dasar_id" id="dasar_id">
                                            <option value="{{ $tenders->dasar_id }}">{{ $tenders->dasar->detail  }}</option>
                                            @foreach ($dasars as $item)           
                                                @if ($tenders->dasar_id != $item->id)                                           
                                                    <option value="{{ $item->id }}">{{ $item->detail  }}</option>
                                                @endif  
                                            @endforeach

                                            {{-- @foreach ($dasars as $item)                                                
                                                <option value="{{ $item->id }}">{{ $item->detail  }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>    
                                    <div class="col-lg-3">
                                        <label>Unit ST</label>
                                        <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true"  name="divisi_id" id="divisi_id">
                                            <option value="{{ $tenders->divisi_id }}">{{ $tenders->divisi->detail  }}</option>
                                            @foreach ($divisis as $item)           
                                                @if ($tenders->divisi_id != $item->id)                                           
                                                    <option value="{{ $item->id }}">{{ $item->detail  }}</option>
                                                @endif  
                                            @endforeach
                                        </select>
                                    </div>                               
                                    <div class="col-lg-3">
                                        <label>Metode Pengadaan</label>  
                                        <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true"  name="metodepengadaan_id" id="metodepengadaan_id">
                                            <option value="{{ $tenders->metodepengadaan_id }}">{{ $tenders->metodepengadaan->name  }}</option>
                                            @foreach ($metodes as $item)           
                                                @if ($tenders->metodepengadaan_id != $item->id)                                           
                                                    <option value="{{ $item->id }}">{{ $item->name  }}</option>
                                                @endif  
                                            @endforeach
                                            {{-- @foreach ($metodes as $item)                                                
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach --}}
                                        </select>                                  
                                        {{-- <input type="text" name="metode_pekerjaan" class="form-control m-input" > --}}
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Metode Evaluasi</label>     
                                        <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true"  name="metodeevaluasi_id" id="metodeevaluasi_id">
                                            <option value="{{ $tenders->metodeevaluasi_id }}">{{ $tenders->metodeevaluasi->name  }}</option>
                                            @foreach ($evaluasis as $item)           
                                                @if ($tenders->metodeevaluasi_id != $item->id)                                           
                                                    <option value="{{ $item->id }}">{{ $item->name  }}</option>
                                                @endif  
                                            @endforeach
                                            {{-- @foreach ($evaluasis as $item)                                                
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach --}}
                                        </select>                                  
                                        {{-- <input type="text" name="metode_evaluasi" class="form-control m-input" > --}}
                                    </div>
                                  
                                </div>
                                <div class="form-group m-form__group row">
                                      
                                    <div class="col-lg-3">
                                        <label>Waktu Pelaksanaan</label>                                    
                                        <input type="text" name="jangka_pelaksanaan" class="form-control m-input" value="{{ $tenders->jangka_pelaksanaan }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Dasar Peraturan</label>
                                        <select  class="form-control m-bootstrap-select m_selectpicker" data-live-search="true"  name="statustender_id" id="statustender_id">
                                            <option value="{{ $tenders->statustender_id }}">{{ $tenders->statustender->name  }}</option>
                                            @foreach ($status as $item)           
                                                @if ($tenders->statustender_id != $item->id)                                           
                                                    <option value="{{ $item->id }}">{{ $item->name  }}</option>
                                                @endif  
                                            @endforeach
                                        </select>
                                    </div>                       
                                  
                                    <div class="col-lg-3">
                                        <label>Waktu Pemeliharaan</label>                                    
                                        <input type="text" name="jangka_pemeliharaan" class="form-control m-input" value="{{ $tenders->jangka_pemeliharaan }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Jaminan Pelaksanaan</label>                                    
                                        <input type="text" name="jaminan_pelaksanaan" class="form-control m-input" value="{{ $tenders->jaminan_pelaksanaan }}">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label>Catatan</label> 
                                        <textarea name="catatan" class="form-control m-input" cols="30" rows="5">{{ $tenders->catatan }}</textarea>                                      
                                        {{-- <input type="text" name="lokasi_pekerjaan" class="form-control m-input" > --}}
                                    </div>
                                    <div class="col-lg-6">
                                        {{-- <label>Catatan</label>  --}}
                                        <div class="form-group m-form__group has-success">
                                            <label class="form-control-label" for="inputSuccess1">Kategori Tender</label>
                                            @php
                                                $catender = json_decode($tenders->catender);
                                            @endphp
                                              <div class="m-checkbox-inline">
                                                <label class="m-checkbox">
                                                        @if (in_array("Besar", $catender))  
                                                        <input type="checkbox" name="catender[]" value="Besar" checked> Besar
                                                        @else
                                                        <input type="checkbox" name="catender[]" value="Besar"> Besar 
                                                        @endif
                                                    <span></span>
                                                </label>
                                                <label class="m-checkbox">
                                                        @if (in_array("Menengah", $catender))  
                                                        <input type="checkbox" name="catender[]" value="Menengah" checked> Menengah
                                                        @else
                                                        <input type="checkbox" name="catender[]" value="Menengah"> Menengah 
                                                        @endif
                                                    <span></span>
                                                </label>
                                                <label class="m-checkbox">
                                                        @if (in_array("Kecil", $catender))  
                                                        <input type="checkbox" name="catender[]" value="Kecil" checked> Kecil
                                                        @else
                                                        <input type="checkbox" name="catender[]" value="Kecil"> Kecil 
                                                        @endif
                                                    <span></span>
                                                </label>
                                                <label class="m-checkbox">
                                                        @if (in_array("Non", $catender))  
                                                        <input type="checkbox" name="catender[]" value="Non" checked> Non
                                                        @else
                                                        <input type="checkbox" name="catender[]" value="Non"> Non 
                                                        @endif
                                                 <span></span>
                                             </label>
                                            </div>
                                        </div>
                                        {{-- <textarea name="catatan" class="form-control m-input" cols="30" rows="5"></textarea>                                       --}}
                                        {{-- <input type="text" name="lokasi_pekerjaan" class="form-control m-input" > --}}
                                    </div>
                                </div>
                               
                                <div class="form-group m-form__group row">
                                    <div class="btn-group">
                                        <button id="btnAdd" type="button" class="btn btn-primary">
                                            Add Row
                                        </button>
                                        <button id="btnDel" type="button" class="btn btn-danger">
                                            Delete Row
                                        </button>
                                    </div>
    
                                    <table class="table table-striped-table-bordered table-hover" id="tblAddRow">
                                        <thead>
                                            <tr>
                                                <th style="width: 300px">Sertifikasi</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        @php
                                        $no = 1 ;
                                        
                                        @endphp
                                        <tbody>
                                            @foreach ($tenders->tenderdetail as $item)
                                            <tr>
                                                <td>
                                                    <div class="input-group">                                                    
                                                        <input type="hidden" name="vendorklasifikasi_id[]" id="vendorklasifikasi_id" value="{{ $item->vendorklasifikasi_id    }}" class="form-control m-input">
                                                        <input type="text" name="kode[]" id="kode" class="form-control m-input" value="{{ $item->vendorklasifikasi->kode }}" required>
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                                                Search
                                                              </button>
                                                        </div>
                                                    </div>
                                                    {{-- <textarea name="material[]" class="form-control m-input" required
                                                        cols="30" rows="5"></textarea>  --}}
                                                    </td>
                                                    <td>  <input type="text" name="name[]" id="name" class="form-control m-input" value="{{ $item->vendorklasifikasi->name }}" required readonly></td>
                                               
    
                                            </tr>                                                
                                            @endforeach
                                        </tbody>
                                    </table>
    
                                    
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="btn-group">
                                        <button id="btnAdd2" type="button" class="btn btn-primary">
                                            Add Row
                                        </button>
                                        <button id="btnDel2" type="button" class="btn btn-danger">
                                            Delete Row
                                        </button>
                                    </div>
    
                                    <table class="table table-striped-table-bordered table-hover" id="tblAddRow2">
                                        <thead>
                                            <tr>
                                                <th style="width: 300px">Kode Syarat</th>
                                                <th>Detail Syarat</th>
                                            </tr>
                                        </thead>
                                        @php
                                        $no = 1 ;
                                        
                                        @endphp
                                        <tbody>
                                            @foreach ($tenders->tendersyarat as $item)
                                            <tr>
                                                <td>
                                                    <div class="input-group">                                                    
                                                        <input type="hidden" name="syarattender_id[]" id="syarattender_id" class="form-control m-input" value="{{ $item->syarattender_id }}">
                                                        {{-- <input type="hidden" name="currency_id[]" id="currency_id" class="form-control m-input" value=""> --}}
                                                        <input type="text" name="kode_syarat[]" id="kode_syarat"
                                                        class="form-control m-input"   value="{{ $item->syarattender->kode_syarat }}"
                                                        required>
                                                        {{-- <input type="text" class="form-control" placeholder="Search for..."> --}}
                                                        <div class="input-group-append">
                                                            {{-- <a href="http://" class="btn btn-warning" id="btnModal" data-toggle="modal" data-target="#myModal">Search</a> --}}
                                                            {{-- <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Search</a> --}}
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
                                                                Search
                                                              </button>
                                                        </div>
                                                    </div>
                                                    {{-- <textarea name="material[]" class="form-control m-input" required
                                                        cols="30" rows="5"></textarea>  --}}
                                                    </td>
                                                    <td> <textarea name="detail_syarat[]" id="detail_syarat" class="form-control m-input " 
                                                        required readonly cols="30" rows="5">{{ $item->syarattender->detail_syarat }}</textarea>
                                                         {{-- <input type="text" name="detail_syarat[]" id="detail_syarat"
                                                        class="form-control m-input " 
                                                        required readonly></td> --}}
                                                {{-- <input type="text" name="material[]" class="form-control m-input" required> --}}
                                               
    
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
                                    {{-- <div class="col-lg-2"></div> --}}
                                    <div class="col-lg-12">
                                        <div class="btn-group pull-right">
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        <a href="/tender" class="btn btn-default">Back</a>
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
  
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-striped- table-bordered table-hover" id="m_table_1_wrapper" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Sertifikasi</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                <tbody>
                    @foreach ($vendors as $data)
                        {{-- <input type="hidden" id="id" value="{{$data->id}}"> --}}
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->kode}}</td>
                        <td >{{ $data->name }}</td>
                        <td><button type="button" class="btn btn-xs btn-primary MySelect" data-id="{{ $data->id }}" data-kode="{{ $data->kode }}" data-name="{{ $data->name }}">Select</button></td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>  
  <div class="modal fade" id="myModal1" tabindex="-1" aria-labelledby="myModal1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Syarat Tender</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-striped- table-bordered table-hover" id="m_table_1_wrapper" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Syarat</th>
                        <th>Detail Syarat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                <tbody>
                    @foreach ($syarats as $data)
                        {{-- <input type="hidden" id="id" value="{{$data->id}}"> --}}
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->kode_syarat}}</td>
                        <td >{{ $data->detail_syarat }}</td>
                        <td><button type="button" class="btn btn-xs btn-primary MySelect1" data-id="{{ $data->id }}" data-kode_syarat="{{ $data->kode_syarat }}" data-detail_syarat="{{ $data->detail_syarat }}">Select</button></td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>

  @endsection

@section('footer-script')
<script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/form-repeater.js') }}" type="text/javascript"></script>  
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
     $('#summernote').summernote({
            height: "100px"
        });
        $('#summernote1').summernote({
            height: "300px"
        });
</script>              
<script>
    $(document).ready(function () {        
        $("#tgl").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
        $("#thn").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
    });     
</script>  


<script type="text/javascript">
    $(document).ready(function () {

        
        $(".MySelect").on('click', function(){
            var id =  $(this).data('id');
            var kode =  $(this).data('kode');
            var name =  $(this).data('name');
            // var currency_id =  $(this).data('currency_id');
            // var currency =  $(this).data('currency');
            var harga =  $(this).data('harga');
            $('#tblAddRow tbody tr:last #vendorklasifikasi_id').val(id);
            $('#tblAddRow tbody tr:last #kode').val(kode);
            $('#tblAddRow tbody tr:last #name').val(name);
            $('#myModal').modal('hide'); 
        });

        // Add row the table
        $('#btnAdd').on('click', function () {
            var lastRow = $('#tblAddRow tbody tr:last').html();
            // var id =  $(this).data('id');
            // $('#hargabarang_id').val(id);

            $('#tblAddRow tbody').append('<tr>' + lastRow  + '</tr>');
            $('#tblAddRow tbody tr:last input').val('');
        });

        // Delete last row in the table
        $('#btnDel').on('click', function () {
            var lenRow = $('#tblAddRow tbody tr').length;
            //alert(lenRow);
            if (lenRow == 1 || lenRow <= 1) {
                alert("Can't remove all row!");
            } else {
                $('#tblAddRow tbody tr:last').remove();
                jumlah_amount();
            }
        });

      
        // Delete row on click in the table
        $('#tblAddRow').on('click', 'tr a', function (e) {
            var lenRow = $('#tblAddRow tbody tr').length;
            e.preventDefault();
            if (lenRow == 1 || lenRow <= 1) {
                alert("Can't remove all row!");
            } else {
                $(this).parents('tr').remove();
            }
        });

        $(".MySelect1").on('click', function(){
            var id =  $(this).data('id');
            var kode_syarat =  $(this).data('kode_syarat');
            var detail_syarat =  $(this).data('detail_syarat');
            // var currency_id =  $(this).data('currency_id');
            // var currency =  $(this).data('currency');
            // var harga =  $(this).data('harga');
            $('#tblAddRow2 tbody tr:last #syarattender_id').val(id);
            $('#tblAddRow2 tbody tr:last #kode_syarat').val(kode_syarat);
            $('#tblAddRow2 tbody tr:last #detail_syarat').val(detail_syarat);
            $('#myModal1').modal('hide'); 
        });

        // Add row the table
        $('#btnAdd2').on('click', function () {
            var lastRow = $('#tblAddRow2 tbody tr:last').html();
            // var id =  $(this).data('id');
            // $('#hargabarang_id').val(id);

            $('#tblAddRow2 tbody').append('<tr>' + lastRow  + '</tr>');
            $('#tblAddRow2 tbody tr:last input').val('');
        });

        // Delete last row in the table
        $('#btnDel2').on('click', function () {
            var lenRow = $('#tblAddRow2 tbody tr').length;
            //alert(lenRow);
            if (lenRow == 1 || lenRow <= 1) {
                alert("Can't remove all row!");
            } else {
                $('#tblAddRow2 tbody tr:last').remove();
                jumlah_amount();
            }
        });

      
        // Delete row on click in the table
        $('#tblAddRow2').on('click', 'tr a', function (e) {
            var lenRow = $('#tblAddRow2 tbody tr').length;
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