<?php

use App\Http\Controllers\DeviceController;
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
    });

});
