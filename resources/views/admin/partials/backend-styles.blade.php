<link rel="shortcut icon" href="{{\App\Core\Support\Settings::get("favicon")}}" type="image/x-icon">
<link rel="icon" href="{{\App\Core\Support\Settings::get("favicon")}}" type="image/x-icon">
<link rel="apple-touch-icon-precomposed" href="{{\App\Core\Support\Settings::get("favicon")}}">


@if(LaravelLocalization::getCurrentLocaleDirection() == "rtl")
    <link href="{{asset("backend/plugins/global/plugins.bundle.rtl.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("backend/css/style.bundle.rtl.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("backend/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css")}}" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@400;500;600&display=swap" rel="stylesheet">
    @auth()
        <link href="{{asset("backend/plugins/custom/datatables/datatables.bundle.rtl.css")}}" rel="stylesheet" type="text/css" />
        <style>
            .select2-container--bootstrap5 .select2-dropdown .select2-results__option.select2-results__option--selected:after{
                display: none;
            }
        </style>
    @endif


@else
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link href="{{asset("backend/plugins/global/plugins.bundle.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("backend/css/style.bundle.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("backend/plugins/custom/prismjs/prismjs.bundle.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("backend/plugins/custom/fullcalendar/fullcalendar.bundle.css")}}" rel="stylesheet" type="text/css" />
    @auth()
        <link href="{{asset("backend/plugins/custom/datatables/datatables.bundle.css")}}" rel="stylesheet" type="text/css" />
    @endif
@endif
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css" />
@vite(["resources/sass/backend/app.scss"])
<style>
    .fc-event-title.fc-sticky{
        font-size: 10px;
    }
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">
<style>
 body{
    font-family: "Noto Kufi Arabic", sans-serif !important;
}
</style>

<style>

    
       
    .table.gy-5 td{
         padding-top: 0.6rem;
         padding-bottom: 0.6rem;
    }
     .swal2-container .swal2-html-container {
         max-height: 100% !important;
     }

     .fc-event-title, .fc-h-event {
         cursor: pointer;
     }

     .tox-notifications-container {
         display: none !important;
     }
     #kt_app_header{
         border: none;
         background: rgba(255, 255, 255, 0.95) !important;
         /* backdrop-filter: blur(50px); */
     }
     #kt_app_sidebar_logo{
         border: none
     }

     .menu-column .menu-item .menu-link{
         padding: 14px 15px !important;
         border-radius: 55px !important;
     }
     .menu-column .menu-item{
         background: #fff
     }
     .menu-column .menu-item .active{
         background: #3263a6 !important;
     }
     .menu-column .menu-item .active *{
         color: #fff !important;
     }

     .backer{
         position: absolute;
         bottom: -20%;
         right: -40%;
         z-index: 1;
         opacity: 0.2;
     }
     .menu-column .menu-item,.app-sidebar-footer{
         z-index: 99;
         position: relative;
     }

     [data-bs-theme="dark"] #kt_app_header{
         background: rgb(30, 30, 45) !important;
     }

     [data-bs-theme="dark"] .menu-column .menu-item{
         background: #1e1e2d
     }

    .app-container .card .head{
        border-bottom: 1px solid #ddd;
        background: #3263a6;
        border-radius: 12px 12px 0 0;
        color: #fff;
    }
    .card-footer{
        position: sticky;
        bottom: 0;
        background: #fff !important;
    }

    .card .card-header{
        background: #3263a6;
        border-radius: 12px 12px 0 0;
        color: #fff !important;
    }
    .card .card-header .card-title *{
        color: #fff !important
    }

    [data-kt-app-sidebar-minimize="on"] .backer{
        display:none
    }
    [data-kt-app-sidebar-minimize="on"] .indicator-label{
        display:none
    }
 </style>