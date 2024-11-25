<?php

use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\EstadioController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\PartidaController;
use App\Http\Controllers\ClubeController;
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


Route::controller(ClubeController::class)->group(function () {
    Route::get('clubes', 'index');
    Route::post('clubes', 'store');
    Route::get('clubes/{id}', 'show');
    Route::put('clubes/{id}', 'update');
    Route::delete('clubes/{id}', 'destroy');
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

Route::controller(PartidaController::class)->group(function () {
    Route::get('partidas', 'index');
    Route::post('partidas', 'store');
    Route::get('partidas/{id}', 'show');
    Route::put('partidas/{id}', 'update');
    Route::delete('partidas/{id}', 'destroy');
});

Route::controller(CampeonatoController::class)->group(function () {
    Route::get('campeonatos', 'index');
    Route::post('campeonatos', 'store');
    Route::get('campeonatos/{id}', 'show');
    Route::put('campeonatos/{id}', 'update');
    Route::delete('campeonatos/{id}', 'destroy');
});
