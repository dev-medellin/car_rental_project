<?php

namespace App\Http\Requests\CarDetails;

use App\Models\CarModel;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateCarDetailsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @param  CarModel  $car
     * @return array
     */
    public function rules(CarModel $car): array
    {
        $slug = $this->input('slug');

        // Retrieve the car using the slug
        $car = CarModel::where('car_name_slug', $slug)->first();

        if (!$car) {
            // Handle the case where the car is not found (optional, could be done in controller or middleware)
            throw new HttpResponseException(
                response()->json([
                    'success' => false,
                    'errors' => 'Car not found!'
                ], 404)
            );
        }
        return [
            'car_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('cars')->ignore($car->id, 'id'),
            ],
            'car_category' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model_year' => 'required|string|digits:4|max:' . date('Y'),
            'transmission_type' => 'required|string|max:50',
            'fuel_type' => 'required|string|max:50',
            'seating_capacity' => 'required|integer|min:1|max:15',
            'luggage_capacity' => 'required|integer|min:0|max:20',
            'color' => 'required|string|max:50',
            'rental_price_per_day' => 'required|numeric|min:0|max:999999.99',
            'availability_status' => 'required|in:available,booked,under_maintenance',
            'location' => 'required|string|max:255',
            'air_conditioning' => 'nullable|boolean',
            'gps_included' => 'nullable|boolean',
            'audio_system' => 'nullable|string|max:100',
            'bluetooth' => 'nullable|boolean',
            'usb_port' => 'nullable|boolean',
            'insurance_type' => 'nullable|string|max:255',
            'insurance_expiry_date' => 'nullable|date|after_or_equal:today',
            'safety_features' => 'nullable|string',
            'description' => 'nullable|string',
            'car_images' => 'nullable|array',
            'car_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'last_service_date' => 'nullable|date|before_or_equal:today',
            'current_odometer_reading' => 'nullable|integer|min:0',
            'maintenance_notes' => 'nullable|string',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        // Check if the request expects JSON (e.g., AJAX request)
        if ($this->expectsJson()) {
            throw new HttpResponseException(
                response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422)
            );
        }

        // Default behavior (redirects back with errors for non-JSON requests)
        parent::failedValidation($validator);
    }
}
