<?php

use App\Http\Controllers\ProdutoController;
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
    Route::delete('times/{id}', 'destroy');
});
