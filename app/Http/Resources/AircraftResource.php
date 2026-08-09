<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AircraftResource extends JsonResource
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
            'registration' => $this->registration, 
            'status' => $this->status, 
            'type' => [
                'id' => $this->type_id,
                'name' => $this->type?->name,
                'seats' => $this->type?->seats,
                'fuelCapacity' => $this->type?->fuel_capacity,
            ] 
        ];
    }
}
