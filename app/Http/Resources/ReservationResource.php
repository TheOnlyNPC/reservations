<?php

namespace App\Http\Resources;

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
        return [
            'id' => $this->id,
            'startsAt' => $this->starts_at, 
            'endsAt' => $this->ends_at, 
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
