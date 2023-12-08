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
                    <form class="m-form m-form--label-align-right" method="POST" action="/hargabarang/store" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="POST" />
                            {{-- <input type="hidden" name="id" value="{{$dept->id}}" /> --}}
                        </div>                   
                        <div class="m-portlet__body">	
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label>Lokasi:</label>
                                    <select name="lokasi_id" data-live-search="true" class="form-control m-bootstrap-select m_selectpicker" id="lokasi_id" required>
                                        <option value="">Please Select</option>
                                        @foreach ($lokasis as $item)
                                            <option value="{{ $item->id }}" >{{ $item->kode }}</option>                                        
                                        @endforeach                                       
                                    </select>
                                    {{-- <input type="text" class="form-control m-input" placeholder="Enter full name"> --}}
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                                <div class="col-lg-4">
                                    <label class="">Vendor:</label>
                                    
                                    <select name="vendor_id" data-live-search="true" class="form-control m-bootstrap-select m_selectpicker" id="vendor_id" required>
                                        <option value="">Please Select</option>
                                        @foreach ($vendors as $item)
                                            <option value="{{ $item->id }}" >{{ $item->namaperusahaan . ", " . $item->badanusaha->kode }}</option>                                        
                                        @endforeach                                       
                                    </select>
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
                                            <th>Mata Uang</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $no = 1 ;
                                    @endphp
                                    <tbody>
                                        <tr>
                                            <td style="width: 400px">
                                                {{-- <textarea name="nama_brg[]" id="summernote" class="form-control m-input" ></textarea> --}}
                                                <textarea name="nama_brg[]" class="form-control m-input" rows="3" required></textarea>
                                                {{-- <input type="text" name="nama_brg[]" class="form-control m-input" required> --}}
                                            </td>
                                            <td><input type="text" name="qty[]" class="form-control m-input" readonly></td>
                                            <td><input type="text" name="satuan[]" class="form-control m-input" required></td>
                                            <td>
                                                <select name="currency_id[]" class="form-control m-input" required>
                                                    @foreach ($currencies as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                {{-- <input type="text" name="currency_id[]" class="form-control m-input" required> --}}
                                            </td>
                                            <td>
                                                <input type="text" name="harga[]" class="form-control m-input" required>
                                                <span class="m-form__help">Gunakan titik (.) pada dua angka dibelakang koma</span>
                                            </td>
                                            {{-- <td><button type="button" id="btnDelCheckRow" class="btn btn-danger">X</button></td>  --}}
                                            {{-- @if ($no > 1) --}}
                                            {{-- <td><a href="#" id="remove" class="btn btn-danger remove">X</a></td> --}}
                                            {{-- <td><button id="remove" class="btn btn-danger remove">X</button></td>
                                            @else
                                            <td><a href="#" id="addrow" class="btn btn-success">Add More</a></td> --}}
                                            {{-- <td><button id="addrow" class="btn btn-success btn-xs">Add More</button></td> --}}
                                            {{-- @endif --}}
                                            
                                            {{-- <td></td> --}}
                                        </tr>     
                                    </tbody>                        
                                </table>
                   
                           
                            </div>	  
                                           
                        </div>
                        
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-6">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="/hargabarang" class="btn btn-default">Back</a>
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
        $('#summernote1').summernote({
            height: "100px"
        });
</script>
{{-- 
<script src="type=text/javascript">
 $(document).ready(function () {
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

          // Delete selected checkbox in the table
    $('#btnDelCheckRow').click(function() {
        var lenRow		= $('#tblAddRow tbody tr').length;
        var lenChecked	= $("#tblAddRow input").length;
        var row	= $("#tblAddRow tbody input").parent().parent();
        //alert(lenRow + ' - ' + lenChecked);
        if (lenRow == 1 || lenRow <= 1 || lenChecked >= lenRow) {
            alert("Can't remove all row!");
        } else {
            row.remove();
        }
    }); 
});    
    
</script> --}}
@endsection