@extends('web.layout.app')

@section('title', __("About"))

@php
$gs = \App\Helper\Helper::getGeneral();
@endphp

@section('content')
<div class="aboutpage">
    <div class="header padd-sm overflow-hidden">

        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6 mb-4 d-flex justify-content-center">
                    <img src="{{asset('layout/imgs/aabout.jpg')}}" class="fit-img wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100" style="width: 95%;"/>
                </div>
                <div class="col-12 col-md-6 mb-4 mt-5 head-parent">
                    <span class="lift rotate wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s" data-wow-offset="100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="267" height="314" viewBox="0 0 267 314" fill="none">
                            <path d="M0 0.137207C-3.59402e-06 41.2481 8.09739 81.9564 23.8299 119.938C39.5623 157.919 62.6217 192.43 91.6915 221.5C120.761 250.57 155.272 273.629 193.254 289.362C231.235 305.094 271.944 313.191 313.055 313.191V162.926C291.677 162.926 270.509 158.715 250.758 150.534C231.008 142.354 213.062 130.362 197.946 115.246C182.829 100.13 170.839 82.184 162.657 62.4336C154.477 42.6832 150.266 21.5149 150.266 0.13722L0 0.137207Z" fill="#FFC001"/>
                        </svg>
                    </span>
    
                    <div class="section-head">
                        <p class="lead dim mb-1 wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
                            {{__("Get to know us")}}
                        </p>
                        <h1 class="fw-bold black pb-3 wow fadeInUp" data-wow-duration=".6s" data-wow-delay="0.6s" data-wow-offset="100">
                            {{$gs->title}} {{__("One of the most prestigious contracting companies in the kingdom since 1998")}}
                        </h1>
                        <p class="dim lead mb-5 pb-5 wow fadeInUp" data-wow-duration=".8s" data-wow-delay="0.8s" data-wow-offset="100">
                           {{__("Al-Hassan for Contracting is a leading entity in the Kingdom of Saudi Arabia, merging extensive experience with innovation in construction, renovation, and finishing works. We believe that quality and adherence to deadlines are the foundation of any project's success, which is why we strive to provide integrated engineering solutions based on the highest professional standards. Our vision is to be the top choice in the contracting sector by efficiently meeting our clients' needs with professionalism, contributing to urban development, and enhancing customer satisfaction.")}}
                        </p>
    
                        <a href="{{route('web.contact')}}" class="btn btn-bg btn-primary wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="1s" data-wow-offset="100">
                            {{__("Contact us")}}
                        </a>
                    </div>
    
                </div>
            </div>
            
        </div>
    </div>

    <div class="stats pt-4 pb-4">
        <div class="row">
            <div class="col-12 col-md-4 mb-4">
                <div class="stat d-flex justify-content-center align-items-center wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
                    <div class="text-center">
                        <p class="mb-1 text-center title">
                            100
                            <span class="sub" style="color: #005DFF;">+</span>
                        </p>
                        <p class="mb-0 labl text-center">
                            {{__("Completed project")}}
                        </p>
                    </div>
                   
                </div>
            </div>

            <div class="col-12 col-md-4 mb-4">
                <div class="stat d-flex justify-content-center align-items-center wow fadeInUp" data-wow-duration=".6s" data-wow-delay="0.6s" data-wow-offset="100">
                    <div class="text-center">
                        <p class="mb-1 text-center title">
                            100
                            <span class="sub" style="color: #FFC001;">%</span>
                        </p>
                        <p class="mb-0 labl text-center">
                            {{__("Satisfied clients")}}
                        </p>
                    </div>
                   
                </div>
            </div>

            <div class="col-12 col-md-4 mb-4">
                <div class="stat d-flex justify-content-center align-items-center wow fadeInUp" data-wow-duration=".8s" data-wow-delay="0.8s" data-wow-offset="100">
                    <div class="text-center">
                        <p class="mb-1 text-center title">
                            17
                            <span class="sub" style="color: #005DFF;">+</span>
                        </p>
                        <p class="mb-0 labl text-center">
                            {{__("Years of experience")}}
                        </p>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

    <div class="about-section padd">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 mb-4 wow fadeInUp" data-wow-duration=".6s" data-wow-delay="0.4s" data-wow-offset="100">
                    <div class="section-head">
                        <p class="lead top-h dim mb-1">
                            {{__("Our vision")}}
                        </p>
                        <h2 class="fw-bold black fs-1 pb-3">
                            {{__("Leadership through diligence, determination, and adaptability")}}
                        </h2>
                        <p class="dim lead mb-4 pb-2">
                           {{__("We aim to be a leading entity in the contracting sector in the Kingdom by delivering professional services based on quality and innovation, efficiently meeting our clients' needs.")}}
                        </p>
                        <img src="{{asset('layout/imgs/aa1.jpg')}}" class="fit-img" />
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.8s" data-wow-offset="100">
                    <div class="section-head mt-5 pt-5">
                        <h2 class="fw-bold black fs-1 pb-3">
                            {{__("Providing excellence rooted in core values.")}}
                        </h2>
                        <p class="dim lead mb-4 pb-2">
                            {{__("Our mission is to provide integrated contracting solutions that adhere to high engineering standards, quality, and commitment, contributing to urban development and enhancing customer satisfaction.")}}
                        </p>
                        <img src="{{asset('layout/imgs/aa2.webp')}}" class="fit-img" />
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection