@extends('admin.layouts.auth')

@section('content')
    <form class="form w-100"  action="{{route('admin.login')}}" method="post">
        <a href="{{route('admin.login')}}">
            <img src="{{\App\Core\Support\Image::getImageUrl('gs', 'LOGO_COLLECTION')}}" class="img-fluid w-150px mx-auto d-block mb-5" alt="">
        </a>
        @csrf
        <div class="text-center mb-5">
            <h1 class="text-dark fw-bolder mb-3">{{__("Login to your account")}}</h1>
            <div class="text-gray-500 fw-semibold fs-6">{{__("Admin Panel")}}</div>
        </div>
        <div class="fv-row mb-8">
            <input type="text" placeholder="{{__("Username")}}" required value="{{old("username")}}" name="username" autocomplete="off" class="form-control @error("username") is-invalid @enderror bg-transparent" />
        </div>
        <div class="fv-row mb-3">
            <input type="password" placeholder="{{__("Password")}}" required name="password" autocomplete="off" class="form-control bg-transparent" />
        </div>
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
            <div></div>
            <a href="{{route('admin.password.request')}}" class="link-primary">{{__("Forgot Password ?")}}</a>
        </div>
        <div class="d-grid mb-10">
           <x-indicator-btn :title='__("Sign In")'/>
        </div>
    </form>
@endsection
