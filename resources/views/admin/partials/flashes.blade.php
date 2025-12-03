@if(Session::get("error"))
    <script>
        toastr.error('{{Session::get("error")}}')
    </script>
@endif
@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <script>
            toastr.error('{{$error}}')
        </script>
    @endforeach
@endif
@if(Session::get("success"))
    <script>
        toastr.success('{{Session::get("success")}}')
    </script>
@endif
@if(Session::get("status"))
    <script>
        toastr.success('{{Session::get("status")}}')
    </script>
@endif
@if(Session::get("info"))
    <script>
        toastr.info('{{Session::get("info")}}')
    </script>
@endif
