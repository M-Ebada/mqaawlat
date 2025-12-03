<?php

namespace App\Core\Support;

use App\Models\GeneralSetting;
use Config;
use Illuminate\Support\Facades\Log;
use Kutia\Larafirebase\Services\Larafirebase;

class FirebaseNotification
{

    public static function sendFirebaseNotification($device_token, $title, $content): void
    {
        if (!is_null($device_token) && $device_token != "") {
            $gs = GeneralSetting::query()->first();
            Config::set("larafirebase.authentication_key", $gs->fcm_key);
            Log::info($device_token);
            Log::info("Title => " . $title);
            Log::info("Description => " . $content);
            (new Larafirebase())->fromRaw([
                'registration_ids' => [$device_token],
                'priority' => 'high',
                'notification' => [
                    'title' => $title,
                    'body' => $content,
                    "sound" => "default",
                ],
            ])->send();
        }
    }

    public static function sendFirebaseNotificationToTokens($device_token, $title, $content): void
    {
        if (count($device_token) > 0) {
            $gs = GeneralSetting::query()->first();
            Config::set("larafirebase.authentication_key", $gs->fcm_key);
            Log::info(json_encode($device_token));
            Log::info("Title => " . $title);
            Log::info("Description => " . $content);
            (new Larafirebase())->fromRaw([
                'registration_ids' => $device_token,
                'priority' => 'high',
                'notification' => [
                    'title' => $title,
                    'body' => $content,
                    "sound" => "default",
                ],
            ])->send();
        }
    }

}
