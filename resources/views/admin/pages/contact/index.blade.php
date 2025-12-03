@extends("admin.layouts.app")

@section("content")
    <x-card-content>
        <x-datatable-header>
        </x-datatable-header>
        <x-card-body class="pt-0">
            <x-datatable-html>
                <td>{{__("status")}}</td>
                <td>{{__("name")}}</td>
                <td>{{__("WhatsApp")}}</td>
                <td>{{__("Created At")}}</td>
                <td>{{__("Updated At")}}</td>
            </x-datatable-html>
        </x-card-body>
    </x-card-content>
@endsection

@section("scripts")
    <x-datatable-script :route="route('admin.contact.index')" :columns="$columns" />
@endsection
