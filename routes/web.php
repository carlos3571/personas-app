<?php

use App\Http\Controllers\ComunaController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\PaisController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


