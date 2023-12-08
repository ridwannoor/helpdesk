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
                    <input type="text" class="form-control" name="nama_brg" placeholder="Search Barang..">
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

                    {{-- <span class="m-menu__link-badge"><span class="m-badge m-badge--danger">{{ count((array) session('cart')) }}</span></span></span>
                --}}
                <span class="m-menu__link-badge"><span
                        class="m-badge m-badge--danger">{{ $counts }}</span></span></span>
            </a>
        </div>
    </div>
</div>
@endsection

@section('m-content')
<div class="m-content">
    @include('component.alertnotification')

    <div class="row">
        @foreach ($brgs as $item)
            {{-- @foreach ($item->hargabarangs as $brg) --}}
            <div class="col-md-3">
                <div class="card m-portlet">
                    <form action="/orderlist/detail" method="get" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="nama_brg" value="{{ $item->nama_brg }}" /> 
                        <div class="card-body">
                            <h6 class="card-title">{{ $item->nama_brg  }}</h6>
                            <button class="btn btn-success" type="submit"><i class="flaticon-home"> Cek Toko</i></button>
                            {{-- <a href="/orderlist/{{ $item->nama_brg }}" class="btn btn-success"><i class="flaticon-home"> Cek Toko</i></a> --}}
                            
                        </div>

                    </form>
                    {{-- <form action="/orderlist/addtocart" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="POST" /> --}}
                        {{-- <input type="hidden" name="nama_brg" value="{{ $item->nama_brg }}" />  --}}
                        {{-- {{-- <img class="card-img-top" src="{{ url('data_file/'.$item->image) }}" alt="Image"> --}} 
                        {{-- <div class="card-body"> --}}
                            {{-- @foreach ($item as $brg ) --}}
                                {{-- <h6 class="card-title">{{ $item->nama_brg  }}</h6> --}}
                            {{-- @endforeach --}}
                            {{-- <a href="/orderlist/{{ $item->nama_brg }}" class="btn btn-success"><i class="flaticon-home"> Cek Toko</i></a> --}}
                            
                            {{-- <p>{{ $item->harga }}</p> --}}
                            {{-- <h6 class="card-title">{{ $item }}</h6> --}}
                            {{-- <button class="btn btn-success" type="submit"><i class="flaticon-home"> Cek Toko</i></button> --}}
                            {{-- <div class="m-accordion m-accordion--default m-accordion--toggle-arrow" id="m_accordion_5" role="tablist">   
                            <div class="m-accordion__item m-accordion__item--info">
                                <div class="m-accordion__item-head collapsed" srole="tab" id="m_accordion_5_item_1_head" data-toggle="collapse" href="#m_accordion_5_item_1_body" aria-expanded="  false">
                                    <span class="m-accordion__item-icon"><i class="fa flaticon-home"></i></span>
                                    <span class="m-accordion__item-title">Cek Toko</span>
                                        
                                    <span class="m-accordion__item-mode"></span>     
                                </div>
        
                                <div class="m-accordion__item-body collapse" id="m_accordion_5_item_1_body" class=" " role="tabpanel" aria-labelledby="m_accordion_5_item_1_head" data-parent="#m_accordion_5"> 
                                    <div class="m-accordion__item-content">
                                        <p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            </div> --}}
                            {{-- <p class="card-text"><span>Dimulai dari : {{ "Rp ". number_format($item->harga)  }}</span></p> --}}
                            {{-- <p class="card-text">{{ $item->vendor->namaperusahaan }}, {{ $item->lokasi->kode }}</p> --}}
                            {{-- <button class="btn btn-success" class="form-control" type="submit"><i class="flaticon-cart"> Cek Toko</i></button> --}}
                            {{-- <div class="btn-group">
                                <input type="number" class="form-control" name="qty" value="1">
                                <button class="btn btn-success" type="submit"><i class="flaticon-cart"></i></button>
                            </div> --}}
                        {{-- </div> --}}
                            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    {{-- </form> --}}
                </div>
            </div>
            {{-- @endforeach         --}}
        @endforeach
    </div>
<div class="col-md-12">
    {{-- <div class="align-right"> --}}
    {{-- <div class="btn-group btn-group-lg" role="group" aria-label="Large button group"> --}}
    <span>{{ $brgs->links() }}</span>
    {{-- <button type="button" class="btn btn-outline-success">{{ $brgs->links() }}</button> --}}
    {{-- </div> --}}
    {{-- <span>{{ $brgs->links() }}</span> --}}
    {{-- </div> --}}
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