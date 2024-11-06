<?php

namespace App\Http\Services\CarCategory;

use App\Http\Requests\CarCategory\StoreCarCategoryRequest;
use App\Models\CarCategoryModel;
use Illuminate\Support\Str;

class CarCategoriesService
{
    public function insertCarCategory(StoreCarCategoryRequest $request): CarCategoryModel
    {
        $validated = $request->validated();
        if (isset($validated['category_name'])) {
            $validated['category_name_slug'] = Str::slug($validated['category_name']);
        }
        return CarCategoryModel::create($validated);
    }

    public function showCarCategorySlug($slug){
        return CarCategoryModel::where('category_name_slug', $slug)->where('status','1')->first();
    }

    public function updateCarCategory($req,$slug): CarCategoryModel
    {
        $validated = $req->validated();

        if (isset($validated['category_name'])) {
            $validated['category_name_slug'] = Str::slug($validated['category_name']);
        }

        // Update the record
        CarCategoryModel::where('category_name_slug', $slug)
        ->where('status','1')
        ->update($validated);

        // Retrieve and return the updated model
        return CarCategoryModel::where('category_name_slug', $validated['category_name_slug'])
        ->where('status','1')
        ->first();
    }

    public function removeCarCategory($slug){
        $carDetail = CarCategoryModel::where('category_name_slug', $slug)->firstOrFail();
        $carDetail->delete();
    }

    public function updateDeleteAtCarCategory($slug): CarCategoryModel
    {
        // Retrieve the soft-deleted record
        $carDetail = CarCategoryModel::onlyTrashed()->where('car_name_slug', $slug)->first();

        // Check if the record exists
        if (!$carDetail) {
            return false;
        }
       $carDetail->restore();

        return $carDetail;
    }
}
