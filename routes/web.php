<?php

use App\Http\Controllers\Admin\CarCategory\CarCategoryController;
use App\Http\Controllers\Admin\CarDetails\CarDetailsCreateController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\ValkeryRegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/car-category/list', [CarCategoryController::class, 'car_category'])->name('category.list-display');

    Route::prefix('car-details')->group(function () {
        Route::get('list', [CarDetailsCreateController::class, 'car_rental'])->name('car_details.list-display');
        Route::get('create', [CarDetailsCreateController::class, 'formCreateCarDetailsPage'])->name('car_details.display');
        Route::get('edit/{slug}', [CarDetailsCreateController::class, 'formEditCarDetailsPage'])->name('car_details.edit.display');
        Route::post('store', [CarDetailsCreateController::class, 'storeCarDetailsRequest'])->name('car_details.create');
        Route::post('update', [CarDetailsCreateController::class, 'updateCarDetailsRequest'])->name('car_details.edit');
        Route::post('remove/{slug}', [CarDetailsCreateController::class, 'deleteCarDetailsRequest'])->name('car_details.destroy');
    });
});


Route::get('register/val', [ValkeryRegisterController::class,'index']);
