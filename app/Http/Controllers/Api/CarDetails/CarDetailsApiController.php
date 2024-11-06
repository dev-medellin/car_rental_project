<?php

namespace App\Http\Controllers\Api\CarDetails;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarDetails\StoreCarDetailRequest;
use App\Http\Requests\CarDetails\UpdateCarDetailsRequest;
use App\Http\Services\CarDetails\CarDetailsService;
use App\Models\CarDetailModel;

class CarDetailsApiController extends Controller
{
    //

    protected $carDetailsService;

    public function __construct(CarDetailsService $carDetailsService)
    {
        $this->carDetailsService = $carDetailsService;
    }

    public function index(){
        $selected = $this->carDetailsService->selectCar();
        return response()->json([
            'success' => true,
            'data' => $selected
        ]);
    }

    /**
     * Store a new car detail.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeCarDetails(StoreCarDetailRequest $request)
    {
        try {
            $carDetail = $this->carDetailsService->insertCarDetail($request);
            return response()->json([
                'success' => true,
                'data' => $carDetail
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateCarDetailsBySlug(UpdateCarDetailsRequest $request,$slug){
        try {
            $check_exist = $this->carDetailsService->showCarDetail($slug);
            if( !is_null($check_exist) ){
                $carDetail = $this->carDetailsService->updateCarDetail($request,$slug);
                return response()->json([
                    'success' => true,
                    'data' => $carDetail
                ]);
            }else{
                return response()->json([
                    'success' => false,
                    'error' => "Car Details doesn't exist!"
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function showCarDetailsBySlug($slug){
        try {
            $check_exist = $this->carDetailsService->showCarDetail($slug);
            if( !is_null($check_exist) ){
                return response()->json([
                    'success' => true,
                    'data' => $check_exist
                ]);
            }else{
                return response()->json([
                    'success' => false,
                    'error' => "Car Details doesn't exist!"
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroyCarDetails($slug){
        try {
            $check_exist = $this->carDetailsService->showCarDetail($slug);
            if( !is_null($check_exist) ){
                $this->carDetailsService->removeCarDetail($slug);
                return response()->json([
                    'success' => true,
                    'message' => 'Car details deleted successfully',
                ]);
            }else{
                return response()->json([
                    'success' => false,
                    'error' => "Car Details doesn't exist!"
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function restoreCarDetails($slug){
        try {
            $updated = $this->carDetailsService->updateDeleteAtCarDetail($slug);
            if($updated){
                return response()->json([
                    'success' => true,
                    'data' => $updated
                ]);
            }else{
                return response()->json([
                    'success' => false,
                    'error' => 'Car details not found or already restored.'
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
