@extends('web.layout.app')

@section('title', __("Contact us"))
@section('css')
<style>
.team-socials .social-icon{
    width: 35px;
    height: 35px;
    background: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #000;
}
</style>
@endsection
@section('content')
<div class="contactpage">

    <div class="header padd pb-5 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4 col-md-6">
                    <div class="top-holder">
                        <p class="mb-0 lead fs-6 wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
                            {{__("Contact us")}}
                        </p>
                        <h1 class="fw-bold mb-4 wow fadeInUp" data-wow-duration=".6s" data-wow-delay="0.6s" data-wow-offset="100">
                            {{__("Lets discuss your project")}}
                        </h1>

                        <p class="small mb-4 wow fadeInUp" data-wow-duration=".8s" data-wow-delay="0.8s" data-wow-offset="100">
                            {{__("Our engineers are ready for the next step towards your dream, we are always here to assist you in your case")}}
                        </p>

                        <div class="d-flex team-socials wow fadeInUp" data-wow-duration=".6s" data-wow-delay="0.4s" data-wow-offset="100">
                            @include('web.partials.socials')
                        </div>

                    </div>
                </div>
                <div class="col-12 mb-4 col-md-6 cont-frm wow fadeInUp" data-wow-duration=".7s" data-wow-delay="0.5s" data-wow-offset="100">
                    <form action="{{route('web.contact.store')}}" method="POST">
                    @csrf
                        <div class="row mb-4">
                            <div class="col-12 col-md-6 mb-3">
                                <label> {{__("Name")}} </label>
                                <input type="text" required name="name" class="form-control" />
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label> {{__("Phone number")}} </label>
                                <input type="text" name="whatsapp" class="form-control" />
                            </div>
                            <div class="col-12 mb-3">
                                <label> {{__("Message")}} </label>
                                <textarea class="form-control" required name="mssg" style="border-radius: 22px !important;"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-bg btn-white">
                            {{__("Send Message")}}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="contacts-sections padd">
        <div class="container">
            <p class="lead dim text-center wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
                {{__("Contact us")}}
            </p>
            <h2 class="fw-bold text-center fs-1 black wow fadeInUp" data-wow-duration=".6s" data-wow-delay="0.6s" data-wow-offset="100">
                {{__("Contact us directly")}}
            </h2>
            <p class="small text-center dim wow fadeInUp" data-wow-duration=".8s" data-wow-delay="0.8s" data-wow-offset="100">
                {{__("We are happy to hear from you directly. Contact us or visit us now")}}
            </p>

            <div class="row mt-5 pt-5 wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
                @if ($gs->first_email)
                    <div class="col-12 col-md-4 p-0">
                        <a href="mailto:{{$gs->first_email}}" class="contact-holder d-flex align-items-center" style="background-color: #57a4a1;">
                            <div>
                                <span class="icon d-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
                                        <path d="M27.5263 4.55273L14.2632 16.7106L1 4.55273" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M27.5263 4H1V25H27.5263V4Z" stroke="white" stroke-width="1.5"/>
                                        <path d="M11.8457 14.5L1.3457 24.1296" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M27.1816 24.1296L16.6816 14.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>    
                                </span>

                                <p class="title mt-2">
                                    {{__("Send us an email")}}
                                </p>
                                <p class="small">
                                    {{__("Our Agent will call you within 24 Hours")}}
                                </p>

                                <p class="info mb-0">
                                    {{$gs->first_email}}
                                </p>
                            </div>
                        </a>
                    </div>
                @endif
                
                @if ($gs->first_phone)
                <div class="col-12 col-md-4 p-0 wow fadeInUp" data-wow-duration=".6s" data-wow-delay="0.6s" data-wow-offset="100">
                    <a href="tel:{{$gs->first_phone}}" class="contact-holder d-flex align-items-center" style="background-color: #081f24;">
                        <div>
                            <span class="icon d-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                                    <g clip-path="url(#clip0_12_7002)">
                                      <path d="M14.625 1.12509C14.625 0.826719 14.7435 0.540571 14.9545 0.329592C15.1655 0.118614 15.4516 8.76043e-05 15.75 8.76043e-05C18.7326 0.00336315 21.5922 1.18968 23.7013 3.29875C25.8104 5.40783 26.9967 8.26741 27 11.2501C27 11.5485 26.8814 11.8346 26.6704 12.0456C26.4595 12.2566 26.1733 12.3751 25.875 12.3751C25.5766 12.3751 25.2904 12.2566 25.0795 12.0456C24.8685 11.8346 24.75 11.5485 24.75 11.2501C24.7473 8.86396 23.7982 6.57633 22.111 4.88909C20.4237 3.20184 18.1361 2.25277 15.75 2.25009C15.4516 2.25009 15.1655 2.13156 14.9545 1.92058C14.7435 1.7096 14.625 1.42346 14.625 1.12509ZM15.75 6.75009C16.9434 6.75009 18.088 7.22419 18.9319 8.06811C19.7759 8.91202 20.25 10.0566 20.25 11.2501C20.25 11.5485 20.3685 11.8346 20.5795 12.0456C20.7904 12.2566 21.0766 12.3751 21.375 12.3751C21.6733 12.3751 21.9595 12.2566 22.1705 12.0456C22.3814 11.8346 22.5 11.5485 22.5 11.2501C22.4982 9.46043 21.7864 7.74457 20.521 6.47909C19.2555 5.21361 17.5396 4.50187 15.75 4.50009C15.4516 4.50009 15.1655 4.61861 14.9545 4.82959C14.7435 5.04057 14.625 5.32672 14.625 5.62509C14.625 5.92346 14.7435 6.2096 14.9545 6.42058C15.1655 6.63156 15.4516 6.75009 15.75 6.75009ZM25.9796 18.8315C26.6315 19.4852 26.9976 20.3708 26.9976 21.2941C26.9976 22.2174 26.6315 23.103 25.9796 23.7567L24.9558 24.9368C15.7421 33.758 -6.67913 11.3423 2.00586 2.09934L3.29961 0.974338C3.95409 0.340599 4.83178 -0.00998218 5.74277 -0.0015607C6.65376 0.00686078 7.52481 0.373608 8.16747 1.01934C8.20235 1.05421 10.287 3.76209 10.287 3.76209C10.9055 4.41192 11.2499 5.27513 11.2484 6.17229C11.2469 7.06945 10.8998 7.93153 10.2791 8.57934L8.97635 10.2173C9.6973 11.9691 10.7573 13.5611 12.0954 14.9019C13.4335 16.2428 15.0234 17.306 16.7737 18.0305L18.4218 16.7198C19.0697 16.0996 19.9317 15.7529 20.8285 15.7516C21.7254 15.7504 22.5883 16.0947 23.238 16.7131C23.238 16.7131 25.9447 18.7966 25.9796 18.8315ZM24.4316 20.4672C24.4316 20.4672 21.7395 18.3961 21.7046 18.3612C21.4728 18.1314 21.1597 18.0025 20.8333 18.0025C20.5069 18.0025 20.1937 18.1314 19.962 18.3612C19.9316 18.3927 17.6625 20.2006 17.6625 20.2006C17.5096 20.3223 17.3276 20.4021 17.1344 20.4321C16.9413 20.4621 16.7437 20.4412 16.5611 20.3716C14.2936 19.5274 12.234 18.2057 10.5219 16.4961C8.80977 14.7864 7.48505 12.7288 6.63748 10.4626C6.56232 10.2775 6.53782 10.0757 6.56649 9.87797C6.59516 9.68025 6.67597 9.49373 6.8006 9.33759C6.8006 9.33759 8.60847 7.06734 8.63885 7.03809C8.86865 6.80632 8.99759 6.49316 8.99759 6.16678C8.99759 5.84039 8.86865 5.52723 8.63885 5.29546C8.60397 5.26171 6.53285 2.56734 6.53285 2.56734C6.29761 2.35641 5.99061 2.24344 5.67476 2.2516C5.35891 2.25976 5.05814 2.38842 4.8341 2.61121L3.54035 3.73621C-2.80689 11.3682 16.623 29.7203 23.3111 23.4001L24.336 22.2188C24.5761 21.9964 24.7204 21.6893 24.7382 21.3624C24.7561 21.0355 24.6461 20.7145 24.4316 20.4672Z" fill="white"/>
                                    </g>
                                    <defs>
                                      <clipPath id="clip0_12_7002">
                                        <rect width="27" height="27" fill="white"/>
                                      </clipPath>
                                    </defs>
                                </svg>
                            </span>

                            <p class="title mt-2">
                                {{__("Call us")}}
                            </p>
                            <p class="small">
                                {{__("We Accept calls from 08:00 AM to 06:00 PM")}}
                                
                            </p>

                            <p class="info mb-0">
                                {{$gs->first_phone}}
                            </p>
                        </div>
                    </a>
                </div>
                @endif

                @if ($gs->location)
                <div class="col-12 col-md-4 p-0 wow fadeInUp" data-wow-duration=".8s" data-wow-delay="0.8s" data-wow-offset="100">
                    <a href="{{$gs->location}}" target="_blank" class="contact-holder d-flex align-items-center" style="background-color: #1e5306;">
                        <div>
                            <span class="icon d-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
                                    <path d="M15.9922 19.1875C20.9628 19.1875 24.9922 15.1581 24.9922 10.1875C24.9922 5.21694 20.9628 1.1875 15.9922 1.1875C11.0216 1.1875 6.99219 5.21694 6.99219 10.1875C6.99219 15.1581 11.0216 19.1875 15.9922 19.1875Z" stroke="white" stroke-width="1.5"/>
                                    <path d="M25.1806 19.375C22.7439 21.8117 19.4391 23.1806 15.9931 23.1806C12.5471 23.1806 9.24226 21.8117 6.80559 19.375C4.36891 16.9383 3 13.6335 3 10.1875C3 6.74152 4.36891 3.43668 6.80559 1" stroke="white" stroke-width="1.5"/>
                                    <path d="M11.9922 27.1875H19.9922" stroke="white" stroke-width="1.5"/>
                                    <path d="M15.9922 23.1875V27.1875" stroke="white" stroke-width="1.5"/>
                                </svg>
                            </span>

                            <p class="title mt-2">
                                {{__("Visit our office")}}
                            </p>
                            <p class="small">
                                {{__("We welcome you to visits us")}}
                            </p>

                            <p class="info mb-0">
                               {{$gs->address}}
                            </p>
                        </div>
                    </a>
                </div>
                @endif
                
            </div>
        </div>
    </div>
</div>

@endsection