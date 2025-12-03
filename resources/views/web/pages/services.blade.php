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
        @include('web.partials.categories', ['categories'=> $categories])
    </div>

</div>
@endsection