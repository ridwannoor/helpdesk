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
                <ul class="nav nav-pills nav-fill" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#m_tabs_5_1">Tender Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_5_2">Quotation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_5_3">Timeline</a>
                    </li>
                </ul>                    

                <div class="tab-content">
                    <div class="tab-pane active" id="m_tabs_5_1" role="tabpanel">
                        <div class="row">
                   
                            <div class="col-lg-6">
                                <table class="table table-striped- table-bordered table-hover table-checkable">                                   
                                    <tbody>
                                        <td>No Pengumuman</td>
                                        <td>{{ date('d-m-Y', strtotime($tenders->tgl_paket))  }} <br>
                                        {{ $tenders->nomor_pr }}
                                        </td>
                                    </tbody>
                                    <tbody>
                                        <td>Jenis Pekerjaan</td>
                                        <td>
                                            @foreach ($tenders->jenispekerjaans as $item)
                                            {{ $item->name . " , " }} <br>
                                            @endforeach
                                        </td>
                                    </tbody>
                                    <tbody>
                                        <td>Nama Paket</td>
                                        <td>{{$tenders->nama_paket}}</td>
                                    </tbody>                       
                                    <tbody>
                                        <td>Uraian Pekerjaan</td>
                                        <td>{!! $tenders->uraian_pek !!}</td>
                                    </tbody>
                                    <tbody>
                                        <td>Lokasi Pekerjaan</td>
                                        <td>{{$tenders->lokasi_pekerjaan}} </td>
                                    </tbody>
                                    <tbody>
                                        <td>Lokasi</td>
                                        <td>{{$tenders->lokasi->kode}} </td>
                                    </tbody>
                                    <tbody>
                                        <td>Anggaran</td>
                                        <td>{{$tenders->anggaran->kode}}</td>
                                    </tbody>
                                    <tbody>
                                        <td>Dasar Anggaran</td>
                                        <td>{{$tenders->dasar->detail}}</td>
                                    </tbody>
                                    <tbody>
                                        <td>Metode Pengadaan</td>
                                        <td>{{ $tenders->metodepengadaan->name}}</td>
                                    </tbody>
                                    <tbody>
                                        <td>Evaluasi Pekerjaan</td>
                                        <td>{{$tenders->metodeevaluasi->name}}</td>
                                    </tbody>
                                    
                               </table>
                            </div>
                            <div class="col-lg-6">
                                <table class="table table-striped- table-bordered table-hover table-checkable">
                                    <tbody>
                                        <td>Tanggal Tutup Pendaftaran</td>
                                        <td>{{$tenders->tgl_daftar}}</td>
                                    </tbody>
                                    <tbody>
                                        <td>Tanggal Tutup Penawaran</td>
                                        <td>{{$tenders->tgl_tutup}}</td>
                                    </tbody>
                                    <tbody>
                                        <td>Nilai</td>
                                        <td>{{"Rp " . number_format($tenders->pagu) }}</td>
                                    </tbody>
                                    <tbody>
                                        <td>Waktu Pelaksanaan</td>
                                        <td>{{$tenders->jangka_pelaksanaan}}</td>
                                    </tbody>
                                    <tbody>
                                        <td>Waktu Pemeliharaan</td>
                                        <td>{{ $tenders->jangka_pemeliharaan}}</td>
                                    </tbody>
                                    <tbody>
                                        <td>Jaminan Pelaksanaan</td>
                                        <td>{{$tenders->jaminan_pelaksanaan}}</td>
                                    </tbody>
                                    <tbody>
                                        <td>Dasar Peraturan</td>
                                        <td><strong> {{$tenders->statustender->name}}</strong></td>
                                    </tbody>
                                    <tbody>
                                        <td>Catatan</td>
                                        <td><strong> {{$tenders->catatan}}</strong></td>
                                    </tbody>
                                    <tbody>
                                        <td>Kategori Tender</td>
                                        <td>
                                            {{-- @foreach ($tenders->catender as $item)
                                                
                                            @endforeach --}}
                                          {{ $tenders->catender }}
                                        </td>
                                    </tbody>
                               </table>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <h5>Klarifikasi / Sertifikasi</h5>
                                <table class="table table-striped table-inverse table-responsive">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>Kode</th>
                                            <th>Keterangan</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tenders->tenderdetail as $item)
                                            <tr>
                                                <td scope="row">{{ $item->vendorklasifikasi->kode }}</td>
                                                <td>{{ $item->vendorklasifikasi->name }}</td>
                                            </tr>
                                         
                                            @endforeach  
                                            
                                        </tbody>
                                </table>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <h5>Syarat Tender</h5>
                                <table class="table table-striped table-inverse table-responsive">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>Kode</th>
                                            <th>Keterangan</th>
                                            <th>File Upload</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tenders->tendersyarat as $item)
                                            <tr>
                                                <td scope="row">{{ $item->syarattender->kode_syarat }}</td>
                                                <td>{{ $item->syarattender->detail_syarat }}</td>
                                                <td>  
                                                    <a href="{{ url('data_file/pdf/'.$item->file_syarat) }}" target="_blank"><span class="m-widget4__text">  {{ $item->syarattender->file_syarat }}</span></a> 
                                                    </td>
                                            </tr>
                                            @endforeach
                                         
                                        </tbody>
                                </table>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <table  class="table table-striped table-bordered table-hover table-checkable">
                                    <thead>
                                        <th style="background: rgb(192, 226, 43)">
                                             File Pendukung
                                        </th>                      
                                    </thead>
                                    <tbody>
                                                 <td>
                                                     <div class="m-widget4">
                                                         @foreach ($tenders->tenderfile as $item)
                                                             <div class="m-widget4__item">
                                                                 <div class="m-widget4__info">
                                                                         <a href="{{ url('data_file/pdf/'.$item->filepdf) }}" target="_blank"><span class="m-widget4__text">  {{ $item->nama_file   }}</span></a>
                                                                </div>
                                                                 <div class="m-widget4__ext" >
                                                                     <a href="/tender/destroyfile/{{$item->id}}" class="m-widget4__icon delete-confirm">
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
                        </div>
                    </div>
                    <div class="tab-pane" id="m_tabs_5_2" role="tabpanel">
                       <div class="row">
                        <div class="col-lg-12 mt-4">
                            {{-- <h5>Qoutation Vendor</h5> --}}     
                            @foreach ($tenders->tenderpenawaran as $v)
                            <div class="m-portlet m-portlet--collapsed m-portlet--head-sm mt-4  " m-portlet="true" id="m_portlet_tools_7">                                                          
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon">
                                                    <i class="flaticon-buildings"></i>
                                                </span>
                                                <h3 class="m-portlet__head-text">
                                                 
                                                        {{ $v->vendor->namaperusahaan . " - " .  $v->nilai_penawaran }}                                                  
                                                  
                                                </h3>
                                            </div>			
                                        </div>
                                        <div class="m-portlet__head-tools">
                                            <ul class="m-portlet__nav">
                                                <li class="m-portlet__nav-item">
                                                    <a href="#"  m-portlet-tool="reload" class="m-portlet__nav-link m-portlet__nav-link--icon"><i class="la la-refresh"></i></a>	
                                                </li>
                                                <li class="m-portlet__nav-item">
                                                    <a href="#"  m-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon"><i class="la la-angle-down"></i></a>	
                                                </li>
                                            </ul>
                                        </div>
                                    </div>                                 
                                    <div class="m-portlet__body">
                                        <form action="/tender/show/qout" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <input type="hidden" name="_method" value="PUT" />
                                            </div>  
                                        <table class="table table-striped table-inverse table-responsive">
                                            <thead class="thead-inverse">
                                                <tr>
                                                    <th>Kode</th>
                                                    <th>Keterangan</th>
                                                    <th>File Upload</th>
                                                    <th>Ada / Tidak Ada</th>
                                                    <th>Catatan</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @if ($v == $tendsod) --}}
                                                 {{-- @foreach ($tendsi as $item)
                                                     @if ($item) --}}
                                                         
                                                     {{-- @endif --}}
                                                    @foreach ($sorted as $item )    
                                                     @if ($item->vendor_id == $v->vendor_id)
                                                     
                                                  {{-- {{  $unique = $item->unique('syarattender_id')}} --}}
                                                        {{-- @if ($item->syarattender_id == $tenders->tendersyarat->id ) --}}
                                                            <tr>
                                                                <td scope="row">
                                                                    <input type="hidden" name="id[]" value="{{$item->id}} "/>  
                                                                    <input type="hidden" name="tender_id[]" value="{{$item->tender_id}} "/>
                                                                    <input type="hidden" name="vendor_id[]" value="{{$item->vendor_id}} "/>
                                                                    <input type="hidden" name="file_pdf[]" value="{{ $item->file_pdf }}">
                                                                    <input type="hidden" name="syarattender_id[]" value="{{ $item->syarattender_id }}">
                                                              
                                                                    {{ $item->syarattender->kode_syarat  }}
                                                                     
                                                                </td>
                                                                <td >{{ $item->syarattender->detail_syarat }}</td>
                                                                <td>
                                                                    <a href="{{ url('data_file/pdf/'.$item->file_pdf) }}" target="__blank">{{ $item->file_pdf }}</a>
                                                                </td>
                                                                <td style="width: 300px"><input type="text" class="form-control" name="adaatautidak[]" value="{{ $item->adaatautidak }}"></td>
                                                                <td style="width: 300px"><input type="text" class="form-control" name="catatan[]" value="{{ $item->catatan }}"></td>
                                                            </tr>      
                                                               {{-- @endif --}}
                                                        {{-- @endforeach --}}
                                                            {{-- @foreach ($item->tender->tendersyarat as $v)                                             --}}
                                                                                        
                                                            {{-- @endforeach --}}
                                                            {{-- @break     --}}
                                                            {{-- @endforeach --}}
                                                        {{-- @endif --}}
                                                        {{-- @break --}}
                                                  
                                                    @endif
                                                      @endforeach   
                                                    {{-- @endif --}}
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="5" style=""><strong> Kesimpulan</strong></td>
                                                
                                                    </tr>
                                                    {{-- @foreach ($tenders->tenderquot as $item) --}}
                                                    {{-- @foreach ($item->tender->tenderpenawaran as $v) --}}
                                                    <tr>
                                                        <td colspan="4" style="">Dokumen Teknis</td>
                                                        <td>
                                                            <input type="hidden" name="vendor_id" value="{{ $v->vendor_id }}">
                                                            <textarea class="form-control"  name="dok_teknis" id="" cols="30" rows="3" required>{{ $v->dok_teknis }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" style="">Dokumen Administrasi</td>
                                                        <td>
                                                            <textarea class="form-control"  name="dok_administrasi" id="" cols="30" rows="3" required>{{ $v->dok_administrasi }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" style="">Dokumen Harga</td>
                                                        <td>
                                                            <textarea class="form-control"  name="dok_harga" id="" cols="30" rows="3" required>{{ $v->dok_harga }}</textarea>
                                                        </td>
                                                    </tr>
                                                  
                                                    {{-- @endforeach
                                                    @break --}}
                                                    {{-- @endforeach --}}
                                                </tfoot>
                                        </table>
                                    </div>
                                    <div class="m-portlet__foot m-portlet__foot--fit">
                                        <div class="m-form__actions m-form__actions">
                                            <div class="row p-4">
                                                {{-- <div class="col-lg-2"></div> --}}
                                                <div class="col-lg-12">
                                                    <div class="btn-group pull-right">
                                                        <button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i>&nbsp; Simpan</button>
                                                    {{-- <a href="/tender" class="btn btn-default">Back</a> --}}
                                                    </div>                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                </form>                           
                            </div>  
                            @endforeach
                        </div>
                       </div>
                    </div>
                    <div class="tab-pane active" id="m_tabs_5_3" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-12 mt-4">
                                @php
                                    $no =1 ;
                                @endphp
                                @foreach ($tenders->timeline as $item)
                                <table class="table table-striped table-inverse ">
                                    <thead>
                                        <tr>
                                            <th colspan="5">
                                                @if ($item->rpp_1)
                                                Time Line Tender (Metode 2 Sampul)
                                                @else    
                                                Time Line Tender (Metode 1 Sampul)
                                                @endif                          
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>No</th>
                                            <th>Dokumen</th>
                                            <th>Tanggal</th>
                                            <th>Checklist</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>Pengumuman Tender</td>
                                            <td>{{date('d-m-Y', strtotime($item->tender->tgl_paket))  }} </td>
                                            <td>
                                                <input type="checkbox" name="" id="" checked>
                                            </td>
                                            <td>  {{ $item->tender->nama_paket }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>Pendaftaran Peserta</td>
                                            <td>{{date('d-m-Y', strtotime($item->tender->tgl_tutup))  }} </td>
                                            <td><input type="checkbox" name="" id="" checked></td>
                                            <td>
                                                @foreach ($item->tender->tenderpenawaran as $item)
                                                    {{-- @foreach ($item->vendor as $v) --}}
                                                        {{-- @foreach ($v as $c) --}}
                                                        {{ " - " . $item->vendor->namaperusahaan . ", " . $item->vendor->badanusaha->kode }} <br>
                                                        {{-- @endforeach                                  --}}
                                                    {{-- @endforeach --}}
                                                @endforeach
                                            </td>
                                            {{-- <td>  {{ $item->tender->nama_paket }}</td> --}}
                                        </tr>
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>Undangan Aanwijzing </td>
                                            {{-- <td>:</td> --}}
                                            <td>{{date('d-m-Y', strtotime($item->undangan_aanwizing)) }}</td>
                                            <td><input type="checkbox" name="" id="" checked></td>
                                            <td>{{ $item->ket_undangan }}</td>
                                        </tr>
                                       
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>Rapat Penjelasan Pekerjaan (Aanwijzing)</td>
                                            {{-- <td>:</td> --}}
                                            <td>{{date('d-m-Y', strtotime( $item->rapat_pekerjaan))}}</td>
                                            <td><input type="checkbox" name="" id="" checked></td>
                                            <td>{{ $item->ket_rapat }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>Dokumen Pengadaan (SBD)</td>
                                            {{-- <td>:</td> --}}
                                            <td>{{date('d-m-Y', strtotime( $item->sbd))}}</td>
                                            <td><input type="checkbox" name="" id="" checked></td>
                                            <td>{{ $item->ket_sbd }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>Surat Penawaran Harga</td>
                                            {{-- <td>:</td> --}}
                                            <td>{{date('d-m-Y', strtotime( $item->sph))}}</td>
                                            <td><input type="checkbox" name="" id="" checked></td>
                                            <td>{{ $item->ket_sph }}</td>
                                        </tr>
                                        @if ($item->rpp_1 )
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>Rapat Pembukaan Penawaran Tahap 1</td>
                                                {{-- <td>:</td> --}}
                                                <td>{{date('d-m-Y', strtotime( $item->rpp)) }}</td>
                                                <td><input type="checkbox" name="" id="" checked></td>
                                                <td>{{ $item->ket_rpp }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>Pengumuman Hasil Evaluasi Tahap 1 & Undangan Pembukaan Penawaran Tahap 2</td>
                                                {{-- <td>:</td> --}}
                                                <td>{{date('d-m-Y', strtotime( $item->pengumuman))}}</td>
                                                <td><input type="checkbox" name="" id="" checked></td>
                                                <td>{{ $item->ket_pengum }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>Rapat Pembukaan Penawaran Tahap 2</td>
                                                {{-- <td>:</td> --}}
                                                <td>{{ date('d-m-Y', strtotime($item->rpp_1 )) }}</td>
                                                <td><input type="checkbox" name="" id="" checked></td>
                                                <td>{{ $item->ket_rpp1 }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>Pengumuman Hasil Evaluasi Tahap 2 & Undangan Negosiasi Harga</td>
                                                {{-- <td>:</td> --}}
                                                <td>{{date('d-m-Y', strtotime($item->pengumuman_1)) }}</td>
                                                <td><input type="checkbox" name="" id="" checked></td>
                                                <td>{{ $item->ket_pengum1 }}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>Rapat Pembukaan Penawaran</td>
                                                {{-- <td>:</td> --}}
                                                <td>{{date('d-m-Y', strtotime( $item->rpp)) }}</td>
                                                <td><input type="checkbox" name="" id="" checked></td>
                                                <td>{{ $item->ket_rpp }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>Pengumuman Hasil Evaluasi & Undangan Negosiasi Harga</td>
                                                {{-- <td>:</td> --}}
                                                <td>{{date('d-m-Y', strtotime( $item->pengumuman))}}</td>
                                                <td><input type="checkbox" name="" id="" checked></td>
                                                <td>{{ $item->ket_pengum }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>Rapat Klarifikasi & Negosiasi Harga</td>
                                            {{-- <td>:</td> --}}
                                            <td>{{date('d-m-Y', strtotime( $item->klarif_nego)) }}</td>
                                            <td><input type="checkbox" name="" id="" checked></td>
                                            <td>{{ $item->ket_klarif }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>Surat Penawaran Harga Negosiasi</td>
                                            {{-- <td>:</td> --}}
                                            <td>{{date('d-m-Y', strtotime(  $item->sph_nego))}}</td>
                                            <td><input type="checkbox" name="" id="" checked></td>
                                            <td>{{ $item->ket_sphnego }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>Surat Penunjukan Pemenang</td>
                                            {{-- <td>:</td> --}}
                                            <td>{{date('d-m-Y', strtotime( $item->spp))}}</td>
                                            <td><input type="checkbox" name="" id="" checked></td>
                                            <td>{{ $item->ket_spp }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>Kontrak/SPK</td>
                                            {{-- <td>:</td> --}}
                                            <td>{{date('d-m-Y', strtotime( $item->kontrak))}}</td>
                                            <td><input type="checkbox" name="" id="" checked></td>
                                            <td>{{ $item->ket_kontrak }}</td>
                                        </tr>
                                    </tbody>
                                 </table>
                           
                           
                                @endforeach
                               </div>
                        </div>
                    </div>
                </div>      
            
             
             
             
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
@endsection

