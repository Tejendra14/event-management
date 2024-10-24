<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventController as ApiEventController;
use App\Http\Controllers\Api\AuthController;

// Route to authenticate and get token
Route::post('/login', [AuthController::class, 'login']);

// Protected routes that require authentication
Route::middleware('auth:api')->group(function () {
    // Route to get all events
    Route::get('/events', [ApiEventController::class, 'index']);

    // Route to get a specific event by ID
    Route::get('/events/{id}', [ApiEventController::class, 'show']);

});
