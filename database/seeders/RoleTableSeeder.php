<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrUser=[
            ['name'=> 'Super Admin',],
            ['name'=> 'Admin',],
            ['name'=> 'Editor',],
            ['name'=> 'Employer',],

        ];

        Role::truncate();
        Role::insert($arrUser);
    }
}
