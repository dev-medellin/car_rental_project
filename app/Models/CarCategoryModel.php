<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarCategoryModel extends Model
{
    use HasFactory, SoftDeletes;

    // Define the table associated with the model
    protected $table = 'car_category';

    // Specify the fillable fields
    protected $fillable = [
        'category_name',
        'category_name_slug',
        'category_description',
        'status',
    ];

    // Optionally, you can customize the dates if necessary
    protected $dates = ['deleted_at']; // For soft deletes
}
