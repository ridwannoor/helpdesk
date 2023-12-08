
@extends('front.layouts.app')

@section('content')


<!-- START FAQ -->
<div id="blog">
    <div class="container">
        <div class="row">

          	<!-- Blog Left Side --> 
			@php
				$now = now();
			@endphp
				<div class="col-lg-8 ">
					<div class="blog-col">
                        @foreach ($tenders as $item)
                        <div class="card mb-5">
							<div class="blog-img">
								{{-- <a href="#">
									<img class="w-100" src="front/assets/images/blog/img-6.jpg" alt="" />
								</a> --}}
								<div class="blog-date">
									<a href="#" class="btn btn-xl btn-primary" style="color: white">{{ date('d M Y', strtotime($item->tgl_paket)) }}</a>
								</div>
							</div>
							<div class="blog-body">
								{{-- <div class="blog-category mb-2"> --}}
									
										{{-- <li><a href="#"><i class="mdi mdi-account"></i> Admin</a></li> --}}
										{{-- <li><a href="#"><i class="mdi mdi-clock-alert-outline"></i> 
											@if ($item->tgl_daftar <= $now )
												<span>Close</span>  
											@else
											<span>Open</span>  
												
											@endif
												
										</a></li> --}}
									{{-- <a href="#"> {{ $item->jangka_pelaksanaan }}</a> <br>
                                     <span style="color: rgb(125, 125, 236)">{{ $item->anggaran->kode }} </span>   --}}
									{{-- </ul> --}}
								{{-- </div> --}}
								<div class="blog-content">
									<h5 class="blog-title">
										<a href="/pengumuman/detail/{{ $item->id }}" style="color: #691295">{{ $item->nomor_pr }}</a>
										@if ($item->tgl_daftar <= $now )
												<span style="float:right; font-size:10pt; color:blue">Close</span>  
											@else
											<span style="float:right; font-size:10pt; color:#691295">Open</span>  
												
											@endif
									</h5>
									{{-- <p> --}}
                                       <p>{{ Str::limit($item->nama_paket, 200) }} </p> 
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
										{{-- <span style="font-size:8pt;"><a href="#"></a></span> --}}
                                    {{-- </p> --}}
								</div>
							</div>
						</div>
                        @endforeach
						<div class="blog-share mb-2">
                          
                            <ul>
                                <li>{{ $tenders->links() }}</li>
                            </ul>
                        </div>
					</div><!-- blog-col -->

					<!-- Blog Share -->
					
				<!-- col-lg-8 -->
				</div>

				<!-- Blog Side Menu -->
				<div class="col-lg-4">
					<!-- Categories -->
    				{{-- <div class="mb-5">
						<div class="mb-3">
							<h4 class="head-after">Tender Status</h4>
						</div>
						<ul class="side-nav-bar">
                            <li class="active"><a href="#">Open ({{ $open }})</a></li>
                            <li><a href="#">Pending ({{ $pending }})</a></li>
                            <li><a href="#">Cancel ({{ $cancel }})</a></li>
                            <li><a href="#">Close ({{ $closed }})</a></li>                       
						</ul>
					</div> --}}
					<!-- Search -->
    				<div class="mb-5">
	    				{{-- <div class="mb-4">
							<h4 class="head-after">Search</h4>
						</div> --}}
						<div class="input-group">
							<div class="input-group-prepend">
								<input type="text" class="form-control" placeholder="Search" />
								<button type="submit" class="btn btn-primary"><i class="mdi mdi-search-web mdi-24px"></i></button>
							</div>
						</div>
					</div>
					<!-- Tags -->
					{{-- <div class="mb-5">
						<div class="mb-4">
							<h4 class="head-after">Tags</h4>
						</div>
						<ul class="tags">                            
                            <li><a class="btn btn-border" href="#">Investasi ({{ $invest }})</a></li>
                            <li><a class="btn btn-border" href="#">Eksploitasi ({{ $eksplo }})</a></li>
                        </ul>
					</div> --}}
					<!-- Form -->
					
					<div class="mb-5 text-center">
						<div class="helpline">
							<div class="card p-30 card-active">
								<div class="mb-4">
									<h3 class="head-after">Helpline</h3>
								</div>
								<p><a href="https://api.whatsapp.com/send?phone=+6287864888400&text= .." target="_blank" class="btn btn-success"><i class="mdi mdi-whatsapp mdi-24px"></i> Chat Whatsapp</a></p>
								<p><i class="mdi mdi-email-open mdi-24px"></i> {{ $pref->email }}</p>
							</div>
						</div>
					</div>
				</div><!-- col-lg-4 -->

        </div>
    </div>
</div>
<!-- END FAQ -->

@endsection