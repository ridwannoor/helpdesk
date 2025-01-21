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
                        <span class="m-nav__link-text">Kumpulan Risalah Rapat</span>
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
                        Tabel {{ $judul }}
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        @if ($crud->create > 0)
                        <a href="/mom/create"
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
                                    <form action="/mom/exportPDF" method="get">
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
                        <th>Tanggal dan jam Rapat</th>
                        <th>Agenda Rapat</th>
                        <th>Lokasi Rapat</th>
                        <th>Peserta Rapat</th>
                        <th>File MoM</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @php
                $no = 1 ;
                @endphp
                <tbody>
                    @foreach ($moms as $item)
                    <tr>

                        <td>{{ $no++ }}</td>
                        <td width='120px'>
                            <div class="m-stack m-stack--ver m-stack--tablet m-stack--demo p-2">
                                <div class="m-stack__item m-stack__item--center m-stack__item--top text-center"><h4><strong>{{ date('d M Y', strtotime($item->tgl_jam_rapat))  }}</strong></h4> </div>
                                <div class="m-stack__item m-stack__item--center m-stack__item--bottom m--bg-accent text-center"><h6 class="m--font-light">{{ date('h:i:s', strtotime($item->tgl_jam_rapat))  }}</h6> </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-lg-12">
                                   <a href="/mom/show/{{ $item->id }}"> {{ $item->nama_agenda }}</a>
                                </div>
                            </div>
                        </td>
                        <td>{{ $item->lokasi }}</td>
                        <td>
                            @foreach ($item->peserta_rapat as $pr)
                                <div>{{ $pr->name }}</div>
                            @endforeach
                        </td>
                        {{-- <td> 
                            @foreach ($item->lokasi as $lok)
                                <span class="m-badge m-badge--metal m-badge--wide">{{ $lok->kode }}</span>
                            @endforeach  
                        </td> --}}
                        <td>
                            <a href="{{ url('data_file/pdf/'.$item->attach_file) }}" target="_blank"><span class="m-widget4__text">{{$item->attach_file}}</span></a>
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
                                                            <a href="/mom/publish/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-multimedia-5"></i>  <span class="m-nav__link-text">Publish</span></a>
                                                        </li>             
                                                        @endif               --}}
                                                        @if ($crud->cetak)                       
                                                        {{-- <li class="m-nav__item">
                                                            <a href="/mom/cetak/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-technology"></i>  <span class="m-nav__link-text">Print</span></a>
                                                        </li>   --}}
                                                        @endif              
                                                        {{-- @if ($crud->upload) --}}
                                                        {{-- <li class="m-nav__item">
                                                            <a href="/mom/upload/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-upload"></i>  <span class="m-nav__link-text">Upload File</span></a>
                                                        </li>                                                           --}}
                                                        {{-- @endif               --}}
                                                        @if ($crud->edit)
                                                            @if ($item->status == 'done')
                                                                <span></span>
                                                            @else
                                                            <li class="m-nav__item">
                                                                <a href="/mom/edit/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-edit"></i>  <span class="m-nav__link-text">Edit</span></a>
                                                            </li> 
                                                            @endif                                                      
                                                        @endif              
                                                        @if ($crud->destroy)
                                                            @if ($item->status == 'done')
                                                                <span></span>
                                                            @else
                                                                <li class="m-nav__item">
                                                                    <a href="/mom/destroy/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-delete"></i>  <span class="m-nav__link-text">Hapus</span></a>
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
