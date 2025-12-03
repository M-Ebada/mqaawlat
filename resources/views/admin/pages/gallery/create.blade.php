@extends("admin.layouts.app")

@section("content")
<form action="{{route('admin.gallery.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <x-card-content>
        <x-card-header :title="__('Add new image')" :back-btn-route="route('admin.gallery.index')"/>
        <x-card.body>

            
            <x-file-input
                required
                name="image"
                class="mt-5 image-input"
                :title="__('Image')"
                :col="12"
            />
            
        </x-card.body>
        <x-card.footer>
            <x-indicator-btn :is-update-action="false"/>
        </x-card.footer>
    </x-card-content>
</form>
@endsection