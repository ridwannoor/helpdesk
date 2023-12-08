<div class="modal fade" id="tenaga_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        {{-- <input type="hidden" name="id" value="{{$vendors->id}}" /> --}}
                        <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" />
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Nama Karyawan :</label>
                        <input type="text" name="nama" class="form-control" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Status Karyawan :</label>
                        <select name="status" id="status" class="form-control m-bootstrap-select m_selectpicker" required>
                            <option value="PKWT (Kontrak)">PKWT (Kontrak)</option>
                            <option value="PKWTT (Tetap)">PKWTT (Tetap)</option>
                        </select>
                        {{-- <input type="text" name="status" class="form-control" id="status" required> --}}
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Pendidikan :</label>
                        <input type="text" name="pendidikan" class="form-control" id="pendidikan" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Keahlian :</label>
                        <input type="text" name="keahlian" class="form-control" id="keahlian" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Pengalaman :</label>
                        <div class="input-group">
							<input type="text" name="pengalaman"  class="form-control m-input" placeholder="Masukkan Angka" aria-describedby="basic-addon2">
							<div class="input-group-append"><span class="input-group-text" id="basic-addon2">tahun</span></div>
						</div>
                        {{-- <input type="text" name="pengalaman" class="form-control" id="pengalaman" required> --}}
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*File Upload :</label>
                        <input type="file" name="file" class="form-control" id="file" >
                        <span class="m-form__help  m--font-primary">Upload File Sertifikat Keahlian digabungkan menjadi satu file (1 file) | Format : .pdf | max: 10Mbps</span>
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

@foreach (Auth::user('vendor')->vendortenaga as $vt)
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
                                <td>{{ $vt->pengalaman }}</td>
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

@foreach (Auth::user('vendor')->vendortenaga as $vt)
<div class="modal fade" id="tenaga_modal_3{{ $vt->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <label for="recipient-name" class="form-control-label">*Nama :</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $vt->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Status Karyawan :</label>
                        <select name="status" id="status" class="form-control m-bootstrap-select m_selectpicker" required>
                            <option value="PKWT (Kontrak)">PKWT (Kontrak)</option>
                            <option value="PKWTT (Tetap)">PKWTT (Tetap)</option>
                        </select>
                        {{-- <input type="text" name="status" class="form-control" id="status" value="{{ $vt->status }}" required> --}}
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Pendidikan :</label>
                        <input type="text" name="pendidikan" class="form-control" id="pendidikan"
                            value="{{ $vt->pendidikan }}" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Keahlian :</label>
                        <input type="text" name="keahlian" class="form-control" id="keahlian"
                            value="{{ $vt->keahlian }}" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Pengalaman :</label>
                        <div class="input-group">
							<input type="text" name="pengalaman"  class="form-control m-input" value="{{ $vt->pengalaman }}" aria-describedby="basic-addon2" required>
							<div class="input-group-append"><span class="input-group-text" id="basic-addon2">tahun</span></div>
						</div>
                        {{-- <input type="text" name="pengalaman" class="form-control" id="pengalaman"
                            value="{{ $vt->pengalaman }}" required> --}}
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*File Upload :</label>
                        <input type="file" name="file" class="form-control" id="file" >
                        <span class="m-form__help  m--font-primary">Upload File Sertifikat Keahlian digabungkan menjadi satu file (1 file) | Format : .pdf | max: 10Mbps</span>  <br>
                        <div class="alert alert-default alert-dismissible fade show m-alert m-alert--square m-alert--air" role="alert">
                            <span><a href="{{ url('data_file/profile/doc/'.$vt->file) }}">{{ $vt->file }}</a></span>
                          </div> 
                        {{-- <span class="m-form__help m--font-focus">{{ $vt->file }}</span>  --}}
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