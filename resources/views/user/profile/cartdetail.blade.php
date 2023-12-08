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
    @include('component.alertnotification')

    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="m-portlet m-portlet--full-height  ">
                <div class="m-portlet__body">
                    @include('user.profile.navprofile') 
                   
                 
                  
                </div>			
            </div>	
        </div>
        <div class="col-xl-9 col-lg-8">
            <div class="m-portlet m-portlet--full-height">
                <div class="m-portlet__head">
                    {{-- <div class="m-portlet__nav"> --}}
                        {{-- <ul class="m-portlet__nav">                            
                            <li class="m-portlet__nav-item">
                                <a href="/user/cartlist" class="m-portlet__nav-link m-portlet__nav-link--icon" data-direction="left" data-width="auto" title="Cetak" target="_blank" >
                                    <i class="flaticon-reply m--icon-font-size-lg3"></i>
                                </a>	
                            </li>	
                        </ul>     --}}
                        {{-- <h3 class="m-portlet__head-text"> --}}
                            {{-- {{ $judul }} --}}
                            {{-- <a href="/user/cartlist"><i class="flaticon-reply"></i> Back</a> --}}
                        {{-- </h3> --}}
                    {{-- </div> --}}
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">       
                            <li class="m-portlet__nav-item">
                                <a href="/user/cartlist"  data-toggle="m-tooltip" class="m-portlet__nav-link m-portlet__nav-link--icon" data-direction="left" data-width="auto" title="Back">
                                    <i class="flaticon-reply m--icon-font-size-lg3"></i>
                                </a>	
                            </li>	                     
                            <li class="m-portlet__nav-item">
                                <a href="/cartlist/cetak/{{ $carts->id }}" data-toggle="m-tooltip" class="m-portlet__nav-link m-portlet__nav-link--icon" data-direction="left" data-width="auto" title="Cetak" target="_blank" >
                                    <i class="flaticon-technology m--icon-font-size-lg3"></i>
                                </a>	
                            </li>	
                        </ul>    
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="row">
                        <div class="col-md-4">
                            <h6>No Order</h6>
                            <p>{{ $carts->no_order }}</p>
                        </div>
                        <div class="col-md-4">
                            <h6>Tanggal</h6>
                            <p>{{ $carts->tanggal }}</p>
                        </div>
                    </div>
                    {{-- <table class="table table-striped- table-bordered table-hover table-checkable">
                    
                        <tbody>
                            <td>No Order</td>
                            <td>{{ $carts->no_order }}</td>
                        </tbody>
                        <tbody>
                            <td>Tanggal</td>
                            <td>{{ $carts->tanggal }}</td>
                        </tbody>
    
                   </table>     --}}
                   <hr>
                   <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1_wrapper">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                   <tbody>
                       @foreach ($carts->orderdetails as $item)
                       {{-- @foreach ($item->orderdetails as $k) --}}
                           
                       {{-- @endforeach --}}
                           <tr>
                               <td>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="{{ url('data_file/'.$item->hargabarang->image) }}" alt="image" width="70px">
                                    </div>
                                    <div class="col-sm-9">
                                        {{ $item->hargabarang->nama_brg }}
                                    </div>
                                </div>   
                                </td>
                               <td>{{ "Rp ". number_format($item->harga)  }}</td>
                               <td>{{ $item->qty }}</td>
                               <td>{{ "Rp ". number_format($item->subtotal)  }}</td>
                               {{-- <td>{{ $item->qty }}</td> --}}
                           </tr>
                       @endforeach
                   </tbody>
                   {{-- <tfoot>
                       {{ $pag->links() }}
                    </tfoot>     --}}
               </table>
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