<div class="my-3">
    <p class="fw-bold">التخصص الدقيق</p>
    <div class="filter-group my-3">
        @foreach($spcialcategories as $spcialcategory)
        <div class="form-check my-3">
            <input class="form-check-input" @if(  in_array($spcialcategory->id ,request()->spcialcategory ?? [])   ) checked @endif name="spcialcategory[]"  type="checkbox" value="{{$spcialcategory->id}}" id="lang_{{$spcialcategory->id}}">
            <label class="form-check-label" for="fieled_{{$spcialcategory->id}}">
                {{$spcialcategory->title}}
                     </label>
            </div>
        @endforeach
     </div>
</div>
