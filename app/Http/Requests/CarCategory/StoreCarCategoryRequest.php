<?php

namespace App\Http\Requests\CarCategory;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCarCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_name' => 'required|string|max:255|unique:car_category,category_name',
            'category_description' => 'required|string',
            'status' => 'nullable|integer|in:0,1', // Make status nullable
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
