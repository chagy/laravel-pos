<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProvinceTableSeeder::class,
            DistrictTableSeeder::class,
            SubDistrictTableSeeder::class,
            UserTableSeeder::class,
            RolePermissionSeeder::class,
            CategoryTableSeeder::class,
            ProductTableSeeder::class
        ]);
    }
}
