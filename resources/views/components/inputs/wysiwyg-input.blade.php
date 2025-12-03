@if($translatedInput)
    @foreach(['ar', 'en'] as $key)
        <div {{$attributes->merge(['style' => '', 'class' => 'col-md-' . ($col ?? '6') . ' form-group mt-5 all-input-translate-' . $key])}}>
            <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="{{$name}}[{{$key}}]">{{$title}} [{{$key}}]  {!! $required ? '<sup>*</sup>' : '' !!}</label>
            <textarea id="kt_docs_ckeditor_classic_{{$key}}" name="{{$name}}[{{$key}}]" rows="5" class="wysiwyg-input form-control form-control-lg form-control-solid kt_docs_ckeditor_classic @error($name) is-invalid @enderror" placeholder="{{$title}}"  {{$required && $key == "ar" ? 'required' : ''}} >{{old($name . '.' . $key, $model ? $model->getTranslation(Str::remove("[]", $name), $key) : '')}}</textarea>
            @error($name . '.' . $key)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    @endforeach
@else
    <div {{$attributes->merge(['style' => '', 'class' => 'col-md-' . ($col ?? '6') . ' form-group mt-5', 'id' => $name . '_parent'])}}>
        <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="{{$name}}">{{$title}} {!!  $required ? '<sup>*</sup>' : '' !!}</label>
        <textarea id="kt_docs_ckeditor_classic" name="{{$name}}" rows="5" class="form-control form-control-lg form-control-solid kt_docs_ckeditor_classic @error($name) is-invalid @enderror" placeholder="{{$title}}" {{$required ? 'required' : ''}}>{{old($name, $model ? $model->$name : '')}}</textarea>
        @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        @if(isset($hint))
            <div class="text-muted fs-7 mt-1">{{$hint}}</div>
        @endif
    </div>
@endif