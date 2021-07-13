<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::create([
            'name' => 'تدريب السباحة',
            'description' => 'وصف تدريب السباحة',
            'url' => 'https://www.google.com/',
        ]);

        Activity::create([
            'name' => 'تدريب الشراسة',
            'description' => 'وصف تدريب الشراسة',
            'url' => 'https://www.google.com/',
        ]);
    }
}
