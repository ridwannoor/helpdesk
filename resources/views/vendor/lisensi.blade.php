  {{-- <div class="modal fade" id="m_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            
                <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" />
            </div>
            
            <div class="form-group">
              <label for="recipient-name" class="form-control-label">Jenis:</label>
              <select name="vendorjenis_id" id="jenis" class="form-control m-bootstrap-select m_selectpicker">
                    @foreach ($vendorjenis as $item)
                        <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                    @endforeach
              </select>
             
            </div>
            <div class="form-group">
                <label for="recipient-name" class="form-control-label">Keterangan:</label>
                <input type="text" name="keterangan" class="form-control" id="keterangan" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Nomor:</label>
                <input type="text" name="nomor" class="form-control" id="nomor">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Penerbit:</label>
                <input type="text" name="penerbit" class="form-control" id="penerbit" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Telp Penerbit:</label>
                <input type="text" name="telp" class="form-control" id="telp" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Tgl Mulai Terbit:</label>
                <div class="input-group date">
                    <input type="text" class="form-control m-input" name="start" readonly
                        placeholder="Select Date" id="start" required/>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar-check-o"></i>
                        </span>
                    </div>
                </div>
            
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Tgl Akhir Terbit:</label>
                <div class="input-group date">
                    <input type="text" class="form-control m-input" name="end" readonly
                        placeholder="Select Date" id="end" required/>
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

  {{-- @if ($vendors->vendorlisensi == null)

  @else --}}
  @foreach ($vendors->vendorlisensi as $vl)
      
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
                            <td>{{ $vl->start }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Expired Date</td>
                            <td>
                            @php                              
                            $now = now();
                            @endphp
                            @if ($vl->end > $now)
                            
                                <span class="m--font-success">{{ date('d-m-Y', strtotime($vl->end)) . " (Active)"  }} </span> 
                            @else
                            
                                <span class="m--font-danger">{{ date('d-m-Y', strtotime($vl->end)) . " (Expired)" }} </span> 
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
  {{-- @endif --}}
  

  {{-- <div class="modal fade" id="m_modal_7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <label for="recipient-name" class="form-control-label">Jenis:</label>
              <select name="vendorjenis_id" id="jenis" class="form-control m-bootstrap-select m_selectpicker">
                <option value="{{ $vl->vendorjenis_id }}">{{ $vl->vendorjenis->keterangan }}</option>
                    @foreach ($vendorjenis as $item)
                    @if ($vl->vendorjenis_id != $item->id)
                        <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                    @endif
                    @endforeach
              </select>
            
            </div>
            <div class="form-group">
                <label for="recipient-name" class="form-control-label">Keterangan:</label>
                <input type="text" name="keterangan" class="form-control" id="keterangan" value="{{ $vl->keterangan }}" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Nomor:</label>
                <input type="text" name="nomor" class="form-control" id="nomor" value="{{ $vl->nomor }}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Penerbit:</label>
                <input type="text" name="penerbit" class="form-control" id="penerbit" value="{{ $vl->penerbit }}" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Telp Penerbit:</label>
                <input type="text" name="telp" class="form-control" id="telp" value="{{ $vl->telp }}" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Tgl Mulai Terbit:</label>
                <div class="input-group date">
                    <input type="text" class="form-control m-input" name="start" readonly
                        placeholder="Select Date" id="start" value="{{ $vl->start  }}" required/>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar-check-o"></i>
                        </span>
                    </div>
                </div>
             
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Tgl Akhir Terbit:</label>
                <div class="input-group date">
                    <input type="text" class="form-control m-input" name="end" readonly
                        placeholder="Select Date" id="end" value="{{ $vl->end }}"  required/>
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
  