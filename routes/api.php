<?php

use App\Http\Controllers\Api\AnimalController;
use App\Http\Controllers\Api\CheckupController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\OwnerController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\SimbatApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::name('api.')->group(function () {
    Route::controller(LocationController::class)->group(function () {
        Route::get('province', 'province')->name('province');
        Route::get('city/{province}', 'city')->name('city');
        Route::get('district/{city}', 'district')->name('district');
        Route::get('village/{district}', 'village')->name('village');
    });
    Route::controller(AnimalController::class)->group(function () {
        Route::get('animal', 'animal')->name('animal');
        Route::get('animal/{animal}', 'show')->name('show');
        Route::get('animal/{animal}/type', 'type')->name('type');
        Route::get('color', 'color')->name('color');
    });


    Route::get('service', [ServiceController::class, 'index'])->name('service');
    Route::apiResource('owner', OwnerController::class)->only(['store', 'index']);
    Route::get('patient/search', [PatientController::class, 'search']);
    Route::apiResource('patient', PatientController::class)->only(['store', 'index']);
    Route::apiResource('checkup', CheckupController::class)->only(['store', 'show', 'update']);
    Route::get('checkup/{checkup}/diagnose/{diagnose}', [CheckupController::class, 'diagnoseEdit']);
    Route::get('checkup/{checkup}/service/{service}/{days}', [CheckupController::class, 'serviceEdit']);
    Route::get('checkup/{checkup}/drug/{drug}/{amount}', [CheckupController::class, 'drugEdit']);
    Route::get('drugs/category/{category}', [SimbatApi::class, 'getDrugsByCategory']);
});
