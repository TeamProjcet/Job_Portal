<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Frontendmanage;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UserTableSeeder::class);
        $this->call(ModuleTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(FrontendTableSeeder::class);
        $this->call(JobTableSeeder::class);
    }
}
