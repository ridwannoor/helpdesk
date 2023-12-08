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
        <div>
            <div class="align-right">
                <a href="/bapengadaan" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                    <i class="la la-plus m--hide"></i>
                    <i class="la la-undo"> Back</i>
                </a>
            </div>
        </div>
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
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-striped- table-bordered table-hover table-checkable">
                                    <tbody>
                                        <td>Tanggal</td>
                                        <td>{{ $ba->tanggal }}</td>
                                    </tbody>
                                    <tbody>
                                        <td>Nomor BA Aanwizing</td>
                                        <td>{{ $ba->nomor_ba }}</td>
                                    </tbody>
                                    <tbody>
                                        <td>Judul Pekerjaan</td>
                                        <td>{{ $ba->judul_pekerjaan }}</td>
                                    </tbody>
                                    <tbody>
                                        <td>Divisi</td>
                                        <td>
                                            {{  $ba->divisis->implode('kode' ,  ', ' )}}
                                        </td>
                                    </tbody>
                                    <tbody>
                                        <td>Vendor</td>
                                        <td>
                                            {{ $ba->vendors->implode('namaperusahaan'   ,  ', ' ) }} 
                                        </td>
                                    </tbody>
                                    <tbody>
                                        <td>Mulai Rapat</td>
                                        <td>{{ date('d-m-Y h:i', strtotime( $ba->tanggal ))   }}</td>
                                    </tbody>
                                    <tbody>
                                        <td>Tutup Rapat</td>
                                        <td>{{ date('d-m-Y h:i', strtotime( $ba->tgl_penawaran ))   }}</td>
                                    </tbody>
                                 
                                </table>
                            </div>
                          
                            <div class="col-lg-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Dokumen</th>
                                            <th>Sebelum</th>
                                            <th>Menjadi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ba->badetailpengadaans as $item)
                                            <tr>
                                                <td scope="row"> {{ $item->dokumen }}</td>
                                                <td>{{ $item->sebelum }} </td>
                                                <td>{{ $item->menjadi }} </td>
                                            </tr>                                       
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="col-lg-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Pertanyaan</th>
                                            <th>Jawaban</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ba->bapertanyaans as $item)
                                            <tr>
                                                <td scope="row"> {{ $item->pertanyaan }}</td>
                                                <td>{{ $item->jawaban }} </td>
                                            </tr>                                       
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      <div class="row">
                          <div class="col-lg-12">
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
                                             @foreach ($ba->bafilepengadaans as $item)
                                                 <div class="m-widget4__item">
                                                     {{-- <div class="m-widget4__img m-widget4__img--icon">							 
                                                         <img src="assets/app/media/img/files/doc.svg" alt="">  
                                                     </div> --}}
                                                     <div class="m-widget4__info">
                                                         {{-- <span class="m-widget4__text"> --}}
                                                             <a href="{{ url('data_file/pdf/'.$item->filepdf) }}" target="_blank"><span class="m-widget4__text">  {{ $item->filepdf   }}</span></a>
                                                         {{-- </span> 							 		  --}}
                                                     </div>
                                                     <div class="m-widget4__ext" >
                                                         <a href="/bapengadaan/destroyfile/{{$item->id}}" class="m-widget4__icon delete-confirm">
                                                             <i class="la la-close"></i>
                                                             
                                                         </a>
                                                     </div>
                                                 </div>
                                                 @endforeach
                                         </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                          </div>
                      </div>
                    </div>
                    <!--begin::Form-->
               
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->
    
                
            </div>
        </div>
    </div>
    
@endsection