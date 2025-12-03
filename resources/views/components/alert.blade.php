<div>


    @if (\Session::get('msg') )
    <div class="alert alert-success">  {{ \Session::get('msg') }}</div>

    @endif

    @if (\Session::get('error') )
    <div class="alert alert-danger">  {{ \Session::get('error') }}</div>

    @endif

    @if (\Session::get('errors'))

        <div class="alert alert-danger">
            @foreach ($errors->all() as $key => $error)
            {{ $error }} <br>
            @endforeach
        </div>

    @endif

</div>
