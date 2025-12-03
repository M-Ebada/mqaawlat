<?php

namespace App\Core\Support;

use App\Models\GeneralSetting;
use Cache;

class Settings
{
    public static function get($key)
    {
        return self::settings($key);
    }

    private static function settings($key)
    {
        return self::getAll()[$key];
    }

    public static function getAll()
    {
        return GeneralSetting::query()->first();

        if (Cache::has("general_setting")) {

            return Cache::get("general_setting");

        } else {

            return Cache::remember("general_setting", now()->addDays(2), function () {

                return GeneralSetting::query()->first();

            });

        }
    }

    public static function deleteCache(): void
    {
        Cache::delete("general_setting");
    }
}
