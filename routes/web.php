<?php

use App\Http\Controllers\CloudVariableController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ThingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('devices')->name('devices.')->group(function () {
        Route::get('/', [DeviceController::class, 'index'])->name('index'); // devices.index
        Route::get('/create', [DeviceController::class, 'create'])->name('create'); // devices.create
        Route::get('/{device}/edit', [DeviceController::class, 'edit'])->name('edit'); // devices.edit
        Route::get('/{device}', [DeviceController::class, 'show'])->name('show'); // devices.show
    });

    Route::prefix('things')->name('things.')->group(function () {
       Route::get('/', [ThingController::class, 'index'])->name('index');
       Route::get('/create', [ThingController::class, 'create'])->name('create');
       Route::get('/{thing}/edit', [ThingController::class, 'edit'])->name('edit');
       Route::get('/{thing}', [ThingController::class, 'show'])->name('show');
    });

    Route::prefix('cv')->name('cv.')->group(function () {
        Route::get('/', [CloudVariableController::class, 'index'])->name('index');
        Route::get('/create', [CloudVariableController::class, 'create'])->name('create');
        Route::get('/{cloudVariable}/edit', [CloudVariableController::class, 'edit'])->name('edit');
        Route::get('/{cloudVariable}', [CloudVariableController::class, 'show'])->name('show');
    });


});
