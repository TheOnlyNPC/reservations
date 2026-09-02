<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $start = Carbon::parse($this->starts_at);
        $end = Carbon::parse($this->ends_at);

        return [
            'id' => $this->id,
            'startsAt' => [
                'date' => $start->format('d.m.Y'), 
                'time' => $start->format('H:i'), 
                'dateTimeLocal' => $start->format('Y-m-d\TH:i:s'),
            ],
            'endsAt' => [
                'date' => $end->format('d.m.Y'), 
                'time' => $end->format('H:i'), 
                'dateTimeLocal' => $end->format('Y-m-d\TH:i:s'),
            ],
            'duration' => $start->diffForHumans($end, true),
            'aircraft' => [
                'id' => $this->aircraft_id,
                'registration' => $this->aircraft?->registration,
                'type' => [
                    'id' => $this->aircraft?->type?->id,
                    'name' => $this->aircraft?->type?->name,
                    'seats' => $this->aircraft?->type?->seats,
                    'fuelCapacity' => $this->aircraft?->type?->fuel_capacity,
                ]
            ],
            'user' => [
                'id' => $this->user_id,
                'name' => $this->user?->name,
            ] 
        ];
    }    
}
