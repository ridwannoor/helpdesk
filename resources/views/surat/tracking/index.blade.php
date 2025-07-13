@extends('layouts.app2')
@section('header-script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
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
    @include('sweetalert::alert')
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
                        <!-- Button trigger modal -->
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
                        <th>Nomor Nota Dinas</th>
                        <th>Nama Pekerjaan </th>
                        <th>Unit ST</th>
                        {{-- <th>Keterangan</th> --}}
                        <th>Status</th>
                    </tr>
                </thead>
                @php
                $no = 1 ;
                @endphp
                <tbody>
                    @foreach ($nodins as $item)
                    <tr>

                        <td>{{ $no++ }}</td>
                        <td>
                            <div class="row">
                                <div class="col-lg-12">
                                    {{-- {{ date('d-m-Y', strtotime($item->tgl_terima)) }} <br> --}}
                                   <a href="/tracking/show/{{ $item->id }}"> {{ $item->no_nodin }}</a>
                                </div>

                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-lg-12">
                                    {{ $item->nama_pek }}
                                </div>

                            </div>
                        </td>
                        <td>{{ $item->divisi->detail }}</td>
                        {{-- <td>{{ $item->divisi->detail }}</td> --}}
                        <td>
                            @if ($item->status == "open")
                                <span class="m-badge m-badge--default m-badge--wide">Open</span>
                            @elseif ($item->status == "proses")
                                <span class="m-badge m-badge--primary m-badge--wide">Progress</span>
                            @elseif ($item->status == "pending")
                                <span class="m-badge m-badge--warning m-badge--wide">Pending</span>
                            @elseif ($item->status == "cancel")
                                <span class="m-badge m-badge--danger m-badge--wide">Cancel</span>
                            @elseif ($item->status == "revisi")
                                <span class="m-badge m-badge--warning m-badge--wide">Revisi</span>
                            @elseif ($item->status == "gagal")
                                <span class="m-badge m-badge--Secondary m-badge--wide">Gagal Tender</span>
                            @else
                                <span class="m-badge m-badge--success m-badge--wide">Done</span>
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
<script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}"
    type="text/javascript"></script>
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
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
