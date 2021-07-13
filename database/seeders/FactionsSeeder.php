<?php

namespace Database\Seeders;

use App\Models\Faction;
use Illuminate\Database\Seeder;

class FactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faction::create([
            'name' => 'الفصيلة الاولي',
        ]);

        Faction::create([
            'name' => 'الفصيلة الثانية',
        ]);

    }
}
