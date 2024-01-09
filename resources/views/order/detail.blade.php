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

                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="/orderlist" class="m-nav__link">
                        <span class="m-nav__link-text">{{ $judul1 }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-4">
            {{-- <form action="/orderlist/search" method="GET"> --}}
                <div class="input-group">
                    <input type="text" class="form-control" name="nama_brg" placeholder="Search Barang..">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">Go!</button>
                    </div>
                </div>
            {{-- </form> --}}
        </div>

         <div class="align-right">
            <a href="/orderlist/cart" class="btn btn-success m-btn m-btn--icon m-btn--pill m-btn--air">
                <span>
                    <i class="fa flaticon-shopping-basket"></i>
                    <span>Keranjang</span>
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
        <div class="col-md-12">
            <div class="m-portlet m-portlet--tab">
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
                <div class="m-portlet__body">
                    <!--begin::Section-->
                    <div class="m-section">
                        {{-- <span class="m-section__sub">
                        Metronic's Stack allows building an equal height flexbile blocks easily:  
                        </span> --}}
                        {{-- <div class="m-section__content"> --}}
                            {{-- @foreach ($brgs as $item) --}}
                            <div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
                                {{-- <div class="m-demo__preview"> --}}
                                    <div class="m-stack m-stack--ver m-stack--general m-stack--demo">
                                        {{-- @foreach ($groups as $i) --}}
                                        {{-- @foreach ($item as $i) --}}
                                   
                                        {{-- @endforeach --}}
                                       
                                        {{-- @endforeach --}}

                                      
                                        @foreach ($groups as $i)
                                        {{-- @foreach ($item as $i) --}}
                                        <div class="m-stack__item">
                                            @foreach ($i as $item)
                                            {{ $item->nama_brg }}
                                            @endforeach
                                        </div>
                                        {{-- @endforeach --}}
                                       
                                        @endforeach

                                        <div class="m-stack__item" style="width: 200px;">
                                            {{-- @foreach ($i as $item) --}}
                                            <img src="{{ url('data_file/'.$item->image) }}" width="100%" alt="image">
                                            {{-- @endforeach --}}
                                        </div>
                                        
                                    </div>
                                {{-- </div> --}}
                            </div>
                            {{-- @endforeach --}}
                            
                        {{-- </div> --}}
    
                        <span class="m-section__sub">
                            TOKO ONLINE YANG MENJUAL {{ $item->nama_brg }} 
                        </span>
                        <div class="m-section__content">
                            <div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
                                {{-- <div class="m-demo__preview"> --}}
                                    @foreach ($brgs as $item)
                                    <div class="m-stack m-stack--ver m-stack--general m-stack--demo">
                                        <div class="m-stack__item m-stack__item--left m-stack__item--middle">
                                            <div class="row">
                                                <div class="col-md-6">
                                                  <strong> {{ $item->namaperusahaan }}, 
                                                    {{ $item->lokasi->kode }}</strong> <br>
                                                    {{ $item->nama_brg }}
                                                </div>
                                                {{-- <div class="col-md-8">
                                                    {{ $item->nama_brg }}
                                                </div> --}}
                                                <div class="col-md-3">
                                                 <strong style="font-size: 15px">{{ "Rp ". number_format($item->harga) }}</strong>   
                                                </div>
                                                <div class="col-md-3">
                                                    <form action="/orderlist/detail/save" method="POST">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                        <input type="hidden" name="_method" value="POST" />                                                       
                                                        <input type="hidden" name="id" value="{{ $item->id }}" />
                                                        <input type="hidden" name="qty" value="1" />
                                                        {{-- <input type="hidden" name="harga" value="{{ $item->id }}" />    --}}
                                                        <button type="submit" class="btn m-btn--pill btn-primary"><span>
                                                            <i class="fa flaticon-cart"></i>
                                                            <span>Masukkan Keranjang</span>
                                                        </span></button>
                                                    </form>
                                                    {{-- <button class="btn m-btn--pill btn-primary"></button> --}}
                                                    {{-- <strong style="font-size: 15px">{{ "Rp ". number_format($item->harga) }}</strong>    --}}
                                                </div>
                                            </div>                                           
                                        </div>
                                        {{-- <div class="m-stack__item m-stack__item--center m-stack__item--middle" style="width: 100px;">{{"Rp ". $item->harga }}</div>                                         --}}
                                    </div>
                                    @endforeach
                                {{-- </div> --}}
                            </div>
                        </div>                       
                    </div>
                    <!--end::Section-->
                </div>
            </div>
        </div>
    
    </div>
    <div class="col-md-12">
        {{-- <div class="align-right"> --}}
        {{-- <div class="btn-group btn-group-lg" role="group" aria-label="Large button group"> --}}
        {{-- <span>{{ $brgs->links() }}</span> --}}
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