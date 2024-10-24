<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $arrUser=[
            [
                'name'=> 'Mohon Sarker',
                'email'=> 'mohon@gmail.com',
                'password'=> Hash::make('1234'),
                'role_id' => 1,
                'company_id' => 1,
            ],
            [
                'name'=> 'Rabby Hasan',
                'email'=> 'rabby@gmail.com',
                'password'=> Hash::make('1234'),
                'role_id' => 1,
                'company_id' => 1,
            ],
            [
                'name'=> ' Jibon Ahamed',
                'email'=> 'jibon@gmail.com',
                'password'=> Hash::make('1234'),
                'role_id' => 1,
                'company_id' => 1,
            ]
        ];

        User::truncate();
        User::insert($arrUser);
        }

}
