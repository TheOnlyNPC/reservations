<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::updateOrCreate(
        ['name' => 'DR400',]
        ,[
            'seats' => 4,
            'fuel_capacity' => 240
        ]);

        Type::updateOrCreate(        
        ['name' => 'FK9'],
        [
            'seats' => 2,
            'fuel_capacity' => 60
        ]);
    }
}
