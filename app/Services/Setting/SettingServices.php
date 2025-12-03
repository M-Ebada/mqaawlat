<?php

namespace App\Services\Setting;

use App\Core\Support\Image;
use App\Enums\GeneralSettingEnum;
use App\Models\GeneralSetting;
use DB;

class SettingServices
{

    public function settings(): GeneralSetting
    {
        return GeneralSetting::query()->first();
    }

    public function updateBasicInformation($request): void
    {

        DB::transaction(function () use ($request) {


            $this->settings()->update([
                "title" => $request->title,
                "description" => $request->description,
                "address" => $request->address,
                "first_email" => $request->first_email,
                "second_email" => $request->second_email,
                "first_phone" => $request->first_phone,
                "second_phone" => $request->second_phone,
                "twitter_link" => $request->twitter_link,
                "instagram_link" => $request->instagram_link,
                "linkedin_link" => $request->linkedin_link,
                "snapchat_link" => $request->snapchat_link,
                "facebook_link" => $request->facebook_link,
                "tiktok_link" => $request->tiktok_link,
                "whatsapp_phone" => $request->whatsapp_phone,
                "location" => $request->location,
            ]);

        });
    }


    public function updateFirebaseCredentials($request): void
    {
        DB::transaction(function () use ($request) {

            $this->settings()->update([
                "fcm_key" => $request->fcm_key,
                "firebase_api_key" => $request->firebase_api_key,
                "firebase_auth_domain" => $request->firebase_auth_domain,
                "firebase_database_url" => $request->firebase_database_url,
                "firebase_project_id" => $request->firebase_project_id,
                "firebase_storage_bucket" => $request->firebase_storage_bucket,
                "firebase_messaging_sender_id" => $request->firebase_messaging_sender_id,
                "firebase_app_id" => $request->firebase_app_id,
            ]);

        });
    }

    public function updateWebsiteImage($request): void
    {
        DB::transaction(function () use ($request) {
            Image::updateImage(
                model: $this->settings(),
                imageRequest: $request->main_logo,
                collection: GeneralSettingEnum::LOGO_COLLECTION->name
            );
            Image::updateImage(
                model: $this->settings(),
                imageRequest: $request->favicon,
                collection: 'favicon'
            );

        });
    }

    public function updateHomepage($request): void
    {

        DB::transaction(function () use ($request) {

            $gs = $this->settings();
            $gs->update([
                'banner_1_text' => $request->banner_1_text,
                'banner_2_text' => $request->banner_2_text,
                'banner_3_text' => $request->banner_3_text,
                'banner_4_text' => $request->banner_4_text,
                'banner_1_desc' => $request->banner_1_desc,
                'banner_2_desc' => $request->banner_2_desc,
                'banner_3_desc' => $request->banner_3_desc,
                'banner_4_desc' => $request->banner_4_desc,
                'enable_1_banner' => $request->boolean('enable_1_banner'),
                'enable_2_banner' => $request->boolean('enable_2_banner'),
                'enable_3_banner' => $request->boolean('enable_3_banner'),
                'enable_4_banner' => $request->boolean('enable_4_banner'),
            ]);

            if ($request->hasFile("home1")) {
                Image::updateImage($gs, $request->home1, 'home1');
            }
            if ($request->hasFile("home2")) {
                Image::updateImage($gs, $request->home2, 'home2');
            }
            if ($request->hasFile("home3")) {
                Image::updateImage($gs, $request->home3, 'home3');
            }
            if ($request->hasFile("home4")) {
                Image::updateImage($gs, $request->home4, 'home4');
            }

        });
    }
}
