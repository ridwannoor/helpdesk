@foreach ($vendors as $item)
    
<div class="modal fade" id="tolak_1{{ $item->id }}" tabindex="-1" role="dialog"
aria-labelledby="modelTitleId" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tolak Verifikasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/verifikasivendor/tolakverif" method="POST">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="_method" value="PUT" />
                    <input type="hidden" name="id" value="{{$item->id}}" />
                    <input type="hidden" name="email" value="{{$item->email}}" />
                    <input type="hidden" name="terms" value="" />
                    <input type="hidden" name="tgl_verifikasi" value="" />
                    <input type="hidden" name="tgl_request" value="" />
                </div>
                <div class="alert alert-success" role="alert">
                    <strong>{{ $item->namaperusahaan . ", " . $item->badanusaha->kode }}</strong> 
              </div>
                <div class="form-group">
                    <label for="recipient-name"
                        class="form-control-label">Keterangan:</label>
                    <textarea name="keterangan" class="form-control m-input"
                        id="keterangan" cols="30" rows="5"></textarea>

                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
        </form>
    </div>
</div>
</div>
@endforeach