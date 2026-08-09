<?php

namespace Database\Seeders;

use App\AircraftStatus;
use App\Models\Aircrafts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AircraftSeeder extends Seeder
{
    

    public function run(): void
    {
        Aircrafts::updateOrCreate(
        ['id' => 1,]
        ,[
            'type_id' => '2',
            'status' => AircraftStatus::GROUNDED,
            'registration' => 'D-MHZB'
        ]);

        Aircrafts::updateOrCreate(        
        ['id' => 2],
        [
            'type_id' => '1',
            'status' => AircraftStatus::AVAILABLE,
            'registration' => 'D-KASE'
        ]);

        Aircrafts::updateOrCreate(        
        ['id' => 3],
        [
            'type_id' => '1',
            'status' => AircraftStatus::MAINTENANCE,
            'registration' => 'D-EAGZ'
        ]);
    }
}
