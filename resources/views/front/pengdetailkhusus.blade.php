
@extends('front.layouts.app')

@section('content')


<!-- START FAQ -->
<div id="blog">
    <div class="container">
        <div class="row">

          	<!-- Blog Left Side -->
				<div class="col-lg-12">
					<div class="blog-col">

                        {{-- @foreach ($tenders as $item) --}}
                        <div class="card">
                            <div class="card-header p-3">
                                <span>PENGUMUMAN TENDER</span> <br>
                                <span>Nomor : {{ $tenders->nomor_pr }}</span>
                            </div>
                            @php
                                $no =1 ;
                                $now = now();
                            @endphp
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <iframe src="{{ url('data_file/pdf_tenders/Mitra Kerja Amboja in Jogja.pdf') }}" width="50%" height="1200">
                                            This browser does not support PDFs. Please download the PDF to view it: <a href="{{ url('data_file/pdf_tenders/Mitra Kerja Amboja in Jogja.pdf') }}">Download PDF</a>
                                    </iframe>
                                </div>
                            </div>
                            <div class="card-footer text-muted">

                            </div>
                        </div>
                       <p>

                       </p>
                        {{-- @endforeach --}}


                </div>
					<!-- Blog Share -->

				<!-- col-lg-8 -->
				</div>


        </div>
    </div>
</div>
<!-- END FAQ -->

@endsection
