<html lang="{{LaravelLocalization::getCurrentLocale()}}"
      @if(LaravelLocalization::getCurrentLocaleDirection() == "rtl")
          direction="rtl" dir="rtl" style="direction: rtl"
    @endif
>
<head>
    <title>{{\App\Core\Support\Settings::get("title")}}</title>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <link rel="canonical" href="" />
    @include("admin.partials.backend-styles")
</head>
<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center bgi-no-repeat">
<script>let defaultThemeMode = "light"; let themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <style> [data-bs-theme="dark"] body { background-image: url('{{asset("backend/media/auth/bg4-dark.jpg")}}'); }</style>
    <div class="d-flex flex-column justify-content-center align-items-center flex-lg-row" style="margin-top: 11rem">
        <div class="bg-body d-flex rounded-4 w-md-500px p-xl-20 p-10 pb-xl-5 pb-3 pt-xl-5 pt-3" style="border:1px solid #ddd">
            @yield("content")
        </div>
    </div>
</div>
@include("admin.partials.backend-scripts")
</body>
</html>
