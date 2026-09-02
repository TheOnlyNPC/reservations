<?php

namespace Database\Seeders;

use App\AircraftStatus;
use App\Models\Aircraft;
use Illuminate\Database\Seeder;

class AircraftSeeder extends Seeder
{
    

    public function run(): void
    {
        Aircraft::updateOrCreate(
        ['registration' => 'D-MHZB'],
        [
            'type_id' => 2,
            'status' => AircraftStatus::GROUNDED,
            'registration' => 'D-MHZB'
        ]);

        Aircraft::updateOrCreate(        
        ['registration' => 'D-KASE'],
        [
            'type_id' => 1,
            'status' => AircraftStatus::AVAILABLE,
            'registration' => 'D-KASE'
        ]);

        Aircraft::updateOrCreate(        
        ['registration' => 'D-EAGZ'],
        [
            'type_id' => 1,
            'status' => AircraftStatus::MAINTENANCE,
            'registration' => 'D-EAGZ'
        ]);
    }
}
