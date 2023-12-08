@extends('front.layouts.app')

@section('content')
    
    <!-- START SLIDER -->
    <div id="main-slider">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel"
            data-interval="5000">

            {{-- <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol> --}}
            @foreach ($sliders as $item)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
                class="{{ $loop->first ? 'active' :'' }}"></li>
            @endforeach

            <div class="carousel-inner" role="listbox">

                <!-- Slider 1 -->
                @foreach ($sliders as $item)
                    
                <div class="carousel-item {{ $loop->first ? 'active' :'' }}" style="background-image: url('{{ url('data_file/'.$item->image) }}')">
                    <div class="carousel-caption text-left">
                        <div class="container">
                            <h5 class="text-justify">{{ $item->deskripsi }}</h5>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

            <!-- Previous Btn -->
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <!-- Next Btn -->
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
    <!-- END SLIDER -->
   

    
<!-- START NEW PROJECT -->
	
<div id="new-project">
    <div class="container mt-4">
        <div class="row d-flex align-items-center ">

            <!-- New Project -->
            <div class="col-lg-10 text-left">
                <h1 class="mb-2" style="color: blue">Menjadi Rekanan Kami ?</h1>
                <p class="mb-0">Daftarkan perusahaan anda menjadi rekanan kami untuk kemudahan serta informasi dalam kaitannya dengan proses pengadaan barang dan/atau jasa</p>
            </div>
            <div class="col-lg-2 text-right">
                <a href="/vendor/register" ><img src="{{ asset('/front/assets/images/daftar.png') }}" alt="" width="170px"></a>
            </div>

        </div>
    </div>
</div>

<!-- END NEW PROJECT -->
<div id="what-we-do">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="row d-flex">
                        <div class="col-lg-3">
                            <img src="{{ asset('/front/assets/images/tuv_label.png') }}" alt="" width="100px" class="mb-2"> <br> 
                            <img src="{{ asset('/front/assets/images/smk3.png') }}" alt="" width="100px"> 
                            {{-- <i class="mdi mdi-certificate mdi-48px"></i> --}}
                        </div>
                        <div class="col-lg-9">
                            <h4 class="mb-2">Sertifikat Perusahaan</h4>
                            <p class="mb-0">ISO 9001:2015 <br> ISO 14001:2015 <br> ISO 45001:2018 <br> SMK3 PP 50/2012</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-3">
                            <img src="{{ asset('/front/assets/images/mailq.png') }}" alt="" width="70px">
                            {{-- <i class="mdi mdi-email mdi-48px"></i> --}}
                        </div>
                        <div class="col-lg-9">
                            <h4 class="mb-2">Dukungan Email</h4>
                            {{-- <p class="mb-0" >{{ $pref->email }}</p> --}}
                        </div>
                        <div class="col-lg-12">
                          
                            <p class="mb-0" >{{ $pref->email }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-3">
                            <img src="{{ asset('/front/assets/images/phone.png') }}" alt="" width="70px">
                            {{-- <i class="mdi mdi-phone mdi-48px"></i> --}}
                        </div>
                        <div class="col-lg-9">
                            <h4 class="mb-2">Senin - Jum'at <br> 09.00 s/d 16.00 WIB</h4>
                          
                        </div>
                        <div class="col-lg-12">
                          
                            <p class="mb-0">{{ $pref->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
     
        </div>
    </div>
</div>
    <!-- START WHAT WE DO -->

    <div id="who-we-are">
		<div class="container">
			<div class="row d-flex">
                <div class="col-lg-4">
                    <div class="card text-left">
                      {{-- <img class="card-img-top" src="holder.js/100px180/" alt=""> --}}
                      <div class="card-body">
                        <h5 class="card-title" style="color: blue">PETUNJUK PENGGUNAAN</h5>
                        <p class="card-text">  <a href="/data_file/dokument/manual_book.pdf" target="__blank">Panduan proses pengadaan (untuk vendor)</a> <br><hr></p>

                        <h5 class="card-title" style="color: blue">PERSYARATAN PRAKUALIFIKASI</h5>
                        <p class="card-text"> <a href="#">Prosedur dan persyaratan dokumen prakualifikasi</a> <br><hr></p>

                       
                      
                      </div>
                    </div>
    			</div>
    			<!-- Video -->
			  

			    <!-- Right Side -->
				<div class="col-lg-8">
                  <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="color: blue">PAKET LELANG</h5>
                        {{-- <p class="card-text"><img src="../img/comingsoon.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt=""> </p> --}}
                        {{-- <div class="m-scrollable m-scroller ps ps--active-y" data-scrollable="true" style="height: 800px; overflow: hidden;"> --}}
                            {{-- <div class="m-scrollable m-scroller ps ps--active-y" data-scrollable="true" data-height="200" data-scrollbar-shown="true" style="height: 800px; overflow: hidden;"> --}}
                               @php
                                   $now = now();
                               @endphp
                                @foreach ($tenders as $item)
                                <blockquote class="blockquote" >
                                   <p> 
                                    
                                        <span class="btn btn-sm" style="color: white; background-color:rgb(205, 148, 234)"> {{ date('d M Y', strtotime($item->tgl_paket))  }} </span>  
                                     
                                           <span class="m-badge m-badge--warning m-badge--wide">
                                                @if ($item->tgl_daftar <= $now )
                                                  <span style="color:blue !important; float:right">Close </span>  
                                                @else
                                                <span style="color:#691295 !important; float:right">Open </span>  
                                                    {{-- {{ $item->statustender->name }} --}}
                                                @endif
                                            </span>
                                       <br>
                                  <strong><a href="/pengumuman/detail/{{ $item->id }}" style="color: #691295;"> {{ $item->nomor_pr }} </a></strong>  <br>
                                     {{ Str::limit($item->nama_paket, 200)  }}  
                                     <br>
                                   
                                        <div class="row" style="background-color: rgb(232, 220, 238); padding: 4px">
                                            <div class="col">
                                                <i class="fi fi-rr-marker" aria-hidden="true"></i>  <span style="font-size: 8pt"> {{ $item->lokasi->kode }} </span>
                                            </div>
                                            <div class="col">
                                                <i class="fi fi-rr-settings" aria-hidden="true"></i> <span style="font-size: 8pt"> {{ $item->anggaran->kode }} </span>
                                            </div>
                                            <div class="col">
                                                <i class="fi fi-rr-calendar" aria-hidden="true"></i> <span style="font-size: 8pt">  {{ Str::limit($item->jangka_pelaksanaan , 20)  }} </span> 
                                            </div>
                                            <div class="col">
                                                <i class="fi fi-rr-list" aria-hidden="true"></i> <span style="font-size: 8pt"> 
                                                    @foreach ($item->tenderdetail as $v)
                                                     {{ $v->vendorklasifikasi->kode . " , " }} 
                                                     @endforeach
                                                    </span> 
                                            </div>
                                        </div>
                                      
                                   </p>
                                   {{-- <footer class="card-blockquote">
                                       <a href="#" class="text-right">Selengkapnya..</a>
                                   </footer> --}}
                               </blockquote>
                              
                           @endforeach
                           
                            {{-- <div class="ps__rail-x" style="left: 0px; bottom: -131px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 131px; height: 200px; right: 4px;"><div class="ps__thumb-y" tabindex="0" style="top: 79px; height: 120px;"></div></div></div> --}}
                            
                      
                    </div>
                   
                        <div class="card-footer text-muted">
                            <div class="row">
                                <div class="col" style="text-align: right">
                                    <a href="/pengumuman">{{ $tenders->links() }}</a>
                                </div>
                      
                        </div>
                        </div>
                   
                  </div>
    			</div>

            </div>
        </div>
    </div>

    
    {{-- <div id="what-we-do">
        <div class="container">
            <div class="row">

                <!-- What We Do -->
                <div class="col-lg-3">
                    <div class="card whatwedo-card-1">
                        <div>
                            <i class="mdi mdi-office-building mdi-80px"></i>
                        </div>
                        <div class="mb-3">
                            <h3 class="head-after">Building</h3>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card whatwedo-card-2">
                        <div>
                            <i class="mdi mdi-home-city-outline mdi-80px"></i>
                        </div>
                        <div class="mb-3">
                            <h3 class="head-after">Interior</h3>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card whatwedo-card-3">
                        <div>
                            <i class="mdi mdi-graphql mdi-80px"></i>
                        </div>
                        <div class="mb-3">
                            <h3 class="head-after">Renovation</h3>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card whatwedo-card-4">
                        <div>
                            <i class="mdi mdi-palette-outline mdi-80px"></i>
                        </div>
                        <div class="mb-3">
                            <h3 class="head-after">Plan &amp; Design</h3>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}
    <!-- END WHAT WE DO -->

    <!-- START WHO WE ARE -->
    {{-- <div id="who-we-are">
     

        <div class="container">
            <div class=" row d-flex align-items-center">
                <div class="col-lg-12">
					
				</div>
            </div>
        </div> --}}
        {{-- <div class="container">
            <div class="row d-flex align-items-center">

                <div class="col-lg-12 mb-4">
                    <div class="row">

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-3">
                                        <i class="mdi mdi-certificate mdi-48px"></i>
                                    </div>
                                    <div class="col-lg-9">
                                        <h4 class="mb-2">Certified Company</h4>
                                        <p class="mb-0">ISO 9001:2015</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-3">
                                        <i class="mdi mdi-account-convert mdi-48px"></i>
                                    </div>
                                    <div class="col-lg-9">
                                        <h4 class="mb-2">Our Responsibility</h4>
                                        <p class="mb-0">{{ $pref->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-3">
                                        <i class="mdi mdi-phone mdi-48px"></i>
                                    </div>
                                    <div class="col-lg-9">
                                        <h4 class="mb-2">24/7 Working Hours</h4>
                                        <p class="mb-0">{{ $pref->phone }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

              

            </div>
        </div> --}}
    {{-- </div> --}}
    <!-- END WHO WE ARE -->

   
  
  

    

@endsection

@section('script')
        
    <script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>    
    <script src="{{ asset('assets/demo/default/custom/crud/datatables/search-options/advanced-search.js') }}"></script>
    {{-- <link href="{{ asset('assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" /> --}}
@endsection