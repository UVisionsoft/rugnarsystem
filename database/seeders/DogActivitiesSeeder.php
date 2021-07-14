<?php

namespace Database\Seeders;

use App\Models\ActivitySession;
use App\Models\DogActivity;
use Illuminate\Database\Seeder;

class DogActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DogActivity::create([
            'dog_id' => 1,
            'activity_id' => 1,
            'duration' => 30,
        ]);

        DogActivity::create([
            'dog_id' => 1,
            'activity_id' => 2,
            'duration' => 30,
        ]);

        ActivitySession::create([
            'dog_activity_id' => 1,
            'trainer_id' => '2',
            'duration' => 10,
            'status' => 1,
        ]);

        ActivitySession::create([
            'dog_activity_id' => 1,
            'trainer_id' => '2',
            'duration' => 5,
            'status' => 1,
        ]);

        ActivitySession::create([
            'dog_activity_id' => 2,
            'trainer_id' => '2',
            'duration' => 15,
            'status' => 1,
        ]);

    }
}
