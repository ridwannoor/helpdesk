@extends('layouts.app2')

@section('m-subheader')

<style>
  .timeline {
    border-left: 2px solid #dee2e6;
    padding-left: 15px;
  }
</style>

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
                                <td>Status</td>
                                <td>{{ $nodins->status }}</td>
                            </tbody>
                        </table>
                        <div class="container my-4">
                            <div class="timeline">
                                <div v-for="(index, tl) in timeline" class="timeline-item mb-4 d-flex">
                                    <div class="timeline-marker bg-primary rounded-circle mr-3" style="width: 16px; height: 16px; margin-top: 5px;"></div>
                                    <div class="timeline-content">
                                        <div class="small text-muted">@{{ tl.created_at }}</div>
                                        <div class="font-weight-bold">@{{ tl.item }} | @{{ tl.status }}</div>
                                        {{-- <div class="text-primary"></div> --}}
                                    </div>
                                </div>
                                <div class="timeline-item mb-4 d-flex">
                                    <div class="timeline-marker bg-primary rounded-circle mr-3" style="width: 16px; height: 16px; margin-top: 5px;"></div>
                                    <div class="timeline-content">
                                        <div class="small text-muted">{{ $nodins->tgl_terima }}</div>
                                        <div class="font-weight-bold">Nota Dinas diterima SCM</div>
                                        {{-- <div class="text-primary">Done</div> --}}
                                    </div>
                                </div>
                                <div class="timeline-item mb-4 d-flex">
                                    <div class="timeline-marker bg-primary rounded-circle mr-3" style="width: 16px; height: 16px; margin-top: 5px;"></div>
                                    <div class="timeline-content">
                                        <div class="small text-muted">{{ $nodins->tgl_surat }}</div>
                                        <div class="font-weight-bold">Nota Dinas dari Unit ST</div>
                                        {{-- <div class="text-primary">Done</div> --}}
                                    </div>
                                </div>
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

    <script src="{{ asset('assets/vue/vue.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        var vuez = new Vue({
            el: '#app',
            data: {
                title: null,
                url: '<?= url("data_file/pdf/"); ?>',
                timeline: (() => {
                    // Merge timeline items with same noteheader_id, tanggal, item, and status
                    // Keep only the earliest created_date for duplicates
                    const raw = <?= json_encode($nodins->notatimelineswithdeleted); ?>;
                    const merged = [];
                    raw.forEach(item => {
                        const found = merged.find(m =>
                            m.noteheader_id === item.noteheader_id &&
                            m.tanggal === item.tanggal &&
                            m.item === item.item &&
                            m.status === item.status
                        );
                        if (!found) {
                            merged.push(item);
                        } else {
                            // Compare created_at, keep the earliest
                            if (item.created_at < found.created_at) {
                                Object.assign(found, item);
                            }
                        }
                    });
                    // Sort by created_at descending
                    merged.sort((a, b) => b.created_at.localeCompare(a.created_at));
                    return merged;
                })(),
            },
            created() {

            },
            watch: {

            },
            methods: {

            }
        });
    </script>

@endsection
