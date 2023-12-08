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
                        <form action="/pjpum/update/detail" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="_method" value="PUT" />
                                <input type="hidden" name="id" value="{{ $pums->id }}" />
                                <input type="hidden" name="no_pjpum" value="{{ $pums->no_pjpum }}" />
                                <input type="hidden" name="tanggal" value="{{ $pums->tanggal }}" />
                                <input type="hidden" name="pumheader_id" value="{{ $pums->pumheader_id }}" />
                                <input type="hidden" name="membuat" value="{{ $pums->membuat }}" />
                                <input type="hidden" name="mengetahui" value="{{ $pums->mengetahui }}" />
                                <input type="hidden" name="total" value="{{ $pums->total }}" />
                                
                                @foreach ($pums->pjpumdetails as $detail)
                                    <input type="hidden" name="pjpumheader_id[]" value="{{ $detail->id }}" />
                                    <input type="hidden" name="deskripsi[]" value="{{ $detail->deskripsi }}" />
                                    {{-- <input type="hidden" name="nama_brg[]" value="{{ $detail->nama_brg }}" /> --}}
                                    <input type="hidden" name="jumlah[]" value="{{ $detail->jumlah }}" />
                                    {{-- <input type="hidden" name="satuan[]" value="{{ $detail->satuan }}" />
                                    <input type="hidden" name="harga[]" value="{{ $detail->harga }}" />   --}}
                                @endforeach                  
                                {{-- @endforeach --}}
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
                                      
                                        <div class="m-invoice__items">
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">No PJ PUM</span>
                                                <span class="m-invoice__text">{{ $pums->no_pjpum }}</span>
                                            </div>
                                        
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Tanggal</span>
                                                <span class="m-invoice__text">{{ $pums->tanggal }}</span>
                                            </div>
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">No PUM</span>
                                                <span class="m-invoice__text">{{ $pums->pumheader->no_pum }}</span>
                                            </div>
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Nama Pekerjaan</span>
                                                <span class="m-invoice__text">{{ $pums->pumheader->nama_pek }}</span>
                                            </div>
                                        </div>
                                        <div class="m-invoice__items">
                                            
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Membuat</span>
                                                <span class="m-invoice__text"> {{ $pums->membuat}}</span>
                                            </div>

                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Mengetahui</span>
                                                <span class="m-invoice__text"> {{ $pums->mengetahui}}</span>
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
                                                    <th>Jumlah</th>
                                                </tr>
                                            </thead>
                                            @php                                            
                                                $total = 0;
                                            @endphp
                                            <tbody>
                                                @foreach ($pums->pjpumdetails as $item)  
                                                    @php
                                                    $total += $item->jumlah 
                                                    @endphp                                            
                                                    <tr>
                                                        <td>{{ $item->deskripsi}}</td>
                                                        <td class="m--font-primary">{{ format_uang($item->jumlah) }}</td>
                                                    </tr>

                                                @endforeach
                                            </tbody>                                              
                                            {{-- <tfoot>
                                                <tr>
                                                    <td>Total</td>
                                                    <td>{{ $total }}</td>
                                                </tr>
                                            </tfoot> --}}
                                        </table>
                                    </div>
                                    <hr>
                                    <div class="m-invoice__items">
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">Terbilang : </span><br>
                                            <span class="m-invoice__text"><strong>{{ terbilang($total) . " rupiah" }}</strong></span>
                                        </div>
                                        <br>
                                        {{-- <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">Pembayaran : </span><br>
                                            @if ($pums->cara_bayar == "cbd")
                                                <span class="m-invoice__text">Cash Before Delivery</span>
                                            @elseif($pums->cara_bayar == "cad")
                                                <span class="m-invoice__text">Cash After Delivery</span>
                                            @elseif($pums->cara_bayar == "dp")
                                                <span class="m-invoice__text">DP 20% & Sisa 80%</span>
                                            @else
                                                <span class="m-invoice__text">{{ $pums->cara_bayar1 }}</span>
                                            @endif
                                           
                                        </div> --}}
                                        {{-- <br>  
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">Catatan :</span><br>
                                            <span class="m-invoice__text">v Harga {{ $pums->hargapabrik }} {{ $pums->deskripsi }} </span><br>
                                            
                                            @if ($pums->suratpenawaran == "spph")
                                                <span class="m-invoice__text">v Sesuai Surat Penawaran Harga {{ $pums->desc }} Tanggal {{ $pums->desc_tgl }} </span> <br>
                                            @else
                                                <span class="m-invoice__text">v Sesuai Surat Penawaran Harga Nego No {{ $pums->desc }} Tanggal {{ $pums->desc_tgl }} </span> <br>
                                            @endif
                                            
                                            <span class="m-invoice__text">v Mohon dapat diemail kembali setelah PO diterima, ditandatangan dan stempel perusahaan.    
                                        </div> --}}
                                    </div>
                                    <hr>
                                    <div class="btn-group pull-right">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                        <a href="/rekappo/create" class="btn btn-default">Kembali</a>
                                    </div>
                                </div>
                                <div class="m-invoice__footer">
                                    <div class="m-invoice__table  m-invoice__table--centered table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>TOTAL AMOUNT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        {{-- {{ $pums->vendor->bank->name }} <br>
                                                        {{ $pums->vendor->no_rek }} <br>
                                                        {{ $pums->vendor->pemilik_rek }} --}}
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="m--font-success"> <input type="hidden" style="text-align: right" name="total" class="form-control" value="{{ $total }}" readonly>{{ number_format($total)  }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
