@extends("admin.layouts.app")

@section("content")
    <form action="{{route('admin.testmonial.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <x-card-content>
            <x-card-header :title="__('Add new review')" :back-btn-route="route('admin.testmonial.index')"/>
            <x-card.body>

                <x-inputs.select-lang />

                <x-text-input
                    :title="__('Name')"
                    required
                    name="title"
                    is-translatable-input="true"
                    :col="6"
                />

                <x-text-input
                    :title="__('Position')"
                    required
                    name="position"
                    is-translatable-input="true"
                    :col="6"
                />

                <x-file-input
                    :title="__('Image')" 
                    name="image"
                    col="12"
                    class="mt-4"
                />

                <x-textarea-input
                    :title="__('Review')"
                    name="description"
                    is-translatable-input="true"
                    :col="12"
                    class="mt-4"
                />

            </x-card.body>
            <x-card.footer>
                <x-indicator-btn :is-update-action="false"/>
            </x-card.footer>
        </x-card-content>
    </form>
@endsection
