<?php

namespace Database\Factories;

use App\AircraftStatus;
use App\Models\Aircraft;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Aircraft>
 */
class AircraftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    function generateRegistration(): string {
        $registration = 'D-' . fake()->unique()->regexify('[A-Z]{4}');
        
        while (!Aircraft::where('registration', '=', $registration)){
            $registration = 'D-' . fake()->unique()->regexify('[A-Z]{4}');
        }

        return $registration;
    }

    public function definition(): array
    {
        return [
            'status' => AircraftStatus::AVAILABLE,
            'type_id' => Type::inRandomOrder()->value('id'),
            'registration' => $this->generateRegistration(),
        ];
    }
}
