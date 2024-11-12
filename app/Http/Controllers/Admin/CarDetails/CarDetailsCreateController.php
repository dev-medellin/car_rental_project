<?php

namespace App\Http\Controllers\Admin\CarDetails;

use App\Http\Controllers\Api\CarCategory\CarCategoryApiController;
use App\Http\Controllers\Api\CarDetails\CarDetailsApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\CarDetails\StoreCarDetailRequest;
use App\Http\Requests\CarDetails\UpdateCarDetailsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CarDetailsCreateController extends Controller
{
    //

    public function car_rental(
        CarDetailsApiController $carDetailsApi,
     ){
        //Details
        $response = $carDetailsApi->index();
        $responseData = $response->getData(true);

        $param = [
            'data' => $responseData['data'],
        ];
        return view('admin.car_details.index')->with($param);
    }

    public function formCreateCarDetailsPage(
        CarCategoryApiController $carCategoryApi
    )
    {
        $responseCategory = $carCategoryApi->index();
        $responseCategoryData = $responseCategory->getData(true);

        $param = [
            'categories' => $responseCategoryData['data'],
            'form_status' => 'create_form'
        ];
        return view('admin.car_details.form.form_page')->with($param);
    }

    public function formEditCarDetailsPage(
        CarCategoryApiController $carCategoryApi,
        CarDetailsApiController $carCarDetailsApi,
        $slug
    )
    {
        $responseCategory = $carCategoryApi->index();
        $responseCategoryData = $responseCategory->getData(true);

        $responseCarDetails = $carCarDetailsApi->showCarDetailsBySlug($slug);
        $responseCarDetailsData = $responseCarDetails->getData(true);

        if (!isset($responseCarDetailsData['data'])) {
            session()->flash('error', 'Car details <b>'. $slug .'</b> data not found.');
            return redirect()->route('car_details.list-display');
        }

        $param = [
            'categories' => $responseCategoryData['data'],
            'carDetails' => $responseCarDetailsData['data'],
            'form_status' => 'edit_form'
        ];
        return view('admin.car_details.form.form_page')->with($param);
    }

    public function storeCarDetailsRequest(
        StoreCarDetailRequest $request,
        CarDetailsApiController $carCarDetailsApi
    ){
        try {
            $successCarDetails = $carCarDetailsApi->storeCarDetails($request);
            return ($successCarDetails->isSuccessful())
            ? response()->json(['success' => true,'message' => 'Successfully Added'])
            : response()->json(['success' => false,'message' => 'Failed to store!']);
        } catch (\Throwable $th) {
            Log::error('Error storing car details:', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ]);
        }
    }

    public function updateCarDetailsRequest(
        UpdateCarDetailsRequest $request,
        CarDetailsApiController $carCarDetailsApi
    ){
        try {
            $successCarDetails = $carCarDetailsApi->updateCarDetailsBySlug($request);
            return ($successCarDetails->isSuccessful())
            ? response()->json(['success' => true,'message' => 'Successfully Added'])
            : response()->json(['success' => false,'message' => 'Failed to store!']);
        } catch (\Throwable $th) {
            Log::error('Error storing car details:', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ]);
        }
    }

    public function deleteCarDetailsRequest(
        $slug,
        CarDetailsApiController $carCarDetailsApi
        ){
        try {
            $successCarDetails = $carCarDetailsApi->destroyCarDetails($slug);
            return ($successCarDetails->isSuccessful())
            ? response()->json(['success' => true,'message' => 'Successfully Deleted'])
            : response()->json(['success' => false,'message' => 'Failed to delete!']);
        } catch (\Throwable $th) {
            Log::error('Error storing car details:', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ]);
        }
    }

}
