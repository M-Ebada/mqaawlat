@extends("admin.layouts.app")

@section('css')
<style>
.banner-container{
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 18px
}
</style>
@endsection

@section("content")
    <form action="{{route('admin.settings.privacy.save')}}" method="post">
        @csrf
        <x-card-content>
            <x-card-header :title='__("Update Basics Information")'/>
            <x-card.body>
                <x-inputs.select-lang/>
                <x-wysiwyg-input
                    translated-input
                    name="privacy"
                    class="mt-5"
                    :title="__('privacy')"
                    :col="12"
                    :model="$gs"
                />
            </x-card.body>
            <x-card.footer>
                <x-indicator-btn/>
            </x-card.footer>
        </x-card-content>
    </form>

@endsection

@section('scripts')
<script src="{{ asset("ckeditor/ckeditor.js") }}"></script>
<script src="{{ asset("ckfinder/ckfinder.js") }}"></script>
<script>

$(".wysiwyg-input").each(function(){
    let id = $(this).attr("id");
    var editor = CKEDITOR.replace(id);
    CKFinder.setupCKEditor( editor );
})

</script>
@endsection