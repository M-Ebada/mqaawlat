<?php

namespace App\Http\Requests\Admin\Profile;

use App\Core\Support\Image;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "name" => "required|string",
            "email" => "required|email|unique:admins,email," . Auth::id(),
            "username" => "required|alpha_dash|unique:admins,username," . Auth::id(),
            "image" => Image::imageRules(true)
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
