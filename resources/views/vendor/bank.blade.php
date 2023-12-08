{{-- <div class="modal fade" id="bank_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form action="/vendor/profile/bank/store" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="POST" />
                        <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" />
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nama Bank:</label>
                        <select name="bank_id" id="jenis" class="form-control m-bootstrap-select m_selectpicker">
                            @foreach ($bank as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nomor Rekening:</label>
                        <input type="text" name="nomor_rek" class="form-control" id="nomor_rek" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nama Pemilik:</label>
                        <input type="text" name="nama_pemilik" class="form-control" id="nama_pemilik" required>
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
{{-- @if ($vb != null) --}}
    
@foreach ($vendors->vendorbank as $vb)    
<div class="modal fade" id="bank_modal_2{{ $vb->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                <td>{{ $vb->vendor->namaperusahaan . ", " . $vb->vendor->badanusaha->kode }}</td>
                            </tr>
                            <tr>
                                <td scope="row">Bank</td>
                                <td>{{ $vb->bank->name }}</td>
                            </tr>
                            <tr>
                                <td scope="row">No Rekening</td>
                                <td>{{ $vb->nomor_rek }}</td>
                            </tr>
                            <tr>
                                <td scope="row">Nama Pemilik</td>
                                <td>{{ $vb->nama_pemilik }}</td>
                            </tr>
                            <tr>
                                <td scope="row">File Upload</td>
                                <td><a href="{{ url('data_file/bank/'.$vb->image) }}"
                                    target="_blank">{{ $vb->image}}</a></td>
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
  {{-- <div class="modal fade" id="bank_modal_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                  <form action="/vendor/profile/bank/update" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                          <input type="hidden" name="_method" value="PUT" />
                          <input type="hidden" name="id" value="{{$vb->id}}" />
                          <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" />
                      </div>

                      <div class="form-group">
                          <label for="recipient-name" class="form-control-label">Nama Bank:</label>
                          <select name="bank_id" id="jenis"
                              class="form-control m-bootstrap-select m_selectpicker">
                              <option value="{{ $vb->bank_id }}">{{ $vb->bank->name }}</option>
                              @foreach ($bank as $item)
                              @if ($vb->bank_id != $item->id)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                              @endif
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="recipient-name" class="form-control-label">No Rekening:</label>
                          <input type="text" name="nomor_rek" class="form-control" id="nomor_rek"
                              value="{{ $vb->nomor_rek }}" required>
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nama Pemilik:</label>
                        <input type="text" name="nama_pemilik" class="form-control" id="nama_pemilik"
                            value="{{ $vb->nama_pemilik }}" required>
                    </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
              </div>
              </form>
          </div>
      </div>
  </div> --}}
