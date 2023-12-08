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
        </div>
        <div class="m-portlet__body">
            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1_wrapper">
                <thead>
                    <tr>
                        <th width="50px" style="vertical-align : middle;text-align:center;">No</th>
                        <th>Tgl Terima</th>
                        <th style="vertical-align : middle;text-align:center;">Delivery Order</th>
                        <th style="vertical-align : middle;text-align:center;">Lokasi</th>
                        <th width="150px" style="vertical-align : middle;text-align:center;">Status</th>
                        <th style="vertical-align : middle;text-align:center;">Actions</th>
                    </tr>
                </thead>
                @php
                    $no = 1 ;
                @endphp
                <tbody>
                    @foreach ($userdo as $item)
                        @foreach ($item->doheaders as $doheader)
                        @if ($doheader->is_published == '1' )  
                        <tr>
                            <td style="vertical-align : middle;text-align:center;">{{ $no++ }}</td>
                            <td>
                                @if ($item->tanggal_terima)
                                <div class="m-stack m-stack--ver m-stack--tablet m-stack--demo p-2">
                                    <div class="m-stack__item m-stack__item--center m-stack__item--top text-center"><h4><strong>{{ date('d', strtotime($item->tanggal_terima))  }}</strong></h4> </div>
                                    <div class="m-stack__item m-stack__item--center m-stack__item--bottom m--bg-brand text-center"><h6 class="m--font-light">{{ date('M Y', strtotime($item->tanggal_terima))  }}</h6> </div>
                                </div>
                                @endif                              
                            </td>
                            <td style="vertical-align : middle;text-align:left;">
                                <a href="/receivedo/show/{{ $doheader->id }}" target="_blank"><strong>{{   $doheader->no_do  }}</strong></a>
                                <br>
                                {{ $doheader->perihal }}
                            </td>                      
                            <td style="vertical-align : middle;text-align:center;"><span class="m-badge m-badge--brand m-badge--wide">{{ $doheader->lokasi->kode }}</span></td>
                            <td style="vertical-align : middle;text-align:center;"> 
                                @if ($doheader->is_published_ro == 0)
                                    <span class="m-badge m-badge--warning m-badge--wide ">draft</span>
                                @else
                                    <span class="m-badge m-badge--success m-badge--wide ">publish</span>
                                @endif
                            </td>
                            <td style="vertical-align : middle;text-align:center;">
                                @if ($doheader->is_published_ro == 1)
                                    {{-- <a href="/receivedo/publish/{{ $item->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-multimedia-5"></i></a>                             --}}
                                    {{-- <a href="/receivedo/show/{{ $item->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-visible"></i></a> --}}
                                @else
                                    @if ($crud->edit > 0)
                                        <a href="/receivedo/edit/{{ $doheader->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-edit"></i></a>
                                    @endif
                            @endif
                        </tr>    
                        @endif     
                        @endforeach
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

    // $('.edit-confirm').on('click', function (event) {
    //     event.preventDefault();
    //     const url = $(this).attr('href');
    //     swal({
    //         title: 'Anda Sudah Yakin?',
    //         text: 'Data Ini Akan Diubah !',
    //         icon: 'warning',
    //         buttons: ["Tidak", "Iya !"],
    //     }).then(function(value) {
    //         if (value) {
    //             window.location.href = url;
    //         }
    //     });
    // });
</script>
@endsection