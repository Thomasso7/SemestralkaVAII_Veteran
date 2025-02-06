<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SparePartsController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'home']);
Route::get('search', [HomeController::class, 'search'])->name('search');

Route::get('cars', [VehicleController::class, 'cars']);
Route::get('motorcycles', [VehicleController::class, 'motorcycles']);
Route::get('vehicle/{id}', [VehicleController::class, 'vehicle']);
Route::get('add', [VehicleController::class, 'add'])->middleware(['auth', 'admin']);
Route::post('uploadVehicle', [VehicleController::class, 'uploadVehicle']);
Route::get('deleteVehicle/{id}', [VehicleController::class, 'deleteVehicle'])->middleware(['auth', 'admin']);
Route::get('editVehicle/{id}', [VehicleController::class, 'editVehicle'])->middleware(['auth', 'admin']);
Route::post('submitEdit/{id}', [VehicleController::class, 'submitEdit']);

Route::get('addToCart/{id}/{type}', [CartController::class, 'addToCart'])->middleware(['auth', 'verified']);
Route::get('cart', [CartController::class, 'cart'])->middleware(['auth', 'verified']);
Route::get('deleteCartItem/{id}', [CartController::class, 'deleteFromCart'])->middleware(['auth', 'verified']);

Route::get('spare_parts/{model}', [SparePartsController::class, 'spareParts']);
Route::get('addSparePart', [SparePartsController::class, 'add'])->middleware(['auth', 'admin']);
Route::post('uploadSparePart', [SparePartsController::class, 'uploadSparePart']);
Route::get('deleteSparePart/{id}', [SparePartsController::class, 'deleteSparePart'])->middleware(['auth', 'admin']);
Route::get('editSparePart/{id}', [SparePartsController::class, 'editSparePart'])->middleware(['auth', 'admin']);
Route::post('submitEditSparePart/{id}', [SparePartsController::class, 'submitEditSparePart']);
