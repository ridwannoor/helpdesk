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
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="/pjpum/store" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="POST" />
                        {{-- <input type="hidden" name="id" value="{{$pums->id}}" /> --}}
                    </div>   
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                <label>Nomor PJ PUM:</label>
                                <input type="text" name="no_pjpum" class="form-control m-input" value="{{ $noUrutAkhir }}">
                                {{-- <span class="m-form__help">Please enter your full name</span> --}}
                            </div>
                            <div class="col-lg-4">
                                <label class="">Tanggal:</label>
                                <div class="input-group date">
                                        <input type="text" class="form-control m-input" name="tanggal" readonly  placeholder="Select Date" id="tanggal"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-lg-4">
                                <label class="">No PUM:</label>
                                <div class="input-group m-input-group m-input-group--square">
                                    {{-- <div class="btn-group"> --}}
                                    <select name="pumheader_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" id="pumheader_id">
                                        @foreach ($pums as $item)
                                        <option value="{{ $item->id }}" >{{ $item->no_pum }}</option>                                        
                                        @endforeach                                       
                                    </select>
                                    {{-- <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">+</a>                                    --}}
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                <label class="">Membuat:</label>
                                <input type="text" name="membuat" class="form-control m-input" >
                            </div>
                            <div class="col-lg-4">
                                <label class="">Mengetahui :</label>
                                <input type="text" name="mengetahui" class="form-control m-input" >
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
                               
                                    {{-- <button id="btnDelCheckRow" type="button">
                                        Delete Checked Row
                                    </button> --}}
                                <table class="table table-striped-table-bordered table-hover" id="tblAddRow">
                                        <thead>
                                            <tr>
                                                <th>Keterangan</th>
                                                <th>Jumlah</th>
                                                {{-- <th><a href="#" class="addRow">Add More</a></th> --}}
                                                {{-- <th width='130px'>Action</th> --}}
                                            </tr>
                                        </thead>
                                        @php
                                            // $no = 1 ;
                                            // $subtotal = 0;
                                            $total = 0;
                                        @endphp
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <textarea name="deskripsi[]" id="deskripsi" cols="30" rows="3" class="form-control m-input" required></textarea>
                                                    {{-- <input type="text" name="deskripsi[]" class="form-control m-input" required> --}}
                                                </td>
                                                <td>
                                                    <input type="text" id="jumlah" name="jumlah[]" class="form-control m-input" onkeypress="return hanyaAngka(event)" required></td>
                                                    {{-- <input type="text" name="catatan[]" class="form-control m-input"> --}}
                                                </td>
                                            </tr>     
                                        </tbody>     
                                        <tfoot>
                                            {{-- <td>Total : {{  }}</td>     --}}
                                        </tfoot>                   
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


{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="/vendor/store1" method="POST">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">            
                <div class="form-group">
                  <label for="namaperusahaan" class="form-control-label">Nama Perusahaan:</label>
                  <input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan">
                </div>
                <div class="form-group">
                  <label for="alamat" class="form-control-label">Alamat:</label>
                  <textarea class="form-control" id="alamat" name="alamat"></textarea>
                </div>
                <div class="form-group">
                    <label for="email" class="form-control-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="telp" class="form-control-label">Telp:</label>
                    <input type="text" class="form-control" id="telp" name="notelp">
                  </div>
             
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>   
      </form>
  </div>
   --}}
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