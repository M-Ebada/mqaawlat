<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionAndRoleSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            [
                "title" => [
                    'ar' => "الإعدادات العامة",
                    'en' => "General Settings"
                ],
                "name" => "settings",
            ],
            [
                "title" => [
                    'ar' => "",
                    'en' => "Roles"
                ],
                "name" => "roles",
            ],
            [
                "title" => [
                    'ar' => "",
                    'en' => "Staff Members"
                ],
                "name" => "employees",
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::query()->create([
                "title" => $permission["title"],
                "name" => $permission["name"],
                "guard_name" => "admin"
            ]);
        }

        $role = Role::query()->create([
            "title" => [
                "ar" => "الأدمن الرئيسي",
                "en" => "Super admin"
            ],
            "name" => "super-admin",
            "guard_name" => "admin"
        ]);

        $role->syncPermissions(Permission::query()->get()->pluck("name"));
    }
}
