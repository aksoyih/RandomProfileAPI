<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\ValidateProfileFields;
use App\Http\Middleware\ValidateNumberOfProfiles;
use App\Http\Middleware\LogRequestMiddleware;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\HelperController;

Route::middleware('throttle:60,1')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])
        ->middleware([
            ValidateProfileFields::class,
            LogRequestMiddleware::class
        ]);

    Route::get('/profiles/{nProfiles}', [ProfileController::class, 'profiles'])
        ->middleware([
            ValidateProfileFields::class,
            ValidateNumberOfProfiles::class,
            LogRequestMiddleware::class
        ]);

    Route::get('/profiles/{gender}/{nProfiles}', function($gender, $nProfiles) {
        return App::call('\App\Http\Controllers\ProfileController@profiles', ['gender' => $gender, 'nProfiles' => $nProfiles]);
    })->middleware([
        ValidateProfileFields::class,
        ValidateNumberOfProfiles::class,
        LogRequestMiddleware::class
    ]);
});

Route::get('/stats', [StatsController::class, 'stats']);
Route::get('/', [HelperController::class, 'index']);
