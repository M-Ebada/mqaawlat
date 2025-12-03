<?php

namespace App\Http\Resources\GeneralSetting;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GeneralSettingResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "title" => $this->resource->title,
            "description" => $this->resource->description,
            "address" => $this->resource->address,
            "first_email" => $this->resource->first_email,
            "second_email" => $this->resource->second_email,
            "first_phone" => $this->resource->first_phone,
            "whatsapp_phone" => $this->resource->whatsapp_phone,
            "second_phone" => $this->resource->second_phone,
            "facebook_link" => $this->resource->facebook_link,
            "twitter_link" => $this->resource->twitter_link,
            "instagram_link" => $this->resource->instagram_link,
            "ad_cost" => $this->resource->ad_cost,
            "platform_status" => $this->resource->platform_status,
            "apple_store_link" => $this->resource->apple_store_link,
            "google_play_link" => $this->resource->google_play_link,
            "mobile_version" => (string)env("MOBILE_VERSION", 1.0),
            "must_update" => env("MUST_UPDATE", true)
        ];
    }
}
