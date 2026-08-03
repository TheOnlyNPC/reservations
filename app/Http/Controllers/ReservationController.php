<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
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
    public function store(StoreReservationRequest $request)
    {   
        $validated = $request->validated();

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
    public function update(UpdateReservationRequest $request, string $id)
    {
        $res = Reservations::findOrFail($id);

        $validated = $request->validated();

        $start = Carbon::parse(!array_key_exists('starts_at', $validated) ? $res['starts_at'] : $validated['starts_at']);
        $end = Carbon::parse(!array_key_exists('ends_at', $validated) ? $res['ends_at'] : $validated['ends_at']);

        $isOverlapping = Reservations::query()
            ->where('aircraft_id', !array_key_exists('aircraft_id', $validated) ? $res['aircraft_id'] : $validated['aircraft_id'])
            ->where('starts_at', '<', $end)
            ->where('ends_at', '>', $start)
            ->except($res)
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
