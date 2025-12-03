@extends("admin.layouts.app")

@section("content")
<form action="{{route('admin.service.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <x-card-content>
        <x-card-header :title="__('Add new service')" :back-btn-route="route('admin.service.index')"/>
        <x-card.body>

            <x-inputs.select-lang />

            <x-file-input
                required
                name="image"
                class="mt-5 image-input"
                :title="__('Cover')"
                :col="6"
            />

            <x-text-input
                required
                :col="6"
                :title="__('Title')"
                name="title"
                is-translatable-input="true"
            />
            
            <x-textarea-input
                :title="__('Description')" 
                name="short_description"
                class="mt-4"
                col="12"
                is-translatable-input="true"
            />

            <x-wysiwyg-input
                translated-input
                name="content"
                class="mt-5"
                :title="__('Content')"
                :col="12"
            />

            <div class="form-group col-6 mt-5 child-category cats">
                <label class="d-flex align-items-center fs-5 fw-bold mb-2 required">{{__("Choose Category")}}</label>
                <select name="category_id" required data-control="select2" class="form-control form-control-lg form-control-solid" id="boarsd">
                    <option value="" selected disabled>{{__('Choose An Option')}}</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>

            <x-text-input
                col="12"
                :title="__('Keywords')"
                name="keywords"
                is-translatable-input="true"
                class="mt-4"
            />

        </x-card.body>
        <x-card.footer>
            <x-indicator-btn :is-update-action="false"/>
        </x-card.footer>
    </x-card-content>
</form>
@endsection

@section('scripts')
@include('admin.pages.products.scripts')
@endsection