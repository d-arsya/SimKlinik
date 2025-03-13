<?php

use App\Http\Controllers\Api\CheckupController;
use App\Http\Controllers\Api\OwnerController;
use App\Http\Controllers\Api\PatientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::name('api.')->group(function () {
    Route::apiResource('owner', OwnerController::class)->only(['store']);
    Route::apiResource('patient', PatientController::class)->only(['store']);
    Route::apiResource('checkup', CheckupController::class)->only(['store', 'show', 'update']);
});
