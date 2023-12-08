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

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        {{ $judul }}
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                       
                        @if ($crud->create == 1) 
                        <a href="/hargabarang/add" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                            <span>
                                <i class="la la-plus"></i>
                                <span>New record</span>
                            </span>
                        </a>
                        @endif  
                    </li>
                    <li class="m-portlet__nav-item"></li>
                    
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
        <form class="m-form m-form--fit m--margin-bottom-20" action="/hargabarang/search" method="GET">
            <div class="row m--margin-bottom-20">
				<div class="col-lg-4 m--margin-bottom-10-tablet-and-mobile">
					<label>Nama Barang:</label>
					<input type="text" class="form-control m-input" name="nama_brg" data-col-index="0">
				</div>
				<div class="col-lg-4 m--margin-bottom-10-tablet-and-mobile">
					<label>Vendor:</label>
					<select class="form-control m-input" name="vendor_id" data-live-search="true" data-col-index="2">
                        <option value="">Please Select</option>
                        @foreach ($vendors as $item)
                            <option value="{{$item->id}}">{{$item->namaperusahaan}}</option>
                        @endforeach					
					</select>
				</div>
				<div class="col-lg-4 m--margin-bottom-10-tablet-and-mobile">
					<label>Lokasi:</label>
					<select class="form-control m-input" name="lokasi_id" data-live-search="true" data-col-index="2">
                        <option value="">Please Select</option>
                        @foreach ($lokasis as $item)
                            <option value="{{$item->id}}">{{$item->kode}}</option>
                        @endforeach					
					</select>
				</div>
			</div>


            <div class="m-separator m-separator--md m-separator--dashed"></div>
            
            <div class="row">
				<div class="col-lg-12">
                    <div class="btn-group">
                        <input type="submit" value="Search" class="btn btn-brand m-btn m-btn--icon">
                        <a href="/hargabarang" class="btn btn-secondary m-btn m-btn--icon">Reset</a>
                    </div>
					
				</div>
            </div>
            <div class="m-separator m-separator--md m-separator--dashed"></div>
        </form> 
            {{-- <div class="row"> --}}
                <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1_wrapper">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Harga Lama</th>
                            <th>Harga Baru</th>
                            <th>Vendor</th>
                            <th>Lokasi</th>
                            <th>Tanggal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @php
                        $no = 1 ;
                    @endphp
                    <tbody>
                     
                        @foreach ($hargabrgs as $item)     
                        {{-- @foreach ($item->hargabarang as $hargabrg) --}}
                        {{-- @if () --}}
                        <tr>                        
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nama_brg }}</td>
                            <td>{{ $item->satuan }}</td>
                            <td>{{$item->currency->name . " " . number_format($item->harga_lama)  }}</td>
                            {{-- <td>{{ $item->harga->harga }}</td> --}}
                            <td>{{$item->currency->name . " " . number_format($item->harga) }}</td>
                            <td>{{ $item->vendor->namaperusahaan }}</td>
                            <td>{{ $item->lokasi->kode }}</td>
                            <td>{{$item->updated_at}}</td>
                            <td width='130px'>
                                @if ($crud->edit == 1)
                                <a href="/hargabarang/edit/{{ $item->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-edit"></i></a>
                                
                                @endif
                                @if ($crud->destroy == 1) 
                                <a href="/hargabarang/destroy/{{ $item->id }}" onclick="return confirm('Are you sure? Delete ')" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-delete"></i></a>
                           
                                @endif
                                {{-- <a href="/hargabarang/show/{{ $brg->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-visible"></i></a> --}}
                                 </td>
                        </tr>  
                        {{-- @endif --}}
                              
                        
                        {{-- @endforeach --}}
                        @endforeach            
                    </tbody>
    
                </table>
            {{-- </div> --}}
            <!--begin: Datatable -->
           
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
</div>
@endsection

@section('footer-script')
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}" type="text/javascript"></script>
@endsection