<head>

    <!-- Browser Bar Icon -->
    <link rel="shortcut icon" href="data_file/{{ $pref->logo }}" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ $pref->nama_perusahaan }}</title>
    <link href="{{ asset('front/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/font/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/theme-responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/animation.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/slick.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <!-- END CSS -->
    <a href="https://api.whatsapp.com/send?phone=+6287864888400&text= .." class="float" target="_blank">
        {{-- <i class="fas fa-whatsapp-square my-float" aria-hidden="true"></i> --}}
        <img src="{{ asset('front/assets/images/whatsapp-cha.png') }}" class="my-float" width="150px" alt="">
        {{-- <i class="    "></i> --}}
        </a>
    
        <style>
            .float{
                position:fixed;
                width:60px;
                height:50px;
                bottom:100px;
                right:100px;
                /* background-color:#25d366; */
                color:#FFF;
                /* border-radius:50px; */
                text-align:center;
                font-size:30px;
                /* box-shadow: 2px 2px 3px #999; */
                z-index:100;
            }
    
            .my-float{
                margin-bottom:15px;
            }

            .blockquote
            {
            color: #2C464F;
            font-style: normal;
            }
        </style>
</head>