<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarDetailModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'car_details';

    protected $fillable = [
        'car_name',
        'category_id',
        'car_description',
        'car_additional',
        'car_price',
        'car_name_slug',
        'status',
    ];
}
