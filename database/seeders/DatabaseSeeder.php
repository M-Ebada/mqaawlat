<?php

namespace Database\Seeders;

use Artisan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionAndRoleSeeder::class);
        $this->call(GeneralSettingSeeder::class);
        $this->call(AdminSeeder::class);

        Artisan::call("remove");
    }
}
