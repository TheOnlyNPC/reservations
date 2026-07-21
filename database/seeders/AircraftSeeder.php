<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB, Carbon\Carbon;

class AircraftSeeder extends Seeder
{
    

    public function run(): void
    {
        $faker = Faker::create();
        $aircraftTypes = ['DR400', 'FK9', 'FK14', 'C172', 'C152', 'PA28'];

        foreach (range (1, 5) as $index) {
            DB::table('aircrafts')->insert([
                'name' => $faker->randomElement($aircraftTypes),
                'seats' => $faker->numberBetween(2,6),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                
            ]);
        }
        
    }
}
