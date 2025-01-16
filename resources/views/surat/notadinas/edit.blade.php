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
<div id="app" v-cloak class="m-content">   
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
                    <!--begin::Form-->
                    <form class="m-form m-form--label-align-right" method="POST" action="/notadinas/update" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="PUT" />
                            <input type="hidden" name="id" value="{{$nodins->id}}" />
                        </div>                   
                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group row">                                   
                                    <div class="col-lg-3">
                                        <label>No Nota Dinas</label>
                                        <input type="text" name="no_nodin" class="form-control m-input" value="{{ $nodins->no_nodin }}" readonly> 
                                        {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Tanggal Surat</label>
                                        <input type="date" name="tgl_surat" class="form-control m-input" value="{{ $nodins->tgl_surat }}" placeholder="Nomor Nodin" readonly>
                                        {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Tanggal Terima</label>
                                        <input type="date" name="tgl_terima" class="form-control m-input" value="{{ $nodins->tgl_terima }}" readonly>
                                        {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Divisi</label>
                                        <select name="divisi_id" class="form-control m-bootstrap-select m_selectpicker"
                                        id="divisi_id" data-live-search="true" required>
                                        <option value="{{ $nodins->divisi_id }}">{{ $nodins->divisi->detail }}</option>
                                        @foreach ($divisis as $item)
                                            @if ($nodins->divisi_id != $item->id)
                                            <option value="{{ $item->id }}">{{ $item->detail }}</option>
                                            @endif                                      
                                        @endforeach
                                    </select>
                                    </div>
                                  
                                  
                                </div> 
                                <div class="form-group m-form__group row">                                   
                                    <div class="col-lg-4">
                                        <label>Nama Paket Pekerjaan</label>
                                        <textarea name="nama_pek" id="nama_pek" cols="30" rows="3" class="form-control m-input" placeholder="Nama Pekerjaan">{{ $nodins->nama_pek }}</textarea>
                                        {{-- <input type="text" name="detail" class="form-control m-input" placeholder="Nama Pekerjaan"> --}}
                                        {{-- <span class="m-form__help">We'll never share your email with anyone else</span> --}}
                                    </div>
                                    <div class="col-lg-2">
                                        <label>Lokasi</label>


                                        <div class="input-group m-input-group m-input-group--square">
                                            <select name="lokasi_id[]" class="form-control m-bootstrap-select m_selectpicker" id="lokasi_id" multiple>
                                            @foreach ($lokasis as $item)
                                                @if (collect($nodins->lokasi)->contains('id', $item->id))
                                                    <option value="{{ $item->id }}" selected>{{ $item->kode }}</option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->kode }}</option>
                                                @endif                                    
                                            @endforeach                                   
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Unit Prolog</label>
                                        <select name="unit_st" id="unit_st" class="form-control m-bootstrap-select m_selectpicker">
                                            @if ($nodins->unit_st == "procurement")
                                            <option value="procurement">Procurement</option>
                                            <option value="logistic">Logistic</option>
                                            @else
                                            <option value="logistic">Logistic</option>
                                            <option value="procurement">Procurement</option>
                                           
                                            @endif
                                            {{-- <option value="procurement">Procurement</option>
                                            <option value="logistic">Logistic</option> --}}
                                        </select>
                                        {{-- <input type="text" name="kode" class="form-control m-input" placeholder="Nomor Nodin"> --}}
                                        {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                    </div>
                                    <div class="col-lg-3">
                                        <label>PIC Manager</label>
                                        <input type="text" name="pic" class="form-control m-input" value="{{ $nodins->pic }}">
                                        {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                    </div>
                                </div> 
                                <div class="form-group m-form__group row">                                   
                                    {{-- <div class="col-lg-3">
                                        <label>PIC</label>
                                        <input type="text" name="pic" class="form-control m-input" value="{{ $nodins->pic }}">
                                     
                                    </div> --}}
                                    <div class="col-lg-2">
                                        <label>Status</label>
                                        <select name="status" id="status" class="form-control m-bootstrap-select m_selectpicker">
                                            @if ($nodins->status == "open")
                                                <option value="open">Open</option>
                                                <option value="proses">Progress</option>
                                                <option value="pending">Pending</option>
                                                <option value="gagal">Gagal Tender</option>
                                                @if ($crud->publish > 0)
                                                <option value="done">Done</option>
                                                <option value="cancel">Cancel</option>
                                                <option value="revisi">Revisi</option>
                                                @endif
                                            @elseif ($nodins->status == "proses")
                                                <option value="proses">Progress</option>
                                                <option value="pending">Pending</option>
                                                <option value="open">Open</option>
                                                <option value="gagal">Gagal Tender</option>
                                                @if ($crud->publish > 0)
                                                <option value="done">Done</option>
                                                <option value="cancel">Cancel</option>
                                                <option value="revisi">Revisi</option>
                                                @endif
                                            @elseif ($nodins->status == "pending")                                          
                                                <option value="pending">Pending</option>
                                                <option value="open">Open</option>
                                                <option value="proses">Progress</option>
                                                <option value="gagal">Gagal Tender</option>
                                                @if ($crud->publish > 0)
                                                <option value="done">Done</option>
                                                <option value="cancel">Cancel</option>
                                                <option value="revisi">Revisi</option>
                                                @endif
                                            @elseif ($nodins->status == "cancel")                                          
                                                <option value="pending">Pending</option>
                                                <option value="open">Open</option>
                                                <option value="proses">Progress</option>
                                                <option value="gagal">Gagal Tender</option>
                                                @if ($crud->publish > 0)
                                                <option value="done">Done</option>
                                                <option value="cancel">Cancel</option>
                                                <option value="revisi">Revisi</option>
                                                @endif
                                            @elseif ($nodins->status == "revisi")        
                                                <option value="revisi">Revisi</option>                                  
                                                <option value="pending">Pending</option>
                                                <option value="open">Open</option>
                                                <option value="proses">Progress</option>
                                                <option value="gagal">Gagal Tender</option>
                                                @if ($crud->publish > 0)
                                                <option value="done">Done</option>
                                                <option value="cancel">Cancel</option> 
                                                @endif 
                                            @elseif ($nodins->status == "gagal")                                          
                                                <option value="gagal">Gagal Tender</option>
                                                <option value="pending">Pending</option>
                                                <option value="open">Open</option>
                                                <option value="proses">Progress</option>
                                                @if ($crud->publish > 0)
                                                    <option value="done">Done</option>
                                                    <option value="cancel">Cancel</option>
                                                    <option value="revisi">Revisi</option>
                                                @endif                                             
                                            @else
                                                <option value="done">Done</option>
                                                <option value="open">Open</option>
                                                <option value="proses">Progress</option>
                                                <option value="pending">Pending</option>
                                                <option value="gagal">Gagal Tender</option>
                                                @if ($crud->publish > 0)
                                                <option value="cancel">Cancel</option>
                                                <option value="revisi">Revisi</option>   
                                                @endif 
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Catatan VP</label>
                                        {{-- @if ($nodins->user_id)
                                        <textarea name="keterangan" id="summernote" class="form-control m-input">{!! $nodins->keterangan !!}</textarea>
                                        @else
                                        <span>{!! $nodins->keterangan !!}</span>
                                        @endif --}}
                                        <span>{!! $nodins->keterangan !!}</span>
                                        {{-- <textarea name="keterangan" id="summernote" class="form-control m-input">{!! $nodins->keterangan !!}</textarea> --}}
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Catatan Tindak Lanjut</label>
                                        <textarea name="kesimpulan" class="form-control m-input" rows="5">{{ $nodins->kesimpulan }}</textarea>
                                    </div>
                                    <div class="col-lg-2">
                                        <label>PIC Officer</label>
                                        <input type="text" name="pic_off" class="form-control m-input" value="{{ $nodins->pic_off }}">
                                        {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                    </div>
                                </div>     
                                
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-12">
                                        <div class="btn-group">
                                            <button @click="addRow" type="button" class="btn btn-primary">
                                                Add Row
                                            </button>
                                        </div>
        
                                        <table class="table table-striped-table-bordered table-hover">
                                            <thead>
                                                <tr style="text-align:center;">
                                                    <th width="20%">Tanggal</th>
                                                    <th width="25%">Item</th>
                                                    <th width="25%">Status</th>
                                                    <th width="25%">File</th>
                                                    <th width="5%">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(i,tl) in timeline">
                                                    {{-- <td>{{i}}</td> --}}
                                                    <td>
                                                        {{-- <input type="text" v-model="issue.a" class="form-control m-input" placeholder="Issue" required> --}}
                                                        <input type="hidden" name="jml_timeline" v-model="i">
                                                        <input type="date" v-model="tl.tanggal" :name="'tanggal'+i" class="form-control m-input" placeholder="tanggal">
                                                    </td>
                                                    <td>
                                                        <input list="items" v-model="tl.item" class="form-control m-input" id="lokasi_rapat" :name="'item'+i" placeholder="Ketik atau pilih Item">                                                            
                                                        <datalist id="items">
                                                            <option>Nota Dinas Permintaan Pengadaan</option>
                                                            <option>Risalah Rapat Persiapan Pengadaan</option>
                                                            <option>Surat Permintaan Penawaran Harga</option>
                                                            <option>Berita Acara Aanwijzing</option>
                                                            <option>Surat Penawaran Harga Vendor</option>
                                                            <option>Berita Acara Pembukaan Penawaran</option>
                                                            <option>Nota Dinas Permintaan Penilaian Teknis</option>
                                                            <option>Hasil Penilaian Teknis dari UST</option>
                                                            <option>Berita Acara Evaluasi Penawaran</option>
                                                            <option>Surat Pengumuman Hasil Evaluasi & Undangan Negosiasi</option>
                                                            <option>Berita Acara Klarifikasi</option>
                                                            <option>Berita Acara Negosiasi</option>
                                                            <option>Surat Pengumuman Pemenang</option>
                                                            <option>Surat Penunjukan Pemenang</option>
                                                            <option>Kontrak</option>                                
                                                        </datalist>
                                                    </td>
                                                    <td>
                                                        <select v-model="tl.status" :name="'status'+i" class="form-control bootstrap-select selectpicker">
                                                            <option value="Dalam proses">Dalam proses</option>                                  
                                                            <option value="Review Legal">Review Legal</option>                                  
                                                            <option value="Selesai">Selesai</option>                                  
                                                            <option value="Pending">Pending</option>                                  
                                                            <option value="Batal">Batal</option>                                  
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" :name="'attach_file'+i" v-model="tl.attach_file">
                                                        <input type="file" v-model="tl.file" :name="'file'+i" class="form-control m-input" placeholder="file" accept="application/pdf">
                                                        <a v-if="tl.attach_file" :href="url+'/'+tl.attach_file" target="_blank"><span class="m-widget4__text">@{{tl.attach_file}}</span></a>
                                                    </td>
                                                    <td><button class="btn btn-danger" @click="deleteRow(i)"><i class="m-nav__link-icon la la-trash"></i></button></td>
                                                </tr>
                                            </tbody>
                                        </table>                                    
                                    </div>
                                </div>  

                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-6">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="/notadinas" class="btn btn-default">Back</a>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->
    
                
            </div>
        </div>
    </div>
    
@endsection


@section('footer-script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{ asset('assets/vue/vue.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        var vuez = new Vue({
            el: '#app',
            data: {
                title: null,
                url: '<?= url("data_file/pdf/"); ?>',
                // timeline: [{
                //     tanggal: null,
                //     item: null,
                //     status: null,
                //     attach_file: null
                // }],
                timeline: <?= json_encode($nodins->notatimelines); ?>,
            },
            created() {
                
            },
            watch: {
    
            },
            methods: {
                addRow() {
                    var vm = this;
                    // vm.timeline = vm.temp;
                    vm.timeline.push({
                        tanggal: null,
                        item: null,
                        status: null,
                        attach_file: null,
                        file: null
                    });
                    // Reinitialize selectpicker after DOM update
                    vm.$nextTick(() => {
                        $('.selectpicker').selectpicker('refresh');
                    });
                },
                deleteRow(index) {
                    var vm = this;
                    this.timeline.splice(index, 1); // Menghapus elemen berdasarkan indeks
                    // Reinitialize selectpicker after DOM update
                    vm.$nextTick(() => {
                        $('.selectpicker').selectpicker('refresh');
                    });
                },
            }
        });
    </script>
    <script>
        $('#summernote').summernote({
                height: "100px"
            });
            // $('#nama_brg').summernote({
            //     height: "100px"
            // });
            // $('#summernote1').summernote({
            //     height: "100px"
            // });
    </script>
@endsection