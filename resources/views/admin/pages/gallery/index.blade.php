@extends("admin.layouts.app")

@section("content")
    <x-card-content>
        <x-datatable-header>
            <x-add-btn :route="route('admin.gallery.create')" :title="__('Add new image')" />

        </x-datatable-header>
        <x-card-body class="pt-0">
            <x-datatable-html>
                <td>{{__("Image")}}</td>
                <td>{{__("Status")}}</td>
                <td>{{__("Created At")}}</td>
                <td>{{__("Updated At")}}</td>
            </x-datatable-html>
        </x-card-body>
    </x-card-content>


@endsection

@section("scripts")
    <x-datatable-script :route="route('admin.gallery.index')" :columns="$columns" />
@endsection