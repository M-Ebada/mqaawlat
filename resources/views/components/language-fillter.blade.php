<div class="my-3">
    <p class="fw-bold">اللغات</p>
    <div class="filter-group my-3">
        @foreach($projectLanguages as $projectLanguage)
        <div class="form-check my-3">
            <input class="form-check-input" @if(  in_array($projectLanguage->id ,request()->lang ?? [])   ) checked @endif name="lang[]"  type="checkbox" value="{{$projectLanguage->id}}" id="lang_{{$projectLanguage->id}}">
            <label class="form-check-label" for="lang_{{$projectLanguage->id}}">
                {{$projectLanguage->title}}
                     </label>
            </div>
        @endforeach
     </div>
</div>
