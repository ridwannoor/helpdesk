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
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="/do/update" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="PUT" />
                            <input type="hidden" name="id" value="{{$bapm->id}}" />
                        </div>   
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label>Nomor:</label>
                                    <input type="text" name="no_do" class="form-control m-input" value="{{ $bapm->no_do }}">
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                                <div class="col-lg-4">
                                    <label class="">Tanggal:</label>
                                    <div class="input-group date">
                                            <input type="text" class="form-control m-input" name="tanggal" readonly  value="{{ $bapm->tanggal }}" id="tanggal"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>Nomor PO Ref:</label>
                                    <input type="text" name="ref_po" class="form-control m-input" value="{{$bapm->ref_po}}">
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                               
                                <div class="col-lg-6">
                                    <label class="">Waktu Pelaksanaan:</label>
                                    <div class="input-group date">
                                            <input type="text" class="form-control m-input" name="tgl_mulai" readonly  placeholder="Select Date" id="tglmulai" value="{{$bapm->tgl_mulai}}"/>
                                            <span class="input-group-text">-</span><input type="text" class="form-control m-input" name="tgl_akhir" readonly  placeholder="Select Date" id="tglakhir" value="{{$bapm->tgl_akhir}}"/>
                                            
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
                                            <input type="text" class="form-control m-input" name="tgl_pengiriman" readonly  placeholder="Select Date" id="tglkirim" value="{{$bapm->tgl_pengiriman}}"/>
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
                                                <option value="{{$bapm->lokasi_id}}">{{ $bapm->lokasi->kode }}</option>
                                                @foreach ($lokasis as $d)
                                                @if ($bapm->lokasi_id != $d->id){
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
                                <div class="col-lg-6">
                                    <label class="">Lokasi Pengambilan:</label>
                                    <textarea name="lokasi_pengambilan" class="form-control m-input m-input--air" id="exampleTextarea" rows="3">{{$bapm->lokasi_pengambilan}}</textarea>
                                    {{-- <input type="email" class="form-control m-input" placeholder="Enter contact number"> --}}
                                    {{-- <span class="m-form__help">Please enter your contact</span> --}}
                                </div>
                                <div class="col-lg-6">
                                    <label class="">Tujuan Pengiriman:</label>
                                    <textarea name="tujuan_pengiriman" class="form-control m-input m-input--air" id="exampleTextarea" rows="3">{{$bapm->tujuan_pengiriman}}</textarea>
                                    
                                    {{-- <span class="m-form__help">Please enter fax</span> --}}
                                </div>                            
                            </div>  
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label class="">Perihal:</label>
                                    <textarea name="perihal" class="form-control m-input m-input--air" id="exampleTextarea" rows="3">{{ $bapm->perihal }}</textarea>
                                    {{-- <input type="email" class="form-control m-input" placeholder="Enter contact number"> --}}
                                    {{-- <span class="m-form__help">Please enter your contact</span> --}}
                                </div>
                                <div class="col-lg-3">
                                    <label class="">Pemesan:</label>
                                    <div class="input-group m-input-group m-input-group--square">                                        
                                        <select name="preference_id" class="form-control m-bootstrap-select m_selectpicker" id="preference_id">                                           
                                            <option value="{{$bapm->preference_id}}">{{ $bapm->preference->nama_perusahaan }}</option>
                                            @foreach ($preferences as $d)
                                            @if ($bapm->preference_id != $d->id){
                                            <option value="{{$d->id}}">{{ $d->nama_perusahaan }}</option>
                                            }
                                            @endif
                                            @endforeach                                           
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-lg-3">
                                    <label class="">Supplier:</label>
                                    <div class="input-group m-input-group m-input-group--square">
                                        <select name="vendor_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" id="vendor_id">                                           
                                            <option value="{{$bapm->vendor_id}}">{{ $bapm->vendor->namaperusahaan }}, {{ $bapm->vendor->badanusaha->kode }}</option>
                                            @foreach ($vendor as $d)
                                            @if ($bapm->vendor_id != $d->id){
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
                                                    <th>Catatan</th>
                                                    <th>Action</th>
                                                    {{-- <th><a href="#" class="addRow">Add More</a></th> --}}
                                                    {{-- <th>Action</th> --}}
                                                </tr>
                                            </thead>
                                            @php
                                                $no = 1 ;
                                            @endphp
                                            <tbody>
                                                @foreach ($bapm->dodetails as $item)
                                                <tr>
                                                    <td>
                                                        <div class="input-group">                                                    
                                                            <input type="hidden" name="hargabarang_id[]" id="hargabarang_id" class="form-control m-input" value="{{ $item->hargabarang_id }}">
                                                            <textarea id="nama_brg" name="nama_brg[]" class="form-control m-input" placeholder="nama barang" readonly required
                                                            cols="30" rows="5">{{ $item->hargabarang->nama_brg }}</textarea> 
                                                            {{-- <input type="text" class="form-control" placeholder="Search for..."> --}}
                                                            <div class="input-group-append">
                                                                {{-- <a href="http://" class="btn btn-warning" id="btnModal" data-toggle="modal" data-target="#myModal">Search</a> --}}
                                                                {{-- <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Search</a> --}}
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                                                    Search
                                                                  </button>
                                                            </div>
                                                        </div>{{-- <input type="text" name="deskripsi[]" value="{{ $item->deskripsi }}" class="form-control m-input"></td> --}}
                                                    <td>
                                                        {{-- <input type="text" name="oldqty[]" class="form-control m-input" value="{{ $item->qty }}" onkeypress="return hanyaAngka(event)"> --}}
                                                        <input type="text" name="qty[]" class="form-control m-input" value="{{ $item->qty }}" onkeypress="return hanyaAngka(event)"></td>
                                                    <td><input type="text" name="satuan[]" class="form-control m-input" value="{{ $item->satuan }}"></td>
                                                    <td>
                                                        <textarea name="catatan[]" id="" class="form-control m-input" cols="30" rows="5">{{ $item->catatan }}</textarea>
                                                        {{-- <input type="text" name="catatan[]" class="form-control m-input" value="{{ $item->catatan }}"></td> --}}
                                                    {{-- <td><a href="/do/deleterow/{{ $item->id }}" class="btn btn-danger">Delete</a></td> --}}
                                                    <td>
                                                    <td><a href="/do/destroy/{{ $item->id }}" onclick="return confirm('Are you sure? Delete ')" class="btn btn-danger">Delete</a></td>
                                                    {{-- @if ($no < 1)
                                                    <td><a href="#" id="addrow" class="btn btn-success">Add More</a></td> --}}
                                                    {{-- <td><a href="#" id="remove" class="btn btn-danger">X</a></td> --}}
                                                    {{-- @else
                                                    <td><a href="#" id="remove" class="btn btn-danger">X</a></td> --}}
                                                    {{-- <td><a href="#" id="addrow" class="btn btn-success">Add More</a></td> --}}
                                                    {{-- <td><button id="addrow" class="btn btn-success btn-xs">Add More</button></td> --}}
                                                    {{-- @endif --}}
                                                    
                                                    {{-- <td></td> --}}
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
                                            <a href="/do" class="btn btn-secondary">Cancel</a>
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
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Lokasi</th>
                            <th>Vendor</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @php
                        $no = 1;
                    @endphp
                    <tbody>
                        @foreach ($hargabarangs as $data)
                            {{-- <input type="hidden" id="id" value="{{$data->id}}"> --}}
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->nama_brg}}</td>
                            <td >{{ $data->qty }}</td>
                            <td >{{ $data->satuan }}</td>
                            <td>{{ $data->harga }}</td>
                            <td>{{ $data->lokasi->kode }}</td>
                            <td>{{ $data->vendor->namaperusahaan }}</td>
                            <td><button type="button" class="btn btn-xs btn-primary MySelect" data-id="{{ $data->id }}"  data-qty="{{ $data->qty }}" data-satuan="{{ $data->satuan }}" data-harga="{{ $data->harga }}" data-nama="{{ $data->nama_brg }}">Select</button></td>
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

{{-- 
<script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
</script> --}}


<script type="text/javascript">
    $(document).ready(function () {

    });  $(".MySelect").on('click', function(){
            var id =  $(this).data('id');
            var nama =  $(this).data('nama');
            var qty =  $(this).data('qty');
            var satuan =  $(this).data('satuan');
            var harga =  $(this).data('harga');
            $('#tblAddRow tbody tr:last #hargabarang_id').val(id);
            $('#tblAddRow tbody tr:last #nama_brg').val(nama);
            $('#tblAddRow tbody tr:last #qty').val(qty);
            $('#tblAddRow tbody tr:last #satuan').val(satuan);
            $('#tblAddRow tbody tr:last #hargabrg').val(harga);
            // $('#nama_brg').val(nama);
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

</script> 
@endsection