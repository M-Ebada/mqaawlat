@extends("admin.layouts.app")
@php
$permissionGroups = [];
@endphp

@section('css')
<style>
.group-title{
    font-weight: bold;
    margin-bottom: 15px;
    font-size: 21px;
    color: #02b0f1;
    margin-top:18px;
    cursor: pointer;
}
</style>
@endsection

@section("content")
    <form action="{{route('admin.role.update', $role->id)}}" method="post">
        @csrf
        @method("PUT")
        <x-card-content>
            <x-card-header :title="__('Update role') . ' - ' . $role->title" :back-btn-route="route('admin.role.index')"/>
            <x-card.body>
                <!-- <x-inputs.select-lang /> -->
                <x-text-input required :title="__('Role Title')"  name="title" :model="$role" :is-translatable-input="true" />

                <div class="col-md-12 mt-10"></div>

                <div class="d-flex align-items-center mb-10">
                    <button type="button" class="btn btn-light-primary check-all me-5">
                        {{__("Check All")}}
                    </button>
                    <button type="button" class="btn btn-light-danger uncheck-all">
                        {{__("UnCheck All")}}
                    </button>
                </div>

                @foreach(App\Models\Permission::query()->get() as $permission)
                @php
                    if(!in_array($permission->group, $permissionGroups)){
                        echo '<div class="group-title" data-group="' . $permission->group . '">'. __($permission->group) .'</div>';
                        $permissionGroups[] = $permission->group;
                    }
                @endphp
                <div class="col-md-6 mb-5">
                    <div class="d-flex align-items-center">
                        <span class="bullet bullet-vertical h-40px bg-success"></span>
                        <div class="form-check form-check-custom form-check-solid mx-5">
                            <input data-group="{{$permission->group}}" id="feature_{{$permission->name}}" {{in_array($permission->name, $role->permissions()->pluck("name")->toArray())  ? "checked" : ""}} class="form-check-input" type="checkbox" name="permissions[]" value="{{$permission->name}}">
                        </div>
                        <div class="flex-grow-1">
                            <label for="feature_{{$permission->name}}" style="cursor: pointer;" class="text-gray-800 text-hover-primary fw-bolder fs-6">{{$permission->title}}</label>
                        </div>
                    </div>
                </div>
                @endforeach
            </x-card.body>
            <x-card.footer>
                <x-indicator-btn :is-update-action="true" />
            </x-card.footer>
        </x-card-content>
    </form>
@endsection


@section('scripts')
<script>
    $(".check-all").on("click" , function(){
        $("input[name='permissions[]']").prop("checked", true);
    })
    $(".uncheck-all").on("click" , function(){
        $("input[name='permissions[]']").prop("checked", false);
    })

    $(".group-title").on("click" , function(){
        let currentState = $(this).attr("data-state");
        let group = $(this).attr("data-group");
        if(currentState == 'checked'){
            $("input[data-group='"+ group +"']").prop("checked" , false);
            $(this).attr("data-state", 'unchecked');
            return;
        }
        $("input[data-group='"+ group +"']").prop("checked" , true);
            $(this).attr("data-state", 'checked');
    })
</script>
@endsection