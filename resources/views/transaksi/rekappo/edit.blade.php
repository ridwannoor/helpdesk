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
        {{-- </div> --}}

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
            <form class="m-form m-form--label-align-right" action="/rekappo/edit/update1" method="POST"
                enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="_method" value="PUT" />
                    <input type="hidden" name="id" value="{{$pos->id}}" />
                </div>
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
                                <label>No Purchase Order</label>
                                <input type="text" name="no_po" class="form-control m-input" value="{{ $pos->no_po }}"
                                    required>
                            </div>
                            <div class="col-lg-4">
                                <label>No Kontrak</label>
                                <input type="text" name="no_kontrak" class="form-control m-input"
                                    value="{{ $pos->no_kontrak }}">
                            </div>
                            <div class="col-lg-4">
                                <label>Nilai RAP</label>
                                <input type="text" name="nilai_rap" class="form-control m-input"
                                    value="{{ $pos->nilai_rap }}" required>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-3">
                                <label>Tanggal</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control m-input" name="tanggal" readonly
                                        placeholder="Select Date" id="tanggal" value="{{ $pos->tanggal }}" />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Vendor</label>
                                <select name="vendor_id" class="form-control m-bootstrap-select m_selectpicker"
                                    id="vendor_id" data-live-search="true">
                                    <option value="{{$pos->vendor_id}}">{{ $pos->vendor->namaperusahaan }}</option>
                                    @foreach ($vendors as $d)
                                    @if ($pos->vendor_id != $d->id){
                                    <option value="{{$d->id}}">{{ $d->namaperusahaan }}</option>
                                    }
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>Mata Uang</label>
                                <select name="currency_id" class="form-control m-bootstrap-select m_selectpicker"
                                    id="currency_id" data-live-search="true">
                                    <option value="{{$pos->currency_id}}">{{ $pos->currency->name }}</option>
                                    @foreach ($currencys as $d)
                                    @if ($pos->currency_id != $d->id){
                                    <option value="{{$d->id}}">{{ $d->name }}</option>
                                    }
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>Waktu Pelaksanaan</label>
                                <div class="btn-group">
                                    <div class="input-group date">
                                        <input type="text" class="form-control m-input" name="start_date" readonly
                                            placeholder="Select Date" id="start_date" value="{{ $pos->start_date }}" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div><span></span>
                                    <div class="input-group date">
                                        <input type="text" class="form-control m-input" name="end_date" readonly
                                            placeholder="Select Date" id="end_date" value="{{ $pos->end_date }}" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="pajak">Pajak</label>
                                <div class="m-radio-inline" id="rdpajak">
                                    <label class="m-radio">
                                    @if ($pos->pajak == "ppn")
                                        <label class="m-radio">
                                            <input type="radio" name="pajak" value="ppn" checked="checked"> Include PPN 10%
                                            <span></span>
                                        </label>
                                    @else 
                                        <label class="m-radio">
                                            <input type="radio" name="pajak" value="ppn"> Include PPN 10%
                                            <span></span>
                                        </label>
                                    @endif
                                @if ($pos->pajak == "ppn11")
                                    <label class="m-radio">
                                        <input type="radio" name="pajak" value="ppn11" checked="checked"> Include PPN 11%
                                        <span></span>
                                    </label>
                                @else 
                                    <label class="m-radio">
                                        <input type="radio" name="pajak" value="ppn11"> Include PPN 11%
                                        <span></span>
                                    </label>
                                @endif
                                    @if ($pos->pajak == "pph")
                                        <label class="m-radio">
                                            <input type="radio" name="pajak" value="pph" checked="checked"> Include PPN 1%
                                            <span></span>
                                        </label>
                                    @else
                                        <label class="m-radio">
                                            <input type="radio" name="pajak" value="pph"> Include PPN 1%
                                            <span></span>
                                        </label>
                                    @endif
                                    @if ($pos->pajak == "exclude")
                                    <label class="m-radio">
                                        <input type="radio" name="pajak" value="exclude" checked="checked"> Exclude PPN
                                        <span></span>
                                    </label>
                                    @else
                                        <label class="m-radio">
                                            <input type="radio" name="pajak" value="exclude"> Exclude PPN
                                            <span></span>
                                        </label>
                                    @endif
                                    @if ($pos->pajak == "other") 
                                        <label class="m-radio">
                                            <input type="radio" name="pajak" value="other" checked="checked"> Lainnya...
                                            <span></span>
                                        </label>
                                        <p class="m-form__help"><input type="text" class="form-control m-input" id="otherpajak" name="pajak1" value="{{ $pos->pajak1 }}"></p>
                                    @else 
                                    <label class="m-radio">
                                        <input type="radio" name="pajak" value="other"> Lainnya...
                                        <span></span>
                                    </label>
                                    <p class="m-form__help"><input type="text" class="form-control m-input" id="otherpajak" style="display:none" name="pajak1"></p>
                                    @endif
                                    </label>
                                </div>
                                {{-- <span class="m-form__help m--font-info">Notes : Pajak 10%</span> --}}
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>Nama Pengadaan</label>
                                <textarea name="nama_pekerjaan" class="form-control m-input" id="nama_pekerjaan"
                                    cols="30" rows="5">{{ $pos->nama_pekerjaan }}</textarea>
                            </div>
                            <div class="col-lg-6">
                                <label>Cara Bayar</label>
                                {{-- <textarea name="nama_pekerjaan" class="form-control m-input" id="cara_bayar" cols="30"
                                    rows="5">{{ $pos->cara_bayar }}</textarea> --}}
                                    <div class="m-form__group form-group">
                                        {{-- <label for="">Default Radios</label> --}}
                                        <div class="col-12">
                                            <div class="m-radio-inline" id="rdbayar">
                                                @if ($pos->cara_bayar == "cbd")
                                                    <label class="m-radio">
                                                        <input type="radio" name="cara_bayar" value="cbd" checked="checked"> Cash Before Delivery
                                                        <span></span>
                                                    </label>
                                                @else 
                                                    <label class="m-radio">
                                                        <input type="radio" name="cara_bayar" value="cbd"> Cash Before Delivery
                                                        <span></span>
                                                    </label>
                                                @endif
                                                @if ($pos->cara_bayar == "cad")
                                                    <label class="m-radio">
                                                        <input type="radio" name="cara_bayar" value="cad" checked="checked"> Cash After Delivery
                                                        <span></span>
                                                    </label>
                                                @else 
                                                    <label class="m-radio">
                                                        <input type="radio" name="cara_bayar" value="cad"> Cash After Delivery
                                                        <span></span>
                                                    </label>
                                                @endif
                                                @if ($pos->cara_bayar == "dp")
                                                    <label class="m-radio">
                                                        <input type="radio" name="cara_bayar" value="dp" checked="checked"> DP 20% & Sisa 80%
                                                        <span></span>
                                                    </label>
                                                @else
                                                    <label class="m-radio">
                                                        <input type="radio" name="cara_bayar" value="dp"> DP 20% & Sisa 80%
                                                        <span></span>
                                                    </label>
                                                @endif

                                                @if ($pos->cara_bayar == "other") 
                                                    <label class="m-radio">
                                                        <input type="radio" name="cara_bayar" value="other" checked="checked"> Lainnya...
                                                        <span></span>
                                                    </label>
                                                    <p class="m-form__help"><input type="text" class="form-control m-input" id="otherAnswer" name="cara_bayar1" value="{{ $pos->cara_bayar1 }}"></p>
                                                @else 
                                                <label class="m-radio">
                                                    <input type="radio" name="cara_bayar" value="other"> Lainnya...
                                                    <span></span>
                                                </label>
                                                <p class="m-form__help"><input type="text" class="form-control m-input" id="otherAnswer" style="display:none" name="cara_bayar1"></p>
                                                @endif
                                                
                                               
                                               
                                               
                                            </div>
                                            
                                            {{-- <span class="m-form__help"><input type="text" class="form-control m-input" id="otherAnswer" style="display:none" name="carabayar" ></span> --}}
                                            {{-- <span class="m-form__help" ><input type="text" class="form-control m-input" name="" id="yes"></span> --}}
                                        </div>
                                    </div>
                                {{-- <span class="m-form__help">Please enter your full name</span> --}}
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>Lokasi</label>
                                <select name="lokasi_id" class="form-control m-bootstrap-select m_selectpicker"
                                    id="lokasi_id" data-live-search="true">
                                    <option value="{{$pos->lokasi_id}}">{{ $pos->lokasi->kode }}</option>
                                    @foreach ($lokasis as $d)
                                    @if ($pos->lokasi_id != $d->id){
                                    <option value="{{$d->id}}">{{ $d->kode }}</option>
                                    }
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label>Perusahaan</label>
                                <select name="preference_id" class="form-control m-bootstrap-select m_selectpicker"
                                    id="preference_id">
                                    <option value="{{$pos->preference_id}}">{{ $pos->preference->nama_perusahaan }}
                                    </option>
                                    @foreach ($preferences as $e)
                                        @if ($pos->preference_id != $e->id){
                                        <option value="{{$e->id}}">{{ $e->nama_perusahaan }}</option>
                                        }
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label>Catatan</label>
                                {{-- <textarea name="deskripsi" class="form-control m-input" cols="30"
                                    rows="5"></textarea> --}}
                                {{-- <label for="">Harga</label> --}}
                                <div class="m-radio-inline" id="rdpabrik">
                                    @if ($pos->hargapabrik == "franco")
                                        <label class="m-radio">
                                            <input type="radio" name="hargapabrik" value="franco" checked="checked">Harga Franco
                                            <span></span>
                                        </label>
                                    @else 
                                        <label class="m-radio">
                                            <input type="radio" name="hargapabrik" value="franco">Harga Franco
                                            <span></span>
                                        </label>
                                    @endif
                                    @if ($pos->hargapabrik == "loco")
                                        <label class="m-radio">
                                            <input type="radio" name="hargapabrik" value="loco" checked="checked">Harga Loco
                                            <span></span>
                                        </label>
                                    @else
                                        <label class="m-radio">
                                            <input type="radio" name="hargapabrik" value="loco" >Harga Loco
                                            <span></span>
                                        </label>
                                    @endif
                                    
                                </div>
                                <p class="m-form__help"><input type="text" class="form-control m-input" name="deskripsi" value="{{ $pos->deskripsi }}"></p> 
                                {{-- <p class="m-form__help"><input type="text" id="loco" style="display:none" class="form-control m-input" name="hargapabrik" ></p>  --}}
                            
                                {{-- <br> --}}
                               
                            </div> 
                            <div class="col-lg-6">
                                {{-- <label>BOD</label>
                                <select name="bod_id" class="form-control m-bootstrap-select m_selectpicker" id="bod_id"
                                    required>
                                    <option value="{{$pos->bod_id}}">{{ $pos->bod->name }}, {{ $pos->bod->code }}</option>
                                    @foreach ($bods as $d)
                                    @if ($pos->bod_id != $d->id){
                                    <option value="{{$d->id}}">{{ $d->name }}, {{ $d->code }}</option>
                                    }
                                    @endif
                                    @endforeach
                                </select> --}}
                                <label for="asuransi">Asuransi</label>
                                <div class="m-radio-inline" id="rdasuransi">
                                    @if ($pos->asuransi == "exclude")
                                    <label class="m-radio">
                                        <input type="radio" name="asuransi" value="exclude" checked="checked">Exclude Asuransi
                                        <span></span>
                                    </label>
                                    @else
                                        <label class="m-radio">
                                            <input type="radio" name="asuransi" value="exclude" >Exclude Asuransi
                                            <span></span>
                                        </label>
                                    @endif

                                    @if ($pos->include == "include")
                                    <label class="m-radio">
                                        <input type="radio" name="asuransi" value="include" checked="checked">Include Asuransi
                                        <span></span>
                                    </label>
                                    @else
                                        <label class="m-radio">
                                            <input type="radio" name="asuransi" value="include" >Include Asuransi
                                            <span></span>
                                        </label>
                                    @endif
                                    {{-- <label class="m-radio">
                                        <input type="radio" name="asuransi" value="exclude">Exclude Asuransi
                                        <span></span>
                                    </label>
                                    <label class="m-radio">
                                        <input type="radio" name="asuransi" value="include" >Include Asuransi
                                        <span></span>
                                    </label> --}}
                                </div>
                                {{-- <div class="m-checkbox-list">
                                    <label class="m-checkbox m-checkbox--state-success">
                                        @if ($pos->asuransi == 1)
                                            <input type="checkbox" name="asuransi" checked value="1"> Include Asuransi
                                            <span></span>    
                                        @else
                                        <input type="checkbox" name="asuransi" value="1"> Include Asuransi
                                        <span></span>
                                        @endif
                                    </label>
                                </div> --}}
                                <span class="m-form__help m--font-info">Notes : Jika Include Asuransi Mohon tambahkan nilai di dalam kolom Material/Barang dibawah</span>
                                
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label for="">Surat Penawaran</label>
                                <div class="m-radio-inline" id="rdsp" >
                                    @if ($pos->suratpenawaran == "spph")
                                    <label class="m-radio">
                                        <input type="radio" name="suratpenawaran" value="spph" checked="checked"> SPPH
                                        <span></span>
                                    </label>
                                    @else
                                        <label class="m-radio">
                                            <input type="radio" name="suratpenawaran" value="spph"> SPPH
                                            <span></span>
                                        </label>
                                    @endif
                                   @if ($pos->suratpenawaran == "spph_nego")
                                        <label class="m-radio">
                                            <input type="radio" name="suratpenawaran" value="spph_nego" checked="checked"> SPPH Nego
                                            <span></span>
                                        </label>
                                   @else
                                        <label class="m-radio">
                                            <input type="radio" name="suratpenawaran" value="spph_nego"> SPPH Nego
                                            <span></span>
                                        </label>
                                   @endif
                                   
                                </div>
                                <p class="m-form__help" >
                                    <div class="row">
                                        <div class="col-lg-5"> <div class="input-group date">
                                            <input type="text" class="form-control m-input" name="desc_tgl" readonly
                                                placeholder="Select Date" id="date" value="{{ $pos->desc_tgl }}" required/>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div></div>
                                        <div class="col-lg-7"> <input type="text" class="form-control m-input" name="desc" value="{{ $pos->desc }}"  placeholder="No Surat" /></div>
                                    </div>
                                   
                                    {{-- <span></span> --}}
                                   
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <label>BOD</label>
                                <select name="bod_id" class="form-control m-bootstrap-select m_selectpicker" id="bod_id"
                                    required>
                                    <option value="{{$pos->bod_id}}">{{ $pos->bod->name }}, {{ $pos->bod->code }}</option>
                                    @foreach ($bods as $d)
                                        @if ($d->status == 'active')
                                            @if ($pos->bod_id != $d->id)
                                            <option value="{{$d->id}}">{{ $d->name }}, {{ $d->code }}</option>                                            
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label for="">Catatan</label>
                                <textarea name="catatan" class="form-control m-input" id="summernote">{!! $pos->catatan !!}</textarea>                               
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group m-form__group row">
                        <div class="btn-group">
                            <button id="btnAdd" type="button" class="btn btn-primary">
                                Add Row
                            </button>
                            {{-- <a href="#" id="btnDel" class="btn btn-danger">Delete Row</a> --}}
                            <button id="btnDel" type="button" class="btn btn-danger">
                                Delete Row
                            </button>
                        </div>

                        {{-- <button id="btnDelCheckRow" type="button">
                                                Delete Checked Row
                                            </button> --}}
                        <table class="table table-striped-table-bordered table-hover" id="tblAddRow">
                            <thead>
                                <tr>
                                    <th>Material/Barang</th>
                                    <th width="100px">Qty</th>
                                    <th width="100px">Satuan</th>
                                    {{-- <th width="100px">Mata Uang</th> --}}
                                    <th width="200px">Harga</th>

                                </tr>
                            </thead>
                            @php
                            $no = 1 ;
                            // $subtotal = 0;
                            @endphp
                            <tbody>
                                @foreach ($pos->podetails as $item)
                                <tr>                     
                                    <td>
                                        <div class="input-group">
                                            <input type="hidden" name="hargabarang_id[]" class="form-control m-input" id="hargabarang_id" value="{{ $item->hargabarang_id }}">
                                            {{-- <input type="hidden" name="currency_id[]" class="form-control m-input" id="currency_id" value="{{ $item->currency_id }}"> --}}
                                            {{-- <input type="text" id="nama_brg" name="nama_brg[]" class="form-control m-input" value="{{ $item->hargabarang->nama_brg }}"> --}}
                                        <textarea name="nama_brg[]" id="nama_brg" class="form-control m-input" required cols="30"
                                            rows="5">{!! $item->hargabarang->nama_brg !!}</textarea>
                                            <div class="input-group-append">
                                                {{-- <a href="http://" class="btn btn-warning" id="btnModal" data-toggle="modal" data-target="#myModal">Search</a> --}}
                                                {{-- <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Search</a> --}}
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                                    Search
                                                  </button>
                                            </div>
                                        </div>
                                        </td>
                                    {{-- <input type="text" name="material[]" class="form-control m-input" required> --}}
                                    <td>
                                        <input type="hidden" name="qty_old[]" id="qty_old" class="form-control m-input"
                                        value="{{ $item->qty }}">
                                        <input type="text" name="qty[]" id="qty" class="form-control m-input qty"
                                             value="{{ $item->qty }}">
                                            </td>
                                    <td><input type="text" name="satuan[]" id="satuan" class="form-control m-input"
                                            value="{{ $item->satuan }}"></td>
                                            {{-- <td><input type="text" name="currency[]" id="currency"
                                                class="form-control m-input"  value="{{ $item->currency->name }}"></td> --}}
                                    <td><input type="text" name="harga[]" id="hargabrg" class="form-control m-input"
                                            value="{{ $item->harga }}"></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                {{-- @if ($pos->ppn) --}}
                                    {{-- <tr>
                                        <td colspan="3" style="text-align: right">PPN</td>
                                        <td><input type="text" name="ppn" class="form-control m-input"
                                                onkeypress="return hanyaAngka(event)" id="ppn"
                                                value="{{ $pos->ppn }}"></td>
                                    </tr> --}}
                                {{-- @endif --}}
                                {{-- @if ($pos->diskon) --}}
                                <tr>
                                    <td colspan="3" style="text-align: right">Diskon</td>
                                    <td><input type="text" name="diskon" class="form-control m-input"
                                            id="diskon"
                                            value="{{ $pos->diskon }}"></td>
                                </tr>
                                {{-- @endif --}}
                                {{-- @if ($pos->biaya_kirim) --}}
                                <tr>
                                    <td colspan="3" style="text-align: right">Biaya Kirim</td>
                                    <td><input type="text" name="biaya_kirim" class="form-control m-input"
                                            onkeypress="return hanyaAngka(event)" id="biaya_kirim"
                                            value="{{ $pos->biaya_kirim }}"></td>
                                </tr>
                               {{-- @endif --}}
                               <tr>
                                <td style="text-align: right">Custom (+)</td>
                                <td colspan="2"><input type="text" name="custom" style="text-align: right" class="form-control m-input"
                                    id="custom" value="{{ $pos->custom }}"></td>
                                <td><input type="text" name="custom1" class="form-control m-input"
                                         value="{{ $pos->custom1 }}"></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right">Custom (-)</td>
                                    <td colspan="2"><input type="text" name="custom2" style="text-align: right" class="form-control m-input"
                                        id="custom" value="{{ $pos->custom2 }}"></td>
                                    <td><input type="text" name="custom3" class="form-control m-input"
                                             value="{{ $pos->custom3 }}"></td>
                                    </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
                {{-- </div> --}}
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="/rekappo" class="btn btn-default">Back</a>
                                <div class="btn-group pull-right">
                                    {{-- <a href="/rekappo/edit/detail/{{ $pos->id }}" class="btn btn-primary">Next</a>
                                    --}}
                                    <button type="submit" class="btn btn-primary">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
{{-- </div> --}}
        <!--end::Portlet-->
    </div>
</div>
</div>
{{-- </div>
</div> --}}
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-striped- table-bordered table-hover" id="m_table_1_wrapper" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Lokasi</th>
                        <th>Vendor</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                <tbody>
                    @foreach ($hargabarangs as $data)
                        {{-- <input type="hidden" id="id" value="{{$data->id}}"> --}}
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{!! $data->nama_brg !!}</td>
                        <td >{{ $data->qty }}</td>
                        <td >{{ $data->satuan }}</td>
                        <td>{{$data->currency->name . " " . $data->harga }}</td>
                        <td>{{ $data->lokasi->kode }}</td>
                        <td>{{ $data->vendor->namaperusahaan }}</td>
                        <td><button type="button" class="btn btn-xs btn-primary MySelect" data-id="{{ $data->id }}" data-satuan="{{ $data->satuan }}" data-harga="{{ $data->harga }}" data-currency="{{ $data->currency->name }}" data-currency_id="{{ $data->currency_id }}"  data-nama="{!! $data->nama_brg !!}">Select</button></td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
@endsection

@section('footer-script')
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
     $('#summernote').summernote({
            height: "100px"
        });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#tanggal').datepicker({
                //merubah format tanggal datepicker ke dd-mm-yyyy
                format: "yyyy-mm-dd",
                //aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
                //format: "dd-mm-yyyy",
                autoclose: true
            }),
            $("#start_date").datepicker({
                autoclose: true,
                format: "yyyy-mm-dd"
            }),
            $("#end_date").datepicker({
                autoclose: true,
                format: "yyyy-mm-dd",
                // startDate:new Date
            });
            $("#date").datepicker({
                autoclose: true,
                format: "yyyy-mm-dd",
                // startDate:new Date
            });
    });

</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.submit-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Anda Sudah Yakin?',
          
            icon: 'warning',
            buttons: ["Tidak", "Iya !"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>

<script type="text/javascript">
    //   function calculateSum(jml){

    //   var total=0;
    //   for (var i=0; i<jml; ++i){
    //       total += parseFloat($("#jumlah").eq(i).val()); 
    //   }      
    //   $("#sum").html(total.toFixed(2));
    //   }

    $(document).ready(function () {
        $("#rdbayar input[type='radio']").change(function(){
            if($(this).val()=="other")
            {
                $("#otherAnswer").show();
            }
            else
            {                
                $("#otherAnswer").hide(); 
            }
        });
        $("#rdpajak input[type='radio']").change(function(){
            if($(this).val()=="other")
            {
                $("#otherpajak").show();
            }
            else
            {                
                $("#otherpajak").hide(); 
            }
        });
        // For select all checkbox in table
        // $('#checkedAll').click(function (e) {
        //     //e.preventDefault();
        //     $(this).closest('#tblAddRow').find('td input:checkbox').prop('checked', this.checked);
        // });
        // function changeInput(oldObject, oType){
        //     var newobject = 
        // }

        $(".MySelect").on('click', function(event){
            var id =  $(this).data('id');
            var nama =  $(this).data('nama');
            var satuan =  $(this).data('satuan');
            // var currency_id =  $(this).data('currency_id');
            // var currency =  $(this).data('currency');
            var harga =  $(this).data('harga');
            // var tr = $(event.target);
            // var hargabarang_id = $(this).data('hargabarang_id');
            // alert (id);
            // var hargaid =  $('#hargabarang_id').val(id) ;
            // var namaid =  $('#tblAddRow tbody tr:last #nama_brg').val(nama) ;

            // alert(id);

            // $('input[#hargabarang_id]').val().replace('value', hargaid) ;
            // $('input[#nama_brg]').val().replace('value', namaid) ;
            // alert (hargabarang);
            // $('#tblAddRow tbody tr:last #hargabarang_id').val().replace(id)) ;
            // $('#tblAddRow tbody tr:last #nama_brg').val().replace(nama)) ;

            // $('#tblAddRow tbody tr:last #nama_brg').val($('#tblAddRow tbody tr:last #nama_brg').val().replace(nama)) ;
            $('#tblAddRow tbody tr:last #hargabarang_id').val(id) ;
            $('#tblAddRow tbody tr:last #nama_brg').val(nama) ;
            $('#tblAddRow tbody tr:last #satuan').val(satuan);
            // $('#tblAddRow tbody tr:last #currency_id').val(currency_id);
            // $('#tblAddRow tbody tr:last #currency').val(currency);
            $('#tblAddRow tbody tr:last #hargabrg').val(harga);
            // $('#nama_brg').val(nama);
            $('#myModal').modal('hide'); 
        });
        // Add row the table
        $('#btnAdd').on('click', function () {
            var lastRow = $('#tblAddRow tbody tr:last').html();

            //alert(lastRow);
            $('#tblAddRow tbody').append('<tr>' + lastRow + '</tr>');
            $('#tblAddRow tbody tr:last input').val('');
            // jumlah_amount();
            // $('#jumlah').val(jumlah);
        });

        // Delete last row in the table
        $('#btnDel').on('click', function () {
            var lenRow = $('#tblAddRow tbody tr').length;
            //alert(lenRow);
            if (lenRow == 1 || lenRow <= 1) {
                alert("Can't remove all row!");
            } else {
                $('#tblAddRow tbody tr:last').remove();
                // $.ajax({
                //     url:"/podetail/delete/{{$pos->id}}",
                //     type:'GET',
                //     dataType: "JSON",
                //     data: {
                //         "id":id,
                //         "_method":'DELETE',
                //         "_token":token,
                //     }
                // });
                // jumlah_amount();
            }
        });

        // Delete row on click in the table
        $('#tblAddRow').on('click', 'tr a', function (e) {
            var lenRow = $('#tblAddRow tbody tr').length;
            // var qty = parseInt($('#qty').val());
            // var harga = parseInt($('#harga').val());
            e.preventDefault();
            if (lenRow == 1 || lenRow <= 1) {
                alert("Can't remove all row!");
            } else {
                $(this).parents('tr').remove();
            }
        });

        // Delete selected checkbox in the table
        // $('#btnDelCheckRow').click(function () {
        //     var lenRow = $('#tblAddRow tbody tr').length;
        //     var lenChecked = $("#tblAddRow input[type='checkbox']:checked").length;
        //     var row = $("#tblAddRow tbody input[type='checkbox']:checked").parent().parent();
        //     //alert(lenRow + ' - ' + lenChecked);
        //     if (lenRow == 1 || lenRow <= 1 || lenChecked >= lenRow) {
        //         alert("Can't remove all row!");
        //     } else {
        //         row.remove();
        //     }
        // });

        // function jumlah_amount(){
        //     var sum=0;
        //     var jumlah=0;
        //     $('#harga').keyup(function(){
        //     // var harga = $(this).val();
        //     var harga = find($('.harga').val());
        //     var qty = find($('.qty').val());
        //     var jumlah = qty*harga;
        //     $('#jumlah').val(jumlah);
        // });
        // }
    });

</script>

@endsection
