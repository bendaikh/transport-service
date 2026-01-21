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
            'code' => 'nullable|string|max:50',
            'registration' => 'required|string|max:100|unique:vehicles,registration',
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'category' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:50',
            'fuel_type' => 'nullable|string|max:50',
            'power' => 'nullable|integer|min:0',
            'capacity' => 'required|integer|min:1',
            'service_date' => 'required|date',
            'status' => 'required|in:active,inactive,maintenance,rented',
            'type' => 'required|string|max:100',
            'description' => 'nullable|string',
            'usage_status' => 'nullable|string|max:100',
            'rental_amount' => 'nullable|numeric|min:0',
            'assigned' => 'nullable|boolean',
            'next_service_km' => 'nullable|integer|min:0',
            'extra_info' => 'nullable|string',
            // Assurance
            'insurance_start_date' => 'nullable|date',
            'insurance_end_date' => 'nullable|date|after_or_equal:insurance_start_date',
            'insurance_amount' => 'nullable|numeric|min:0',
            'insurance_company' => 'nullable|string|max:150',
            'insurance_validity_days' => 'nullable|integer|min:0',
            'insurance_daily_charge' => 'nullable|numeric|min:0',
            // Visite technique
            'technical_start_date' => 'nullable|date',
            'technical_end_date' => 'nullable|date|after_or_equal:technical_start_date',
            'technical_amount' => 'nullable|numeric|min:0',
            'technical_validity_days' => 'nullable|integer|min:0',
            'technical_daily_charge' => 'nullable|numeric|min:0',
            // Vignette
            'vignette_start_date' => 'nullable|date',
            'vignette_end_date' => 'nullable|date|after_or_equal:vignette_start_date',
            'vignette_amount' => 'nullable|numeric|min:0',
            'vignette_validity_days' => 'nullable|integer|min:0',
            'vignette_daily_charge' => 'nullable|numeric|min:0',
            // Carte grise
            'carte_grise_start_date' => 'nullable|date',
            'carte_grise_end_date' => 'nullable|date|after_or_equal:carte_grise_start_date',
            'carte_grise_amount' => 'nullable|numeric|min:0',
            'carte_grise_validity_days' => 'nullable|integer|min:0',
            'carte_grise_daily_charge' => 'nullable|numeric|min:0',
            // Autorisation
            'autorisation_start_date' => 'nullable|date',
            'autorisation_end_date' => 'nullable|date|after_or_equal:autorisation_start_date',
            'autorisation_amount' => 'nullable|numeric|min:0',
            'autorisation_validity_days' => 'nullable|integer|min:0',
            'autorisation_daily_charge' => 'nullable|numeric|min:0',
            // Mouchards
            'mouchard_start_date' => 'nullable|date',
            'mouchard_end_date' => 'nullable|date|after_or_equal:mouchard_start_date',
            'mouchard_amount' => 'nullable|numeric|min:0',
            'mouchard_validity_days' => 'nullable|integer|min:0',
            'mouchard_daily_charge' => 'nullable|numeric|min:0',
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
            'code' => 'nullable|string|max:50',
            'registration' => 'required|string|max:100|unique:vehicles,registration,' . $vehicle->id,
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'category' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:50',
            'fuel_type' => 'nullable|string|max:50',
            'power' => 'nullable|integer|min:0',
            'capacity' => 'required|integer|min:1',
            'service_date' => 'required|date',
            'status' => 'required|in:active,inactive,maintenance,rented',
            'type' => 'required|string|max:100',
            'description' => 'nullable|string',
            'usage_status' => 'nullable|string|max:100',
            'rental_amount' => 'nullable|numeric|min:0',
            'assigned' => 'nullable|boolean',
            'next_service_km' => 'nullable|integer|min:0',
            'extra_info' => 'nullable|string',
            // Assurance
            'insurance_start_date' => 'nullable|date',
            'insurance_end_date' => 'nullable|date|after_or_equal:insurance_start_date',
            'insurance_amount' => 'nullable|numeric|min:0',
            'insurance_company' => 'nullable|string|max:150',
            'insurance_validity_days' => 'nullable|integer|min:0',
            'insurance_daily_charge' => 'nullable|numeric|min:0',
            // Visite technique
            'technical_start_date' => 'nullable|date',
            'technical_end_date' => 'nullable|date|after_or_equal:technical_start_date',
            'technical_amount' => 'nullable|numeric|min:0',
            'technical_validity_days' => 'nullable|integer|min:0',
            'technical_daily_charge' => 'nullable|numeric|min:0',
            // Vignette
            'vignette_start_date' => 'nullable|date',
            'vignette_end_date' => 'nullable|date|after_or_equal:vignette_start_date',
            'vignette_amount' => 'nullable|numeric|min:0',
            'vignette_validity_days' => 'nullable|integer|min:0',
            'vignette_daily_charge' => 'nullable|numeric|min:0',
            // Carte grise
            'carte_grise_start_date' => 'nullable|date',
            'carte_grise_end_date' => 'nullable|date|after_or_equal:carte_grise_start_date',
            'carte_grise_amount' => 'nullable|numeric|min:0',
            'carte_grise_validity_days' => 'nullable|integer|min:0',
            'carte_grise_daily_charge' => 'nullable|numeric|min:0',
            // Autorisation
            'autorisation_start_date' => 'nullable|date',
            'autorisation_end_date' => 'nullable|date|after_or_equal:autorisation_start_date',
            'autorisation_amount' => 'nullable|numeric|min:0',
            'autorisation_validity_days' => 'nullable|integer|min:0',
            'autorisation_daily_charge' => 'nullable|numeric|min:0',
            // Mouchards
            'mouchard_start_date' => 'nullable|date',
            'mouchard_end_date' => 'nullable|date|after_or_equal:mouchard_start_date',
            'mouchard_amount' => 'nullable|numeric|min:0',
            'mouchard_validity_days' => 'nullable|integer|min:0',
            'mouchard_daily_charge' => 'nullable|numeric|min:0',
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
