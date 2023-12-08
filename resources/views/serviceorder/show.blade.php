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
                                            <h3>SERVICE ORDER (SO)</h3>
                                        </a>
                                        <a href="#">
                                          <img src="{{ url('data_file/'.$serviceorders->preference->image) }}" width="250px" alt="">  
                                        </a>
                                    </div>
                                    {{-- <span class="m-invoice__desc">
                                        <span>Cecilia Chapman, 711-2880 Nulla St, Mankato</span>
                                        <span>Mississippi 96522</span>
                                    </span> --}}
                                    <div class="m-invoice__items">
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">Vendor</span>
                                            <span class="m-invoice__text">{{ $serviceorders->vendor->namaperusahaan }},  {{ $serviceorders->vendor->badanusaha->kode }}</span>
                                            <span class="m-invoice__text">{{ $serviceorders->vendor->alamat }}</span>
                                            <span class="m-invoice__text">{{ $serviceorders->vendor->email }}</span>
                                            <span class="m-invoice__text">{{ $serviceorders->vendor->notelp }}</span>
                                        </div>
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">Pemesanan</span>
                                            <span class="m-invoice__text">{{ $serviceorders->preference->nama_perusahaan }}</span>
                                            <span class="m-invoice__text">{{ $serviceorders->preference->address }}</span>
                                            <span class="m-invoice__text">{{ $serviceorders->preference->email }}</span>
                                            <span class="m-invoice__text">{{ $serviceorders->preference->phone }}</span>
                                            {{-- <span class="m-invoice__text">{{ $serviceorders->no_do }}</span> --}}
                                        </div>                                       
                                    </div>

                                    <div class="m-invoice__items">
                                        <div class="m-invoice__item">
                                            <table class="table m-table table-responsive">
                                                <tr>
                                                    <td>Service Order</td>
                                                    <td>{{$serviceorders->no_so}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Nomor Kontrak</td>
                                                    <td>{{$serviceorders->no_kontrak}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Kontrak</td>
                                                    <td>{{  date("d-m-Y", strtotime($serviceorders->tgl_kontrak))}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="m-invoice__item">
                                            <table class="table m-table table-responsive">
                                                <tr>
                                                    <td>Waktu Pelaksanaan </td>
                                                    <td>{{  date("d-m-Y", strtotime($serviceorders->start_date))}} / {{  date("d-m-Y", strtotime($serviceorders->end_date))}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal</td>
                                                    <td>{{  date("d-m-Y", strtotime($serviceorders->tanggal))}}</td>
                                                </tr>
                                            </table>
                                            {{-- <span class="m-invoice__text">Waktu Pelaksanaan : {{  date("d-m-Y", strtotime($serviceorders->start_date))}} / {{  date("d-m-Y", strtotime($serviceorders->tgl_akhir))}}</span>
                                            <span class="m-invoice__text">Waktu Pengiriman : {{  date("d-m-Y", strtotime($serviceorders->tgl_pengiriman))}}</span> --}}
                                        </div>                                       
                                    </div>

                                    <div class="m-invoice__items">
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">Nama Pekerjaan</span>
                                            <span class="m-invoice__text">{{ $serviceorders->nama_pek }}</span>
                                        </div>
                                        {{-- <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">Tujuan Pengiriman</span>
                                            <span class="m-invoice__text">{{ $serviceorders->tujuan_pengiriman }}</span>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="m-invoice__body m-invoice__body--centered">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="vertical-align : middle;text-align:center;">No</th>
                                                <th style="vertical-align : middle;text-align:center;">Deskripsi</th>
                                                <th style="vertical-align : middle;text-align:center;">Qty</th>
                                                <th style="vertical-align : middle;text-align:center;">Satuan</th>
                                                <th style="vertical-align : middle;text-align:center;">serial_num</th>
                                                <th style="vertical-align : middle;text-align:center;">lokasi</th>                                                
                                                <th style="vertical-align : middle;text-align:center;">Catatan</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $no = 1 ;
                                        @endphp
                                        <tbody>
                                            @foreach ($serviceorders->sodetails as $item)                                                
                                            <tr>
                                                <td style="vertical-align : middle;text-align:center;">{{$no++}}</td>
                                                <td style="vertical-align : middle;text-align:left;">{{ $item->deskripsi }}</td>
                                                <td style="vertical-align : middle;text-align:center;">{{ number_format($item->qty) }}</td>                                                
                                                <td style="vertical-align : middle;text-align:center;">{{ $item->satuan }}</td>
                                                <td style="vertical-align : middle;text-align:left;">{{ $item->serial_num }}</td>
                                                <td style="vertical-align : middle;text-align:left;">{{ $item->lokasi }}</td>
                                                <td style="vertical-align : middle;text-align:left;">{{ $item->catatan }}</td>
                                            </tr>                                           
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="m-invoice__footer">
                                <div class="m-invoice__table  m-invoice__table--centered table-responsive">
                                    
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>File Upload :</th>
                                                {{-- <th>Penerima Barang</th>
                                                <th>Pemberi Perintah :</th>                                                --}}
                                            </tr>
                                        </thead>
                                        <tbody>                                            
                                            <tr>
                                                <td>
                                                    <div class="m-widget4">
                                                        @foreach ($serviceorders->sofiles as $item)
                                                            <div class="m-widget4__item">
                                                                {{-- <div class="m-widget4__img m-widget4__img--icon">							 
                                                                    <img src="assets/app/media/img/files/doc.svg" alt="">  
                                                                </div> --}}
                                                                <div class="m-widget4__info">
                                                                    {{-- <span class="m-widget4__text"> --}}
                                                                        <a href="{{ url('data_file/pdf/'.$item->filename) }}" target="_blank"><span class="m-widget4__text">  {{ $item->filename   }}</span></a>
                                                                    {{-- </span> 							 		  --}}
                                                                </div>
                                                                <div class="m-widget4__ext" >
                                                                    <a href="/so/destroyfile/{{$item->id}}" class="m-widget4__icon delete-confirm">
                                                                        <i class="la la-close"></i>
                                                                        
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                    </div>

                                                    {{-- @foreach ($serviceorders->sofiles as $item)
                                                    <a href="{{ url('data_file/pdf/'.$item->filename) }}" target="_blank"><span class="m-invoice__text">  {{ $item->filename }} <br></span></a>
                                                        @endforeach     --}}
                                                </td>  
                                                {{-- <td></td>                                                                                     
                                                <td style="font-size:14px">{{$serviceorders->preference->nama_perusahaan}}</td> --}}
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