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
    @include('sweetalert::alert')
    
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
                                            <h1>AKUN</h1> 	
                                        </a>				 
                                        {{-- <a href="#">
                                            <img  src="assets/app/media/img/logos/logo_client_color.png">  	
                                        </a> --}}
                                    </div> 
                                    <span class="m-invoice__desc">
                                        <span>
                                            {{ $pref->nama_perusahaan }} <br>
                                            {{ $pref->address }} <br>
                                            {{ $pref->email }} <br>
                                            {{ $pref->phone }} 
                                        </span>

                                        {{-- <span>Mississippi 96522</span> --}}
                                    </span>
                                    <div class="m-invoice__items">
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">START DATE</span>
                                            <span class="m-invoice__text">Dec 12, 2017</span>
                                        </div>
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">EXPIRED DATE</span>
                                            <span class="m-invoice__text m--font-success">Dec 12, 2018</span>
                                        </div>
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">STATUS</span>
                                            <span class="m-invoice__text m--font-success">ACTIVE</span>
                                        </div>
                                        <div class="m-invoice__item">
                                            <span class="m-invoice__subtitle">LISENSI NUMBER</span>
                                            <span class="m-invoice__text m--font-info">Iris Watson, P.O. Box 283 8562 Fusce RD.</span>
                                        </div>
                                    </div>
                                    {{-- <button class="btn btn-info" type="submit">Purchase</button> --}}
                                    <!-- Button trigger modal -->
                                  
                                 
                                    <!-- Modal -->
                                 {{--       <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                    <div class="modal-header">
                                                            <h5 class="modal-title">Modal title</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        Add rows here
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <script>
                                        $('#exampleModal').on('show.bs.modal', event => {
                                            var button = $(event.relatedTarget);
                                            var modal = $(this);
                                            // Use above variables to manipulate the DOM
                                            
                                        });
                                    </script> --}}
                                </div>					 	
                            </div>
                         
                            <div class="m-invoice__footer">						 
                                <div class="m-invoice__table  m-invoice__table--centered">    
                                    <a href="/purchase/detail" class="btn btn-brand m-btn m-btn--custom m-btn--pill m-btn--wide m-btn--uppercase m-btn--bolder pull-right">PURCHASE</a>                                
                                    {{-- <button type="button" class="btn btn-brand m-btn m-btn--custom m-btn--pill m-btn--wide m-btn--uppercase m-btn--bolder pull-right">PURCHASE</button> --}}
                                </div>							 				 					
                            </div>				 
                        </div>	 
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

    $('.publish-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Anda Sudah Yakin?',
            text: 'Data Ini Akan Dipublish !',
            icon: 'warning',
            buttons: ["Tidak", "Iya !"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>
{{-- <script>
   $('.mdl').click(function(){
    var id=$(this).data('id');
    $('#modalDelete').attr('href','delete-cover.php?id='+id);
    })
</script> --}}
@endsection