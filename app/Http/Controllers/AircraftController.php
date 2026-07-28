<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type_id' => ['required', 'exists:types,id'],
        ]);

        Aircrafts::create(['type_id' => $validated['type_id']]);
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
        $aircraft = Aircrafts::findOrFail($id);

        $validated = $request->validate([
            'type_id' => ['integer'],
        ]);
        
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
