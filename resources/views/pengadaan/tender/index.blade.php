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
    {{-- <div class="col-lg-12"> --}}
        <div class="m-portlet ">
            <div class="m-portlet__body  m-portlet__body--no-padding">
                <div class="row m-row--no-padding m-row--col-separator-xl">
                    <div class="col-md-12 col-lg-6 col-xl-3">
                        <div class="m-widget24 ">
                            <div class="m-widget24__item ">
                                <h4 class="m-widget24__title text-reset">
                                    <i class="fa fa-university" aria-hidden="true"></i> &nbsp; All
                                </h4><br>
                                <span class="m-widget24__stats m--font-success">
                                    {{ $tenders->count() }}
                                   {{-- <a href="/vendors"></a>  --}}
                                </span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">
                        <!--begin::New Feedbacks-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    <i class="fa fa-check" aria-hidden="true"></i> &nbsp; Published
                                </h4><br>
                                <span class="m-widget24__stats m--font-success">
                                    {{ $tenders->where('is_published', 1)->where('is_approval', 1)->count() }}
                                    {{-- <a href="/vendors"></a>  --}}
                                    {{-- <a href="/barang"> {{ $barangs }}</a>   --}}
                                </span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm"> </div>
                            </div>
                        </div>
                        <!--end::New Feedbacks-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">
                        <!--begin::New Orders-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    <i class="fa fa-times" aria-hidden="true"></i> &nbsp; Menunggu
                                </h4><br>
                                <span class="m-widget24__stats m--font-success">
                                    {{ $tenders->where('is_published', 0)->where('is_approval', 1)->count() }}
                                    {{-- <a href="/user">{{ $user->count() }}</a>    --}}
                                </span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm"> </div>

                            </div>
                        </div>
                        <!--end::New Orders-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">
                        <!--begin::New Orders-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    <i class="fa fa-times" aria-hidden="true"></i> &nbsp; Draft
                                </h4><br>
                                <span class="m-widget24__stats m--font-success">
                                    {{ $tenders->where('is_published', 0)->where('is_approval', 0)->count() }}
                                    {{-- <a href="/user">{{ $user->count() }}</a>    --}}
                                </span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm"> </div>

                            </div>
                        </div>
                        <!--end::New Orders-->
                    </div>
                    {{-- <div class="col-md-12 col-lg-6 col-xl-3">
                        <!--begin::New Users-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    <i class="fa fa-spinner" aria-hidden="true"></i> &nbsp; Nilai HPS / RAP
                                </h4><br>
                                <span class="m-widget24__stats m--font-success">
                                    {{ $tenders->where('pagu')->sum() }}
                                   
                                </span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                </div>
                            </div>
                        </div>
                        <!--end::New Users-->
                    </div> --}}
                </div>
            </div>
        </div>
    {{-- </div> --}}
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
                        <a href="/tender/add" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                            <span>
                                <i class="la la-plus"></i>
                                <span>New record</span>
                            </span>
                        </a>
                        @endif
                    </li>
                    {{-- <li class="m-portlet__nav-item">
                        <a href="/spk/exportXLS" target="_blank" class="btn btn-success m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" rel="noopener noreferrer"> <i class="fa fa-file-excel"></i> Export </a>
                        </span></a>
                    </li> --}}
                    
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1_wrapper">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Detail</th>
                        <th>Nama Paket Pekerjaan</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @php
                    $no = 1 ;
                @endphp
                <tbody>
                    @foreach ($tenders as $tds)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>   <div class="m-stack m-stack--ver m-stack--tablet m-stack--demo p-2">
                                <div class="m-stack__item m-stack__item--center m-stack__item--top text-center"><h4><strong>{{ date('d', strtotime($tds->tgl_paket))  }}</strong></h4> </div>
                                <div class="m-stack__item m-stack__item--center m-stack__item--bottom m--bg-brand text-center"><h6 class="m--font-light">{{ date('M Y', strtotime($tds->tgl_paket))  }}</h6> </div>
                            </div>

                                 </td>
                            <td> <a href="/tender/show/{{ $tds->id }}">{{ $tds->nomor_pr }}</a> <br>{{ $tds->nama_paket }}</td>
                            <td>{{ $tds->lokasi->kode }}</td>
                            <td  style="width: 200px">
                                {{-- @if ($tds->is_approval == 1)
                                <span class="m-badge m-badge--brand m-badge--wide">Menunggu Approval</span> --}}
                                @if ($tds->is_published == 1 && $tds->is_approval == 1)
                                <span class="m-badge m-badge--success m-badge--wide">Publish</span>
                                @elseif ($tds->is_published == 0 && $tds->is_approval == 1)
                                <span class="m-badge m-badge--brand m-badge--wide">Menunggu</span>
                                @else
                                <span class="m-badge m-badge--warning m-badge--wide">Draft</span>
                                @endif
                            </td>
                            <td style="width: 150px">                               
                                <!--begin: Dropdown-->
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
                                                            {{-- @if ($tds->is_published) --}}
                                                                @if ($crud->publish > 0)
                                                                <li class="m-nav__item">
                                                                    <a href="/tender/publish/{{ $tds->id }}" class="m-nav__link">
                                                                        <i class="m-nav__link-icon flaticon-share"></i>
                                                                        @if ($tds->is_published == 1)
                                                                            <span class="m-nav__link-text">Unpublish</span>   
                                                                        @else
                                                                            <span class="m-nav__link-text">Publish</span>
                                                                        @endif                                                                    
                                                                    </a>
                                                                </li>
                                                                @endif
                                                                @if ($crud->approval > 0)
                                                                <li class="m-nav__item">
                                                                    <a href="/tender/approval/{{ $tds->id }}" class="m-nav__link">
                                                                        <i class="m-nav__link-icon flaticon-warning-sign"></i>
                                                                        @if ($tds->is_approval == 1)
                                                                            <span class="m-nav__link-text">Batal Ajukan</span>   
                                                                        @else
                                                                            <span class="m-nav__link-text">Ajukan</span>
                                                                        @endif                                                                    
                                                                    </a>
                                                                </li>
                                                                @endif
                                                                <li class="m-nav__item">
                                                                    <a href="/tender/exportPDF/{{ $tds->id }}" class="m-nav__link">
                                                                        <i class="m-nav__link-icon flaticon-technology"></i>
                                                                        <span class="m-nav__link-text">Print</span>
                                                                    </a>
                                                                </li>
                                                                <li class="m-nav__item">
                                                                    <a href="/tender/uploadfile/{{ $tds->id }}" data-id="{{ $tds->id }}" class="m-nav__link" data-toggle="modal" data-target="#uploadFile{{ $tds->id }}">
                                                                        <i class="m-nav__link-icon flaticon-upload"></i>
                                                                            <span class="m-nav__link-text">Upload File</span>
                                                                    </a>
                                                                </li>
                                                                @if ($tds->is_published == 0)
                                                                    @if ($crud->edit > 0)
                                                                    <li class="m-nav__item">
                                                                        <a href="/tender/edit/{{ $tds->id }}" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-edit-1"></i>
                                                                            <span class="m-nav__link-text">Edit</span>
                                                                        </a>
                                                                    </li>
                                                                    @endif
                                                                    @if ($crud->destroy > 0)
                                                                    <li class="m-nav__item">
                                                                        <a href="/tender/destroy/{{ $tds->id }}" class="m-nav__link delete-confirm">
                                                                            <i class="m-nav__link-icon flaticon-delete"></i>
                                                                            <span class="m-nav__link-text">Hapus</span>
                                                                        </a>
                                                                    </li>
                                                                    @endif
                                                                @endif
                                                             
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <!--end: Dropdown-->
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
      <!-- Modal -->
      @foreach ($tenders as $tds)          
      <div class="modal fade" id="uploadFile{{ $tds->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div> 
               
                <div class="modal-body">
                    <form action="/tender/upload/simpan" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="PUT" />
                            <input type="hidden" name="id" value="{{$tds->id}}" />
                            {{-- <input type="hidden" name="tender_id" value="{{$tenders->id}}" /> --}}
                        </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nomor Pengumuman:</label>
                        <input type="text" name="nomor_pr" class="form-control" id="nomor_pr"
                            value="{{ $tds->nomor_pr }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nama File:</label>
                        <input type="text" name="nama_file" class="form-control" id="nama_file"
                            value="{{ $tds->nama_file }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">File Upload:</label>
                        <input type="file" name="filepdf[]" class="form-control" id="filepdf" multiple required>
                        @if($errors->has('file'))
                        <small class="error">{{ $errors->first('file') }}</small>
                        @endif
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
    @endforeach
@endif
</div>
@endsection

@section('footer-script')

<script src="{{ asset('assets/demo/default/custom/components/base/dropdown.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
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