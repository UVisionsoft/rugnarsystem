<?php

namespace Database\Seeders;

use App\Models\Vaccine;
use Illuminate\Database\Seeder;

class VaccinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vaccine::create([
            'name'=> 'المصل الاول',
        ]);

        Vaccine::create([
            'name'=> 'المصل الثاني',
        ]);

    }
}
