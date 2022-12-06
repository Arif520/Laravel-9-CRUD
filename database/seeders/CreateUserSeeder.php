<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
               'name'=>'Admin User',
               'email'=>'admin@admin.com',
               'type'=>1,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Custom User',
               'email'=>'customer@customer.com',
               'type'=> 2,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'User',
               'email'=>'user@user.com',
               'type'=>0,
               'password'=> bcrypt('123456'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
