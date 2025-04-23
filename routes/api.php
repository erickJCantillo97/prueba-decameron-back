<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('hotels', HotelController::class)->except(['edit']);
    Route::resource('rooms', RoomController::class);
});
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});



require __DIR__.'/auth.php';
