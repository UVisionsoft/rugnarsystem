<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'name' => 'الخدمة الاولي'
        ]);

        Service::create([
            'name' => 'الخدمة الثانية'
        ]);
    }
}
