{{-- <div class="modal fade" id="pengal_modal_1" tabindex="-1" role="dialog" aria-labelledby="pengalaman-tambah"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pengalaman-tambah">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/vendor/profile/pengalaman/store" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="POST" />
                        <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" />
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nama Pekerjaan:</label>
                        <input type="text" name="nama_pek" class="form-control" id="nama_pek" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Klasifikasi:</label>
                        <input type="text" name="klasifikasi" class="form-control" id="klasifikasi">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">No Kontrak:</label>
                        <input type="text" name="no_kontrak" class="form-control" id="no_kontrak" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Tgl Kontrak:</label>
                        <div class="input-group date">
                            <input type="text" class="form-control m-input" name="tgl_kontrak" readonly
                                placeholder="Select Date" id="tgl_kontrak" required />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-calendar-check-o"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Owner:</label>
                        <input type="text" name="owner" class="form-control" id="owner" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Alamat:</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Telp:</label>
                        <input type="text" name="telp" class="form-control" id="telp" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">lokasi:</label>
                        <input type="text" name="lokasi" class="form-control" id="lokasi" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">currency:</label>
                        <select name="currency_id" id="currency" class="form-control m-bootstrap-select m_selectpicker">
                            @foreach ($currency as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">nilai:</label>
                        <input type="text" name="nilai" class="form-control" id="nilai" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Tgl Selesai:</label>
                        <div class="input-group date">
                            <input type="text" class="form-control m-input" name="tgl_selesai" readonly
                                placeholder="Select Date" id="tgl_selesai" required />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-calendar-check-o"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Tgl BAST:</label>
                        <div class="input-group date">
                            <input type="text" class="form-control m-input" name="tgl_bast" readonly
                                placeholder="Select Date" id="tgl_bast" required />
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

{{-- @if ($vendors->vendorpengalaman) --}}
    
@foreach ($vendors->vendorpengalaman as $vpen)
<div class="modal fade" id="pengal_modal_2{{ $vpen->id }}" tabindex="-1" role="dialog" aria-labelledby="pengalaman-show"
aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="pengalaman-show">Show</h5>
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
                            <td>{{ $vpen->vendor->namaperusahaan . ", " . $vpen->vendor->badanusaha->kode }}
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Nama Pekerjaan</td>
                            <td>{{ $vpen->nama_pek }}</td>
                        </tr>
                        <tr>
                            <td scope="row">klasifikasi</td>
                            <td>{{ $vpen->vendorklasifikasi->kode . " - " . $vpen->vendorklasifikasi->name  }}</td>
                        </tr>
                        <tr>
                            <td scope="row">no_kontrak</td>
                            <td>{{ $vpen->no_kontrak }}</td>
                        </tr>
                        <tr>
                            <td scope="row">tgl_kontrak</td>
                            <td>{{ $vpen->tgl_kontrak }}</td>
                        </tr>
                        <tr>
                            <td scope="row">owner</td>
                            <td>{{ $vpen->owner }}</td>
                        </tr>
                        <tr>
                            <td scope="row">lokasi</td>
                            <td>{{ $vpen->lokasi }}</td>
                        </tr>
                        <tr>
                            <td scope="row">nilai</td>
                            <td>{{ $vpen->nilai }}</td>
                        </tr>
                        <tr>
                            <td scope="row">tgl_selesai</td>
                            <td>{{ $vpen->tgl_selesai }}</td>
                        </tr>
                        <tr>
                            <td scope="row">tgl_bast</td>
                            <td>{{ $vpen->tgl_bast }}</td>
                        </tr>
                        <tr>
                            <td scope="row">File</td>
                            <td>
                                @foreach ($vpen->vendorpengalamanfile as $item)
                                    <div class="alert alert-default alert-dismissible fade show m-alert m-alert--square m-alert--air" role="alert">
                                        {{-- <a href="/vendor/profile/pengalaman/destroyfile/{{$item->id}}" class="close"></a> --}}
                                        <span> <a href="{{ url('data_file/profile/doc/'.$item->file) }}">{{ $item->file }}</a></span>
                                    </div>   
                                @endforeach

                                {{-- <a href="{{ url('data_file/profile/doc/'.$vpen->file) }}"
                                    target="_blank">{{ $vpen->file }}</a> --}}
                            </td>
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



{{-- <div class="modal fade" id="pengal_modal_3" tabindex="-1" role="dialog" aria-labelledby="pengalaman-edit"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pengalaman-edit">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/vendor/profile/pengalaman/update" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="PUT" />
                        <input type="hidden" name="id" value="{{$vpen->id}}" />
                        <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" />
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nama Pekerjaan:</label>
                        <input type="text" name="nama_pek" class="form-control" id="nama_pek"
                            value="{{ $vpen->nama_pek }}" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Klasifikasi:</label>
                        <input type="text" name="klasifikasi" class="form-control" id="klasifikasi"
                            value="{{ $vpen->klasifikasi }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">No Kontrak:</label>
                        <input type="text" name="no_kontrak" class="form-control" id="no_kontrak"
                            value="{{ $vpen->no_kontrak }}" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Tgl Kontrak:</label>
                        <input type="text" name="tgl_kontrak" class="form-control" id="tgl_kontrak"
                            value="{{ $vpen->tgl_kontrak }}" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Owner:</label>
                        <input type="text" name="owner" class="form-control" id="owner" value="{{ $vpen->owner }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Alamat:</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $vpen->alamat }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Telp:</label>
                        <input type="text" name="telp" class="form-control" id="telp" value="{{ $vpen->telp }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">lokasi:</label>
                        <input type="text" name="lokasi" class="form-control" id="lokasi" value="{{ $vpen->lokasi }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">currency:</label>
                        <select name="currency_id" id="currency" class="form-control m-bootstrap-select m_selectpicker">
                            <option value="{{ $vpen->currency_id }}">{{ $vpen->currency->name }}</option>
                            @foreach ($currency as $item)
                            @if ($vpen->currency_id != $item->id)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">nilai:</label>
                        <input type="text" name="nilai" class="form-control" id="nilai" value="{{ $vpen->nilai }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Tgl Selesai:</label>
                        <div class="input-group date">
                            <input type="text" class="form-control m-input" name="tgl_selesai" readonly
                                placeholder="Select Date" id="tgl_selesai" value="{{ $vpen->tgl_selesai }}" required />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-calendar-check-o"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Tgl BAST:</label>
                        <div class="input-group date">
                            <input type="text" class="form-control m-input" name="tgl_bast" readonly
                                placeholder="Select Date" id="tgl_bast" value="{{ $vpen->tgl_bast }}" required />
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
