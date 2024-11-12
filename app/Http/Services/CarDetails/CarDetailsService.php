<?php

namespace App\Http\Services\CarDetails;

use App\Models\CarDetailModel;
use App\Http\Requests\CarDetails\StoreCarDetailRequest;
use App\Http\Requests\CarDetails\UpdateCarDetailsRequest;
use App\Models\CarModel;
use Illuminate\Support\Str;

class CarDetailsService
{

    public function selectCar(){
       return CarModel::select('cars.*','car_category.category_name as category_name')
        ->leftJoin('car_category', 'cars.car_category', '=', 'car_category.id')
        ->where('cars.status','1')->get();
    }
    public function insertCarDetail($request): CarModel
    {
        if (isset($request['car_name'])) {
            $request['car_name_slug'] = Str::slug($request['car_name']);
        }
        return CarModel::create($request->all());
    }

    public function updateCarDetail($request)
    {

        if (isset($request['car_name'])) {
            $request['car_name_slug'] = Str::slug($request['car_name']);
        }
        // Update the record
        CarModel::where('car_name_slug', $request['slug'])
        ->where('status', '1')
        ->update($request->except('_token', 'slug','form_status'));

        // Retrieve and return the updated model
        return CarModel::where('car_name_slug', $request['car_name_slug'])
        ->where('status','1')
        ->first();
    }

    public function showCarDetail($slug){
        return CarModel::where('car_name_slug', $slug)->where('status','1')->first();
    }

    public function removeCarDetail($slug){
        $carDetail = CarModel::where('car_name_slug', $slug)->firstOrFail();
        $carDetail->delete();
    }

    public function updateDeleteAtCarDetail($slug): CarModel
    {
        // Retrieve the soft-deleted record
        $carDetail = CarModel::onlyTrashed()->where('car_name_slug', $slug)->first();

        // Check if the record exists
        if (!$carDetail) {
            return false;
        }
       $carDetail->restore();

        return $carDetail;
    }

}
