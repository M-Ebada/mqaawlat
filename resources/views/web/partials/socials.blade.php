@php
$gs = \App\Models\GeneralSetting::query()->first();
@endphp

@if ($gs->first_email)
<a href="mailto:{{$gs->first_email}}" class="social-icon me-2 d-email linkw" aria-label="{{__('Contact us through Email')}}">
    <i class="bi bi-envelope"></i>
</a>
@endif

@if ($gs->second_emai)
<a href="mailto:{{$gs->second_email}}" class="social-icon me-2 d-email linkw"  aria-label="{{__('Contact us through Email')}}">
    <i class="bi bi-envelope"></i>
</a>
@endif

@if ($gs->first_phone)
<a href="tel:0{{$gs->first_phone}}" class="social-icon me-2 d-email linkw" aria-label="{{__('Call us now')}}">
    <i class="bi bi-telephone"></i>
</a>
@endif

@if ($gs->second_phone)
<a href="tel:{{$gs->second_phone}}" class="social-icon me-2 d-email linkw" aria-label="{{__('Call us now')}}">
    <i class="bi bi-telephone"></i>
</a>
@endif


@if ($gs->whatsapp_phone)
<a href="https://wa.me/+966{{$gs->whatsapp_phone}}" class="social-icon me-2 d-email linkw" aria-label="{{__('Send us on whatsapp')}}" target="_blank" class="social-icon me-2 d-whats">
    <i class="bi bi-whatsapp"></i>
</a>
@endif

@if ($gs->facebook_link)
<a href="{{$gs->facebook_link}}" class="social-icon me-2 d-email linkw" aria-label="{{__('Facebook link')}}" target="_blank">
    <i class="bi bi-facebook"></i>
</a>
@endif

@if ($gs->twitter_link)
<a href="{{$gs->twitter_link}}" class="social-icon me-2 d-email linkw" target="_blank" aria-label="{{__('Twitter link')}}">
    <i class="bi bi-twitter-x"></i>
</a>
@endif

@if ($gs->instagram_link)
<a href="{{$gs->instagram_link}}" class="social-icon me-2 d-email linkw" aria-label="{{__('Instagram link')}}" target="_blank">
    <i class="bi bi-instagram"></i>
</a>
@endif

@if ($gs->linkedin_link)
<a href="{{$gs->linkedin_link}}" class="social-icon me-2 d-email linkw" aria-label="{{__('Linkedin link')}}" target="_blank">
    <i class="bi bi-linkedin"></i>
</a>
@endif

@if ($gs->snapchat_link)
<a href="{{$gs->snapchat_link}}" class="social-icon me-2 d-email linkw" aria-label="{{__('Snapchat link')}}" target="_blank">
    <i class="bi bi-snapchat"></i>
</a>
@endif

@if ($gs->tiktok_link)
<a href="{{$gs->tiktok_link}}" class="social-icon me-2 d-email linkw" target="_blank" aria-label="{{__('Tiktok link')}}">
    <i class="bi bi-tiktok"></i>
</a>
@endif