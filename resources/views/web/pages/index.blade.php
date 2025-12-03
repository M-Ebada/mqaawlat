@extends('web.layout.app')

@section('title', __("Home"))

@section('css')
<link rel="stylesheet" href="{{asset('layout/css/swiper.css')}}" />
<style>
.gallery-section .imger{
    width: 100%;
    height: 260px;
}
.gallery-section .swiper-pagination{
    position: relative;
    display: flex;
    justify-content: center;
    margin-top: 30px;
}
.billboard{
    height: 85.5px;
    overflow: hidden;
}
</style>
@endsection

@section('content')

<div class="homepage">

    <div class="header mb-5">
        <div class="header-container position-relative w-100">
            <div class="w-100 h-100">
                <img src="{{asset('layout/imgs/header.jpg')}}" class="header-back" />
                <div class="overlay d-flex align-items-center pt-5 justify-content-center p-5">
                    <div class="">
                        <div>
                            <h1 class="fw-bolder text-center text-light mt-5 pt-4 mb-4 m-auto wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
                                <span class="highlight"> {{$gs->title}} </span> {{__("Metalworks – Quality with Mastery and an Artistic Touch")}}
                            </h1>
                            <p class="lead text-light text-center wow fadeInUp" data-wow-duration=".5s" data-wow-delay="0.5s" data-wow-offset="100">
                                {{__("In a cozy workshop, we offer doors, windows, and iron staircases with innovative designs and professional installation services, providing you with metal solutions that combine security and beauty")}}
                            </p>
                
                            <div class="d-flex justify-content-center mb-5 pb-4 wow fadeInUp" data-wow-duration=".6s" data-wow-delay="0.6s" data-wow-offset="100">
                                <a href="{{route('web.services')}}" class="btn btn-primary btn-bg me-2">
                                    {{__("Services")}}
                                </a>
                                <a href="{{route('web.contact')}}" class="btn btn-white btn-bg ">
                                    {{__("Contact us")}}
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <div class="billboard py-4">
                    <div class="infiniteslider" style="direction: ltr !important;">
                        <p class="slide"> {{__("Metal Structures")}} </p>
                        <div class="dot">
                            <i class="bi bi-asterisk"></i>
                        </div>
                        <p class="slide"> {{__("Iron Doors")}} </p>
                        <div class="dot">
                            <i class="bi bi-asterisk"></i>
                        </div>
                        <p class="slide"> {{__("Stairs")}} </p>
                        <div class="dot">
                            <i class="bi bi-asterisk"></i>
                        </div>
                        <p class="slide"> {{__("المظلات")}} </p>
                        <div class="dot">
                            <i class="bi bi-asterisk"></i>
                        </div>
                        <p class="slide"> {{__("Contracting")}} </p>
                        <div class="dot">
                            <i class="bi bi-asterisk"></i>
                        </div>
                        <p class="slide"> {{__("Containers")}} </p>
                        <div class="dot">
                            <i class="bi bi-asterisk"></i>
                        </div>
                        <p class="slide"> {{__("Trailers")}} </p>
                        <div class="dot">
                            <i class="bi bi-asterisk"></i>
                        </div>
                        <p class="slide"> {{__("Tanks")}} </p>
                        <div class="dot">
                            <i class="bi bi-asterisk"></i>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
    </div>

    <div class="stats pb-5">
        <div class="container">
            <div class="row">
                <div class="col-6 col-lg-3 mb-2 wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
                    <p class="mb-0 fs-1 fw-bold text-center stat-p">
                        <span class="prim">+</span>17
                        <p class="mb-0 text-center text-muted fw-bold">
                            {{__("Years of experience")}}   
                        </p>
                    </p>
                </div>
                <div class="col-6 col-lg-3 mb-2 wow fadeInUp" data-wow-duration=".5s" data-wow-delay="0.5s" data-wow-offset="100">
                    <p class="mb-0 fs-1 fw-bold text-center stat-p">
                        100<span class="prim">%</span>
                        <p class="mb-0 text-center text-muted fw-bold">
                            {{__("Quality of implementation")}} 
                        </p>
                    </p>
                </div>
                <div class="col-6 col-lg-3 mb-2 wow fadeInUp" data-wow-duration=".6s" data-wow-delay="0.6s" data-wow-offset="100">
                    <p class="mb-0 fs-1 fw-bold text-center stat-p">
                        2<span class="prim">K</span>
                        <p class="mb-0 text-center text-muted fw-bold">
                            {{__("Client around the Kingdom")}}
                        </p>
                    </p>
                </div>
                <div class="col-6 col-lg-3 mb-2 wow fadeInUp" data-wow-duration=".7s" data-wow-delay="0.7s" data-wow-offset="100">
                    <p class="mb-0 fs-1 fw-bold text-center stat-p">
                        <span class="prim">+</span>300
                        <p class="mb-0 text-center text-muted fw-bold">
                            {{__("Finished projects")}}
                        </p>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="padd-sm services-section">
        <div class="container">
            <p class="fs-1 mb-5 fw-bold text-center wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
                {{__("Workshop services")}}
            </p>
            @include('web.partials.categories',['categories' => $categories])
        </div>
    </div>

    <div class="clients-section padd-sm">
        <div class="container mb-3">
            <p class="text-center fs-4 fw-bold mb-0 wow fadeInUp wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100"> {{__("Our clients")}} </p>
            <p class="text-center small text-muted wow fadeInUp wow fadeInUp" data-wow-duration=".5s" data-wow-delay="0.5s" data-wow-offset="100" data-wow-duration=".5s" data-wow-delay="0.5s" data-wow-offset="100"> 
                {{__("We have worked with numerous clients across the kingdom and take pride in being part of the success of prestigious entities")}}
            </p>
        </div>

        <div class="owl-carousel owl-theme clients-carousel mt-5 wow fadeInUp" data-wow-duration=".6s" data-wow-delay="0.6s" data-wow-offset="100">
            <div class="item"><img src="{{asset('layout/imgs/tmp/p1.png')}}" /></div>
            <div class="item"><img src="{{asset('layout/imgs/tmp/p3.png')}}" /></div>
            <div class="item"><img src="{{asset('layout/imgs/tmp/p4.png')}}" /></div>
            <div class="item"><img src="{{asset('layout/imgs/tmp/p5.png')}}" style="width: 95px;" /></div>
            <div class="item"><img src="{{asset('layout/imgs/tmp/p6.png')}}" style="width: 80px;" /></div>
            <div class="item"><img src="{{asset('layout/imgs/tmp/p7.png')}}" style="width: 85px;" /></div>
            <div class="item"><img src="{{asset('layout/imgs/tmp/p8.png')}}" /></div>
            <div class="item"><img src="{{asset('layout/imgs/tmp/p9.png')}}" /></div>
        </div>
    </div>

    <div class="features-section padd">
        <div class="container">
            <p class="fw-bold fs-1 text-center wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
                {{__("We offer services of unparalleled quality")}}
                <br>
                {{__("With the expertise of the finest engineers across the kingdom")}}
            </p>
            <p class="small text-center text-muted wow fadeInUp" data-wow-duration=".5s" data-wow-delay="0.5s" data-wow-offset="100">
                {{__("We strive hard to achieve excellence and leadership in the metalworks industry")}} 
            </p>

            <div class="row mt-5 pt-4">
                <div class="col-12 col-md-6 mb-4 wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
                    <div class="point-feature active mb-4" data-img="{{asset('layout/imgs/feature1.jpg')}}">
                        <div class="header d-flex align-items-center justify-content-between">
                            <p class="titlter prim mb-0 fs-3 fw-bold"> {{__("Unmatched quality")}} </p>
                            <div class="option-opener">
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                        <p class="mb-0 desc mt-3 text-light">
                            {{__("we are distingushed with the great quality features")}}
                        </p>
                    </div>
                    <div class="point-feature mb-4" data-img="{{asset('layout/imgs/feature2.jpg')}}">
                        <div class="header d-flex align-items-center justify-content-between">
                            <p class="titlter prim mb-0 fs-3 fw-bold"> {{__("More than 17 years of experience")}} </p>
                            <div class="option-opener">
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                        <p class="mb-0 desc mt-3 text-light">
                            {{__("With more than 17 years of experience in all fields of blacksmithing, and thanks to the expertise of our skilled engineers, we can confidently offer the best quality possible throughout the entire kingdom")}}
                        </p>
                    </div>
                    <div class="point-feature mb-4" data-img="{{asset('layout/imgs/feature3.jpg')}}">
                        <div class="header d-flex align-items-center justify-content-between">
                            <p class="titlter prim mb-0 fs-3 fw-bold"> {{__("Commitment and Credibility in Dealing")}} </p>
                            <div class="option-opener">
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                        <p class="mb-0 desc mt-3 text-light">
                            {{__("Commitment and credibility build strong relationships, fostering trust and honest communication.")}}
                        </p>
                    </div>

                    <div class="d-flex align-items-center mt-5">
                        <a href="https://wa.me/+966{{$gs->whatsapp_phone}}" target="_blank" class="btn btn-success btn-bg me-2 text-light">
                            <i class="bi bi-whatsapp me-2"></i>
                            {{__("WhatsApp")}}
                        </a>
                        <p class="mb-0 text-muted small"> {{__("Happy to connnect")}} </p>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4 wow fadeInUp" data-wow-duration=".5s" data-wow-delay="0.5s" data-wow-offset="100">
                    <div class="imger">
                        <img src="" id="feature-imger-container" class="fit-img" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($gallery->count() > 0)
    <div class="padd gallery-section pb-2" style="direction: ltr !important;">
        <h3 class="dim fw-bold text-center mb-5"> {{__("Gallery")}} </h3>
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach ($gallery as $singleImage)
                <div class="swiper-slide">
                    <a href="{{$singleImage->image}}" data-title="{{__("Gallery")}}" data-lightbox="gallery" class="imger d-block">
                        <img alt="{{__("Gallery")}}" title="{{__("Gallery")}}" src="{{$singleImage->image}}" class="fit-img" />
                    </a>
                </div>
                @endforeach
                
                
            </div>
            
        </div>
        <div class="swiper-pagination"></div>
    </div>
    @endif

    <div class="attracted wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100" style="background: url('{{asset('layout/imgs/attracter.png')}}') no-repeat center center;background-attachment: fixed;background-size: cover;">
        <div class="overlay">
            <p class="fw-bold text-light fs-1 mb-0">
                {{__("Ready to start with us ?")}}
                <br>
                {{__("Contact us now")}}
            </p>

            <div class="d-flex align-items-center flex-wrap">
                <a href="{{route('web.contact')}}" class="btn btn-bg btn-primary d-flex align-items-center me-2 mb-2">
                    {{__("Contact us")}}
                    <div class="arr d-flex align-items-center justify-content-center arrower ms-2">
                        <i class="bi bi-arrow-right-short rotate"></i>
                    </div>
                </a>
                <a href="https://wa.me/+966{{$gs->whatsapp_phone}}" target="_blank" class="btn btn-white btn-bg mb-2">
                    <i class="bi bi-whatsapp me-2"></i>
                    {{__("WhatsApp")}}
                </a>
            </div>
        </div>
    </div>

    @if ($reviews->count() > 0)
    @php
        $totalReviews = $reviews->count();
        $sliceReview = $totalReviews >= 6 ? ceil($totalReviews / 2) : $totalReviews;
        $firstHalf = $reviews->slice(0, $sliceReview);
        $secondHalf = $reviews->slice($sliceReview);
    @endphp
    <div class="testmonials-section padd">
        <div class="container mb-5">
            <div class="text-center">
                <p class="small mb-1 text-center wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
                    {{__("Client reviews")}}
                </p>
                <p class="fw-bold fs-3 mb-4 c-primary text-center wow fadeInUp" data-wow-duration=".6s" data-wow-delay="0.4s" data-wow-offset="100">
                    {{__("Get to know us through their eyes")}}
                </p>
            </div>
        </div>

        <div class="force-ltr">
            <div class="infiniteslider">

                @foreach ($firstHalf as $review)
                <div class="slide testm-cont">
                    <div class="d-flex align-items-center mb-4">
                        <div class="img-cont me-3">
                            <img src="{{$review->image()}}" class="fit-img me-2 d-block" />
                        </div>
                        <div class="desc">
                            <p class="title mb-0"> {{$review->name}} </p>
                            <p class="small dim mb-0"> {{$review->position}} </p>
                        </div>
                    </div>
                    <p class="mb-0 desc">
                        {{$review->description}}
                    </p>
                </div>
                
                @endforeach
            
            </div>

            @if ($secondHalf->isNotEmpty())
            <div class="slider-to-right mt-4">
            @foreach ($secondHalf as $review)
                <div class="slide testm-cont">
                    <div class="d-flex align-items-center mb-4">
                        <div class="img-cont me-3">
                            <img src="{{$review->image()}}" class="fit-img me-2 d-block" />
                        </div>
                        <div class="desc">
                            <p class="title mb-0"> {{$review->name}} </p>
                            <p class="small dim mb-0"> {{$review->position}} </p>
                        </div>
                    </div>
                    <p class="mb-0 desc">
                        {{$review->description}}
                    </p>
                </div>
                @endforeach
            </div>
        
            @endif

        </div>
    @endif
    
</div>

@endsection

@section('js')
<script src="{{asset('admin/js/swiper.min.js')}}"></script>
<script>
    $(document).ready(function(){

        if($(".gallery-section").length > 0){
            const swiper = new Swiper('.swiper', {
                speed: 400,
                slidesPerView: 'auto',
                freeMode: true,
                pauseOnMouseEnter:true,
                autoplay: {
                    delay: 2000,
                },
                spaceBetween: 10,
                pagination: {
                    el: '.swiper-pagination',
                    type: 'bullets',
                },
            });
        }

        let altLogo = $("#header-logo").attr("data-alt");
        $("#header-logo").attr("src", altLogo);

        let isRtl = ($("html").attr("lang") == 'ar') ? true : false;

        $('.clients-carousel').owlCarousel({
            center: true,
            loop:true,
            margin:50,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            autoWidth:true,
            rtl:isRtl
        });

        function getActiveFeature()
        {
            $(".point-feature").each(function(){
                if(!$(this).hasClass("active")){
                    $(this).children('.desc').slideUp();
                }
            })
            $(".point-feature.active .desc").slideDown();
            let ImgSrc = $(".point-feature.active").attr("data-img");
            $("#feature-imger-container").fadeOut(200);
            setTimeout(() => {
                $("#feature-imger-container").attr("src", ImgSrc).fadeIn();
            }, 200);
            
        }
        getActiveFeature();
        $(".point-feature").on("click", function(){
            $(".point-feature").removeClass("active");
            $(this).addClass("active");
            getActiveFeature();
        })
    })
</script>
@endsection