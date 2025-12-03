<?php

namespace Database\Seeders;

use App\Enums\AdminEnum;
use App\Models\Admin;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Admin::query()->create([
            "username" => "admin",
            "name" => "admin",
            "status" => true,
            "email" => "admin@admin.com",
            "password" => Hash::make("admin"),
            "email_verified_at" => Carbon::now(),
        ]);

        $admin->addMedia(public_path("logo.png"))->preservingOriginal()->toMediaCollection(AdminEnum::ADMIN_PROFILE_IMAGE_COLLECTION->name);

        $admin->assignRole(Role::query()->first());

    }
}
