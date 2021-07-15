<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \App\Models\User::factory(10)->create();

        User::create([
            'name'              => 'Admin Demo',
            'email'             => 'demo@demo.com',
            'password'          => Hash::make('demo'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name'              => 'Trainer',
            'email'             => 'trainer@demo.com',
            'password'          => bcrypt(123456),
            'email_verified_at' => now(),
            'type'              => 1,
        ]);

        User::create([
            'name'              => 'User',
            'email'             => 'user@demo.com',
            'password'          => bcrypt(123456),
            'email_verified_at' => now(),
            'type'              => 2,
        ]);

        User::create([
            'name'              => 'Doctor',
            'email'             => 'doctor@demo.com',
            'password'          => bcrypt(123456),
            'email_verified_at' => now(),
            'type'              => 3,
        ]);

        User::create([
            'name'              => 'Vendor',
            'email'             => 'vendor@demo.com',
            'password'          => bcrypt(123456),
            'email_verified_at' => now(),
            'type'              => 4,
            'credit'            => -1000,
        ]);

    }
}
