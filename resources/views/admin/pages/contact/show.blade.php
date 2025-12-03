@extends('admin.layouts.app')

@section("content")

<x-card-content>
    <div class="card-body p-5 mb-0">

        <div class="header py-4 fs-4 fw-bold card-header">
            Show Message
        </div>

        <x-card-content>
            <x-card.body>
                <table class="table table-hover table-rounded table-striped border gy-7 gs-7">
                    <tbody>
                        <tr>
                            <td> Name </td>
                            <td>{{$model->name}}</td>
                        </tr>

                        <tr>
                            <td> Whatsapp </td>
                            <td>{{$model->whatsapp}}</td>
                        </tr>

                        <tr>
                            <td> Message </td>
                            <td>{{$model->mssg}}</td>
                        </tr>
                        <tr>
                            <td> <b> {{__("Created at")}} </b> </td>
                            <td>{{$model->created_at}}</td>
                        </tr>

                        
                    </tbody>
                </table>
            </x-card.body>
        </x-card-content>

    </div>
</x-card-content>

@endsection