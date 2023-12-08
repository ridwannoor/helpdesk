@extends('back.layouts.app')

@section('header-script')

@endsection

{{-- @section('m-subheader')
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">
                {{ $judul . " "  .  Auth::user('vendor')->namaperusahaan . ". " . Auth::user('vendor')->badanusaha->kode }}
            </h3>
        </div>

    </div>
</div>
@endsection --}}

@section('m-content')

<div class="m-content">
    <div class="row">      
        <div class="col-lg-12">
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
                <form action="/vendor/tender/quotation" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="_method" value="PUT" />
                        <input type="hidden" name="tender_id" value="{{$tenders->id}}" />
                        <input type="hidden" name="vendor_id" value="{{ Auth::user('vendor')->id}}" />
                        {{-- <input type="hidden" name="id" value="{{$tenders->tenderpenawaran->id}}" /> --}}
                    </div>   
                <div class="m-portlet__body">                 
                    <div class="row">
                        <div class="col-lg-8">                        
                            <table class="table table-striped table-bordered table-hover table-checkable">     
                                <tbody>                         
                                <tr>
                                    <td colspan="2">
                                        <div class="row">
                                        <div class="col-lg-3">
                                            <div class="m-stack m-stack--ver m-stack--tablet m-stack--demo p-2">
                                                <div class="m-stack__item m-stack__item--center m-stack__item--top text-center"><h4><strong>{{ date('d', strtotime($tenders->tgl_paket))  }}</strong></h4> </div>
                                                <div class="m-stack__item m-stack__item--center m-stack__item--bottom m--bg-brand text-center"><h6 class="m--font-light">{{ date('M Y', strtotime($tenders->tgl_paket))  }}</h6> </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                           <strong> {{ $tenders->nomor_pr }}</strong> <br>
                                           {{$tenders->nama_paket}}
                                        </div>
                                    </div>
                                        {{-- {{ date('d-m-Y', strtotime($tenders->tgl_paket))  }}  --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jenis Pekerjaan</td>
                                    <td>
                                        @foreach ($tenders->jenispekerjaans as $item)
                                        {{ $item->name . " , " }} <br>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Uraian Pekerjaan</td>
                                    <td>{!! $tenders->uraian_pek !!}</td>
                                </tr>
                                <tr>
                                    <td>Lokasi Pekerjaan</td>
                                    <td>{{$tenders->lokasi_pekerjaan}} </td>
                                </tr>
                                <tr>
                                    <td>Lokasi</td>
                                    <td>{{$tenders->lokasi->kode}} </td>
                                </tr>
                                <tr>
                                    <td>Unit ST</td>
                                    <td>{{$tenders->divisi->kode}} </td>
                                </tr>
                                <tr>
                                    <td>Dasar Peraturan</td>
                                    <td>{{$tenders->statustender->name}}</td>
                                </tr>
                                <tr>
                                    <td>Catatan</td>
                                    <td>
                                        {{$tenders->catatan}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nilai</td>
                                    <td>{{"Rp " . number_format($tenders->pagu)}}</td>
                                </tr>
                                <tr>
                                    <td>Anggaran</td>
                                    <td>{{$tenders->anggaran->kode}}</td>
                                </tr>
                                <tr>
                                    <td>Dasar Anggaran</td>
                                    <td>{{$tenders->dasar->detail}}</td>
                                </tr>
                                <tr>
                                    <td>Metode Pengadaan</td>
                                    <td>{{ $tenders->metodepengadaan->name}}</td>
                                </tr>
                                <tr>
                                    <td>Evaluasi Pekerjaan</td>
                                    <td>{{$tenders->metodeevaluasi->name}}</td>
                                </tr>
                                <tr>
                                    <td>Waktu Pelaksanaan</td>
                                    <td>{{$tenders->jangka_pelaksanaan}}</td>
                                </tr>
                                <tr>
                                    <td>Waktu Pemeliharaan</td>
                                    <td>{{ $tenders->jangka_pemeliharaan}}</td>
                                </tr>
                                <tr>
                                    <td>Jaminan Pelaksanaan</td>
                                    <td>{{$tenders->jaminan_pelaksanaan}}</td>
                                </tr>
                                <tr>
                                    <td>Penawaran Harga</td>
                                    <td>
                                        @foreach ($tenders->tenderpenawaran->where('vendor_id', Auth::user('vendor')->id) as $item)
                                        <input type="text" id="rupiah" name="nilai_penawaran" class="form-control" value="{{ $item->nilai_penawaran }}">
                                        @endforeach
                                       
                                    </td>
                                </tr>
                            </tbody>  
                        </table>
                        </div>
                        <div class="col-lg-4">    
                                    
                            <div class="m-accordion m-accordion--bordered" id="m_accordion_2" role="tablist" >   
                           
                                @foreach ($tenders->timeline as $ss)
                                <!--begin::Item-->              
                                <div class="m-accordion__item">
                                    <div class="m-accordion__item-head collapsed"  role="tab" id="m_accordion_2_item_1_head" data-toggle="collapse" href="#m_accordion_2_item_1_body" aria-expanded="    false">
                                        <span class="m-accordion__item-icon"><i class="fa flaticon-calendar-with-a-clock-time-tools"></i></span>
                                        <span class="m-accordion__item-title" style="font-size: 9pt">Tutup Pendaftaran</span>
                                           
                                        <span class="m-accordion__item-mode"></span>     
                                    </div>
            
                                    <div class="m-accordion__item-body collapse" id="m_accordion_2_item_1_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_1_head" data-parent="#m_accordion_2"> 
                                        <div class="m-accordion__item-content">
                                            <p>
                                                {{ date('d M Y H:i', strtotime($tenders->tgl_daftar)) . " WIB"}} 
                                               
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Item--> 
            
                                <!--begin::Item--> 
                                <div class="m-accordion__item">
                                    <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_2_item_2_head" data-toggle="collapse" href="#m_accordion_2_item_2_body" aria-expanded="    false">
                                        <span class="m-accordion__item-icon"><i class="fa  flaticon-calendar-with-a-clock-time-tools"></i></span>
                                        <span class="m-accordion__item-title" style="font-size: 9pt">Berakhir Penawaran</span>
                                             
                                        <span class="m-accordion__item-mode"></span>     
                                    </div>
            
                                    <div class="m-accordion__item-body collapse" id="m_accordion_2_item_2_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_2_head" data-parent="#m_accordion_2"> 
                                        <div class="m-accordion__item-content">
                                            <p>
                                                {{ date('d M Y H:i', strtotime($tenders->tgl_tutup)) . " WIB" }}  
                                            </p>
                                        </div>
                                    </div>
                                </div>   
                                <!--end::Item--> 
            
                                <!--begin::Item--> 
                                <div class="m-accordion__item">
                                    <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_2_item_3_head" data-toggle="collapse" href="#m_accordion_2_item_3_body" aria-expanded="    false">
                                        <span class="m-accordion__item-icon"><i class="fa  flaticon-calendar-with-a-clock-time-tools"></i></span>
                                        <span class="m-accordion__item-title" style="font-size: 9pt">Undangan Aanwijzing</span>
                                          
                                        <span class="m-accordion__item-mode"></span>     
                                    </div>
            
                                    <div class="m-accordion__item-body collapse" id="m_accordion_2_item_3_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_3_head" data-parent="#m_accordion_2"> 
                                        <div class="m-accordion__item-content">
                                            <p>
                                          
                                                {{ date('d M Y', strtotime($ss->undangan_aanwizing))  }}  <br>
                                                {{ $ss->ket_undangan }}
                                                
                                            </p>
                                        </div>
                                    </div>                       
                                </div>
                                <!--end::Item-->                     
                                <!--begin::Item--> 
                                <div class="m-accordion__item">
                                    <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_2_item_4_head" data-toggle="collapse" href="#m_accordion_2_item_4_body" aria-expanded="    false">
                                        <span class="m-accordion__item-icon"><i class="fa  flaticon-calendar-with-a-clock-time-tools"></i></span>
                                        <span class="m-accordion__item-title" style="font-size: 9pt">Rapat Penjelasan Pekerjaan (Aanwijzing)</span>
                                        
                                        <span class="m-accordion__item-mode"></span>     
                                    </div>

                                    <div class="m-accordion__item-body collapse" id="m_accordion_2_item_4_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_4_head" data-parent="#m_accordion_2"> 
                                        <div class="m-accordion__item-content">
                                            <p>
                                        
                                                {{ date('d M Y', strtotime($ss->rapat_pekerjaan))  }}  <br>
                                                {{ $ss->ket_rapat }}
                                                
                                            </p>
                                        </div>
                                    </div>                       
                                </div>
                                <!--end::Item-->   
                                 <!--begin::Item--> 
                                 <div class="m-accordion__item">
                                    <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_2_item_5_head" data-toggle="collapse" href="#m_accordion_2_item_5_body" aria-expanded="    false">
                                        <span class="m-accordion__item-icon"><i class="fa  flaticon-calendar-with-a-clock-time-tools"></i></span>
                                        <span class="m-accordion__item-title" style="font-size: 9pt">Dokumen Pengadaan (SBD)</span>
                                          
                                        <span class="m-accordion__item-mode"></span>     
                                    </div>
            
                                    <div class="m-accordion__item-body collapse" id="m_accordion_2_item_5_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_5_head" data-parent="#m_accordion_2"> 
                                        <div class="m-accordion__item-content">
                                            <p>
                                        
                                                {{ date('d M Y', strtotime($ss->sbd))  }}  <br>
                                                {{ $ss->ket_sbd }}
                                                
                                            </p>
                                        </div>
                                    </div>                       
                                </div>
                                <!--end::Item-->   
                                 <!--begin::Item--> 
                                 <div class="m-accordion__item">
                                    <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_2_item_6_head" data-toggle="collapse" href="#m_accordion_2_item_6_body" aria-expanded="    false">
                                        <span class="m-accordion__item-icon"><i class="fa  flaticon-calendar-with-a-clock-time-tools"></i></span>
                                        <span class="m-accordion__item-title" style="font-size: 9pt">Surat Penawaran Harga</span>
                                          
                                        <span class="m-accordion__item-mode"></span>     
                                    </div>
            
                                    <div class="m-accordion__item-body collapse" id="m_accordion_2_item_6_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_6_head" data-parent="#m_accordion_2"> 
                                        <div class="m-accordion__item-content">
                                            <p>
                                        
                                                {{ date('d M Y', strtotime($ss->sph))  }}  <br>
                                                {{ $ss->ket_sph }}
                                                
                                            </p>
                                        </div>
                                    </div>                       
                                </div>
                                <!--end::Item-->   
                            
                                @if ($ss->rpp1)
                                            <!--begin::Item--> 
                                 <div class="m-accordion__item">
                                    <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_2_item_7_head" data-toggle="collapse" href="#m_accordion_2_item_7_body" aria-expanded="    false">
                                        <span class="m-accordion__item-icon"><i class="fa  flaticon-calendar-with-a-clock-time-tools"></i></span>
                                        <span class="m-accordion__item-title" style="font-size: 9pt">Rapat Pembukaan Penawaran Tahap 1</span>
                                          
                                        <span class="m-accordion__item-mode"></span>     
                                    </div>
            
                                    <div class="m-accordion__item-body collapse" id="m_accordion_2_item_7_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_7_head" data-parent="#m_accordion_2"> 
                                        <div class="m-accordion__item-content">
                                            <p>
                                        
                                                {{ date('d M Y', strtotime($ss->rpp))  }}  <br>
                                                {{ $ss->ket_rpp }}
                                                
                                            </p>
                                        </div>
                                    </div>                       
                                </div>
                                <!--end::Item-->   
                                 <!--begin::Item--> 
                                 <div class="m-accordion__item">
                                    <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_2_item_8_head" data-toggle="collapse" href="#m_accordion_2_item_8_body" aria-expanded="    false">
                                        <span class="m-accordion__item-icon"><i class="fa  flaticon-calendar-with-a-clock-time-tools"></i></span>
                                        <span class="m-accordion__item-title" style="font-size: 9pt">Pengumuman Hasil Evaluasi Tahap 1 & Undangan Pembukaan Penawaran Tahap 2</span>
                                          
                                        <span class="m-accordion__item-mode"></span>     
                                    </div>
            
                                    <div class="m-accordion__item-body collapse" id="m_accordion_2_item_8_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_8_head" data-parent="#m_accordion_2"> 
                                        <div class="m-accordion__item-content">
                                            <p>
                                        
                                                {{ date('d M Y', strtotime($ss->pengumuman))  }}  <br>
                                                {{ $ss->ket_pengum }}
                                                
                                            </p>
                                        </div>
                                    </div>                       
                                </div>
                                <!--end::Item-->  
                                              <!--begin::Item--> 
                                              <div class="m-accordion__item">
                                                <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_2_item_7_head" data-toggle="collapse" href="#m_accordion_2_item_7_body" aria-expanded="    false">
                                                    <span class="m-accordion__item-icon"><i class="fa  flaticon-calendar-with-a-clock-time-tools"></i></span>
                                                    <span class="m-accordion__item-title" style="font-size: 9pt">Rapat Pembukaan Penawaran Tahap 2</span>
                                                      
                                                    <span class="m-accordion__item-mode"></span>     
                                                </div>
                        
                                                <div class="m-accordion__item-body collapse" id="m_accordion_2_item_7_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_7_head" data-parent="#m_accordion_2"> 
                                                    <div class="m-accordion__item-content">
                                                        <p>
                                                    
                                                            {{ date('d M Y', strtotime($ss->rpp_1))  }}  <br>
                                                            {{ $ss->ket_rpp1 }}
                                                            
                                                        </p>
                                                    </div>
                                                </div>                       
                                            </div>
                                            <!--end::Item-->   
                                             <!--begin::Item--> 
                                             <div class="m-accordion__item">
                                                <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_2_item_8_head" data-toggle="collapse" href="#m_accordion_2_item_8_body" aria-expanded="    false">
                                                    <span class="m-accordion__item-icon"><i class="fa  flaticon-calendar-with-a-clock-time-tools"></i></span>
                                                    <span class="m-accordion__item-title" style="font-size: 9pt">Pengumuman Hasil Evaluasi Tahap 2 & Undangan Negosiasi Harga</span>
                                                      
                                                    <span class="m-accordion__item-mode"></span>     
                                                </div>
                        
                                                <div class="m-accordion__item-body collapse" id="m_accordion_2_item_8_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_8_head" data-parent="#m_accordion_2"> 
                                                    <div class="m-accordion__item-content">
                                                        <p>
                                                    
                                                            {{ date('d M Y', strtotime($ss->pengumuman_1))  }}  <br>
                                                            {{ $ss->ket_pengum1 }}
                                                            
                                                        </p>
                                                    </div>
                                                </div>                       
                                            </div>
                                            <!--end::Item-->  
                                @else
                                       <!--begin::Item--> 
                                 <div class="m-accordion__item">
                                    <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_2_item_7_head" data-toggle="collapse" href="#m_accordion_2_item_7_body" aria-expanded="    false">
                                        <span class="m-accordion__item-icon"><i class="fa  flaticon-calendar-with-a-clock-time-tools"></i></span>
                                        <span class="m-accordion__item-title" style="font-size: 9pt">Rapat Pembukaan Penawaran</span>
                                          
                                        <span class="m-accordion__item-mode"></span>     
                                    </div>
            
                                    <div class="m-accordion__item-body collapse" id="m_accordion_2_item_7_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_7_head" data-parent="#m_accordion_2"> 
                                        <div class="m-accordion__item-content">
                                            <p>
                                        
                                                {{ date('d M Y', strtotime($ss->rpp))  }}  <br>
                                                {{ $ss->ket_rpp }}
                                                
                                            </p>
                                        </div>
                                    </div>                       
                                </div>
                                <!--end::Item-->   
                                 <!--begin::Item--> 
                                 <div class="m-accordion__item">
                                    <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_2_item_8_head" data-toggle="collapse" href="#m_accordion_2_item_8_body" aria-expanded="    false">
                                        <span class="m-accordion__item-icon"><i class="fa  flaticon-calendar-with-a-clock-time-tools"></i></span>
                                        <span class="m-accordion__item-title" style="font-size: 9pt">Pengumuman Hasil Evaluasi & Undangan Negosiasi Harga</span>
                                          
                                        <span class="m-accordion__item-mode"></span>     
                                    </div>
            
                                    <div class="m-accordion__item-body collapse" id="m_accordion_2_item_8_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_8_head" data-parent="#m_accordion_2"> 
                                        <div class="m-accordion__item-content">
                                            <p>
                                        
                                                {{ date('d M Y', strtotime($ss->pengumuman))  }}  <br>
                                                {{ $ss->ket_pengum }}
                                                
                                            </p>
                                        </div>
                                    </div>                       
                                </div>
                                <!--end::Item-->  
                                @endif
                              
                               
                                  <!--begin::Item--> 
                                  <div class="m-accordion__item">
                                    <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_2_item_9_head" data-toggle="collapse" href="#m_accordion_2_item_9_body" aria-expanded="    false">
                                        <span class="m-accordion__item-icon"><i class="fa  flaticon-calendar-with-a-clock-time-tools"></i></span>
                                        <span class="m-accordion__item-title" style="font-size: 9pt">Rapat Klarifikasi & Negosiasi Harga</span>
                                          
                                        <span class="m-accordion__item-mode"></span>     
                                    </div>
            
                                    <div class="m-accordion__item-body collapse" id="m_accordion_2_item_9_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_9_head" data-parent="#m_accordion_2"> 
                                        <div class="m-accordion__item-content">
                                            <p>
                                        
                                                {{ date('d M Y', strtotime($ss->klarif_nego))  }}  <br>
                                                {{ $ss->ket_klarif }}
                                                
                                            </p>
                                        </div>
                                    </div>                       
                                </div>
                                <!--end::Item-->   
                                  <!--begin::Item--> 
                                  <div class="m-accordion__item">
                                    <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_2_item_10_head" data-toggle="collapse" href="#m_accordion_2_item_10_body" aria-expanded="    false">
                                        <span class="m-accordion__item-icon"><i class="fa  flaticon-calendar-with-a-clock-time-tools"></i></span>
                                        <span class="m-accordion__item-title" style="font-size: 9pt">Surat Penawaran Harga Negosiasi</span>
                                          
                                        <span class="m-accordion__item-mode"></span>     
                                    </div>
            
                                    <div class="m-accordion__item-body collapse" id="m_accordion_2_item_10_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_10_head" data-parent="#m_accordion_2"> 
                                        <div class="m-accordion__item-content">
                                            <p>
                                        
                                                {{ date('d M Y', strtotime($ss->sph_nego))  }}  <br>
                                                {{ $ss->ket_sphnego }}
                                                
                                            </p>
                                        </div>
                                    </div>                       
                                </div>
                                <!--end::Item-->   
                                  <!--begin::Item--> 
                                  <div class="m-accordion__item">
                                    <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_2_item_11_head" data-toggle="collapse" href="#m_accordion_2_item_11_body" aria-expanded="    false">
                                        <span class="m-accordion__item-icon"><i class="fa  flaticon-calendar-with-a-clock-time-tools"></i></span>
                                        <span class="m-accordion__item-title" style="font-size: 9pt">Surat Penunjukan Pemenang</span>
                                          
                                        <span class="m-accordion__item-mode"></span>     
                                    </div>
            
                                    <div class="m-accordion__item-body collapse" id="m_accordion_2_item_11_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_11_head" data-parent="#m_accordion_2"> 
                                        <div class="m-accordion__item-content">
                                            <p>
                                        
                                                {{ date('d M Y', strtotime($ss->spp))  }}  <br>
                                                {{ $ss->ket_spp }}
                                                
                                            </p>
                                        </div>
                                    </div>                       
                                </div>
                                <!--end::Item--> 
                                 <!--begin::Item--> 
                                 <div class="m-accordion__item">
                                    <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_2_item_12_head" data-toggle="collapse" href="#m_accordion_2_item_12_body" aria-expanded="    false">
                                        <span class="m-accordion__item-icon"><i class="fa  flaticon-calendar-with-a-clock-time-tools"></i></span>
                                        <span class="m-accordion__item-title" style="font-size: 9pt">Kontrak/SPK</span>
                                          
                                        <span class="m-accordion__item-mode"></span>     
                                    </div>
            
                                    <div class="m-accordion__item-body collapse" id="m_accordion_2_item_12_body" class=" " role="tabpanel" aria-labelledby="m_accordion_2_item_12_head" data-parent="#m_accordion_2"> 
                                        <div class="m-accordion__item-content">
                                            <p>
                                        
                                                {{ date('d M Y', strtotime($ss->kontrak))  }}  <br>
                                                {{ $ss->ket_kontrak }}
                                                
                                            </p>
                                        </div>
                                    </div>                       
                                </div>
                                <!--end::Item-->  
                                @endforeach
                            </div>
                            <div class="mt-4">
                                <table  class="table table-striped table-bordered table-hover table-checkable">
                                    <thead>
                                        <th style="background: rgb(205, 148, 234)" class="text-white">
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
                                                       
                                                    </div>
                                                    @endforeach
                                            </div>
                                        </td>
                                    </tbody>
                
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-8 mb-4"> 
                            <table class="table table-striped table-bordered table-hover table-checkable">
                                <thead class="thead-inverse">
                                    <tr style="background: rgb(205, 148, 234)" class="text-white">
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Keterangan</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                    </thead>
                                    @php
                                        $no = 1;
                                    @endphp
                                    <tbody>
                                        @foreach ($tenders->tenderdetail as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->vendorklasifikasi->kode }}</td>
                                                <td>{{ $item->vendorklasifikasi->name }}</td>
                                            </tr>
                                        @endforeach                                  
                                    </tbody>
                            </table>
                        </div>
                    
                        <div class="col-lg-12 mb-4"> 
                            <table class="table table-striped table-bordered table-hover table-checkable">
                                <thead class="thead-inverse">
                                    <tr style="background: rgb(205, 148, 234)" class="text-white">
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Keterangan</th>
                                        {{-- <th>File</th> --}}
                                        <th>File Upload</th>
                                    </tr>
                                    </thead>
                                    @php
                                        $no = 1;
                                    @endphp
                                    <tbody>
                                        @foreach ($tenders->tendersyarat as $item)
                                        {{-- @foreach ($tenders->tenderquot as $v) --}}
                                            
                                        {{-- @if ($tenders->tenderquot->where('tender_id', $tenders->id)->where('vendor_id', Auth::user('vendor')->id)->where('syarattender_id', $item->syarattender_id))
                                          
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->syarattender->kode_syarat }}<input type="hidden" name="syarattender_id[]" class="form-control" value="{{ $item->syarattender->id }}"></td>
                                                <td>{{ $item->syarattender->detail_syarat }} <br>
                                                    <span class="help-link"><a href="{{ url('data_file/pdf/'.$item->file_syarat) }}">{{ $item->syarattender->file_syarat }}</a></span></td>
                                                 
                                                <td style="width: 300px">
                                                    <input type="file" name="file_pdf[]" class="form-control" id="file">
                                                    <span class="help-link"><a href="{{ url('data_file/pdf/'.$item->file_pdf) }}">{{ $item->file_pdf }}</a></span>
                                                </td>
                                            </tr>
                                        @else --}}
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->syarattender->kode_syarat }}<input type="hidden" name="syarattender_id[]" class="form-control" value="{{ $item->syarattender->id }}"></td>
                                                <td>{{ $item->syarattender->detail_syarat }} <br>
                                                    <span class="help-link"><a href="{{ url('data_file/pdf/'.$item->file_syarat) }}">{{ $item->syarattender->file_syarat }}</a></span></td>
                                                    {{-- <td>{{ $v->file_pdf }}</td> --}}
                                                <td style="width: 300px">
                                                    <input type="file" name="file_pdf[]" class="form-control" id="file">
                                                    <div class="m-widget4">
                                                        @foreach ($tenders->tenderquot->where('tender_id', $tenders->id)->where('vendor_id', Auth::user('vendor')->id)->where('syarattender_id', $item->syarattender_id) as $vendqou)
                                                  
                                                            <div class="m-widget4__item">
                                                                <div class="m-widget4__info">
                                                                        <a href="{{ url('data_file/pdf/'.$vendqou->file_pdf) }}" target="_blank"><span class="m-widget4__text">  {{ $vendqou->file_pdf   }}</span></a>
                                                               </div>
                                                                <div class="m-widget4__ext" >
                                                                    <a href="/vendor/tender/destroyfile/{{$vendqou->id}}" class="m-widget4__icon delete-confirm">
                                                                        <i class="la la-close"></i>                                                                        
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                    </div>
                                                    {{-- <span class="help-link"><a href="{{ url('data_file/pdf/'.$vendqou->file_pdf) }}">{{ $vendqou->file_pdf }}</a></span> --}}
                                                    {{-- @endforeach --}}
                                                </td>
                                            </tr>
                                        {{-- @endif --}}
                                          
                                            {{-- @endforeach --}}
                                        @endforeach                                  
                                    </tbody>
                            </table>
                        </div>
                    
                    </div>
                </div>
                <div class="m-portlet__foot m--align-right">
					<div class="m-form__actions m-form__actions--solid m-form__actions--right">
                        <button type="submit" class="btn btn-success">Submit Quotation &nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                    </div>
				</div>
            </form>
            </div>
        </div>       
    </div>
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
            text: 'Pastikan data sudah sesuai, sebelum anda submit quotation !',
            icon: 'warning',
            buttons: ["Tidak", "Iya !"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });

    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Anda Sudah Yakin?',
            text: 'File akan dihapus secara Permanen !',
            icon: 'warning',
            buttons: ["Tidak", "Iya !"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>
<script type="text/javascript">
		
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e){
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
@endsection
