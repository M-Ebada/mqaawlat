@extends('web.layout.app')

@section('title')
  {{__("Thank you for contacting us")}}
@endsection

@section('content')

<div class="thankspage d-flex align-items-center" style="min-height: 80vh;">
    <div class="container my-5">
        <h2 class="fw-bold text-center mb-3">
          {{__("Thank you for contacting us")}}
        </h2>

        <p class="mb-5 text-grey text-center">
          {{__("We are glad that you are interested in our services. Your inquiry is important to us, and our team is eager to help you achieve your goals.")}}
        </p>

        <a href="{{route('web.index')}}" class="btn btn-primary btn-bg m-auto d-block" style="width: fit-content;background:#22372b !important;border-color:#22372b">
          {{__("Back home")}}
        </a>
    </div>

</div>

@endsection