<?php

namespace App\Http\Controllers\Api\CarCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarCategory\StoreCarCategoryRequest;
use App\Http\Requests\CarCategory\UpdateCarCategoryRequest;
use App\Http\Services\CarCategory\CarCategoriesService;
use App\Models\CarCategoryModel;

class CarCategoryApiController extends Controller
{
    //
    protected $carCategoryService;

    public function __construct(CarCategoriesService $carCategoryService)
    {
        $this->carCategoryService = $carCategoryService;
    }

    public function index(){
        return response()->json([
            'success' => true,
            'data' => CarCategoryModel::where('status','1')->get()
        ]);
    }

    /**
     * Store a new car detail.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeCarCategory(StoreCarCategoryRequest $request)
    {
        try {
            $car_category = $this->carCategoryService->insertCarCategory($request);
            return response()->json([
                'success' => true,
                'message' => $car_category['category_name']." Added Successfully!"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function showCarCategoryBySlug($slug){
        try {
            $car_category = $this->carCategoryService->showCarCategorySlug($slug);
            return response()->json([
                'success' => true,
                'data' => $car_category
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateCarCategoryBuySlug(UpdateCarCategoryRequest $request,$slug){
        try {
            $check_exist = $this->carCategoryService->showCarCategorySlug($slug);
            if( !is_null($check_exist) ){
                $car_category = $this->carCategoryService->updateCarCategory($request,$slug);
                return response()->json([
                    'success' => true,
                    'message' => "Category Name <b>".$car_category['category_name']."</b> Updated Successfully!"
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

    public function destroyCarCategory($slug){
        try {
            $check_exist = $this->carCategoryService->showCarCategorySlug($slug);
            if( !is_null($check_exist) ){
                $this->carCategoryService->removeCarCategory($slug);
                return response()->json([
                    'success' => true,
                    'message' => 'Car Category deleted successfully',
                ]);
            }else{
                return response()->json([
                    'success' => false,
                    'error' => "Car Category doesn't exist!"
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function restoreCarCategory($slug){
        try {
            $updated = $this->carCategoryService->updateDeleteAtCarCategory($slug);
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
