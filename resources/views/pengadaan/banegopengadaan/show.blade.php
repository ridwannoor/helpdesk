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
                <a href="/banegopengadaan" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
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
                    <div class="m-portlet__body">
                        <div class="row">
                        <div class="col-lg-6">
                            <table class="table">
                        
                                <tbody>
                                    <tr>
                                        <td scope="row">Tanggal BA</td>
                                        <td>{{ $ba->tanggal }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Nomor BA Klarif & Nego</td>
                                        <td>{{ $ba->nomor_ba }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Judul Pekerjaan</td>
                                        <td>{{ $ba->judul_pekerjaan }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Nilai RAP</td>
                                        <td>{{  'Rp ' . number_format($ba->nilai_rap) . " (" . $ba->pajak_rap . ")" }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Jaminan</td>
                                        <td>{{ $ba->jaminan->name }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Kontrak</td>
                                        <td>{{ $ba->kontrak->name }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">SPH</td>
                                        <td>{{ $ba->spph }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Tanggal SPH</td>
                                        <td>{{ $ba->tgl_sph }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Nilai SPH</td>
                                        <td>{{ 'Rp ' . number_format($ba->jml_penawaran)  }}</td>
                                    </tr>
                                    <tr>
                                        <td>Divisi</td>
                                        <td>
                                            @foreach ($ba->divisis as $item)
                                                <li> {{ $item->detail }} </li> 
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                               </table>
                        </div>
                        <div class="col-lg-6">
                            <table class="table">
                        
                                <tbody>
                                   
                                    <tr>
                                        <td scope="row">Vendor</td>
                                        <td>{{ $ba->vendor->namaperusahaan . " , " . $ba->vendor->badanusaha->kode }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Dasar Anggaran</td>
                                        <td>{{ $ba->dasar->kode }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Lokasi Nego</td>
                                        <td>{{ $ba->lokasi_nego }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Jaminan Pelaksanaan</td>
                                        <td>{{ $ba->jawa_pel }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Jaminan Pemeliharaan</td>
                                        <td>{{ $ba->jawa_pem }}</td>
                                    </tr>  
                                    {{-- <tr>
                                        <td scope="row">SPH Nego</td>
                                        <td>{{ $ba->spph_nego }}</td>
                                    </tr> --}}
                                    {{-- <tr>
                                        <td scope="row">Tanggal SPH Nego</td>
                                        <td>{{ $ba->tgl_sph_nego }}</td>
                                    </tr> --}}
                                    <tr>
                                        <td scope="row">Nilai SPH Nego</td>
                                        <td>{{  'Rp ' . number_format($ba->jml_nego) }}</td>
                                    </tr> 
                                    <tr>
                                        <td scope="row">Jaminan DP</td>
                                        <td>{{ $ba->jaminandp . " - " . $ba->jaminandp1 . " - " . $ba->jaminandp2 }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Cara Bayar</td>
                                        <td>
                                            @foreach ($ba->banegodetail as $item)
                                              <li> {{ $item->carabayar }} </li> 
                                            @endforeach
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td scope="row">Biaya Dokumen</td>
                                        <td>
                                            {{ $ba->bidok }}
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td scope="row">Catatan</td>
                                        <td>
                                            {!! $ba->catatan !!}
                                        </td>
                                    </tr> 
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
                                           @foreach ($ba->banegopengadaanfile as $item)
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
                                                       <a href="/banegopengadaan/destroyfile/{{$item->id}}" class="m-widget4__icon delete-confirm">
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
                </div>
            </div>
                <!--end::Portlet-->
        </div>
    </div>
    
@endsection


@section('footer-script')
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
@endsection