<?php

namespace Database\Seeders;

use App\Models\Dog;
use Illuminate\Database\Seeder;

class DogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dog::create([
           'name' => 'الكلب الاول',
            'age' => 1,
            'registration_num' => 'reg-no-1',
            'user_id' => 3,
            'faction_id' => 1,
        ]);

        Dog::create([
           'name' => 'الكلب الثاني',
            'age' => 1,
            'registration_num' => 'reg-no-2',
            'user_id' => 3,
            'faction_id' => 2,
        ]);
    }
}
