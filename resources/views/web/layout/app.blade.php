@php
$gs = \App\Helper\Helper::getGeneral();
$dir = (app()->getLocale() == 'ar') ? 'rtl' : 'ltr';
@endphp

<!DOCTYPE html>
<html lang="{{app()->getLocale()}}" dir="{{$dir}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{$gs->title}} </title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="{{$gs->description}}">

    @if (request()->routeIs('web.service.show'))
        {!! \App\Helper\Helper::getMetaTags($service) !!}
    @else
        {!! \App\Helper\Helper::getMetaTags() !!}
    @endif

    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{asset('layout/css/bootstrap.rtl.min.css')}}" />
    @else
        <link rel="stylesheet" href="{{asset('layout/css/bootstrap.min.css')}}" />
    @endif
    

    <link rel="stylesheet" href="{{asset('layout/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('layout/css/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" href="{{asset('layout/css/animate.min.css')}}" />
    
    <link rel="stylesheet" href="{{asset('layout/css/bootstrap-icons.min.css')}}" />
    <link rel="stylesheet" href="{{asset('layout/css/main-'.app()->getLocale().'.css')}}" />
    
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body * {
            font-family: "IBM Plex Sans Arabic", sans-serif;
        }
    </style>

    @yield('css')
</head>
<body>

<div class="preloader" id="preloader">
    <span class="loader"></span>
</div>

<div class="top-bar py-3">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="lnks d-flex align-items-center">

                <div class="">
                    @if (app()->getLocale() == 'ar')
                        <a href="{{LaravelLocalization::getLocalizedURL('en')}}" class="small">
                            <i class="bi bi-globe ms-1"></i>
                            English
                        </a>  
                    @else
                        <a href="{{LaravelLocalization::getLocalizedURL('ar')}}" class="small">
                            <i class="bi bi-globe ms-1"></i>
                            العربية
                        </a> 
                    @endif
                    
                </div>

                <div class="d-none d-md-block ms-3 small">
                    <a href="tel:{{$gs->first_phone}}" class="text-primary">
                        <i class="bi bi-telephone-fill"></i>
                        {{$gs->first_phone}}
                    </a>
                </div>
                <div class="d-none d-md-block small ms-3">
                    <a href="{{$gs->location}}" class="text-primary">
                        <i class="bi bi-geo-alt-fill"></i>
                        {{$gs->address}}
                    </a>
                </div>
                
                
            </div>

            <div class="d-flex align-items-center topbar-socials">
                @include('web.partials.socials')
            </div>
        </div>
    </div>
</div>

<navbar>

  <div class="container">
      <div class="d-flex justify-content-between align-items-center navbar-holder">
          <div class="d-flex align-items-center">
              <div class="logo me-4">
                  <a href="{{route('web.index')}}">
                      <img src="{{$gs->siteLogo}}" class="logo" alt="logo" title="" id="header-logo" data-alt="layout/imgs/logo-w.png" width="220px" />
                  </a>
              </div>
          </div>

          <ul class="list-unstyled d-none d-lg-flex mb-0 navigation">
            <li class="active">
                <a href="{{route('web.index')}}">
                    {{__("Home")}}
                </a>
            </li>
            <li class="">
                <a href="{{route('web.services')}}">
                    {{__("Our services")}}
                </a>
            </li>
            <li class="">
                <a href="{{route('web.gallery')}}">
                    {{__("Gallery")}}
                </a>
            </li>
            <li class="">
                <a href="{{route('web.about')}}">
                    {{__("About")}}
                </a>
            </li>
        </ul>
          
          <div class="navs d-flex align-items-center">
              
              <div class="btns d-flex align-items-center">
                  <div class="d-flex align-items-center me-4">
                    <!-- <a href="" class="lang-switcher me-2">AR</a> -->
                    <a href="{{route('web.contact')}}" class="btn btn-primary d-none d-md-block"> {{__("contact us")}} </a>
                  </div>

                  <div class="mobile-opener-cont d-flex align-items-center d-lg-none">

                      <div class="opener">
                          <span></span>
                          <span></span>
                          <span></span>
                      </div>
                      
                  </div>
              </div>
          </div>
          
      </div>
  </div>
  </navbar>


  <div class="mobile-navbar">

    <div class="container d-flex flex-column justify-content-between" style="min-height: 100vh;">
        <div>
            <div class="d-flex justify-content-between mb-5 pt-4 pb-4">
                <div class="close-mobile-nav d-flex align-items-center justify-content-center">
                    <div>
                        <span></span>
                        <span></span>
                    </div>
                    
                </div>
                <div class="logo">
                    <a href="{{route('web.index')}}">
                        <img src="{{$gs->siteLogo}}" class="logo" alt="logo" title="" width="90px" />
                    </a>
                </div>
            </div>

            <div class="content mb-4 ps-4 pe-4">
                <ul class="list-unstyled">
                    <li class="mb-4 active">
                        <a href="{{route('web.index')}}">
                            {{__("Home")}}
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{route('web.services')}}">
                            {{__("Our services")}}
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{route('web.about')}}">
                            {{__("About")}}
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{route('web.gallery')}}">
                            {{__("Gallery")}}
                        </a>
                    </li>
                </ul>
            </div>

            <a href="{{route('web.contact')}}" class="btn btn-sm btn-primary btn-hover btn-block mb-2">
                {{__("Contact us")}}
            </a>

        </div>
        

    </div>
    </div>

@yield('content')

<div class="footer pt-2">
    <div class="container">
        <div class="top-footer ">
        <div class="d-flex justify-content-between align-items-center navbar-holder flex-wrap pb-0">
            <div class="logo mb-2">
                <a href="{{route('web.index')}}">
                    <img src="{{$gs->siteLogo}}" class="logo" alt="logo" title="" width="100px" />
                </a>
            </div>
                
            
            <ul class="list-unstyled d-flex mb-0 navigation mb-2">
                <li>
                    <a href="{{route('web.index')}}">
                        {{__("Home")}}
                    </a>
                </li>
                <li class="">
                    <a href="{{route('web.services')}}">
                        {{__("Our services")}}
                    </a>
                </li>
                <li class="">
                    <a href="{{route('web.about')}}">
                        {{__("About")}}
                    </a>
                </li>
                <li class="">
                    <a href="{{route('web.gallery')}}">
                        {{__("Gallery")}}
                    </a>
                </li>
                <li class="d-none d-md-block">
                    <a href="{{route('web.contact')}}">
                        {{__("Contact us")}}
                    </a>
                </li>
            </ul>

            <div class="navs d-flex align-items-center mb-2">
                @include('web.partials.socials')
            </div>
            
        </div>
        <hr>
        <div class="bottom-footer text-center py-3 pt-2 small">
            {{__("Design By")}} <a href="https://alhussantech.com" style="text-decoration: underline !important;">alhussantech.com</a>
        </div>

        </div>
    </div>
</div>

    <script src="{{asset('layout/js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('layout/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('layout/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('layout/js/infiniteslidev2.min.js')}}"></script>
    <script src="{{asset('layout/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('layout/js/wow.min.js')}}"></script>

    <script src="{{asset('layout/js/main.js')}}"></script>

    @yield('js')
</body>
</html>