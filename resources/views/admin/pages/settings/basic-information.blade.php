@extends("admin.layouts.app")

@section('css')
<style>
.banner-container{
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 18px
}
</style>
@endsection

@section("content")
    <form action="{{route('admin.settings.basic-information.update', 1)}}" method="post">
        @csrf
        @method("PUT")
        <x-card-content>
            <x-card-header :title='__("Update Basics Information")'/>
            <x-card.body>
                <x-inputs.select-lang/>
                <x-text-input is-translatable-input="true" required :title="__('Website title')" name="title" :model="$gs" />
                <x-text-input is-translatable-input="true" :title="__('Website Address')" name="address" :model="$gs" />
                <x-text-input :title="__('Location link')" name="location" :model="$gs" />
                <x-text-input type="tel" :title="__('First Phone')" name="first_phone" :model="$gs"/>
                <x-text-input  title="Whatsapp Number" name="whatsapp_phone" :model="$gs" class="mt-3"/>
                <x-text-input  title="Second Whatsapp Number" name="second_whatsapp" :model="$gs" class="mt-3"/>
                <x-text-input type="tel" :title="__('Second Phone')" name="second_phone" :model="$gs" class="mt-3"/>
                <x-text-input type="email" :title="__('First Email')" name="first_email" :model="$gs" class="mt-3"/>
                <x-text-input type="email" :title="__('Second Email')" name="second_email" :model="$gs" class="mt-3"/>
                <x-text-input  title="Twitter Link" name="twitter_link" :model="$gs" class="mt-3"/>
                <x-text-input  title="Instagram Link" name="instagram_link" :model="$gs" class="mt-3"/>
                <x-text-input  title="Linkedin Link" name="linkedin_link" :model="$gs" class="mt-3"/>
                <x-text-input  title="Snapchat Link" name="snapchat_link" :model="$gs" class="mt-3"/>
                <x-text-input  title="Facebook Link" name="facebook_link" :model="$gs" class="mt-3"/>
                <x-text-input  title="Tiktok Link" name="tiktok_link" :model="$gs" class="mt-3"/>

                <x-text-input is-translatable-input="true" :col="12" title="Description" name="description" :model="$gs" class="mt-3" />

            </x-card.body>
            <x-card.footer>
                <x-indicator-btn/>
            </x-card.footer>
        </x-card-content>
    </form>

@endsection