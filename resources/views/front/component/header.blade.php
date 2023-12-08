<!-- START TOP HEADER -->
@include('front.component.top-header')
<!-- END TOP HEADER -->

<!-- START HEADER -->
<div id="header">
    <div class="container">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">
            {{-- @foreach ($pref as $item) --}}
            <a class="navbar-brand" href="/">
                <img src="{{ url('data_file/'.$pref->image) }}" height="70px" alt="image" />
            </a>    
            {{-- @endforeach --}}
            

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu mdi-24px"></i>
            </button>

            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    {{-- <li class="nav-item">
                        <a class="nav-link" href="/"><i
                                class="mdi mdi-home mdi-24px navhome-icon"></i></a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="/vendor/login"> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/vendor/register">Registrasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pengumuman">PENGUMUMAN</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="/paket">Paket Pengadaan</a>
                    </li> --}}
                    {{-- <li class="menu-btn">
                        <a class="btn btn-primary" href="#">Get a Quote <i class="mdi mdi-phone"></i></a>
                    </li> --}}

                </ul>
            </div>
        </nav>

    </div>
</div>
<!-- END HEADER -->