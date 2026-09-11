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
    public function definition(): array
    {
        return [
            'status' => AircraftStatus::AVAILABLE,
            'type_id' => Type::inRandomOrder()->value('id'),
            'registration' => 'D-' . fake()->regexify('[A-Z]{4}'),
        ];
    }
}
