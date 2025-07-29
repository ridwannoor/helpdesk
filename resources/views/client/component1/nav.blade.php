<nav class="navbar navbar-default ">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="{{ url('data_file/'.$pref->image) }}" width="150px" alt=""></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse yamm" id="navigation">
            <div class="button navbar-right">
                @guest
                <button class="navbar-btn nav-button wow bounceInRight login" onclick=" window.open('{{ route('client.login') }}', '_self')" data-wow-delay="0.4s">Login</button>
                       {{-- <a href="client/login" class="button navbar-btn nav-button wow bounceInRight login">Login</a> --}}
                @endguest
               @auth
                    {{-- <li><a href="/client/dashboard">Dashboard</a></li> --}}
                    {{-- <li> --}}
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="button navbar-btn nav-button wow bounceInRight login" type="submit">Logout</button>
                        </form>
                    {{-- </li> --}}
                @endauth
                {{-- <button class="navbar-btn nav-button wow bounceInRight login" onclick="window.open('client/login')" data-wow-delay="0.45s">Login</button> --}}
                {{-- <button class="navbar-btn nav-button wow fadeInRight" onclick=" window.open('submit-property.html')" data-wow-delay="0.48s">Submit</button> --}}
            </div>
            <ul class="main-nav nav navbar-nav navbar-right">
                {{-- <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                    <a href="index.html" class="dropdown-toggle active" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Home <b class="caret"></b></a>
                    <ul class="dropdown-menu navbar-nav">
                        <li>
                            <a href="index-2.html">Home Style 2</a>
                        </li>
                        <li>
                            <a href="index-3.html">Home Style 3</a>
                        </li>
                        <li>
                            <a href="index-4.html">Home Style 4</a>
                        </li>
                        <li>
                            <a href="index-5.html">Home Style 5</a>
                        </li>

                    </ul>
                </li> --}}
@guest
                 <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="/">Home</a></li>
                 <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="/">Tiket</a></li>
                 <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="/">FAQ</a></li>
@endguest

@auth
                 <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="/">Home</a></li>
                 <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="/">Tiket</a></li>
                 <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="/">Profile</a></li>                 
                 <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="/">FAQ</a></li>
@endauth
           
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>