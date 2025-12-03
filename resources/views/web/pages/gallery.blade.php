@extends('web.layout.app')

@section('title', __("Gallery"))

@section('css')
<link rel="stylesheet" href="{{asset("admin/css/lightbox.min.css")}}">
<style>
.img-container{
    overflow: hidden;
    border-radius: 12px;
    padding: 12px;
    background: #fff;
    height: 275px
}
.img-container img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 6px;
}
.projectspage{
    background: #eee;
    margin-top: 21px;
}
</style>
@endsection

@section('content')
<div class="projectspage">
    <div class="header padd-sm">
        <div class="container">
            <div class="head">
                <div class="text-center">
                    <h1 class="black fw-bold text-center mb-2 wow fadeInUp fs-2" data-wow-duration=".6s" data-wow-delay="0.6s" data-wow-offset="100">
                        {{__("Gallery")}}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-5">
        <div class="row">
            @foreach ($images as $img)
                <div class="col-md-4 col-lg-3 mb-4">
                    <a class="img-container d-block" href="{{$img->image}}" data-lightbox="gallery" data-title="{{__("Gallery")}}"><img src="{{$img->image}}" class="d-block img-fluid" /></a>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection

@section('js')
<script src="{{asset('admin/js/lightbox.min.js')}}"></script>
@endsection