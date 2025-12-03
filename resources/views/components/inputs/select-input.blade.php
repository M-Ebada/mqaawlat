<div {{$attributes->merge(['style' => '', 'class' => 'col-md-' . $col . ' form-group'])}}>
    <label class="d-flex align-items-center fs-5 fw-bold mb-2" for="{{$name}}">{{__($title)}} {!! $required ? '<sup>*</sup>' : '' !!}</label>
    
    <select name="{{$name}}"  data-control="select2" class="form-control form-control-lg form-control-solid" {{$multiple ? 'multiple' : ''}} {{$required ? 'required' : ''}} id="{{$name}}">
        <option value=""  disabled>{{__('Choose An Option')}}</option>
        @foreach($collectionData as $key => $singleData)
            <option
                @if(old($name))
                    {{old($name) ==($singleData?->$selectValue ?? $singleData) ? 'selected' : ''}}
                @elseif($model != null)
                    @if($includeKey)
                        {{$model->$name == $key ? 'selected' : ''}}
                    @else
                        {{$model->$name == ($singleData?->$selectValue ?? $singleData) ? 'selected' : ''}}
                    @endif
                @endif

                @if($collectionDataSelected)
                    @if($includeKey)
                         {{ in_array($singleData->$selectValue ,$collectionDataSelected->toArray()) ? 'selected' :'' }}
                     @endif
                @endif

                @if($includeKey)
                    @if($keyDefault)
                         value="{{$key}}"
                    @else
                         value="{{$singleData?->$selectValue ?? $singleData}}"
                    @endif
                @else
                    value="{{$singleData?->$selectValue ?? $singleData}}"
                @endif

                >{{$singleData?->$selectValueData ?? $singleData}}</option>
        @endforeach
    </select>

    @error($name)
        <div class="fv-plugins-message-container invalid-feedback">{{$message}}</div>
    @enderror
</div>
