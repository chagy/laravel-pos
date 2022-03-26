<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubDistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = 'database/sql/sub_districts.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Sub District table seeded!');
    }
}
