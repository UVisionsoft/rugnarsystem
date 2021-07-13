<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            ActivitiesSeeder::class,
            VaccinesSeeder::class,
            FactionsSeeder::class,
            DogsSeeder::class,
            ServicesSeeder::class,
            // PermissionsSeeder::class,
            // RolesSeeder::class,
        ]);
    }
}
