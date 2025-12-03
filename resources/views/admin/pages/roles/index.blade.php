@extends("admin.layouts.app")

@section("content")
    <x-card-content>
        <x-datatable-header>
            <x-add-btn :route="route('admin.role.create')" :title="__('Add new role')" />
        </x-datatable-header>
        <x-card-body class="pt-0">
            <x-datatable-html>
                <td>{{__("Title")}}</td>
                <td>{{__("Created At")}}</td>
                <td>{{__("Updated At")}}</td>
            </x-datatable-html>
        </x-card-body>
    </x-card-content>
@endsection

@section("scripts")
    <x-datatable-script :route="route('admin.role.index')" :columns="$columns" />
@endsection
