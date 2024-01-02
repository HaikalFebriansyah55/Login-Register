<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class dummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'User',
                'username' => 'user',
                "email"=>"user@gmail.com",
                'role'=>"user",
                'password'=>bcrypt("users"),
                'img'=>'default.png'
            ],
            [
                'name' => 'Admin',
                'username' => 'admin',
                "email"=>"admin@gmail.com",
                'role'=>"admin",
                'password'=>bcrypt("admin"),
                'img'=>'default.png'
            ]
        ];
        foreach($userData as $key=>$val){
            User::create($val);
        }
    }
}
