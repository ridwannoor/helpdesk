{{-- <div class="modal fade" id="pengurus_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form action="/vendor/profile/pengurus/store" method="POST" enctype="multipart/form-data">
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
                        <label for="recipient-name" class="form-control-label">Posisi:</label>
                        <input type="text" name="posisi" class="form-control" id="posisi" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Jabatan:</label>
                        <input type="text" name="jabatan" class="form-control" id="jabatan">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">No Telp:</label>
                        <input type="text" name="telp" class="form-control" id="telp" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">NIK:</label>
                        <input type="text" name="nik" class="form-control" id="nik" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">NPWP:</label>
                        <input type="text" name="npwp" class="form-control" id="npwp" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Kewarganegaraan:</label>
                        <input type="text" name="kewarganegaraan" class="form-control" id="kewarganegaraan" required>
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

@foreach ($vendors->vendorpengurus as $vp)
    <div class="modal fade" id="pengurus_modal_2{{ $vp->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                <td>{{ $vp->vendor->namaperusahaan . ", " . $vp->vendor->badanusaha->kode }}</td>
                            </tr>
                            <tr>
                                <td scope="row">Nama</td>
                                <td>{{ $vp->nama }}</td>
                            </tr>
                            <tr>
                                <td scope="row">Jabatan</td>
                                <td>{{ $vp->jabatan }}</td>
                            </tr>
                            <tr>
                                <td scope="row">No Telp</td>
                                <td>{{ $vp->telp }}</td>
                            </tr>
                            <tr>
                                <td scope="row">NIK/Kitas/Passport</td>
                                <td>{{ $vp->nik }}</td>
                            </tr>
                            <tr>
                                <td scope="row">NPWP</td>
                                <td>{{ $vp->npwp }}</td>
                            </tr>
                            <tr>
                                <td scope="row">Kewarganegaraan</td>
                                <td>{{ $vp->kewarganegaraan }}</td>
                            </tr>
                            <tr>
                                <td scope="row">File</td>
                                <td><a href="{{ url('data_file/profile/doc/'.$vp->file) }}"
                                        target="_blank">{{ $vp->file   }}</a></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach


{{-- <div class="modal fade" id="pengurus_modal_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form action="/vendor/profile/pengurus/update" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="PUT" />
                        <input type="hidden" name="id" value="{{$vp->id}}" />
                        <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" />
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nama:</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $vp->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Posisi:</label>
                        <input type="text" name="posisi" class="form-control" id="posisi" value="{{ $vp->posisi }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Jabatan:</label>
                        <input type="text" name="jabatan" class="form-control" id="jabatan" value="{{ $vp->jabatan }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">No Telp:</label>
                        <input type="text" name="telp" class="form-control" id="telp" required value="{{ $vp->telp }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">NIK:</label>
                        <input type="text" name="nik" class="form-control" id="nik" required value="{{ $vp->nik }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">NPWP:</label>
                        <input type="text" name="npwp" class="form-control" id="npwp" required value="{{ $vp->npwp }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Kewarganegaraan:</label>
                        <input type="text" name="kewarganegaraan" class="form-control" id="kewarganegaraan" required
                            value="{{ $vp->kewarganegaraan }}">
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
