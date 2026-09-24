<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAircraftRequest;
use App\Http\Requests\UpdateAircraftRequest;
use App\Http\Resources\AircraftResource;
use App\Models\Aircraft;

class AircraftController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aircrafts = Aircraft::all();
        return AircraftResource::collection($aircrafts);
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
    public function store(StoreAircraftRequest $request)
    {
        $validated = $request->validated();

        $validated['type_id'] = $validated['typeId'];
        unset($validated['typeId']);

        $aircraft = Aircraft::create($validated);

        return response()->json(new AircraftResource($aircraft));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aircraft = Aircraft::findOrFail($id);
        return $aircraft;
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
    public function update(UpdateAircraftRequest $request, string $id)
    {
        //TODO: Update Methode
        $aircraft = Aircraft::findOrFail($id);

        $validated = $request->validated();
        
        $aircraft->update($validated);
        
        return new AircraftResource($aircraft);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
