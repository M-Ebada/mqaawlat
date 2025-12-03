@extends("admin.layouts.app")

@section("content")
    <form action="{{route('admin.profile.update', Auth::id())}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <x-card-content>
            <x-card-header :title='__("Profile Details")'/>
            <x-card-body>
                <div class="col-md-12 text-center mx-auto">
                    <x-avatar-image :image="Auth::user()->profile_image" />
                </div>
                <x-text-input name="name" required :model="Auth::user()" :title="__('Name')"/>
                <x-text-input name="username" required :model="Auth::user()" :title="__('Username')"/>
                <x-text-input name="email" required :model="Auth::user()" :title="__('Email')"/>
            </x-card-body>
            <x-card-footer>
                <x-indicator-btn :title="__('Update Changes')"/>
            </x-card-footer>
        </x-card-content>
    </form>

    <form action="{{route('admin.password.update', Auth::id())}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <x-card-content>
            <x-card-header :title='__("Update Account Password")'/>
            <x-card-body>
                <x-text-input name="current_password" type="password" required :title="__('Current Password')"/>
                <x-text-input name="password" type="password" required :title="__('Password')"/>
                <x-text-input name="password_confirmation" type="password" required :title="__('Password Confirmation')"/>
            </x-card-body>
            <x-card-footer>
                <x-indicator-btn :title="__('Update Password')"/>
            </x-card-footer>
        </x-card-content>
    </form>
@endsection
