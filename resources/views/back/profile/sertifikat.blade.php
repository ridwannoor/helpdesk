<style>
  option {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }
</style>
  
  
  <div class="modal fade" id="sertifikat_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/vendor/profile/sertifikat/store" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="_method" value="POST" />
                {{-- <input type="hidden" name="id" value="{{$vendors->id}}" /> --}}
                <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" />
            </div>
            
            <div class="form-group">
              <label for="recipient-name" class="form-control-label">*Klasifikasi :</label>
              <select name="vendorklasifikasi_id" id="klasifikasi" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                    @foreach ($vendorklasifikasi as $item)
                        <option data-content="{{ $item->kode . ' - ' . (strlen($item->name) > 90 ? substr($item->name,0,90).' ...' : $item->name) }}" value="{{ $item->id }}"></option>
                    @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="form-control-label">*Kualifikasi :</label>
              <select name="vendorsubkla_id" id="subkla" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                    @foreach ($vendorsubkla as $item)
                        <option value="{{ $item->id }}">{{  $item->name }}</option>
                    @endforeach
              </select>          
            </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">*Nomor :</label>
                <input type="text" name="nomor" class="form-control" id="nomor" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">*Keterangan :</label>
                <input type="text" name="keterangan" class="form-control" id="keterangan" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">* Tgl Mulai :</label>
                <input class="form-control m-input" type="date" name="berlaku_start"  id="example-date-input" required>
                {{-- <div class="input-group date">
                    <input type="text" class="form-control m-input" name="berlaku_start" readonly
                        placeholder="Select Date" id="berlaku_start" required/>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar-check-o"></i>
                        </span>
                    </div>
                </div> --}}
                {{-- <input type="text" name="start" class="form-control" id="start"> --}}
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Tgl Akhir :</label>
                <input class="form-control m-input" type="date" name="berlaku_end" id="expired" >
                <br>
                <label class="m-checkbox m-checkbox--bold">
                  <input type="checkbox" name="expired"> No Expired Date
                  <span></span>
                  </label>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">File Upload:</label>
                <input type="file" name="file" class="form-control" id="file" >
                <span class="m-form__help  m--font-primary">Upload File Format : .pdf | max: 10Mbps</span>
                @if($errors->has('file'))
                  <small class="error">{{ $errors->first('file') }}</small>
                @endif
              </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  @foreach (Auth::user('vendor')->vendorsertifikat as $vs)
  <div class="modal fade" id="sertifikat_modal_2{{ $vs->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <td>{{ $vs->vendor->namaperusahaan . ", " . $vs->vendor->badanusaha->kode }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Klasifikasi</td>
                            <td>{{ $vs->vendorklasifikasi->kode . " - " . $vs->vendorklasifikasi->name . " (" . $vs->vendorsubkla->kode . ") "  }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Keterangan</td>
                            <td>{{ $vs->keterangan }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Nomor</td>
                            <td>{{ $vs->nomor }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Start Date</td>
                            <td>{{ $vs->berlaku_start }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Expired Date</td>
                            <td>
                            @if ($vs->expired)
                              <span class="m--font-success">No Expired</span> 
                            @else
                              @php                              
                              $now = now();
                              @endphp
                              @if ($vs->berlaku_end > $now)
                              
                                  <span class="m--font-success">{{ date('d-m-Y', strtotime($vs->berlaku_end)) . " (Active)"  }} </span> 
                              @else
                              
                                  <span class="m--font-danger">{{ date('d-m-Y', strtotime($vs->berlaku_end)) . " (Expired)" }} </span> 
                              @endif
                            @endif
                             </td>
                        </tr>
                        <tr>
                            <td scope="row">File</td>
                            <td><a href="{{ url('data_file/profile/doc/'.$vs->file) }}" target="_blank">{{ $vs->file   }}</a></td>
                        </tr>
                    </tbody>
                </table>
            </form>
      </div>
    </div>
  </div>
  </div>
  @endforeach

  @foreach (Auth::user('vendor')->vendorsertifikat as $vs)
  <div class="modal fade" id="sertifikat_modal_3{{ $vs->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/vendor/profile/sertifikat/update" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="_method" value="PUT" />
                <input type="hidden" name="id" value="{{$vs->id}}" />
                <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" />
            </div>
            
           

            <div class="form-group">
              <label for="recipient-name" class="form-control-label">*Klasifikasi :</label>
              <select name="vendorklasifikasi_id" id="jenis" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                <option value="{{ $vs->vendorklasifikasi_id }}">{{ $vs->vendorklasifikasi->kode . " - " . $vs->vendorklasifikasi->name }}</option>
                    @foreach ($vendorklasifikasi as $item)
                      @if ($vs->vendorklasifikasi_id != $item->id)
                          <option value="{{ $item->id }}">{{ $item->kode . " - " . $item->name }}</option>
                      @endif
                    @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="form-control-label">*Kualifikasi :</label>
              <select name="vendorsubkla_id" id="jenis" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                <option value="{{ $vs->vendorsubkla_id }}">{{ $vs->vendorsubkla->name }}</option>
                    @foreach ($vendorsubkla as $item)
                    @if ($vs->vendorsubkla_id != $item->id)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                    @endforeach
              </select>
            </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">*Nomor :</label>
                <input type="text" name="nomor" class="form-control" id="nomor" value="{{ $vs->nomor }}" required> 
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">*Keterangan :</label>
                <input type="text" name="keterangan" class="form-control" id="keterangan"  value="{{ $vs->keterangan }}" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">*Tgl Mulai :</label>
                <input class="form-control m-input" type="date" name="berlaku_start" value="{{ $vs->berlaku_start }}"  id="example-date-input" required>
                {{-- <div class="input-group date">
                    <input type="text" class="form-control m-input" name="berlaku_start" value="{{ $vs->berlaku_start }}" 
                        placeholder="Select Date" id="berlaku_start1" required/>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar-check-o"></i>
                        </span>
                    </div>
                </div> --}}
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Tgl Akhir :</label>
                @if ($vs->expired)
                <input class="form-control m-input" type="date" name="berlaku_end" value="" id="expired1">
                <br>
                <label class="m-checkbox m-checkbox--bold">
                    <input type="checkbox" name="expired" id="exp1" value="1" checked="checked"> No Expired Date            
                  <span></span>
                </label>
                @else
                <input class="form-control m-input" type="date" name="berlaku_end" value="{{ $vs->berlaku_end}}" id="expired1">
                <br>
                <label class="m-checkbox m-checkbox--bold">
                    <input type="checkbox" name="expired" id="exp1" value="1"> No Expired Date            
                  <span></span>
                </label>
                @endif

                {{-- <input class="form-control m-input" type="date" name="berlaku_end" value="{{ $vs->berlaku_end }}" id="example-date-input" required>
                <br>
                <label class="m-checkbox m-checkbox--bold">
                  <input type="checkbox" name="expired"> No Expired Date
                  <span></span>
                  </label> --}}
                {{-- <div class="input-group date">
                    <input type="text" class="form-control m-input" name="berlaku_end" value="{{ $vs->berlaku_end }}" readonly
                        placeholder="Select Date" id="berlaku_end1" />
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar-check-o"></i>
                        </span>
                    </div>
                </div> --}}
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">*File Upload :</label>
                <input type="file" name="file" class="form-control" id="file" >
                <span class="m-form__help m--font-primary">Upload File Format : .pdf | max: 10Mbps</span><br>
                <div class="alert alert-default alert-dismissible fade show m-alert m-alert--square m-alert--air" role="alert">
                  <span><a href="{{ url('data_file/profile/doc/'.$vs->file) }}">{{ $vs->file }}</a></span>
                </div> 
                {{-- <span class="m-form__help m--font-focus">{{ $vs->file }}</span>  --}}
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
        
        $("#berlaku_start").datepicker({
                autoclose: true,
                format: "yyyy-mm-dd"
        }),
        $("#berlaku_end").datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            // startDate:new Date
        });
        $("#berlaku_start1").datepicker({
                autoclose: true,
                format: "yyyy-mm-dd"
        }),
        $("#berlaku_end1").datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            // startDate:new Date
        });
        $('#exp').change(function() {
          if($(this).prop("checked")){
          $('#expired').prop('disabled', true);
          }
          else
          {
          $('#expired').prop('disabled',false)
          }
        });
      
        $('#exp1').change(function() {
          if($(this).prop("checked")){
          $('#expired1').prop('disabled', true);
          }
          else
          {
          $('#expired1').prop('disabled',false)
          }
        });
       
  

    });

</script>
@endsection