<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class CreateAdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [

            

            [

               'name'=>'Admin',

               'email'=>'admin@admin.com',

               'password'=> bcrypt('123456'),

            ],

        ];

        foreach ($users as $key => $user) {

            Admin::create($user);

        }
    }
}
