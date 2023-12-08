<!-- Modal -->
@foreach ($vendors as $item)

<div class="modal fade" id="atur_1{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Atur Jadwal Verifikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/verifikasivendor/verif" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="PUT" />
                        <input type="hidden" name="id" value="{{$item->id}}" />
                        <input type="hidden" name="email" value="{{$item->email}}" />
                    </div>
                    <div class="alert alert-success" role="alert">
                        <strong>{{ $item->namaperusahaan . ", " . $item->badanusaha->kode }}</strong> 
                  </div>
                    {{-- <span class="form-control-label"></span> --}}
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Tanggal:</label>
                        <input type="date" name="tgl_verifikasi" class="form-control m-input" required
                            value="{{ $item->tgl_verifikasi }}">                        
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Keterangan:</label>
                        <textarea name="keterangan" class="form-control m-input" id="keterangan" cols="30" rows="5"
                            required>{{ $item->keterangan }}</textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach
    <!-- Modal -->
