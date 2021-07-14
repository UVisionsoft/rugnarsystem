<?php

namespace Database\Seeders;

use App\Models\DogVaccines;
use Illuminate\Database\Seeder;

class DogVaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DogVaccines::create([
           'dog_id' => 1,
            'vaccine_id' => 1,
            'status' => 1,
            'user_id' => 4,
        ]);

        DogVaccines::create([
           'dog_id' => 1,
            'vaccine_id' => 2,
            'status' => 1,
            'user_id' => 4,
        ]);

        DogVaccines::create([
           'dog_id' => 2,
            'vaccine_id' => 2,
            'status' => 1,
            'user_id' => 4,
        ]);
    }
}
