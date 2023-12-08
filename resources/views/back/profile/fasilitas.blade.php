<div class="modal fade" id="fasil_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Alat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/vendor/profile/fasilitas/store" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="POST" />
                        <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" />
                    </div>

                    {{-- <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Tipe:</label>
                        <select name="vendortipe_id" id="tipe" class="form-control m-bootstrap-select m_selectpicker">
                            @foreach ($vendortipe as $item)
                            <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Status Kepemilikan:</label>
                        <select name="kepemilikan" id="kepemilikan" class="form-control m-bootstrap-select m_selectpicker" required>
                            <option value="Milik Sendiri">Milik Sendiri</option>
                            <option value="Sewa">Sewa</option>
                        </select>
                        {{-- <input type="text" name="kepemilikan" class="form-control" id="kepemilikan" required> --}}
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Nama Alat:</label>
                        <input type="text" name="nama" class="form-control" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Spesifikasi:</label>
                        <input type="text" name="spesifikasi" class="form-control" id="spesifikasi" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Jumlah :</label>
                        <input type="text" name="jumlah" class="form-control" id="jumlah" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Tahun Pembuatan :</label>
                        <input class="form-control m-input" type="date" name="thn_pembuatan" id="example-date-input" required>
                        {{-- <div class="input-group date">
                            <input type="text" class="form-control m-input" name="thn_pembuatan" readonly
                                placeholder="Select Date" id="thn_pembuatan" 
                                required />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-calendar-check-o"></i>
                                </span>
                            </div>
                        </div> --}}
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Lokasi :</label>
                        <textarea name="lokasi"  class="form-control" id="lokasi" cols="30" rows="5" required></textarea>
                        {{-- <input type="text" name="thn_perolehan" class="form-control" id="thn_perolehan" required> --}}
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">File Upload:</label>
                        <input type="file" name="file" class="form-control" id="file" >
                        <span class="m-form__help m--font-primary">Upload File bukti kepemilikan (sewa) Kwitansi/Kontrak Sewa/dll digabungkan menjadi satu file (1 file) | Format : .pdf | max: 10Mbps</span>
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

@foreach (Auth::user('vendor')->vendorfasilitas as $vfol)
<div class="modal fade" id="fasil_modal_5{{ $vfol->id }}" tabindex="-1" role="dialog" aria-labelledby="fasilitas-show"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fasilitas-show">Show</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <table class="table">
                        <tbody>
                            <td scope="row">Vendor</td>
                            <td>{{ $vfol->vendor->namaperusahaan . ", " . $vfol->vendor->badanusaha->kode }}</td>
                            </tr>
                            {{-- <tr>
                                <td scope="row">Dokument</td>
                                <td>{{ $vfol->vendortipe->keterangan }}</td>
                            </tr> --}}
                            <tr>
                                <td scope="row">Status Kepemilikan</td>
                                <td>{{ $vfol->kepemilikan }}</td>
                            </tr>
                            <tr>
                                <td scope="row">Nama Alat</td>
                                <td>{{ $vfol->nama }}</td>
                            </tr>
                            <tr>
                                <td scope="row">Spesifikasi</td>
                                <td>{{ $vfol->spesifikasi }}</td>
                            </tr>
                            <tr>
                                <td scope="row">Jumlah</td>
                                <td>{{ $vfol->jumlah }}</td>
                            </tr>
                            <tr>
                                <td scope="row">Tahun Pembuatan</td>
                                <td>{{ $vfol->thn_pembuatan }}</td>
                            </tr>
                            <tr>
                                <td scope="row">Lokasi</td>
                                <td>{{ $vfol->lokasi }}</td>
                            </tr>
                            <tr>
                                <td scope="row">File</td>
                                <td><a href="{{ url('data_file/profile/doc/'.$vfol->file) }}"
                                        target="_blank">{{ $vfol->file   }}</a></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach (Auth::user('vendor')->vendorfasilitas as $vfol)
<div class="modal fade" id="fasil_modal_3{{ $vfol->id }}" tabindex="-1" role="dialog" aria-labelledby="fasilitas-edit"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fasilitas-edit">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/vendor/profile/fasilitas/update" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="PUT" />
                        <input type="hidden" name="id" value="{{$vfol->id}}" />
                        <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" />
                    </div>

                    {{-- <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Tipe:</label>
                        <select name="vendortipe_id" id="tipe" class="form-control m-bootstrap-select m_selectpicker">
                            <option value="{{ $vfol->vendortipe_id }}">{{ $vfol->vendortipe->keterangan }}</option>
                            @foreach ($vendortipe as $item)
                            @if ($vfol->vendortipe_id != $item->id)
                            <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Status Kepemilikan :</label>
                        <select name="kepemilikan" id="kepemilikan" class="form-control m-bootstrap-select m_selectpicker"  required>
                            <option value="Milik Sendiri">Milik Sendiri</option>
                            <option value="Sewa">Sewa</option>
                        </select>
                        {{-- <input type="text" name="kepemilikan" class="form-control" id="kepemilikan"
                            value="{{ $vfol->kepemilikan }}" required> --}}
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Nama Alat :</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $vfol->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Spesifikasi :</label>
                        <input type="text" name="spesifikasi" class="form-control" id="spesifikasi"
                            value="{{ $vfol->spesifikasi }}" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Jumlah :</label>
                        <input type="text" name="jumlah" class="form-control" id="jumlah" value="{{ $vfol->jumlah }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Tahun Pembuatan :</label>
                        <input class="form-control m-input" type="date" name="thn_pembuatan" value="{{ $vfol->thn_pembuatan  }}" id="example-date-input" required>
                        {{-- <div class="input-group date">
                            <input type="text" class="form-control m-input" name="thn_pembuatan" readonly
                                placeholder="Select Date" id="thn_pembuatan1" value="{{ $vfol->thn_pembuatan  }}"
                                required />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-calendar-check-o"></i>
                                </span>
                            </div>
                        </div> --}}
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">*Lokasi :</label>
                        <textarea name="lokasi" class="form-control" id="lokasi" cols="30" rows="5" required>{{ $vfol->lokasi  }}</textarea>
                        {{-- <input type="text" name="thn_perolehan" class="form-control" id="thn_perolehan" required> --}}
                    </div>
                    {{-- <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Tahun Perolehan:</label>
                        <div class="input-group date">
                            <input type="text" class="form-control m-input" name="thn_perolehan" readonly
                                placeholder="Select Date" id="thn_perolehan" value="{{ $vfol->thn_perolehan }}"
                                required />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-calendar-check-o"></i>
                                </span>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">File Upload:</label>
                        <input type="file" name="file" class="form-control" id="file" >
                        <span class="m-form__help m--font-primary">Upload File bukti kepemilikan (sewa) Kwitansi/Kontrak Sewa/dll digabungkan menjadi satu file (1 file) | Format : .pdf | ex : Foto Peralatan | max: 10Mbps</span><br>
                        <div class="alert alert-default alert-dismissible fade show m-alert m-alert--square m-alert--air" role="alert">
                            <span><a href="{{ url('data_file/profile/doc/'.$vfol->file) }}">{{ $vfol->file }}</a></span>
                          </div> 
                        {{-- <span class="m-form__help m--font-focus">{{ $vfol->file }}</span>  --}}
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
