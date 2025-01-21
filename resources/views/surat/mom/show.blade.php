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
        {{-- <div>
            <div class="align-right">
                <a href="/notadinas" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                    <i class="la la-plus m--hide"></i>
                    <i class="la la-undo"> Back</i>
                </a>
            </div>
        </div> --}}
    </div>
</div>
@endsection

@section('m-content')
<div class="m-content">   
        <div class="row">
            <div class="col-lg-12">
                @include('component.alertnotification')
                {{-- @if ($message = Session::get('alert'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    </button>
                    <strong>Alert!</strong> {{ $message }}.					  	
                </div>
                @endif --}}
                <!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                  {{ $judul }}
                                </h3>
                            </div>
                        </div>
                      
                    </div>
                    <div class="m-portlet__body">
                        <table class="table table-striped- table-bordered table-hover table-checkable">
                            <tbody>
                                <td>Tanggal dan jam Rapat</td>
                                <td>{{ \Carbon\Carbon::parse($moms->tgl_jam_rapat)->translatedFormat('d F Y H:i') }}</td>
                            </tbody>
                            <tbody>
                                <td>Lokasi Rapat</td>
                                <td>{{ $moms->lokasi }}</td>
                            </tbody>
                            <tbody>
                                <td>Peserta Rapat</td>
                                <td>
                                    @foreach ($moms->peserta_rapat as $pr)
                                        <div>{{ $pr->name }}</div>
                                    @endforeach
                                </td>
                            </tbody>
                            <tbody>
                                <td>Agenda Rapat</td>
                                <td>{{ $moms->nama_agenda }}</td>
                            </tbody>
                            <tbody>
                                <td>File MoM pdf</td>
                                <td>
                                    @if($moms->attach_file)
                                        <a href="{{ url('data_file/pdf/'.e($moms->attach_file)) }}" target="_blank">{{ e($moms->attach_file) }}</a>
                                    @else
                                        Tidak ada file
                                    @endif
                                </td>
                            </tbody>
                            {{-- <tbody>
                                <td>File MoM pdf</td>
                                <td><a href="{{ url('data_file/pdf/'.e($moms->attach_file)) }}" target="_blank">{{ e($moms->attach_file) }}</a></td>
                            </tbody> --}}
                        </table>
                        <table class="table table-striped- table-bordered table-hover table-checkable" style="text-align: center;"> 
                            <thead>
                                <td>Issue</td>
                                <td>Pembahasan</td>
                                <td>Tindak Lanjut & Usulan</td>
                                <td>Batas Waktu</td>
                                <td>PIC</td>
                                <td>Status</td>
                            </thead>
                            <tbody>
                                @foreach ($moms->momissue as $mi)
                                    <tr>
                                        <td>{{$mi->issue}}</td>
                                        <td>{{$mi->pembahasan}}</td>
                                        <td>{{$mi->tindak_lanjut}}</td>
                                        <td>{{\Carbon\Carbon::parse($mi->batas_waktu)->translatedFormat('d F Y') }}</td>
                                        <td>
                                            @foreach ($mi->pic as $pic)
                                                <div>{{ $pic->name }}</div>
                                            @endforeach
                                        </td>
                                        <td>{{$mi->status}}</td>
                                        {{-- <td>{{$mi->pic}}</td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--begin::Form-->
               
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->
    
                
            </div>
        </div>
    </div>
    
@endsection