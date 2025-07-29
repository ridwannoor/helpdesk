<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  
@include('client.component.head')
    <body>

        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- Body content -->
        @include('client.component.header')
       
        <!--End top header -->

        @include('client.component.nav')
        <!-- End of nav bar -->

        @yield('main')
      

        <!-- Footer area-->
        @include('client.component.footer')
      

        @include('client.component.script')
      

    </body>
</html>