<?php

namespace App\Http\Controllers;

use App\Http\Resources\TypeResource;
use App\Models\Types;
use Illuminate\Http\Request;

class TypeController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $types = Types::all();
        return TypeResource::collection($types);
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
            'name' => ['required', 'max:255'],
            'seats' => ['required', 'integer'],
            'fuel_capacity' => ['integer'],
        ]);

        Types::create($validated);
    }

    /**
     * Display the specified resource.n
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $type = Types::findOrFail($id);

        $validated = $request->validate([
            'name' => ['max:255'],
            'seats' => ['integer'],
            'fuel_capacity' => ['integer'],
        ]);
        
        $type->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
