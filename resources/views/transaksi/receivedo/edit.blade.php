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
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST"
                    action="/receivedo/update" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="PUT" />
                        <input type="hidden" name="id" value="{{$bapm->id}}" />
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                <label>Nomor:</label>
                                <input type="text" name="no_do" class="form-control m-input" value="{{ $bapm->no_do }}"
                                    readonly>
                                {{-- <span class="m-form__help">Please enter your full name</span> --}}
                            </div>
                            <div class="col-lg-4">
                                <label class="">Tanggal Terima:</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control m-input" name="tanggal_terima"
                                        id="tanggal_terima" required/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Nomor PO Ref:</label>
                                <input type="text" name="ref_po" class="form-control m-input" readonly
                                    value="{{$bapm->ref_po}}">
                                {{-- <span class="m-form__help">Please enter your full name</span> --}}
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            
                            <div class="col-lg-6">
                                <label class="">Waktu Pelaksanaan:</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control m-input" name="tgl_mulai" 
                                        value="{{$bapm->tgl_mulai}}" readonly/>
                                    <span class="input-group-text">-</span><input type="text"
                                        class="form-control m-input" name="tgl_akhir" readonly value="{{$bapm->tgl_akhir}}" />

                                    {{-- <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="">Waktu Pengiriman:</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control m-input" name="tgl_pengiriman" readonly
                                        value="{{$bapm->tgl_pengiriman}}" />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="">Lokasi TMP:</label>
                                <input type="hidden" class="form-control m-input" name="lokasi_id" readonly
                                        value="{{$bapm->lokasi_id}}" />
                                <input type="text" class="form-control m-input" name="nama_lokasi" readonly
                                        value="{{ $bapm->lokasi->kode }}" />
                                {{-- <input type="text" class="form-control m-input" name="tgl_pengiriman" readonly
                                value="{{$bapm->tgl_pengiriman}}" /> --}}
                                {{-- <div class="input-group m-input-group m-input-group--square">
                                        <select name="lokasi_id" class="form-control m-input m-input--square" id="lokasi_id" >                                           
                                            <option value="{{$bapm->lokasi_id}}">{{ $bapm->lokasi->kode }}</option>
                                            @foreach ($lokasis as $d)
                                            @if ($bapm->lokasi_id != $d->id){
                                            <option value="{{$d->id}}">{{ $d->kode }}</option>
                                            }
                                            @endif
                                            @endforeach                                           
                                        </select>                                
                                </div> --}}
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label class="">Lokasi Pengambilan:</label>
                                <textarea name="lokasi_pengambilan" class="form-control m-input m-input--air" readonly
                                    id="exampleTextarea" rows="3">{{$bapm->lokasi_pengambilan}}</textarea>
                                {{-- <input type="email" class="form-control m-input" placeholder="Enter contact number"> --}}
                                {{-- <span class="m-form__help">Please enter your contact</span> --}}
                            </div>
                            <div class="col-lg-6">
                                <label class="">Tujuan Pengiriman:</label>
                                <textarea name="tujuan_pengiriman" class="form-control m-input m-input--air" readonly
                                    id="exampleTextarea" rows="3">{{$bapm->tujuan_pengiriman}}</textarea>

                                {{-- <span class="m-form__help">Please enter fax</span> --}}
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label class="">Perihal:</label>
                                <textarea name="perihal" class="form-control m-input m-input--air" readonly
                                    id="exampleTextarea" rows="3">{{ $bapm->perihal }}</textarea>
                                {{-- <input type="email" class="form-control m-input" placeholder="Enter contact number"> --}}
                                {{-- <span class="m-form__help">Please enter your contact</span> --}}
                            </div>
                            <div class="col-lg-3">
                                <label class="">Pemesan:</label>
                                <input type="hidden" class="form-control m-input" name="preference_id" readonly
                                value="{{$bapm->preference_id}}" />
                                <input type="text" class="form-control m-input" name="preference_name" readonly
                                value="{{ $bapm->preference->nama_perusahaan }}" />
                                {{-- <div class="input-group m-input-group m-input-group--square">
                                    <select name="preference_id" class="form-control m-input m-input--square" id="preference_id">                                           
                                        <option value="{{$bapm->preference_id}}">{{ $bapm->preference->nama_perusahaan }}</option>
                                        @foreach ($pref as $d)
                                        @if ($bapm->preference_id != $d->id){
                                        <option value="{{$d->id}}">{{ $d->nama_perusahaan }}</option>
                                        }
                                        @endif
                                        @endforeach                                           
                                    </select>
                                </div> --}}
                            </div> 
                            <div class="col-lg-3">
                                <label class="">Supplier:</label>
                                <input type="hidden" class="form-control m-input" name="vendor_id" readonly
                                value="{{$bapm->vendor_id}}" />
                                <input type="text" class="form-control m-input" name="vendor_name" readonly
                                value="{{ $bapm->vendor->namaperusahaan }}" />
                                {{-- <div class="input-group m-input-group m-input-group--square">
                                    <select name="vendor_id" class="form-control m-input m-input--square"
                                        id="vendor_id">
                                        <option value="{{$bapm->vendor_id}}">{{ $bapm->vendor->namaperusahaan }}
                                        </option>
                                        @foreach ($vendor as $d)
                                        @if ($bapm->vendor_id != $d->id){
                                        <option value="{{$d->id}}">{{ $d->namaperusahaan }}</option>
                                        }
                                        @endif
                                        @endforeach
                                    </select>
                                </div> --}}
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
                                        <th rowspan="2">Material</th>
                                        <th rowspan="2">Satuan</th>
                                        <th colspan="1">Pengiriman</th>
                                        <th colspan="1">Penerimaan</th>
                                        {{-- <th>Action</th> --}}
                                        {{-- <th><a href="#" class="addRow">Add More</a></th> --}}
                                        {{-- <th width='130px'>Action</th> --}}
                                    </tr>
                                    <tr>
                                        <th>Qty</th>
                                        {{-- <th>Catatan</th> --}}
                                        <th>Qty</th>
                                        {{-- <th>Catatan</th> --}}
                                    </tr>
                                </thead>
                                @php
                                $no = 1 ;
                                @endphp
                                <tbody>
                                    @foreach ($bapm->dodetails as $item)
                                    <tr>
                                        <td>
                                            <input type="hidden" name="hargabarang_id[]" id="hargabarang_id" value="{{ $item->hargabarang_id }}">
                                            <textarea name="nama_brg[]" id="nama_brg" cols="30" rows="5" class="form-control m-input" readonly>{{ $item->hargabarang->nama_brg }}</textarea>
                                            {{-- <input type="text" name="nama_brg[]" value="{{ $item->hargabarang->nama_brg }}"
                                                class="form-control m-input" readonly></td> --}}
                                        <td><input type="text" name="satuan[]" class="form-control m-input"
                                                value="{{ $item->satuan }}" readonly></td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="qty[]" id="qtyawal" class="form-control m-input"
                                                value="{{ $item->qty }}" readonly>
                                                {{-- <input type="text" class="form-control m-input" placeholder="Username" aria-describedby="basic-addon2"> --}}
                                                <div class="input-group-append"><span class="input-group-text" name="catatan[]" id="basic-addon2">{{ $item->catatan }}</span></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="qty_baik[]" id="qtybaik" class="form-control m-input"
                                                value="{{ $item->qty_baik }}" >
                                                {{-- <input type="text" class="form-control m-input" placeholder="Username" aria-describedby="basic-addon2"> --}}
                                                <div class="input-group-append"><span class="input-group-text" id="basic-addon2">baik</span></div>
                                            </div>
                                            <br>
                                            <div class="input-group">
                                                <input type="text" name="qty_rusak[]" id="qtyrusak" class="form-control m-input"
                                                value="{{ $item->qty_rusak }}" >
                                                {{-- <input type="text" class="form-control m-input" placeholder="Username" aria-describedby="basic-addon2"> --}}
                                                <div class="input-group-append"><span class="input-group-text" id="basic-addon2">rusak</span></div>
                                            </div>

                                        </td>                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <div class="alert alert-primary" role="alert">
                                    <strong>Catatan!</strong> <br>
                                     1. Mohon untuk dapat diisi sesuai dengan qty yang ada kondisi baik dan buruk. <br>
                                     2. Pengisian data ini tidak dapat diubah, jika sudah di simpan. <br>
                                     3. Untuk File upload mohon dapat disertakan DO yang sudah sign semua pihak, dan foto" kedatangan material dilokasi.
                              </div>
                                {{-- <p>Catatan : Mohon untuk dapat diisi sesuai dengan qty yang ada kondisi baik dan buruk.</p> --}}
                            </div>
                            <div class="col-lg-12">
                                <input type="file" name="filename[]" id="filename" multiple required><br>
                                <span class="m-form__help">Upload lebih dari 1 file dalam bentuk : .pdf, .img</span>
                            <br>
                            <br>
                                @foreach ($bapm->dofiles as $item)
                                <div class="alert alert-dismissible fade show   m-alert m-alert--outline m-alert--air" role="alert">
                                    <a href="/receivedo/destroyfile/{{$item->id}}" onclick="return confirm('Are you sure? Delete ')" class="close" aria-label="Close"> </a>
                                <strong>{{$item->filename}}</strong>     
                                {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    </button>
                                      <strong>{{$item->filename}}</strong>				  	 --}}
                                </div>
                                @endforeach
                               
                            </div>
                        </div>

                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8">
                                    <div class="btn-group pull-right">
                                        <a href="/receivedo" class="btn btn-secondary">Cancel</a>
                                        <button class="btn btn-success">Save</button>
                                        {{-- <a href="/do/store" class="btn btn-success">Submit</a> --}}
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
        $('#tanggal_terima').datepicker({
         //merubah format tanggal datepicker ke dd-mm-yyyy
            autoclose:!0,
            format: "yyyy-mm-dd",
            //aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
            //format: "dd-mm-yyyy",
            // autoclose: true
            // startDate:new Date   
        }),
        $("#tglmulai").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            startDate:new Date
        }),
        $("#tglakhir").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            // startDate:new Date
        });
        $("#tglkirim").datepicker({
            autoclose:!0,
            format:"yyyy-mm-dd",
            startDate:new Date
            // ignoreReadonly: true
        });
    });
</script>
{{-- 
<script type="text/javascript">
    function validasi_input(form){
      if (form.qty_baik.value > $){
        alert("Username masih kosong!");
        form.username.focus();
        return (false);
      }
    return (true);
    }
</script> --}}
{{-- 
<script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
</script> --}}

@endsection