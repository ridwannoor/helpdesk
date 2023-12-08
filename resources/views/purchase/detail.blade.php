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
        <div class="col-lg-4">
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
                                        </span> <hr>
                                        <span>Start Date : </span> <br>
                                        <span>Expired Date :</span> <br>
                                        <span>Status :</span> <br>
                                        <span>License : </span>
                                        {{-- <span>Mississippi 96522</span> --}}
                                    </span>
                                  
                                </div>					 	
                            </div>
                         		 
                        </div>	 
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="m-portlet">	 
                <div class="m-portlet__body">
                    <form action="" method="post">
                    <div class="m-form__section m-form__section--first">
                        <div class="form-group">
                          <label for="">Periode</label>
                          <select class="form-control" name="price" id="mySelect" onchange="myFunction()">
                            <option >Rp 1,000,000 / Bulan</option>
                            <option >Rp 5,500,000 / 6 Bulan</option>
                            <option >Rp 10,000,000 / 12 Bulan</option>
                          </select>  
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-brand m-btn m-btn--custom m-btn--pill m-btn--wide m-btn--uppercase m-btn--bolder " data-toggle="modal" data-target="#modelId">
                                <i class="fa flaticon-price-tag" aria-hidden="true"></i> Metode Pembayaran
                            </button>
                     
                            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Metode Pembayaran</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                              <div class="form-group">
                                                <label for="recipient-name" class="form-control-label">Pilihan Bank:</label>
                                                  <select class="form-control" name="bank" id="myBank" onchange="myFunction()">
                                                    @foreach ($banks as $item)
                                                      <option value="{{ $item->id }}">{{ $item->bank }}</option>
                                                    @endforeach
                                                  </select>                                                      
                                              </div>
                                              <div class="form-group">
                                                <label for="" id="bank"></label>
                                                
                                              </div>
                                            </form>
                                          </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="form-group ">
                            <label for="">Periode</label>
                            <label for="" id="demo" class="pull-right"></label>
                            {{-- <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Help text</small> --}}
                          </div>
                    </div>
                </form>
                </div>
            </div>
        </div>

                {{-- <div class="m-portlet__body m-portlet__body--no-padding">
                  
                        <form class="m-form m-form--label-align-right" action="#" method="get">
                            <div class="m-portlet">
                                <div class="form-group  m-form__group">
                                    <label for="">Periode</label>
                                    <select class="form-control" name="price" id="mySelect" onchange="myFunction()">
                                        <option value="100000">Rp 1,000,000 / Bulan</option>
                                        <option value="500000">Rp 5,500,000 / 6 Bulan</option>
                                        <option value="1000000">Rp 10,000,000 / 12 Bulan</option>
                                      </select>  
                              
                                  </div>
                                  <div class="form-group  m-form__group">
                                    <button type="button" class="btn btn-brand m-btn m-btn--custom m-btn--pill m-btn--wide m-btn--uppercase m-btn--bolder pull-right" data-toggle="modal" data-target="#modelId">
                                        <i class="fa flaticon-price-tag" aria-hidden="true"></i> Metode Pembayaran
                                    </button>
                             
                                    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Metode Pembayaran</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                      <div class="form-group">
                                                        <label for="recipient-name" class="form-control-label">Pilihan Bank:</label>
                                                          <select class="form-control" name="" id="">
                                                            <option></option>
                                                            <option></option>
                                                            <option></option>
                                                          </select>                                                      
                                                      </div>
                                                      <div class="form-group">
                                                      
                                                        <textarea class="form-control" id="message-text"></textarea>
                                                      </div>
                                                    </form>
                                                  </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
        
                                  <div class="form-group">
                                    <label for=""></label>
                               
                                    <small id="helpId" class="text-muted">Help text</small>
                                  </div>
                          
                            </div>
                             </form>
                    </div> --}}
              
                      
                {{-- </div>
            </div>
        </div> --}}
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
<script>
    function myFunction() {
      var x = document.getElementById("mySelect").value;
      document.getElementById("demo").innerHTML = x;
    }

    function myFunction() {
      var x = document.getElementById("myBank").value;
      document.getElementById("bank").innerHTML = x;
    }
    </script>
{{-- <script>
   $('.mdl').click(function(){
    var id=$(this).data('id');
    $('#modalDelete').attr('href','delete-cover.php?id='+id);
    })
</script> --}}
@endsection