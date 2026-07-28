<?php

namespace Database\Seeders;

use App\Models\Types;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Types::updateOrCreate(
        ['name' => 'DR400',]
        ,[
            'seats' => 4,
            'fuel_capacity' => 240
        ]);

        Types::updateOrCreate(        
        ['name' => 'FK9'],
        [
            'seats' => 2,
            'fuel_capacity' => 60
        ]);
    }
}
