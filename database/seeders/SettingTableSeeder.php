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
            ['key' => 'softlogo', 'value' => '/uploads/imgpsh_fullsize_anim.png'],
            ['key' => 'APP_NAME', 'value' => 'Job Portal'],
            ['key' => 'MAIL_MAILER', 'value' => 'smtp'],
            ['key' => 'MAIL_HOST', 'value' => 'smtp.gmail.com'],
            ['key' => 'MAIL_PORT', 'value' => '587'],
            ['key' => 'MAIL_USERNAME', 'value' => 'smshimonahamed06@gmail.com'],
            ['key' => 'MAIL_PASSWORD', 'value' => 'rlqtikplmixzjupd'],
            ['key' => 'MAIL_ENCRYPTION', 'value' => 'tls'],
            ['key' => 'MAIL_FROM_ADDRESS', 'value' => 'smshimonahamed06@gmail.com'],
            ['key' => 'jobPost', 'value' => 1],
            ['key' => 'blogPost', 'value' => 1],
        ];

        Setting::truncate();
        Setting::insert($arrsetting);
    }
}
