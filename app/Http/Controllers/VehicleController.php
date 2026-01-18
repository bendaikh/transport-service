<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::latest()->get();
        return Inertia::render('Vehicles/Index', [
            'vehicles' => $vehicles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Vehicles/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'registration' => 'required|string|unique:vehicles,registration',
            'brand' => 'required|string',
            'model' => 'required|string',
            'capacity' => 'required|integer|min:1',
            'service_date' => 'required|date',
            'status' => 'required|in:active,inactive,maintenance,rented',
            'type' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Vehicle::create($validated);

        return redirect()->route('vehicles.index')->with('success', 'Véhicule ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        return Inertia::render('Vehicles/Show', [
            'vehicle' => $vehicle
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        return Inertia::render('Vehicles/Edit', [
            'vehicle' => $vehicle
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $validated = $request->validate([
            'registration' => 'required|string|unique:vehicles,registration,' . $vehicle->id,
            'brand' => 'required|string',
            'model' => 'required|string',
            'capacity' => 'required|integer|min:1',
            'service_date' => 'required|date',
            'status' => 'required|in:active,inactive,maintenance,rented',
            'type' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $vehicle->update($validated);

        return redirect()->route('vehicles.index')->with('success', 'Véhicule mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Véhicule supprimé avec succès.');
    }
}
