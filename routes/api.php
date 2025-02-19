<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\BookingController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('resources', ResourceController::class);
Route::apiResource('resources.bookings', BookingController::class)->shallow()->except(['store']);
Route::post('bookings', [BookingController::class, 'store'])->name('bookings.store');
