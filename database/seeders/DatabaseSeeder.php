<?php

namespace Database\Seeders;

use App\Models\Armament;
use App\Models\Ship;
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
        Ship::factory(10)->hasAttached(
            Armament::factory()->count(4)
        )->create();
    }
}
