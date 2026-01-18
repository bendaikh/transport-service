<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleFactory> */
    use HasFactory;

    protected $fillable = [
        'registration',
        'brand',
        'model',
        'capacity',
        'service_date',
        'status',
        'type',
        'description',
    ];

    protected $casts = [
        'service_date' => 'date',
    ];
}
