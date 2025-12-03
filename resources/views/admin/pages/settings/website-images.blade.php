@extends("admin.layouts.app")

@section('css')
<style>
.banner-container{
    padding: 25px;
    border:1px solid #ddd;
    border-radius: 20px;
    margin: 15px
}
</style>
@endsection

@section("content")
<form action="{{route('admin.settings.website-images.update', 1)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <x-card-content>
        <x-card-header :title='__("Update Website Images")'/>
        <x-card.body>
            <x-file-input :model="$gs" :title="__('Main logo')" name="main_logo" :collection="\App\Enums\GeneralSettingEnum::LOGO_COLLECTION->name" />

            <x-file-input :model="$gs" :title="__('Favicon')" name="favicon" :collection="'favicon'" />
        </x-card.body>
        <x-card.footer>
            <x-indicator-btn/>
        </x-card.footer>
    </x-card-content>
</form>
@endsection
