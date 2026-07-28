<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReservationResource;
use App\Models\Reservations;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservations::all();
        return ReservationResource::collection($reservations);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'aircraft_id' => ['required', 'exists:aircrafts,id'],
            'starts_at' => ['required', 'date'],
            'ends_at' => ['required', 'date'],
        ]);

        $start = Carbon::parse($validated['starts_at']);
        $end = Carbon::parse($validated['ends_at']);

        $isOverlapping = Reservations::query()
            ->where('aircraft_id', $validated['aircraft_id'])
            ->where('starts_at', '<', $end)
            ->where('ends_at', '>', $start)
            ->exists();

        if ($isOverlapping) {
            return response()->json([
                'message' => 'The selected aircraft is already reserved during this time period.'
            ], 422);
        }

        Reservations::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //TODO: FIX
        $res = Reservations::findOrFail($id);

        $validated = $request->validate([
            'user_id' => ['exists:users,id'],
            'aircraft_id' => ['exists:aircrafts,id'],
            'starts_at' => ['date'],
            'ends_at' => ['date'],
        ]);

        $start = Carbon::parse(!array_key_exists('starts_at', $validated) ? $res['starts_at'] : $validated['starts_at']);
        $end = Carbon::parse(!array_key_exists('ends_at', $validated) ? $res['ends_at'] : $validated['ends_at']);

        $isOverlapping = Reservations::query()
            ->where('aircraft_id', !array_key_exists('aircraft_id', $validated) ? $res['aircraft_id'] : $validated['aircraft_id'])
            ->where('starts_at', '<', $end)
            ->where('ends_at', '>', $start)
            ->exists();

        if ($isOverlapping) {
            return response()->json([
                'message' => 'The selected aircraft is already reserved during this time period.'
            ], 422);
        }

        $res->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
