<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $fillable = [
        'car_name',
        'car_name_slug',
        'car_category',
        'brand',
        'model_year',
        'transmission_type',
        'fuel_type',
        'mileage',
        'seating_capacity',
        'luggage_capacity',
        'color',
        'rental_price_per_day',
        'availability_status',
        'location',
        'air_conditioning',
        'gps_included',
        'audio_system',
        'bluetooth',
        'usb_port',
        'insurance_type',
        'insurance_expiry_date',
        'safety_features',
        'description',
        'car_images',
        'last_service_date',
        'current_odometer_reading',
        'maintenance_notes',
        'status'
    ];

    protected $casts = [
        'safety_features' => 'array',
        'car_images' => 'array',
        'insurance_expiry_date' => 'date',
        'last_service_date' => 'date',
    ];
}
