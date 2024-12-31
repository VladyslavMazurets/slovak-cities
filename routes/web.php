<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home/Index');
});

Route::get('city/{city}', [CityController::class, 'index'])->name('city.index');
Route::get('cities/search/{searchCity}', [CityController::class, 'search'])->name('cities.search');
