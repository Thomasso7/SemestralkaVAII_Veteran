<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home']);
Route::get('cars', [VehicleController::class, 'cars']);
Route::get('add', [VehicleController::class, 'add']);
Route::post('uploadVehicle', [VehicleController::class, 'uploadVehicle']);
Route::get('deleteVehicle/{id}', [VehicleController::class, 'deleteVehicle']);
Route::get('editVehicle/{id}', [VehicleController::class, 'editVehicle']);
ROute::post('submitEdit/{id}', [VehicleController::class, 'submitEdit']);
