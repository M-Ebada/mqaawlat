<div class="image-input image-input-outline mb-5" data-kt-image-input="true" style="background-image: url('{{asset("backend/media/svg/avatars/blank.svg")}}')">
    @if(isset($image))
        <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{$image}}')"></div>
    @else
        <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{asset("backend/media/svg/avatars/blank.svg")}}')"></div>
    @endif
    <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
           data-kt-image-input-action="change"
           data-bs-toggle="tooltip"
           data-bs-dismiss="click"
           title="{{__("Change avatar")}}">
        <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>
        <input type="file" name="{{$name}}" accept="{{implode(", ", \App\Core\Support\Image::$allowedImageExtensions)}}" />
        <input type="hidden" name="{{$name}}_remove" />
    </label>
    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
          data-kt-image-input-action="cancel"
          data-bs-toggle="tooltip"
          data-bs-dismiss="click"
          title="{{__("Cancel avatar")}}">
        <i class="ki-outline ki-cross fs-3"></i>
    </span>
    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
          data-kt-image-input-action="remove"
          data-bs-toggle="tooltip"
          data-bs-dismiss="click"
          title="{{__("Remove avatar")}}">
        <i class="ki-outline ki-cross fs-3"></i>
    </span>
</div>
