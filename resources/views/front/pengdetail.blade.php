
@extends('front.layouts.app')

@section('content')


<!-- START FAQ -->
<div id="blog">
    <div class="container">
        <div class="row">

          	<!-- Blog Left Side -->
				<div class="col-lg-12">
					<div class="blog-col">

                        {{-- @foreach ($tenders as $item) --}}
                        <div class="card">
                            <div class="card-header p-3">
                                <span>PENGUMUMAN TENDER</span> <br>
                                <span>Nomor : {{ $tenders->nomor_pr }}</span>
                            </div>
                            @php
                                $no =1 ;
                                $now = now();
                            @endphp
                            <div class="card-body">
                                {{-- <h4 class="card-title">Title</h4> --}}
                                <p class="card-text">PT IAS Property Indonesia mengundang Penyedia Barang dan/atau Jasa untuk mengikuti
                                    Pengadaan Pekerjaan sebagai berikut :</p>
                                    <table class="table table-striped- table-bordered table-hover table-checkable">
                                        <thead>
                                            <tr style="background: rgb(205, 148, 234)">
                                                <th>No</th>
                                                <th>Paket Pekerjaan</th>
                                                <th>Lokasi Pekerjaan</th>
                                                <th>{{$tenders->dasar->kode}}</th>
                                                <th>Klasifikasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row">{{ $no++ }}</td>
                                                <td>{{ $tenders->nama_paket }}</td>
                                                <td>{{ $tenders->lokasi->kode }}</td>
                                                <td>{{ "Rp " . number_format( $tenders->pagu )}}</td>
                                                <td>
                                                    @foreach ($tenders->tenderdetail as $item)
                                                    {{ $item->vendorklasifikasi->kode . " - " . $item->vendorklasifikasi->name }} <br>
                                                    @endforeach
                                                     {{-- <br>
                                                     {{ $tenders->catatan }} --}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>Syarat – syarat Peserta {{ $tenders->metodepengadaan->name }}:
                                    </p>

                                        <p>Calon Peserta harus memiliki klasifikasi dan kualifikasi usaha yang
                                            dipersyaratkan;</p>
                                            <p>Calon Peserta wajib terverifikasi di e-procurement PT IAS Property Indonesia
                                                pada website: <strong>http://eproc.approperti.co.id</strong>  bagi perusahaan yang belum mendaftar,
                                                dipersilahkan mendaftar terlebih dahulu;
                                                </p>
                                                <p>Pelelangan ini menggunakan Peraturan berdasarkan Keputusan Direksi PT Angkasa Pura
                                                    Properti :
                                                    {{-- <ol> --}}
                                                        <p>{{ $tenders->statustender->name }}</p>
                                                        {{-- @foreach ($tenders->tendernodin as $item)
                                                            <p>{{"- " . $item->namenodin }}</p>
                                                        @endforeach   --}}
                                                    {{-- </ol> --}}
                                                </p>
                                                @if ( $tenders->catatan )
                                                  <p>{{ $tenders->catatan }} </p>
                                                @endif
                                                <p>Melakukan registrasi pekerjaan sebagai tanda keikutsertaan {{ $tenders->nama_paket }}, pada sistem e-Procurement PT IAS Property Indonesia yang dapat diakses di website: <strong> http://eproc.approperti.co.id/pengumuman</strong> selambat-lambatnya hari <strong>
                                                    {{ hariIndo(date('l', strtotime($tenders->tgl_daftar))) }},
                                                    {{ date('d M Y', strtotime($tenders->tgl_daftar)) }}
                                                    Pukul
                                                    {{ date('H:i:s', strtotime($tenders->tgl_daftar)) }} WIB;</p> </strong>

                                                   <p>Demikian, untuk diketahui dan atas perhatiannya diucapkan terimakasih.</p>
                                       <p>Jakarta,  {{ date('d M Y', strtotime($tenders->tgl_paket)) }}</p>


                            </div>
                            <div class="card-footer text-muted">
                                Vice President Supply Chain Management <br>
                                PT IAS Property Indonesia <br>
                                TTD
                            </div>
                        </div>
                       <p>

                       </p>
                        {{-- @endforeach --}}


                </div>
					<!-- Blog Share -->

				<!-- col-lg-8 -->
				</div>


        </div>
    </div>
</div>
<!-- END FAQ -->

@endsection
