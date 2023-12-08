@extends('front.layouts.app')

@section('content')
    <!-- START WHO WE ARE -->
    <div id="who-we-are">
        <div class="container">
            <div class="row d-flex">

              

                <!-- Left Side -->
                <div class="col-lg-6">
                    <div class="video-btn">
                        <div class="img-bg">
                            <div class="img-bg-1">
                                <img src="{{ asset('/front/assets/images/slider/DSC010793.jpg') }}" alt="image"/>
                            </div>
                            {{-- <div class="img-bg-2">
                                <img src="{{ asset('/front/assets/images/slider/DSC010795.jpg') }}" alt="image" />
                            </div> --}}
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
                <div class="col-lg-6 card">
                    @include('component.alertnotification')
                    <form method="POST" action="{{ route('vendor.registersave') }}" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control" type="hidden" name="provinsi_id" value="1">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Badan Usaha') }}</label>
                            <div class="col-md-6">
                                <select name="badanusaha_id" class="form-control" required>
                                    @foreach ($badan as $item)
                                        <option value="{{ $item->id }}">{{ $item->kode }}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="namaperusahaan" class="col-md-4 col-form-label text-md-right">{{ __('Nama Perusahaan') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="namaperusahaan" style="text-transform: uppercase" required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        {{-- <div class="form-group row">
                            <label for="jenis" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Usaha') }}</label>

                            <div class="col-md-6">
                                <select name="jenisusaha_id" class="form-control" required multiple>
                                    @foreach ($jenis as $item)
                                        <option value="{{ $item->id }}">{{ $item->detail }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                        {{-- <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <select name="category_id" class="form-control" multiple required>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->detail }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                        {{-- <div class="form-group row">
                            <label for="lokasi" class="col-md-4 col-form-label text-md-right">{{ __('Lokasi') }}</label>

                            <div class="col-md-6">
                                <select name="lokasi_id" class="form-control" required >
                                    @foreach ($lok as $item)
                                    <option value="{{ $item->id }}">{{ $item->detail . " (" . $item->kode . ") " }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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