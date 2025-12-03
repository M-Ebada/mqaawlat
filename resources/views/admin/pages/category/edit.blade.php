@extends("admin.layouts.app")

@section("content")
    <form action="{{route('admin.category.update', $model->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <x-card-content>
            <x-card-header :title="__('Update category') . ' - ' . $model->title" :back-btn-route="route('admin.category.index')"/>
            <x-card.body>

                <x-inputs.select-lang />

                <x-text-input
                    required
                    col="12"
                    :title="__('Title')"
                    name="title"
                    is-translatable-input="true"
                    :model="$model"
                />
                
                <x-file-input
                    name="cover"
                    class="mt-5 image-input"
                    :title="__('Cover')"
                    :col="6"
                />
                
                <x-textarea-input
                    :title="__('Description')" 
                    name="description"
                    class="mt-4"
                    col="12"
                    is-translatable-input="true"
                    :model="$model"
                />

            </x-card.body>
            <x-card.footer>
                <x-indicator-btn :is-update-action="true" />
            </x-card.footer>
        </x-card-content>
    </form>

@endsection