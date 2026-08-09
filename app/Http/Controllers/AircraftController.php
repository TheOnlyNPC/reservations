<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAircraftRequest;
use App\Http\Requests\UpdateAircraftRequest;
use App\Http\Resources\AircraftResource;
use App\Models\Aircrafts;
use Illuminate\Http\Request;

class AircraftController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aircrafts = Aircrafts::all();
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

        $aircraft = Aircrafts::create($validated);

        return response()->json(new AircraftResource($aircraft));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aircraft = Aircrafts::findOrFail($id);
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
        $aircraft = Aircrafts::findOrFail($id);

        $validated = $request->validated();
        
        $aircraft->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
