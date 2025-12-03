<?php

namespace App\Http\Requests\Admin\Settings;

use Illuminate\Foundation\Http\FormRequest;

class BasicInformationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'second_email' => "nullable|string",
            'second_phone' => "nullable|string",
            'twitter_link' => "nullable|string",
            'instagram_link' => "nullable|string",
            'linkedin_link' => "nullable|string",
            'snapchat_link' => "nullable|string",
            'tiktok_link' => "nullable|string",
            'vat'       => 'numeric'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
