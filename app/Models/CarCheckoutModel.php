<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarCheckoutModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'car_checkout';

    protected $fillable = [
        'car_id',
        'fname',
        'lname',
        'street_address',
        'country',
        'sub_address',
        'town_city',
        'zip_code',
        'phone_number',
        'email',
        'notes',
        'sub_total',
        'final_total',
        'time_pickup',
        'time_dropoff',
        'status',
    ];
}
