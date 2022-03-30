<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'              => "Admin",
            'email'             => "admin@mail.com",
            'email_verified_at' => null,
            'username'          => "admin",
            'password'          => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            'remember_token'    => null,
            'phone'             => '00-0000-0000',
            'address'           => '000',
            'province_id'       => 1,
            'district_id'       => 1,
            'sub_district_id'   => 1,
            'avatar'            => null,
            'type'              => 1,
        ]);

        $employee = User::create([
            'name'              => "Employee",
            'email'             => "employee@mail.com",
            'email_verified_at' => null,
            'username'          => "employee",
            'password'          => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            'remember_token'    => null,
            'phone'             => '00-0000-0001',
            'address'           => '001',
            'province_id'       => 1,
            'district_id'       => 1,
            'sub_district_id'   => 1,
            'avatar'            => null,
            'type'              => 1,
        ]);

        $customer = User::create([
            'name'              => "Customer",
            'email'             => "customer@mail.com",
            'email_verified_at' => null,
            'username'          => "customer",
            'password'          => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            'remember_token'    => null,
            'phone'             => '00-0000-0002',
            'address'           => '002',
            'province_id'       => 1,
            'district_id'       => 1,
            'sub_district_id'   => 1,
            'avatar'            => null,
            'type'              => 2,
        ]);

        $customer2 = User::create([
            'name'              => "Guest",
            'email'             => "customer@mail.com",
            'email_verified_at' => null,
            'username'          => "guest",
            'password'          => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            'remember_token'    => null,
            'phone'             => '00-0000-0002',
            'address'           => '002',
            'province_id'       => 1,
            'district_id'       => 1,
            'sub_district_id'   => 1,
            'avatar'            => null,
            'type'              => 2,
        ]);

        $this->command->info('User table seeded!');
    }
}
