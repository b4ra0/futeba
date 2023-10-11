<?php

use App\Http\Controllers\EstadioController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\TimeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::controller(TimeController::class)->group(function () {
    Route::get('times', 'index');
    Route::post('times', 'store');
    Route::get('times/{id}', 'show');
    Route::put('times/{id}', 'update');
    Route::delete('times/{id}', 'destroy');
});

Route::controller(EstadioController::class)->group(function () {
    Route::get('estadios', 'index');
    Route::post('estadios', 'store');
    Route::get('estadios/{id}', 'show');
    Route::put('estadios/{id}', 'update');
    Route::delete('estadios/{id}', 'destroy');
});

Route::controller(PaisController::class)->group(function () {
    Route::get('pais', 'index');
    Route::post('pais', 'store');
    Route::get('pais/{id}', 'show');
    Route::put('pais/{id}', 'update');
    Route::delete('pais/{id}', 'destroy');
});
