var firebaseConfig = {
    apiKey: "{{\App\Core\Support\Settings::get("firebase_api_key")}}",
    authDomain: "{{\App\Core\Support\Settings::get("firebase_auth_domain")}}",
    databaseURL: "{{\App\Core\Support\Settings::get("firebase_database_url")}}",
    projectId: "{{\App\Core\Support\Settings::get("firebase_project_id")}}",
    storageBucket: "{{\App\Core\Support\Settings::get("firebase_storage_bucket")}}",
    messagingSenderId: "{{\App\Core\Support\Settings::get("firebase_messaging_sender_id")}}",
    appId: "{{\App\Core\Support\Settings::get("firebase_app_id")}}"
};

firebase.initializeApp(firebaseConfig);
