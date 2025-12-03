@extends('admin.layouts.auth')

@section('content')
    <form class="form w-100" action="{{route('admin.password.email')}}" method="post">
        <a href="{{route('admin.login')}}">
            <img src="{{\App\Core\Support\Settings::get("site_logo")}}" class="img-fluid w-150px mx-auto d-block mb-5" alt="">
        </a>
        @csrf
        <div class="text-center mb-10">
            <h1 class="text-dark fw-bolder mb-3">{{__("Forgot Password ?")}}</h1>
            <div class="text-gray-500 fw-semibold fs-6">{{__("Enter your email to reset your password.")}}</div>
        </div>
        <div class="fv-row mb-8">
            <input type="text" placeholder="{{__("Email")}}" value="{{old("email")}}" required name="email" autocomplete="off" class="form-control bg-transparent" />
        </div>
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <x-indicator-btn :title='__("Send Reset Link")' class=" me-4"/>
            <a href="{{route('admin.login')}}" class="btn btn-sm btn-light">{{__("Back to login")}}</a>
        </div>
    </form>
@endsection
