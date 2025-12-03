<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <a href="{{ $loginLink }}">
            <img alt="Logo" src="{{\App\Core\Support\Image::getImageUrl('gs', 'LOGO_COLLECTION')}}" class="h-50px app-sidebar-logo-default" />
            <img alt="Logo" src="{{\App\Core\Support\Image::getImageUrl('gs', 'LOGO_COLLECTION')}}" class="h-40px app-sidebar-logo-minimize" />
        </a>
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-double-left fs-2 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
    </div>
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <div class="menu menu-column menu-rounded menu-sub-indention px-2" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                @foreach ($links as $link)
                    @if ($link['can'] === true || Gate::allows($link['can']))
                        @if (isset($link['menus']))
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <i class="bi bi-{{ $link['icon'] ?? 'archive' }} fs-3"></i>
                                    </span>
                                    <span class="menu-title">{{ $link['title'] }}</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion">
                                    @foreach ($link['menus'] as $menus)
                                        @if (isset($menus['can']))
                                            @if ($menus['can'] === true || Gate::allows($menus['can']))
                                                <div class="menu-item">
                                                    <a class="menu-link {{ request()->fullUrl() == $menus['route'] ? 'active openAccordion' : '' }}"
                                                        href="{{ $menus['route'] }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">{{ $menus['title'] }}</span>
                                                    </a>
                                                </div>
                                            @endif
                                        @elseif(!isset($menus['can']))
                                            <div class="menu-item">
                                                <a class="menu-link {{ request()->fullUrl() == $menus['route'] ? 'active openAccordion' : '' }}"
                                                    href="{{ $menus['route'] }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">{{ $menus['title'] }}</span>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="menu-item">
                                <a class="menu-link {{ request()->url() == $link['route'] ? 'active' : '' }}"
                                    href="{{ $link['route'] }}">
                                    <span class="menu-icon">
                                        <i class="bi bi-{{ $link['icon'] ?? 'archive' }} fs-3"></i>
                                    </span>
                                    <span class="menu-title">{{ $link['title'] }}</span>
                                </a>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
        <a href="javascript:;" style="border-radius:55px !important"
            class="show-indicator logout_btn btn btn-flex flex-center btn-danger overflow-hidden text-nowrap px-0 h-40px w-100">
            <span class="indicator-label">{{ __('Logout') }}</span>
            <span class="indicator-progress">{{ __('Please wait') }}...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
            <i class="bi bi-box-arrow-left ms-2"></i>
        </a>
    </div>

</div>
