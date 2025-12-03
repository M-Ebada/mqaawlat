@extends('web.layout.app')

@section('title', __("Services"))

@section('content')

<div class="mainservicespage">
    <div class="container-fluid py-4">
        <div class="header" style="background:url('{{$category->cover}}') no-repeat center center;background-size: cover;background-attachment: fixed;">
            <div class="overlay d-flex justify-content-center align-items-center">
                <div>
                    <h1 class="fs-1 fw-bold text-center"> {{$category->title}} </h1>
                    <p class="lead text-center"> {{$category->description}} </p>

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
        </div>
    </div>

    <div class="container-fluid mb-5">
        <div class="row">
        @foreach ($category->products as $product)
            @include('web.partials.service', ['product' => $product])
        @endforeach
        </div>
    </div>
</div>

@endsection