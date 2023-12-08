
  {{-- <div class="modal fade" id="sertifikat_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              
                <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" />
            </div>
            
            <div class="form-group">
              <label for="recipient-name" class="form-control-label">Klasifikasi:</label>
          
              <input type="text" name="klasifikasi" class="form-control" id="klasifikasi" required>
            </div>
         
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Nomor:</label>
                <input type="text" name="nomor" class="form-control" id="nomor">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Keterangan:</label>
                <input type="text" name="keterangan" class="form-control" id="keterangan" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Tgl Mulai:</label>
                <div class="input-group date">
                    <input type="text" class="form-control m-input" name="berlaku_start" readonly
                        placeholder="Select Date" id="berlaku_start" required/>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar-check-o"></i>
                        </span>
                    </div>
                </div>
            
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Tgl Akhir:</label>
                <div class="input-group date">
                    <input type="text" class="form-control m-input" name="berlaku_end" readonly
                        placeholder="Select Date" id="berlaku_end" required/>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar-check-o"></i>
                        </span>
                    </div>
                </div>
           
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">File Upload:</label>
                <input type="file" name="file" class="form-control" id="file" required>
              </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
    </form>
      </div>
    </div>
  </div> --}}

  {{-- @if ($vendors->sertifikat) --}}
  
@foreach ($vendors->vendorsertifikat as $vs)
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
                        {{-- @foreach ($vendors as $item) --}}
                        {{-- @foreach ($item->vendorsertifikat as $vs)                    --}}
                        <tr>
                            <td scope="row">Vendor</td>
                            <td>{{ $vs->vendor->namaperusahaan . ", " . $vs->vendor->badanusaha->kode }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Klasifikasi</td>
                            <td>{{ $vs->vendorklasifikasi->kode . " - " . $vs->vendorklasifikasi->name . " - (" . $vs->vendorsubkla->name . ")" }}</td>
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
                              @php                              
                              $now = now();
                            @endphp
                            @if ($vs->berlaku_end > $now)
                            
                                <span class="m--font-success">{{ date('d-m-Y', strtotime($vs->berlaku_end)) . " (Active)"  }} </span> 
                            @else
                            
                                <span class="m--font-danger">{{ date('d-m-Y', strtotime($vs->berlaku_end)) . " (Expired)" }} </span> 
                            @endif
                             </td>
                        </tr>
                        <tr>
                            <td scope="row">File</td>
                            <td><a href="{{ url('data_file/profile/doc/'.$vs->file) }}" target="_blank">{{ $vs->file   }}</a></td>
                        </tr>
                        {{-- @endforeach --}}
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </form>
      </div>
    </div>
  </div>
  
  </div>
  {{-- @endif --}}
  
  @endforeach 
  {{-- <div class="modal fade" id="sertifikat_modal_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <label for="recipient-name" class="form-control-label">Klasifikasi:</label>
             
              <input type="text" name="klasifikasi" class="form-control" id="klasifikasi" value="{{ $vs->klasifikasi }}" required>
            </div>
         
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Nomor:</label>
                <input type="text" name="nomor" class="form-control" id="nomor" value="{{ $vs->nomor }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Keterangan:</label>
                <input type="text" name="keterangan" class="form-control" id="keterangan" required value="{{ $vs->keterangan }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Tgl Mulai:</label>
                <div class="input-group date">
                    <input type="text" class="form-control m-input" name="berlaku_start" value="{{ $vs->berlaku_start }}" readonly
                        placeholder="Select Date" id="berlaku_start" required/>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar-check-o"></i>
                        </span>
                    </div>
                </div>
          
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Tgl Akhir:</label>
                <div class="input-group date">
                    <input type="text" class="form-control m-input" name="berlaku_end" value="{{ $vs->berlaku_end }}" readonly
                        placeholder="Select Date" id="berlaku_end" required/>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar-check-o"></i>
                        </span>
                    </div>
                </div>
             
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">File Upload:</label>
                <input type="file" name="file" class="form-control" id="file" required>
              </div>
        
        </div>
        <div class="modal-footer">
       
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
      </div>
    </div>
  </div> --}}