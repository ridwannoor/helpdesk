@extends('back.layouts.app')

@section('header-script')

@endsection


@section('m-content')
<div class="m-content">
    <div class="row">
        <div class="col-md-12">
            @include('component.alertnotification')
            <div class="m-portlet m-portlet--brand m-portlet--head-solid-bg m-portlet--rounded">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                            <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                <i class="fa fa-home" aria-hidden="true"></i> &nbsp; Profile Perusahaan
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                @if (Auth::user('vendor')->is_published == null)
                                    <a href="/vendor/profile/edit/{{ Auth::user('vendor')->id }}" class="m-portlet__nav-link btn btn-light m-btn m-btn--pill m-btn--air">
                                      <i class="fa fa-edit" aria-hidden="true"></i>  Edit
                                    </a>
                                @endif
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin::Section-->
                    <div class="m-section">
                        <div class="row">
                            <div class="col-md-9">
                                <ul class="nav nav-tabs nav-fill" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#profile"><i class="fa fa-home" aria-hidden="true"></i> Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#bank"><i class="fa fa-piggy-bank" aria-hidden="true"></i> Bank</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#fileupload"> <i class="fa fa-cloud-upload-alt" aria-hidden="true"></i> File Upload</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#history"> <i class="fa fa-history" aria-hidden="true"></i> History</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="profile" role="tabpanel">
                                        <table class="table table-striped m-table">
                                            <tbody>
                                                <tr>
                                                    <td>Kode Perusahaan</td>
                                                    <td> {{  Auth::user('vendor')->kode }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Perusahaan *</td>
                                                    <td> <strong>{{  Auth::user('vendor')->namaperusahaan . ", " . Auth::user('vendor')->badanusaha->kode }}</strong> <br>
                                                        @if ( Auth::user('vendor')->is_published == null)
                                                            <span class="m-badge m-badge--danger m-badge--wide">Belum Verifikasi</span>
                                                            @if (Auth::user('vendor')->terms == 1)
                                                                <span class="m-badge m-badge--warning m-badge--wide">Menunggu Verifikasi</span>
                                                            @endif
                                                        @else
                                                            <span class="m-badge m-badge--success m-badge--wide">Verified</span>
                                                        @endif
                                                        @if (Auth::user('vendor')->is_published )
                                                        <a href="/vendor/profile/certificate/{id}" class="btn btn-brand btn-outline-info" target="_blank"><i class="fa fa-certificate" aria-hidden="true"></i> &nbsp; Sertifikat</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat Domisili *</td>
                                                    <td>{{ Auth::user('vendor')->alamat }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Provinsi</td>
                                                    <td>{{ Auth::user('vendor')->provinsi->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>NPWP *</td>
                                                    <td>{{ Auth::user('vendor')->npwp }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email *</td>
                                                    <td>
                                                        @if ( Auth::user('vendor')->is_email_verified)
                                                            <span class="m--font-success"> <strong> {{ Auth::user('vendor')->email }}</strong></span> <br>
                                                            <span class="m-badge m-badge--success m-badge--wide">Verified</span>
                                                        @else
                                                            <span class="m--font-warning"> <strong> {{ Auth::user('vendor')->email }}</strong></span>  <br>
                                                            <form action="/vendor/profile/lupaverifikasi" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <input type="hidden" name="vendor_id" value="{{ Auth::user('vendor')->id}}" />
                                                                    <input type="hidden" name="email" value="{{ Auth::user('vendor')->email }}">
                                                                </div>
                                                                <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-envelope" aria-hidden="true"></i> Send Verification</button>.
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Telp Perusahaan *</td>
                                                    <td> {{ Auth::user('vendor')->notelp }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Contact Person *</td>
                                                    <td>{{ Auth::user('vendor')->contactperson . ", " . Auth::user('vendor')->handphone }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Contact Person Alternative</td>
                                                    <td>{{ Auth::user('vendor')->alternative_person . ", " . Auth::user('vendor')->alternative_phone }}</td>
                                                </tr>

                                                <tr>
                                                    <td>Website</td>
                                                    <td>{{ Auth::user('vendor')->website }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Bidang Pekerjaan *</td>
                                                   <td>
                                                        @foreach (Auth::user('vendor')->jenispekerjaans as $item)
                                                            {{ $item->name . " , " }} <br>
                                                        @endforeach
                                                   </td>
                                                </tr>
                                                <tr>
                                                    <td>Kategori Usaha *</td>
                                                   <td>
                                                        @foreach (Auth::user('vendor')->categories as $item)
                                                        {{ $item->detail . " , " }} <br>
                                                        @endforeach
                                                   </td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Usaha *</td>
                                                    <td>
                                                        @foreach (Auth::user('vendor')->jenisusahas as $item)
                                                        {{ $item->detail . " , " }} <br>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Product</td>
                                                    <td>{{ Auth::user('vendor')->product }}</td>
                                                </tr>

                                                <tr>
                                                    <td>Tanggal Dibuat </td>
                                                    <td>{{ Auth::user('vendor')->created_at }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Catatan</td>
                                                    <td>{{ Auth::user('vendor')->catatan }}</td>
                                                </tr>
                                            </tbody>
                                    </table>
                                    </div>
                                    <div class="tab-pane" id="bank" role="tabpanel">
                                        @if (Auth::user('vendor')->is_published == null)
                                        <a href="#" data-toggle="modal" data-target="#bank_modal_1" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                            <span>
                                                <i class="la la-plus"></i>
                                                <span>New record</span>
                                            </span>
                                        </a>
                                        @endif
                                        <table class="table mt-4">
                                            <thead>
                                                <tr>
                                                    <th>Nama Bank</th>
                                                    <th>No Rekening</th>
                                                    <th>Nama Pemilik</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            {{-- @php
                                                $no = 1 ;
                                            @endphp --}}
                                            <tbody>
                                                {{-- @foreach ($vendors as $item) --}}
                                                    @foreach (Auth::user('vendor')->vendorbank as $vb)
                                                        <tr>
                                                            <td><a href="#" data-id="{{ $vb->id }}" data-toggle="modal" data-target="#bank_modal_2{{ $vb->id }}">{{ $vb->bank->name . ", " . $vb->bank->code }}</a></td>
                                                            <td>{{ $vb->nomor_rek }}</td>
                                                           <td>{{ $vb->nama_pemilik }}</td>
                                                           <td>
                                                            <a href="#"  data-id="{{ $vb->id }}" data-toggle="modal" data-target="#bank_modal_3{{ $vb->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i class="flaticon-edit"></i></a>
                                                            <a href="/vendor/profile/bank/destroy/{{ $vb->id }}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill delete-confirm"><i class="flaticon-delete"></i></a>
                                                        </td>
                                                        </tr>
                                                    @endforeach
                                                {{-- @endforeach --}}
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="tab-pane" id="fileupload" role="tabpanel">
                                        @if (Auth::user('vendor')->is_published == null)
                                        <a href="#" data-toggle="modal" data-target="#fileupload_modal_1" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                            <span>
                                                <i class="la la-plus"></i>
                                                <span>New record</span>
                                            </span>
                                        </a>
                                        @endif
                                        <div class="table">
                                            <thead>
                                                <tr style="background-color: rgb(112, 119, 216)">
                                                    <th><strong style="color: aliceblue">File Upload</strong></th>
                                                 </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                     <div class="m-widget4">
                                                        {{-- @foreach ($vendors as $item)                                                             --}}
                                                            @foreach (Auth::user('vendor')->itemdetails as $vfile)
                                                             <div class="m-widget4__item">
                                                                 <div class="m-widget4__info">
                                                                         <a href="{{ url('data_file/pdf/'.$vfile->filename) }}" target="_blank"><span class="m-widget4__text">  {{ $vfile->filename   }}</span></a>
                                                                  </div>
                                                                 <div class="m-widget4__ext" >
                                                                     <a href="/vendor/profile/destroyfile/{{$vfile->id}}" class="m-widget4__icon delete-confirm">
                                                                         <i class="la la-close"></i>

                                                                     </a>
                                                                 </div>
                                                             </div>
                                                             @endforeach
                                                        {{-- @endforeach --}}
                                                     </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="history" role="tabpanel">
                                        <!-- List group -->
                                        <div class="list-group" id="myList" role="tablist">
                                          <a class="list-group-item list-group-item-action active" data-toggle="list" href="#po" role="tab">Purchase Order</a>
                                          <a class="list-group-item list-group-item-action" data-toggle="list" href="#bap" role="tab">BA Klarif & Nego Pengadaan</a>
                                          <a class="list-group-item list-group-item-action" data-toggle="list" href="#spk" role="tab">SPK</a>
                                          <a class="list-group-item list-group-item-action" data-toggle="list" href="#kontrak" role="tab">Kontrak</a>
                                        </div>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                          <div class="tab-pane active" id="po" role="tabpanel">...</div>
                                          <div class="tab-pane" id="bap" role="tabpanel">...</div>
                                          <div class="tab-pane" id="spk" role="tabpanel">...</div>
                                          <div class="tab-pane" id="kontrak" role="tabpanel">...</div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-3">
                                <div class="alert m-alert--default" role="alert">
                                    <strong>Perhatian!</strong> <br>
                                    - Lengkapi Profile Perusahaan dengan klik tombol <span class="m--font-info"> <i class="fa fa-edit" aria-hidden="true"></i> Edit</span> pada pojok kanan atas. <br>
                                    - Lengkapi Bank Account dengan <span class="m--font-info"> Upload Cover Tabungan </span> (Company/Personal).
                                </div>
                                <div class="card text-left">
                                  <img class="card-img-top" src="{{ url('data_file/pdf/'.Auth::user('vendor')->image) }}" height="150px" width="150px" alt="image">
                                  <div class="card-body">
                                    @if ( Auth::user('vendor')->is_published == null)
                                    <form action="/vendor/profile/imageupload" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <input type="hidden" name="_method" value="PUT" />
                                            <input type="hidden" name="id" value="{{Auth::user('vendor')->id}}" />
                                            {{-- <input type="hidden" name="vendor_id" value="{{Auth::user('vendor')->id}}" /> --}}
                                        </div>
                                        {{-- <div class="btn-group"> --}}
                                        <input type="file" name="image" id="image">
                                        <button type="submit" class="btn btn-success btn-sm">Update</button> <hr>
                                      Keterangan : Upload Logo Perusahaan (Format : .png)
                                    {{-- </div> --}}
                                    </form>
                                    @endif
                                    {{-- <h4 class="card-title">Title</h4> --}}
                                    {{-- <p class="card-text">Body</p> --}}
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
                                        <i class="fa fa-archive" aria-hidden="true"></i> &nbsp; Dokumen Persyaratan
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <!--begin::Section-->
                            <div class="m-section">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- @include('component.alertnotification') --}}
                                        <ul class="nav nav-tabs nav-fill" role="tablist" style="font-size: 12px">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#m_tabs_1_1"><i class="fa fa-file" aria-hidden="true"></i> Lisensi</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#m_tabs_1_2"><i class="fa fa-file" aria-hidden="true"></i> Pengurus</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#m_tabs_1_3"><i class="fa fa-file" aria-hidden="true"></i> Lap Keuangan</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#m_tabs_1_4"><i class="fa fa-file" aria-hidden="true"></i> Setifikat Badan Usaha (SBU)</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#m_tabs_1_5"><i class="fa fa-file" aria-hidden="true"></i> Tenaga Ahli</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#m_tabs_1_6"><i class="fa fa-file" aria-hidden="true"></i> Peralatan Kerja</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#m_tabs_1_7"><i class="fa fa-file" aria-hidden="true"></i> Pengalaman</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#m_tabs_1_8"><i class="fa fa-file" aria-hidden="true"></i> Dok Lainnya</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                                            @if (Auth::user('vendor')->is_published == null)
                                                <a href="#" class="btn m-btn--pill m-btn--air btn-success m-btn m-btn--custom m-4 pull-right" data-toggle="modal" data-target="#m_modal_5" >+ Tambah</a>
                                            @endif
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>DOKUMEN</th>
                                                        <th>NOMOR</th>
                                                        <th>KETERANGAN</th>
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
                                                        @foreach (Auth::user('vendor')->vendorlisensi as $vl)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td><a href="javascript:void(0)" data-id="{{ $vl->id }}" data-toggle="modal" data-target="#m_modal_6{{ $vl->id }}">{{ $vl->vendorjenis->keterangan }}</a></td>
                                                            <td>{{ $vl->nomor }}</td>
                                                            <td>{{ $vl->keterangan }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($vl->start)) }}
                                                            @if ($vl->end)
                                                            {{ " s/d " . date('d-m-Y', strtotime($vl->end)) }}
                                                            @endif
                                                            </td>
                                                            <td>
                                                                @if ($vl->terms == null)
                                                                <span class="m-badge m-badge--warning m-badge--wide">unverified</span>
                                                                @else
                                                                    <span class="m-badge m-badge--success m-badge--wide">verified</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if (Auth::user('vendor')->is_published == null)
                                                                <a href="javascript:void(0)" data-id="{{ $vl->id }}" data-toggle="modal" data-target="#m_modal_7{{ $vl->id }}" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                                <a href="/vendor/profile/lisensi/destroy/{{ $vl->id }}" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    {{-- @endforeach --}}
                                                </tbody>

                                            </table>

                                            </div>
                                            <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
                                                @if (Auth::user('vendor')->is_published == null)
                                                <a href="javascript:void(0)" class="btn m-btn--pill m-btn--air btn-success m-btn m-btn--custom m-4 pull-right" data-toggle="modal" data-target="#pengurus_modal_1" >+ Tambah</a>
                                                @endif
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>NO</th>
                                                            <th>NAMA</th>
                                                            <th>JABATAN</th>
                                                            <th>STATUS</th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                        $no = 1 ;
                                                    @endphp
                                                    <tbody>
                                                        {{-- @foreach ($vendors as $item) --}}
                                                            @foreach (Auth::user('vendor')->vendorpengurus as $vp)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td><a href="#" data-id="{{ $vp->id }}" data-toggle="modal" data-target="#pengurus_modal_2{{ $vp->id }}">{{ $vp->nama }}</a></td>
                                                                <td>{{  $vp->jabatan }}</td>
                                                                <td>
                                                                    @if ($vp->terms == null)
                                                                    <span class="m-badge m-badge--warning m-badge--wide">unverified</span>
                                                                    @else
                                                                        <span class="m-badge m-badge--success m-badge--wide">verified</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if (Auth::user('vendor')->is_published == null)
                                                                    <a href="javascript:void(0)" data-id="{{ $vp->id }}" data-toggle="modal" data-target="#pengurus_modal_3{{ $vp->id }}" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                                    <a href="/vendor/profile/pengurus/destroy/{{ $vp->id }}" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        {{-- @endforeach --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
                                                @if (Auth::user('vendor')->is_published == null)
                                                <a href="javascript:void(0)" class="btn m-btn--pill m-btn--air btn-success m-btn m-btn--custom m-4 pull-right" data-toggle="modal" data-target="#lap_modal_1" >+ Tambah</a>
                                                @endif
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>NO</th>
                                                            <th>KETERANGAN</th>
                                                            <th>TAHUN</th>
                                                            <th>STATUS</th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                        $no = 1 ;
                                                    @endphp
                                                    <tbody>
                                                        {{-- @foreach ($vendors as $ven)     --}}
                                                            @foreach (Auth::user('vendor')->vendorlap as $vla)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td><a href="#" data-id="{{ $vla->id }}" data-toggle="modal" data-target="#lap_modal_2{{ $vla->id }}">{{ $vla->keterangan }}</a></td>
                                                                <td>{{ date('Y', strtotime($vla->thn))  }}</td>
                                                                <td>
                                                                    @if ($vla->terms == null)
                                                                        <span class="m-badge m-badge--warning m-badge--wide">unverified</span>
                                                                    @else
                                                                        <span class="m-badge m-badge--success m-badge--wide">verified</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if (Auth::user('vendor')->is_published == null)
                                                                    <a href="javascript:void(0)" data-id="{{ $vla->id }}" data-toggle="modal" data-target="#lap_modal_3{{ $vla->id }}" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                                    <a href="/vendor/profile/lap/destroy/{{ $vla->id }}" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        {{-- @endforeach --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="m_tabs_1_4" role="tabpanel">
                                                @if (Auth::user('vendor')->is_published == null)
                                                <a href="javascript:void(0)" class="btn m-btn--pill m-btn--air btn-success m-btn m-btn--custom m-4 pull-right" data-toggle="modal" data-target="#sertifikat_modal_1" >+ Tambah</a>
                                                @endif
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
                                                            @foreach (Auth::user('vendor')->vendorsertifikat as $vs)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td><a href="#" data-id="{{ $vs->id }}" data-toggle="modal" data-target="#sertifikat_modal_2{{ $vs->id }}">{{ $vs->nomor }}</a></td>
                                                                <td>{{  $vs->vendorklasifikasi->kode . " - " . $vs->vendorklasifikasi->name . " (" . $vs->vendorsubkla->kode . ") " }}</td>
                                                                <td>{{ date('d-m-Y', strtotime($vs->berlaku_start))   }}
                                                                    @if ($vs->berlaku_end)
                                                                    {{ " s/d " . date('d-m-Y', strtotime($vs->berlaku_end)) }}
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($vs->terms == null)
                                                                    <span class="m-badge m-badge--warning m-badge--wide">unverified</span>
                                                                    @else
                                                                        <span class="m-badge m-badge--success m-badge--wide">verified</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if (Auth::user('vendor')->is_published == null)
                                                                    <a href="javascript:void(0)" data-id="{{ $vs->id }}" data-toggle="modal" data-target="#sertifikat_modal_3{{ $vs->id }}" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                                    <a href="/vendor/profile/sertifikat/destroy/{{ $vs->id }}" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        {{-- @endforeach --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="m_tabs_1_5" role="tabpanel">
                                                @if (Auth::user('vendor')->is_published == null)
                                                <a href="javascript:void(0)" class="btn m-btn--pill m-btn--air btn-success m-btn m-btn--custom m-4 pull-right" data-toggle="modal" data-target="#tenaga_modal_1" >+ Tambah</a>
                                                @endif
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>NO</th>
                                                            <th>NAMA</th>
                                                            <th>KEAHLIAN</th>
                                                            <th>STATUS</th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                        $no = 1 ;
                                                    @endphp
                                                    <tbody>
                                                        {{-- @foreach ($vendors as $item) --}}
                                                            @foreach (Auth::user('vendor')->vendortenaga as $vt)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td><a href="javascript:void(0)" data-id="{{ $vt->id }}" data-toggle="modal" data-target="#tenaga_modal_2{{ $vt->id }}">{{ $vt->nama }}</a></td>
                                                                <td>{{ $vt->keahlian }}</td>
                                                                <td>
                                                                    @if ($vt->terms == null)
                                                                    <span class="m-badge m-badge--warning m-badge--wide">unverified</span>
                                                                    @else
                                                                        <span class="m-badge m-badge--success m-badge--wide">verified</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if (Auth::user('vendor')->is_published == null)
                                                                    <a href="javascript:void(0)" data-id="{{ $vt->id }}" data-toggle="modal" data-target="#tenaga_modal_3{{ $vt->id }}" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                                    <a href="/vendor/profile/tenaga/destroy/{{ $vt->id }}" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        {{-- @endforeach --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="m_tabs_1_6" role="tabpanel">
                                                @if (Auth::user('vendor')->is_published == null)
                                                <a href="javascript:void(0)" class="btn m-btn--pill m-btn--air btn-success m-btn m-btn--custom m-4 pull-right" data-toggle="modal" data-target="#fasil_modal_1" >+ Tambah</a>
                                                @endif
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>NO</th>
                                                            {{-- <th>NAMA</th> --}}
                                                            <th>KEPEMILIKAN ALAT</th>
                                                            <th>STATUS</th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                        $no = 1 ;
                                                    @endphp
                                                    <tbody>
                                                        {{-- @foreach ($vendors as $vend) --}}
                                                            @foreach (Auth::user('vendor')->vendorfasilitas as $vfol)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                {{-- <td><a href="javascript:void(0)" data-id="{{ $vfol->id }}" data-toggle="modal" data-target="#fasil_modal_5{{ $vfol->id }}">{{ $vfol->vendortipe->keterangan }}</a></td> --}}
                                                                <td><a href="javascript:void(0)" data-id="{{ $vfol->id }}" data-toggle="modal" data-target="#fasil_modal_5{{ $vfol->id }}">{{ $vfol->kepemilikan . " - " . $vfol->nama}}</a></td>
                                                                <td>
                                                                    @if ($vfol->terms == null)
                                                                    <span class="m-badge m-badge--warning m-badge--wide">unverified</span>
                                                                    @else
                                                                        <span class="m-badge m-badge--success m-badge--wide">verified</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if (Auth::user('vendor')->is_published == null)
                                                                    <a href="javascript:void(0)" data-id="{{ $vfol->id }}" data-toggle="modal" data-target="#fasil_modal_3{{ $vfol->id }}" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                                    <a href="/vendor/profile/fasilitas/destroy/{{ $vfol->id }}" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        {{-- @endforeach --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="m_tabs_1_7" role="tabpanel">
                                                @if (Auth::user('vendor')->is_published == null)
                                                <a href="javascript:void(0)" class="btn m-btn--pill m-btn--air btn-success m-btn m-btn--custom m-4 pull-right" data-toggle="modal" data-target="#pengal_modal_1" >+ Tambah</a>
                                                @endif
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>NO</th>
                                                            <th>NAMA</th>
                                                            <th>KONTRAK</th>
                                                            <th>STATUS</th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                        $no = 1 ;
                                                    @endphp
                                                    <tbody>
                                                        {{-- @foreach ($vendors as $item) --}}
                                                            @foreach (Auth::user('vendor')->vendorpengalaman as $vpen)
                                                                <tr>
                                                                    <td>{{ $no++ }}</td>
                                                                    <td><a href="javascript:void(0)" data-id="{{ $vpen->id }}" data-toggle="modal" data-target="#pengal_modal_2{{ $vpen->id }}">{{ $vpen->nama_pek }}</a></td>
                                                                    <td>{{ $vpen->no_kontrak . " - " . $vpen->tgl_kontrak }}</td>
                                                                    <td>
                                                                        @if ($vpen->terms == null)
                                                                        <span class="m-badge m-badge--warning m-badge--wide">unverified</span>
                                                                        @else
                                                                            <span class="m-badge m-badge--success m-badge--wide">verified</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if (Auth::user('vendor')->is_published == null)
                                                                        <a href="javascript:void(0)" data-id="{{ $vpen->id }}" data-toggle="modal" data-target="#pengal_modal_3{{ $vpen->id }}" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                                        <a href="/vendor/profile/pengalaman/destroy/{{ $vpen->id }}" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        {{-- @endforeach --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="m_tabs_1_8" role="tabpanel">
                                                @if (Auth::user('vendor')->is_published == null)
                                                <a href="javascript:void(0)" class="btn m-btn--pill m-btn--air btn-success m-btn m-btn--custom m-4 pull-right" data-toggle="modal" data-target="#doc_modal_1" >+ Tambah</a>
                                                @endif
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>NO</th>
                                                            <th>DESKRIPSI</th>
                                                            <th>KETERANGAN</th>
                                                            <th>STATUS</th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                        $no = 1 ;
                                                    @endphp
                                                    <tbody>
                                                        {{-- @foreach ($vendors as $item) --}}
                                                            @foreach (Auth::user('vendor')  ->vendordoc as $vd)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td><a href="javascript:void(0)" data-id="{{ $vd->id }}" data-toggle="modal" data-target="#doc_modal_2{{ $vd->id }}">{{  $vd->vendorjenisdoc->keterangan  }}</a></td>
                                                                <td>{{ $vd->keterangan }}</td>
                                                                <td>
                                                                    @if ($vd->terms == null)
                                                                        <span class="m-badge m-badge--warning m-badge--wide">unverified</span>
                                                                    @else
                                                                        <span class="m-badge m-badge--success m-badge--wide">verified</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if (Auth::user('vendor')->is_published == null)
                                                                    <a href="javascript:void(0)" data-id="{{ $vd->id }}" data-toggle="modal" data-target="#doc_modal_3{{ $vd->id }}" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                                    <a href="/vendor/profile/doc/destroy/{{ $vd->id }}" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                    @endif
                                                                </td>
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
                        @if ( Auth::user('vendor')->is_published == null)
                        <div class="m-portlet__foot">
                            <div class="alert m-alert--default" role="alert">

                                @if (Auth::user('vendor')->terms)
                                <strong>Perhatian!</strong> Data telah dikirimkan
                                <button id="btnsyarat" class="btn btn-success btn-sm" disabled >Menunggu Verifikasi </button>

                                @else
                                <strong>Perhatian!</strong> Lengkapi Profile Perusahaan dan Pastikan Kembali Data Dukung Anda Sebelum
                                    @if (Auth::user('vendor')->is_email_verified == null)
                                    <button id="btnsyarat" class="btn btn-success btn-sm" disabled>Request Verifikasi <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                    @else
                                    <button id="btnsyarat" class="btn btn-success btn-sm" data-toggle="modal" data-target="#syarat" >Request Verifikasi <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                    @endif
                                @endif

                                {{-- <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#syarat"> &nbsp; Request Verifikasi <i class="fa fa-arrow-right" aria-hidden="true"></i></button> --}}
                            </div>
                        </div>
                        @endif
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
                                        <i class="fa fa-archive" aria-hidden="true"></i> &nbsp; Resume Kelengkapan Data
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
                                                    <td><i class="fa fa-file" aria-hidden="true"></i>&nbsp; Lisensi</td>
                                                    <td><strong class="m--font-primary">{{ $vendorlisensicount  }}</strong></td>
                                                    <td>
                                                        <span class="m-badge m-badge--warning m-badge--wide">{{ $vendorlisensi . " unverified" }}</span>
                                                        <span class="m-badge m-badge--success m-badge--wide">{{ $vendorlisensi1 . " verified" }}</span>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">2</td>
                                                    <td><i class="fa fa-file" aria-hidden="true"></i>&nbsp; Pengurus Perusahaan</td>
                                                    <td><strong class="m--font-primary">{{ $vendorpenguruscount }}</strong></td>
                                                    <td>
                                                        <span class="m-badge m-badge--warning m-badge--wide">{{ $vendorpengurus . " unverified" }}</span>
                                                         <span class="m-badge m-badge--success m-badge--wide">{{ $vendorpengurus1 . " verified" }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">3</td>
                                                    <td><i class="fa fa-file" aria-hidden="true"></i>&nbsp; Laporan Keuangan</td>
                                                    <td><strong class="m--font-primary">{{ $vendorlapcount }}</strong></td>
                                                    <td>
                                                        <span class="m-badge m-badge--warning m-badge--wide">{{ $vendorlap . " unverified" }}</span>
                                                        <span class="m-badge m-badge--success m-badge--wide">{{ $vendorlap1 . " verified" }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">4</td>
                                                    <td><i class="fa fa-file" aria-hidden="true"></i>&nbsp; Sertifikat Badan Usaha (SBU)</td>
                                                    <td><strong class="m--font-primary">{{ $vendorsertifikatcount }}</strong></td>
                                                    <td>
                                                        <span class="m-badge m-badge--warning m-badge--wide">{{ $vendorsertifikat . " unverified" }}</span>
                                                        <span class="m-badge m-badge--success m-badge--wide">{{ $vendorsertifikat1 . " verified" }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">5</td>
                                                    <td><i class="fa fa-file" aria-hidden="true"></i>&nbsp; Tenaga Ahli</td>
                                                    <td><strong class="m--font-primary">{{ $vendortenagacount }}</strong></td>
                                                    <td>
                                                        <span class="m-badge m-badge--warning m-badge--wide">{{ $vendortenaga . " unverified" }}</span>
                                                        <span class="m-badge m-badge--success m-badge--wide">{{ $vendortenaga1 . " verified" }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">6</td>
                                                    <td><i class="fa fa-file" aria-hidden="true"></i>&nbsp; Fasilitas / Peralatan</td>
                                                    <td><strong class="m--font-primary">{{ $vendorfasilitascount }}</strong></td>
                                                    <td>
                                                        <span class="m-badge m-badge--warning m-badge--wide">{{ $vendorfasilitas . " unverified" }}</span>
                                                        <span class="m-badge m-badge--success m-badge--wide">{{ $vendorfasilitas1 . " verified" }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">7</td>
                                                    <td><i class="fa fa-file" aria-hidden="true"></i>&nbsp; Pengalaman Perusahaan</td>
                                                    <td><strong class="m--font-primary">{{ $vendorpengalamancount }}</strong></td>
                                                    <td>
                                                        <span class="m-badge m-badge--warning m-badge--wide">{{ $vendorpengalaman . " unverified" }}</span>
                                                        <span class="m-badge m-badge--success m-badge--wide">{{ $vendorpengalaman1 . " verified" }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">8</td>
                                                    <td><i class="fa fa-file" aria-hidden="true"></i>&nbsp; Dokumen Lainnya</td>
                                                    <td><strong class="m--font-primary">{{ $vendordokcount }}</strong></td>
                                                    <td>
                                                        <span class="m-badge m-badge--warning m-badge--wide">{{ $vendordok . " unverified" }}</span>
                                                        <span class="m-badge m-badge--success m-badge--wide">{{ $vendordok1 . " verified" }}</span>
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
                        <div class="m-portlet__head  pull-right">
                            <div class="m-portlet__head-caption">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            @if ( Auth::user('vendor')->is_published == null)
                                                @if (Auth::user('vendor')->terms)
                                                <button id="btnsyarat" class="btn btn-success" disabled >Menunggu Verifikasi</button>
                                               @else
                                               @if (Auth::user('vendor')->is_email_verified == null)
                                               <button id="btnsyarat" class="btn btn-success" disabled>Request Verifikasi <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                               @else
                                                <button id="btnsyarat" class="btn btn-success" data-toggle="modal" data-target="#syarat" >Request Verifikasi <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                                @endif
                                                @endif
                                            @endif
                                                <div class="modal fade" id="syarat" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Persayaratan & Ketentuan</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                            <form action="/vendor/profile/terms" method="post">
                                                            <div class="form-group">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                                <input type="hidden" name="_method" value="PUT" />
                                                                <input type="hidden" name="id" value="{{ Auth::user('vendor')->id }}" />
                                                                <input type="hidden" name="tgl_request" value="{{ $now }}" />
                                                            </div>
                                                            @php
                                                                $no = 1;
                                                            @endphp
                                                            <div class="modal-body">
                                                                <div class="m-scrollable m-scroller ps ps--active-y" data-scrollbar-shown="true" data-scrollable="true" data-height="200" style="height: 200px; overflow: hidden;">
                                                               <h6>PERNYATAAN KEBENARAN DOKUMEN </h6>
                                                               <p style="text-align: justify">
                                                                <ol type="1" style="text-align: justify; font-size: 12px">
                                                                    <li> Segala dokumen legalitas, dokumen perusahaan dan formulir yang kami sampaikan/ isi adalah benar.
                                                                    </li>
                                                                    <li>Dengan ini menyatakan bahwa kami / perusahaan kami tidak termasuk dalam daftar hitam (black list) yang dikeluarkan oleh PT a dan atau Instansi/Perusahaan lain.
                                                                    </li>
                                                                    <li>
                                                                        Tidak akan melakukan praktek Korupsi, Kolusi dan Nepotisme (KKN).
                                                                    </li>
                                                                    <li>Akan melaporkan kepada pihak yang berwajib / berwenang dari PT a apabila mengetahui adanya indikasi Korupsi, Kolusi dan Nepotisme (KKN) di dalam proses Pengadaan Barang dan/atau Jasa ini. <br>
                                                                    </li>
                                                                    <li>
                                                                        Dalam proses Pengadaan Barang/Jasa ini, berjanji akan mengikuti proses Pengadaan Barang/Jasa ini secara bersih, transparan dan profesional dalam arti akan mengerahkan segala kemampuan dan sumber daya secara optimal untuk memberikan hasil kerja terbaik mulai dari penyiapan penawaran sampai tahap penyelesaian kegiatan/pekerjaan ini. <br>
                                                                   </li>
                                                                   <li>
                                                                    Kami/Perusahaan Kami akan melakukan pembaharuan dokumen legalitas apabila ada perubahan/penambahan dokumen/dokumen sudah tidak berlaku. <br>

                                                                   </li>
                                                                   <li>Kami/Perusahaan Kami akan tunduk kepada segala ketentuan yang berlaku di PT a selama tidak bertentangan dengan ketentuan perundang-undangan yang berlaku. <br>


                                                                   </li>
                                                                   <li> Apabila dikemudian hari, ditemui bahwa dokumen - dokumen dan formulir yang telah kami berikan tidak benar/ palsu, maka kami bersedia dikenakan sanksi sebagai berikut : <br>
                                                                   </li>
                                                                   <ol type="i">
                                                                    <li>Administrasi , yaitu berupa dimasukkan dalam daftar hitam PT. a  dan tidak diikutsertakan dalam setiap Pengadaan Barang dan Jasa selama 2 (dua) tahun; </li>
                                                                    <li>Dituntut ganti rugi atau digugat secara perdata;</li>
                                                                    <li>Dilaporkan kepada pihak yang berwajib untuk diproses secara pidana.</li>
                                                                </ol>
                                                                </ol>


                                                                </p>

                                                               <hr>
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" class="agree" name="terms" id="syaratketentuan" value="accept">Sudah Membaca & Menyetujui Syarat & Ketentuan
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <input type="submit" class="btn btn-success" value="Konfirmasi">
                                                                {{-- <input type="submit" class="btn btn-success">Konfirmasi </input> --}}
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>

@include('back.profile.bank')
@include('back.profile.lisensi')
@include('back.profile.pengurus')
@include('back.profile.lap')
@include('back.profile.sertifikat')
@include('back.profile.tenaga')
@include('back.profile.fasilitas')
@include('back.profile.pengalaman')
@include('back.profile.doc')
@include('back.profile.fileupload')



@endsection

@section('footer-script')
<script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
       $(document).ready(function () {
        $('form input[type="submit"]').prop("disabled", true);
        $(".agree").click(function () {
            if ($(this).prop("checked") == true) {
                $('form input[type="submit"]').prop("disabled", false);
            } else if ($(this).prop("checked") == false) {
                $('form input[type="submit"]').prop("disabled", true);
            }
        });

        $("#thn").datepicker({
                autoclose: true,
                format: "yyyy-mm-dd"
        }),
        $("#thn1").datepicker({
                autoclose: true,
                format: "yyyy-mm-dd"
        }),
        $("#start").datepicker({
                autoclose: true,
                format: "yyyy-mm-dd"
        }),
        $("#end").datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            // startDate:new Date
        });
        $("#starte").datepicker({
                autoclose: true,
                format: "yyyy-mm-dd"
        }),
        $("#ende").datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            // startDate:new Date
        });
        $("#berlaku_start").datepicker({
                autoclose: true,
                format: "yyyy-mm-dd"
        }),
        $("#berlaku_end").datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            // startDate:new Date
        });
        $("#berlaku_start1").datepicker({
                autoclose: true,
                format: "yyyy-mm-dd"
        }),
        $("#berlaku_end1").datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            // startDate:new Date
        });
        $("#tgl_kontrak").datepicker({
                autoclose: true,
                format: "yyyy-mm-dd"
        }),
        $("#tgl_selesai").datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            // startDate:new Date
        });
        $("#tgl_bast").datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            // startDate:new Date
        });
        $("#tgl_kontrak1").datepicker({
                autoclose: true,
                format: "yyyy-mm-dd"
        }),
        $("#tgl_selesai1").datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            // startDate:new Date
        });
        $("#tgl_bast1").datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            // startDate:new Date
        });
        $("#thn_pembuatan").datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            // startDate:new Date
        });
        $("#thn_pembuatan1").datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            // startDate:new Date
        });
        $('.publish-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Anda Sudah Yakin?',
            text: 'Data Ini Akan Dikirim untuk Verifikasi !',
            icon: 'warning',
            buttons: ["Tidak", "Iya !"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
        });




    });

</script>
@endsection
