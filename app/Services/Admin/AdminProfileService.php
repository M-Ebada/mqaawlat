<?php

namespace App\Services\Admin;

use App\Core\Support\Image;
use App\Enums\AdminEnum;
use App\Models\Admin;
use Auth;
use DB;
use Hash;

class AdminProfileService
{
    public function updateAdminProfile($request): Admin
    {
        return DB::transaction(function () use ($request) {

            $admin = Auth::user();

            $admin->update([
                "name" => $request->name,
                "email" => $request->email,
                "username" => $request->username,
            ]);

            Image::updateImage($admin, $request->image, AdminEnum::ADMIN_PROFILE_IMAGE_COLLECTION->name);

            $admin->refresh();

            return $admin;

        });
    }

    public function updateAdminPassword($request): Admin
    {
        return DB::transaction(function () use ($request) {

            $admin = Auth::user();

            $admin->update([
                "password" => Hash::make($request->password),
            ]);

            $admin->refresh();

            return $admin;

        });
    }
}
