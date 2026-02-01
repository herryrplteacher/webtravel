<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//prefix ke folder admin
Route::prefix('admin')->group(function () {
    //middleware untuk proteksi halaman admin

    // Service routes
    Route::get('service', [App\Http\Controllers\ServiceController::class, 'index'])->name('index.service');
    Route::get('service/create', [App\Http\Controllers\ServiceController::class, 'create'])->name('create.service');
    Route::post('service', [App\Http\Controllers\ServiceController::class, 'store'])->name('store.service');
    Route::get('service/{service}/edit', [App\Http\Controllers\ServiceController::class, 'edit'])->name('edit.service');
    Route::put('service/{service}', [App\Http\Controllers\ServiceController::class, 'update'])->name('update.service');
    Route::delete('service/{service}', [App\Http\Controllers\ServiceController::class, 'destroy'])->name('destroy.service');

    // Location routes
    Route::get('location', [App\Http\Controllers\LocationController::class, 'index'])->name('index.location');
    Route::get('location/create', [App\Http\Controllers\LocationController::class, 'create'])->name('create.location');
    Route::post('location', [App\Http\Controllers\LocationController::class, 'store'])->name('store.location');
    Route::get('location/{location}/edit', [App\Http\Controllers\LocationController::class, 'edit'])->name('edit.location');
    Route::put('location/{location}', [App\Http\Controllers\LocationController::class, 'update'])->name('update.location');
    Route::delete('location/{location}', [App\Http\Controllers\LocationController::class, 'destroy'])->name('destroy.location');

    
}); // Tutup prefix group
