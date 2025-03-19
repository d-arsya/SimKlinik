<?php

use App\Http\Controllers\Api\AnimalController;
use App\Http\Controllers\Api\CheckupController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\OwnerController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::name('api.')->group(function () {
    Route::controller(LocationController::class)->group(function () {
        Route::get('province', 'province')->name('province');
        Route::get('province/{province}', 'city')->name('city');
        Route::get('city/{city}', 'district')->name('district');
        Route::get('district/{district}', 'village')->name('village');
    });
    Route::controller(AnimalController::class)->group(function () {
        Route::get('animal', 'animal')->name('animal');
        Route::get('animal/{animal}', 'type')->name('type');
        Route::get('color', 'color')->name('animal');
    });
    Route::get('service', [ServiceController::class, 'index'])->name('service');
    Route::apiResource('owner', OwnerController::class)->only(['store', 'index']);
    Route::apiResource('patient', PatientController::class)->only(['store', 'index']);
    Route::apiResource('checkup', CheckupController::class)->only(['store', 'show', 'update']);
});
