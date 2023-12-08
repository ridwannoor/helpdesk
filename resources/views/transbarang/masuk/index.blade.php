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
                            <a href="/brgmasuk/add" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>New record</span>
                                </span>
                            </a>
                        </li>
                        <li class="m-portlet__nav-item"></li>
                        
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1_wrapper">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Transaksi</th>
                            <th>Tanggal</th>
                            {{-- <th>Alamat</th> --}}
                            {{-- <th>Telephone</th> --}}
                            {{-- <th>Fax</th> --}}
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @php
                        $no = 1 ;
                    @endphp
                    <tbody>
                            @foreach ($brgmasuks as $item)
                        <tr>
                            
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->no_trans }}</td>
                            <td>{{ $item->tanggal }}</td>
                            {{-- <td>{{ $item->alamat }}</td> --}}
                            {{-- <td>{{ $item->telp }}</td> --}}
                            {{-- <td>{{ $item->fax }}</td> --}}
                            <td width='130px'>
                                <a href="/brgmasuk/show/{{ $item->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-visible"></i></a>
                                <a href="/brgmasuk/edit/{{ $item->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-edit"></i></a>
                                <a href="/brgmasuk/destroy/{{ $item->id }}" onclick="return confirm('Are you sure? Delete ')" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-delete"></i></a>
                            </td>
                        </tr>        
                        
                                
                        @endforeach            
                    </tbody>
    
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
@endsection