<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('car_name');
            $table->string('car_name_slug');
            $table->string('car_category');
            $table->string('brand');
            $table->year('model_year');
            $table->string('transmission_type');
            $table->string('fuel_type');
            $table->integer('seating_capacity');
            $table->integer('luggage_capacity');
            $table->string('color');
            $table->decimal('rental_price_per_day', 8, 2);
            $table->enum('availability_status', ['available', 'booked', 'under_maintenance'])->default('available');
            $table->string('location');
            $table->boolean('air_conditioning')->default(false);
            $table->boolean('gps_included')->default(false);
            $table->string('audio_system')->nullable();
            $table->boolean('bluetooth')->default(false);
            $table->boolean('usb_port')->default(false);
            $table->string('insurance_type')->nullable();
            $table->date('insurance_expiry_date')->nullable();
            $table->longText('safety_features')->nullable();
            $table->longText('description')->nullable();
            $table->longText('car_images')->nullable();  // Array of image paths or URLs
            $table->date('last_service_date')->nullable();
            $table->integer('current_odometer_reading')->nullable();
            $table->text('maintenance_notes')->nullable();
            $table->boolean('status')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
