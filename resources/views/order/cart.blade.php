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
                    <a href="/orderlist" class="m-nav__link">
                        <span class="m-nav__link-text">{{ $judul }}</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="col-md-4">
            <form action="/orderlist/search" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="nama_brg" placeholder="Search for Nama Barang">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">Go!</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="align-right">
            <a href="/orderlist/cart" class="btn btn-success m-btn m-btn--icon m-btn--pill m-btn--air">
                <span>
                    <i class="fa flaticon-shopping-basket"></i>
                    <span>Keranjang</span>
                    <span class="m-menu__link-badge"><span class="m-badge m-badge--danger">{{ $counts }}</span></span></span>
                    {{-- <span class="m-menu__link-badge"><span class="m-badge m-badge--danger">{{ count((array) session('cart')) }}</span></span></span> --}}
            </a>
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
                        <div class="m-invoice__wrapper">                           
                            
                            <div class="m-invoice__head"
                                style="background-image: url(assets/app/media/img/logos/bg-6.html);">
                                <div class="m-invoice__container">
                                    <div class="m-invoice__logo">
                                        {{-- <a href="#"> --}}
                                            <h5 class="pull-right">E-LOGISTIK CART</h5>
                                        {{-- </a> --}}
                                        {{-- <a href="#">
                                            <img src="assets/app/media/img/logos/logo_client_color.png">
                                        </a> --}}
                                    </div>
                                    <span class="m-invoice__desc">
                                        @foreach ($pref as $item)
                                        <span>{{ $item->nama_perusahaan }}</span>
                                        <span>{{ $item->email }}</span>
                                        @endforeach
                                        
                                    </span>
                                    <div class="m-invoice__items">
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">Tanggal</span>
                                            <span class="m-invoice__text">{{  date("d-m-Y", strtotime( $ldate))  }}</span>
                                        </div>
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">INVOICE NO.</span>
                                            <span class="m-invoice__text">{{ $noUrutAkhir }}</span>
                                        </div>
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">PERMINTAAN HARGA </span>
                                                <span class="m-invoice__text">To : {{ Auth::user()->name }} </span>
                                                <span class="m-invoice__text">Lokasi : {{ Auth::user()->lokasis->implode('kode', ', ') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-invoice__body ">
                                
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>DESCRIPTION</th>
                                                <th>HARGA</th>
                                                <th style="text-align:center" >QTY</th>
                                                <th>JUMLAH</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php $total = 0 ?>
                                            @foreach ($carts as $item)
                                            <form action="/orderlist/cart/update" id="update-cart" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <input type="hidden" name="_method" value="PUT" />
                                                <input type="hidden" name="id" value="{{$item->id}}" />
                                                </div>
                                            <?php $total = $item->hargabarang->harga * $item->qty ?>
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <img src="{{ url('data_file/'.$item->hargabarang->image) }}" alt="image" width="100px">
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <p>{{ $item->hargabarang->nama_brg }}</p>
                                                            <p>{{ $item->hargabarang->vendor->namaperusahaan }}, {{ $item->hargabarang->lokasi->kode }} </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="text-align:center">{{ "Rp ". number_format($item->hargabarang->harga)  }}</td>
                                                <td style="text-align:center" width = '70px'>
                                                    <input type="number" class="form-control" name="qty" value="{{ $item->qty }}">
                                                </td>
                                                <td>{{ "Rp ". number_format($total) }}</td>
                                                <td>
                                                    <button id="update-cart" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" type="submit"><i class="flaticon-refresh"></i></button>
                                                    <a href="/orderlist/cartdestroy/{{ $item->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-id = "remove-from-cart"><i class="flaticon-delete"></i></a>
                                                 </td>
                                            </tr>
                                            </form>
                                            @endforeach
                                        </tbody>
                                       
                                    </table>
                                </div>
                                <hr>
                                <a href="/orderlist"  class="btn btn-primary"><i class="flaticon-bag"></i> Continue Shopping</a>
                                <a href="/orderlist/cart/detail"  class="btn btn-success pull-right"><i class="flaticon-download"></i> Submit</a>
                               
                            </div>
                            <div class="m-invoice__footer">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- END EXAMPLE TABLE PORTLET-->
</div>
@endsection

@section('footer-script')
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}"
    type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/wizard/wizard.js" type="text/javascript')}}"></script>
<script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-touchspin.js') }}"
    type="text/javascript"></script>
    
@endsection