<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;

Route::get('/trips', [TripController::class, 'index']);
Route::post('/trips', [TripController::class, 'store']);
Route::get('/trips/{trip}', [TripController::class, 'show']);
Route::put('/trips/{trip}', [TripController::class, 'update']);
Route::delete('/trips/{trip}', [TripController::class, 'destroy']);

Route::post('/trips/{trip}/files', [FileController::class, 'store']);