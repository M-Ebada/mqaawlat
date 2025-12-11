@extends('web.layout.app')

@section('title', __("Services"))

@section('content')
<div class="projectspage">
    <div class="header padd-sm">
        <div class="container">
            <div class="head">
                <div class="text-center">
                    <p class="lead  text-center wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
                        {{__("Services")}}
                    </p>
                    <h1 class="black fw-bold text-center mb-2 wow fadeInUp fs-2" data-wow-duration=".6s" data-wow-delay="0.6s" data-wow-offset="100">
                        {{__("We offer a variety of unique engineering services that definitely meet your needs")}}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-5">
       <div class="row">
        @foreach ($services as $service)
            @include('web.partials.service',['product' => $service])
        @endforeach
        <div class="col-12 col-md-6 col-lg-4 mb-4 wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
            <a href="https://latifa-metal.com" class="services-template">
                <img src="{{asset('layout/imgs/blacksmith.jpg')}}" class="fit-img" />
                <div class="overlay">
                    <div class="talk">
                        <p class="titlter fw-bold mb-1 fs-3">
                            {{__('Warsha Latifa Metalworks')}}
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    </div>

</div>
@endsection