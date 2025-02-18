<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InpatientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MasterAnimalController;
use App\Http\Controllers\MasterColorController;
use App\Http\Controllers\MasterDiagnoseController;
use App\Http\Controllers\MasterServiceController;
use App\Http\Controllers\MasterTypeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');
Route::redirect('login', 'login/admin')->name('login');
Route::get('login/{role}', [AuthController::class, 'login']);
Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        // Route::match(['get', 'post'], 'login', 'login')->name('login');
        Route::match(['get', 'post'], 'forgot', 'forgot')->name('forgot');
        Route::get('reset-password/{token}', 'showResetForm')->name('password.reset');
        Route::post('reset-password', 'resetPassword')->name('user.password');
    });
});
Route::middleware('auth')->group(function () {
    Route::resource('diagnose', MasterDiagnoseController::class);
    Route::resource('type', MasterTypeController::class);
    Route::resource('color', MasterColorController::class);
    Route::resource('service', MasterServiceController::class);
    Route::resource('animal', MasterAnimalController::class);
    Route::resource('user', UserController::class);
    Route::resource('queue', QueueController::class);
    Route::resource('patient', PatientController::class);
    Route::resource('inpatient', InpatientController::class);
    Route::resource('invoice', InvoiceController::class);
    Route::controller(UserController::class)->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('profile', 'profile')->name('profile');
        Route::get('profile/edit', 'profileEdit')->name('profile.edit');
    });
});
