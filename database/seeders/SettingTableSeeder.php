<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $arrsetting = [
            ['key' => 'APP_NAME', 'value' => 'Job Portal'],
            ['key' => 'MAIL_MAILER', 'value' => 'smtp'],
            ['key' => 'MAIL_HOST', 'value' => 'smtp.gmail.com'],
            ['key' => 'MAIL_PORT', 'value' => '587'],
            ['key' => 'MAIL_USERNAME', 'value' => 'smshimonahamed06@gmail.com'],
            ['key' => 'MAIL_PASSWORD', 'value' => 'rlqtikplmixzjupd'],
            ['key' => 'MAIL_ENCRYPTION', 'value' => 'tls'],
            ['key' => 'MAIL_FROM_ADDRESS', 'value' => 'smshimonahamed06@gmail.com'],
            ['key' => 'softlogo', 'value' => '/uploads/Screenshot%20from%202024-10-13%2015-41-42.png'],
        ];

        Setting::truncate();
        Setting::insert($arrsetting);
    }
}
