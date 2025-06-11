<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\PhotoController;
// use App\Http\Controllers\ListingController;
// use App\Http\Controllers\ApplicationController;

Route::get('/', function (){
    return view('welcome');
});

/* Route::middleware('auth')->group(function () {
    Route::resource('listing', ListingController::class);
}); */

Route::middleware('auth')->group(function () {
    Route::resource('vehicles', VehicleController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('vehicles', VehicleController::class);
    
    Route::post('/vehicles/{vehicle}/photos', [PhotoController::class, 'store'])->name('photos.store');
    Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

/* Route::post('/listing/{listing}/apply', [ApplicationController::class, 'store'])
    ->middleware('auth')
    ->name('listing.apply'); */

