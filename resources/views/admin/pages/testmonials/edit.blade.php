@extends('admin.layouts.app')

@section('content')
    <form action="{{ route('admin.testmonial.update', $model->id) }}" method="post">
        @csrf
        @method('PUT')
        <x-card-content>
            <x-card-header :title="__('Update review') . ' - ' . $model->title" :back-btn-route="route('admin.testmonial.index')" />
            <x-card.body>
                <x-inputs.select-lang />

                <x-text-input
                    :title="__('Name')"
                    required
                    name="title"
                    is-translatable-input="true"
                    :col="6"
                    :model="$model"
                />

                <x-text-input
                    :title="__('Position')"
                    required
                    name="position"
                    is-translatable-input="true"
                    :col="6"
                    :model="$model"
                />

                <x-file-input
                    :title="__('Image')" 
                    name="image"
                    col="12"
                    class="mt-4"
                />

                <x-textarea-input
                    :title="__('Description')"
                    name="description"
                    is-translatable-input="true"
                    :col="12"
                    class="mt-4"
                    :model="$model"
                />

            </x-card.body>
            <x-card.footer>
                <x-indicator-btn :is-update-action="true" />
            </x-card.footer>
        </x-card-content>
    </form>
@endsection
