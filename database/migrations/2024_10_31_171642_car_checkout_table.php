<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('car_checkout', function (Blueprint $table) {
            $table->id();
            $table->integer('car_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('street_address');
            $table->string('country');
            $table->string('sub_address');
            $table->string('town_city');
            $table->string('zip_code');
            $table->string('phone_number');
            $table->string('email');
            $table->longText('notes');
            $table->float('sub_total');
            $table->float('final_total');
            $table->timestamp('time_pickup');
            $table->timestamp('time_dropoff');
            $table->integer('status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_checkout');
    }
};
