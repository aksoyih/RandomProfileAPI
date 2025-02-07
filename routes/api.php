<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\ValidateProfileFields;
use App\Http\Middleware\ValidateNumberOfProfiles;

Route::get('/gender/{gender}', [ProfileController::class, 'profile'])->middleware(ValidateProfileFields::class);

Route::get('/gender/{gender}/{nProfiles}', [ProfileController::class, 'profiles'])
    ->middleware([ValidateProfileFields::class, ValidateNumberOfProfiles::class]);
