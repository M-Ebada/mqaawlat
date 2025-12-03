@php
    $value = $model->$name ?? '';
@endphp

<div {{$attributes->merge(["class" => "all-input-translate-ar col-md-" . $col ])}}>
    <label for="{{$name}}"
           class="d-flex align-items-center fs-5 fw-bold mb-2  {{ $required ? "required" : "" }}">{{$title}} @if($isTranslatableInput)
            [{{__("Arabic")}}]
        @endif</label>
    <textarea
        id="{{$name}}"
        class="form-control @if($isTinymc) tinymcTextareaEditor @endif form-control-lg form-control-solid  @error($name) is-invalid @enderror"
        placeholder="{{$placeholder ?? $title}}"
        rows="5"
        @if($isTranslatableInput)
            name="{{$name}}[ar]"
        @else
            name="{{$name}}"
        @endif
        {{$required && !$isTinymc ? "required" : ""}}
    >@if(isset($model) && $isTranslatableInput){{old($name . ".ar", $model->getTranslation($name, "ar", false))}}@elseif (isset($model) && !$isTranslatableInput){{$model->$name}}@else {{old($name . ".ar")}}@endif
</textarea>
    @error($name)
    <div class="fv-plugins-message-container invalid-feedback">{{$message}}</div>
    @enderror
</div>
@if($isTranslatableInput)
    <div {{$attributes->merge(["class" => "all-input-translate-en col-md-" . $col ])}} style="display: none">
        <label for="{{$name}}"
               class="d-flex align-items-center fs-5 fw-bold mb-2  {{ $required ? "required" : "" }}">{{$title}}
            [{{__("English")}}]</label>
        <textarea
            id="{{$name}}"
            class="form-control @if($isTinymc) tinymcTextareaEditor @endif form-control-lg form-control-solid  @error($name) is-invalid @enderror"
            placeholder="{{$placeholder ?? $title}}"
            rows="5"
            @if($isTranslatableInput)
                name="{{$name}}[en]"
            @else
                name="{{$name}}"
        @endif
    >@if(isset($model)){{old($name .".en", $model->getTranslation($name,"en", false))}} @else {{old($name .".en")}} @endif</textarea>
        @error($name)
        <div class="fv-plugins-message-container invalid-feedback">{{$message}}</div>
        @enderror
    </div>
@endif
