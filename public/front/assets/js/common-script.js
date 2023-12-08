jQuery(document).on('ready', function($) {
    "use strict";

    // Loader
    $(window).on('load', function() {
        $('.loader').fadeOut('slow',function(){$(this).remove();});
    });

    // Header Fixed on Scroll
    $(window).on('scroll', function () {
        if($(window).scrollTop() > 100){
            $("#header").addClass('header-fixed');
        }else{
            $("#header").removeClass('header-fixed');
        }
    });

    // Navbar Hover Menu
    $(function(){
        if($(window).width() > 768){
            $(".dropdown").hover(
            function(){
                $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
                $(this).toggleClass('open');
                $(this).find('.dropdown-menu').parent('.nav-item.dropdown').addClass("dropdown-active");
            },
            function(){
                $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
                $(this).toggleClass('open');
                $(this).find('.dropdown-menu').parent('.nav-item.dropdown').removeClass("dropdown-active");
            });
        };
    });

    // Play Video
    $('#clickplay').on('click', function(event) {
        var vi = $("#videoinput").val();
        $("#vidframe").attr('src', vi);
        event.preventDefault();
    });

    /**=========================
        SLICK CAROUSEL
    =========================**/
    // Projects
    $('.projectcarousel').slick({
        slidesToShow: 4,
        dots: false,
        centerMode: true,
        autoplay: true,
        responsive:[
            {
                breakpoint: 1200,
                settings:{
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
            }}
        ]
    });
    // Happy Clients
    $('.h-clientscarousel').slick({
        slidesToShow: 2,
        dots: false,
        centerMode: true,
        autoplay: true,
        responsive:[
            {
                breakpoint: 1200,
                settings:{
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
            }}
        ]
    });
    // Clients
    $('.clientscarousel').slick({
        slidesToShow: 6,
        dots: false,
        centerMode: true,
        autoplay: true,
        responsive:[
            {
                breakpoint: 1200,
                settings:{
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
            }}
        ]
    });

    // Activate Isotope
    $(window).on('load', function() {
        var $container = $('.portfolio-items').isotope({
            itemSelector: '.filter-item',
            masonry: {
                columnWidth: '.col-lg-4'
            }
        });
    });
    // Bind Filter Button Click
    var filters = $('.filters-group ul li');
    filters.on('click', function() {
        filters.removeClass('btn-active');
        $(this).addClass('btn-active');
        var filterValue = $(this).attr('data-filter');
        // Use filter if matches value
        $('.portfolio-items').isotope({
            filter: filterValue
        });
    });

    // Back to Top
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 300) {
            $('.backto-top-btn').fadeIn();
        } else {
            $('.backto-top-btn').fadeOut();
        }
    });
    $('.backto-top-btn').on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 700);
        return false;
    });

}(jQuery)); // End jQuery