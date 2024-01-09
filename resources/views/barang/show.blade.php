@extends('layouts.app2')

@section('m-subheader')
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">{{ $judul }}</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="/home" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="/barang" class="m-nav__link">
                        <span class="m-nav__link-text">{{ $judul }}</span>
                    </a>
                </li>
                
            </ul>
        </div>
        <div>
            <div class="align-right">
                <a href="/barang" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                    <i class="la la-plus m--hide"></i>
                    <i class="la la-undo"> Back</i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('m-content')
<div class="m-content">
        @include('component.alertnotification')
        <!--begin::Portlet-->
        
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            {{ $judul }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#" data-target="#m_tabs_1_1">Details</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link " data-toggle="tab" href="#m_tabs_1_2">Maintenance</a>
                    </li>
                    @if ($brg->kondisi == "baik")
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#m_tabs_1_3">Mutasi</a>
                        </li>
                    @endif                   
                </ul>                    

                <div class="tab-content">
                    <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                        <div class="row">
                        <div class="col-8">
                        <table class="table table-striped- table-bordered table-hover table-checkable">
                            <thead>
                                {{-- <th></th> --}}
                            </thead>
                            <tbody>
                                <td>No Asset Barang</td>
                                <td>{{ $brg->asset_id }}</td>
                            </tbody>
                            <tbody>
                                <td>Nama Barang</td>
                                <td>{{ $brg->nama_brg }}</td>
                            </tbody>
                            <tbody>
                                <td>Tgl Pembelian</td>
                                <td>{{ date('d-m-Y', strtotime($brg->tgl_pembelian))  }}</td>
                            </tbody> 
                            <tbody>
                                <td>Tipe / Serial Number</td>
                                <td>{{$brg->tipe  }}</td>
                            </tbody> 
                            <tbody>
                                <td>Merk</td>
                                <td>{{$brg->merk  }}</td>
                            </tbody> 
                            <tbody>
                                <td>Category</td>
                                <td>{{ $brg->category  }}</td>
                            </tbody> 
                            <tbody>
                                <td width="300px">Qty</td>
                                <td>{{ $brg->aset_tag }}</td>
                            </tbody>
                            
                            <tbody>
                                <td>Harga (/unit)</td>
                                <td>{{ "Rp " . format_uang($brg->serial)  }}</td>
                            </tbody>
                            <tbody>
                                <td>Garansi</td>
                                <td>{{ date('d-m-Y', strtotime($brg->start_date)) . " s/d " . date('d-m-Y', strtotime($brg->end_date)) }}</td>
                            </tbody>
                            <tbody>
                                <td>Toko Pembelian</td>
                                <td>{{ $brg->vendor->namaperusahaan . ", " . $brg->vendor->badanusaha->kode }}</td>
                            </tbody>
                            <tbody>
                                <td>Lokasi Pembelian</td>
                                <td>{{ $brg->lokasi->kode }}</td>
                            </tbody>
                            <tbody>
                                <td>Lokasi Terakhir</td>
                                <td>
                                @foreach ($brg->barangmutasi as $item)
                                @if ($loop->last)
                                {{  $item->lokasi->kode  }}
                                @endif
                                      {{-- {{  $item->lokasi->kode  }} --}}
                                @endforeach
                                </td>
                            </tbody>
                            {{-- <tbody>
                                <td>Tahun Perolehan</td>
                                <td>{{ $brg->tahun_perolehan }}</td>
                            </tbody> --}}
                            <tbody>
                                <td>Kondisi</td>
                                <td>
                                    @if ($brg->kondisi == "baik")
                                    <span class="m-badge m-badge--primary m-badge--wide">Baik</span>
                                    @else
                                    <span class="m-badge m-badge--danger m-badge--wide">Rusak</span>
                                    @endif    
                                </td>
                            </tbody>  
                            <tbody>
                                <td>Catatan</td>
                                <td>{{ $brg->catatan }}</td>
                            </tbody>     
                            <tbody>
                                <td>File </td>
                                <td>
                                    <div class="m-widget4"> 
                                        @foreach ($brg->barangdetail as $item)
                                        <div class="m-widget4__item">
                                            {{-- <div class="m-widget4__img m-widget4__img--icon">							 
                                                <img src="assets/app/media/img/files/doc.svg" alt="">  
                                            </div> --}}
                                            <div class="m-widget4__info">
                                                {{-- <span class="m-widget4__text"> --}}
                                                    <a href="{{ url('data_file/pdf/'.$item->filename) }}" target="_blank"><span class="m-widget4__text">  {{ $item->filename }}</span></a>
                                                {{-- </span> 							 		  --}}
                                            </div>
                                            <div class="m-widget4__ext" >
                                                <a href="/barang/destroyfile/{{$item->id}}" class="m-widget4__icon delete-confirm">
                                                    <i class="la la-close"></i>
                                                    
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach  
                                        </div>        
                                </td>
                            </tbody>       
                            {{-- <tbody>
                                <td></td>
                            <td><div class="m-widget4"> 
                                @foreach ($brg->barangmutasi as $item)
                                <div class="m-widget4__item">
                                    <div class="m-widget4__info">
                                            <a href="{{ url('data_file/'.$item->image) }}" target="_blank"><span class="m-widget4__text">  {{ $item->image }}</span></a>
                                    
                                    </div>
                                    <div class="m-widget4__ext" >
                                        <a href="/barang/destroyfile/{{$item->id}}" class="m-widget4__icon delete-confirm">
                                            <i class="la la-close"></i>
                                            
                                        </a>
                                    </div>
                                </div>
                                @endforeach  
                                </div>    
                            </td>
                            </tbody>        --}}
                       </table>  
                    </div>
                    <div class="col-4">
                        <img src="{{ url('data_file/'.$brg->image) }}" width="100%">
                    </div>
                </div>
                    </div>
                    <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
                        <div class="content">
                            <a href="/barang/addmaintenance/{{ $brg->id }}" class="btn btn-primary">Add Maintenance</a>
                            {{-- <button class="btn btn-primary ">Add Maintenance</button> --}}
                        </div>
                        <br>
                        
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1_wrapper">
                            <thead>
                                <tr>
                                    {{-- <th>No</th> --}}
                                    <th>Nama Barang</th>
                                    <th>Vendor</th>
                                    <th>Tipe Maintenance</th>
                                    <th>Title</th>
                                    <th>Start Date</th>
                                    <th>Complete Date</th>
                                    <th>Biaya</th>
                                    <th>Catatan</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            {{-- @php
                                $no = 1 ;
                            @endphp --}}
                            <tbody>
                                  @foreach ($brg->barangmaintenance as $item)
                                      <tr>
                                          <td>{{ $item->barang->nama_brg }}</td>
                                          <td>{{ $item->namaperusahaan }}</td>
                                          <td>{{ $item->tipemaintenance->kode }}</td>
                                          <td>{{ $item->title }}</td>
                                          <td>{{ $item->start_date }}</td>
                                          <td>{{ $item->complete_date }}</td>
                                          <td>{{ $item->biaya }}</td>
                                          <td>{{ $item->catatan }}</td>
                                          <td>
                                            <a href="/barang/editmaintenance/{{ $item->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-edit"></i></a>
                                            <a href="/barang/destroymaintenance/{{ $item->id }}" onclick="return confirm('Are you sure? Delete ')" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-delete"></i></a>
                                        </td>
                                      </tr>
                                  @endforeach
                            </tbody>
            
                        </table>  
                    </div>

                    <div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
                        <div class="content">
                            <a href="/barang/mutasi/{{ $brg->id }}" class="btn btn-primary">Add Mutasi</a>
                            {{-- <button class="btn btn-primary ">Add Maintenance</button> --}}
                        </div>
                        <br>
                        
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1_wrapper">
                            <thead>
                                <tr>
                                    {{-- <th>No</th> --}}
                                    <th>Nama Barang</th>
                                    <th>lokasi</th>
                                    <th>Checkout Date</th>
                                    <th>Expected Checkin Date</th>
                                    <th>Catatan</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            {{-- @php
                                $no = 1 ;
                            @endphp --}}
                            <tbody>
                                  @foreach ($brg->barangmutasi as $item)
                                      <tr>
                                          <td>
                                              <div class="row">
                                              <div class="col-lg-3">
                                                <img src="{{ url('data_file/'.$item->image) }}" height="50px" alt="">
                                              </div>
                                              <div class="col-lg-9">
                                              {{ $item->barang->nama_brg }}
                                            </div>
                                        </div>
                                            </td>
                                          <td>{{ $item->lokasi->kode }}</td>
                                          <td>{{ $item->checkout_date }}</td>
                                          <td>{{ $item->expected_checkin_date }}</td>
                                          <td>{{ $item->catatan }}</td>
                                          <td>
                                            <a href="/barang/editmutasi/{{ $item->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-edit"></i></a>
                                            <a href="/barang/destroymutasi/{{ $item->id }}" onclick="return confirm('Are you sure? Delete ')" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-delete"></i></a>
                                        </td>
                                      </tr>
                                  @endforeach
                            </tbody>
            
                        </table>  
                    </div>
                </div>      
            </div>
        </div>
   
     
        <!--end::Portlet-->

       
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
@endsection

@section('footer-script')
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}" type="text/javascript"></script>
@endsection