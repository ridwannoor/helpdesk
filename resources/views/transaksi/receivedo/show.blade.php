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
        {{-- <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
            <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                <i class="la la-plus m--hide"></i>
                <i class="la la-ellipsis-h"></i>
            </a>
            <div class="m-dropdown__wrapper">
                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                <div class="m-dropdown__inner">
                    <div class="m-dropdown__body">
                        <div class="m-dropdown__content">
                            <ul class="m-nav">
                                <li class="m-nav__section m-nav__section--first m--hide">
                                    <span class="m-nav__section-text">Quick Actions</span>
                                </li>
                                <li class="m-nav__item">
                                <a href="/do/cetak/{{$bapm->id}}" target="_blank" class="m-nav__link">
                                    <i class="m-nav__link-icon flaticon-download"></i>
                                    <span class="m-nav__link-text">Download</span>
                                    </a>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

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
                                            <h3>GOOD RECEIVE</h3>
                                        </a>
                                        <a href="#">
                                            <img src="{{ url('data_file/'.$bapm->preference->image) }}" width="250px" alt="">  
                                          </a>
                                    </div>
                                    {{-- <span class="m-invoice__desc">
                                        <span>Cecilia Chapman, 711-2880 Nulla St, Mankato</span>
                                        <span>Mississippi 96522</span>
                                    </span> --}}
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
                                            {{-- <span class="m-invoice__text">{{ $bapm->no_do }}</span> --}}
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
                                            {{-- <span class="m-invoice__text">Waktu Pelaksanaan : {{  date("d-m-Y", strtotime($bapm->tgl_mulai))}} / {{  date("d-m-Y", strtotime($bapm->tgl_akhir))}}</span>
                                            <span class="m-invoice__text">Waktu Pengiriman : {{  date("d-m-Y", strtotime($bapm->tgl_pengiriman))}}</span> --}}
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
                                        {{-- <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">INVOICE TO.</span>
                                            <span class="m-invoice__text">Iris Watson, P.O. Box 283 8562 Fusce
                                                RD.<br>Fredrick Nebraska 20620</span>
                                        </div> --}}
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
                                                {{-- <th>Action</th> --}}
                                                {{-- <th><a href="#" class="addRow">Add More</a></th> --}}
                                                {{-- <th width='130px'>Action</th> --}}
                                            </tr>
                                            <tr>
                                                    <th style="vertical-align : middle;text-align:center;">Qty</th>
                                                    <th style="vertical-align : middle;text-align:center;">Catatan</th>
                                                    <th style="vertical-align : middle;text-align:center;">Qty Baik</th>
                                                    <th style="vertical-align : middle;text-align:center;">Qty Rusak</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $no = 1 ;
                                        @endphp
                                        <tbody>
                                            @foreach ($bapm->dodetails as $item)                                                
                                            <tr>
                                                <td style="vertical-align : middle;text-align:center;">{{$no++}}</td>
                                                <td style="vertical-align : middle;text-align:left;">{{ $item->hargabarang->nama_brg }}</td>                                                
                                                <td style="vertical-align : middle;text-align:center;">{{ $item->satuan }}</td>
                                                <td style="vertical-align : middle;text-align:center;">{{ $item->qty }}</td>                                               
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
                                        @foreach ($bapm->dofiles as $item)
                                        <div class="alert alert-success" role="alert">
                                        <a href="{{ url('data_file/pdf/'.$item->filename) }}" target="_blank"><span class="m-invoice__text">  {{ $item->filename   }}</span></a>
                                        </div>
                                       
                                        @endforeach
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