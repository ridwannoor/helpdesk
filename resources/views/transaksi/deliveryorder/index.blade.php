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
                        @if ($crud->create == 1)
                        <a href="/do/create" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                            <span>
                                <i class="la la-plus"></i>
                                <span>New record</span>
                            </span>
                        </a>    
                        @endif     
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
                        <th style="vertical-align : middle;text-align:center;">No</th>
                        <th style="vertical-align : middle;text-align:center;">Tanggal</th>
                        <th style="vertical-align : middle;text-align:center;">Delivery Order</th>                     
                        <th style="vertical-align : middle;text-align:center;">Lokasi</th>
                        <th style="vertical-align : middle;text-align:center;">Status</th>
                        <th style="vertical-align : middle;text-align:center;">Actions</th>
                    </tr>
                </thead>
                @php
                    $no = 1 ;
                @endphp
                <tbody>
                        @foreach ($does as $item)
                    <tr>
                        
                        <td style="width: 50px">{{ $no++ }}</td>
                        <td style="vertical-align : middle;text-align:center;" width="100px">
                            <div class="m-stack m-stack--ver m-stack--tablet m-stack--demo p-2">
                                <div class="m-stack__item m-stack__item--center m-stack__item--top text-center"><h4><strong>{{ date('d', strtotime($item->tanggal))  }}</strong></h4> </div>
                                <div class="m-stack__item m-stack__item--center m-stack__item--bottom m--bg-brand text-center"><h6 class="m--font-light">{{ date('M Y', strtotime($item->tanggal))  }}</h6> </div>
                            </div>
                        </td>
                        <td width="200px">
                            <a href="/do/show/{{ $item->id }}" target="_blank">
                            <strong>{{ $item->no_do }}</strong>
                            </a> <br>
                            {{ $item->perihal }}
                        </td>                    
                        <td style="vertical-align : middle;text-align:center;"><span class="m-badge m-badge--brand m-badge--wide">{{ $item->lokasi->kode }}</span></td>
                        <td style="vertical-align : middle;text-align:center;">
                            @if ($item->is_published == 0)
                            <span class="m-badge m-badge--warning m-badge--wide">draft</span>
                            @else
                            <span class="m-badge m-badge--success m-badge--wide">publish</span>
                            @endif
                        </td>
                        <td width='150px' style="vertical-align : middle;text-align:center;">
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
                                                        <li class="m-nav__item">
                                                            <a href="/do/publish/{{$item->id}}" class="m-nav__link publish-confirm"><i class="m-nav__link-icon flaticon-multimedia-5 "></i>  <span class="m-nav__link-text">Publish</span></a>
                                                        </li>             
                                                        @endif              
                                                        @if ($crud->cetak)                       
                                                        <li class="m-nav__item">
                                                            <a href="/do/cetak/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-technology"></i>  <span class="m-nav__link-text">Print</span></a>
                                                        </li>  
                                                        @endif              
                                                        {{-- @if ($crud->upload) --}}
                                                        <li class="m-nav__item">
                                                            <a href="/do/track/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-truck"></i>  <span class="m-nav__link-text">Tracking</span></a>
                                                        </li>                                                          
                                                        {{-- @endif               --}}
                                                        @if ($item->is_published == 0)
                                                            @if ($crud->edit)
                                                            <li class="m-nav__item">
                                                                <a href="/do/edit/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-edit"></i>  <span class="m-nav__link-text">Edit</span></a>
                                                            </li>  
                                                            @endif              
                                                            @if ($crud->destroy)
                                                            <li class="m-nav__item">
                                                                <a href="/do/destroy/{{$item->id}}" class="m-nav__link delete-confirm"><i class="m-nav__link-icon flaticon-delete"></i>  <span class="m-nav__link-text">Hapus</span></a>
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
                        {{-- <td width='150px'>
                            @if ($item->is_published)
                                @if ($crud->cetak == 1) 
                                    <a href="/do/cetak/{{$item->id}}" target="_blank" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-technology"></i></a>
                                @endif
                                @if ($crud->show == 1) 
                                    <a href="/do/publish/{{ $item->id }}"  class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill publish-confirm" ><i class="flaticon-multimedia-5"></i></a>                            
                                @endif 
                                @if ($crud->destroy == 1) 
                                    <a href="/do/destroy/{{ $item->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill delete-confirm"><i class="flaticon-delete"></i></a>
                                @endif 
                                <a href="/do/track/{{ $item->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-truck"></i></a>
                                 
                            @else
                                @if ($crud->cetak == 1) 
                                <a href="/do/cetak/{{$item->id}}" target="_blank" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-technology"></i></a>
                                @endif   
                                @if ($crud->show == 1) 
                                    <a href="/do/publish/{{ $item->id }}"  class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill publish-confirm" ><i class="flaticon-multimedia-5"></i></a>                            
                                @endif 
                                @if ($crud->edit == 1) 
                                    <a href="/do/edit/{{ $item->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-edit"></i></a>
                                @endif
                                @if ($crud->destroy == 1) 
                                    <a href="/do/destroy/{{ $item->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill delete-confirm"><i class="flaticon-delete"></i></a>
                                @endif
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