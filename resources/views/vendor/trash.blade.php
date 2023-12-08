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
    <div class="m-grid__item m-grid__item--fluid m-grid  m-error-6"
        style="background-image: url(assets/app/media/img/error/bg6.jpg);">
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
        <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        {{ $judul }}
                    </h3>
                </div>
            </div>
            {{-- <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        @if ($crud->create > 0)
                        <a href="/vendor/add"
                            class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                            <span>
                                <i class="la la-plus"></i>
                                <span>New record</span>
                            </span>
                        </a>
                        @endif
                    </li>
                    <li class="m-portlet__nav-item">
                        <a href="#" class="btn btn-danger m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air"
                            data-toggle="modal" data-target="#vendorMdl">
                            <span>
                            <i class="fa fa-file-pdf"></i> &nbsp;
                            <span>Export</span>
                            </span>
                        </a>

                        <div class="modal fade" id="vendorMdl" tabindex="-1" role="dialog"
                            aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ $judul }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/vendor/exportPDF" method="get">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Mulai Tanggal</label>
                                                <input type="date" class="form-control" name="start" id="start"
                                                    aria-describedby="helpId" placeholder="">

                                            </div>
                                            <div class="form-group">
                                                <label for="">Sampai Tanggal</label>
                                                <input type="date" class="form-control" name="end" id="end"
                                                    aria-describedby="helpId" placeholder="">

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>

                    {{-- <li class="m-portlet__nav-item">
                        <a href="/vendor/email" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                            <span>
                            <i class="fa fa-envelope"></i> 
                            &nbsp;<span>Email</span> 
                            </span>
                        </a>
                    </li> --}}
                    {{-- <li class="m-portlet__nav-item"> --}}
                    {{--    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-left m-dropdown--align-push"
                            m-dropdown-toggle="click" aria-expanded="true">
                            <a href="#"
                                class="m-portlet__nav-link m-dropdown__toggle btn m-btn m-btn--link m-btn--hover-brand m-btn--pill">
                                <i class="la la-ellipsis-v"></i>
                            </a>
                            <div class="m-dropdown__wrapper">
                                <span
                                    class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust"></span>
                                <div class="m-dropdown__inner">
                                    <div class="m-dropdown__body">
                                        <div class="m-dropdown__content">
                                            <ul class="m-nav">
                                                <li class="m-nav__item">
                                                  

                                                    <a href="#" data-toggle="modal" data-target="#vendorMdl"
                                                    class="m-nav__link"><i
                                                            class="m-nav__link-icon fa fa-file-pdf"></i> <span
                                                            class="m-nav__link-text">Export PDF</span> </a>
                                                    <!-- Modal -->
                                                  

                                                   
                                                </li>
                                                <li class="m-nav__item">
                                                    <a href="/vendor/email" class="m-nav__link"><i
                                                            class="m-nav__link-icon fa fa-envelope"></i> <span
                                                            class="m-nav__link-text">Email Vendor</span> </a>
                                                </li>
                                            </ul>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    

                </ul>
            </div> --}}
        </div>
        <div class="m-portlet__body">
            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1_wrapper">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Bidang Pekerjaan</th>
                        {{-- <th>Status</th> --}}
                        {{-- <th>Lokasi</th> --}}
                        <th>Status</th>
                        {{-- <th>Fax</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                @php
                $no = 1 ;
                @endphp
                <tbody>
                    @foreach ($vendors as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td width="300px">
                        <strong>{{ $item->namaperusahaan . ", " . $item->badanusaha->kode  }}</strong>
                            {{-- <br> --}}
                           
                            {{-- <span class="m-badge m-badge--secondary m-badge--wide">dibuat oleh: {{  $item->user->name }}</span>
                            --}}
                        </td>
                        <td style="vertical-align : middle;text-align:center;">
                            {{ $item->jenispekerjaans->implode('name', ', ') }} <br>
                            {{ $item->jenisusahas->implode('detail', ', ') }} <br>
                            {{ $item->categories->implode('detail', ', ') }} <br>
                            {{ $item->product }}
                        </td>
                        <td style="vertical-align : middle;text-align:center;">
                            @if ($item->is_published == 0)
                            <span class="m-badge m-badge--warning m-badge--wide">Unverified</span>
                            @else
                            <span class="m-badge m-badge--info m-badge--wide">Verified</span>
                            @endif
                            {{-- {{ $item->email }} --}}
                        </td>
                        {{-- <td style="vertical-align : middle;text-align:center;"><span class="m-badge m-badge--success m-badge--wide">{{ $item->lokasi->kode }}</span>
                        </td> --}}

                        <td width='50px'>
                            <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-left m-dropdown--align-push"
                                m-dropdown-toggle="click" aria-expanded="true">
                                <a href="#"
                                    class="m-portlet__nav-link m-dropdown__toggle btn m-btn m-btn--link m-btn--hover-brand m-btn--pill">
                                    <i class="la la-ellipsis-v"></i>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span
                                        class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav">
                                                    <li class="m-nav__item">
                                                        <a href="/vendor/restore/{{$item->id}}" class="m-nav__link">
                                                            <i class="m-nav__link-icon fa fa-undo"></i>
                                                        <span class="m-nav__link-text">Restore</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="/vendor/deletepermanent/{{$item->id}}" class="m-nav__link">
                                                            <i class="m-nav__link-icon fa fa-trash-alt"></i>
                                                        <span class="m-nav__link-text">Delete Permanent</span>
                                                        </a>
                                                    </li>
                                                    {{-- @if ($crud->publish)     
                                                                    @if ($item->is_published)
                                                                        <li class="m-nav__item">
                                                                            <a href="/vendor/publish/{{$item->id}}"
                                                    class="m-nav__link"><i
                                                        class="m-nav__link-icon flaticon-multimedia-5"></i> <span
                                                        class="m-nav__link-text">Draft</span></a>
                                                    </li>
                                                    @else
                                                    <li class="m-nav__item">
                                                        <a href="/vendor/publish/{{$item->id}}" class="m-nav__link"><i
                                                                class="m-nav__link-icon flaticon-multimedia-5"></i>
                                                            <span class="m-nav__link-text">Publish</span></a>
                                                    </li>
                                                    @endif
                                                    @endif --}}
                                                    {{-- @if ($crud->cetak)                       
                                                                <li class="m-nav__item">
                                                                    <a href="/vendor/cetak/{{$item->id}}"
                                                    class="m-nav__link"><i
                                                        class="m-nav__link-icon flaticon-technology"></i> <span
                                                        class="m-nav__link-text">Print</span></a>
                                                    </li>
                                                    @endif --}}
                                                    {{-- @if ($crud->upload) --}}
                                                    {{-- <li class="m-nav__item">
                                                                    <a href="/vendor/upload/{{$item->id}}"
                                                    class="m-nav__link"><i class="m-nav__link-icon flaticon-upload"></i>
                                                    <span class="m-nav__link-text">Upload File</span></a>
                                                    </li> --}}
                                                    {{-- @endif               --}}
                                                    {{-- @if ($crud->edit)
                                                    <li class="m-nav__item">
                                                        <a href="/vendor/edit/{{$item->id}}" class="m-nav__link"><i
                                                                class="m-nav__link-icon flaticon-edit"></i> <span
                                                                class="m-nav__link-text">Edit</span></a>
                                                    </li>
                                                    @endif --}}
                                                    {{-- @if ($crud->destroy)
                                                    <li class="m-nav__item">
                                                        <a href="/vendor/destroy/{{$item->id}}" class="m-nav__link delete-confirm"><i
                                                                class="m-nav__link-icon flaticon-delete"></i> <span
                                                                class="m-nav__link-text">Hapus</span></a>
                                                    </li>
                                                    @endif --}}
                                                    {{-- <li class="m-nav__item">
                                                        <a href="#" data-id="{{ $item->id }}" data-toggle="modal" data-target="#mail_modal_11{{ $item->id }}" class="m-nav__link"><i
                                                                class="m-nav__link-icon flaticon-envelope"></i> <span
                                                                class="m-nav__link-text">Email</span></a>
                                                    </li> --}}

                                                    {{-- <a href="#" data-toggle="modal" data-target="#fileupload_modal_10" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air mb-3">
                                                        <span>
                                                            <i class="la la-plus"></i>
                                                            <span>New record</span>
                                                        </span>
                                                    </a> --}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- @if ($crud->publish)
                                <a href="/vendor/publish/{{ $item->id }}" class="m-portlet__nav-link btn m-btn
                            m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill nopublish-confirm"><i
                                class="flaticon-multimedia-5"></i></a>
                            @endif --}}
                            {{-- @if ($crud->edit ) 
                                <a href="/vendor/edit/{{ $item->id }}" class="m-portlet__nav-link btn m-btn
                            m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i
                                class="flaticon-edit"></i></a>
                            @endif
                            @if ($crud->destroy )
                            <a href="/vendor/destroy/{{ $item->id }}"
                                class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill delete-confirm"><i
                                    class="flaticon-delete"></i></a>
                            @endif --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        </div>
    </div>
</div>
    @endif
    <!-- END EXAMPLE TABLE PORTLET-->
</div>

@include('vendor.maillog')

@endsection

@section('footer-script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $('#summernote').summernote({
        height: "100px"
    });

</script>
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}"
    type="text/javascript"></script>
{{--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>--}}
<script>
    $(document).ready(function () {
        $("#paket").select2({
            placeholder: "Silahkan Pilih"
        });
    });

</script>

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
        }).then(function (value) {
            if (value) {
                window.location.href = url;
            }
        });
    });

</script>
@endsection
