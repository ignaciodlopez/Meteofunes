<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\WeatherController::class, 'index'])->name('home');
Route::get('/api/weather/current', [App\Http\Controllers\WeatherController::class, 'getCurrentWeather'])->name('weather.current');
Route::get('/api/weather/forecast', [App\Http\Controllers\WeatherController::class, 'getForecast'])->name('weather.forecast');
Route::post('/api/weather/clear-cache', [App\Http\Controllers\WeatherController::class, 'clearCache'])->name('weather.clear-cache');
