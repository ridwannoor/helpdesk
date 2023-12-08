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
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">	 
                <div class="m-portlet__body m-portlet__body--no-padding">
                    <div class="m-invoice-2">
                        <div class="m-invoice__wrapper">
                            <div class="m-invoice__head" style="background-image: url(assets/app/media/img/logos/bg-6.html);">	
                                <div class="m-invoice__container m-invoice__container--centered">			 		 
                                    <div class="m-invoice__logo">
                                        <a href="#">
                                            <h1>INVOICE</h1> 	
                                        </a>				 
                                        <a href="#">
                                            <img  src="assets/app/media/img/logos/logo_client_color.png">  	
                                        </a>
                                    </div> 
                                    <span class="m-invoice__desc">
                                        <span>Cecilia Chapman, 711-2880 Nulla St, Mankato</span>
                                        <span>Mississippi 96522</span>
                                    </span>
                                    <div class="m-invoice__items">
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">DATA</span>
                                            <span class="m-invoice__text">Dec 12, 2017</span>
                                        </div>
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">INVOICE NO.</span>
                                            <span class="m-invoice__text">GS 000014</span>
                                        </div>
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">INVOICE TO.</span>
                                            <span class="m-invoice__text">Iris Watson, P.O. Box 283 8562 Fusce RD.<br>Fredrick Nebraska 20620</span>
                                        </div>
                                    </div>
                                </div>					 	
                            </div>
                            <div class="m-invoice__body m-invoice__body--centered">
                                <div class="table-responsive"> 
                                    <table class="table">
                                        <thead> 							 			 
                                            <tr>
                                                 <th>DESCRIPTION</th>
                                                 <th>HOURS</th>
                                                 <th>RATE</th>
                                                 <th>AMOUNT</th>
                                            </tr>
                                        </thead>	
                                        <tbody>	 
                                            <tr>
                                                 <td>Creative Design</td>
                                                 <td>80</td>
                                                 <td>$40.00</td>
                                                 <td class="m--font-danger">$3200.00</td>
                                            </tr>	
                                            <tr>
                                                 <td>Front-End Development</td>
                                                 <td>120</td>
                                                 <td>$40.00</td>
                                                 <td class="m--font-danger">$4800.00</td>
                                            </tr>	
                                            <tr>
                                                 <td>Back-End Development</td>
                                                 <td>210</td>
                                                 <td>$60.00</td>
                                                 <td class="m--font-danger">$12600.00</td>
                                            </tr>							 
                                        </tbody> 
                                    </table>
                                </div>					 		
                            </div>
                            <div class="m-invoice__footer">						 
                                <div class="m-invoice__table  m-invoice__table--centered table-responsive"> 
                                    <table class="table">
                                        <thead> 							 			 
                                            <tr>
                                                <th>BANK</th>
                                                <th>ACC.NO.</th>
                                                <th>DUE DATE</th>
                                                <th>TOTAL AMOUNT</th>
                                            </tr>
                                        </thead>	
                                        <tbody>	 
                                            <tr>
                                                <td>BARCLAYS UK</td>
                                                <td>12345678909</td>
                                                <td>Jan 07, 2018</td>
                                                <td class="m--font-danger">20,600.00</td>
                                            </tr>										 					 
                                        </tbody> 
                                    </table>
                                </div>							 				 					
                            </div>				 
                        </div>	 
                    </div>
                </div>
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
