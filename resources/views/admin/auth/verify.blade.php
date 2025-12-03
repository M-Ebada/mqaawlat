@extends('admin.layouts.auth')

@section('content')
    <form class="form w-100"  action="{{ route('admin.verification.resend') }}" method="post">
        @csrf
        <a href="{{route('admin.login')}}">
            <img src="{{\App\Core\Support\Settings::get("site_logo")}}" class="img-fluid w-150px mx-auto d-block mb-5" alt="">
        </a>
        @csrf
        <div class="text-center mb-5">
            <h1 class="text-dark fw-bolder mb-3">{{__("Verify your account")}}</h1>
        </div>
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif
        <p class="text-center fw-bold">
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
        </p>
        <x-indicator-btn :title='__("Click here to request another")' type="success" class=" text-center mx-auto d-block"/>
    </form>
@endsection
