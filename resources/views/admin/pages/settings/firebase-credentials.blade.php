@extends("admin.layouts.app")

@section("content")
    <form action="{{route('admin.settings.firebase-credentials.update', 1)}}" method="post">
        @csrf
        @method("PUT")
        <x-card-content>
            <x-card-header :title='__("Update Firebase Credentials")'/>
            <x-card.body>
                <x-text-input required title="FCM Key"  name="fcm_key" :model="$gs" />
                <x-text-input required title="Api Key"  name="firebase_api_key" :model="$gs" />
                <x-text-input required title="Auth Domain"  name="firebase_auth_domain" :model="$gs" />
                <x-text-input required title="Database Url" type="url"  name="firebase_database_url" :model="$gs" class="mt-3" />
                <x-text-input required title="Project Id"  name="firebase_project_id" :model="$gs" class="mt-3" />
                <x-text-input required title="Storage Bucket"  name="firebase_storage_bucket" :model="$gs" class="mt-3" />
                <x-text-input required title="Messaging Sender Id"  name="firebase_messaging_sender_id" :model="$gs" class="mt-3" />
                <x-text-input required title="App Id"  name="firebase_app_id" :model="$gs" class="mt-3" />
        
            </x-card.body>
            <x-card.footer>
                <x-indicator-btn/>
            </x-card.footer>
        </x-card-content>
    </form>
@endsection
