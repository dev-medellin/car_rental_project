<?php

namespace App\Http\Controllers\Admin\CarDetails;

use App\Http\Controllers\Api\CarDetails\CarDetailsApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarDetailsController extends Controller
{
    //
    public function car_rental(CarDetailsApiController $carDetailsApi){
        $response = $carDetailsApi->index();
        $responseData = $response->getData(true);
        $param = [
            'data' => $responseData['data']
        ];
        return view('admin.car_rental.index')->with($param);
    }
}
