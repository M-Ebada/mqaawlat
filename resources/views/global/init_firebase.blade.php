var firebaseConfig = {
    apiKey: "{{$generalSetting->firebase_api_key}}",
    authDomain: "{{$generalSetting->firebase_auth_domain}}",
    databaseURL: "{{$generalSetting->firebase_database_url}}",
    projectId: "{{$generalSetting->firebase_project_id}}",
    storageBucket: "{{$generalSetting->firebase_storage_bucket}}",
    messagingSenderId: "{{$generalSetting->firebase_messaging_sender_id}}",
    appId: "{{$generalSetting->firebase_app_id}}"
};

firebase.initializeApp(firebaseConfig);
