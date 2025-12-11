@extends('web.layout.app')

@section('title', $service->title)

@section('content')
<div class="servicepage">
    <div class="contanier">
        <div class="header padd-sm">
            
            <h1 class="fw-bold black text-center mb-3 wow fadeInUp" data-wow-duration=".6s" data-wow-delay="0.6s" data-wow-offset="100">
                {{$service->title}}
            </h1>
           <div class="d-flex align-items-center flex-wrap justify-content-center">
                <a href="{{route('web.contact')}}" class="btn btn-bg btn-primary d-flex align-items-center me-2 mb-2">
                    {{__("Contact us")}}
                    <div class="arr d-flex align-items-center justify-content-center arrower ms-2">
                        <i class="bi bi-arrow-right-short rotate"></i>
                    </div>
                </a>
                <a href="https://wa.me/+966{{$gs->whatsapp_phone}}" target="_blank" class="btn btn-white btn-bg mb-2 text-dark">
                    <i class="bi bi-whatsapp me-2 text-dark"></i>
                    {{__("WhatsApp")}}
                </a>
            </div>
        </div>
    </div>

    <div class="head-img">
        <img src="{{$service->image}}" class="fit-img wow fadeInUp" data-wow-duration=".6s" data-wow-delay="0.8s" data-wow-offset="100" />
    </div>

    <div class="custom-container padd-sm wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
        {!! $service->content !!}
    </div>

    @if ($similars->count() > 0)
        <div class="similars padd">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between mb-5">
                    <h2 class="fw-bold black wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
                        {{__("Similar Services")}}
                    </h2>
                </div>
                <div class="row">
                    @foreach ($similars as $product)
                        @include('web.partials.service', ['product' => $product])
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    
</div>

@endsection