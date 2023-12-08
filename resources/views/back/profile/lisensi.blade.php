  <div class="modal fade" id="m_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/vendor/profile/lisensi/store" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="_method" value="POST" />
                {{-- <input type="hidden" name="id" value="{{$vendors->id}}" /> --}}
                <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" />
            </div>
            
            <div class="form-group">
              <label for="recipient-name" class="form-control-label">*Jenis :</label>
              <select name="vendorjenis_id" id="jenis" class="form-control m-bootstrap-select m_selectpicker" required>
                    @foreach ($vendorjenis as $item)
                        <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                    @endforeach
              </select>
              {{-- <input type="text" name="jenis" class="form-control" id="jenis" required> --}}
            </div>
            <div class="form-group">
                <label for="recipient-name" class="form-control-label">Keterangan :</label>
                <input type="text" name="keterangan" class="form-control" id="keterangan" >
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">*Nomor :</label>
                <input type="text" name="nomor" class="form-control" id="nomor" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">*Penerbit :</label>
                <input type="text" name="penerbit" class="form-control" id="penerbit" required>
              </div>
            
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">*Tgl Mulai Terbit :</label>
                <input type="date" class="form-control m-input" name="start">
                {{-- <div class="input-group date">
                    <input type="text" class="form-control m-input" name="start" readonly
                        placeholder="Select Date" id="start" required/>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar-check-o"></i>
                        </span>
                    </div>
                </div> --}}
                {{-- <input type="text" name="start" class="form-control" id="start"> --}}
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Tgl Akhir Terbit :</label>
                <input type="date" class="form-control m-input" name="end" id="expired">
                  <br>
                  <label class="m-checkbox m-checkbox--bold">
                    <input type="checkbox" name="expired" id="exp" value="1">  No Expired Date
                    <span></span>
                    </label>
                
              </div>
              
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">*File Upload :</label>
                <input type="file" name="file" class="form-control" id="file" >
                <span class="m-form__help m--font-primary">Upload File Format : .pdf | max: 10Mbps</span>
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

 
  @foreach (Auth::user('vendor')->vendorlisensi as $vl)      
  <div class="modal fade" id="m_modal_6{{ $vl->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <td>{{ $vl->vendor->namaperusahaan . ", " . $vl->vendor->badanusaha->kode }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Dokument</td>
                            <td>{{ $vl->vendorjenis->keterangan }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Keterangan</td>
                            <td>{{ $vl->keterangan }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Nomor</td>
                            <td>{{ $vl->nomor }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Penerbit</td>
                            <td>{{ $vl->penerbit }}</td>
                        </tr>
                       
                        <tr>
                            <td scope="row">Start Date</td>
                            <td>{{ date('d-m-Y', strtotime($vl->start))  }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Expired Date</td>
                            <td>
                              {{-- {{ date('d-m-Y', strtotime($vl->end))  }} --}}
                              @if ($vl->expired)
                                <span class="m--font-success">No Expired</span> 
                              @else
                                @php                              
                                  $now = now();
                                @endphp
                                @if ($vl->end > $now)                              
                                    <span class="m--font-success">{{ date('d-m-Y', strtotime($vl->end)) . " (Active)"  }} </span> 
                                @else                              
                                    <span class="m--font-danger">{{ date('d-m-Y', strtotime($vl->end)) . " (Expired)" }} </span> 
                                @endif
                              @endif
                           </td>
                        </tr>
                        <tr>
                            <td scope="row">File</td>
                            <td><a href="{{ url('data_file/profile/doc/'.$vl->file) }}" target="_blank">{{ $vl->file   }}</a></td>
                        </tr>
                    </tbody>
                </table>
            </form>
      </div>
    </div>
  </div>  
  </div>
  @endforeach
  
  @foreach (Auth::user('vendor')->vendorlisensi as $vl)
  <div class="modal fade" id="m_modal_7{{ $vl->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/vendor/profile/lisensi/update" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="_method" value="PUT" />
                <input type="hidden" name="id" value="{{$vl->id}}" />
                <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" />
            </div>
            
            <div class="form-group">
              <label for="recipient-name" class="form-control-label">*Jenis :</label>
              <select name="vendorjenis_id" id="jenis" class="form-control m-bootstrap-select m_selectpicker" required>
                <option value="{{ $vl->vendorjenis_id }}">{{ $vl->vendorjenis->keterangan }}</option>
                    @foreach ($vendorjenis as $item)
                    @if ($vl->vendorjenis_id != $item->id)
                        <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                    @endif
                    @endforeach
              </select>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="form-control-label">*Keterangan :</label>
                <input type="text" name="keterangan" class="form-control" id="keterangan" value="{{ $vl->keterangan }}" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">*Nomor :</label>
                <input type="text" name="nomor" class="form-control" id="nomor" value="{{ $vl->nomor }}" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">*Penerbit :</label>
                <input type="text" name="penerbit" class="form-control" id="penerbit" value="{{ $vl->penerbit }}" required>
              </div>
              
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">*Tgl Mulai Terbit :</label>
                <input class="form-control m-input" type="date" name="start" value="{{ $vl->start  }}" id="example-date-input" required>
                {{-- <div class="input-group date">
                    <input type="text" class="form-control m-input" name="start" 
                        placeholder="Select Date" id="starte" value="{{ $vl->start  }}"  required/>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar-check-o"></i>
                        </span>
                    </div>
                </div> --}}
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Tgl Akhir Terbit :</label>
                @if ($vl->expired)
                <input class="form-control m-input" type="date" name="end" value="" id="expired1">
                <br>
                <label class="m-checkbox m-checkbox--bold">
                    <input type="checkbox" name="expired" id="exp1" value="1" checked="checked"> No Expired Date            
                  <span></span>
                </label>
                @else
                <input class="form-control m-input" type="date" name="end" value="{{ $vl->end}}" id="expired1">
                <br>
                <label class="m-checkbox m-checkbox--bold">
                    <input type="checkbox" name="expired" id="exp1" value="1"> No Expired Date            
                  <span></span>
                </label>
                @endif
                
                {{-- <div class="input-group date">
                    <input type="text" class="form-control m-input" name="end" 
                        placeholder="Select Date" id="ende" value="{{ $vl->end }}" />
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar-check-o"></i>
                        </span>
                    </div>
                </div> --}}
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">File Upload:</label>
                <input type="file" name="file" class="form-control" id="file" >
                <span class="m-form__help m--font-primary">Upload File Format : .pdf | max: 10Mbps</span><br>
                
                <div class="alert alert-default alert-dismissible fade show m-alert m-alert--square m-alert--air" role="alert">
                  <span><a href="{{ url('data_file/profile/doc/'.$vl->file) }}">{{ $vl->file }}</a></span>
                </div>   

                {{-- <span class="m-form__help m--font-focus">{{ $vl->file }}</span>  --}}
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
        
        $("#start").datepicker({
                autoclose: true,
                format: "yyyy-mm-dd"
        }),
        $("#end").datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            // startDate:new Date
        });
        $("#starte").datepicker({
                autoclose: true,
                format: "yyyy-mm-dd"
        }),
        $("#ende").datepicker({
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