@extends('admin.layouts.app')

@section("content")

<div class="row">

    <div class="col-12 col-md-4 mb-4">
        <a href="{{route('admin.contact.index')}}" style="background: #1c325e" class="card hoverable card-xl-stretch mb-xl-8">
            <div class="card-body text-center">
                <lord-icon
                    src="https://cdn.lordicon.com/abhwievu.json"
                    trigger="loop"
                    delay="400"
                    style="width:90px;height:90px">
                </lord-icon>
                <div class="fw-bolder fs-2 text-white">{{__("New Messages")}}</div>
                <div class="text-white fw-bolder fs-1 mt-5">
                    {{\App\Models\Contact::query()->where('status' , 'new')->count()}}
                </div>
            </div>
        </a>
    </div>

    <div class="col-12 col-md-4 mb-4">
        <a href="{{route('admin.service.index')}}" style="background: #18a33b" class="card hoverable card-xl-stretch mb-xl-8">
            <div class="card-body text-center">
                <lord-icon
                    src="https://cdn.lordicon.com/pmawqxvu.json"
                    trigger="loop"
                    delay="400"
                    style="width:90px;height:90px">
                </lord-icon>
                <div class="fw-bolder fs-2 text-white">{{__("Services")}}</div>
                <div class="text-white fw-bolder fs-1 mt-5">
                    {{\App\Models\Product::query()->where('status' , 1)->count()}}
                </div>
            </div>
        </a>
    </div>

</div>
@endsection

@section('scripts')
<script src="{{asset('admin/js/temp/widgets.js')}}"></script>
<script src="{{asset('admin/js/lordicon.js')}}"></script>

@endsection
