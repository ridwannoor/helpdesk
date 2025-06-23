@extends('layouts.app2')

@section('m-subheader')
<?php

// var_dump($vendors->cities);
//         return false;

?>
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
        <div>
            <div class="align-right">
                <a href="/vendor" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                    <span>
                        <i class="la la-arrow-left"></i>
                        <span>Kembali</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('m-content')
<div class="m-content">
    @include('component.alertnotification')

    <div class="row">
        <div class="col-md-12">
            <div class="m-portlet m-portlet--brand m-portlet--head-solid-bg m-portlet--rounded">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                               <i class="fa fa-home" aria-hidden="true"></i> &nbsp {{ $judul }}
                            </h3>
                        </div>
                    </div>

                </div>
                <div class="m-portlet__body">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#m_tabs_5_1">Informasi Perusahaan</a>
                        </li>
                        {{-- <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#m_tabs_5_2">Board of Direction</a>
                            </li>   --}}


                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#m_tabs_5_2">Bank</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#m_tabs_5_3">File</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#m_tabs_5_4">History Pekerjaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#m_tabs_5_5">Email Logs</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="m_tabs_5_1" role="tabpanel">
                            <table class="table">
                                <tbody>
                                    <td>Kode Perusahaan</td>
                                    <td>{{ $vendors->kode }}</td>
                                </tbody>
                                <tbody>
                                    <td width="300px">Nama Perusahaan</td>
                                    <td> <strong>{{  $vendors->namaperusahaan . ", " . $vendors->badanusaha->kode }}</strong> <br>
                                        @if ( $vendors->is_published == null)
                                            <span class="m-badge m-badge--danger m-badge--wide">Belum Verifikasi</span>
                                            @if ($vendors->terms == 1)
                                                <span class="m-badge m-badge--warning m-badge--wide">Menunggu Verifikasi</span>
                                            @endif
                                        @else
                                            <span class="m-badge m-badge--success m-badge--wide">Verified</span>
                                        @endif
                                        @if ($vendors->is_published )
                                        <a href="/vendor/certificate/{{ $vendors->id }}" class="m-badge m-badge--accent m-badge--wide" target="_blank"><i class="fa fa-certificate" aria-hidden="true"></i> &nbsp; Sertifikat</a>
                                        @endif
                                    </td>
                                </tbody>
                                <tbody>
                                    <td>Alamat</td>
                                    <td>{{ $vendors->alamat }}</td>
                                </tbody>
                                <tbody>
                                    <td>Provinsi</td>
                                    <td>{{ $vendors->provinsi ? $vendors->provinsi->name : $vendors->cities->provinsi_name }}</td>
                                </tbody>
                                <tbody>
                                    <td>Kota</td>
                                    <td>{{ $vendors->cities ? $vendors->cities->city_name : '-'}}</td>
                                </tbody>
                                <tbody>
                                    <td>NPWP</td>
                                    <td>{{ $vendors->npwp }}</td>
                                </tbody>
                                <tbody>
                                    <td>Email</td>
                                    <td>
                                        @if ( $vendors->is_email_verified == null)
                                      <span class="m--font-warning"> <strong> {{ $vendors->email }}</strong></span>  <br>
                                      <span class="m-badge m-badge--warning m-badge--wide">Unverified</span>
                                        {{-- <form action="/vendor/profile/lupaverifikasi" method="POST" enctype="multipart/form-data">
                                            @csrf


                                            <div class="form-group">

                                                <input type="hidden" name="vendor_id" value="{{ Auth::user('vendor')->id}}" />
                                                <input type="hidden" name="email" value="{{ Auth::user('vendor')->email }}">
                                            </div>
                                            <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-envelope" aria-hidden="true"></i> Send Verification</button>.
                                        </form> --}}

                                       {{-- <button type="submit"></button> --}}
                                        @else
                                            <span class="m--font-success"> <strong> {{ $vendors->email }}</strong></span> <br>
                                            <span class="m-badge m-badge--success m-badge--wide">Verified</span>
                                        @endif
                                    </td>
                                </tbody>
                                <tbody>
                                    <td>Phone Company</td>
                                    <td>{{ $vendors->notelp }}</td>
                                </tbody>
                                <tbody>
                                    <td>Contact Person</td>
                                    <td>{{ $vendors->contactperson . " - " . $vendors->handphone  }}</td>
                                </tbody>
                                <tbody>
                                    <td>Contact Person Alternative</td>
                                    <td>{{ $vendors->alternative_person . " - " . $vendors->alternative_phone }}</td>
                                </tbody>
                                <tbody>
                                    <td>Bidang Pekerjaan</td>
                                    <td>
                                        @foreach ($vendors->jenispekerjaans as $item)
                                        {{ $item->name . " , " }} <br>
                                        @endforeach
                                    </td>
                                </tbody>
                                <tbody>
                                    <td>Bidang Usaha</td>
                                    <td>
                                        @foreach ($vendors->jenisusahas as $item)
                                        {{ $item->detail . " , " }} <br>
                                        @endforeach
                                    </td>
                                </tbody>
                                <tbody>
                                    <td>Kategori Usaha</td>
                                    <td>
                                        @foreach ($vendors->categories as $item)
                                        {{ $item->detail . " , " }} <br>
                                        @endforeach
                                    </td>
                                </tbody>
                                <tbody>
                                    <td>Product</td>
                                    <td>{{ $vendors->product }}</td>
                                </tbody>
                                <tbody>
                                    <td>Website</td>
                                    <td>{{ $vendors->website }}</td>
                                </tbody>
                                {{-- <tbody>
                                    <td>Lokasi</td>
                                    <td>{{ $vendors->lokasi->kode }}</td>
                                </tbody> --}}


                                <tbody>
                                    <td>Tanggal Dibuat</td>
                                    <td>{{ $vendors->created_at }}</td>
                                </tbody>
                                <tbody>
                                    <td>Tanggal Diperbarui</td>
                                    <td>{{ $vendors->updated_at }}</td>
                                </tbody>
                                <tbody>
                                    <td>Catatan</td>
                                    <td>{{ $vendors->catatan }}</td>
                                </tbody>
                                <tbody>
                                    <td>Tanggal Request Verifikasi</td>
                                    <td>{{ $vendors->tgl_request }}</td>
                                </tbody>
                                <tbody>
                                    <td>Tanggal Verifikasi</td>
                                    <td>{{ $vendors->tgl_verifikasi }}</td>
                                </tbody>
                                <tbody>
                                    <td>Keterangan</td>
                                    <td>{{ $vendors->keterangan }}</td>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="m_tabs_5_2" role="tabpanel">
                            {{-- <a href="/vendorbank/add/{{ $vendors->id }}" class="btn btn-accent m-btn m-btn--custom
                            m-btn--pill m-btn--icon m-btn--air">
                            <span>
                                <i class="la la-plus"></i>
                                <span>New record</span>
                            </span>
                            </a> --}}

                            <table class="table mt-4">
                                <thead>
                                    <tr>
                                        <th>Nama Bank</th>
                                        <th>No Rekening</th>
                                        <th>Nama Pemilik</th>
                                        {{-- <th>Actions</th> --}}
                                    </tr>
                                </thead>
                                {{-- @php
                                        $no = 1 ;
                                    @endphp --}}
                                <tbody>
                                    @foreach ($vendors->vendorbank as $vb)
                                    <tr>
                                        <td>  <a href="#" data-id="{{ $vb->id }}" data-toggle="modal"
                                            data-target="#bank_modal_2{{ $vb->id }}">{{ $vb->bank->name . ", " . $vb->bank->code }}</a></td>
                                        <td>{{ $vb->nomor_rek }}</td>
                                        <td>{{ $vb->nama_pemilik }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="m_tabs_5_3" role="tabpanel">
                            {{-- @if ($vendors->is_published == null) --}}
                                @if ($crud->create > 0)

                                <a href="#" data-toggle="modal" data-target="#fileupload_modal_10" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air mb-3">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>New record</span>
                                    </span>
                                </a>

                                @endif
                            {{-- @endif --}}

                            <table class="table table-striped- table-bordered table-hover table-checkable">
                                <thead>
                                    <tr style="background-color: rgb(112, 119, 216)">
                                        <th><strong style="color: aliceblue">File Upload</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="m-widget4">
                                                @foreach ($vendors->itemdetails as $item)
                                                <div class="m-widget4__item">
                                                    {{-- <div class="m-widget4__img m-widget4__img--icon">
                                                             <img src="assets/app/media/img/files/doc.svg" alt="">
                                                         </div> --}}
                                                    <div class="m-widget4__info">
                                                        {{-- <span class="m-widget4__text"> --}}
                                                        <a href="{{ url('data_file/pdf/'.$item->filename) }}"
                                                            target="_blank"><span class="m-widget4__text">
                                                                {{ $item->filename   }}</span></a>
                                                        {{-- </span> 							 		  --}}
                                                    </div>
                                                    @if ($crud->destroy)
                                                        <div class="m-widget4__ext">
                                                            <a href="/vendor/destroyfile/{{$item->id}}"
                                                                class="m-widget4__icon delete-confirm">
                                                                <i class="la la-close"></i>

                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="m_tabs_5_4" role="tabpanel">
                            <!-- List group -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#" data-target="#m_1_1">Purchase Order</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#m_1_2">Tender</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#m_1_4">BA Aanwidjzing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#m_1_5">BA Nego</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#m_1_6">SPK</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#m_1_7">SPP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#m_1_3">Kontrak</a>
                                </li>
                            </ul>

                            {{-- <div class="list-group" id="myList" role="tablist">
                              <a class="list-group-item list-group-item-action active" data-toggle="list" href="#po" role="tab">Purchase Order</a>
                              <a class="list-group-item list-group-item-action" data-toggle="list" href="#bap" role="tab">BA Nego Procurement</a>
                              <a class="list-group-item list-group-item-action" data-toggle="list" href="#bal" role="tab">BA Nego Logistik</a>
                              <a class="list-group-item list-group-item-action" data-toggle="list" href="#tender" role="tab">Tender</a>
                              <a class="list-group-item list-group-item-action" data-toggle="list" href="#kontrak" role="tab">Kontrak</a>
                            </div> --}}

                            <!-- Tab panes -->
                            <div class="tab-content">
                              <div class="tab-pane active" id="m_1_1" role="tabpanel">
                                <div class="col-lg-12">
                                    <div class="m-portlet__body">
                                        <div class="m-scrollable m-scroller ps ps--active-y" data-scrollable="true" style="height: 600px; overflow: hidden;">
                                        <div class="m-list-timeline m-list-timeline--skin-light">
                                            <div class="m-list-timeline__items">
                                                @foreach ($vendors->rekappos as $item)
                                                <div class="m-list-timeline__item bg-light p-3 mb-3" style="border-radius : 10px">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                                                    <span class="m-list-timeline__text">
                                                      <span class="text-uppercase">{{ $item->no_po }}</span>   <br>
                                                      <span class="text-uppercase"><strong><a href="#">{{ $item->nama_pekerjaan }}</a> </strong> </span>
                                                    </span>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                              <div class="tab-pane" id="m_1_2" role="tabpanel">
                                <div class="col-lg-12">
                                    <div class="m-portlet__body">
                                        <div class="m-scrollable m-scroller ps ps--active-y" data-scrollable="true" style="height: 600px; overflow: hidden;">
                                        <div class="m-list-timeline m-list-timeline--skin-light">
                                            <div class="m-list-timeline__items">
                                            </div>
                                        </div>
                                        </div>
                                        {{-- <div class="pull-right p-3 mb-4">{{ $vendors->links() }}</div> --}}
                                    </div>
                                </div>
                              </div>
                              <div class="tab-pane" id="m_1_3" role="tabpanel">
                                <div class="col-lg-12">
                                    @if ($crud->create)

                                    <a href="#" data-toggle="modal" data-target="#fileupload_modal_11" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air mb-3">
                                        <span>
                                            <i class="la la-plus"></i>
                                            <span>New record</span>
                                        </span>
                                    </a>

                                    @endif
                                </div>
                                <div class="col-lg-12">
                                    <div class="m-portlet__body">
                                        <div class="m-scrollable m-scroller ps ps--active-y" data-scrollable="true" style="height: 600px; overflow: hidden;">
                                        <div class="m-list-timeline m-list-timeline--skin-light">
                                            <div class="m-list-timeline__items">
                                                @foreach ($vendors->vendorkontrak as $item)
                                                <div class="m-list-timeline__item bg-light p-3 mb-3" style="border-radius : 10px">
                                                    <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                                                    <span class="m-list-timeline__text">
                                                      <span class="text-uppercase">{{ $item->name }}</span>   <br>
                                                      <span class="text-uppercase"><strong><a href="{{ url('data_file/pdf/'.$item->filepdf) }}">{{ $item->pekerjaan }}</a> </strong> </span>
                                                    </span>
                                                    @if ($crud->destroy)
                                                    <span class="m-widget4__ext">
                                                        <a href="/vendor/destroyfilekontrak/{{$item->id}}"
                                                            class="m-widget4__icon delete-confirm">
                                                            <i class="la la-close"></i>

                                                        </a>
                                                    </span>
                                                    @endif
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        </div>
                                        {{-- <div class="pull-right p-3 mb-4">{{ $vendors->links() }}</div> --}}
                                    </div>
                                </div>
                              </div>
                              <div class="tab-pane" id="m_1_4" role="tabpanel">
                              </div>
                              <div class="tab-pane" id="m_1_5" role="tabpanel">
                            </div>
                            <div class="tab-pane" id="m_1_6" role="tabpanel">
                            </div>
                            <div class="tab-pane" id="m_1_7" role="tabpanel">
                            </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="m_tabs_5_5" role="tabpanel">
                            <div class="m-scrollable m-scroller ps ps--active-y" data-scrollable="true" style="height: 600px; overflow: hidden;">
                                <div class="m-list-timeline m-list-timeline--skin-light">
                                    <div class="m-list-timeline__items">
                                        @foreach ($vendors->vendormaillogs as $item)
                                        <div class="m-list-timeline__item bg-light p-3 mb-3" style="border-radius : 10px">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                                            <span class="m-list-timeline__text">
                                              <span class="text-uppercase">{{ $item->name }}</span>   <br>
                                              <span class="text-uppercase"><strong><a href="#">{{ $item->deskripsi }}</a> </strong> </span>
                                            </span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="m-portlet m-portlet--brand m-portlet--head-solid-bg m-portlet--rounded">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                <i class="fa fa-list" aria-hidden="true"></i> &nbsp Dokumen Persyaratan
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin::Section-->
                    <div class="m-section">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs nav-fill" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#m_tabs_1_1">Lisensi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#m_tabs_1_2">Pengurus</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#m_tabs_1_3">Lap Keuangan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#m_tabs_1_4">Setifikat Badan Usaha (SBU)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#m_tabs_1_5">Tenaga Ahli</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#m_tabs_1_6">Fasilitas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#m_tabs_1_7">Pengalaman</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#m_tabs_1_8">Dok Lainnya</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                                        {{-- @if (Auth::user('vendor')->is_published == 0)
                                            <a href="#" class="btn m-btn--pill m-btn--air btn-success m-btn m-btn--custom m-4 pull-right" data-toggle="modal" data-target="#m_modal_5" >+ Tambah</a>
                                        @endif --}}
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>DOKUMEN</th>
                                                    <th>NOMOR</th>
                                                    <th>KETERANGAN</th>
                                                    <th>STATUS</th>
                                                    {{-- <th>ACTION</th> --}}
                                                </tr>
                                            </thead>
                                            @php
                                            $no = 1 ;
                                            @endphp
                                            <tbody>
                                                {{-- @foreach ($vendors as $item) --}}
                                                @foreach ($vendors->vendorlisensi as $vl)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td><a href="vendors/vendorlisensi" data-id="{{ $vl->id }}" data-toggle="modal"
                                                            data-target="#m_modal_6{{ $vl->id }}">{{ $vl->vendorjenis->keterangan }}</a>
                                                    </td>
                                                    <td>{{ $vl->nomor }}</td>
                                                    <td>{{ $vl->keterangan }}</td>
                                                    <td>
                                                        @if ($vl->is_published == 0)
                                                        <span
                                                            class="m-badge m-badge--warning m-badge--wide">unverified</span>
                                                        @else
                                                        <span
                                                            class="m-badge m-badge--success m-badge--wide">verified</span>
                                                        @endif
                                                    </td>
                                                    {{-- <td>
                                                        <a href="/vendorlisensi/publish/{{ $vl->id }}"
                                                            class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill">
                                                            <i class="flaticon-multimedia-5"></i> </a> --}}
                                                        {{-- @if ($vl->is_published == 0)
                                                            <a href="#" data-id={{ $vl->id }} data-toggle="modal"
                                                        data-target="#m_modal_7" class="btn btn-accent m-btn m-btn--icon
                                                        m-btn--icon-only m-btn--custom m-btn--pill"><i
                                                            class="fa fa-edit" aria-hidden="true"></i></a>
                                                        <a href="/vendor/profile/lisensi/destroy/{{ $vl->id }}"
                                                            class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></a>
                                                        @endif --}}
                                                    {{-- </td> --}}
                                                </tr>
                                                @endforeach
                                                {{-- @endforeach --}}
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
                                        {{-- @if (Auth::user('vendor')->is_published == 0)
                                            <a href="#" class="btn m-btn--pill m-btn--air btn-success m-btn m-btn--custom m-4 pull-right" data-toggle="modal" data-target="#pengurus_modal_1" >+ Tambah</a>
                                            @endif --}}
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>NAMA</th>
                                                    <th>POSISI</th>
                                                    <th>STATUS</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            @php
                                            $no = 1 ;
                                            @endphp
                                            <tbody>
                                                {{-- @foreach ($vendors as $item) --}}
                                                @foreach ($vendors->vendorpengurus as $vp)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td><a href="#" data-id="{{ $vp->id }}" data-toggle="modal"
                                                            data-target="#pengurus_modal_2{{ $vp->id }}">{{ $vp->nama }}</a>
                                                        @if ($vp->ttd)
                                                        <i class="la la-key"></i>
                                                        @endif</td>
                                                    <td>{{ $vp->posisi . " - " . $vp->jabatan }}</td>
                                                    <td>
                                                        @if ($vp->is_published == 0)
                                                        <span
                                                            class="m-badge m-badge--warning m-badge--wide">unverified</span>
                                                        @else
                                                        <span
                                                            class="m-badge m-badge--success m-badge--wide">verified</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="/vendorbod/publishbod/{{ $vp->id }}"
                                                            class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill">
                                                            <i class="la la-key"></i> </a>
                                                        {{-- <a href="/vendorbod/publish/{{ $vp->id }}"
                                                            class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill">
                                                            <i class="flaticon-multimedia-5"></i> </a> --}}

                                                        {{-- @if ($vl->is_published == 0)
                                                                <a href="#" data-id={{ $vp->id }} data-toggle="modal"
                                                        data-target="#pengurus_modal_3" class="btn btn-accent m-btn
                                                        m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i
                                                            class="fa fa-edit" aria-hidden="true"></i></a>
                                                        <a href="/vendor/profile/pengurus/destroy/{{ $vp->id }}"
                                                            class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></a>
                                                        @endif --}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                                {{-- @endforeach --}}
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
                                        {{-- @if (Auth::user('vendor')->is_published == 0)
                                            <a href="#" class="btn m-btn--pill m-btn--air btn-success m-btn m-btn--custom m-4 pull-right" data-toggle="modal" data-target="#lap_modal_1" >+ Tambah</a>
                                            @endif --}}
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>KETERANGAN</th>
                                                    <th>TAHUN</th>
                                                    <th>STATUS</th>
                                                    {{-- <th>ACTION</th> --}}
                                                </tr>
                                            </thead>
                                            @php
                                            $no = 1 ;
                                            @endphp
                                            <tbody>
                                                {{-- @foreach ($vendors as $ven)     --}}
                                                @foreach ($vendors->vendorlap as $vla)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td><a href="#" data-id="{{ $vla->id }}" data-toggle="modal"
                                                            data-target="#lap_modal_2{{ $vla->id }}">{{ $vla->keterangan }}</a></td>
                                                    <td>{{ $vla->thn }}</td>
                                                    <td>
                                                        @if ($vla->is_published == 0)
                                                        <span
                                                            class="m-badge m-badge--warning m-badge--wide">unverified</span>
                                                        @else
                                                        <span
                                                            class="m-badge m-badge--success m-badge--wide">verified</span>
                                                        @endif
                                                    </td>
                                                    {{-- <td>
                                                        <a href="/vendorlap/publish/{{ $vla->id }}"
                                                            class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill">
                                                            <i class="flaticon-multimedia-5"></i> </a> --}}
                                                        {{-- @if ($vl->is_published == 0)
                                                                <a href="#" data-id={{ $vla->id }} data-toggle="modal"
                                                        data-target="#lap_modal_3" class="btn btn-accent m-btn
                                                        m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i
                                                            class="fa fa-edit" aria-hidden="true"></i></a>
                                                        <a href="/vendor/profile/lap/destroy/{{ $vla->id }}"
                                                            class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></a>
                                                        @endif --}}
                                                    {{-- </td> --}}
                                                </tr>
                                                @endforeach
                                                {{-- @endforeach --}}
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="tab-pane" id="m_tabs_1_4" role="tabpanel">
                                        {{-- @if (Auth::user('vendor')->is_published == 0)
                                            <a href="#" class="btn m-btn--pill m-btn--air btn-success m-btn m-btn--custom m-4 pull-right" data-toggle="modal" data-target="#sertifikat_modal_1" >+ Tambah</a>
                                            @endif --}}
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>NOMOR</th>
                                                    <th>KLASIFIKASI</th>
                                                    <th>TANGGAL</th>
                                                    <th>STATUS</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            @php
                                            $no = 1 ;
                                            @endphp
                                            <tbody>
                                                {{-- @foreach ($vendors as $item) --}}
                                                @foreach ($vendors->vendorsertifikat as $vs)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td><a href="#" data-id="{{ $vs->id }}" data-toggle="modal"
                                                            data-target="#sertifikat_modal_2{{ $vs->id }}">{{ $vs->nomor }}</a></td>
                                                    <td>{{ $vs->klasifikasi }}</td>
                                                    <td>{{ $vs->berlaku_start . " - " . $vs->berlaku_end }}</td>
                                                    <td>
                                                        @if ($vs->is_published == 0)
                                                        <span
                                                            class="m-badge m-badge--warning m-badge--wide">unverified</span>
                                                        @else
                                                        <span
                                                            class="m-badge m-badge--success m-badge--wide">verified</span>
                                                        @endif
                                                    </td>
                                                    {{-- <td>
                                                        <a href="/vendorsertifikat/publish/{{ $vs->id }}"
                                                            class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill">
                                                            <i class="flaticon-multimedia-5"></i> </a> --}}

                                                        {{-- @if ($vl->is_published == 0)
                                                                <a href="#" data-id={{ $vs->id }} data-toggle="modal"
                                                        data-target="#sertifikat_modal_3" class="btn btn-accent m-btn
                                                        m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i
                                                            class="fa fa-edit" aria-hidden="true"></i></a>
                                                        <a href="/vendor/profile/sertifikat/destroy/{{ $vs->id }}"
                                                            class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></a>
                                                        @endif --}}
                                                    {{-- </td> --}}
                                                </tr>
                                                @endforeach
                                                {{-- @endforeach --}}
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="tab-pane" id="m_tabs_1_5" role="tabpanel">
                                        {{-- @if (Auth::user('vendor')->is_published == 0)
                                            <a href="#" class="btn m-btn--pill m-btn--air btn-success m-btn m-btn--custom m-4 pull-right" data-toggle="modal" data-target="#tenaga_modal_1" >+ Tambah</a>
                                            @endif --}}
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>NAMA</th>
                                                    <th>KEAHLIAN</th>
                                                    <th>STATUS</th>
                                                    {{-- <th>ACTION</th> --}}
                                                </tr>
                                            </thead>
                                            @php
                                            $no = 1 ;
                                            @endphp
                                            <tbody>
                                                {{-- @foreach ($vendors as $item) --}}
                                                @foreach ($vendors->vendortenaga as $vt)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td><a href="#" data-id="{{ $vt->id }}" data-toggle="modal"
                                                            data-target="#tenaga_modal_2{{ $vt->id }}">{{ $vt->nama }}</a></td>
                                                    <td>{{ $vt->keahlian }}</td>
                                                    <td>
                                                        @if ($vt->is_published == 0)
                                                        <span
                                                            class="m-badge m-badge--warning m-badge--wide">unverified</span>
                                                        @else
                                                        <span
                                                            class="m-badge m-badge--success m-badge--wide">verified</span>
                                                        @endif
                                                    </td>
                                                    {{-- <td>
                                                        <a href="/vendortenaga/publish/{{ $vt->id }}"
                                                            class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill">
                                                            <i class="flaticon-multimedia-5"></i> </a> --}}

                                                        {{-- @if ($vl->is_published == 0)
                                                                <a href="#" data-id={{ $vt->id }} data-toggle="modal"
                                                        data-target="#tenaga_modal_3" class="btn btn-accent m-btn
                                                        m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i
                                                            class="fa fa-edit" aria-hidden="true"></i></a>
                                                        <a href="/vendor/profile/tenaga/destroy/{{ $vt->id }}"
                                                            class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></a>
                                                        @endif --}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                                {{-- @endforeach --}}
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="tab-pane" id="m_tabs_1_6" role="tabpanel">
                                        {{-- @if (Auth::user('vendor')->is_published == 0)
                                            <a href="#" class="btn m-btn--pill m-btn--air btn-success m-btn m-btn--custom m-4 pull-right" data-toggle="modal" data-target="#fasil_modal_1" >+ Tambah</a>
                                            @endif --}}
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>NAMA</th>
                                                    <th>KEPEMILIKAN ALAT</th>
                                                    <th>STATUS</th>
                                                    {{-- <th>ACTION</th> --}}
                                                </tr>
                                            </thead>
                                            @php
                                            $no = 1 ;
                                            @endphp
                                            <tbody>
                                                {{-- @foreach ($vendors as $vend) --}}
                                                @foreach ($vendors->vendorfasilitas as $vfol)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    {{-- <td><a href="#" data-id="{{ $vfol->id }}" data-toggle="modal"
                                                            data-target="#fasil_modal_5{{ $vfol->id }}">{{ $vfol->vendortipe->keterangan }}</a>
                                                    </td> --}}
                                                    <td><a href="#" data-id="{{ $vfol->id }}" data-toggle="modal"
                                                        data-target="#fasil_modal_5{{ $vfol->id }}">{{ $vfol->kepemilikan . " - " . $vfol->nama}}</a></td>
                                                    <td>
                                                        @if ($vfol->is_published == 0)
                                                        <span
                                                            class="m-badge m-badge--warning m-badge--wide">unverified</span>
                                                        @else
                                                        <span
                                                            class="m-badge m-badge--success m-badge--wide">verified</span>
                                                        @endif
                                                    </td>
                                                    {{-- <td>
                                                        <a href="/vendorfasilitas/publish/{{ $vfol->id }}"
                                                            class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill">
                                                            <i class="flaticon-multimedia-5"></i> </a> --}}

                                                        {{-- @if ($vl->is_published == 0)
                                                                <a href="#" data-id={{ $vfol->id }} data-toggle="modal"
                                                        data-target="#fasil_modal_3" class="btn btn-accent m-btn
                                                        m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i
                                                            class="fa fa-edit" aria-hidden="true"></i></a>
                                                        <a href="/vendor/profile/fasilitas/destroy/{{ $vfol->id }}"
                                                            class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></a>
                                                        @endif --}}
                                                    {{-- </td> --}}
                                                </tr>
                                                @endforeach
                                                {{-- @endforeach --}}
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="tab-pane" id="m_tabs_1_7" role="tabpanel">
                                        {{-- @if (Auth::user('vendor')->is_published == 0)
                                            <a href="#" class="btn m-btn--pill m-btn--air btn-success m-btn m-btn--custom m-4 pull-right" data-toggle="modal" data-target="#pengal_modal_1" >+ Tambah</a>
                                            @endif --}}
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>NAMA</th>
                                                    <th>KONTRAK</th>
                                                    <th>STATUS</th>
                                                    {{-- <th>ACTION</th> --}}
                                                </tr>
                                            </thead>
                                            @php
                                            $no = 1 ;
                                            @endphp
                                            <tbody>
                                                {{-- @foreach ($vendors as $item) --}}
                                                @foreach ($vendors->vendorpengalaman as $vpen)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td><a href="#" data-id="{{ $vpen->id }}" data-toggle="modal"
                                                            data-target="#pengal_modal_2{{ $vpen->id }}">{{ $vpen->nama_pek }}</a></td>
                                                    <td>{{ $vpen->no_kontrak . " - " . $vpen->tgl_kontrak }}</td>
                                                    <td>
                                                        @if ($vpen->is_published == 0)
                                                        <span
                                                            class="m-badge m-badge--warning m-badge--wide">unverified</span>
                                                        @else
                                                        <span
                                                            class="m-badge m-badge--success m-badge--wide">verified</span>
                                                        @endif
                                                    </td>
                                                    {{-- <td>
                                                        <a href="/vendorpengalaman/publish/{{ $vpen->id }}"
                                                            class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill">
                                                            <i class="flaticon-multimedia-5"></i> </a> --}}

                                                        {{-- @if ($vl->is_published == 0)
                                                                    <a href="#" data-id={{ $vpen->id }}
                                                        data-toggle="modal" data-target="#pengal_modal_3" class="btn
                                                        btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom
                                                        m-btn--pill"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                        <a href="/vendor/profile/pengalaman/destroy/{{ $vpen->id }}"
                                                            class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></a>
                                                        @endif --}}
                                                    {{-- </td> --}}
                                                </tr>
                                                @endforeach
                                                {{-- @endforeach --}}
                                            </tbody>
                                        </table>


                                    </div>
                                    <div class="tab-pane" id="m_tabs_1_8" role="tabpanel">
                                        {{-- @if (Auth::user('vendor')->is_published == 0)
                                            <a href="#" class="btn m-btn--pill m-btn--air btn-success m-btn m-btn--custom m-4 pull-right" data-toggle="modal" data-target="#doc_modal_1" >+ Tambah</a>
                                            @endif --}}
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>DESKRIPSI</th>
                                                    <th>KETERANGAN</th>
                                                    <th>STATUS</th>
                                                    {{-- <th>ACTION</th> --}}
                                                </tr>
                                            </thead>
                                            @php
                                            $no = 1 ;
                                            @endphp
                                            <tbody>
                                                {{-- @foreach ($vendors as $item) --}}
                                                @foreach ($vendors->vendordoc as $vd)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td><a href="#" data-id="{{ $vd->id }}" data-toggle="modal"
                                                            data-target="#doc_modal_2{{ $vd->id }}">{{  $vd->vendorjenisdoc->keterangan  }}</a>
                                                    </td>
                                                    <td>{{ $vd->keterangan }}</td>
                                                    <td>
                                                        @if ($vd->is_published == 0)
                                                        <span
                                                            class="m-badge m-badge--warning m-badge--wide">unverified</span>
                                                        @else
                                                        <span
                                                            class="m-badge m-badge--success m-badge--wide">verified</span>
                                                        @endif
                                                    </td>
                                                    {{-- <td>
                                                        <a href="/vendordok/publish/{{ $vd->id }}"
                                                            class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill">
                                                            <i class="flaticon-multimedia-5"></i> </a> --}}

                                                        {{-- @if ($vl->is_published == 0)
                                                                    <a href="#" data-id={{ $vd->id }}
                                                        data-toggle="modal" data-target="#doc_modal_3" class="btn
                                                        btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom
                                                        m-btn--pill"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                        <a href="/vendor/profile/doc/destroy/{{ $vd->id }}"
                                                            class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></a>
                                                        @endif --}}
                                                    {{-- </td> --}}
                                                </tr>
                                                @endforeach
                                                {{-- @endforeach --}}
                                            </tbody>
                                        </table>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-md-12">
            <div class="m-portlet m-portlet--brand m-portlet--head-solid-bg m-portlet--rounded">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                               <i class="fa fa-list" aria-hidden="true"></i> &nbsp Resume Kelengkapan Data
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin::Section-->
                    <div class="m-section">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped m-table">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>DESKRIPSI</th>
                                            <th>JUMLAH</th>
                                            <th>VERIFIKASI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">1</td>
                                            <td>Lisensi</td>
                                            <td>{{ $vendorlisensicount }}</td>
                                            <td>
                                                <span
                                                    class="m-badge m-badge--warning m-badge--wide">{{ $vendorlisensi . " unverified" }}</span>
                                                <span
                                                    class="m-badge m-badge--success m-badge--wide">{{ $vendorlisensi1 . " verified" }}</span>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">2</td>
                                            <td>Pengurus Perusahaan</td>
                                            <td>{{ $vendorpenguruscount }}</td>
                                            <td>
                                                <span
                                                    class="m-badge m-badge--warning m-badge--wide">{{ $vendorpengurus . " unverified" }}</span>
                                                <span
                                                    class="m-badge m-badge--success m-badge--wide">{{ $vendorpengurus1 . " verified" }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">3</td>
                                            <td>Laporan Keuangan</td>
                                            <td>{{ $vendorlapcount }}</td>
                                            <td>
                                                <span
                                                    class="m-badge m-badge--warning m-badge--wide">{{ $vendorlap . " unverified" }}</span>
                                                <span
                                                    class="m-badge m-badge--success m-badge--wide">{{ $vendorlap1 . " verified" }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">3</td>
                                            <td>Sertifikat</td>
                                            <td>{{ $vendorsertifikatcount }}</td>
                                            <td>
                                                <span
                                                    class="m-badge m-badge--warning m-badge--wide">{{ $vendorsertifikat . " unverified" }}</span>
                                                <span
                                                    class="m-badge m-badge--success m-badge--wide">{{ $vendorsertifikat1 . " verified" }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">4</td>
                                            <td>Tenaga Ahli</td>
                                            <td>{{ $vendortenagacount }}</td>
                                            <td>
                                                <span
                                                    class="m-badge m-badge--warning m-badge--wide">{{ $vendortenaga . " unverified" }}</span>
                                                <span
                                                    class="m-badge m-badge--success m-badge--wide">{{ $vendortenaga1 . " verified" }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">5</td>
                                            <td>Fasilitas / Peralatan</td>
                                            <td>{{ $vendorfasilitascount }}</td>
                                            <td>
                                                <span
                                                    class="m-badge m-badge--warning m-badge--wide">{{ $vendorfasilitas . " unverified" }}</span>
                                                <span
                                                    class="m-badge m-badge--success m-badge--wide">{{ $vendorfasilitas1 . " verified" }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">6</td>
                                            <td>Pengalaman Perusahaan</td>
                                            <td>{{ $vendorpengalamancount }}</td>
                                            <td>
                                                <span
                                                    class="m-badge m-badge--warning m-badge--wide">{{ $vendorpengalaman . " unverified" }}</span>
                                                <span
                                                    class="m-badge m-badge--success m-badge--wide">{{ $vendorpengalaman1 . " verified" }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">7</td>
                                            <td>Dokumen Lainnya</td>
                                            <td>{{ $vendordokcount }}</td>
                                            <td>
                                                <span
                                                    class="m-badge m-badge--warning m-badge--wide">{{ $vendordok . " unverified" }}</span>
                                                <span
                                                    class="m-badge m-badge--success m-badge--wide">{{ $vendordok1 . " verified" }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-md-12">
            <div class="m-portlet m-portlet--default m-portlet--head-solid-bg m-portlet--rounded">
                <div class="m-portlet__head pull-right">
                    <div class="m-portlet__head-caption">
                        <div class="col-lg-12">
                            <div class="form-group m-form__group row">
                                    @if ($vendors->is_published)
                                    <a href="/verifikasivendor/unpublish/{{ $vendors->id }}" class="btn btn-warning confirm" ><i class="fa fa-window-close" aria-hidden="true"></i>&nbsp; Open Verifikasi</a>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('vendor.bank')
@include('vendor.lisensi')
@include('vendor.pengurus')
@include('vendor.lap')
@include('vendor.sertifikat')
@include('vendor.tenaga')
@include('vendor.fasilitas')
@include('vendor.pengalaman')
@include('vendor.doc')
@include('vendor.fileupload')
@include('vendor.kontrak')

    <!-- END EXAMPLE TABLE PORTLET-->
</div>
@endsection


@section('footer-script')
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

    $('.confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Anda Sudah Yakin?',
            text: 'Data Ini Sudah Benar !',
            icon: 'info',
            buttons: ["Tidak", "Iya"],
        }).then(function (value) {
            if (value) {
                window.location.href = url;
            }
        });
    });

</script>
@endsection
