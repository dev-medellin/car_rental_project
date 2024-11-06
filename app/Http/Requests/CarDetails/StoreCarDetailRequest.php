<?php

namespace App\Http\Requests\CarDetails;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCarDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'car_name' => 'required|string|max:255|unique:car_details,car_name',
            'category_id' => 'required|integer|exists:car_category,id',
            'car_description' => 'required|string',
            'car_additional' => 'nullable|array',
            'car_price' => 'required|numeric|min:0',
            'status' => 'integer|in:0,1',
        ];
    }

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
