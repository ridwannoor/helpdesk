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
                        <a href="/hargabarang/add"
                            class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
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
            {{-- <form class="m-form m-form--fit" action="/hargabarang/search" method="GET">
                <div class="row">
                    <div class="col-lg-4 ">
                        <label>Nama Barang:</label>
                        <input type="text" class="form-control m-input" name="nama_brg" data-col-index="0">
                    </div>
                    <div class="col-lg-4 ">
                        <label>Vendor:</label>
                        <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="vendor_id" data-col-index="0">
                            <option value="">Please Select</option>
                            @foreach ($vendors as $item)
                            <option value="{{$item->id}}">{{$item->namaperusahaan . ", " . $item->badanusaha->kode}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4 ">
                        <label>Lokasi:</label>
                        <select class="form-control m-bootstrap-select m_selectpicker" name="lokasi_id" data-col-index="2">
                            <option value="">Please Select</option>
                            @foreach ($lokasis as $item)
                            <option value="{{$item->id}}">{{$item->kode}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <br>
           

                <div class="row">
                    <div class="col-lg-12">
                        <div class="btn-group">
                            <input type="submit" value="Search" class="btn btn-brand m-btn m-btn--icon">
                            <a href="/hargabarang" class="btn btn-secondary m-btn m-btn--icon">Reset</a>
                        </div>

                    </div>
                </div>
                <div class="m-separator m-separator--md m-separator--dashed"></div>
            </form> --}}
            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1_wrapper">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Satuan</th>
                        <th>Harga Lama</th>
                        <th>Harga Skrg</th>
                        <th>Tanggal Update</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @php
                $no = 1 ;
                @endphp
                <tbody>

                    @foreach ($hargabrgs as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td> 
			 <div class="row">
			    <div class="col-sm-3">
                    <img src="{{ url('data_file/'.$item->image) }}" alt="image" width="30px" height="30px">
                </div>
                <div class="col-sm-9">
                    <strong><a href="/hargabarang/show/{{ $item->id }}">{!! $item->nama_brg !!}</a></strong><br>
                    {{ $item->vendor->namaperusahaan }}, {{ $item->lokasi->kode }}
                </div>
			 </div>
			</td>
             <td style="vertical-align : middle;text-align:center;">
                {{ number_format($item->qty) }}
            </td>
                        <td style="vertical-align : middle;text-align:center;">{{ $item->satuan }}</td>
                        <td>{{$item->currency->name . " " . format_uang($item->harga_lama) }}</td>
                        <td>{{ $item->currency->name . " " . format_uang($item->harga   ) }}</td>
                        <td>{{date("d-m-Y", strtotime($item->updated_at))}}</td>
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
                                                        {{-- @if ($crud->publish)     
                                                            @if ($item->is_published)
                                                                <li class="m-nav__item">
                                                                    <a href="/hargabarang/publish/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-multimedia-5"></i>  <span class="m-nav__link-text">Draft</span></a>
                                                                </li> 
                                                            @else
                                                                <li class="m-nav__item">
                                                                    <a href="/hargabarang/publish/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-multimedia-5"></i>  <span class="m-nav__link-text">Publish</span></a>
                                                                </li> 
                                                            @endif   
                                                        @endif               --}}
                                                        {{-- @if ($crud->cetak)                       
                                                        <li class="m-nav__item">
                                                            <a href="/hargabarang/cetak/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-technology"></i>  <span class="m-nav__link-text">Print</span></a>
                                                        </li>  
                                                        @endif               --}}
                                                        {{-- @if ($crud->upload) --}}
                                                        {{-- <li class="m-nav__item">
                                                            <a href="/hargabarang/upload/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-upload"></i>  <span class="m-nav__link-text">Upload File</span></a>
                                                        </li>                                                           --}}
                                                        {{-- @endif               --}}
                                                        @if ($crud->edit)
                                                        <li class="m-nav__item">
                                                            <a href="/hargabarang/edit/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-edit"></i>  <span class="m-nav__link-text">Edit</span></a>
                                                        </li>  
                                                        @endif              
                                                        @if ($crud->destroy)
                                                        <li class="m-nav__item">
                                                            <a href="/hargabarang/destroy/{{$item->id}}" class="m-nav__link"><i class="m-nav__link-icon flaticon-delete"></i>  <span class="m-nav__link-text">Hapus</span></a>
                                                        </li>
                                                        @endif                                       
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            {{-- @if ($crud->show == 1)
                            <a href="/hargabarang/show/{{ $item->id }}"
                                class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i
                                    class="flaticon-visible"></i></a>

                            @endif --}}
                            {{-- @if ($crud->edit)
                            <a href="/hargabarang/edit/{{ $item->id }}"
                                class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i
                                    class="flaticon-edit"></i></a>

                            @endif
                            @if ($crud->destroy)
                            <a href="/hargabarang/destroy/{{ $item->id }}"
                                class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill delete-confirm"><i
                                    class="flaticon-delete"></i></a>

                            @endif --}}
                            {{-- <a href="/hargabarang/show/{{ $brg->id }}" class="m-portlet__nav-link btn m-btn
                            m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i
                                class="flaticon-visible"></i></a> --}}
                        </td>
                    </tr>
                    {{-- @endif --}}


                    {{-- @endforeach --}}
                    @endforeach
                </tbody>
            </table>
            {{-- </div> --}}
            <!--begin: Datatable -->

        </div>
        <div class="m-portlet__foot">
            <p>Keterangan : </p>
            <span>Harga Lama : Harga /6 bulan lalu</span> <br>
            <span>Harga Baru : Harga /6 bulan Sekarang dan /6 bulan kedepan</span>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>--}}
<script>
    $(document).ready(function () {
        $("#paket").select2({
            placeholder: "Silahkan Pilih"
        });
    });
</script>
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