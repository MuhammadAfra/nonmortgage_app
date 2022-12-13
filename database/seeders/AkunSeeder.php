<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin 1',
                'level' => 'Admin',
                'email' => 'admin1@reliance.com',
                'password' => bcrypt('relianceadmin1'),
            ],
            [
                'name' => 'Admin 2',
                'level' => 'Admin',
                'email' => 'admin2@reliance.com',
                'password' => bcrypt('relianceadmin2'),
            ],
            [
                'name' => 'User 1',
                'level' => 'User',
                'email' => 'user@gmail.com',
                'password' => bcrypt('userreliance'),
            ]
        ];

        foreach ($users as $key => $value){
            User::create($value);
        }
    }
}
