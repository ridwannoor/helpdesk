{{-- <div class="modal fade" id="tenaga_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form action="/vendor/profile/tenaga/store" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="POST" />
                       
                        <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" />
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nama:</label>
                        <input type="text" name="nama" class="form-control" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Status:</label>
                        <input type="text" name="status" class="form-control" id="status">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Pendidikan:</label>
                        <input type="text" name="pendidikan" class="form-control" id="pendidikan" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Keahlian:</label>
                        <input type="text" name="keahlian" class="form-control" id="keahlian" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Pengalaman:</label>
                        <input type="text" name="pengalaman" class="form-control" id="pengalaman" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">File Upload:</label>
                        <input type="file" name="file" class="form-control" id="file" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
{{-- @foreach ($vendors as $item) --}}
@foreach ($vendors->vendortenaga as $vt)
<div class="modal fade" id="tenaga_modal_2{{ $vt->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            <td>{{ $vt->vendor->namaperusahaan . ", " . $vt->vendor->badanusaha->kode }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Nama</td>
                            <td>{{ $vt->nama }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Status</td>
                            <td>{{ $vt->status }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Pendidikan</td>
                            <td>{{ $vt->pendidikan }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Keahlian</td>
                            <td>{{ $vt->keahlian }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Pengalaman</td>
                            <td>{{ $vt->pengalaman . " Tahun" }}</td>
                        </tr>
                        <tr>
                            <td scope="row">File</td>
                            <td><a href="{{ url('data_file/profile/doc/'.$vt->file) }}"
                                    target="_blank">{{ $vt->file   }}</a></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
</div>
@endforeach


{{-- <div class="modal fade" id="tenaga_modal_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form action="/vendor/profile/tenaga/update" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="PUT" />
                        <input type="hidden" name="id" value="{{$vt->id}}" />
                        <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" />
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nama:</label>
                        <input type="text" name="nama" class="form-control" id="nama" required value="{{ $vt->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Status:</label>
                        <input type="text" name="status" class="form-control" id="status" value="{{ $vt->status }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Pendidikan:</label>
                        <input type="text" name="pendidikan" class="form-control" id="pendidikan"
                            value="{{ $vt->pendidikan }}" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Keahlian:</label>
                        <input type="text" name="keahlian" class="form-control" id="keahlian"
                            value="{{ $vt->keahlian }}" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Pengalaman:</label>
                        <input type="text" name="pengalaman" class="form-control" id="pengalaman"
                            value="{{ $vt->pengalaman }}" required>
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
