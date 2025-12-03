<div class="my-3">
    <p class="fw-bold">المجالات</p>
    <div class="filter-group my-3">
        @foreach($fields as $field)
        <div class="form-check my-3">
            <input class="form-check-input" @if(  in_array($field->id ,request()->fields ?? [])   ) checked @endif name="fields[]"  type="checkbox" value="{{$field->id}}" id="lang_{{$field->id}}">
            <label class="form-check-label" for="fieled_{{$field->id}}">
                {{$field->title}}
                     </label>
            </div>
        @endforeach
     </div>
</div>

