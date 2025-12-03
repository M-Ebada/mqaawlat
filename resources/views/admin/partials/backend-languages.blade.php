<div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
    <a href="#" class="menu-link px-5">
        <span class="menu-title position-relative">{{__('Language')}}
        <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">
            {{LaravelLocalization::getCurrentLocaleNative()}}
            <img class="w-15px h-15px rounded-1 ms-2" src="{{asset(LaravelLocalization::getLocalesOrder()[LaravelLocalization::getCurrentLocale()]['flag'])}}" alt="" /></span>
        </span>
    </a>
    <div class="menu-sub menu-sub-dropdown w-175px py-4">
        @foreach(LaravelLocalization::getLocalesOrder() as $locale => $language)
            <div class="menu-item px-3">
                <a href="{{LaravelLocalization::getLocalizedURL($locale)}}" class="menu-link d-flex px-5 {{LaravelLocalization::getCurrentLocale() == $locale ? "active" : ""}}">
                    <span class="symbol symbol-20px me-4">
                        <img class="rounded-1" src="{{asset($language["flag"])}}" alt="" />
                    </span>
                    {{$language["native"]}}
                </a>
            </div>
        @endforeach
    </div>
</div>
