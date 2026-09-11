<?php

namespace Database\Factories;

use App\Models\Aircraft;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
 

    public function definition(): array
    {
        $start = Carbon::parse(Reservation::latest('ends_at')->value('ends_at'))->addMinutes(rand(1, 1440));
        $end = $start->addMinutes(rand(1, 1440));

        return [
            'user_id' => User::all()->random()->id,
            'aircraft_id' => Aircraft::all()->random()->id,
            'starts_at' => $start,
            'ends_at' => $end,  
        ];
    }
}
