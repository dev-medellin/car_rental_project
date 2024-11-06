<?php

use App\Http\Controllers\Admin\CarCategory\CarCategoryController;
use App\Http\Controllers\Admin\CarDetails\CarDetailsController;
use App\Http\Controllers\Common\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/car-category/list', [CarCategoryController::class, 'car_category'])->name('category.list-display');
    Route::get('/car-rental/list', [CarDetailsController::class, 'car_rental'])->name('category.list-display');
});
