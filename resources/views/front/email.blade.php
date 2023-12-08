@extends('front.layouts.app')

@section('content')
    <!-- START WHO WE ARE -->
    <div id="who-we-are">
        <div class="container">
            <div class="row d-flex align-items-center">

                <!-- Who We Are Cols -->
              

                <!-- Left Side -->
                <div class="col-lg-6">
                    <div class="video-btn">
                        <div class="img-bg">
                            <div class="img-bg-1">
                                <img src="{{ asset('front/assets/images/img-2.jpg') }}" alt="image" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Video -->
                <div id="video" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden"
                                    value="https://www.youtube.com/embed/O33uuBh6nXA?autoplay=1&fs=0&iv_load_policy=3&showinfo=0&rel=0&cc_load_policy=0&start=0&end=0&origin=https://youtubeembedcode.com"
                                    id="videoinput">
                                <iframe id="vidframe"></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="col-lg-6">
                    @include('component.alertnotification')
                        <form method="POST" action="/vendor/forget-password">
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="_method" value="POST" />
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" >
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                       Kirim Password Baru
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>

            </div>
        </div>
    </div>
    <!-- END WHO WE ARE -->

   
  
  

    

@endsection