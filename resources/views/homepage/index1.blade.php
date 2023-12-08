@extends('layouts.app2')

@section('header-script')
<style>
    @import "https://code.highcharts.com/css/highcharts.css";

    .highcharts-pie-series .highcharts-point {
        stroke: #ede;
        stroke-width: 2px;
    }

    .highcharts-pie-series .highcharts-data-label-connector {
        stroke: silver;
        stroke-dasharray: 2, 2;
        stroke-width: 2px;
    }

    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 320px;
        max-width: 900px;
        margin: 1em auto;
    }

    .highcharts-background {
        fill: #fff;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

</style>
@endsection

@section('m-subheader')
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">{{$judul}}</h3>
        </div>
        <div>
            <span class="m-subheader__daterange">
                <span class="m-subheader__daterange-label">
                    <span class="m-subheader__daterange-title">Today:</span>
                    <span class="m-subheader__daterange-date m--font-brand">{{ date('d-m-Y', strtotime($now))  }}</span>
                </span>
            </span>
        </div>
        <div>
            &nbsp;
            <a href="#" data-toggle="modal" data-target="#searchMdl">
                <span class="m-nav__link-icon"><i class="flaticon-search-1"></i></span>
            </a>

            <!-- Modal -->
            <div class="modal fade" id="searchMdl" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Search Tanggal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/home/search" method="get">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Mulai Tanggal</label>
                                    <input type="date" class="form-control" name="start" id="start"
                                        aria-describedby="helpId" placeholder="">
                                    {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                </div>
                                <div class="form-group">
                                    <label for="">Sampai Tanggal</label>
                                    <input type="date" class="form-control" name="end" id="end"
                                        aria-describedby="helpId" placeholder="">
                                    {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <script>
                $('#exampleModal').on('show.bs.modal', event => {
                    var button = $(event.relatedTarget);
                    var modal = $(this);
                    // Use above variables to manipulate the DOM

                });

            </script>
        </div>
    </div>
</div>
@endsection

@section('m-content')
<div class="m-content">

    <!--Begin::Section-->
    <div class="row">

        <div class="col-lg-12">
            <!--Begin::Section-->
            <div class="m-portlet">
                <div class="m-portlet__body  m-portlet__body--no-padding">
                    <div class="row m-row--no-padding m-row--col-separator-xl">
                        <div class="col-xl-12">
                            <div class="m-widget14">
                                <div class="row">
                                    <div class="col">
                                        <div class="m-widget14__header">
                                            <h3 class="m-widget14__title">
                                                <i class="fa fa-address-book" aria-hidden="true"></i> &nbsp; Vendor List
                                            </h3>
                                            <span class="m-widget14__desc m--font-brand">
                                                Supplier/Mandor/Distributor
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col p-4 m-2"
                                        style="background-color: rgb(101, 0, 178); border-radius:10px">
                                        <strong class="text-white">Bidang Pekerjaan</strong>
                                        <hr>
                                        @foreach ($jenispek as $item)
                                        <div class="m-widget14__title text-white ">{{  $item->name }}</div>
                                        <div class="m-widget14__title text-white text-right">
                                            <strong>{{ $item->vendors->count()  }}</strong> </div>
                                        <hr>
                                        @endforeach
                                    </div>
                                    <div class="col p-4 m-2"
                                        style="background-color: rgb(101, 0, 178); border-radius:10px">

                                        <strong class="text-white">Kategori Pekerjaan</strong>
                                        <hr>
                                        @foreach ($category as $item)
                                        <div class="m-widget14__title text-white ">{{  $item->detail }}</div>
                                        <div class="m-widget14__title text-white text-right">
                                            <strong>{{ $item->vendors->count()  }}</strong> </div>
                                        <hr>
                                        @endforeach


                                    </div>
                                    <div class="col p-4 m-2"
                                        style="background-color: rgb(101, 0, 178); border-radius:10px">
                                        <strong class="text-white">Jenis Usaha</strong>
                                        <hr>
                                        @foreach ($jenisusaha as $item)
                                        <div class="m-widget14__title text-white ">{{  $item->detail }}</div>
                                        <div class="m-widget14__title text-white text-right">
                                            <strong>{{ $item->vendors->count()  }}</strong> </div>
                                        <hr>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--end:: Widgets/Profit Share-->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__body  m-portlet__body--no-padding">
                    <div class="row m-row--no-padding m-row--col-separator-xl">

                        <div class="col-md-12 col-lg-6 col-xl-3">

                            <div class="m-widget24">
                                <div class="m-widget24__item ">
                                    <h4 class="m-widget24__title ">
                                        <i class="fa fa-list" aria-hidden="true"></i> &nbsp; Barang/ Material
                                    </h4><br>
                                    <span class="m-widget24__stats">
                                        <a href="/hargabarang">{{ $invs->count() }}</a>
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
                                    <h4 class="m-widget24__title  ">
                                        <i class="fa fa-list" aria-hidden="true"></i> &nbsp; Barang Inventaris
                                    </h4><br>
                                    <span class="m-widget24__stats m--font-success">
                                        <a href="/barang"> {{ $barangs }}</a>
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
                                    <h4 class="m-widget24__title  ">
                                        <i class="fa fa-user" aria-hidden="true"></i> &nbsp; User
                                    </h4><br>
                                    <span class="m-widget24__stats m--font-success">
                                        <a href="/user">{{ $user->count() }}</a>
                                    </span>
                                    <div class="m--space-10"></div>
                                    <div class="progress m-progress--sm"> </div>

                                </div>
                            </div>
                            <!--end::New Orders-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-3">
                            <!--begin::New Users-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title  ">
                                        <i class="fa fa-map-pin" aria-hidden="true"></i> &nbsp; Lokasi
                                    </h4><br>
                                    <span class="m-widget24__stats m--font-success">
                                        <a href="/lokasi">{{ $lokasis->count() }}</a>
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

        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__body">
                    <div class="row">
                        <div class="col-lg-8">

                            <div class="m-widget1">

                                <div class="m-widget1__item">

                                    <div class="col">
                                        <div class="m-widget14">
                                            <div class="row  align-items-center">
                                                <div class="col">
                                                    <div id="donuttender"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row  align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">Tender</h3>
                                            <span class="m-widget1__desc">Total Pekerjaan : {{ $tens->count() }}</span>
                                        </div>
                                        <div class="col m--align-right">
                                            <span
                                                class="m-widget1__number m--font-info">{{ 'Rp ' . number_format($tenders)  }}</span>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-lg-4" style="background-color: rgb(37, 51, 133);border-radius:10px;">
                            <div class="card text-info overflow-hidden mb-3 mt-4"
                                style="line-height: 2.5 ; border: #ebebeb;  background-color: rgb(37, 51, 133)">
                                <div class="p-3 pb-2">
                                    <strong class="mb-3"><i
                                            class="demo-psi-data-storage text-white text-opacity-75 fs-3 me-2"></i><span
                                            class="text-white"> BA Aawizing (Procurement)</span>
                                        <span class="fw-bold pull-right text-white">{{ $bapengadaans->count() }}</span>
                                    </strong>
                                    {{-- <span class="m-widget1__desc">Biaya Dokumen : {{ $bapengraps1 }}</span> <br>
                                    <span class="m-widget1__desc">Total RAP : {{ $bapengraps }}</span> <br> --}}
                                    {{-- <ul class="list-group list-group-borderless">
                                <li class="list-group-item p-3 text-reset d-flex justify-content-between align-items-start">
                                    <div class="me-auto" >Biaya Dokumen</div>
                                    <span class="fw-bold">{{ 'Rp ' . number_format($bapengraps1)  }}</span>
                                    </li>
                                    <li
                                        class="list-group-item p-3 text-reset d-flex justify-content-between align-items-start">
                                        <div class="me-auto">Total RAP </div>
                                        <span class="fw-bold">{{'Rp ' . number_format($bapengraps) }}</span>
                                    </li>
                                    <br>
                                    </ul> --}}
                                </div>

                            </div>
                            <div class="card text-info overflow-hidden mb-3"
                                style="line-height: 2.5 ; border: #ebebeb;  background-color: rgb(37, 51, 133)">
                                <div class="p-3 pb-2">
                                    <strong class="mb-3"><i
                                            class="demo-psi-data-storage text-reset text-opacity-75 fs-3 me-2"></i><span
                                            class="text-white"> BA Klarif & Nego (Procurement) </span>
                                        <span class="fw-bold pull-right text-white">{{ $banegopengs->count() }}</span>
                                    </strong>
                                    {{-- <span class="m-widget1__desc">Nilai SPH : {{ $basph }}</span> <br>
                                    <span class="m-widget1__desc">Nilai SPH Klarif : {{ $basph1 }}</span> <br>
                                    <span class="m-widget1__desc">Nilai SPH Nego : {{ $basph2 }}</span> <br> --}}
                                    <ul class="list-group list-group-borderless">
                                        <li
                                            class="list-group-item p-3 text-reset d-flex justify-content-between align-items-start">
                                            <div class="me-auto  text-white">Nilai SPH</div>
                                            <span class="fw-bold  text-white">{{'Rp ' . number_format($basph ) }}</span>
                                        </li>
                                        <li
                                            class="list-group-item p-3 text-reset d-flex justify-content-between align-items-start">
                                            <div class="me-auto  text-white">Nilai SPH Nego </div>
                                            <span
                                                class="fw-bold  text-white">{{'Rp ' . number_format($basph2)  }}</span>
                                        </li>
                                        {{-- <li class="list-group-item p-0 text-reset d-flex justify-content-between align-items-start">
                                    <div class="me-auto">Total BA Klarif & Nego</div>
                                    <span class="fw-bold">{{ $banegopengs->count() }}</span>
                                        </li> --}}
                                    </ul>
                                </div>

                                <!-- Area Chart -->
                                {{-- <div class="py-0" style="height: 70px; margin: 0 -5px -5px;">
                            <canvas id="_dm-hddChart" width="328" height="87" style="display: block; box-sizing: border-box; height: 69.6px; width: 262.4px;"></canvas>
                        </div> --}}
                                <!-- END : Area Chart -->

                            </div>
                            {{-- <div class="card text-info overflow-hidden mb-3" style="line-height: 2.5 ; border: #ebebeb">
                        <div class="p-3 pb-2">
                            <h5 class="mb-3"><i class="demo-psi-data-storage text-reset text-opacity-75 fs-3 me-2"></i> BA Kesepakatan (Procurement)
                                <span class="fw-bold pull-right">{{ $bakes->count() }}</span>
                            </h5>

                            <ul class="list-group list-group-borderless">

                            </ul>
                        </div>

                    </div> --}}
                    <div class="card text-info overflow-hidden mb-3"
                        style="line-height: 2.5 ; border: #ebebeb;  background-color: rgb(37, 51, 133)">
                        <div class="p-3 pb-2">
                            <strong class="mb-3"><i
                                    class="demo-psi-data-storage text-reset text-opacity-75 fs-3 me-2"></i><span
                                    class="text-white"> SPK (Procurement) </span>
                                <span class="fw-bold pull-right  text-white">{{ $spks->count() }}</span>
                            </strong>
                            <ul class="list-group list-group-borderless">
                            </ul>
                        </div>
                    </div>

                    <div class="card text-info overflow-hidden mb-3"
                        style="line-height: 2.5 ; border: #ebebeb;  background-color: rgb(37, 51, 133)">
                        <div class="p-3 pb-2">
                            <strong class="mb-3"><i
                                    class="demo-psi-data-storage text-reset text-opacity-75 fs-3 me-2"></i> <span
                                    class="text-white">SPP (Procurement) </span>
                                <span class="fw-bold pull-right  text-white">{{ $spps->count() }}</span>
                                {{-- <span class="fw-bold pull-right">{{ $spks->count() }}</span> --}}
                            </strong>
                            <ul class="list-group list-group-borderless">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="col-lg-12">
    <!--begin::Portlet-->
    <div class="m-portlet">
        <div class="m-portlet__body">
            <div class="row">
                <div class="col-lg-4">
                    <figure class="highcharts-figure">
                        <div id="piepo"></div>
                    </figure>
                </div>
                <div class="col-lg-8">
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                    </figure>
                </div>
                {{-- <div class="row"> --}}
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col p-4 m-2 " style="background-color: rgb(37, 51, 133); border-radius:10px">
                            <div class="card text-info overflow-hidden mb-3 mt-3"
                                style="line-height: 2.5 ; border: #ebebeb;background-color: rgb(37, 51, 133)">
                                <div class="p-3 pb-2">
                                    <strong class="mb-3"><i
                                            class="demo-psi-data-storage text-reset text-opacity-75 fs-3 me-2"></i><span
                                            class="text-white"> Purchase Order (Logistic) </span>
                                        <span class="fw-bold pull-right text-white">{{ $pos->count() }}</span>
                                    </strong>
                                    @php
                                    $sums =+ $poraps - $pototals ;
                                    @endphp
                                    <ul class="list-group list-group-borderless">
                                        <li
                                            class="list-group-item p-3 text-info d-flex justify-content-between align-items-start">
                                            <div class="me-auto text-white">RAP</div>
                                            <span class="fw-bold text-white">{{ "Rp ". number_format($poraps) }}</span>
                                        </li>
                                        <li
                                            class="list-group-item p-3 text-primary d-flex justify-content-between align-items-start">
                                            <div class="me-auto text-white">REALISASI</div>
                                            <span
                                                class="fw-bold text-white">{{ "Rp ". number_format($pototals) }}</span>
                                        </li>
                                        <li
                                            class="list-group-item p-3 text-success d-flex justify-content-between align-items-start">
                                            <div class="me-auto text-white">SAVING</div>
                                            <span class="fw-bold text-white">{{ "Rp ". number_format($sums) }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card text-info overflow-hidden mb-3 mt-3"
                                style="line-height: 2.5 ; border: #ebebeb; background-color: rgb(37, 51, 133)">
                                <div class="p-3 pb-2">
                                    <strong class="mb-3"><i
                                            class="demo-psi-data-storage text-reset text-opacity-75 fs-3 me-2"></i><span
                                            class="text-white">BA Klarif & Nego (Logistic)</span>
                                        <span class="fw-bold pull-right text-white">{{$bans->count() }}</span>
                                    </strong>
                                    <ul class="list-group list-group-borderless">
                                        <li
                                            class="list-group-item p-3 text-reset d-flex justify-content-between align-items-start">
                                            <div class="me-auto text-white">Biaya Dokumen</div>
                                            <span class="fw-bold text-white">{{ "Rp ". number_format($banego) }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col p-4 m-2 " style="background-color: rgb(37, 51, 133); border-radius:10px">
                            <div class="card text-success overflow-hidden mb-3 mt-3"
                                style="line-height: 2.5 ; border: #ebebeb; background-color: rgb(37, 51, 133)">
                                <div class="p-3 pb-2">
                                    <strong class="mb-3"><i
                                            class="demo-psi-data-storage text-reset text-opacity-75 fs-3 me-2"></i><span
                                            class="text-white"> PUM (Logistic) </span>
                                        <span class="fw-bold pull-right text-white">{{ $pum->count() }}</span>
                                    </strong>
                                    {{-- @php
                                    $tot = 0 ;
                                    $pumheader = 0 ;
                                    $pjheader = 0;
                                       
                                        foreach ($pums as $item) {
                                            $pumheader = $pumosk ;
                                            $pjheader += $item->total;
                                            $tot = $pumheader -  $pjheader;
                                        }
                                    
                                    @endphp --}}
                                    <ul class="list-group list-group-borderless">
                                        <li
                                            class="list-group-item p-3 text-reset d-flex justify-content-between align-items-start">
                                            <div class="me-auto text-white">PUM</div>
                                            <span class="fw-bold text-white">{{ "Rp ". number_format($pumosk) }}</span>
                                        </li>
                                        <li
                                            class="list-group-item p-3 text-reset d-flex justify-content-between align-items-start">
                                            <div class="me-auto text-white">PJ PUM</div>
                                            <span class="fw-bold text-white">{{ "Rp ". number_format($pums) }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card text-primary overflow-hidden mb-3 mt-3"
                                style="line-height: 2.5 ; border: #ebebeb; background-color: rgb(37, 51, 133)">
                                <div class="p-3 pb-2">
                                    <strong class="mb-3"><i
                                            class="demo-psi-data-storage text-reset text-opacity-75 fs-3 me-2"></i><span
                                            class="text-white">Pengiriman-DO/GR (Logistic) </span>
                                        <span class="fw-bold pull-right text-white">{{ $dos->count() }}</span>
                                    </strong>
                                </div>
                            </div>
                            <div class="card text-info overflow-hidden mb-3"
                                style="line-height: 2.5 ; border: #ebebeb; background-color: rgb(37, 51, 133)">
                                <div class="p-3 pb-2">
                                    <strong class="mb-3"><i
                                            class="demo-psi-data-storage text-reset text-opacity-75 fs-3 me-2"></i><span
                                            class="text-white">Service Order (Logistic)</span>
                                        <span class="fw-bold pull-right text-white">{{ $sos->count() }}</span>
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
            </div>

        </div>
    </div>
    <!--end::Portlet-->
</div>

<div class="col-lg-12">

    <!--begin:: Widgets/Tasks -->
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Log Activity
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            @php
            $no =1 ;
            @endphp
            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1_wrapper">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Tindakan</th>
                        <th>Deskripsi</th>
                        <th>User</th>

                    </tr>
                </thead>
                @if($logs->count())
                @foreach($logs as $key => $log)
                <tbody>
                    <tr>
                        <td style="width: 10px">{{ $no++ }}</td>
                        <td style="width: 150px">
                                <div class="m-stack__item m-stack__item--center m-stack__item--bottom m--bg-brand text-center p-4">
                                    <h6 class="m--font-light">{{ date('d M Y', strtotime($log->created_at))  }}</h6>
                                </div>
                        </td>
                        <td style="width: 50px">

                            @if ($log->method == 'POST')
                            <span class="m-badge m-badge--focus m-badge--wide">Simpan</span>
                            @elseif ($log->method == 'PUT')
                            <span class="m-badge m-badge--brand m-badge--wide">Ubah</span>
                            @elseif ($log->method == 'GET')
                            <span class="m-badge m-badge--success m-badge--wide">Buat</span>
                            @endif
                        </td>
                        <td>{{ $log->subject }}</td>
                        <td>{{ $log->user->name }}</td>
                    </tr>
                </tbody>
                @endforeach
                @endif
               
            </table>
        </div>
    </div>
</div>
<!--end:: Widgets/Tasks -->

</div>
<!--End::Section-->


</div>
</div>
<!--End::Section-->



</div>
@endsection

@section('footer-script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>

{{-- <script src="{{ asset('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}" type="text/javascript"></script> --}}


<script type="text/javascript">
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Rekap PO, DO, PUM'
        },
        xAxis: {
            categories: < ? php echo json_encode($lok) ? > ,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah (satuan)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Purchase Order',
            data: < ? php echo json_encode($po) ? >

        }, {
            name: 'Delivery Order',
            data: < ? php echo json_encode($do) ? >

        }, {
            name: 'PUM',
            data: < ? php echo json_encode($pum1) ? >

        }]
    });

    Highcharts.chart('donuttender', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Tender APP'
        },
        //   subtitle: {
        //     text: 'Source: WorldClimate.com'
        //   },
        xAxis: {
            categories:
                <
                ? php echo json_encode($lok) ? > ,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total (Rp)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Total Rupiah',
            data: < ? php echo json_encode($s3) ? >

        }, {
            name: 'Total Pekerjaan',
            data: < ? php echo json_encode($s2) ? >

        }]
    });

    Highcharts.chart('piepo', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Purchase Order',
            align: 'left'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>:{point.percentage:.1f}% '
                }
            }
        },
        series: [{
            name: 'Purchase Order',
            colorByPoint: true,
            data: [{
                name: 'RAP',
                y: < ? php echo json_encode($poraps) ? > ,
                sliced: true,
                selected: true
            }, {
                name: 'REALISASI',
                y: < ? php echo json_encode($pototals) ? >
            }, {
                name: 'SAVING',
                y: < ? php echo json_encode($sums) ? >
            }]
        }]
    });

    var colors = Highcharts.getOptions().colors,
        categories = [
            'Unverified',
            'Verified',
            'Request'
        ],
        data = [{
                y: 61.04,
                color: colors[2],
                drilldown: {
                    name: 'Unverified',
                    categories: [],
                    data:
                        <
                        ? php echo json_encode($vendorunverifieds) ? >

                }
            },
            {
                y: 9.47,
                color: colors[3],
                drilldown: {
                    name: 'Verified',
                    categories: [

                    ],
                    data:
                        <
                        ? php echo json_encode($vendorverifieds) ? >

                }
            },
            {
                y: 9.32,
                color: colors[5],
                drilldown: {
                    name: 'Request',
                    categories: [

                    ],
                    data:
                        <
                        ? php echo json_encode($vendorverifieds) ? >

                }
            }
        ],
        browserData = [],
        versionsData = [],
        i,
        j,
        dataLen = data.length,
        drillDataLen,
        brightness;


    // Build the data arrays
    for (i = 0; i < dataLen; i += 1) {

        // add browser data
        browserData.push({
            name: categories[i],
            y: data[i].y,
            color: data[i].color
        });

        // add version data
        drillDataLen = data[i].drilldown.data.length;
        for (j = 0; j < drillDataLen; j += 1) {
            brightness = 0.2 - (j / drillDataLen) / 5;
            versionsData.push({
                name: data[i].drilldown.categories[j],
                y: data[i].drilldown.data[j],
                color: Highcharts.color(data[i].color).brighten(brightness).get()
            });
        }
    }

    // Create the chart
    Highcharts.chart('donatcont', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Rekanan Vendor',
            align: 'left'
        },

        plotOptions: {
            pie: {
                shadow: false,
                center: ['50%', '50%']
            }
        },
        tooltip: {
            valueSuffix: '%'
        },
        series: [{
            name: 'Jumlah',
            data: browserData,
            size: '60%',
            dataLabels: {
                formatter: function () {
                    return this.y > 5 ? this.point.name : null;
                },
                color: '#ffffff',
                distance: -30
            }
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 400
                },
                chartOptions: {
                    series: [{}, {
                        id: 'versions',
                        dataLabels: {
                            enabled: false
                        }
                    }]
                }
            }]
        }
    });

</script>

@endsection
