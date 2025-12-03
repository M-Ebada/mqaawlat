@extends("admin.layouts.app")


@section("content")
    <form action="{{route('admin.service.update', $model->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <x-card-content>
            <x-card-header :title="__('Update service') . ' - ' . $model->title" :back-btn-route="route('admin.service.index')"/>
            <x-card.body>

                <x-inputs.select-lang />

                <x-file-input
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
                    :model="$model"
                />
                
                <x-textarea-input
                    :title="__('Description')" 
                    name="short_description"
                    class="mt-4"
                    col="12"
                    is-translatable-input="true"
                    :model="$model"
                />

                <x-wysiwyg-input
                    translated-input
                    name="content"
                    class="mt-5"
                    :title="__('Content')"
                    :col="12"
                    :model="$model"
                />
    
                <div class="form-group col-6 mt-5 child-category cats">
                    <label class="d-flex align-items-center fs-5 fw-bold mb-2 required">{{__("Choose Category")}}</label>
                    <select name="category_id" required data-control="select2" class="form-control form-control-lg form-control-solid" id="boarsd" required>
                        <option value="" selected disabled>{{__('Choose An Option')}}</option>
                        @foreach($categories as $category)
                            <option @if($category->id == $model->category_id) selected @endif value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>

                 <x-text-input
                    col="12"
                    :title="__('Keywords')"
                    name="keywords"
                    is-translatable-input="true"
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

@section('scripts')
@include('admin.pages.products.scripts')
@endsection