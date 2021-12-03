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
         \App\Models\Product::factory(100)->create();
         $seeder = new \Database\Seeders\ConditionsSeeder();
         $seeder->run();     
         \App\Models\ProductCondition::factory(300)->create();
    }
}
