@extends('layouts.app2')

@section('m-subheader')
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator"> {{ $judul }}</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="#" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="#" class="m-nav__link">
                        <span class="m-nav__link-text"> {{ $judul }}</span>
                    </a>
                </li>

            </ul>
        </div>

    </div>
</div>
@endsection

@section('m-content')
<div class="m-content">
    @include('component.alertnotification')
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__body m-portlet__body--no-padding">
                    <div class="m-invoice-2">
                        <form action="/rekappo/edit/detail/update" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="_method" value="PUT" />
                                <input type="hidden" name="id" value="{{ $rekappos->id }}" />
                                <input type="hidden" name="no_po" value="{{ $rekappos->no_po }}" />
                                <input type="hidden" name="no_kontrak" value="{{ $rekappos->no_kontrak }}" />
                                <input type="hidden" name="nilai_rap" value="{{ $rekappos->nilai_rap }}" />
                                <input type="hidden" name="tanggal" value="{{ $rekappos->tanggal }}" />
                                <input type="hidden" name="start_date" value="{{ $rekappos->start_date }}" />
                                <input type="hidden" name="end_date" value="{{ $rekappos->end_date }}" />
                                <input type="hidden" name="cara_bayar" value="{{ $rekappos->cara_bayar }}" />
                                <input type="hidden" name="cara_bayar1" value="{{ $rekappos->cara_bayar1 }}" />
                                <input type="hidden" name="pajak" value="{{ $rekappos->pajak }}" />
                                <input type="hidden" name="pajak1" value="{{ $rekappos->pajak1 }}" />
                                <input type="hidden" name="nama_pekerjaan" value="{{ $rekappos->nama_pekerjaan }}" />
                                <input type="hidden" name="vendor_id" value="{{ $rekappos->vendor_id }}" />
                                <input type="hidden" name="lokasi_id" value="{{ $rekappos->lokasi_id }}" />
                                <input type="hidden" name="preference_id" value="{{ $rekappos->preference_id }}" />
                                <input type="hidden" name="currency_id" value="{{ $rekappos->currency_id }}" />
                                <input type="hidden" name="bod_id" value="{{ $rekappos->bod_id }}" />
                                <input type="hidden" name="hargapabrik" value="{{ $rekappos->hargapabrik }}" />
                                <input type="hidden" name="asuransi" value="{{ $rekappos->asuransi }}" />
                                <input type="hidden" name="deskripsi" value="{{ $rekappos->deskripsi }}" />
                                <input type="hidden" name="suratpenawaran" value="{{ $rekappos->suratpenawaran }}" />
                                <input type="hidden" name="desc_tgl" value="{{ $rekappos->desc_tgl }}" />
                                <input type="hidden" name="desc" value="{{ $rekappos->desc }}" />
                                <input type="hidden" name="diskon" value="{{ $rekappos->diskon }}" />
                                <input type="hidden" name="biaya_kirim" value="{{ $rekappos->biaya_kirim }}" />
                                <input type="hidden" name="catatan" value="{!! $rekappos->catatan !!}" />
                                <input type="hidden" name="custom" value="{{ $rekappos->custom }}" />
                                <input type="hidden" name="custom1" value="{{ $rekappos->custom1 }}" />
                                <input type="hidden" name="custom2" value="{{ $rekappos->custom2 }}" />
                                <input type="hidden" name="custom3" value="{{ $rekappos->custom3 }}" />
                                {{-- <input type="hidden" name="ppn" value="{{  $rekappos->ppn }}" />--}}
                                <input type="hidden" name="total" value="{{  $rekappos->total }}" /> 
                                {{-- <input type="hidden" name="totalrp" value="{{  $total }}" />  --}}

                                @foreach ($rekappos->podetails as $item)
                                    <input type="hidden" name="rekappo_id[]" value="{{ $item->id }}" />
                                    <input type="hidden" name="hargabarang_id[]" value="{{ $item->hargabarang_id }}" />
                                    <input type="hidden" name="qty[]" value="{{ $item->qty }}" />
                                    <input type="hidden" name="qty_old[]" value="{{ $item->qty_old }}" />
                                    <input type="hidden" name="satuan[]" value="{{ $item->satuan }}" />                                  
                                    <input type="hidden" name="harga[]" value="{{ $item->harga }}" />                                    
                                @endforeach
                            </div>
                            <div class="m-invoice__wrapper">
                                <div class="m-invoice__head"
                                    style="background-image: url(assets/app/media/img/logos/bg-6.html);">
                                    <div class="m-invoice__container m-invoice__container--centered">
                                        <div class="m-invoice__logo">
                                            <a href="#">
                                                <h1>{{ $judul }}</h1>
                                            </a>
                                            <a href="#">
                                                {{-- <img  src="assets/app/media/img/logos/logo_client_color.png">  	 --}}
                                            </a>
                                        </div>
                                        <span class="m-invoice__desc">
                                            {{-- @foreach ($pref as $item) --}}
                                            <span>{{ $pref->nama_perusahaan }}</span>
                                            <span>{{ $pref->address }}</span>
                                            <span>{{ $pref->email }}</span>
                                            {{-- @endforeach --}}
                                        </span>
                                        <div class="m-invoice__items">
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">No Purchase Order</span>
                                                <span class="m-invoice__text">{{ $rekappos->no_po }}</span>
                                            </div>
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">No Kontrak</span>
                                                <span class="m-invoice__text">{{ $rekappos->no_kontrak }}</span>
                                            </div>

                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Nilai RAP</span>
                                                <span class="m-invoice__text">{{ format_uang($rekappos->nilai_rap)  }}</span>
                                            </div>
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Tanggal</span>
                                                <span class="m-invoice__text">{{ $rekappos->tanggal }}</span>
                                            </div>
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Waktu Pelaksanaan</span>
                                                <span class="m-invoice__text">{{ $rekappos->start_date }} s/d
                                                    {{ $rekappos->end_date }}</span>
                                            </div>
                                        </div>
                                        <div class="m-invoice__items">
                                            
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Nama Pengadaan</span>
                                                <span class="m-invoice__text">{{ $rekappos->nama_pekerjaan }}, {{ $rekappos->lokasi->kode }}</span>
                                            </div>
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Pajak</span>
                                                <span class="m-invoice__text">
                                                    @if ($rekappos->pajak == "exclude")
                                                        <span>Exclude Tax (V0)</span>
                                                    @elseif ($rekappos->pajak == "ppn")
                                                        <span>Include Tax (V1)</span>
                                                    @elseif ($rekappos->pajak == "ppn11")
                                                        <span>Include Tax (V1)</span>
                                                    @elseif ($rekappos->pajak == "pph")
                                                        <span>Include Tax (V1)</span>
                                                    @else 
                                                        <span>Include Tax (V1)</span>
                                                    @endif
                                                </span>
                                            </div>                              
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Asuransi</span>
                                                <span class="m-invoice__text">
                                                    @if ($rekappos->asuransi == 0)
                                                    <span>Exclude Assurance</span>
                                                    @else
                                                    <span>Include Assurance</span>
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Vendor</span>
                                                <span class="m-invoice__text">{{ $rekappos->vendor->namaperusahaan }},
                                                    {{ $rekappos->vendor->badanusaha->kode }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-invoice__body m-invoice__body--centered">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Material / Deskripsi</th>
                                                    <th>Satuan</th>
                                                    <th>Qty</th>
                                                    <th>Harga</th>
                                                    <th width='170px'>Jumlah</th>
                                                </tr>
                                            </thead>
                                            @php
                                                $subtotal = 0;
                                                $diskon = 0;
                                                $biaya_kirim = 0;
                                                $ppn = 0;
                                                $total = 0;
                                                $totalrp = 0;
                                            @endphp
                                            <tbody>
                                                @foreach ($rekappos->podetails as $item)
                                            @php
                                                $jumlah = $item->qty * $item->harga;
                                                $subtotal += $jumlah; 
                                            @endphp 
                                                <tr>
                                                    <td>{!! $item->hargabarang->nama_brg !!}</td>
                                                    <td>{{ $item->satuan }}</td>
                                                    <td>{{ $item->qty }}</td>
                                                    <td class="m--font-primary">{{$rekappos->currency->name . " " . format_uang($item->harga) }}</td>
                                                    <td  class="m--font-success">{{$rekappos->currency->name . " " . format_uang($jumlah) }}</td>
                                                </tr>
                                               
                                                @endforeach
                                            </tbody>
                                            @php
                                                if ($rekappos->pajak == "ppn") {                                                    
                                                    $subatotal = $subtotal - $rekappos->diskon;
                                                    $ppn = $subatotal * 10/100; 
                                                    $total = $subatotal + $ppn + $rekappos->biaya_kirim + $rekappos->custom1 - $rekappos->custom3;  
                                                    $totalrp = $total;  
                                                } 
                                                elseif ($rekappos->pajak == "ppn11") {                                                    
                                                    $subatotal = $subtotal - $rekappos->diskon;
                                                    $ppn = $subatotal * 11/100; 
                                                    $total = $subatotal + $ppn + $rekappos->biaya_kirim + $rekappos->custom1 - $rekappos->custom3;    
                                                    $totalrp = $total;
                                                } 
                                                elseif ($rekappos->pajak == "pph") {                                                    
                                                    $subatotal = $subtotal - $rekappos->diskon;
                                                    $ppn = $subatotal * 1/100; 
                                                    $total = $subatotal + $ppn + $rekappos->biaya_kirim + $rekappos->custom1 - $rekappos->custom3;    
                                                    $totalrp = $total;
                                                } 
                                                elseif ($rekappos->pajak == "other") {
                                                    $subatotal = $subtotal - $rekappos->diskon;
                                                    $ppn = $subatotal * $rekappos->pajak1/100;
                                                    $total = $subatotal  + $ppn + $rekappos->biaya_kirim + $rekappos->custom1 - $rekappos->custom3;
                                                    $totalrp = $total;
                                                }
                                                else {
                                                    $subatotal = $subtotal - $rekappos->diskon;
                                                    // $ppn = $subatotal * $rekappos->pajak1/100;
                                                    $total = $subatotal   + $rekappos->biaya_kirim + $rekappos->custom1 - $rekappos->custom3;
                                                    $totalrp = $total;
                                                }
                                            @endphp
                                            <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td style="text-align: right">Sub Total</td>
                                                    <td class="m--font-success" style="text-align: right"> <strong id="dpp">{{$rekappos->currency->name . " " . format_uang($subtotal) }}</strong> </td>
                                                </tr>
                                                @if ($rekappos->diskon )
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td style="text-align: right">Diskon</td>
                                                    <td class="m--font-success" style="text-align: right">
                                                        <strong id="afdpp">{{$rekappos->currency->name . " " . format_uang( $rekappos->diskon) }}</strong>
                                                        {{-- <input type="text"  style="text-align: right" name="diskon" class="form-control" value="{{ $rekappos->diskon }}" readonly> --}}
                                                        {{-- <span id="ppn"><strong>{{ $rekappos->diskon  }}</strong></span> --}}
                                                    </td>
                                                </tr>
                                                @endif
                                                
                                                @if ($subatotal)
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td style="text-align: right">Sub A Total</td>
                                                    <td class="m--font-success" style="text-align: right"> <strong id="afdpp">{{$rekappos->currency->name . " " . format_uang($subatotal) }}</strong> </td>
                                                </tr>
                                                @endif

                                                
                                                @if ($ppn)
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td style="text-align: right">
                                                        @if ($rekappos->pajak == "ppn")
                                                        PPN 10%
                                                        @elseif ($rekappos->pajak == "ppn11")
                                                        PPN 11%
                                                        @elseif ($rekappos->pajak == "pph")
                                                        PPN 1%
                                                        @elseif ($rekappos->pajak == "other")
                                                        PPN {{ $rekappos->pajak1 . "%" }}
                                                        @endif 
                                                    </td>
                                                    {{-- <td> --}}
                                                        <td class="m--font-success" style="text-align: right"> <strong id="afdpp">{{$rekappos->currency->name . " " . format_uang($ppn) }}</strong> </td>
                                                      
                                                        {{-- <input type="text" name="ppn"  style="text-align: right" width="150px" class="form-control" value="{{ $ppn }}" readonly> --}}
                                                        {{-- <span id="ppn"><strong>{{ $ppn) }}</strong></span> --}}
                                                    {{-- </td> --}}
                                                </tr>    
                                                @endif
                                                
                                                @if ( $rekappos->biaya_kirim )
                                                    <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td style="text-align: right">Biaya Kirim</td>
                                                    <td class="m--font-success" style="text-align: right">
                                                        <strong id="afdpp">{{$rekappos->currency->name . " " . format_uang( $rekappos->biaya_kirim) }}</strong>
                                                        {{-- <input type="text" style="text-align: right" name="biaya_kirim" class="form-control" value="{{ $rekappos->biaya_kirim }}" readonly> --}}
                                                        {{-- <span id="ppn"><strong>{{ $rekappos->diskon)  }}</strong></span> --}}
                                                    </td>
                                                </tr>
                                                @endif
                                                
                                                @if ( $rekappos->custom )
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td style="text-align: right">
                                                        <input type="text"  style="text-align: right" name="custom" class="form-control" value="{{ $rekappos->custom }}" readonly>
                                                    </td>
                                                    <td class="m--font-success">
                                                        <input type="text"  style="text-align: right" name="custom1" class="form-control" value="{{ $rekappos->custom1 }}" readonly>
                                                    </td>
                                                </tr>
                                                @endif

                                                @if ( $rekappos->custom2 )
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td style="text-align: right">
                                                        <input type="text"  style="text-align: right" name="custom2" class="form-control" value="{{ $rekappos->custom2 }}" readonly>
                                                    </td>
                                                    <td class="m--font-success">
                                                        <input type="text"  style="text-align: right" name="custom3" class="form-control" value="{{ $rekappos->custom3 }}" readonly>
                                                    </td>
                                                </tr>
                                                @endif
                                                
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td style="text-align: right">Total</td>
                                                    <td style="text-align: right">
                                                        <strong id="afdpp">{{$rekappos->currency->name . " " . format_uang($total) }}</strong>
                                                        {{-- {!! Form::label($for, $text, [$options]) !!} --}}
                                                        {{-- <input type="hidden" name="total" style="text-align: right" class="form-control" value="{{ number_format($total,2) }}" readonly> --}}
                                                        {{-- <span id="total"><strong>{{ format_uang($total) }}</strong></span>  --}}
                                                    </td>
                                                </tr>                                            
                                            </tfoot>
                                        </table>
                                    </div>
                                    <hr>
                                    <div class="m-invoice__items">
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">Terbilang : </span><br>
                                            <span class="m-invoice__text" style="text-transform: capitalize">
                                                <input type="text" name="total" id="total" class="form-control" value="{{ $rekappos->total }}" required>  
                                                <input type="hidden" name="totalrp" id="totalrp" class="form-control" value="{{ $total }}">   
                                            </span>
                                        </div>
                                        <br>
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">Pembayaran : </span><br>
                                            @if ($rekappos->cara_bayar == "cbd")
                                                <span class="m-invoice__text">Cash Before Delivery</span>
                                            @elseif($rekappos->cara_bayar == "cad")
                                                <span class="m-invoice__text">Cash After Delivery</span>
                                            @elseif($rekappos->cara_bayar == "dp")
                                                <span class="m-invoice__text">DP 20% & Sisa 80%</span>
                                            @else
                                                <span class="m-invoice__text">{{ $rekappos->cara_bayar1 }}</span>
                                            @endif
                                        </div>
                                        <br>  
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">Catatan :</span><br>
                                            <ol type="I">
                                                <li>{!! $rekappos->catatan !!}</li>
                                                <li> <span class="m-invoice__text"> Harga {{ $rekappos->hargapabrik }} {{ $rekappos->deskripsi }} </span></li>
                                                @if ($rekappos->suratpenawaran == "spph")
                                                <li>  <span class="m-invoice__text">Sesuai Surat Penawaran Harga {{ $rekappos->desc }} Tanggal {{ $rekappos->desc_tgl }} </span> </li>
                                                @else
                                                   <li> <span class="m-invoice__text">Sesuai Surat Penawaran Harga Nego No {{ $rekappos->desc }} Tanggal {{ $rekappos->desc_tgl }} </span></li>
                                                @endif
                                                   <li> <span class="m-invoice__text">Mohon dapat diemail kembali setelah PO diterima, ditandatangan dan stempel perusahaan.  </span>  </li>
                                            </ol>  
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="btn-group pull-right">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                        <a href="/rekappo/create" class="btn btn-default">Kembali</a>
                                    </div>
                                </div>
                                <div class="m-invoice__footer">
                                    {{-- <div class="m-invoice__table  m-invoice__table--centered table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>BANK</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>TOTAL AMOUNT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        {{ $rekappos->vendor->bank->name }} <br>
                                                        {{ $rekappos->vendor->no_rek }} <br>
                                                        {{ $rekappos->vendor->pemilik_rek }}
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="m--font-success">{{ number_format($total)  }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('footer-script')
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
    $(document).ready(function() {
        $('#diskon').keyup(function(){
            var diskon=parseInt($('#diskon').val());
            var bayar=parseInt($('#dpp').val());
            var subtotal_bayar = bayar-(diskon/100)*bayar;
            var total_bayar = subtotal_bayar;
            
        $('#subtotal').val(subtotal_bayar);
        $('#total').val(total_bayar);
        });

        $('#ppn').keyup(function(){
            var ppn=parseInt($('#ppn').val());
            var subtotal_bayar=parseInt($('#subtotal').val());
            var total_bayar = subtotal_bayar*(ppn/100)+subtotal_bayar;
        $('#total').val(total_bayar);
        });

        $('#biayakirim').keyup(function(){
            // var subtotal_bayar=parseInt($('#subtotal').val());
            var kirim=parseInt($('#biayakirim').val());
            var subtotal=parseInt($('#subtotal').val());
            // var diskon=parseInt($('#diskon').val());
            // var subtotal_bayar = 
            // var total=parseInt($('#total').val());
            var total = kirim + subtotal; 
            
        $('#total').val(total);
        });

    });
</script>



@endsection
