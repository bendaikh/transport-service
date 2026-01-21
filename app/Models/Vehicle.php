<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleFactory> */
    use HasFactory;

    protected $fillable = [
        'code',
        'registration',
        'brand',
        'model',
        'category',
        'color',
        'fuel_type',
        'power',
        'capacity',
        'service_date',
        'status',
        'type',
        'description',
        'usage_status',
        'rental_amount',
        'assigned',
        'next_service_km',
        'extra_info',
        'insurance_start_date',
        'insurance_end_date',
        'insurance_amount',
        'insurance_company',
        'insurance_validity_days',
        'insurance_daily_charge',
        'technical_start_date',
        'technical_end_date',
        'technical_amount',
        'technical_validity_days',
        'technical_daily_charge',
        'vignette_start_date',
        'vignette_end_date',
        'vignette_amount',
        'vignette_validity_days',
        'vignette_daily_charge',
        'carte_grise_start_date',
        'carte_grise_end_date',
        'carte_grise_amount',
        'carte_grise_validity_days',
        'carte_grise_daily_charge',
        'autorisation_start_date',
        'autorisation_end_date',
        'autorisation_amount',
        'autorisation_validity_days',
        'autorisation_daily_charge',
        'mouchard_start_date',
        'mouchard_end_date',
        'mouchard_amount',
        'mouchard_validity_days',
        'mouchard_daily_charge',
    ];

    protected $casts = [
        'service_date' => 'date',
        'assigned' => 'boolean',
        'rental_amount' => 'decimal:2',
        'insurance_start_date' => 'date',
        'insurance_end_date' => 'date',
        'insurance_amount' => 'decimal:2',
        'insurance_daily_charge' => 'decimal:2',
        'technical_start_date' => 'date',
        'technical_end_date' => 'date',
        'technical_amount' => 'decimal:2',
        'technical_daily_charge' => 'decimal:2',
        'vignette_start_date' => 'date',
        'vignette_end_date' => 'date',
        'vignette_amount' => 'decimal:2',
        'vignette_daily_charge' => 'decimal:2',
        'carte_grise_start_date' => 'date',
        'carte_grise_end_date' => 'date',
        'carte_grise_amount' => 'decimal:2',
        'carte_grise_daily_charge' => 'decimal:2',
        'autorisation_start_date' => 'date',
        'autorisation_end_date' => 'date',
        'autorisation_amount' => 'decimal:2',
        'autorisation_daily_charge' => 'decimal:2',
        'mouchard_start_date' => 'date',
        'mouchard_end_date' => 'date',
        'mouchard_amount' => 'decimal:2',
        'mouchard_daily_charge' => 'decimal:2',
    ];
}
