<?php

namespace Database\Seeders;

use App\Enums\GeneralSettingEnum;
use App\Models\GeneralSetting;
use Illuminate\Database\Seeder;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class GeneralSettingSeeder extends Seeder
{
    public function run(): void
    {
        $gs = GeneralSetting::query()->create([
            'title' => ['ar' => 'ورشة لطيفة', 'en' => 'ورشة لطيفة'],
            "description" => ['ar' => 'ورشة لطيفة', 'en' => 'ورشة لطيفة'],
            "address" => ['ar' => 'ورشة لطيفة', 'en' => 'ورشة لطيفة'],

            "first_email" => "mramrahmed456@gmail.com",
            "first_phone" => "+01033677906",
            "whatsapp_phone" => "+01033677906",

            "facebook_link" => "https://facebook.com/amrahmed789",
            "twitter_link" => "https://twitter.com",
            "instagram_link" => "https://instagram.com",
            "linkedin_link" => "https://linkedin.com",
            "snapchat_link" => "https://snapchat.com",
            "tiktok_link" => "https://tiktok.com",

            "fcm_key" => "AAAAbdqnyOI:APA91bGH1MjG7J3HYI37NqZoxrD5SKdx_LpjbwJxnwQNynxJYLM9lxL73gSBVe1dXbxsc4oSZR4dxeOjcim1Ad5d67Qo5qOB_hY8VGn8_YhQ35wEXgm28tCq6B4D_sle0V9FhzoceQum",
            "firebase_api_key" => "AIzaSyD_HRpKqDbki40yKndyAf7_VRdJCSzPk-8",
            "firebase_auth_domain" => "part2car-730d9.firebaseapp.com",
            "firebase_database_url" => "https://part2car-730d9-default-rtdb.firebaseio.com",
            "firebase_project_id" => "part2car-730d9",
            "firebase_storage_bucket" => "part2car-730d9.appspot.com",
            "firebase_messaging_sender_id" => "471819864290",
            "firebase_app_id" => "1:471819864290:web:91440f722caf0b8318f6bb",
        ]);

        try {
            $gs->addMedia(public_path("logo.png"))->preservingOriginal()->toMediaCollection(GeneralSettingEnum::LOGO_COLLECTION->name);
            $gs->addMedia(public_path("logo.png"))->preservingOriginal()->toMediaCollection(GeneralSettingEnum::USER_DEFAULT_IMAGE->name);
        } catch (FileDoesNotExist|FileIsTooBig $e) {
            $this->command->error($e->getMessage());
        }
    }
}
