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
            
       @if ($crud == null)
        <div class="m-grid__item m-grid__item--fluid m-grid  m-error-6" style="background-image: url(assets/app/media/img/error/bg6.jpg);">
            <div class="m-error_container">
                <div class="m-error_subtitle m--font-light">
                    <h1>Oops...</h1>		 
                </div> 		 
                <p class="m-error_description m--font-light">
                    Looks like something went wrong.<br>
                    We're working on it			 
                </p>		 
            </div>	 
        </div> 
        @else
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

                            @if ($crud->create )
                            <a href="/barang/add"
                                class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>New record</span>
                                </span>
                            </a>
                            @endif
                        </li>
                        {{-- <li class="m-portlet__nav-item">
                        <a href="/barang/exportXLS" target="_blank" class="btn btn-success m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" rel="noopener noreferrer"> <i class="fa fa-file-excel"></i> Excel </a>
                        </li> --}}
                        <li class="m-portlet__nav-item">
                            <a href="/barang/exportPDF" target="_blank" class="btn btn-danger m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" rel="noopener noreferrer"> <i class="fa fa-file-pdf"></i>&nbsp; Export PDF </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1_wrapper">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Kategori</th>
                            <th>Lokasi Awal</th>
                            <th>Lokasi Terakhir</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @php
                    $no = 1 ;
                    @endphp
                    <tbody>


                        @foreach ( $brgs as $brg)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="{{ url('data_file/'.$brg->image) }}" alt="image" width="70px">
                                    </div>
                                    <div class="col-sm-9">
                                        @if ($crud->show)
                                        <strong><a href="/barang/show/{{ $brg->id }}"> {{ $brg->nama_brg }} </a></strong><br>
                                        <span class="m-badge m-badge--metal m-badge--wide">tgl pembelian: {{  date("d-m-Y", strtotime( $brg->tgl_pembelian)) }}</span> <br>
                                        {{-- <span class="m-badge m-badge--secondary m-badge--wide">Created by : {{  $brg->user->name }}</span> --}}
                                        @else
                                        <strong>{{ $brg->nama_brg }} </strong><br>
                                        <span class="m-badge m-badge--info m-badge--wide">tgl pembelian: {{  date("d-m-Y", strtotime( $brg->tgl_pembelian)) }}</span> <br>
                                        <span class="m-badge m-badge--secondary m-badge--wide">Created by : {{  $brg->user->name }}</span>
                                        @endif                                   
                                    </div>
                                </div>
                            </td>
                            <td style="vertical-align : middle;text-align:center;">{{ $brg->aset_tag }}</td>
                            <td style="vertical-align : middle;text-align:center;">{{ $brg->category }}</td>
                            <td style="vertical-align : middle;text-align:center;">{{ $brg->lokasi->kode }}</td>
                            <td style="vertical-align : middle;text-align:center;">
                                @if ($brg->barangmutasi)                            
                                    @foreach ($brg->barangmutasi as $item)
                                        @if ($loop->last)
                                        {{  $item->lokasi->kode  }}
                                        @endif
                                    @endforeach                               
                                @endif
                            </td>
                            <td style="vertical-align : middle;text-align:center;">
                                @if ($brg->kondisi == "baik")
                                <span class="m-badge m-badge--primary m-badge--wide">Baik</span>
                                @else
                                <span class="m-badge m-badge--danger m-badge--wide">Rusak</span>
                                @endif
                            </td>
                        
                            <td width='150px'>
                                <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-left m-dropdown--align-push" m-dropdown-toggle="click" aria-expanded="true">
                                    <a href="#" class="m-portlet__nav-link m-dropdown__toggle btn m-btn m-btn--link m-btn--hover-brand m-btn--pill">
                                        <i class="la la-ellipsis-v"></i>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__body">              
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav">                                              
                                                                <li class="m-nav__item">
                                                                    <a href="/barang/rekap/{{$brg->id}}" class="m-nav__link"><i class="m-nav__link-icon fa fa-file-pdf"></i>  <span class="m-nav__link-text">Rekap</span></a>
                                                                </li>                            
                                                            @if ($crud->cetak)                       
                                                            <li class="m-nav__item">
                                                                <a href="/barang/cetak/{{$brg->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-technology"></i>  <span class="m-nav__link-text">Print</span></a>
                                                            </li>  
                                                            @endif              
                                                            <li class="m-nav__item">
                                                                <a href="/barang/upload/{{$brg->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-upload"></i>  <span class="m-nav__link-text">Upload File</span></a>
                                                            </li>                                   
                                                            @if ($crud->edit)
                                                            <li class="m-nav__item">
                                                                <a href="/barang/edit/{{$brg->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-edit"></i>  <span class="m-nav__link-text">Edit</span></a>
                                                            </li>  
                                                            @endif              
                                                            @if ($crud->destroy)
                                                            <li class="m-nav__item">
                                                                <a href="/barang/destroy/{{$brg->id}}" class="m-nav__link delete-confirm"><i class="m-nav__link-icon flaticon-delete"></i>  <span class="m-nav__link-text">Hapus</span></a>
                                                            </li>
                                                            @endif                                       
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                            
                            </td>
                        </tr>


                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
       @endif
        {{-- <div class="m-portlet m-portlet--mobile">
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

                            @if ($crud->create )
                            <a href="/barang/add"
                                class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>New record</span>
                                </span>
                            </a>
                            @endif
                        </li>
                        <li class="m-portlet__nav-item">
                        <a href="/barang/exportXLS" target="_blank" class="btn btn-success m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" rel="noopener noreferrer"> <i class="fa fa-file-excel"></i> Excel </a>
                        </li>
                        <li class="m-portlet__nav-item">
                            <a href="/barang/exportPDF" target="_blank" class="btn btn-danger m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" rel="noopener noreferrer"> <i class="fa fa-file-pdf"></i> PDF </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1_wrapper">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Kategori</th>
                            <th>Lokasi Awal</th>
                            <th>Lokasi Terakhir</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @php
                    $no = 1 ;
                    @endphp
                    <tbody>


                        @foreach ( $brgs as $brg)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="{{ url('data_file/'.$brg->image) }}" alt="image" width="70px">
                                    </div>
                                    <div class="col-sm-9">
                                        @if ($crud->show)
                                        <strong><a href="/barang/show/{{ $brg->id }}"> {{ $brg->nama_brg }} </a></strong><br>
                                        <span class="m-badge m-badge--info m-badge--wide">tgl pembelian: {{  date("d-m-Y", strtotime( $brg->tgl_pembelian)) }}</span> <br>
                                        <span class="m-badge m-badge--secondary m-badge--wide">Created by : {{  $brg->user->name }}</span>
                                        @else
                                        <strong>{{ $brg->nama_brg }} </strong><br>
                                        <span class="m-badge m-badge--info m-badge--wide">tgl pembelian: {{  date("d-m-Y", strtotime( $brg->tgl_pembelian)) }}</span> <br>
                                        <span class="m-badge m-badge--secondary m-badge--wide">Created by : {{  $brg->user->name }}</span>
                                        @endif                                   
                                    </div>
                                </div>
                            </td>
                            <td style="vertical-align : middle;text-align:center;">{{ $brg->aset_tag }}</td>
                            <td style="vertical-align : middle;text-align:center;">{{ $brg->category }}</td>
                            <td style="vertical-align : middle;text-align:center;">{{ $brg->lokasi->kode }}</td>
                            <td style="vertical-align : middle;text-align:center;">
                                @if ($brg->barangmutasi)                            
                                    @foreach ($brg->barangmutasi as $item)
                                        @if ($loop->last)
                                        {{  $item->lokasi->kode  }}
                                        @endif
                                    @endforeach                               
                                @endif
                            </td>
                            <td style="vertical-align : middle;text-align:center;">
                                @if ($brg->kondisi == "baik")
                                <span class="m-badge m-badge--primary m-badge--wide">Baik</span>
                                @else
                                <span class="m-badge m-badge--danger m-badge--wide">Rusak</span>
                                @endif
                            </td>
                        
                            <td width='150px'>
                                <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-left m-dropdown--align-push" m-dropdown-toggle="click" aria-expanded="true">
                                    <a href="#" class="m-portlet__nav-link m-dropdown__toggle btn m-btn m-btn--link m-btn--hover-brand m-btn--pill">
                                        <i class="la la-ellipsis-v"></i>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__body">              
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav">                                              
                                                                <li class="m-nav__item">
                                                                    <a href="/barang/rekap/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon fa fa-file-pdf"></i>  <span class="m-nav__link-text">Rekap</span></a>
                                                                </li>                            
                                                            @if ($crud->cetak)                       
                                                            <li class="m-nav__item">
                                                                <a href="/barang/cetak/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-technology"></i>  <span class="m-nav__link-text">Print</span></a>
                                                            </li>  
                                                            @endif              
                                                            <li class="m-nav__item">
                                                                <a href="/barang/upload/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-upload"></i>  <span class="m-nav__link-text">Upload File</span></a>
                                                            </li>                                   
                                                            @if ($crud->edit)
                                                            <li class="m-nav__item">
                                                                <a href="/barang/edit/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-edit"></i>  <span class="m-nav__link-text">Edit</span></a>
                                                            </li>  
                                                            @endif              
                                                            @if ($crud->destroy)
                                                            <li class="m-nav__item">
                                                                <a href="/barang/destroy/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-delete"></i>  <span class="m-nav__link-text">Hapus</span></a>
                                                            </li>
                                                            @endif                                       
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                            
                            </td>
                        </tr>


                        @endforeach
                    </tbody>

                </table>
            </div>
        </div> --}}
        
        {{-- <div class="m-grid__item m-grid__item--fluid m-grid  m-error-6" style="background-image: url(assets/app/media/img/error/bg6.jpg);">
            <div class="m-error_container">
                <div class="m-error_subtitle m--font-light">
                    <h1>Oops...</h1>		 
                </div> 		 
                <p class="m-error_description m--font-light">
                    Looks like something went wrong.<br>
                    We're working on it			 
                </p>		 
            </div>	 
        </div> --}}
       
   
    {{-- @break($users) --}}
    <!-- END EXAMPLE TABLE PORTLET-->
</div>
@endsection

@section('footer-script')
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}"
    type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Anda Ingin Hapus Ini?',
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