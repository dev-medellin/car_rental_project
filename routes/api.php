<?php

use App\Http\Controllers\Api\CarCategory\CarCategoryApiController;
use App\Http\Controllers\Api\CarDetails\CarDetailsApiController;
use Illuminate\Http\Request;
use App\Http\Middleware\EnsureApiRequest;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware([EnsureApiRequest::class])->group(function () {
    Route::prefix('car-details')->group(function () {
        Route::get('/', [CarDetailsApiController::class, 'index'])->name('car-details.index');       // List all car details
        Route::get('/{slug}', [CarDetailsApiController::class, 'showCarDetailsBySlug'])->name('car-details.show');       // Show specific car detail
        Route::post('/', [CarDetailsApiController::class, 'storeCarDetails'])->name('car-details.store');    // Store a new car detail
        Route::put('/{slug}', [CarDetailsApiController::class, 'updateCarDetailsBySlug'])->name('car-details.update');  // Update a specific car detail
        Route::delete('/{slug}', [CarDetailsApiController::class, 'destroyCarDetails'])->name('car-details.destroy'); // Delete a specific car detail
        Route::post('/restore/{slug}', [CarDetailsApiController::class, 'restoreCarDetails'])->name('car-details.restore'); // Delete a specific car detail
    });

    Route::prefix('car-categories')->group(function () {
        Route::get('/', [CarCategoryApiController::class, 'index'])->name('car-categories.index');       // List all car categories
        Route::get('/{slug}', [CarCategoryApiController::class, 'showCarCategoryBySlug'])->name('car-categories.show');       // Show specific car category
        Route::post('/', [CarCategoryApiController::class, 'storeCarCategory'])->name('car-categories.store');       // Store a new car category
        Route::post('/update/{slug}', [CarCategoryApiController::class, 'updateCarCategoryBuySlug'])->name('car-categories.update');  // Update a specific car category
        Route::post('/{slug}', [CarCategoryApiController::class, 'destroyCarCategory'])->name('car-categories.destroy'); // Delete a specific car category
        Route::post('/restore/{slug}', [CarCategoryApiController::class, 'restoreCarCategory'])->name('car-category.restore'); // Delete a specific car category
    });
});
