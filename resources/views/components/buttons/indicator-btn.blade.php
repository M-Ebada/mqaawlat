<button type="submit" {{$attributes->merge(["class" => "btn btn-sm btn-" . $type ?? 'primary' . " "])}}>
    <span class="indicator-label">{{$title ?? (isset($isUpdateAction) && $isUpdateAction ? __("Update Details") : __("Save Details"))}}</span>
    <span class="indicator-progress">{{__("Please wait")}}...
        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
    </span>
</button>
