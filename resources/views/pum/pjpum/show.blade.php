@extends('layouts.app2')

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
            <div class="m-portlet">
                <div class="m-portlet__body m-portlet__body--no-padding">
                    <div class="m-invoice-2">
                        <div class="m-invoice__wrapper">
                            <div class="m-invoice__head"
                                style="background-image: url(assets/app/media/img/logos/bg-6.html);">
                                <div class="m-invoice__container m-invoice__container--centered">
                                    <div class="m-invoice__logo">
                                        <a href="#">
                                            <h3>PJ PUM</h3>
                                        </a>
                                        <a href="#">
                                          <img src="{{ url('data_file/'.$pref->image) }}" width="250px" alt="">  
                                        </a>
                                    </div>
                                    {{-- <span class="m-invoice__desc">
                                        <span>Cecilia Chapman, 711-2880 Nulla St, Mankato</span>
                                        <span>Mississippi 96522</span>
                                    </span> --}}
                                    {{-- <div class="m-invoice__items">
                                        <div class="m-invoice__item"> --}}
                                            {{-- <span class="m-invoice__subtitle">Vendor</span>
                                            <span class="m-invoice__text">{{ $pums->vendor->namaperusahaan }},  {{ $pums->vendor->badanusaha->kode }}</span>
                                            <span class="m-invoice__text">{{ $pums->vendor->alamat }}</span>
                                            <span class="m-invoice__text">{{ $pums->vendor->email }}</span>
                                            <span class="m-invoice__text">{{ $pums->vendor->notelp }}</span> --}}
                                        {{-- </div>
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">Pemesanan</span>
                                            <span class="m-invoice__text">{{ $pums->preference->nama_perusahaan }}</span>
                                            <span class="m-invoice__text">{{ $pums->preference->address }}</span>
                                            <span class="m-invoice__text">{{ $pums->preference->email }}</span>
                                            <span class="m-invoice__text">{{ $pums->preference->phone }}</span> --}}
                                            {{-- <span class="m-invoice__text">{{ $pums->no_do }}</span> --}}
                                        {{-- </div>                                       
                                    </div> --}}

                                    <div class="m-invoice__items">
                                        <div class="m-invoice__item">
                                            <table class="table m-table table-responsive">
                                                <tr>
                                                    <td>No PUM</td>
                                                    <td>{{$pums->pumheader->no_pum}}</td>
                                                </tr>
                                                {{-- <tr>
                                                    <td>Nomor Kontrak</td>
                                                    <td>{{$pums->no_kontrak}}</td>
                                                </tr> --}}
                                                <tr>
                                                    <td>Tanggal</td>
                                                    <td>{{  date("d-m-Y", strtotime($pums->tanggal))}}</td>
                                                </tr>
                                              
                                            </table>
                                        </div>
                                        <div class="m-invoice__item">
                                            <table class="table m-table table-responsive">
                                                <tr>
                                                    <td>Nama Pekerjaan</td>
                                                    <td>{{ $pums->pumheader->nama_pek}}</td>
                                                </tr>
                                                <tr>
                                                    <td>NO PJ PUM</td>
                                                    <td>{{ $pums->no_pjpum}}</td>
                                                </tr>
                                                {{-- <tr>
                                                    <td>Tanggal</td>
                                                    <td>{{  date("d-m-Y", strtotime($pums->tanggal))}}</td>
                                                </tr> --}}
                                            </table>
                                            {{-- <span class="m-invoice__text">Waktu Pelaksanaan : {{  date("d-m-Y", strtotime($pums->start_date))}} / {{  date("d-m-Y", strtotime($pums->tgl_akhir))}}</span>
                                            <span class="m-invoice__text">Waktu Pengiriman : {{  date("d-m-Y", strtotime($pums->tgl_pengiriman))}}</span> --}}
                                        </div>                                       
                                    </div>

                                    {{-- <div class="m-invoice__items">
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">Nama Pekerjaan</span>
                                            <span class="m-invoice__text">{{ $pums->nama_pek }}</span>
                                        </div> --}}
                                        {{-- <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">Tujuan Pengiriman</span>
                                            <span class="m-invoice__text">{{ $pums->tujuan_pengiriman }}</span>
                                        </div> --}}
                                    {{-- </div> --}}
                                </div>
                            </div>
                            <div class="m-invoice__body m-invoice__body--centered">
                                <div class="table-responsive">
                                    <table   class="table table-striped- table-bordered table-hover table-checkable">
                                        <thead>
                                            <tr>
                                                <th style="vertical-align : middle;text-align:center;">No</th>
                                                <th style="vertical-align : middle;text-align:center;">Keterangan</th>
                                                <th style="vertical-align : middle;text-align:center;">Jumlah</th>
                                                {{-- <th style="vertical-align : middle;text-align:center;">Satuan</th>
                                                <th style="vertical-align : middle;text-align:center;">serial_num</th>
                                                <th style="vertical-align : middle;text-align:center;">lokasi</th>                                                
                                                <th style="vertical-align : middle;text-align:center;">Catatan</th> --}}
                                            </tr>
                                        </thead>
                                        @php
                                            $no = 1 ;
                                            $subtotal = 0;
                                            $total = 0;
                                        @endphp
                                        <tbody>
                                            @foreach ($pums->pjpumdetails as $item)    
                                            @php
                                            // $jumlah = $item->qty * $item->harga ;
                                            
                                            // $subtotal = $item->jumlah;
                                            $total += $item->jumlah;
                                            // $subatotal = $subtotal - $rekappos->diskon;
                                        @endphp                                            
                                            <tr>
                                                <td style="vertical-align : middle;text-align:center;">{{$no++}}</td>
                                                <td style="vertical-align : middle;text-align:left;">{{ $item->deskripsi }}</td>
                                                {{-- <td style="vertical-align : middle;text-align:center;">{{ number_format($item->qty) }}</td>                                                
                                                <td style="vertical-align : middle;text-align:center;">{{ $item->satuan }}</td>
                                                <td style="vertical-align : middle;text-align:left;">{{ $item->serial_num }}</td>
                                                <td style="vertical-align : middle;text-align:left;">{{ $item->lokasi }}</td> --}}
                                                <td style="vertical-align : middle;text-align:right;">{{ format_uang($item->jumlah) }}</td>
                                            </tr>          
                                                                         
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td style="vertical-align : middle;text-align:right; color: blue;">Total</td>
                                                <td style="vertical-align : middle;text-align:right; color: blue;">{{ format_uang($total) }}</td>   
                                            </tr>  
                                        </tbody>
                                       <tfoot>
                                      
                                       </tfoot>
                                    </table>
                                    <span>Terbilang : {{ terbilang($pums->total) . " Rupiah" }}</span>
                                </div>
                            </div>
                            <div class="m-invoice__footer">
                                <div class="m-invoice__table  m-invoice__table--centered table-responsive">
                                    
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>File Upload :</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                            
                                            <tr>
                                                <td>
                                                    <div class="m-widget4">
                                                    @foreach ($pums->pjpumfiles as $item)
                                                    <div class="m-widget4__item">
                                                        <div class="m-widget4__info">
                                                            {{-- <span class="m-widget4__text"> --}}
                                                                <a href="{{ url('data_file/pdf/'.$item->filename) }}" target="_blank"><span class="m-widget4__text">  {{ $item->filename   }}</span></a>
                                                            {{-- </span> 							 		  --}}
                                                        </div>
                                                        <div class="m-widget4__ext" >
                                                            <a href="/pjpum/destroyfile/{{$item->id}}" class="m-widget4__icon delete-confirm">
                                                                <i class="la la-close"></i>
                                                                
                                                            </a>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    </div>
                                                </td>  
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer-script')
{{-- <script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}"
    type="text/javascript"></script> --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Anda Sudah Yakin?',
        text: 'Data Ini Akan Dihapus Secara Permanen !',
        icon: 'warning',
        buttons: ["Tidak", "Iya !"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
</script>
@endsection