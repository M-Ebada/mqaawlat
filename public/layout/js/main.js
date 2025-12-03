var rtl = false;

$(document).ready(function(){

    $("#preloader").fadeOut();

    if($("html").attr("lang") == 'ar'){
        rtl = true
    }

    if($(".wow").length > 0){
		new WOW().init();
    }
    
    $(".mobile-opener-cont .opener").on("click" , function(){
        $(".mobile-navbar").addClass("active");
    });

    $(".close-mobile-nav").on("click" , function(){
        $(".mobile-navbar").removeClass("active");
    });


    if($(".homepage").length > 0){
        $("navbar").addClass("homepage-nav");
        $(".header-back").addClass("active");
    }

    if($(".infiniteslider").length > 0){
        $(".infiniteslider").infiniteslide({
            speed:25,
            pauseonhover: false
        });
        $(".slider-to-right").infiniteslide({
            speed:35,
            pauseonhover: false,
            direction: 'right'
        });
    }

    if($(".team-slider").length > 0){
        $('.team-slider').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            arrows:false,
            rtl:rtl,
            dots:false,
            responsive:{
                0:{
                    items:1.4
                },
                600:{
                    items:2.1
                },
                1000:{
                    items:3.2
                }
            }
        })
    }
    
    $(".slider-prev").on("click", function(){
        let parent = $(this).attr("data-parent");
        $(parent + " .owl-prev").click();
    })
    $(".slider-next").on("click", function(){
        let parent = $(this).attr("data-parent");
        $(parent + " .owl-next").click();
    })

    if($(".portfolio-categories-slider").length > 0){
        $('.portfolio-categories-slider').owlCarousel({
            loop:false,
            margin:10,
            rtl:rtl,
            nav:false,
            dots:false,
            autoWidth:true
        })
    }
    
});