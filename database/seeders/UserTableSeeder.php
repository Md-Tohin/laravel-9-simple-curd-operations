<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'admin', 'email' => 'admin@gamil.com', 'password'=> md5(12345678)],
            ['name' => 'Kamal', 'email' => 'kamal@gamil.com', 'password'=> md5(12345678)],
            ['name' => 'Jamal', 'email' => 'jamal@gamil.com', 'password'=> md5(12345678)],
            ['name' => 'Robin', 'email' => 'robin@gamil.com', 'password'=> md5(12345678)],
            ['name' => 'Hasib', 'email' => 'hasib@gamil.com', 'password'=> md5(12345678)],
        ];

        User::insert($users);
    }
}
