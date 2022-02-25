<?php

namespace Database\Seeders;

use App\Models\User;
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
        //User Table Seeder
        $userRecords = [
            [
                'id'        => 1,
                'username'  => 'superadmin',
                'firstname' => 'Super',
                'lastname'  => 'Admin',
                'email'     => 'admin@gmail.com',
                'phone'     => '123456',
                'password'  => Hash::make('12345'),
                'is_active' => 1,
                'user_role' => 'superadmin',
            ],
        ];
        //Insert User
        User::insert($userRecords);
    }
}