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
            @include('component.alertnotification')
            <div class="col-lg-9">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    {{ $hargabarangs->nama_brg }}
                                </h3>
                            </div>
                        </div>
                      
                    </div>
                    <div class="m-portlet__body">
                            <table class="table table-striped- table-bordered table-hover table-checkable">
                                <tbody>
                                    <td>Nama Barang</td>
                                    <td>{!! $hargabarangs->nama_brg !!}</td>
                                </tbody>
                                <tbody>
                                    <td>Satuan</td>
                                    <td>{{ $hargabarangs->satuan }}</td>
                                </tbody><tbody>
                                    <td>Harga Lama</td>
                                    <td>{{ $hargabarangs->currency->name . " " . format_uang($hargabarangs->harga_lama)  }}</td>
                                </tbody>
                                <tbody>
                                    <td>Harga</td>
                                    <td>{{ $hargabarangs->currency->name . " " . format_uang($hargabarangs->harga)  }}</td>
                                </tbody>
                                <tbody>
                                    <td>Lokasi</td>
                                    <td>{{ $hargabarangs->lokasi->kode }}</td>
                                </tbody>
                                <tbody>
                                    <td>Vendor</td>
                                    <td>{{ $hargabarangs->vendor->namaperusahaan }}</td>
                                </tbody>
                                {{-- <tbody>
                                    <td>Image</td>
                                    <td></td>
                                </tbody> --}}
                            </table>
                                {{-- <img src="{{ url('data_file/'.$hargabarangs->image) }}" width="100%" alt="image"> --}}
                        
                    </div>
                    <!--begin::Form-->
               
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->
    
                
            </div>
            <div class="col-lg-3">
               
                <div class="m-portlet">
                    {{-- <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    {{ $hargabarangs->nama_brg }}
                                </h3>
                            </div>
                        </div>
                      
                    </div> --}}
                    <div class="m-portlet__body">
                           
                                <img src="{{ url('data_file/'.$hargabarangs->image) }}" width="100%" alt="image">
                        
                    </div>
                    <!--begin::Form-->
               
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->
    
                
            </div>
            <div class="col-lg-12">
                <div class="m-portlet">
                    {{-- <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    {{ $hargabarangs->nama_brg }}
                                </h3>
                            </div>
                        </div>
                      
                    </div> --}}
                    <div class="m-portlet__body">
                            <table class="table table-striped- table-bordered table-hover table-checkable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Delivery Order</th>
                                        <th>Qty</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1 ;
                                @endphp
                                <tbody>
                                    @foreach ($hargabarangs->hbdetails as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->doheader->no_do }}</td>
                                            <td>{{ $item->qty . " Rusak" }}</td>
                                            <td>
                                                @if ($item->status == 0)
                                                <span class="m-badge m-badge--warning m-badge--wide">not claim</span>
                                                @else
                                                <span class="m-badge m-badge--success m-badge--wide">claim</span>
                                                @endif   
                                            </td>
                                            <td> 
                                                @if ($item->status == 0)
                                                <a href="/hargabarangdetail/publish/{{ $item->id }}" class="btn btn-xs btn-success publish-confirm">Claim</a>
                                                @endif
                                            </td>
                                        </tr>    
                                    @endforeach                                    
                                </tbody>
                            </table>
                                {{-- <img src="{{ url('data_file/'.$hargabarangs->image) }}" width="100%" alt="image"> --}}
                        
                    </div>
                    <!--begin::Form-->
               
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->
    
                
            </div>
        </div>
    </div>
    
@endsection

@section('footer-script')
    <script src="">
         $('.publish-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Anda Sudah Yakin?',
                text: 'Data Ini Akan Dipublish !',
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