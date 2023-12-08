<div class="modal fade" id="lap_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/vendor/profile/lap/store" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="POST" />
                        <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" />
                    </div>
                  
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Tahun :</label>
                        <input class="form-control m-input" type="date" name="thn" id="example-date-input" required>
                        {{-- <div class="input-group date">
                            <input type="text" class="form-control m-input" name="thn" readonly
                                placeholder="Select Date" id="thn" required/>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-calendar-check-o"></i>
                                </span>
                            </div>
                        </div> --}}
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Keterangan :</label>
                        <select name="keterangan" id="keterangan" class="form-control m-bootstrap-select m_selectpicker" required>
                            <option value="Audited">Audited</option>
                            <option value="Un Audited">Un Audited</option>
                        </select>
                        {{-- <input type="text" name="keterangan" class="form-control" id="keterangan" required> --}}
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*File Upload :</label>
                        <input type="file" name="file" class="form-control" id="file" >
                        <span class="m-form__help m--font-primary">Upload File : Neraca/Laba-Rugi/Laporan KAP | Format : .pdf | max: 10Mbps</span> 
                        @if($errors->has('file'))
                        <small class="error">{{ $errors->first('file') }}</small>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach (Auth::user('vendor')->vendorlap as $vla)

<div class="modal fade" id="lap_modal_2{{ $vla->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Show</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td scope="row">Vendor</td>
                                <td>{{ $vla->vendor->namaperusahaan . ", " . $vla->vendor->badanusaha->kode }}</td>
                            </tr>
                            <tr>
                                <td scope="row">Keterangan</td>
                                <td>{{ $vla->keterangan }}</td>
                            </tr>
                            <tr>
                                <td scope="row">Tahun</td>
                                <td>{{ date('Y', strtotime($vla->thn))  }}</td>
                            </tr>
                            <tr>
                                <td scope="row">File</td>
                                <td><a href="{{ url('data_file/profile/doc/'.$vla->file) }}"
                                        target="_blank">{{ $vla->file   }}</a></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach (Auth::user('vendor')->vendorlap as $vla)

<div class="modal fade" id="lap_modal_3{{ $vla->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/vendor/profile/lap/update" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="PUT" />
                        <input type="hidden" name="id" value="{{ $vla->id }}" />
                        <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" />
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Tahun :</label>
                        <input class="form-control m-input" type="date" name="thn" value="{{ $vla->thn }}" id="example-date-input" required>
                        {{-- <div class="input-group date">
                            <input type="text" class="form-control m-input" name="thn" readonly
                                placeholder="Select Date" id="thn1" value="{{ $vla->thn }}" required/>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-calendar-check-o"></i>
                                </span>
                            </div>
                        </div> --}}
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Keterangan :</label>
                        <select name="keterangan" id="keterangan" class="form-control m-bootstrap-select m_selectpicker" required>
                            <option value="Audited">Audited</option>
                            <option value="Un Audited">Un Audited</option>
                        </select>
                        {{-- <input type="text" name="keterangan" class="form-control" id="keterangan" value="{{ $vla->keterangan }}" required> --}}
                    </div>                    
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*File Upload :</label>
                        <input type="file" name="file" class="form-control" id="file" >
                        <span class="m-form__help m--font-primary">Upload File : Neraca/Laba-Rugi/Laporan KAP | Format : .pdf | max: 10Mbps</span><br>
                        <div class="alert alert-default alert-dismissible fade show m-alert m-alert--square m-alert--air" role="alert">
                            <span><a href="{{ url('data_file/profile/doc/'.$vla->file) }}">{{ $vla->file }}</a></span>
                          </div> 

                        {{-- <span class="m-form__help m--font-focus">{{ $vla->file }}</span>  --}}
                        @if($errors->has('file'))
                        <small class="error">{{ $errors->first('file') }}</small>
                        @endif
                    </div>
                     </div>   
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>                    
        </div>
    </div>
</div>
@endforeach


@section('footer-script')
<script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
       $(document).ready(function () {
        
        $("#thn").datepicker({
                autoclose: true,
                format: "yyyy-mm-dd"
        }),
        $("#thn1").datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            // startDate:new Date
        });
    });

</script>
@endsection 