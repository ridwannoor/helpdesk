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
                
                <form class="m-form m-form--label-align-right" method="POST" action="/rekappo/store1"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="POST" />
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label>No Purchase Order</label>
                                    <input type="text" name="no_po" class="form-control m-input"
                                        value="{{ $noUrutAkhir }}" required>
                                </div>
                                <div class="col-lg-4">
                                    <label>No Kontrak</label>
                                    <input type="text" name="no_kontrak" class="form-control m-input" placeholder="Contoh : xxx/.../..../...">
                                </div>
                                <div class="col-lg-4">
                                    <label>Nilai RAP</label>
                                    <input type="text" name="nilai_rap" class="form-control m-input" required>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-3">
                                    <label>Tanggal</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control m-input" name="tanggal" readonly
                                            placeholder="Select Date" id="tanggal" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Vendor</label>
                                    <select name="vendor_id" class="form-control m-bootstrap-select m_selectpicker"
                                        id="vendor_id" data-live-search="true" required>
                                        <option value="">Please Select</option>
                                        @foreach ($vendors as $item)
                                        {{-- <input type="hidden" name="namaperusahaan" value="{{ $item->vendor->namaperusahaan }}">
                                        --}}
                                        <option value="{{ $item->id }}">{{ $item->vendor->namaperusahaan }}, {{ $item->vendor->badanusaha->kode }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label>Mata Uang</label>
                                    <select name="currency_id" class="form-control m-bootstrap-select m_selectpicker"
                                    id="currency_id" data-live-search="true" required>
                                        <option value="">Please Select</option>
                                        @foreach ($currencys as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label>Waktu Pelaksanaan</label>
                                    <div class="btn-group">
                                        <div class="input-group date">
                                            <input type="text" class="form-control m-input" name="start_date" readonly
                                                placeholder="Select Date" id="start_date" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div><span></span>
                                        <div class="input-group date">
                                            <input type="text" class="form-control m-input" name="end_date" readonly
                                                placeholder="Select Date" id="end_date" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="pajak">Pajak</label>
                                    <div class="m-form__group form-group">
                                        <div class="m-radio-inline" id="rdpajak">
                                            <label class="m-radio">
                                                <input type="radio" name="pajak" value="ppn"> Include Pajak 10%
                                                <span></span>
                                            </label>
                                            <label class="m-radio">
                                                <input type="radio" name="pajak" value="ppn11" checked="checked"> Include Pajak 11%
                                                <span></span>
                                            </label>
                                            <label class="m-radio">
                                                <input type="radio" name="pajak" value="pph"> Include Pajak 1%
                                                <span></span>
                                            </label>
                                            <label class="m-radio">
                                                <input type="radio" name="pajak" value="exclude"> Exclude Pajak
                                                <span></span>
                                            </label>
                                            <label class="m-radio">
                                                <input type="radio" name="pajak" value="other"> Other...
                                                <span></span>
                                            </label>
                                        </div>
                                        <p class="m-form__help"><input type="text" class="form-control m-input" id="otherpajak" style="display:none" name="pajak1" placeholder="Contoh : 10 (masukkan hanya angka)"  ></p>
                                    </div>
                                </div>                             
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label>Nama Pengadaan</label>
                                    <textarea name="nama_pekerjaan" class="form-control m-input" id="nama_pekerjaan"
                                        cols="30" rows="5" placeholder="Contoh : Deskripsi Pekerjaan "></textarea>
                                </div>
                                <div class="col-lg-6">
                                    <label>Cara Bayar</label>
                                    <div class="m-form__group form-group">
                                        <div class="col-12">
                                            <div class="m-radio-inline" id="rdbayar">                                              
                                                <label class="m-radio">
                                                    <input type="radio" name="cara_bayar" value="cbd" checked="checked"> Cash Before Delivery
                                                    <span></span>
                                                </label>
                                                <label class="m-radio">
                                                    <input type="radio" name="cara_bayar" value="cad"> Cash After Delivery
                                                    <span></span>
                                                </label>
                                                <label class="m-radio">
                                                    <input type="radio" name="cara_bayar" value="dp"> DP 20% & Sisa 80%
                                                    <span></span>
                                                </label>
                                                <label class="m-radio">
                                                    <input type="radio" name="cara_bayar" value="other"> Other...
                                                    <span></span>
                                                </label>
                                            </div>
                                            <p class="m-form__help"><input type="text" class="form-control m-input" id="otherAnswer" style="display:none" name="cara_bayar1"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label>Lokasi</label>
                                    <select name="lokasi_id" class="form-control m-bootstrap-select m_selectpicker"
                                        id="lokasi_id" data-live-search="true" required>
                                        <option value="">Please Select</option>
                                        @foreach ($lokasis as $item)
                                        <option value="{{ $item->id }}">{{ $item->kode }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label>Perusahaan</label>
                                    <select name="preference_id" class="form-control m-bootstrap-select m_selectpicker"
                                        id="preference_id">
                                        @foreach ($preferences as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_perusahaan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label>Catatan</label>
                                    <div class="m-radio-inline" id="rdpabrik">
                                        <label class="m-radio">
                                            <input type="radio" name="hargapabrik" value="franco" checked="checked">Harga Franco
                                            <span></span>
                                        </label>
                                        <label class="m-radio">
                                            <input type="radio" name="hargapabrik" value="loco" >Harga Loco
                                            <span></span>
                                        </label>
                                    </div>
                                    <p class="m-form__help"><input type="text" class="form-control m-input" name="deskripsi" placeholder="Contoh : Jakarta .."></p> 
                                </div>     
                                
                                <div class="col-lg-6">
                                    <label for="asuransi">Asuransi</label>
                                    <div class="m-radio-inline" id="rdasuransi">
                                        <label class="m-radio">
                                            <input type="radio" name="asuransi" value="exclude" checked="checked">Exclude Asuransi
                                            <span></span>
                                        </label>
                                        <label class="m-radio">
                                            <input type="radio" name="asuransi" value="include" >Include Asuransi
                                            <span></span>
                                        </label>
                                    </div>
                                    {{-- <div class="m-checkbox-list">
                                        <label class="m-checkbox m-checkbox--state-success">
                                            <input type="checkbox" name="asuransi" value="1"> Include Asuransi
                                            <span></span>
                                        </label>
                                    </div> --}}
                                    <span class="m-form__help m--font-info">Notes : Jika Include Asuransi Mohon tambahkan nilai di dalam kolom Material/Barang dibawah</span>
                                </div>                              
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label for="">Surat Penawaran</label>
                                    <div class="m-radio-inline" id="rdsp" >
                                        <label class="m-radio">
                                            <input type="radio" name="suratpenawaran" value="spph"> SPPH
                                            <span></span>
                                        </label>
                                        <label class="m-radio">
                                            <input type="radio" name="suratpenawaran" value="spph_nego"> SPPH Nego
                                            <span></span>
                                        </label>
                                    </div>
                                    <p class="m-form__help" >
                                        <div class="row">
                                            <div class="col-lg-5"> <div class="input-group date">
                                                <input type="text" class="form-control m-input" name="desc_tgl" readonly
                                                    placeholder="Select Date" id="date" required/>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="la la-calendar-check-o"></i>
                                                    </span>
                                                </div>
                                            </div></div>
                                            <div class="col-lg-7"> <input type="text" class="form-control m-input" name="desc" placeholder="No Surat" /></div>
                                        </div>                                       
                                    </p>
                                </div>
                                <div class="col-lg-6">
                                    <label>BOD</label>
                                    <select name="bod_id" class="form-control m-bootstrap-select m_selectpicker"
                                        id="bod_id" required>
                                        <option value="">Please Select</option>
                                        @foreach ($bods as $item)
                                            @if ($item->status == 'active')
                                            <option value="{{ $item->id }}">{{ $item->name }}, {{ $item->code }}</option>
                                            @endif                                        
                                        @endforeach
                                    </select>  
                                   </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label for="">Catatan</label>
                                    <textarea name="catatan" class="form-control m-input" id="summernote"></textarea>
                                   
                                </div>
                            </div>
                            <hr>
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
                                            <th>Material/Barang</th>
                                            <th width="100px">Qty</th>
                                            <th width="100px">Satuan</th>
                                            {{-- <th width="100px">Mata Uang</th> --}}
                                            <th width="200px">Harga</th>
                                        </tr>
                                    </thead>
                                    @php
                                    $no = 1 ;
                                    
                                    @endphp
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="input-group">                                                    
                                                    <input type="hidden" name="hargabarang_id[]" id="hargabarang_id" class="form-control m-input" value="">
                                                    {{-- <input type="hidden" name="currency_id[]" id="currency_id" class="form-control m-input" value=""> --}}
                                                    <textarea id="nama_brg" name="nama_brg[]" class="form-control m-input" placeholder="nama barang" cols="30" rows="5"  readonly required></textarea> 
                                                    {{-- <input type="text" class="form-control" placeholder="Search for..."> --}}
                                                    <div class="input-group-append">
                                                        {{-- <a href="http://" class="btn btn-warning" id="btnModal" data-toggle="modal" data-target="#myModal">Search</a> --}}
                                                        {{-- <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Search</a> --}}
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                                            Search
                                                          </button>
                                                    </div>
                                                </div>
                                                {{-- <textarea name="material[]" class="form-control m-input" required
                                                    cols="30" rows="5"></textarea>  --}}
                                                </td>
                                            {{-- <input type="text" name="material[]" class="form-control m-input" required> --}}
                                            <td><input type="text" name="qty[]" id="qty"
                                                    class="form-control m-input qty" 
                                                    required></td>
                                            <td><input type="text" name="satuan[]" id="satuan"
                                                    class="form-control m-input" required></td>
                                            <td><input type="text" name="harga[]" id="hargabrg"
                                                    class="form-control m-input" 
                                                    required></td>

                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" style="text-align: right">Diskon</td>
                                            <td><input type="text" name="diskon" class="form-control m-input"
                                                    id="diskon"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="text-align: right">Biaya Kirim</td>
                                            <td><input type="text" name="biaya_kirim" class="form-control m-input"
                                                    onkeypress="return hanyaAngka(event)" id="biaya_kirim"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right">Custom (+)</td>
                                            <td colspan="2"><input type="text" name="custom" style="text-align: right" class="form-control m-input"
                                                id="custom"></td>
                                            <td><input type="text" name="custom1" class="form-control m-input"
                                                    id="custom1"></td>
                                        </tr>
                                        <tr>
                                            <td  style="text-align: right">Custom (-)</td>
                                            <td colspan="2"><input type="text" name="custom2" style="text-align: right" class="form-control m-input"
                                                id="custom"></td>
                                            <td><input type="text" name="custom3" class="form-control m-input"
                                                     id="custom3"></td>
                                        </tr>
                                    </tfoot>
                                </table>

                                
                            </div>

                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="/rekappo" class="btn btn-default">Back</a>
                                    <div class="btn-group pull-right">
                                        {{-- <a href="/rekappo/next" class="btn btn-primary">Next</a> --}}
                                        <button type="submit" class="btn btn-primary">Next</button>
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
                        {{-- <th>Mata Uang</th> --}}
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
                        <td>{!! $data->nama_brg !!}</td>
                        <td >{{ $data->qty }}</td>
                        <td >{{ $data->satuan }}</td>
                        {{-- <td >{{ $data->currency->name }}</td> --}}
                        <td>{{ $data->currency->name . " " . $data->harga }}</td>
                        <td>{{ $data->lokasi->kode }}</td>
                        <td>{{ $data->vendor->namaperusahaan }}</td>
                        <td><button type="button" class="btn btn-xs btn-primary MySelect" data-id="{{ $data->id }}" data-satuan="{{ $data->satuan }}" data-harga="{{ $data->harga }}"  data-nama="{!! $data->nama_brg !!}">Select</button></td>
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
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"> </script>  --}}
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}" type="text/javascript"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
     $('#summernote').summernote({
            height: "100px"
        });
        // $('#nama_brg').summernote({
        //     height: "100px"
        // });
        // $('#summernote1').summernote({
        //     height: "100px"
        // });
</script>
<script type="text/javascript">
    $(document).ready(function () {

        
        // $('#m_table_1_wrapper').DataTable( {
        // search: {
        //     return: true
        // }
    // } );
        $('#tanggal').datepicker({
                //merubah format tanggal datepicker ke dd-mm-yyyy
                format: "yyyy-mm-dd",
                //aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
                //format: "dd-mm-yyyy",
                autoclose: true
            }),
            $("#start_date").datepicker({
                autoclose: true,
                format: "yyyy-mm-dd"
            }),
            $("#end_date").datepicker({
                autoclose: true,
                format: "yyyy-mm-dd",
                // startDate:new Date
            });

            $("#date").datepicker({
                autoclose: true,
                format: "yyyy-mm-dd",
                // startDate:new Date
            });
            $('.submit-confirm').on('click', function (event) {
                event.preventDefault();
                const url = $(this).attr('href');
                swal({
                    title: 'Anda Sudah Yakin?',
                
                    icon: 'warning',
                    buttons: ["Tidak", "Iya !"],
                }).then(function(value) {
                    if (value) {
                        window.location.href = url;
                    }
                });
            });
            // $('#m_table_1_wrapper tbody tr').on('click', function () {
            // var data = table.row( this ).data());
            // alert( 'You clicked on '+data[0]+'\'s row' );
            // });

    });

</script>

<script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
</script>

{{-- <script type="text/javascript">
    $(document).ready(function () {       
       var table = $('#m_table_1_wrapper').DataTable({
        responsive: true;

        $('#m_table_1_wrapper tbody').on('click', 'tr', function () {
         console.log( table.row( this ).data());
        // alert( 'You clicked on '+data[0]+'\'s row' );
        } );
   });
</script> --}}

<script type="text/javascript">
    $(document).ready(function () {

        $("#rdbayar input[type='radio']").change(function(){
            if($(this).val()=="other")
            {
                $("#otherAnswer").show();
            }
            else
            {                
                $("#otherAnswer").hide(); 
            }
        });

        $("#rdpajak input[type='radio']").change(function(){
            if($(this).val()=="other")
            {
                $("#otherpajak").show();
            }
            else
            {                
                $("#otherpajak").hide(); 
            }
        });
       
        $(".MySelect").on('click', function(){
            var id =  $(this).data('id');
            var nama =  $(this).data('nama');
            var satuan =  $(this).data('satuan');
            // var currency_id =  $(this).data('currency_id');
            // var currency =  $(this).data('currency');
            var harga =  $(this).data('harga');
            $('#tblAddRow tbody tr:last #hargabarang_id').val(id);
            $('#tblAddRow tbody tr:last #nama_brg').val(nama);
            $('#tblAddRow tbody tr:last #satuan').val(satuan);
            // $('#tblAddRow tbody tr:last #currency_id').val(currency_id);
            // $('#tblAddRow tbody tr:last #currency').val(currency);
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
    });

</script>

@endsection
