@extends("admin.layouts.app")

@section("content")
<form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <x-card-content>
        <x-card-header :title="__('Add new category')" :back-btn-route="route('admin.category.index')"/>
        <x-card.body>

            <x-inputs.select-lang />

            <input type="text" name="type" value="parent" hidden />
            
            <x-text-input
                required
                col="12"
                :title="__('Title')"
                name="title"
                is-translatable-input="true"
            />
            
            <x-file-input
                required
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
            />

        </x-card.body>
        <x-card.footer>
            <x-indicator-btn :is-update-action="false"/>
        </x-card.footer>
    </x-card-content>
</form>
@endsection