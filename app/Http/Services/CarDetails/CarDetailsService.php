<?php

namespace App\Http\Services\CarDetails;

use App\Models\CarDetailModel;
use App\Http\Requests\CarDetails\StoreCarDetailRequest;
use App\Http\Requests\CarDetails\UpdateCarDetailsRequest;
use Illuminate\Support\Str;

class CarDetailsService
{

    public function selectCar(){
       return CarDetailModel::select('car_details.*','car_category.category_name as category_name')
        ->leftJoin('car_category', 'car_details.category_id', '=', 'car_category.id')
        ->where('car_details.status','1')->get();
    }
    public function insertCarDetail(StoreCarDetailRequest $request): CarDetailModel
    {
        $validated = $request->validated();
        if (isset($validated['car_additional']) && is_array($validated['car_additional'])) {
            $validated['car_additional'] = json_encode($validated['car_additional']);
        }
        if (isset($validated['car_name'])) {
            $validated['car_name_slug'] = Str::slug($validated['car_name']);
        }
        return CarDetailModel::create($validated);
    }

    public function updateCarDetail(UpdateCarDetailsRequest $request, $slug): CarDetailModel
    {
        $validated = $request->validated();

        if (isset($validated['car_additional']) && is_array($validated['car_additional'])) {
            $validated['car_additional'] = json_encode($validated['car_additional']);
        }

        if (isset($validated['car_name'])) {
            $validated['car_name_slug'] = Str::slug($validated['car_name']);
        }

        // Update the record
        CarDetailModel::where('car_name_slug', $slug)
        ->where('status','1')
        ->update($validated);

        // Retrieve and return the updated model
        return CarDetailModel::where('car_name_slug', $validated['car_name_slug'])
        ->where('status','1')
        ->first();
    }

    public function showCarDetail($slug){
        return CarDetailModel::where('car_name_slug', $slug)->where('status','1')->first();
    }

    public function removeCarDetail($slug){
        $carDetail = CarDetailModel::where('car_name_slug', $slug)->firstOrFail();
        $carDetail->delete();
    }

    public function updateDeleteAtCarDetail($slug): CarDetailModel
    {
        // Retrieve the soft-deleted record
        $carDetail = CarDetailModel::onlyTrashed()->where('car_name_slug', $slug)->first();

        // Check if the record exists
        if (!$carDetail) {
            return false;
        }
       $carDetail->restore();

        return $carDetail;
    }

}
