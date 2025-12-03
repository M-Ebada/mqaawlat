@extends("admin.layouts.app")

@section("content")
    <form action="{{route('admin.gallery.update', $model->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <x-card-content>
            <x-card-header :title="__('Update image')" :back-btn-route="route('admin.gallery.index')"/>
            <x-card.body>

                
                <x-file-input
                    name="image"
                    class="mt-5 image-input"
                    :title="__('Image')"
                    :col="6"
                />
                

            </x-card.body>
            <x-card.footer>
                <x-indicator-btn :is-update-action="true" />
            </x-card.footer>
        </x-card-content>
    </form>

@endsection