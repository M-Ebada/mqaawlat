<?php

namespace App\Http\Requests\Admin\Settings;

use Illuminate\Foundation\Http\FormRequest;

class FirebaseCredentialsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "fcm_key" => "required|string",
            "firebase_api_key" => "required|string",
            "firebase_auth_domain" => "required|string",
            "firebase_database_url" => "required|string|url",
            "firebase_project_id" => "required|string",
            "firebase_storage_bucket" => "required|string",
            "firebase_messaging_sender_id" => "required|string",
            "firebase_app_id" => "required|string",
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
