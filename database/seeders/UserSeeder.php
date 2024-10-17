<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run()
    {
        // Create a default user
        User::updateOrCreate([
            'email' => 'admin@developer.com',
        ], [
            'name' => 'Admin',
            'email' => 'admin@developer.com',
            'password' => Hash::make('Pass@786'),
            'role' => 'admin',
        ]);

        Plan::updateOrCreate(
            [
                'name' => 'pro',
            ],
            [
                'price' => 100,
                'duration' => 'month',

            ]);
        Plan::updateOrCreate(
            [
                'name' => 'expert',
            ],
            [

                'price' => 120,
                'duration' => 'month',

            ]);

        // You can add more users or customize the user creation as needed
    }
}
