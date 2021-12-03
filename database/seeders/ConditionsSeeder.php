<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConditionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conditions')->insert([
            [
                'name' => 'clear'
            ],
            [
                'name' => 'isolated-clouds'
            ],
            [
                'name' => 'scattered-clouds'
            ],
            [
                'name' => 'overcast'
            ],
            [
                'name' => 'light-rain'
            ],
            [
                'name' => 'moderate-rain'
            ],
            [
                'name' => 'heavy-rain'
            ],
            [
                'name' => 'sleet'
            ],
            [
                'name' => 'light-snow'
            ],
            [
                'name' => 'moderate-snow'
            ],
            [
                'name' => 'heavy-snow'
            ],
            [
                'name' => 'fog'
            ],
            [
                'name' => 'na'
            ],
        ]);
    }
}
