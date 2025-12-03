<?php

namespace App\Helper;

use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Log;
use Kutia\Larafirebase\Services\Larafirebase;

class Firebase
{
    public static function sendNotificationToDeviceToken(string $title, string $body, ?string $device_token = null): void
    {
        if (!$device_token) {
            return;
        }
        $gs = GeneralSetting::query()->first();
        config()->set("larafirebase.authentication_key", $gs->fcm_key);
        Log::info("Title => " . $title);
        Log::info("Body => " . $body);
        Log::info("Device Token => " . $device_token);
        (new Larafirebase())->fromRaw([
            'registration_ids' => [$device_token],
            'priority' => 'high',
            'notification' => [
                'title' => $title,
                'body' => $body,
                "sound" => "default",
            ],
        ])->send();
    }

}
