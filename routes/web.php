<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\LanguageController;

Route::get('/', function (){
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::resource('vehicles', VehicleController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('vehicles', VehicleController::class);
    
    Route::post('/vehicles/{vehicle}/photos', [PhotoController::class, 'store'])->name('photos.store');
    Route::get('/vehicles/{vehicle}/photos/add', [PhotoController::class, 'create'])->name('photos.create');
    Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::post('/language/update', [LanguageController::class, 'update'])
    ->middleware('auth')
    ->name('language.update');
