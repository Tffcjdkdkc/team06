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
        $this->call(water_supply_statisticsTableSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
