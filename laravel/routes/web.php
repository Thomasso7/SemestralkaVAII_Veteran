<?php
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'home']);
Route::get('cars', [VehicleController::class, 'cars']);
Route::get('motorcycles', [VehicleController::class, 'motorcycles']);
Route::get('vehicle/{id}', [VehicleController::class, 'vehicle']);
Route::get('add', [VehicleController::class, 'add'])->middleware(['auth', 'admin']);
Route::post('uploadVehicle', [VehicleController::class, 'uploadVehicle']);
Route::get('deleteVehicle/{id}', [VehicleController::class, 'deleteVehicle'])->middleware(['auth', 'admin']);
Route::get('editVehicle/{id}', [VehicleController::class, 'editVehicle'])->middleware(['auth', 'admin']);
ROute::post('submitEdit/{id}', [VehicleController::class, 'submitEdit']);

require __DIR__.'/auth.php';
