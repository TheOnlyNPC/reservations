<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Models\Aircraft;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservationController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
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

        $aircraft = isset($validated['aircraft_id'])
            ? Aircraft::findOrFail($validated['aircraft_id'])
            : Aircraft::where('registration', $validated['registration'])->firstOrFail();

        $start = Carbon::parse($validated['starts_at']);
        $end = Carbon::parse($validated['ends_at']);

        $isOverlapping = Reservation::query()
            ->where('aircraft_id', $aircraft->id)
            ->where('starts_at', '<', $end)
            ->where('ends_at', '>', $start)
            ->exists();

        if ($isOverlapping) {
            return response()->json([
                'message' => 'The selected aircraft is already reserved during this time period.'
            ], 422);
        }


        $reservation = Reservation::create([
            'aircraft_id' => $aircraft->id,
            'user_id'     => $validated['user_id'],
            'starts_at'   => $validated['starts_at'],
            'ends_at'     => $validated['ends_at'],
        ]);

        return response()->json(new ReservationResource($reservation));
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
        $res = Reservation::findOrFail($id);

        $validated = $request->validated();

        $start = Carbon::parse(!array_key_exists('starts_at', $validated) ? $res['starts_at'] : $validated['starts_at']);
        $end = Carbon::parse(!array_key_exists('ends_at', $validated) ? $res['ends_at'] : $validated['ends_at']);

        $isOverlapping = Reservation::query()
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
        return response()->json(new ReservationResource($res));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
