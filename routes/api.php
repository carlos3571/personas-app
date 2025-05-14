<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/comunas', [ComunaController::class, 'index'])->name('comunas');

use App\Http\Controllers\ComunaController;

Route::apiResource('comunas', ComunaController::class);
