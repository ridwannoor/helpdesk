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
                <div class="m-portlet__body">
                    <div class="row">
                        <div class="col-lg-8">
                            <table class="table table-striped table-bordered table-hover table-checkable">
                                <tbody>
                                    {{-- <td>Tanggal</td> --}}
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
                                {{-- <tr>
                                    <td>Tanggal Tutup Pendaftaran</td>
                                    <td>{{$tenders->tgl_daftar}}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Penawaran Berakhir</td>
                                    <td>{{ $tenders->tgl_tutup }}  
                                    </td>
                                </tr> --}}
                                <tr>
                                    <td>Pagu Anggaran</td>
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
                                    <td>Jangka Pelaksanaan</td>
                                    <td>{{$tenders->jangka_pelaksanaan}}</td>
                                </tr>
                                <tr>
                                    <td>Jangka Pemeliharaan</td>
                                    <td>{{ $tenders->jangka_pemeliharaan}}</td>
                                </tr>
                                <tr>
                                    <td>Jaminan Pelaksanaan</td>
                                    <td>{{$tenders->jaminan_pelaksanaan}}</td>
                                </tr>
                                <tr>
                                    <td>Dasar Peraturan</td>
                                    <td>{{$tenders->statustender->name}}</td>
                                </tr>
                                <tr>
                                    <td>Catatan</td>
                                    <td>{{$tenders->catatan}}</td>
                                </tr>
                                </tbody>
                        </table>
                        </div>
                  
                        <div class="col-lg-8"> 
                            <table class="table table-striped table-bordered table-hover table-checkable">
                                <thead class="thead-inverse">
                                    <tr style="background: rgb(205, 148, 234)" class="text-white">
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Penjelasan</th>
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
                        
                    </div>
                </div>
              
                <div class="m-portlet__foot m--align-right">
					<div class="m-form__actions m-form__actions--solid m-form__actions--right   ">
                        <form action="/vendor/tender/regist" method="post">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="POST" />
                                            
                            <input type="hidden" name="tender_id" value="{{$tenders->id}}" />
                            <input type="hidden" name="vendor_id" value="{{ Auth::user('vendor')->id}}" />
                            
                        </div>   
                                                 
                            @if ($tenders->tgl_daftar >= $now)              
                                <select name="regist" class="m-bootstrap-select m_selectpicker">                 
                                    <option value="1">Registrasi</option> 
                                </select>
                                <button class="btn btn-primary">Lanjutkan &nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                            @elseif ($tenders->tgl_tutup >= $now)
                                <select name="quot" class="m-bootstrap-select m_selectpicker">                               
                                    <option value="1">Qoutation</option> 
                                </select>
                                <button class="btn btn-primary">Lanjutkan &nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                            @else
                                <a href="/vendor/tender/detailtender/{{ $tenders->id }}" class="btn btn-success">Detail &nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            @endif        
                       
                        </form>
					</div>
				</div>
            </div>
        </div>      
    </div>
</div>

@endsection


@section('footer-script')
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}" type="text/javascript"></script>
@endsection
