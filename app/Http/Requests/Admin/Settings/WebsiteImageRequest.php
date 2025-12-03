<?php

namespace App\Http\Requests\Admin\Settings;

use App\Core\Support\Image;
use Illuminate\Foundation\Http\FormRequest;

class WebsiteImageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "main_logo" => Image::imageRules(true),
            "client_default_image" => Image::imageRules(true),
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
