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
                        <a href="/productinformation" class="m-nav__link">
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
    <div class="row">
        <div class="col-xl-12">
        <div class="m-portlet m-portlet--full-height">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                           {{ $judul }}
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    @if ($crud->create > 0)
                        <button type="button" class="btn btn-success m-btn m-btn--icon m-btn--pill m-btn--air" data-toggle="modal" data-target="#m_blockui_4_1_modal"><span>Tambah</span></button>
                    @endif
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1_wrapper">
                    <thead>
                        <tr>
                            <th width="20px">Tanggal</th>
                            <th>Product</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @php
                    $no = 1 ;
                    @endphp
                    <tbody>


                        @foreach ( $products as $item)
                        {{-- @if () --}}
                        <tr>
                            {{-- <td>{{ $no++ }}</td> --}}
                            <td>
                                <div class="m-stack m-stack--ver m-stack--tablet m-stack--demo p-2">
                                    <div class="m-stack__item m-stack__item--center m-stack__item--top text-center"><h4><strong>{{ date('d', strtotime($item->updated_at))  }}</strong></h4> </div>
                                    <div class="m-stack__item m-stack__item--center m-stack__item--bottom m--bg-brand text-center"><h6 class="m--font-light">{{ date('M Y', strtotime($item->updated_at))  }}</h6> </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-3">
                                        @if ($item->image == "doc")
                                            <img src="assets/app/media/img/files/doc.svg" alt="image" width="70px">
                                        @elseif ($item->image == "pdf")
                                            <img src="assets/app/media/img/files/pdf.svg" alt="image" width="70px">
                                        @elseif ($item->image == "xls")
                                            <img src="assets/app/media/img/files/xls.svg" alt="image" width="70px">
                                        @else
                                            <img src="assets/app/media/img/files/jpg.svg" alt="image" width="70px">
                                        @endif
                                        {{-- <img src="{{ url('data_file/'.$item->image) }}" alt="image" width="70px"> --}}
                                    </div>
                                    <div class="col-sm-9">
                                        <strong> {{ $item->title }} </strong><br>
                                        {{-- <span class="m-badge m-badge--metal m-badge--wide">Created by: {{ $item->user->name }}, {{  date("d-m-Y", strtotime( $item->updated_at)) }}</span> --}}
                                    </div>
                                </div>
                            </td>
                            <td width='130px'>
                                <a href="{{ url('data_file/product_information/'.$item->file) }}" target="_blank"
                                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" ><i
                                        class="flaticon-download"></i></a>
                                @if ($crud->edit > 0)
                                <a href="/productinformation/edit/{{ $item->id }}"
                                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" >
                                    <i class="flaticon-edit"></i></a>

                                @endif
                                @if ($crud->destroy > 0)
                                    <a href="/productinformation/destroy/{{ $item->id }}"
                                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill delete-confirm">
                                    <i class="flaticon-delete"></i></a>
                                @endif
                            </td>
                        </tr>


                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        </div>
    </div>

    <!--begin::Modal-->
    <div class="modal fade" id="m_blockui_4_1_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">My Drive</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="/productinformation/store" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="_method" value="POST" />
                    {{-- <input type="hidden" name="id" value="{{$dept->id}}" /> --}}
                </div>
                <div class="form-group">
                <label for="title" class="form-control-label">Judul Product:</label>
                <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="form-group">
                <label for="file" class="form-control-label">File Upload:</label>
                <div></div>
                <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                {{-- <textarea class="form-control" id="file"></textarea> --}}
                </div>
                <div class="form-group">
                    <label for="Icon" class="form-control-label">Icon:</label>
                    <div class="m-radio-list">
                        <label>
                            <input type="radio" name="image" value="doc"><img src="assets/app/media/img/files/doc.svg" width="40px" alt="">
                                <span></span>
                        </label>
                        <label>
                            <input type="radio" name="image" value="xls"><img src="assets/app/media/img/files/xls.svg" width="40px" alt="">
                            <span></span>
                        </label>
                        <label>
                            <input type="radio" name="image" value="jpg"> <img src="assets/app/media/img/files/jpg.svg" width="40px" alt="">
                            <span></span>
                        </label>
                        <label>
                            <input type="radio" name="image" value="pdf"> <img src="assets/app/media/img/files/pdf.svg" width="40px" alt="">
                        <span></span>
                    </label>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="/productinformation" class="btn btn-default">Back</a>
            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal"  >Close</button> --}}
            <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    <!--end::Modal-->
    @endif

</div>
@endsection

@section('footer-script')
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}"
    type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/wizard/wizard.js" type="text/javascript')}}"></script>
<script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-touchspin.js') }}"
    type="text/javascript"></script>
    <script src="{{ asset('assets/demo/default/custom/components/base/blockui.js') }}" type="text/javascript"></script>

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
