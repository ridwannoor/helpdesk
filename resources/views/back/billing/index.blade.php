@extends('layouts.app2')

{{-- @section('m-subheader')
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
@endsection --}}

@section('m-content')
<div class="m-content">
    @include('component.alertnotification')
    <div class="col-md-12">
        <h2>Billing</h2>
        <br>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <h5> Current Plan</h5>
                <hr>
                <span>Your Current Subscription Plan : <strong>Expired</strong></span> <br>
                <span>Last Payment : N/A</span>
                <br>

            </div>
            <div class="col-md-6">
                <h5> Billing</h5>
                <hr>
               <div class="m-portlet">
                <div class="m-portlet__body">
                    <form action="/billing/detail" method="POST" enctype="multipart/form-data">
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-6 col-form-label">Billing Cycle</label>
                            <div class="col-6">
                                <select name="masa_berlaku" class="form-control m-input" id="masa_berlaku">
                                    <option value="1">Monthly</option>
                                    <option value="2">Year</option>
                                </select>
                                {{-- <input class="form-control m-input" type="text" value="Artisanal kale" id="example-text-input"> --}}
                            </div>
                        </div> 
                        <hr>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-6 col-form-label">logistik.approperti.com</label>
                            <div class="col-6 col-form-label">
                                <span class="pull-right" style="text: center"><strong >Rp 499.000</strong></span>
                                {{-- <select name="masa_berlaku" class="form-control m-input" id="masa_berlaku">
                                    <option value="1">Monthly</option>
                                    <option value="2">Year</option>
                                </select> --}}
                                {{-- <input class="form-control m-input" type="text" value="Artisanal kale" id="example-text-input"> --}}
                            </div>
                        </div> 
                        <hr>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-6 col-form-label"><h5>Total Amount</h5>  <br><span>Your expiration date will be extended to <br>
                                14 December 2022</span></label>
                            
                            <div class="col-6 col-form-label">
                                <h5 class="pull-right" style="text: center"><strong >Rp 499.000</strong></span>
                                {{-- <select name="masa_berlaku" class="form-control m-input" id="masa_berlaku">
                                    <option value="1">Monthly</option>
                                    <option value="2">Year</option>
                                </select> --}}
                                {{-- <input class="form-control m-input" type="text" value="Artisanal kale" id="example-text-input"> --}}
                            </div>
                        </div> 

                        <div class="form-group m-form__group row">
                           <a href="/billing/detail" class="btn btn-success col-12 ">Bayar</a>
                        </div> 

                    </form>
                </div>
               </div> 
            </div>
        </div>
    </div>
    <br>
    <div class="col-md-12">
        <div class="m-portlet">
            <div class="m-portlet__body">
        <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1_wrapper">
            <thead>
                <tr>
                    <th>Invoice Date</th>
                    <th>Invoice Number</th>
                    <th>Periode</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            @php
            $no = 1 ;
            @endphp
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                {{-- @foreach ( $brgs as $brg)
                <tr>
                    <td>{{ $no++ }}</td>
                <td>
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="{{ url('data_file/'.$brg->image) }}" alt="image" width="70px">
                        </div>
                        <div class="col-sm-9">
                            <strong> {{ $brg->nama_brg }} </strong><br>
                            <span class="m-badge m-badge--secondary m-badge--wide">tgl pembelian:
                                {{  date("d-m-Y", strtotime( $brg->tgl_pembelian)) }}</span>
                        </div>
                    </div>
                </td>
                <td style="vertical-align : middle;text-align:center;">{{ $brg->aset_tag }}</td>
                <td style="vertical-align : middle;text-align:center;">{{ $brg->tahun_perolehan }}</td>
                <td width='130px'>
                    @if ($crud->show > 0)
                    <a href="/barang/show/{{ $brg->id }}"
                        class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i
                            class="flaticon-visible"></i></a>

                    @endif
                    @if ($crud->edit > 0)
                    <a href="/barang/edit/{{ $brg->id }}"
                        class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"><i
                            class="flaticon-edit"></i></a>

                    @endif
                    @if ($crud->destroy > 0)
                    <a href="/barang/destroy/{{ $brg->id }}"
                        class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill delete-confirm"><i
                            class="flaticon-delete"></i></a>

                    @endif
                </td>
                </tr>


                @endforeach --}}
            </tbody>

        </table>
    </div>
</div>
    </div>

    <!-- END EXAMPLE TABLE PORTLET-->
</div>
@endsection

@section('footer-script')
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}"
    type="text/javascript"></script>
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Anda Sudah Yakin?',
                text: 'Data Ini Akan Dihapus Secara Permanen !',
                icon: 'warning',
                buttons: ["Tidak", "Iya !"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    </script> --}}
@endsection
