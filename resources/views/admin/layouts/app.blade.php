<!DOCTYPE html>
<html lang="{{LaravelLocalization::getCurrentLocale()}}"
      @if(LaravelLocalization::getCurrentLocaleDirection() == "rtl")
          direction="rtl" dir="rtl"
          style="direction: rtl"
    @endif>
<head>
    <title>{{\App\Core\Support\Settings::get("title")}}</title>
    <meta charset="utf-8"/>
    <meta name="description" content="{{\App\Core\Support\Settings::get("description")}}"/>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="keywords" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <link rel="canonical" href=""/>
    @include("admin.partials.backend-styles")
    @yield('css')

    
</head>
<body id="kt_app_body" @if(LaravelLocalization::getCurrentLocaleDirection() == "rtl") direction="rtl"
      @endif data-kt-app-layout="light-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true"
      data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true"
      data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"
      class="app-default">
<script>
    let defaultThemeMode = "light";
    let themeMode;
    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if (localStorage.getItem("data-bs-theme") !== null) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }
        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }
        document.documentElement.setAttribute("data-bs-theme", themeMode);
    }
</script>
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        <div id="kt_app_header" class="app-header">
            <div class="app-container container-fluid d-flex align-items-stretch justify-content-between"
                 id="kt_app_header_container">
                @include("admin.partials.header")
            </div>
        </div>
        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            @php
                $links = \App\Core\Menus\AdminMenu::links();
            @endphp
            <x-aside
                :links="$links"
                :logout-link="route('admin.logout')"
                :login-link="route('admin.login')"
                :logo="\App\Core\Support\Settings::get('site_logo')"
            />
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <div class="d-flex flex-column flex-column-fluid">
                    @include("admin.partials.toolbar")
                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        <div id="kt_app_content_container" class="app-container container-fluid mt-10">
                            @yield("content")
                        </div>
                    </div>
                </div>
                @include("admin.partials.footer")
            </div>
        </div>
    </div>
</div>

<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <i class="ki-duotone ki-arrow-up">
        <span class="path1"></span>
        <span class="path2"></span>
    </i>
</div>
<form method="post" id="logout_form" class="d-none" action="{{route('admin.logout')}}">
    @csrf
</form>


@include("admin.partials.delete-modal")
@include("admin.partials.backend-scripts")

<script>
    $('body').on('click', '.translate_ar_inputs', function () {
        // $(this).addClass("active");
        // $('.translate_en_inputs').removeClass("active");
        activateAr();

    });

    function activateAr(){
        $('.all-input-translate-en').css({display: "none"});
        $('.all-input-translate-ar').css({display: "block"});
        $('.all-input-translate-ur').css({display: "none"});
    }
    activateAr();

    $('body').on('click', '.translate_en_inputs', function () {
        // $(this).addClass("active");
        // $('.translate_ar_inputs').removeClass("active");
        $('.all-input-translate-en').css({display: "block"});
        $('.all-input-translate-ar').css({display: "none"});
        $('.all-input-translate-ur').css({display: "none"});

    });
    $('body').on('click', '.translate_ur_inputs', function () {
        // $(this).addClass("active");
        // $('.translate_ar_inputs').removeClass("active");
        $('.all-input-translate-ur').css({display: "block"});
        $('.all-input-translate-ar').css({display: "none"});
        $('.all-input-translate-en').css({display: "none"});

    });
</script>

<script>
    $('#notification_data').load("{{route("admin.notification.index")}}");

    $(document).on("click", ".notification_record", function () {
        let that = $(this);
        $.post({
            url: that.data("action"),
            method: "POST",
            data: {
                _token: "{{csrf_token()}}"
            },
            success: function (response) {
                that.removeClass("fw-bolder");
                that.removeClass("notification_record");
                $('#notification_count').html(response.data.remaining_notification);
                if (response.data.remaining_notification == 0) {
                    $('#notification_dots').remove();
                }
            },
            error: function (error) {
                console.log(error);
            }
        })
    });


</script>
@yield("scripts")
</body>
</html>
