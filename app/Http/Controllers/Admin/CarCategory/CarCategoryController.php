<?php

namespace App\Http\Controllers\Admin\CarCategory;

use App\Http\Controllers\Api\CarCategory\CarCategoryApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarCategoryController extends Controller
{
    public function car_category(CarCategoryApiController $carCategoryApi){
        $response = $carCategoryApi->index();
        $responseData = $response->getData(true);
        $param = [
            'data' => $responseData['data']
        ];
        return view('admin.car_category.index')->with($param);
    }
}
