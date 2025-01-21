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
                        <span class="m-nav__link-text">Risalah Rapat Internal Supply Chain Management</span>
                    </a>
                </li>

            </ul>
        </div>

    </div>
</div>
@endsection

@section('m-content')
<div class="m-content" id="app">   
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
                    <!--begin::Form-->
                    <form class="m-form m-form--label-align-right" method="POST" action="/mom/store" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="POST" />
                            {{-- <input type="hidden" name="id" value="{{$dept->id}}" /> --}}
                        </div>                   
                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group row">                                   
                                    <div class="col-lg-6">
                                        <label>Tanggal dan jam Rapat</label>
                                        <div class="input-group date"  data-z-index="1100">
                                            <input required type="text" class="form-control m-input" readonly name="tgl_jam_rapat" placeholder="Select date & time" id="m_datetimepicker_2"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                                            </div>
                                        </div>
                                        {{-- <input type="date" name="tgl_surat" class="form-control m-input" placeholder="Nomor Nodin"> --}}
                                        {{-- <span class="m-form__help">Please enter your full name</span> --}}
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Lokasi Rapat</label>
                                        <input list="lokasis" class="form-control m-input" id="lokasi_rapat" name="lokasi" placeholder="Ketik atau pilih Lokasi Rapat">
                                        <datalist id="lokasis">
                                            <option value="Ruang Rapat GAT">
                                            <option value="Ruang Rapat Jineng">
                                            <option value="Ruang Rapat Lt.1">
                                            <option value="Ruang Rapat Komisaris">
                                            <option value="Online Zoom">
                                        </datalist>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Peserta Rapat</label>                                        
                                        <div class="input-group m-input-group m-input-group--square">
                                            <select name="peserta_rapat[]" class="form-control m-bootstrap-select m_selectpicker" id="lokasi_id" multiple>
                                                @foreach ($pics as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach                                    
                                            </select>
                                        </div>
                                    </div>                                  
                                </div> 
                                <div class="form-group m-form__group row">                                   
                                    <div class="col-lg-6">
                                        <label>Agenda Rapat</label>
                                        <textarea required name="nama_agenda" id="agenda_Rapat" cols="30" rows="3" class="form-control m-input" placeholder="Agenda Rapat"></textarea>
                                        {{-- <input type="text" name="detail" class="form-control m-input" placeholder="Nama Pekerjaan"> --}}
                                        {{-- <span class="m-form__help">We'll never share your email with anyone else</span> --}}
                                    </div>
                                    <div class="col-lg-6">
                                        <label>File MoM pdf</label>                                        
                                        <input type="file" class="form-control m-input" id="attach_file" name="attach_file" accept="application/pdf">
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
                                                    <th width="20%">Issue</th>
                                                    <th width="20%">Pembahasan</th>
                                                    <th width="20%">Tindak Lanjut & Usulan</th>
                                                    <th width="10%">Batas Waktu</th>
                                                    <th width="15%">PIC</th>
                                                    <th width="10%">Status</th>
                                                    <th width="5%">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(i,issue) in issues">
                                                    {{-- <td>{{i}}</td> --}}
                                                    <td>
                                                        {{-- <input type="text" v-model="issue.a" class="form-control m-input" placeholder="Issue" required> --}}
                                                        <input type="hidden" name="jml_issue" v-model="i">
                                                        <textarea v-model="issue.issue" :name="'issue'+i" rows="3" class="form-control m-input" placeholder="Issue"></textarea>
                                                    </td>
                                                    <td>
                                                        <textarea v-model="issue.pembahasan" :name="'pembahasan'+i" rows="3" class="form-control m-input" placeholder="Pembahasan"></textarea>
                                                    </td>
                                                    <td>
                                                        <textarea v-model="issue.tindak_lanjut" :name="'tindak_lanjut'+i" rows="3" class="form-control m-input" placeholder="Tindak Lanjut & Usulan"></textarea>
                                                    </td>
                                                    <td>
                                                        <input type="date" v-model="issue.batas_waktu" :name="'batas_waktu'+i" class="form-control m-input" placeholder="Batas Waktu">
                                                    </td>
                                                    <td>
                                                        <div class="input-group m-input-group m-input-group--square">
                                                            <select v-model="issue.pic" :name="'pic'+i+'[]'" class="form-control bootstrap-select selectpicker" multiple>
                                                                @foreach ($pics as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach                                    
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{-- <input type="text" name="name[]" id="name" class="form-control m-input" placeholder="Status" required> --}}
                                                        <select v-model="issue.status" :name="'status'+i" class="form-control bootstrap-select selectpicker">
                                                            <option value="Open" selected>Open</option>                                  
                                                            <option value="Progress">Progress</option>                                  
                                                            <option value="Pending">Pending</option>                                  
                                                            <option value="Done">Done</option>                                  
                                                        </select>
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
                                        <a href="/mom" class="btn btn-default">Back</a>
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
    <script src="{{ asset('assets/demo/default/custom/crud/forms/widgets/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vue/vue.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        var vuez = new Vue({
            el: '#app',
            data: {
                title: null,
                control: null,
                issues: [{
                    a: null,
                    pembahasan: null,
                    tindak_lanjut: null,
                    batas_waktu: null,
                    pic: null,
                    status: null
                }]
            },
            created() {
                
            },
            watch: {
    
            },
            methods: {
                addRow() {
                    var vm = this;
                    vm.issues.push({
                        a: null,
                        pembahasan: null,
                        tindak_lanjut: null,
                        batas_waktu: null,
                        pic: null,
                        status: null,
                    });
                    // Reinitialize selectpicker after DOM update
                    vm.$nextTick(() => {
                        $('.selectpicker').selectpicker('refresh');
                    });
                },
                deleteRow(index) {
                    var vm = this;
                    this.issues.splice(index, 1); // Menghapus elemen berdasarkan indeks
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
