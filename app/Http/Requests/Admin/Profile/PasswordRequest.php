<?php

namespace App\Http\Requests\Admin\Profile;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "current_password" => "required|current_password:admin",
            "password" => "required|confirmed|min:6"
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
