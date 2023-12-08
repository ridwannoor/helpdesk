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
                        @if ($crud->create > 0)
                        <a href="/menusub/create" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                            <span>
                                <i class="la la-plus"></i>
                                <span>Menu</span>
                            </span>
                        </a>
                        @endif
                    </li>
                    <li class="m-portlet__nav-item">
                        @if ($crud->create > 0)
                        <a href="/menu/create" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                            <span>
                                <i class="la la-plus"></i>
                                <span>Submenu</span>
                            </span>
                        </a>
                        @endif
                    </li>
                    {{-- <li class="m-portlet__nav-item"></li> --}}
                    
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1_wrapper">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Parent ID</th>
                        <th>Deskripsi</th>
                        <th>Icon</th>
                        <th>Link</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @php
                    $no = 1 ;
                @endphp
                <tbody>
                        @foreach ($lok as $item)
                    <tr>
                        
                        <td>{{ $no++ }}</td>
                        <td style="vertical-align : middle;text-align:center;">{{ $item->parent_id }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->icon }}</td>
                        <td>{{ $item->link }}</td>
                        <td width='130px'>
                            @if ($crud->show > 0)
                            <a href="/menu/show/{{ $item->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-visible"></i></a>
                            @endif
                            @if ($crud->edit > 0)                            
                            <a href="/menu/edit/{{ $item->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-edit"></i></a>
                            @endif
                            @if ($crud->destroy > 0)
                            <a href="/menu/destroy/{{ $item->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill delete-confirm"><i class="flaticon-delete"></i></a>
                            @endif
                        </td>
                    </tr>        
                    
                            
                    @endforeach            
                </tbody>

            </table>
        </div>
    </div>
    @endif
    <!-- END EXAMPLE TABLE PORTLET-->
</div>
@endsection

@section('footer-script')
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}" type="text/javascript"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Anda Sudah Yakin?',
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