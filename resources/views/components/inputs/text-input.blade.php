<div {{$attributes->merge(["class" => ($isTranslatableInput) ? "all-input-translate-ar col-md-".$col : "col-md-" . $col ])}}>
    <label for="{{$name}}"
           {{$attributes->merge(["class" => " d-flex align-items-center fs-5 fw-bold mb-2 " . ($required ? "required" : "") ])}} class="required ">{{$title}} </label>
    <input type="{{$type}}"
           id="{{$name}}"
           class="form-control form-control-lg form-control-solid @if($type == "date") flatpickr @endif  @error($name) is-invalid @enderror"
           placeholder="{{$placeholder ?? $title}}"
           @if($isTranslatableInput)
               name="{{$name}}[ar]"
           @if(isset($model))
               value="{{old($name . ".ar", $model->getTranslation($name, "ar", false))}}"
           @else
               value="{{old($name . ".ar")}}"
           @endif
           @else
               name="{{$name}}"
           @if(isset($model))
               value="{{old($name, $model->$name)}}"
           @else
               value="{{old($name)}}"
        @endif
        @endif

        @if($type == "number") step="any" min="0" @endif

        {{$required ? "required" : ""}}
    />
    @error($name)
    <div class="fv-plugins-message-container invalid-feedback">{{$message}}</div>
    @enderror
</div>
@if($isTranslatableInput)
    <div
        {{$attributes->merge(["class" => "all-input-translate-en col-md-" . $col ])}} style="display: none !important ; ">
        <label for="{{$name}}" {{$attributes->merge(["class" => "d-flex align-items-center fs-5 fw-bold mb-2 " . ($required ? "required" : "") ])}} class="required ">{{$title}} [English]</label>
        <input type="{{$type}}"
               id="{{$name}}"
               class="form-control form-control-lg form-control-solid  @error($name) is-invalid @enderror"
               placeholder="{{$placeholder ?? $title}}"
               @if($isTranslatableInput)
                   name="{{$name}}[en]"
               @if(isset($model))
                   value="{{old($name . ".en", $model->getTranslation($name, "en", false))}}"
               @else
                   value="{{old($name . ".en")}}"
               @endif
               @else
                   name="{{$name}}"
               @if(isset($model))
                   value="{{old($name, $model->$name)}}"
               @else
                   value="{{old($name)}}"
            @endif
            @endif
        />
        @error($name)
        <div class="fv-plugins-message-container invalid-feedback">{{$message}}</div>
        @enderror
    </div>

@endif
