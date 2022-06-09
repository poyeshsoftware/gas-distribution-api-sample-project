<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\FactorController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::post('/sign-in', [AuthController::class, 'signIn']);
    Route::post('/sign-out', [AuthController::class, 'signOut'])->middleware('auth:sanctum');
    Route::any('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');
});

Route::group(['prefix' => 'drivers'], function () {
    Route::get('/', [DriverController::class, 'index']);
    Route::post('/update/{id}', [DriverController::class, 'update'])->where('id', '[0-9]+');
    Route::delete('/remove/{id}', [DriverController::class, 'remove'])->where('id', '[0-9]+');
    Route::post('/new', [DriverController::class, 'new']);
});

Route::group(['prefix' => 'vehicles'], function () {
    Route::get('/', [VehicleController::class, 'index']);
    Route::post('/update/{id}', [VehicleController::class, 'update'])->where('id', '[0-9]+');
    Route::delete('/remove/{id}', [VehicleController::class, 'remove'])->where('id', '[0-9]+');
    Route::post('/new', [VehicleController::class, 'new']);
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('/update/{id}', [CategoryController::class, 'update'])->where('id', '[0-9]+');
    Route::delete('/remove/{id}', [CategoryController::class, 'remove'])->where('id', '[0-9]+');
    Route::post('/new', [CategoryController::class, 'new']);
});

Route::group(['prefix' => 'factors'], function () {
    Route::get('/', [FactorController::class, 'index']);
    Route::post('/update/{id}', [FactorController::class, 'update'])->where('id', '[0-9]+');
    Route::delete('/remove/{id}', [FactorController::class, 'remove'])->where('id', '[0-9]+');
    Route::post('/new', [FactorController::class, 'new']);
});

Route::group(['prefix' => 'upload'], function () {
    Route::post('/new', [UploadController::class, 'new']);
});


