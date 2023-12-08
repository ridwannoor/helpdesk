@extends('layouts.app2')

@section('header-script')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('m-subheader')
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">{{ $judul }}</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="#" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="#" class="m-nav__link">
                        <span class="m-nav__link-text">{{ $judul }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

@section('m-content')
<div class="m-content">
    <div class="row">
        <div class="col-lg-12">
            @include('component.alertnotification')
            {{-- @if ($message = Session::get('alert'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                </button>
                <strong>Alert!</strong> {{ $message }}.
        </div>
        @endif --}}
            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                {{ $judul }}
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--label-align-right" method="POST" action="/banego/update"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="PUT" />
                        <input type="hidden" name="id" value="{{$lok->id}}" />
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-3">
                                    <label>No Berita Acara</label>
                                    <input type="text" name="no_ba" class="form-control m-input" value="{{ $lok->no_ba }}">
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                                <div class="col-lg-3">
                                    <label>Nilai RAP</label>
                                    <input type="text" name="nilai_rap" class="form-control m-input"
                                        value="{{ $lok->nilai_rap }}" required>
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                                <div class="col-lg-6">
                                    <label>Nama Pekerjaan</label>
                                    <textarea name="nama_pek" id="nama_pek" class="form-control m-input" cols="30"
                                        rows="5">{{ $lok->nama_pek }}</textarea>
                                    {{-- <input type="text" name="nama_pek" class="form-control m-input" placeholder="Kode banego"> --}}
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-3">
                                    <label>Tanggal</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control m-input" name="tanggal" readonly
                                            placeholder="Select Date" id="tanggal" value="{{ $lok->tanggal }}" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>Lokasi Nego</label>
                                    <input type="text" name="lokasi_nego" class="form-control m-input"
                                        value="{{ $lok->lokasi_nego }}">
                                    {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                </div>
                                @php
                                if(isset($lok)) {
                                $lokasi = $lok->divisis->pluck('id')->all();
                                } else {
                                $lokasi = null;
                                }
                                @endphp
                                <div class="col-lg-3">
                                    <label>Divisi Terkait</label>
                                    <div class="input-group m-input-group m-input-group--square">
                                        {!! Form::select('divisis[]', $divisis, $lokasi, ['class' => 'form-control
                                        m-bootstrap-select m_selectpicker', 'required', 'multiple']) !!}

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>Mitra Pengadaan</label>
                                    <div class="input-group m-input-group m-input-group--square">
                                        <select name="vendor_id" data-live-search="true"
                                            class="form-control m-bootstrap-select m_selectpicker" id="vendor_id">
                                            <option value="{{ $lok->vendor_id }}">{{ $lok->vendor->namaperusahaan }}
                                            </option>
                                            @foreach ($vendors as $d)
                                            @if ($lok->vendor_id != $d->id){
                                            <option value="{{$d->id}}">{{ $d->namaperusahaan }}</option>
                                            }
                                            @endif
                                            @endforeach
                                            {{-- @foreach ($vendors as $item)
                                                <option value="{{ $item->id }}">{{ $item->namaperusahaan }},
                                            {{ $item->badanusaha->kode }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-3">
                                    <label>No SPPH</label>
                                    <input type="text" name="spph" class="form-control m-input" placeholder="No SPPH"
                                        value="{{ $lok->spph }}">
                                </div>
                                <div class="col-lg-3">
                                    <label>Jumlah Penawaran</label>
                                    <input type="text" name="jml_penawaran" class="form-control m-input"
                                        placeholder="Jumlah Penawaran" value="{{ $lok->jml_penawaran }}">
                                </div>
                                {{-- <div class="col-lg-3">
                                    <label>No SPPH Nego</label>
                                    <input type="text" name="spph_nego" class="form-control m-input"
                                        placeholder="No SPPH Nego" value="{{ $lok->spph_nego }}">
                                </div> --}}
                                <div class="col-lg-3">
                                    <label>Jumlah Nego</label>
                                    <input type="text" name="jml_nego" class="form-control m-input"
                                        placeholder="Jumlah Nego" value="{{ $lok->jml_nego }}">
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <div class="col-lg-3">
                                    <label>Waktu Pelaksanaan (tanggal)</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control m-input" id="startdate" name="start_date"
                                            readonly placeholder="Start Date" value="{{ $lok->start_date }}" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>&nbsp;</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control m-input" id="enddate" name="end_date"
                                            readonly placeholder="End Date" value="{{ $lok->end_date }}" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>Waktu Pelaksanaan (hari)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control m-input" name="waktu_pel"
                                            placeholder="Waktu Pelaksanaan" aria-describedby="basic-addon2"
                                            value="{{ $lok->waktu_pel }}">
                                        <div class="input-group-append"><span class="input-group-text"
                                                id="basic-addon2">hari</span></div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>Garansi</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control m-input" name="garansi"
                                            onkeypress="return hanyaAngka(event)" aria-describedby="basic-addon2"
                                            value="{{ $lok->garansi }}">
                                        <div class="input-group-append"><span class="input-group-text"
                                                id="basic-addon2">hari</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-3">
                                    <label>Asuransi</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control m-input" name="asuransi"
                                            onkeypress="return hanyaAngka(event)" aria-describedby="basic-addon2"
                                            value="{{ $lok->asuransi }}">
                                        <div class="input-group-append"><span class="input-group-text"
                                                id="basic-addon2">hari</span></div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>Masa Pemeliharaan</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control m-input" name="masapemeliharaan"
                                            onkeypress="return hanyaAngka(event)" value="{{ $lok->masapemeliharaan }}"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append"><span class="input-group-text"
                                                id="basic-addon2">hari</span></div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>Down Payment</label>
                                    <div class="m-radio-inline" id="downpayment">
                                        @if ($lok->downpayment == "include")
                                        <label class="m-radio">
                                            <input type="radio" name="downpayment" value="include" checked>Include DP
                                            <span></span>
                                        </label>
                                        <p class="m-form__help"><input type="text" class="form-control m-input" id="nilaidp"
                                                name="nilaidp" onkeypress="return hanyaAngka(event)"
                                                value="{{ $lok->nilaidp }}"></p>

                                        @else
                                        <label class="m-radio">
                                            <input type="radio" name="downpayment" value="include">Include DP
                                            <span></span>
                                        </label>
                                        @endif
                                        @if ($lok->downpayment == "exclude")
                                        <label class="m-radio">
                                            <input type="radio" name="downpayment" value="exclude" checked>Exclude DP
                                            <span></span>
                                        </label>
                                        @else
                                        <label class="m-radio">
                                            <input type="radio" name="downpayment" value="exclude">Exclude DP
                                            <span></span>
                                        </label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>Pajak</label>
                                    <div class="m-radio-inline">
                                        @if ($lok->pajak == "include")
                                        <label class="m-radio">
                                            <input type="radio" name="pajak" value="include" checked>Include Pajak
                                            <span></span>
                                        </label>
                                        @else
                                        <label class="m-radio">
                                            <input type="radio" name="pajak" value="include">Include Pajak
                                            <span></span>
                                        </label>
                                        @endif
                                        @if ($lok->pajak == "exclude")
                                        <label class="m-radio">
                                            <input type="radio" name="pajak" value="exclude" checked>Exclude Pajak
                                            <span></span>
                                        </label>
                                        @else
                                        <label class="m-radio">
                                            <input type="radio" name="pajak" value="exclude">Exclude Pajak
                                            <span></span>
                                        </label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label>Tempat Serah Terima </label>
                                    <div class="m-input-icon m-input-icon--left">
                                        <input type="text" class="form-control m-input" name="tempat" placeholder="Lokasi"
                                            value="{{ $lok->tempat }}">
                                        <span class="m-input-icon__icon m-input-icon__icon--left"><span><i
                                                    class="la la-map-marker"></i></span></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>Pengiriman Oleh</label>
                                    <div class="m-input-icon m-input-icon--left">
                                        <input type="text" class="form-control m-input" name="pengirim"
                                            placeholder="Pengirim" value="{{ $lok->pengirim }}">
                                        <span class="m-input-icon__icon m-input-icon__icon--left"><span><i
                                                    class="la la-cab"></i></span></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>Training</label>
                                    <input type="text" name="training" class="form-control m-input" placeholder="Training"
                                        value="{{ $lok->training }}">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <label>Cara Pembayaran</label>
                                    <textarea name="cara_pembayaran" id="summernote" class="form-control m-input" cols="30"
                                        rows="5">{!! $lok->cara_pembayaran !!}</textarea>
                                </div>
                                <div class="col-lg-6">
                                    <label>Catatan</label>
                                    <textarea name="catatan" id="summernote1" class="form-control m-input" cols="30"
                                        rows="5">{!! $lok->catatan !!}</textarea>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label>Jaminan</label>
                                    <select name="jaminan_id" class="form-control m-bootstrap-select m_selectpicker">
                                        <option value="{{ $lok->jaminan_id }}">{{ $lok->jaminan->name }}</option>
                                        @foreach ($jams as $item)
                                            @if ($item->id != $lok->jaminan_id)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif                                          
                                        @endforeach                                      
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label>Biaya Dokument</label>
                                    <select name="bidok_id" class="form-control m-bootstrap-select m_selectpicker">
                                        <option value="{{ $lok->bidok_id }}">{{ $lok->bidok->name }}</option>
                                        @foreach ($bidoks as $item)
                                            @if ($item->id != $lok->bidok_id)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif                                          
                                        @endforeach   
                                    </select>
                                    {{-- <input type="text" name="biaya_dok" class="form-control m-input"
                                        onkeypress="return hanyaAngka(event)" value="{{ $lok->biaya_dok }}"> --}}
                                </div>

                                @php
                                if(isset($lok)) {
                                $lokasi = $lok->dokpekerjaans->pluck('id')->all();
                                } else {
                                $lokasi = null;
                                }
                                @endphp
                                <div class="col-lg-4">
                                    <label>Dokument</label>
                                    <div class="input-group m-input-group m-input-group--square">
                                        {!! Form::select('dokpekerjaans[]', $doks, $lokasi, ['class' => 'form-control
                                        m-bootstrap-select m_selectpicker', 'required', 'multiple']) !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions">
                                    <div class="row">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-6">
                                            <div class="btn-group">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <a href="/banego" class="btn btn-default">Back</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Portlet-->
        </div>
    </div>
</div>

@endsection


@section('footer-script')
<script src="assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $('#summernote').summernote({
        height: "100px"
    });
    $('#summernote1').summernote({
        height: "100px"
    });

</script>
<script>
    function myFunction() {
        // Get the checkbox
        var checkBox = document.getElementById("myCheck");
        // Get the output text
        var text = document.getElementById("text");

        // If the checkbox is checked, display the output text
        if (checkBox.checked == true) {
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }

</script>

<script>
    $(document).ready(function () {
        $('#tanggal').datepicker({
                //merubah format tanggal datepicker ke dd-mm-yyyy
                format: "yyyy-mm-dd",
                //aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
                //format: "dd-mm-yyyy",
                autoclose: true
            }),

            $('#startdate').datepicker({
                //merubah format tanggal datepicker ke dd-mm-yyyy
                format: "yyyy-mm-dd",
                //aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
                //format: "dd-mm-yyyy",
                autoclose: true
            }),

            $('#enddate').datepicker({
                //merubah format tanggal datepicker ke dd-mm-yyyy
                format: "yyyy-mm-dd",
                //aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
                //format: "dd-mm-yyyy",
                autoclose: true
            })
    });

</script>


@endsection
