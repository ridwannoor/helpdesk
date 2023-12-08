<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themeforts.com/themes/avisitz_conz/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Sep 2019 04:19:33 GMT -->

@include('front.component.head')

<body id="body-top">

   @include('front.component.header')

   
    @yield('content')

    @include('front.component.footer')
   

    <!-- START BACK TO TOP BTN -->
    <div class="btn btn-primary backto-top-btn">
        <i class="mdi mdi-arrow-up mdi-24px"></i>
    </div>
    <!-- END BACK TO TOP BTN -->
    @include('front.component.scripts')
   

</body>

<!-- Mirrored from themeforts.com/themes/avisitz_conz/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Sep 2019 04:23:35 GMT -->

</html>