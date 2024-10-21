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
                                <td>Kode Divisi</td>
                                <td>{{ $nodins->no_nodin }}</td>
                            </tbody>
                            <tbody>
                                <td>Nama Paket Pekerjaan</td>
                                <td>{{ $nodins->nama_pek }}</td>
                            </tbody>
                            <tbody>
                                <td>Unit ST</td>
                                <td>{{ $nodins->divisi->detail }}</td>
                            </tbody>
                            <tbody>
                                <td>Tanggal Terima</td>
                                <td>{{ $nodins->tgl_terima }}</td>
                            </tbody>
                            <tbody>
                                <td>Tanggal Surat</td>
                                <td>{{ $nodins->tgl_surat }}</td>
                            </tbody>
                            <tbody>
                                <td>Divisi</td>
                                <td>{{ $nodins->unit_st }}</td>
                            </tbody>
                            <tbody>
                                <td>Lokasi</td>
                                <td>
                                    @foreach ($nodins->lokasi as $lok)
                                        {{ $lok->kode }}
                                    @endforeach  
                                </td>
                            </tbody>
                            <tbody>
                                <td>PIC Manager</td>
                                <td>{{ $nodins->pic }}</td>
                            </tbody>
                            <tbody>
                                <td>PIC Officer</td>
                                <td>{{ $nodins->pic_off }}</td>
                            </tbody>
                            <tbody>
                                <td>Status</td>
                                <td>{{ $nodins->status }}</td>
                            </tbody>
                            <tbody>
                                <td>Catatan</td>
                                <td>{!! $nodins->keterangan !!}</td>
                            </tbody>
                            <tbody>
                                <td> Catatan Tindak Lanjut</td>
                                <td>{!! $nodins->kesimpulan !!}</td>
                            </tbody>
                            <tbody>
                                <td>Files</td>
                                <td>
                                    <div class="m-widget4">
                                        @foreach ($nodins->notafile as $item)
                                            <div class="m-widget4__item">
                                                <div class="m-widget4__info">
                                                        <a href="{{ url('data_file/pdf/'.$item->filename) }}" target="_blank"><span class="m-widget4__text">  {{ empty($item->keterangan) ? $item->filename : $item->keterangan }}</span></a>
                                                </div>
                                                <div class="m-widget4__ext" >
                                                    <a href="/notadinas/destroyfile/{{$item->id}}" class="m-widget4__icon delete-confirm">
                                                        <i class="la la-close"></i>
                                                        
                                                    </a>
                                                </div>
                                            </div>
                                            @endforeach
                                    </div>
                                </td>
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