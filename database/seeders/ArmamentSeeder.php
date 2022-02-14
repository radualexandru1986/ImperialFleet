<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArmamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('armaments')->insert(['title' => 'Flank Gun', 'qty'=>100]);
        DB::table('armaments')->insert(['title' => 'Turbo Laser', 'qty'=>60]);
        DB::table('armaments')->insert(['title' => 'Tractor Beam', 'qty'=>70]);
        DB::table('armaments')->insert(['title' => 'Ion Canons', 'qty'=>80]);
        DB::table('armaments')->insert(['title' => 'Proton Canons', 'qty'=>50]);
    }
}
