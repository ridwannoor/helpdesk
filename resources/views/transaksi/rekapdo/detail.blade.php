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
            <div class="m-portlet m-portlet--head-sm">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon">
                                <i class="flaticon-share"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                               {{ $judul }}
                            </h3>
                        </div>			
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="#"  m-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon"><i class="la la-angle-down"></i></a>	
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="m-portlet__body ">
                    <div class="m-scrollable" data-scrollable="true" data-height="280" data-mobile-height="300">
                        <!--Begin::Timeline 2 -->
                        <div class="m-timeline-2">
                            <div class="m-timeline-2__items  m--padding-top-25 m--padding-bottom-30">
                                <div class="m-timeline-2__item">
                                   
                                    <div class="m-timeline-2__item-cricle">									 
                                        <i class="fa fa-genderless m--font-danger"></i>									 
                                    </div>
                                    <div class="m-timeline-2__item-text  m--padding-top-5">
                                        @if ($bapm->tanggal)
                                        {{  date("d-m-Y", strtotime($bapm->tanggal))}}
                                        @endif 
                                        <br>
                                        <span>{{ $bapm->no_do }}</span>  
                                        <br>
                                        {{ $bapm->perihal }}                                             	                                	              
                                    </div>
                                </div>
                                <div class="m-timeline-2__item m--margin-top-30">
                                 
                                    <div class="m-timeline-2__item-cricle">																		 
                                        <i class="fa fa-genderless m--font-brand"></i>									 
                                    </div>
                                    <div class="m-timeline-2__item-text m--padding-top-5">
                                        @if ($bapm->tanggal_sampai)
                                        {{  date("d-m-Y", strtotime($bapm->tanggal_sampai))}}
                                        @endif 
                                        <br>
                                       {{ $bapm->ket_pengiriman }}
                                    </div>
                                </div>
                                <div class="m-timeline-2__item m--margin-top-30">
                                  <div class="m-timeline-2__item-cricle">																		 
                                        <i class="fa fa-genderless m--font-warning"></i>									 
                                    </div>
                                    <div class="m-timeline-2__item-text m--padding-top-5">
                                        @if ($bapm->tanggal_terima)
                                        {{  date("d-m-Y", strtotime($bapm->tanggal_terima))}}
                                        @endif 
                                        <br>
                                       Dikonfirmasi Good Receive                                                         	                                
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!--End::Timeline 2 -->
                    </div>
                    <div class="m-invoice-2">
                        <div class="m-invoice__wrapper">
                            <div class="m-invoice__head"
                                style="background-image: url(assets/app/media/img/logos/bg-6.html);">
                                <div class="m-invoice__container m-invoice__container--centered">
                                    <div class="m-invoice__logo">                                      
                                       
                                        <a href="#">
                                            <h3>Rekap DO</h3>
                                        </a>
                                        <a href="#">
                                            <img src="{{ url('data_file/'.$bapm->preference->image) }}" width="250px" alt="">  
                                          </a>
                                    </div>
                                    <div class="m-invoice__items">
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">Vendor</span>
                                            <span class="m-invoice__text">{{ $bapm->vendor->namaperusahaan }}</span>
                                            <span class="m-invoice__text">{{ $bapm->vendor->alamat }}</span>
                                            <span class="m-invoice__text">{{ $bapm->vendor->email }}</span>
                                            <span class="m-invoice__text">{{ $bapm->vendor->no_telp }}</span>
                                        </div>
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">Pemesanan</span>
                                            <span class="m-invoice__text">{{ $bapm->preference->nama_perusahaan }}</span>
                                            <span class="m-invoice__text">{{ $bapm->preference->address }}</span>
                                            <span class="m-invoice__text">{{ $bapm->preference->email }}</span>
                                            <span class="m-invoice__text">{{ $bapm->preference->phone }}</span>
                                        </div>                                       
                                    </div>

                                    <div class="m-invoice__items">
                                        <div class="m-invoice__item">
                                            <table class="table m-table table-responsive">
                                                <tr>
                                                    <td>Delivery Order</td>
                                                    <td>{{$bapm->no_do}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Ref PO No</td>
                                                    <td>{{$bapm->ref_po}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal</td>
                                                    <td>{{  date("d-m-Y", strtotime($bapm->tanggal))}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="m-invoice__item">
                                            <table class="table m-table table-responsive">
                                                <tr>
                                                    <td>Waktu Pelaksanaan </td>
                                                    <td>{{  date("d-m-Y", strtotime($bapm->tgl_mulai))}} / {{  date("d-m-Y", strtotime($bapm->tgl_akhir))}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Waktu Pengiriman </td>
                                                    <td>{{  date("d-m-Y", strtotime($bapm->tgl_pengiriman))}}</td>
                                                </tr>
                                            </table>
                                        </div>                                       
                                    </div>

                                    <div class="m-invoice__items">
                                        <div class="m-invoice__item">
                                            <table class="table m-table table-responsive">
                                                <tr>
                                                    <td>Tanggal Kirim</td>
                                                    <td>
                                                        {{  date("d-m-Y", strtotime($bapm->tanggal_sampai))}}      
                                                     </td>
                                                </tr>
                                                <tr>
                                                    <td>Keterangan</td>
                                                    <td>{{$bapm->ket_pengiriman}}</td>
                                                </tr>                                               
                                            </table>
                                        </div>                                                                         
                                    </div>

                                    <div class="m-invoice__items">
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">Lokasi Pengambilan</span>
                                            <span class="m-invoice__text">{{ $bapm->lokasi_pengambilan }}</span>
                                        </div>
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">Tujuan Pengiriman</span>
                                            <span class="m-invoice__text">{{ $bapm->tujuan_pengiriman }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-invoice__body m-invoice__body--centered">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" style="vertical-align : middle;text-align:center;">No</th>
                                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Material</th>
                                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Satuan</th>
                                                <th colspan="2" style="vertical-align : middle;text-align:center;">Pengiriman</th>                                                    
                                                <th colspan="2" style="vertical-align : middle;text-align:center;">Penerimaan</th>
                                            </tr>
                                            <tr>
                                                    <th style="vertical-align : middle;text-align:center;">Qty</th>
                                                    <th style="vertical-align : middle;text-align:center;">Catatan</th>
                                                    <th style="vertical-align : middle;text-align:center;">Qty</th>
                                                    <th style="vertical-align : middle;text-align:center;">Catatan</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $no = 1 ;
                                        @endphp
                                        <tbody>
                                            @foreach ($bapm->dodetails as $item)                                                
                                            <tr>
                                                <td style="vertical-align : middle;text-align:center;">{{$no++}}</td>
                                                <td style="vertical-align : middle;text-align:left;">{{  $item->hargabarang->nama_brg }}</td>                                                
                                                <td style="vertical-align : middle;text-align:center;">{{ $item->satuan }}</td>
                                                <td style="vertical-align : middle;text-align:center;">{{ number_format($item->qty) }}</td>                                               
                                                <td style="vertical-align : middle;text-align:left;">{{ $item->catatan }}</td>
                                                <td style="vertical-align : middle;text-align:center;">{{ $item->qty_baik . " baik" }}</td>
                                               <td style="vertical-align : middle;text-align:center;">{{ $item->qty_rusak . " rusak" }}</td>
                                            </tr>
                                           
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <div class="m-invoice__items">
                                    <div class="m-invoice__item">
                                        <span class="m-invoice__subtitle">File Upload</span><br>
                                        <div class="m-widget4">
                                            @foreach ($bapm->dofiles as $item)
                                                <div class="m-widget4__item">
                                                    <div class="m-widget4__info">
                                                            <a href="{{ url('data_file/pdf/'.$item->filename) }}" target="_blank"><span class="m-widget4__text" style="color: black">  {{ $item->filename   }}</span></a>
                                                        {{-- </span> 							 		  --}}
                                                    </div>
                                                    <div class="m-widget4__ext" >
                                                        <a href="/receivedo/destroyfile/{{$item->id}}" class="m-widget4__icon delete-confirm">
                                                            <button class="btn m-btn--pill m-btn--air btn-outline-danger "><i class="la la-close"></i></button>
                                                            
                                                        </a>
                                                    </div>
                                                </div>
                                                @endforeach
                                        </div>
                                    </div>                                                                 
                                </div>
                            </div>

                           

                            <div class="m-invoice__footer">
                                <div class="m-invoice__table  m-invoice__table--centered table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Diterima Oleh :</th>
                                                <th>Penerima Barang</th>
                                                <th>Pemberi Perintah :</th>                                               
                                            </tr>
                                        </thead>
                                        <tbody>                                            
                                            <tr>
                                                <td>{{$bapm->vendor->namaperusahaan}}</td>  
                                                <td></td>                                                                                     
                                                <td style="font-size:14px">{{$bapm->preference->nama_perusahaan}}</td>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('assets/demo/default/custom/crud/wizard/wizard.js') }}" type="text/javascript"></script>
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