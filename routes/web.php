<?php

use Illuminate\Support\Facades\Route;

Route::any('{any}', function () {
    return redirect('/api/');
})->where('any', '.*');
