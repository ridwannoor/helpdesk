{{-- <div class="modal fade" id="doc_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form action="/vendor/profile/doc/store" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="POST" />
                        <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" />
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Jenis:</label>
                        <select name="vendorjenisdoc_id" id="jenis" class="form-control m-bootstrap-select m_selectpicker">
                            @foreach ($vendorjenisdoc as $item)
                            <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Keterangan:</label>
                        <input type="text" name="keterangan" class="form-control" id="keterangan" required>
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

@foreach ($vendors->vendordoc as $vd)
    <div class="modal fade" id="doc_modal_2{{ $vd->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                <td>{{ $vd->vendor->namaperusahaan . ", " . $vd->vendor->badanusaha->kode }}</td>
                            </tr>
                            <tr>
                                <td scope="row">Dokument</td>
                                <td>{{ $vd->vendorjenisdoc->keterangan }}</td>
                            </tr>
                            <tr>
                                <td scope="row">Keterangan</td>
                                <td>{{ $vd->keterangan }}</td>
                            </tr>
                            <tr>
                                <td scope="row">File</td>
                                <td><a href="{{ url('data_file/profile/doc/'.$vd->file) }}"
                                        target="_blank">{{ $vd->file   }}</a></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

  {{-- <div class="modal fade" id="doc_modal_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                  <form action="/vendor/profile/doc/update" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                          <input type="hidden" name="_method" value="PUT" />
                          <input type="hidden" name="id" value="{{$vd->id}}" />
                          <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" />
                      </div>

                      <div class="form-group">
                          <label for="recipient-name" class="form-control-label">Jenis:</label>
                          <select name="vendorjenisdoc_id" id="jenis"
                              class="form-control m-bootstrap-select m_selectpicker">
                              <option value="{{ $vd->vendorjenisdoc_id }}">{{ $vd->vendorjenisdoc->keterangan }}</option>
                              @foreach ($vendorjenis as $item)
                              @if ($vd->vendorjenisdoc_id != $item->id)
                              <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                              @endif
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="recipient-name" class="form-control-label">Keterangan:</label>
                          <input type="text" name="keterangan" class="form-control" id="keterangan"
                              value="{{ $vd->keterangan }}" required>
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
