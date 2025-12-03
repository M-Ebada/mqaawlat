
<div class="filter-group mt-3">
    @foreach($category as $c)
    <div class="form-check">
        <input @if(  in_array($c->id ,request()->category ?? [])   ) checked @endif  name="category[]" class="form-check-input" type="checkbox" value="{{$c->id}}" id="filter{{$c->id}}">
        <label class="form-check-label" for="filter1">
            {{$c->title}}
        </label>
    </div>
    @endforeach
</div>
