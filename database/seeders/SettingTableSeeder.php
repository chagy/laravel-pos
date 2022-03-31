<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'sett_name' => 'POS NAME',
            'sett_phone' => '00-0000-0000',
            'sett_tax_id' => '0-0000-00000-00-0',
            'sett_vat' => 7,
            'sett_owner' => 'Onwer POS',
        ]);
    }
}
