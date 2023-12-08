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
    <div class="m-portlet m-portlet--tabs">
        
        <div class="m-portlet__head">
            <div class="m-portlet__head-tools">
                <ul class="nav nav-tabs m-tabs-line m-tabs-line--primary m-tabs-line--2x" role="tablist">
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_6_1" role="tab">
                            <i class="la la-dollar"></i> PUM
                        </a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_2" role="tab">
                            <i class="la la-briefcase"></i> PJ PUM
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">    
            @include('component.alertnotification')               
            <div class="tab-content">
                <div class="tab-pane active" id="m_tabs_6_1" role="tabpanel">
                    {{-- <div class="col-lg-12"> --}}
                       
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
                                            @if ($crud->create == 1)
                                            <a href="/pum/create" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                                <span>
                                                    <i class="la la-plus"></i>
                                                    <span>New Record</span>
                                                </span>
                                            </a>    
                                            @endif     
                                        </li>
                                        <li class="m-portlet__nav-item">
                                            <div class="modal fade" id="pumMdl1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">{{ $judul }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                        <form action="/pum/exportPDF" method="get">
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
                                            <a href="#" target="__blank"  data-toggle="modal" data-target="#pumMdl1" class="btn btn-danger m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" rel="noopener noreferrer"> <i class="fa fa-file-pdf"></i>&nbsp; Export PDF</a>
                                            </span></a>
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
                                            <th style="vertical-align : middle;text-align:center;">No</th>
                                            <th style="vertical-align : middle;text-align:center;">Tanggal</th>
                                            <th style="vertical-align : middle;text-align:center;">PUM</th>
                                            <th style="vertical-align : middle;text-align:center;">Lokasi</th>
                                            <th style="vertical-align : middle;text-align:center;">Status</th>
                                            <th style="vertical-align : middle;text-align:center;">Actions</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $no = 1 ;
                                    @endphp
                                    <tbody>
                                            @foreach ($pums as $item)
                                        <tr>
                                            
                                            <td width="50px">{{ $no++ }}</td>
                                            <td style="vertical-align : middle;text-align:center;" width="120px">
                                                <div class="m-stack m-stack--ver m-stack--tablet m-stack--demo p-2">
                                                    <div class="m-stack__item m-stack__item--center m-stack__item--top text-center"><h4><strong>{{ date('d', strtotime($item->tanggal))  }}</strong></h4> </div>
                                                    <div class="m-stack__item m-stack__item--center m-stack__item--bottom m--bg-brand text-center"><h6 class="m--font-light">{{ date('M Y', strtotime($item->tanggal))  }}</h6> </div>
                                                </div>
                                                {{-- {{  date("d-m-Y", strtotime($item->tanggal))}} --}}
                                            </td>
                                            <td>
                                            <a href="/pum/show/{{ $item->id }}" target="_blank">
                                            <strong>{{ $item->no_pum }}</strong>
                                            </a> <br>
                                            {{ $item->nama_pek }}
                                            </td>
                                           
                                            <td style="vertical-align : middle;text-align:center;"><span class="m-badge m-badge--brand m-badge--wide">{{ $item->lokasi->kode }}</span></td>
                                            <td style="vertical-align : middle;text-align:center;">
                                                @if ($item->is_published == 0)
                                                <span class="m-badge m-badge--warning m-badge--wide">draft</span>
                                                @else
                                                <span class="m-badge m-badge--success m-badge--wide">publish</span>
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
                                                                            @if ($crud->publish)     
                                                                                @if ($item->is_published)
                                                                                    <li class="m-nav__item">
                                                                                        <a href="/pum/publish/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-multimedia-5"></i>  <span class="m-nav__link-text">Draft</span></a>
                                                                                    </li> 
                                                                                @else
                                                                                    <li class="m-nav__item">
                                                                                        <a href="/pum/publish/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-multimedia-5"></i>  <span class="m-nav__link-text">Publish</span></a>
                                                                                    </li> 
                                                                                @endif   
                                                                            @endif              
                                                                            @if ($crud->cetak)                       
                                                                            <li class="m-nav__item">
                                                                                <a href="/pum/cetak/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-technology"></i>  <span class="m-nav__link-text">Print</span></a>
                                                                            </li>  
                                                                            @endif              
                                                                            {{-- @if ($crud->upload) --}}
                                                                            <li class="m-nav__item">
                                                                                <a href="/pum/upload/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-upload"></i>  <span class="m-nav__link-text">Upload File</span></a>
                                                                            </li>                                                          
                                                                            {{-- @endif               --}}
                                                                            @if ($item->is_published == 0)
                                                                                @if ($crud->edit)
                                                                                <li class="m-nav__item">
                                                                                    <a href="/pum/edit/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-edit"></i>  <span class="m-nav__link-text">Edit</span></a>
                                                                                </li>  
                                                                                @endif              
                                                                                @if ($crud->destroy)
                                                                                <li class="m-nav__item">
                                                                                    <a href="/pum/destroy/{{$item->id}}" class="m-nav__link delete-confirm"><i class="m-nav__link-icon flaticon-delete"></i>  <span class="m-nav__link-text">Hapus</span></a>
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
                    {{-- </div> --}}
                </div>
                <div class="tab-pane" id="m_tabs_6_2" role="tabpanel">
                    {{-- <div class="col-lg-12"> --}}
                        <div class="m-portlet m-portlet--mobile">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            {{ $judul1 }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="m-portlet__head-tools">
                                    <ul class="m-portlet__nav">
                                        <li class="m-portlet__nav-item">
                                            @if ($crud->create == 1)
                                            <a href="/pjpum/create" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                                <span>
                                                    <i class="la la-plus"></i>
                                                    <span>New Record</span>
                                                </span>
                                            </a>    
                                            @endif     
                                        </li>
                                        <li class="m-portlet__nav-item">
                                            <div class="modal fade" id="pumMdl" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">{{ $judul1 }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                        <form action="/pjpum/exportPDF" method="get">
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
                                            <a href="#" target="__blank"  data-toggle="modal" data-target="#pumMdl" class="btn btn-danger m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" rel="noopener noreferrer"> <i class="fa fa-file-pdf"></i>&nbsp; Export PDF</a>
                                            </span></a>
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
                                            <th style="vertical-align : middle;text-align:center;">No</th>
                                            <th style="vertical-align : middle;text-align:center;">Tanggal</th>
                                            <th style="vertical-align : middle;text-align:center;">PJ PUM</th>
                                            <th style="vertical-align : middle;text-align:center;">Status</th>
                                            <th style="vertical-align : middle;text-align:center;">Actions</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $no = 1 ;
                                    @endphp
                                    <tbody>
                                        @foreach ($pjpums as $item)
                                        <tr>
                                            
                                            <td width="50px">{{ $no++ }}</td>
                                            <td style="vertical-align : middle;text-align:center;" width="150px">
                                                <div class="m-stack m-stack--ver m-stack--tablet m-stack--demo p-2">
                                                    <div class="m-stack__item m-stack__item--center m-stack__item--top text-center"><h4><strong>{{ date('d', strtotime($item->tanggal))  }}</strong></h4> </div>
                                                    <div class="m-stack__item m-stack__item--center m-stack__item--bottom m--bg-brand text-center"><h6 class="m--font-light">{{ date('M Y', strtotime($item->tanggal))  }}</h6> </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="/pjpum/show/{{ $item->id }}" target="_blank">
                                                <strong>{{ $item->no_pjpum }}</strong>
                                                </a> <br>
                                                {{ $item->pumheader->no_pum }} <br>
                                                {{ $item->pumheader->nama_pek }} 
                                            </td>                           
                                            <td style="vertical-align : middle;text-align:center;">
                                                @if ($item->is_published == 0)
                                                <span class="m-badge m-badge--warning m-badge--wide">draft</span>
                                                @else
                                                <span class="m-badge m-badge--success m-badge--wide">publish</span>
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
                                                                            @if ($crud->publish)     
                                                                                @if ($item->is_published)
                                                                                    <li class="m-nav__item">
                                                                                        <a href="/pjpum/publish/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-multimedia-5"></i>  <span class="m-nav__link-text">Draft</span></a>
                                                                                    </li> 
                                                                                @else
                                                                                    <li class="m-nav__item">
                                                                                        <a href="/pjpum/publish/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-multimedia-5"></i>  <span class="m-nav__link-text">Publish</span></a>
                                                                                    </li> 
                                                                                @endif   
                                                                            @endif              
                                                                            @if ($crud->cetak)                       
                                                                            <li class="m-nav__item">
                                                                                <a href="/pjpum/cetak/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-technology"></i>  <span class="m-nav__link-text">Print</span></a>
                                                                            </li>  
                                                                            @endif              
                                                                            {{-- @if ($crud->upload) --}}
                                                                            <li class="m-nav__item">
                                                                                <a href="/pjpum/upload/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-upload"></i>  <span class="m-nav__link-text">Upload File</span></a>
                                                                            </li>                                                          
                                                                            {{-- @endif               --}}
                                                                            @if ($crud->edit)
                                                                            <li class="m-nav__item">
                                                                                <a href="/pjpum/edit/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-edit"></i>  <span class="m-nav__link-text">Edit</span></a>
                                                                            </li>  
                                                                            @endif              
                                                                            @if ($crud->destroy)
                                                                            <li class="m-nav__item">
                                                                                <a href="/pjpum/destroy/{{$item->id}}" class="m-nav__link delete-confirm"><i class="m-nav__link-icon flaticon-delete"></i>  <span class="m-nav__link-text">Hapus</span></a>
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
                    {{-- </div> --}}
                </div>
            </div>      
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
{{-- <script>
   $('.mdl').click(function(){
    var id=$(this).data('id');
    $('#modalDelete').attr('href','delete-cover.php?id='+id);
    })
</script> --}}
@endsection