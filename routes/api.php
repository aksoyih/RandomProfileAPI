<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\ValidateProfileFields;
use App\Http\Middleware\ValidateNumberOfProfiles;
use App\Http\Middleware\LogRequestMiddleware;
use App\Http\Controllers\StatsController;

Route::middleware('throttle:60,1')->group(function () {
    Route::get('/gender/{gender}', [ProfileController::class, 'profile'])
        ->middleware([
            ValidateProfileFields::class,
            LogRequestMiddleware::class
        ]);

    Route::get('/gender/{gender}/{nProfiles}', [ProfileController::class, 'profiles'])
        ->middleware([
            ValidateProfileFields::class,
            ValidateNumberOfProfiles::class,
            LogRequestMiddleware::class
        ]);
});

Route::get('/stats', [StatsController::class, 'stats']);
