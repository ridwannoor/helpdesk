@extends('layouts.app2')


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
            <form class="m-form m-form--label-align-right" method="POST" action="/emailvendor/sendmail"
                enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="_method" value="POST" />
                    {{-- <input type="hidden" name="id" value="{{$vendors->id}}" /> --}}
                </div>
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        <div class="form-group m-form__group ">
                            <label>Email To :</label>
                            <div class="input-group">
                                <input type="text" name="to" class="form-control m-input" id="message">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary " data-toggle="modal"
                                        data-target="#modelId">
                                        <i class="flaticon-search-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group ">
                            <label>Keterangan :</label>
                            <textarea name="keterangan" id="summernote" class="form-control m-input" cols="30"
                                rows="20"></textarea>
                        </div>
                    </div>

                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6">
                                <div class="btn-group pull-right">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"
                                            aria-hidden="true"></i> &nbsp; Kirim</button>
                                    <a href="/vendor" class="btn btn-default"><i class="fa fa-undo"
                                            aria-hidden="true"></i> &nbsp; Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Portlet-->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">List Vendor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="button" value="Get Selected" onclick="GetSelected()" class="btn btn-info"/>
                        <input type="button" value="Select All" class="btn btn-success checkall"/>
                        <br>
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1_wrapper">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Email</th>
                                    <th></th>
                                    {{-- <th><input type="checkbox" name="vendorlist" id="vendorlist"></th> --}}
                                </tr>
                            </thead>
                            @php
                                $no = 1 ;
                            @endphp
                            <tbody>
                                    @foreach ($vendors as $item)
                                    <tr>                            
                                        <td>{{ $no++ }}</td>
                                        <td width = "300px">
                                          {{ $item->namaperusahaan . ", " . $item->badanusaha->kode  }}
                                        </td>
                                        <td style="vertical-align : middle;text-align:center;">{{  $item->email }}</td>
                                        <td><input type="checkbox"/></td>
                                    </tr>    
                                @endforeach     
                                <br>
                                     
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
@endsection


@section('footer-script')
{{-- <script src="assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script> --}}
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
{{-- <script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}"></script> --}}
<script src="assets/demo/default/custom/crud/datatables/basic/basic.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script type="text/javascript">
    function GetSelected() {
        //Reference the Table.
        var grid = document.getElementById("m_table_1_wrapper");
        //Reference the CheckBoxes in Table.
        var checkBoxes = grid.getElementsByTagName("INPUT");
        var message = " ";

        //Loop through the CheckBoxes.
        for (var i = 0; i < checkBoxes.length; i++) {
            if (checkBoxes[i].checked) {
                var row = checkBoxes[i].parentNode.parentNode;
                // $('#tblAddRow tbody tr:last #nama_brg').val(nama);
                // message += row.cells[1].innerHTML;
                message += " " + row.cells[2].innerHTML;
                // message += "   " + row.cells[3].innerHTML;
                // message += "\n";
            }
        }

        //Display selected Row data in Alert Box.
        $('#message').val(message);
        $('#modelId').modal('hide'); 
    }

    function Getall() {
        var grid = document.getElementById("m_table_1_wrapper");
        //Reference the CheckBoxes in Table.
        var checkBoxes = grid.getElementsByTagName("INPUT");
        var message = " ";

        //Loop through the CheckBoxes.
        for (var i = 0; i < checkBoxes.length; i++) {
            checkBoxes.prop('checked', true);
            // if (checkBoxes[i].checked) {
            //     var row = checkBoxes[i].parentNode.parentNode;
            //     // $('#tblAddRow tbody tr:last #nama_brg').val(nama);
            //     // message += row.cells[1].innerHTML;
            //     message += " " + row.cells[2].innerHTML;
            //     // message += "   " + row.cells[3].innerHTML;
            //     // message += "\n";
            // }
        }

        //Display selected Row data in Alert Box.
        $('#message').val(message);
        $('#modelId').modal('hide'); 
    }
</script>

<script>
    $('#summernote').summernote({
        height: "300px"
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

</script>
@endsection
