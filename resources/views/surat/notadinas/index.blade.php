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

    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet ">
                <div class="m-portlet__body  m-portlet__body--no-padding">
                    <div class="row m-row--no-padding m-row--col-separator-xl">
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <!--begin::New Users-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        <i class="fa fa-list" aria-hidden="true"></i> &nbsp; All
                                    </h4><br>
                                    <span class="m-widget24__stats m--font-success">
                                        <a href="/notadinas"> {{ $nodins->count() }} </a>
                                    </span>
                                    <div class="m--space-10"></div>
                                    <div class="progress m-progress--sm">
                                    </div>
                                </div>
                            </div>
                            <!--end::New Users-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <div class="m-widget24 ">
                                <div class="m-widget24__item ">
                                    <h4 class="m-widget24__title text-reset">
                                        <i class="fa fa-list" aria-hidden="true"></i> &nbsp; Open
                                    </h4><br>
                                    <span class="m-widget24__stats m--font-success">
                                      <a href="/notadinas/open"> {{ $nodins->where('status', 'open')->count() }}</a>
                                    </span>
                                    <div class="m--space-10"></div>
                                    <div class="progress m-progress--sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <!--begin::New Feedbacks-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        <i class="fa fa-list" aria-hidden="true"></i> &nbsp; Progress
                                    </h4><br>
                                    <span class="m-widget24__stats m--font-success">
                                        <a href="/notadinas/progress">  {{ $nodins->where('status', 'proses')->count() }} </a>
                                    </span>
                                    <div class="m--space-10"></div>
                                    <div class="progress m-progress--sm"> </div>
                                </div>
                            </div>
                            <!--end::New Feedbacks-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <!--begin::New Orders-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        <i class="fa fa-list" aria-hidden="true"></i> &nbsp; Pending
                                    </h4><br>
                                    <span class="m-widget24__stats m--font-success">
                                        <a href="/notadinas/pending"> {{ $nodins->where('status', 'pending')->count() }} </a>
                                    </span>
                                    <div class="m--space-10"></div>
                                    <div class="progress m-progress--sm"> </div>

                                </div>
                            </div>
                            <!--end::New Orders-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <!--begin::New Users-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        <i class="fa fa-list" aria-hidden="true"></i> &nbsp; Done
                                    </h4><br>
                                    <span class="m-widget24__stats m--font-success">
                                        <a href="/notadinas/done"> {{  $nodins->where('status', 'done')->count() }} </a>
                                    </span>
                                    <div class="m--space-10"></div>
                                    <div class="progress m-progress--sm">
                                    </div>
                                </div>
                            </div>
                            <!--end::New Users-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <!--begin::New Users-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        <i class="fa fa-list" aria-hidden="true"></i> &nbsp; Cancel
                                    </h4><br>
                                    <span class="m-widget24__stats m--font-success">
                                        <a href="/notadinas/cancel"> {{  $nodins->where('status', 'cancel')->count() }} </a>
                                    </span>
                                    <div class="m--space-10"></div>
                                    <div class="progress m-progress--sm">
                                    </div>
                                </div>
                            </div>
                            <!--end::New Users-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <!--begin::New Users-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        <i class="fa fa-list" aria-hidden="true"></i> &nbsp; Revisi
                                    </h4><br>
                                    <span class="m-widget24__stats m--font-success">
                                        <a href="/notadinas/revisi"> {{  $nodins->where('status', 'revisi')->count() }} </a>
                                    </span>
                                    <div class="m--space-10"></div>
                                    <div class="progress m-progress--sm">
                                    </div>
                                </div>
                            </div>
                            <!--end::New Users-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <!--begin::New Users-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        <i class="fa fa-list" aria-hidden="true"></i> &nbsp; Gagal Tender
                                    </h4><br>
                                    <span class="m-widget24__stats m--font-success">
                                        <a href="/notadinas/gagal"> {{  $nodins->where('status', 'gagal')->count() }} </a>
                                    </span>
                                    <div class="m--space-10"></div>
                                    <div class="progress m-progress--sm">
                                    </div>
                                </div>
                            </div>
                            <!--end::New Users-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        <a href="/notadinas/create"
                            class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                            <span>
                                <i class="la la-plus"></i>
                                <span>New record</span>
                            </span>
                        </a>
                        @endif
                    </li>
                    <li class="m-portlet__nav-item">
                        <!-- Button trigger modal -->


                        <!-- Modal -->
                        <div class="modal fade" id="NodinMdl" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <form action="/notadinas/exportPDF" method="get">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                              <label for="">Mulai Tanggal</label>
                                              <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                                              {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                            </div>
                                            <div class="form-group">
                                                <label for="">Sampai Tanggal</label>
                                                <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                                                {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                              </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <a href="#" target="__blank" data-toggle="modal" data-target="#NodinMdl" class="btn btn-danger m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" rel="noopener noreferrer"> <i class="fa fa-file-pdf"></i>&nbsp; Export PDF</a>
                        <a href="/notadinas/exportXLS" class="btn btn-success m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air"><i class="fa fa-file-excel"></i>&nbsp; Export XLS</a>
                        </span></a>
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
                        <th>Tanggal Terima</th>
                        <th>Tanggal Surat</th>
                        <th>Detail</th>
                        <th>Unit ST</th>
                        <th>Divisi</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @php
                $no = 1 ;
                @endphp
                <tbody>
                    @foreach ($nodins as $item)
                    <tr>

                        <td>{{ $no++ }}</td>
                        <td width='120px'>
                            <div class="m-stack m-stack--ver m-stack--tablet m-stack--demo p-2">
                                <div class="m-stack__item m-stack__item--center m-stack__item--top text-center"><h4><strong>{{ date('d', strtotime($item->tgl_terima))  }}</strong></h4> </div>
                                <div class="m-stack__item m-stack__item--center m-stack__item--bottom m--bg-accent text-center"><h6 class="m--font-light">{{ date('M Y', strtotime($item->tgl_terima))  }}</h6> </div>
                            </div>
                        </td>
                        <td width='120px'>
                            <div class="m-stack m-stack--ver m-stack--tablet m-stack--demo p-2">
                                <div class="m-stack__item m-stack__item--center m-stack__item--top text-center"><h4><strong>{{ date('d', strtotime($item->tgl_surat))  }}</strong></h4> </div>
                                <div class="m-stack__item m-stack__item--center m-stack__item--bottom m--bg-brand text-center"><h6 class="m--font-light">{{ date('M Y', strtotime($item->tgl_surat))  }}</h6> </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-lg-12">
                                    {{-- {{ date('d-m-Y', strtotime($item->tgl_terima)) }} <br> --}}
                                   <a href="/notadinas/show/{{ $item->id }}"> {{ $item->no_nodin }}</a> <br>
                                    {{ $item->nama_pek }}
                                </div>

                            </div>


                        </td>
                        <td>{{ $item->divisi->detail }}</td>
                        <td>{{ $item->unit_st }}</td>
                        <td>
                            @foreach ($item->lokasi as $lok)
                                <span class="m-badge m-badge--metal m-badge--wide">{{ $lok->kode }}</span>
                            @endforeach
                        </td>
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
                        <td width='50px' style="vertical-align : middle;text-align:center;">
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
                                                        {{-- @if ($crud->publish)
                                                        <li class="m-nav__item">
                                                            <a href="/notadinas/publish/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-multimedia-5"></i>  <span class="m-nav__link-text">Publish</span></a>
                                                        </li>
                                                        @endif               --}}
                                                        @if ($crud->cetak)
                                                        <li class="m-nav__item">
                                                            <a href="/notadinas/cetak/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-technology"></i>  <span class="m-nav__link-text">Print</span></a>
                                                        </li>
                                                        @endif
                                                        {{-- @if ($crud->upload) --}}
                                                        <li class="m-nav__item">
                                                            <a href="/notadinas/upload/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-upload"></i>  <span class="m-nav__link-text">Upload File</span></a>
                                                        </li>
                                                        {{-- @endif               --}}
                                                        @if ($crud->edit)
                                                            @if ($item->status == 'done')
                                                                <span></span>
                                                            @else
                                                            <li class="m-nav__item">
                                                                <a href="/notadinas/edit/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-edit"></i>  <span class="m-nav__link-text">Edit</span></a>
                                                            </li>
                                                            @endif
                                                        @endif
                                                        @if ($crud->destroy)
                                                            @if ($item->status == 'done')
                                                                <span></span>
                                                            @else
                                                                <li class="m-nav__item">
                                                                    <a href="/notadinas/destroy/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-delete"></i>  <span class="m-nav__link-text">Hapus</span></a>
                                                                </li>
                                                            @endif
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </td>
                        {{-- <td width='130px'>
                            @if ($crud->show > 0)
                            <a href="/notadinas/show/{{ $item->id }}"
                                class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i
                                    class="flaticon-visible"></i></a>
                            @endif
                            @if ($crud->edit > 0)
                            <a href="/notadinas/edit/{{ $item->id }}"
                                class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i
                                    class="flaticon-edit"></i></a>
                            @endif
                            @if ($crud->destroy > 0)
                            <a href="/notadinas/destroy/{{ $item->id }}"
                                class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill delete-confirm"><i
                                    class="flaticon-delete"></i></a>
                            @endif
                        </td> --}}
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
