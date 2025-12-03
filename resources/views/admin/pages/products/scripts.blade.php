
<script src="{{ asset("ckeditor/ckeditor.js") }}"></script>
<script src="{{ asset("ckfinder/ckfinder.js") }}"></script>

<script>

    var editors = document.querySelectorAll('.kt_docs_ckeditor_classic');

    editors.forEach(function(element) {
        var editor = CKEDITOR.replace(element);
        CKFinder.setupCKEditor(editor);
    });

</script>